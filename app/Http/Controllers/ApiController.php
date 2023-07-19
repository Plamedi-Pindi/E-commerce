<?php

namespace App\Http\Controllers;

use Error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Symfony\Contracts\Service\Attribute\Required;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use App\Models\Pedido;
use App\Models\User;
use App\Models\Produto;
use App\Models\Tipo_usuario;
use App\Models\Endereco;
use App\Models\Item_pedido;
use App\Models\Item_venda;
use App\Models\Venda;
use App\Models\Estoque;

class ApiController extends Controller
{
    //



    public function pagamento(Request $request)
    {
        try {

            $provider = new PayPalClient([]);
            $token = $provider->getAccessToken();
            $provider->setAccessToken($token);


            $total = \Cart::getTotal();
            $order = $provider->createOrder([

                "intent" => "CAPTURE",
                "purchase_units" => [
                    [
                        "amount" => [
                            "currency_code" => "USD",
                            "value" => $total,
                        ]
                    ]

                ],
                "application_context" => [
                    'cancel_url' => route('payment.cancel'),
                    'return_url' => route('payment.success'),
                ]
            ]);



            if ($order['status'] == 'CREATED') {


                // ############ PEDIDOS START################

                /************ declaracao de variaveis ***********/
                $usuario = User::findOrFail($request->id);
                $endereco = new Endereco;
                $pedido = new Pedido;
                $tipoUsuario = new Tipo_usuario;


                /************ Preenche tabela endereco ***********/
                $endereco->morada = $request->morada;
                $endereco->descricao = $request->descricao;
                $endereco->save();

                /************ Preenche tabela usuario ***********/
                $usuario->firstName = $request->firstName;
                $usuario->lastName = $request->lastName;
                $usuario->email = $request->email;
                $usuario->telefone = $request->telefone;
                $usuario->id_endereco =  $endereco->id;
                // $usuario->endereco->pais = $request->pais;
                // $usuario->endereco->cidade = $request->cidade;
                $usuario->update($request->all());

                /************ Preenche tabela pedidos ***********/

                $pedido->total = \Cart::getTotal();
                $pedido->data = $usuario->updated_at;

                $authUser = auth()->user();
                $pedido->id_user =  $authUser->id;
                $pedido->id_estado = 1;
                $pedido->id_pagamento = $order['id'];
                $pedido->save();

                /************ Preenche tabela itemPedidos ***********/
                $carItem = \Cart::getContent();
                foreach ($carItem as $intem) {
                    Item_pedido::create([

                        'quantidade' => $intem->quantity,
                        'precoUnitario' => $intem->price,
                        'pedido_id' => $pedido->id,
                        'id_produto' => $intem->id,
                    ]);
                }
            }

            // ############ PEDIDOS END################


            return redirect($order['links'][1]['href']);
        } catch (\Throwable $th) {

            return "Erro";
        }
    }




    public function cancel(Request $request)
    {
        dd($request->all());
    }

    public function success(Request $request)
    {
        $provider = new PayPalClient();
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $respoonse = $provider->capturePaymentOrder($request['token']);


        if (isset($respoonse['status']) && $respoonse['status'] == 'COMPLETED') {
            $carItems = \Cart::getContent();
            // $venda = new Venda;
            $id_pagamento = $respoonse['id'];
            $pedidos = Pedido::where('id_pagamento', $id_pagamento)->get();

            foreach ($pedidos as $pedido) {
                // $venda->totla = $pedido->total;
                // $venda->id_user = auth()->user()->id;
                // $venda->ref_pagamento = $id_pagamento;
                // $venda->save();

                //Buscar O registro da venda mais recente
                // $vendas = Venda::where('ref_pagamento', $id_pagamento)->get();
                // $itemVenda = new Item_venda;

                // // Preencher a tabela venda
                // foreach ($carItems as $item) {

                //     $itemVenda->quantidade = $item->quantity;
                //     $itemVenda->precoUnitario = $item->price;
                // } //FOREACH 1.1

                // Passar os dados da tabela itemPedidos para itemVendas
                $itemPedidos = Item_pedido::where('pedido_id', $pedido->id)->get();

                foreach ($itemPedidos as $itemPedido) {
                //     $itemVenda->id_produto = $itemPedido->id_produto;

                    // DESCONTAR O PRODUTO NO ESTOQUE
                    $estoques = Estoque::where('produto_id', $itemPedido->id_produto)->get();

                    foreach ($carItems as $item) {
                        foreach($estoques as $estoque){
                            $estoque->quantidade = ($estoque->quantidade - $item->quantity);
                            $estoque->update();

                        } // FOREACH 1.2.1.1

                    } //FOREACH 1.2.1

                } // FOREACH 1.2

                // Atualizar a tabela Pedidos
                $pedido->id_estado = 2;
                $pedido->update();

                // foreach ($vendas as $venda) {

                    // $itemVenda->id_venda = $venda->id;
                // } // FOREACH 1.3

                // $itemVenda->save();

                // Esvaziar o Carrinho de compra
                \Cart::clear();

            } //FOREACH 1

        } // END IF

        return redirect()->route('home')->with('success', 'O Pagamento foi efetuado com sucesso!');
    }
}
