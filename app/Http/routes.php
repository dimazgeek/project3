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

Route::get('/debug', function() {

    echo '<pre>';

    echo '<h1>Environment</h1>';
    echo App::environment().'</h1>';

    echo '<h1>Debugging?</h1>';
    if(config('app.debug')) echo "Yes"; else echo "No";

    echo '<h1>Database Config</h1>';
    /*
    The following line will output your MySQL credentials.
    Uncomment it only if you're having a hard time connecting to the database and you
    need to confirm your credentials.
    When you're done debugging, comment it back out so you don't accidentally leave it
    running on your live server, making your credentials public.
    */
    //print_r(config('database.connections.mysql'));

    echo '<h1>Test Database Connection</h1>';
    try {
        $results = DB::select('SHOW DATABASES;');
        echo '<strong style="background-color:green; padding:5px;">Connection confirmed</strong>';
        echo "<br><br>Your Databases:<br><br>";
        print_r($results);
    }
    catch (Exception $e) {
        echo '<strong style="background-color:crimson; padding:5px;">Caught exception: ', $e->getMessage(), "</strong>\n";
    }

    echo '</pre>';

});


});
