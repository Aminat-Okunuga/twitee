<?php


use App\Models\Post;
use App\Http\Controllers\PostsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// get all post endpoint
// Route::get('/posts', function(){
//     return Post::all();
// });
Route::get('/posts', [PostsController::class, 'index']);



// Add post endpoint
// Route::post('/posts', function(){
//     request()->validate([
//         'title' => 'required',
//         'body' => 'required',
//         'cover_image' => 'image|nullable|max:1999'
//     ]);

//     return Post::create([
//         'title' => request('title'),
//         'body' => request('body'),
//         'cover_image' => request('cover_image'),
//     ]);
// });

Route::post('/posts', [PostsController::class, 'store']);


// update a single post
// Route::put('/posts/{post}', function(Post $post){

//     request()->validate([
//         'title' => 'required',
//         'body' => 'required',
//         'cover_image' => 'image|nullable|max:1999'
//     ]);

//     $success = $post->update([
//         'title' => request('title'),
//         'body' => request('body'),
//         'cover_image' => request('cover_image'),
//     ]);

//     return[
//         'success' => $success
//     ];
// });
Route::put('/posts/{id}', [PostsController::class, 'update']);



// delete post endpoint
// Route::delete('/posts/{post}', function(Post $post){

//     $success = $post->delete();

//     return[
//         'success' => $success
//     ];
// });

Route::delete('/posts/{id}', [PostsController::class, 'destroy']);