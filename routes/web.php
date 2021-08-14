<?php

use Illuminate\Support\Facades\Route;
use App\Mail\Hello;
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
    return view('home');
});

Route::resource('games', GameController::class);
Route::get('/search/', 'GameController@search')->name('search');
Route::resource('categories', CategoriesController::class);

// face acelasi lucru cu route::resoruce doar ca mai multe liniii 
// Route::get ('games', GameController::class)->name('games.index');
// Route::post ('games', GameController::class)->name('games.create');
// Route::put ('games', GameController::class);
// Route::delete  ('games', GameController::class);
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


// Route::get('send-mail', function () {
   
//     $details = [
//         'title' => 'Mail from ItSolutionStuff.com',
//         'body' => 'This is for testing email using smtp'
//     ];
   
//     \Mail::to('your_receiver_email@gmail.com')->send(new \App\Mail\UsersMail($details));
   
//     dd("Email is Sent.");
// });



// Route::get('testemail', function () {
//     Mail::to(['pirvan.marian@gmail.com'])->send(new Hello);
// });

$user = Auth::loginUsingId(1);

// Route::get('testemail', function () use ($user)  {
//     Mail::to($)->send(new Hello($user));
// });


Route::get('send-mail', function () {
   
    $details = [
        'title' => 'Mail from LevelCoding.com',
        'body' => 'p'
    ];
   
    \Mail::to('pirvan.marian@gmail.com')->send(new \App\Mail\MyTestMail($details));
   
    dd("Email is Sent.");
});


require __DIR__.'/auth.php';
