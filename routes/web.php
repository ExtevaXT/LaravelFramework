<?php

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
    return view('welcome');
});
//1
Route::get('my-name', function () {
    return "ваше ФИО";
});
//2
Route::get('my-friend', function () {
    return "ФИО вашего друга";
});
//3
Route::get('get-friend/{name}', function ($name) {
    return $name;
});
//4
Route::get('my-city/{city}', function ($city) {
    return $city;
})->where('city', '[A-Za-z]+');
//5
Route::get('level/{lvl}', function ($lvl) {
    if($lvl>=0 and $lvl<=25) return "Slave (Новичок)";
    if($lvl>=26 and $lvl<=50) return "Boy next door (Специалист)";
    if($lvl>=51 and $lvl<=75) return "Boss of this gym (Босс)";
    if($lvl>=76 and $lvl<=98) return "Billy Herrington (Старик)";
    if($lvl==99) return "Dungeon Master (Король)";
    return "Выберете уровень 0-99";
});
//6
Route::get('working/{name}/{date}', function ($name, $date) {
    return "Навзание проекта - $name, Дата исполнения - $date";
});
//7
Route::get('power', function () {
    return route('power');
})->name('power');
//8
Route::prefix('admin')->group(function () {
    Route::get('/login', function () {
        return route('login');
    })->name('login');
    Route::get('/logout', function () {
        return route('logout');
    })->name('logout');
    Route::get('/info', function () {
        return route('info');
    })->name('info');
    Route::get('/color', function () {
        return route('color');
    })->name('color');
});
//9
Route::redirect('/admin/web', 'color');
//10
Route::get('color/{hex}', function ($hex) {
    return "<div style='background-color: $hex; width: 150px; height: 150px; border: black 1px solid'></div>Color - $hex";
})->where('hex', '([A-Fa-f0-9]{6})');
