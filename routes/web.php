<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
     return view('welcome');

    //$select=DB::select('select * from users where id = ?', [1]);

    // $insert=DB::insert('insert into users (name,email,password) values ( ?, ?, ?)', [ 'Dev','Mohammed @gmail.com',1234]);

    //$update =DB::update('update users set email = "Dev@gmail.com" where id = ?', [2]);

   // $delete =DB::delete('delete from users where id = 2');

   //dd($delete);

});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
