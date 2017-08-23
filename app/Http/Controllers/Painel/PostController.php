<?php

namespace App\Http\Controllers\Painel;

use App\Post;
use Gate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    private $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function index()
    {
        $dados['posts'] = $this->post->all();

        if (Gate::denies('view_post')) {
            return redirect()->back();
        }
        return view('painel.posts.index')->with('dados', $dados);
    }
}
