<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\CollegeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ProgrammeController;
use App\Http\Controllers\UniversityController;
use Laravel\Passport\Http\Controllers\AccessTokenController;
use Laravel\Passport\Http\Controllers\AuthorizationController;
use Laravel\Passport\Http\Controllers\ClientController;
use Laravel\Passport\Http\Controllers\PersonalAccessTokenController;
use Laravel\Passport\Http\Controllers\ScopeController;


Route::group(['prefix' => 'oauth'], function () {
    Route::post('/token', [AccessTokenController::class, 'issueToken']);
    Route::get('/authorize', [AuthorizationController::class, 'authorize']);
    Route::post('/authorize', [AuthorizationController::class, 'approve']);
    Route::delete('/authorize', [AuthorizationController::class, 'deny']);
    Route::get('/clients', [ClientController::class, 'forUser']);
    Route::post('/clients', [ClientController::class, 'store']);
    Route::put('/clients/{client_id}', [ClientController::class, 'update']);
    Route::delete('/clients/{client_id}', [ClientController::class, 'destroy']);
    Route::get('/scopes', [ScopeController::class, 'all']);
    Route::get('/personal-access-tokens', [PersonalAccessTokenController::class, 'forUser']);
    Route::post('/personal-access-tokens', [PersonalAccessTokenController::class, 'store']);
    Route::delete('/personal-access-tokens/{token_id}', [PersonalAccessTokenController::class, 'destroy']);
});

Route::get('/university',[UniversityController::class,'show']);
Route::post('/university',[UniversityController::class,'create']);

Route::get('/college',[CollegeController::class,'show']);
Route::post('/college',[CollegeController::class,'create']);

Route::get('/department',[DepartmentController::class,'show']);
Route::post('/department',[DepartmentController::class,'create']);

Route::get('/programme',[ProgrammeController::class,'show']);
Route::post('/programme',[ProgrammeController::class,'create']);

Route::get('/countries',[AddressController::class,'show']);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::post('/login',[AuthController::class,'login']);
Route::post('/register',[AuthController::class,'register']);