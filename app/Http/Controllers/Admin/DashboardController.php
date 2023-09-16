<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Item_pedido;
use App\Models\Pedido;
use App\Models\Produto;
use App\Models\User;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class DashboardController extends Controller
{
    public function index()
    {
        /**contadores */
        $response['pedidos'] = Item_pedido::count();
        $response['rendimento'] = Pedido::where('status', 'vendido')->sum('total');
        $response['cancelado'] = Pedido::where('status', 'cancelado')->sum('total');
        $response['clientes'] = User::where('level', 'Cliente')->count();

        /**calculos para saber se ouve mais rendimentos */
        // Obtém a data de hoje
        $hoje = now();
        // Data da semana passada

        $semanaPassada = $hoje->subWeek();
        // Consulta para contar os pedidos desta semana com base no created_at
        $rendimentoEstaSemana =  Pedido::where('status', 'vendido')
            ->whereBetween('created_at', [$hoje->startOfWeek(), $hoje->endOfWeek()])
            ->count();
        // Consulta para contar os pedidos da semana passada com base no created_at
        $rendimentoSemanaPassada =  Pedido::where('status', 'vendido')
            ->whereBetween('created_at', [$semanaPassada->startOfWeek(), $semanaPassada->endOfWeek()])
            ->count();
        // Comparação
        if ($rendimentoEstaSemana > $rendimentoSemanaPassada) {
            $response['mensagem']  = "o rendimento aumentaram esta semana.";
        } elseif ($rendimentoEstaSemana < $rendimentoSemanaPassada) {
            $response['mensagem'] = "o rendimento diminuíram esta semana.";
        } else {
            $response['mensagem']  = "o rendimento permaneceram iguais esta semana.";
        }

        /**cancelado */
        $canceladoEstaSemana =  Pedido::where('status', 'cancelado')
            ->whereBetween('created_at', [$hoje->startOfWeek(), $hoje->endOfWeek()])
            ->count();
        // Consulta para contar os pedidos da semana passada com base no created_at
        $canceladoSemanaPassada =  Pedido::where('status', 'cancelado')
            ->whereBetween('created_at', [$semanaPassada->startOfWeek(), $semanaPassada->endOfWeek()])
            ->count();
        // Comparação
        if ($canceladoEstaSemana > $canceladoSemanaPassada) {
            $response['mensagemCancelado']  = " aumentaram esta semana.".$canceladoEstaSemana/100;
        } elseif ($canceladoEstaSemana < $canceladoSemanaPassada) {
            $response['mensagemCancelado'] = " diminuíram esta semana.".$canceladoEstaSemana/100;
        } else {
            $response['mensagemCancelado']  = "permaneceram iguais esta semana.".$canceladoEstaSemana/100;;
        }


        /**calculo se ouve aumento de pedido  */
        $pedidosEstaSemana =  Item_pedido::whereBetween('created_at', [$hoje->startOfWeek(), $hoje->endOfWeek()])
            ->count();
        // Consulta para contar os pedidos da semana passada com base no created_at
        $pedidosSemanaPassada =  Item_pedido::whereBetween('created_at', [$semanaPassada->startOfWeek(), $semanaPassada->endOfWeek()])
            ->count();
        // Comparação
        if ($pedidosEstaSemana > $pedidosSemanaPassada) {
            $response['mensagemPedido']  = "os pedidos aumentaram esta semana.";
        } elseif ($pedidosEstaSemana < $pedidosSemanaPassada) {
            $response['mensagemPedido'] = "os pedidos diminuíram esta semana.";
        } else {
            $response['mensagemPedido']  = "os pedidos permaneceram iguais esta semana.";
        }

        /**calculo se  aumento de clientes  */
        $clientesEstaSemana =   User::where('level', 'Cliente')->whereBetween('created_at', [$hoje->startOfWeek(), $hoje->endOfWeek()])
            ->count();
        // Consulta para contar os clientes da semana passada com base no created_at
        $clientesSemanaPassada =   User::where('level', 'Cliente')->whereBetween('created_at', [$semanaPassada->startOfWeek(), $semanaPassada->endOfWeek()])
            ->count();
        // Comparação
        if ($clientesEstaSemana > $clientesSemanaPassada) {
            $response['mensagemClientes']  = "os clientes aumentaram esta semana.";
        } elseif ($clientesEstaSemana < $clientesSemanaPassada) {
            $response['mensagemClientes'] = "os clientes diminuíram esta semana.";
        } else {
            $response['mensagemClientes']  = "os clientes permaneceram iguais esta semana.";
        }
        return view('Admin.Home.index', $response);
    }
}
