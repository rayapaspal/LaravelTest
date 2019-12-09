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
use App\Article;
use App\Tag;

Route::get('/', function () {
    $articles = Article::all();
    $tags     = Tag::all();
    return view('welcome', ['articles' => $articles, 'tags' => $tags]);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::resources([
    'users'    => 'UserController',
    //'profiles' => 'ProfileController',
    'articles' => 'ArticleController',
    'comments' => 'CommentController'
]);

Route::get('/users/{id}/articles', 'ArticleController@articles');

Route::get('/', 'ArticleController@main');
