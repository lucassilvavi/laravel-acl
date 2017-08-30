<?php
/**
 * Created by PhpStorm.
 * User: lucas.vieira
 * Date: 22/08/2017
 * Time: 12:34
 */

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Gate;


class UserController extends Controller
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
        if (Gate::denies('user')) {
            return abort(403,'não autorizado');
        }
    }

    public function index()
    {
        $dados['user'] = $this->user->all();


        return view('painel.users.index')->with('dados', $dados);
    }

    public function roles($id)
    {

        //recupera usuario
        $dados['user'] = $this->user->find($id);

        //recuperar roles
        $dados['roles'] = $dados['user']->roles;


        return view('painel.users.roles')->with('dados', $dados);
    }
}