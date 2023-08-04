<?php

use Illuminate\Support\Facades\Route;
use App\models\Post;
use App\models\Category;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use Illuminate\Support\Facades\File;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {

    // $files = File::files(resource_path("posts")); used one time to converted to inline
    // $posts = [];   --version 1


    // --version 3: used collection to clean up the code
    // $posts = collect(File::files(resource_path("posts")))

    //     ->map(function ($file) {
    //          return YamlFrontMatter::parseFile($file);
    //     })

    //     ->map(function ($document) {
    //         return new Post(
    //             $document->title,
    //             $document->excerpt,
    //             $document->date,
    //             $document->body(),
    //             $document->slug
    //         );
    //     });
    //////////////////////////////////////////////////////////////////////
    // (--version 2)$posts = array_map(function ($file) {

    //     $document =  YamlFrontMatter::parseFile($file);

    //     return new Post(
    //         $document->title,
    //         $document->excerpt,
    //         $document->date,
    //         $document->body(),
    //         $document->slug
    //     );
    // }, $files);
    /////////////////////////////////////////////////////////////////////
    // (--version 1) foreach ($files as $file) {
    //     $document =  YamlFrontMatter::parseFile($file);

    //     $posts[] = new Post(
    //         $document->title,
    //         $document->excerpt,
    //         $document->date,
    //         $document->body(),
    //         $document->slug
    //     );
    // }

    return view('posts', [
        'posts' => Post::latest()->get()
    ]);
});

Route::get('posts/{post:slug}', function (Post $post) {

    //  Find a post by its id and pass it to a view called "post"


    return view('post', [
        'post' => $post
    ]);
});

Route::get('categories/{category:slug}', function (Category  $category) {
    return view('posts', [
        'posts' => $category->posts
    ]);
});

Route::get('authors/{author:username}', function (User $author) {
    return view('posts', [
        'posts' => $author->posts
    ]);
});
