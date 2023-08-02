<?php

use App\Http\Controllers\API\Candidate\CandidateController;
use App\Http\Controllers\API\Job\JobController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('candidate')->group(function () {
    Route::get('/', [CandidateController::class, 'index']);
});

Route::prefix('jobs')->group(function () {
    Route::get('/', [JobController::class, 'index']);
});
