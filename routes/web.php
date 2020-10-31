<?php

use App\Http\Controllers\ShortlinkRedirectController;
use App\Models\Shortlink;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('l')->group(function () {
    Route::get('{shortlink:path}', [ShortlinkRedirectController::class, 'show'])->name('shortlink.show');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    $shortlinks = Shortlink::all();
    return view('dashboard', compact(['shortlinks']));
})->name('dashboard');
