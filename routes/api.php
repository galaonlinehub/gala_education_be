<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
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
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');
Route::post('/login',[AuthController::class,'login']);
Route::post('/register',[AuthController::class,'register']);