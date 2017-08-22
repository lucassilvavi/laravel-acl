<?php

namespace App\Http\Controllers\Painel;

use App\Permission;
use App\Post;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PainelController extends Controller
{

    public function index()
    {

        $dados['totalUsers'] = User::count();
        $dados['totalRoles'] = Role::count();
        $dados['totalPermission'] = Permission::count();
        $dados['totalPosts'] = Post::count();
        return view('painel.home.index')->with('dados', $dados);
    }
}
