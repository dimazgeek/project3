<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['middleware' => ['web']], function () {

   // Route::get('/', function () {
   //     return view('welcome');
   // });
Route::get('/', function() {
    return view('main.index');
    });
Route::get('/lipsum', function() {
    return view('Lorem.LoremView');
    });
Route::get('/User', function() {
    return view('User.UserView');
    });
Route::get('/people', 'UserController@getPeople');
Route::post('/people', 'UserController@postPeople');
Route::get('/loremipsum/{noOfParas?}', 'LoremIpsumController@getLoremIpsum');
Route::post('/loremipsum', 'LoremIpsumController@postLoremIpsum');
Route::get('/new', function() {
    $view  = '<form method="POST">';
    $view .= csrf_field(); # This will be explained more later
    $view .= 'Title: <input type="text" name="title">';
    $view .= '<input type="submit">';
    $view .= '</form>';
    return $view;
});

Route::post('/new', function() {
    $input =  Input::all();
    print_r($input);
});

Route::get('/practice', function () {
    echo App::environment();
    $data = Array('foo' => 'bar');
    Debugbar::info($data);
    Debugbar::error('Error!');
    Debugbar::warning('Watch out…');
    Debugbar::addMessage('Another message', 'mylabel');
    $random = new Rych\Random\Random();
    return ' ' .$random->getRandomString(8);
});    

});
