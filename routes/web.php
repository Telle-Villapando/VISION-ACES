<?php
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MembersController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/register', [RegisteredUserController::class, 'create'])
    ->middleware('guest')
    ->name('register');

Route::post('/register', [RegisteredUserController::class, 'store'])
    ->middleware('guest');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('admin/dashboard',[HomeController::class, 'adminDashboard'])->middleware(['auth', 'admin']);

Route::get('admin/member', [MembersController::class,'members'])->name('admin.members');
Route::get('admin/addMembers', [MembersController::class,'addMember'])->name('member.add');
Route::post('admin/storeMember',[MembersController::class, 'storeMember'])->name('member.store');
Route::get('admin/{member}/editMember', [MembersController::class,'editMember'])->name('member.edit');
Route::put('admin/{member}/updateMember',[MembersController::class,'updateMember'])->name('member.update');
Route::delete('admin/{member}/delete',[MembersController::class,'deleteMember'])->name('member.delete');