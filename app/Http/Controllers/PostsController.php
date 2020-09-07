<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use App;
use App\Http\Requests\AddingPost;

/** The controller which work with posts
 */
class PostsController extends Controller
{
    public function index()
    {
        $posts = App\Post::orderBy('created_at', 'desc')->paginate(4);
        return view('posts.posts')->with('posts', $posts);
    }

    public function show($id)
    {
        $post = App\Post::find($id);
        return view('posts.post')->with('post', $post);
    }

    /**    Opens a form for adding publications.*/
    public function openAdding()
    {
        return view('posts.adding');
    }

    /**    Opens the changed adding form for updates publications.*/
    public function openUpdating($id)
    {
        $post = App\Post::find($id);
        return view('posts.adding')->with('post', $post);
    }

    /**    Adds publication from the form adding publications.*/
    public function add(AddingPost $request)
    {
        $post = new App\Post();
        $request->validated();
        $post->setAttribute('title', $request->get('title'));
        $post->setAttribute('description', $request->get('description'));
        $post->setAttribute('content', $request->get('content'));
        $post->save();
        return redirect('/adding_post')->with('status', 'Post added');
    }

    /**    Updates publications from the adding form has is changed the publication form for the update publications.*/
    public function update(AddingPost $request)
    {
        $id = $request->get('id');
        $post = App\Post::find($id);
        $post->setAttribute('title', $request->get('title'));
        $post->setAttribute('description', $request->get('description'));
        $post->setAttribute('content', $request->get('content'));
        $post->save();
        return redirect()->route('updating_post', ['id'=> $id])->with('status', 'Post updated');
    }


    public function destroy($id)
    {
        App\Post::destroy($id);
        return redirect('/');
    }
}
