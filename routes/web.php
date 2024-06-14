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

Route::group(['middleware' => ['guest']], function(){
    Route ::get("/","PageController@login")->name('login');
    Route ::post("/login","UserController@cekLogin");
});

Route::group(['middleware' => ['auth']], function(){
    Route ::get("/user", "PageController@formuser");
    Route ::post("/updateuser", "PageController@updateuser");
    Route ::get("/logout", "UserController@cekLogout");
    Route ::get("/home","PageController@home");
    Route ::get("/skin", "PageController@skin");
    Route ::get("/skin/add-form","PageController@formaddskin");
    Route ::post("/save", "PageController@save");
    Route ::get("/skin/form-edit/{id}", "PageController@formeditskin");
    Route ::put("/update/{id}", "PageController@updateskin");
    Route ::get("/delete/{id}", "PageController@deleteskin");
});

// Route ::get("/","PageController@login");
// Route ::post("/login","UserController@cekLogin");
// Route ::get("/user", "PageController@formuser");
// Route ::post("/updateuser", "PageController@updateuser");
// Route ::get("/logout", "UserController@cekLogout");
// Route ::get("/home","PageController@home");
// Route ::get("/skin", "PageController@skin");
// Route ::get("/skin/add-form","PageController@formaddskin");
// Route ::post("/save", "PageController@save");
// Route ::get("/skin/form-edit/{id}", "PageController@formeditskin");
// Route ::put("/update/{id}", "PageController@updateskin");
// Route ::get("/delete/{id}", "PageController@deleteskin");