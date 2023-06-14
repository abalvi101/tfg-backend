<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserProfileResource;
use App\Models\Association;
use App\Models\Province;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Laravel\Sanctum\PersonalAccessToken;

class AuthController extends Controller
{
    /**
     * Handle the register.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $validator = null;
        if ($request->role === 'user') {
            $validator = Validator::make($request->all(), [
                'role' => 'required',
                'name' => 'required',
                'surname' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required',
                'c_password' => 'required|same:password',
                'birthday' => 'required',
            ]);
        } else if ($request->role === 'association') {
            $validator = Validator::make($request->all(), [
                'role' => 'required',
                'name' => 'required',
                'province_id' => 'required',
                'city_id' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required',
                'c_password' => 'required|same:password',
            ]);
        } else {
            return $this->sendError('Error de validación.', ['message' => 'The role field is required.']);
        }


        if($validator->fails()){
            return $this->sendError('Error de validación.', $validator->errors());
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $account = null;

        if ($request->role === 'user') {
            $input['birthday'] = new Carbon($request->birthday);
            // return $this->sendResponse(new Carbon($request->birthday), 'perfe');
            $account = User::create($input);
        } else {
            $account = Association::create($input);
        }

        $this->storageProfileImage($request);

        $success['token'] =  $account->createToken('MyApp')->plainTextToken;
        $success['name'] =  $account->name;

        return $this->sendResponse($success, 'Usuario registrado correctamente.');
    }

    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $guard = $request->role === 'association' ? 'associations' : 'users';
        if (Auth::guard($guard)->attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::guard($guard)->user();
            $success['token'] =  $user->createToken('MyApp')->plainTextToken;
            $success['name'] =  $user->name;
            $success['surname'] =  $user->surname;
            $success['role'] = $request->role;

            return $this->sendResponse($success, 'User login successfully.');
        }
        else {
            return $this->sendError('Unauthorized.', ['error'=>'Unauthorized'], 401);
        }
    }

    /**
     * Get the user from the access token
     */
    public function getUser(Request $request)
    {
        $user = auth('sanctum')->user();
        if ($user) {
            $success['token'] = $request->bearerToken();
            $success['name'] = $user->name;
            $success['surname'] = $user->surname;
            $success['role'] = class_basename($user) === 'User' ? 'user' : 'association';
            return $this->sendResponse($success, 'User data.');
        }
        // }
        return $this->sendError('Unauthorized.', ['error'=>'Unauthorized'], 401);
    }

    /**
     * Get the user info from the access token
     */
    public function getUserInfo(Request $request)
    {
        $account = auth('sanctum')->user();
        $user = new UserProfileResource($account);
        // $user = auth('sanctum')->user();
        if ($user) {
            return $this->sendResponse($user, 'User data.');
        }
        return $this->sendError('No autorizado.', ['error'=>'Unauthorized'], 401);
    }


    public function storageProfileImage(Request $request) {
        $account = auth('sanctum')->user();
        $role = class_basename($account) === 'User' ? 'user' : 'association';
        if ($role === 'user') {
            $user = User::find($account->id);
        } else {
            $user = Association::find($account->id);
        }

        if (!$request->image) {
            $user['profile_image'] = null;
            $user->save();
            return $this->sendResponse(null, 'Imagen de perfil actualizada.');
        } else {
            $image_64 = $request->image; // base64 encoded data
            $extension = explode('/', explode(':', substr($image_64, 0, strpos($image_64, ';')))[1])[1];   // .jpg .png .pdf
            $replace = substr($image_64, 0, strpos($image_64, ',')+1);
            // find substring fro replace here eg: data:image/png;base64,
            $image = str_replace($replace, '', $image_64);
            $image = str_replace(' ', '+', $image);


            $image_name = $role.'/'.$account->id.'-'.time().'.'.$extension;

            Storage::disk('public')->put($image_name, base64_decode($image));

            $user['profile_image'] = env('APP_URL', 'http://localhost').'/storage/'.$image_name;
            $user->save();
            return $this->sendResponse(null, 'Imagen de perfil actualizada.');
        }
    }

    /**
     * update user data
     */
    public function update(Request $request)
    {
        $user = auth('sanctum')->user();
        if ($user) {
            if (class_basename($user) === 'User') {
                User::whereId($user->id)->update($request->all());
                $user = User::find($user->id);
            } else {
                Association::whereId($user->id)->update($request->all());
                $user = Association::find($user->id);
            }
            return $this->sendResponse($user, 'Datos actualizados correctamente.');
        } else {
            return $this->sendError('No autorizado.', ['error' => 'Unauthorized'], 401);
        }
    }

    /**
     * Add or remove an favourite animal
     */
    public function favourite(Request $request)
    {
        $user = auth('sanctum')->user();
        if ($user && class_basename($user) === 'User' && $request->animal_id) {
            $is_favourite = DB::table('animal_user')
                ->where('animal_id', '=', $request->animal_id)
                ->where('user_id', '=', $user->id)
                ->first();
            if ($is_favourite) {
                DB::table('animal_user')->where('id', $is_favourite->id)->delete();
                return $this->sendResponse(null, 'Favorito eliminado.');
            } else {
                DB::table('animal_user')->insert([
                    'animal_id' => $request->animal_id,
                    'user_id' => $user->id,
                ]);
                return $this->sendResponse(null, 'Favorito añadido.');
            }
        } else {
            return $this->sendError('No autorizado.', ['error' => 'Unauthorized'], 401);
        }
    }
}
