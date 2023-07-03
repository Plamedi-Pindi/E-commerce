<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class AdminController extends Controller
{
    //
    public function funcionario(){
        $busca = request('busca');

        if($busca){
            $funcionarios = User::where([
                ['firstName', 'like', '%'.$busca.'%'],
                [ 'lastName', 'like', '%'.$busca.'%']
            ])->get();
        }
        else {
            $funcionarios = DB::select('select * from users where id_tipo = ?', [2]);
        }

        return view('admin.Funcionrios', compact('funcionarios'));
    }

    public function cliente(){
        $busca = request('busca');

        $busca = request('busca');

        if($busca){
            $clientes = User::where([
                ['firstName', 'like', '%'.$busca.'%'],
                [ 'lastName', 'like', '%'.$busca.'%']
            ])->get();
        }
        else {
            $clientes = DB::select('select * from users where id_tipo = ?', [3]);
        }

        return view('admin.clientes', compact('clientes'));
    }
}
