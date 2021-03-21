<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Post;
use App\User;
use App\Rating;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('posts/avg-ratings', 'PostController@withAverageRating');
Route::get('users/{user}/posts', 'PostController@byUser');
Route::get('posts/{post}', 'PostController@postsWithRatings');
Route::get('posts/rating/{rt}', 'PostController@ratingAbove');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
