<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\UserManagementController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CommentController;

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
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Routes voor gebruikersprofielen
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/profile/{user}', [ProfileController::class, 'show'])->name('profile.show');
});

// Admin-specifieke routes
Route::middleware(['auth', 'isAdmin'])->group(function () {
    // Admin-gebruikersbeheer
    Route::get('/admin/users', [UserManagementController::class, 'index'])->name('admin.users.index');
    Route::post('/admin/users/{user}/role', [UserManagementController::class, 'updateRole'])->name('admin.users.updateRole');
    Route::get('/admin/users/create', [UserManagementController::class, 'create'])->name('admin.users.create');
    Route::post('/admin/users/store', [UserManagementController::class, 'store'])->name('admin.users.store');

    // Admin-acties voor nieuwsitems
    Route::get('news/create', [NewsController::class, 'create'])->name('news.create');
    Route::post('news', [NewsController::class, 'store'])->name('news.store');
    Route::get('news/{news}/edit', [NewsController::class, 'edit'])->name('news.edit');
    Route::put('news/{news}', [NewsController::class, 'update'])->name('news.update');
    Route::delete('news/{news}', [NewsController::class, 'destroy'])->name('news.destroy');

    // Admin-acties voor FAQ's en categorieën
    Route::resource('categories', CategoryController::class)->except(['show']);
    Route::resource('faqs', FaqController::class)->except(['index', 'show']);

    Route::get('/faqs/create', [FaqController::class, 'create'])->name('faqs.create');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');

    Route::delete('/admin/users/{user}', [UserManagementController::class, 'destroy'])->name('admin.users.destroy');
});

// Openbare routes voor nieuwsitems
Route::get('news', [NewsController::class, 'index'])->name('news.index');
Route::get('news/{news}', [NewsController::class, 'show'])->name('news.show');

// Openbare route voor FAQ-pagina
Route::get('/faqs', [FaqController::class, 'index'])->name('faqs.index');

// Database test route
Route::get('/db-test', function () {
    try {
        \DB::connection()->getPdo();
        return 'Database connection is working!';
    } catch (\Exception $e) {
        return 'Could not connect to the database. Error: ' . $e->getMessage();
    }
});

// Test logging route
Route::get('/test-logging', function () {
    \Log::info('Test logging werkt!');
    return 'Logging getest!';
});

Route::get('/contact', [ContactController::class, 'create'])->name('contact.create'); // Contactpagina tonen
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store'); // Contactformulier verwerken
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');

Route::get('/users/search', [UserManagementController::class, 'search'])->name('users.search');

Route::post('news/{news}/comments', [CommentController::class, 'store'])->middleware('auth')->name('comments.store');


require __DIR__.'/auth.php';
