<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Rating;

class PostController extends Controller
{
    public function byUser(User $user){
        return User::with('posts')->where('id', $user->id)->get();
    }

    public function postsWithRatings(Post $post){
        return Post::join('ratings', 'posts.id', '=', 'ratings.post_id')
            ->where('posts.id', $post->id)->get(['posts.*', 'ratings.rating']);
    }

    public function withAverageRating(){
        $data = Post::query()
            ->select('posts.id', 'posts.post', \DB::raw('AVG(ratings.rating) as averageRating'))
            ->leftJoin('ratings', 'posts.id', 'ratings.post_id',)
            ->groupBy('posts.id', 'posts.post')->get();
        return $data;
    }

    public function ratingAbove($rt){
        return Post::query()->select('posts.id', 'posts.post', 'ratings.rating')
            ->join('ratings', 'ratings.post_id', 'posts.id')
            ->where('ratings.rating', '>', $rt)
            ->get();
    }

    public function show($user)
    {
        return User::find($user);
    }

}
