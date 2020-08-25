<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{
    public function index(\App\User $user)
    {
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;
        
        $post_count = Cache::remember(
            'count.posts.'. $user->id, 
            now()->addSeconds(30), 
            function () use($user){
                return $user->posts->count();
        });

        $followers_count = Cache::remember(
            'count.followers.'. $user->id, 
            now()->addSeconds(30), 
            function () use($user){
                return $user->profile->followers->count();
        });
        
        $following_count = Cache::remember(
            'count.following.'. $user->id, 
            now()->addSeconds(30), 
            function () use($user){
                return $user->following->count();
        });

        // $followers_count = $user->profile->followers->count();
        // $following_count = $user->following->count();

        return view('profiles.index',compact('user', 'follows', 'post_count', 'followers_count', 'following_count'));
    }


    public function edit(\App\User $user){
        $this->authorize('update', $user->profile);
        return view('profiles.edit', compact('user'));

    }

    public function update(\App\User $user){
        $this->authorize('update', $user->profile);
        $data = request()-> validate([
            'title' => 'required',
            'description' => 'required',
            'url' => 'url',
            'image' => '',
        ]); 
        
        
        
        if (request('image')){

            $image_path = request('image')->store('profile', 'public');
            
            $image = Image::make(public_path("storage/{$image_path}"))->fit(1000, 1000);
            $image->save();

            $image_array = ['image' => $image_path];
        }

        
        auth()->user()->profile->update(array_merge(
            $data,
            $image_array ?? []
    
        ));
        return redirect("/profile/{$user->id}");
        
    }
}
