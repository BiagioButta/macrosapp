<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DishController;
use App\Http\Controllers\Admin\IngredientController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $user = Auth::user();
    $gender = $user->gender === 'male' ? 'uomo' : 'donna';
    $welcomeMessage = "Benvenut".($gender === 'uomo' ? 'o' : 'a');
    return view('admin.dashboard', [
        'nickname' => $user->nickname,
        'welcomeMessage' => $welcomeMessage,
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {

    Route::get('/dishes', [DishController::class, 'index'])->name('admin.dishes.index');
    Route::get('/dishes/create', [DishController::class, 'create'])->name('admin.dishes.create');



    Route::get('/ingredients', [IngredientController::class, 'index'])->name('admin.ingredients.index');
    Route::get('/ingredients/create', [IngredientController::class, 'create'])->name('admin.ingredients.create');
    Route::get('/ingredients/edit', [IngredientController::class, 'edit'])->name('admin.ingredients.edit');
    Route::get('/ingredients/destroy', [IngredientController::class, 'destroy'])->name('admin.ingredients.destroy');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
