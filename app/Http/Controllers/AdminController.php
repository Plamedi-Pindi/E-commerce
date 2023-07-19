<?php

namespace App\Http\Controllers;

use App\Models\Item_pedido;
use App\Models\Item_venda;
use App\Models\Pedido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Venda;

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
            $funcionarios = DB::select('select * from users where id_tipo = ? ', [2]);
        }

        return view('admin.Funcionrios', compact('funcionarios'));
    }

    public function cliente(){
        $busca = request('busca');

        $busca = request('busca');

        if($busca){
            $clientes = User::where([
                ['firstName', 'like', '%'.$busca.'%'],
            ])->get();
        }
        else {
            $clientes = DB::select('select * from users where id_tipo = ?', [3]);
        }

        return view('admin.clientes', compact('clientes'));
    }


    public function entrega(Request $request ,$id_pagamento){
        $venda = new Venda;

        $venda->totla = $request->total;
        $venda->ref_pagamento = $request->pagamento;
        $venda->id_user = $request->user;
        $venda->save();

        $pedidos = Pedido::where('id_pagamento',$id_pagamento)->get();
        foreach($pedidos as $pedido){
            $itemPedido = Item_pedido::where('pedido_id', $pedido->id )->get();
            $itemVenda = new Item_venda;
            $venda = Venda::where('ref_pagamento', $id_pagamento)->get();

            foreach($itemPedido as $itemPedido){
                $itemVenda->quantidade = $itemPedido->quantidade;
                $itemVenda->precoUnitario =$itemPedido->precoUnitario;
                $itemVenda->id_produto =$itemPedido->id_produto;
            }

            foreach($venda as $venda){
                $itemVenda->id_venda = $venda->id;
            }

            $itemVenda->save();


            $pedido->id_estado = 4;
            $pedido->update();
        }







        return back()->with('success', 'Entrega realizada com sucesso!');
    }


}
