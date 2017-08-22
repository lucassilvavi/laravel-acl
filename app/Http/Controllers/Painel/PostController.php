<?php

namespace App\Http\Controllers\Painel;

use App\Post;
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
        return view('painel.posts.index')->with('dados', $dados);
    }
}
