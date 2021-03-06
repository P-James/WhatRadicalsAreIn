<?php

use App\Character;
use App\Radical;
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
    return view('home');
});
Route::get('/chars', function () {
    return view('characters-partial', [
        'characters' => Character::search(
            request('search')
        )->get()
    ]);
});

Route::get('/comps', 'ComponentScrapeController@start');
