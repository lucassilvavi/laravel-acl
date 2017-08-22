<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Role;

class RoleController extends Controller
{
    private $role;

    public function __construct(Role $role)
    {
        $this->role = $role;
    }

    public function index()
    {
        $dados['role'] = $this->role->all();
        return view('painel.roles.index')->with('dados', $dados);
    }

    public function permissions($id)
    {

        //recupera role
        $dados['role'] = $this->role->find($id);

        //recuperar permission
        $dados['permission'] =  $dados['role']->permissions;


        return view('painel.roles.permissions')->with('dados', $dados);
    }
}
