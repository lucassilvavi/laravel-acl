<?php

namespace App\Http\Controllers\Portal;

use Illuminate\Http\Request;
use App\Post;
use Gate;
use App\Http\Controllers\Controller;

class SiteController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Post $post)
    {

        return view('portal.home.index');
    }

    public function update($idPost)
    {
        $dados['post'] = Post::find($idPost);
        if (Gate::denies('editar_post', $dados['post'])) {
            abort(403, 'ze ruela');
        }
        return view('update-post')->with('dados', $dados);
    }
    public function rolesPermissions()
    {
        $name = auth()->user()->name;
      var_dump('<h1>{$name}</h1>');
      foreach (auth()->user()->roles as $role){
          echo $role->name. ' ->' ;

           $permissions = $role->permissions;

           foreach ($permissions as $permission){
               echo "$permission->name,";
           }
           echo "<hr>";
      }
    }
}
