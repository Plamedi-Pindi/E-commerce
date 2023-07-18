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
use App\Models\Venda;

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
                        'id_pedido' => $pedido->id,
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
            $venda = new Venda;
            $id_pagamento = $respoonse['id'];

        }
        
        dd($respoonse);


    }


}
