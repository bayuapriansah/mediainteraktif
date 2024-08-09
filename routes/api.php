<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ApiAuthController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\UserDetailController;
use App\Http\Controllers\Api\MateriNameController;
use App\Http\Controllers\Api\MateriDetailController;
use App\Http\Controllers\Api\TugasMateriController;
use App\Http\Controllers\Api\JawabanRecordController;

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

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [ApiAuthController::class, 'login']);

Route::apiResource('users', UserController::class);
Route::apiResource('user-details', UserDetailController::class);
Route::apiResource('materi-names', MateriNameController::class);
Route::apiResource('materi-details', MateriDetailController::class);
Route::apiResource('tugas-materi', TugasMateriController::class);
Route::apiResource('jawaban-record', JawabanRecordController::class);
// Route::post('/login', function (Request $request) {
//     $credentials = $request->only('email', 'password');

//     if (Auth::attempt($credentials)) {
//         $user = Auth::user();
//         return response()->json(['success' => true, 'user' => $user]);
//     } else {
//         return response()->json(['success' => false, 'message' => 'Invalid credentials'], 401);
//     }
// });