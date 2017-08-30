<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Permission;
use Gate;

class PermissionController extends Controller
{
    private $permission;

    public function __construct(Permission $permission)
    {
        $this->permission = $permission;
        if (Gate::denies('adm')) {
            return abort(403,'não autorizado');
        }
    }


    public function index()
    {

        $dados['permission'] = $this->permission->all();


        return view('painel.permission.index')->with('dados', $dados);
    }

    public function roles($id)
    {
        //recupera role
        $dados['permission'] = $this->permission->find($id);

        //recuperar permission
        $dados['roles'] = $dados['permission']->roles;


        return view('painel.permission.roles')->with('dados', $dados);
    }
}
