<?php

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

$this->get('notifications', 'NotificationController@notifications')->name('notifications');


Route::get('/', function () {
    return view('welcome');
});

// Route::get('/send', function () {
//     broadcast(new \App\Events\SeedMessage);
//     return 'done';
// });

Route::middleware(['auth'])->group(function(){

    Route::get('/message', function () {
        return view('message');
    });
    
    Route::post('/message', function () {
        $data = request()->all();
        // dd($data);
        $message = \App\Message::create($data);
        // $user = \Auth::user();
        $user = \App\User::findOrFail($message->id_user);
    
        broadcast(new \App\Events\SeedMessage($message, $user));
        return redirect('/message');
    });
    
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
