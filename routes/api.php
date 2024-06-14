<?php

use App\Http\Controllers\API\LeadController;
use App\Http\Controllers\API\PhotoController;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('photos', [PhotoController::class, 'index']);

Route::get('photos/{photo}', [PhotoController::class, 'show']);

Route::post('contacts', [LeadController::class, 'store']);

Route::get('categories', function () {
    return response()->json([
        'success' => true,
        'results' => Category::all()
    ]);
});
