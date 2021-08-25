<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class UsersController extends Controller
{

    /**
     * Create a new controller instance.
     * Controlling the access of non-logged in users
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]); //This is to allow non-logged in users to acess the home page and the posts
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $posts = Post::all();
        $posts = Post::orderBy('title', 'desc')->get();
        $users = User::orderBy('name', 'desc')->get();
        return view('posts.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
 
        $request->validate([
        'name' => ['required', 'string', 'max:191'],
        'email' => ['required', 'string', 'email', 'max:191', 
        'unique:users'],
        'password' => ['required', 'string', 'min:6','max:191', 
        'confirmed'],
        ]);
       $userreg = new User([
        'name' => $request->get('name'),
        'password' => Hash::make($request['password']),
        ]);
       $email = $request->get('email');
       $data = ([
        'name' => $request->get('name'),
        'email' => $request->get('email'),
        ]);
       Mail::to($email)->send(new WelcomeMail($data));
        
        $userreg->save();
        
        flash('User has been added!','success')->important();
       return back();
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

       //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
    //    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    //    
    }
}
