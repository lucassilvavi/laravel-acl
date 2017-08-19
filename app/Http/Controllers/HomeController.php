<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Gate;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Post $post)
    {
        $dados['posts'] = $post->all();
        return view('home')->with('dados', $dados);
    }

    public function update($idPost)
    {
        $dados['post'] = Post::find($idPost);
        if (Gate::denies('update-post', $dados['post'])) {
            abort(403, 'ze ruela');
        }
        return view('update-post')->with('dados', $dados);
    }
}
