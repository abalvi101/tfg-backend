<?php

use App\Http\Controllers\AnimalController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LocationController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/euser', function (Request $request) {
//     return $request->user();
// });

Route::prefix('auth')->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::post('/register', 'register');
        Route::post('/login', 'login');
        Route::get('/getUser', 'getUser');
        Route::get('/getUserInfo', 'getUserInfo');
        Route::post('/submitImage', 'storageProfileImage');
        Route::middleware(['auth:sanctum'])->group(function () {
            Route::post('/update', 'update');
            Route::post('/favourite', 'favourite');
        });
    });
});

Route::prefix('location')->group(function () {
    Route::controller(LocationController::class)->group(function () {
        Route::get('/getProvinces', 'getProvinces');
        Route::get('/getCities', 'getCities');
    });
});

Route::prefix('animals')->group(function () {
    Route::controller(AnimalController::class)->group(function () {
        Route::post('/getFilteredAnimals', 'getFilteredAnimals');
        Route::get('/getSpecies', 'getAnimalSpecies');
        Route::get('/getBreeds', 'getAnimalBreeds');
        Route::get('/getSizes', 'getAnimalSizes');
        Route::post('/getAnimalInfo', 'getAnimalInfo');
        Route::middleware(['auth:sanctum'])->group(function () {
            Route::post('/create', 'create');
            Route::post('/update', 'update');
            Route::post('/updateImage', 'updateImage');
            Route::post('/storeFostering', 'storeFostering');
            Route::post('/deleteFostering', 'deleteFostering');
        });
    });
});

Route::get('animals/index', [AnimalController::class, 'index']);

Route::post('/tokens/create', function (Request $request) {
    $token = $request->user()->createToken($request->token_name);

    return ['token' => $token->plainTextToken];
});
