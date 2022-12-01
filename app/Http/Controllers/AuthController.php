<?php

namespace App\Http\Controllers;

use App\Models\Association;
use App\Models\Province;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
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
            return $this->sendResponse($success, 'User login successfully.');
        }
        // }
        return $this->sendError('Unauthorized.', ['error'=>'Unauthorized'], 401);
    }
}
