<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\Item_pedido;
use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response['produtos'] = Produto::get();
        return  view('Admin.products.list.index', $response);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $response['categorias'] = Categoria::get();
        return view('Admin.products.create.index',$response);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'nome' => 'required|string|max:255',
            'preco' => 'required|numeric|min:1',
            'descricao' => 'required|',
            'validade'    => 'required',
            'peso'    => 'required',
            'imagem' => 'required|mimes:jpg,png,gif,SVG,EPS',
        ]);

        $file = $request->file('imagem')->store('produtos');
        $school = Produto::create([
            'nome' => $request->nome,
            'preco' => $request->preco,
            'descricao' => $request->validade,
            'validade' => $request->validade,
            'peso' => $request->peso,
            'status' => "aprovado",
            'imagem' => $file,
            'id_categoria' => $request->id_categoria,
            'ref'=>12
        ]);
        return redirect()->route('admin.produtos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $response['product'] = Produto::with('estoque')->find($id);
        $response['pedidos']=Item_pedido::where('id_produto',$id)->count();
        return view('Admin.products.detalis.index',$response);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $response['product'] = Produto::find($id);
        $response['categorias'] = Categoria::get();
        return view('Admin.products.edit.index',$response);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'preco' => 'required|numeric|min:2',
            'descricao' => 'required|',
            'validade'    => 'required',
            'peso'    => 'required',
            'imagem' => 'mimes:jpg,png,gif,SVG,EPS',
        ]);



        if ($file = $request->file('imagem')) {
            $file = $request->file('imagem')->store('produtos');
        } else {
            $file = Produto::find($id)->imagem;
        }
        $school = Produto::find($id)->update([
            'nome' => $request->nome,
            'preco' => $request->preco,
            'descricao,' => $request->validade,
            'validade' => $request->validade,
            'peso' => $request->peso,
            'status' => "aprovado",
            'imagem' => $file,
            'id_categoria' => $request->id_categoria,
        ]);

        return redirect()->route('admin.produtos.index')->with('edit', '1');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Produto::find($id)->delete();
        return redirect()->back()->with('destroy', '1');
    }
}
