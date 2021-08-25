<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $heading = "Welcome To Twitee!";
        return view('pages.index', compact('heading'));
    }

    // public function posts(){
        
    //     $data = array(
    //         'heading' => 'Welcome To Twitee!',
    //         'sub_heading' => 'All Posts',
    //         'posts' => ['Nigeria Politics', 'Schools To Reopen By September']
    //     );
    //     return view('pages.posts')->with($data);
    // }

    // public function userProfile(){
    //     return view('pages.user_profile');
    // }
}
