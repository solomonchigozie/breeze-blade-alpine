<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/user/dashboard', function(){
    return view('user-dashboard');
})->name('user.dashboard')->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('post',PostController::class)->middleware('auth');

Route::get('/sendmail', function(){

    $mailData = ['name'=>'test user'];
    // Mail::to('john@yahoo.com')->send(new SendMail($mailData));

    /**
     * to use queue
     * when running queue locally, run `php artisan queue:work`
     */

    Mail::to('john@yahoo.com')->queue(new SendMail($mailData));

    return dd('Email Sent');

});

Route::get('blade-component', function(){
    return view('blade-component');
});


require __DIR__.'/auth.php';

