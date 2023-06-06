<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Produto;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $busca = request('busca');
        if($busca){
            $categoriasMenu = Categoria::where([
                ['nome', 'like', '%'.$busca.'%']

        ])->get();

        }else{
            $categoriasMenu = Categoria::all();
        }

        return view('site.produtos.adminCategoria', ['categoriasMenu' => $categoriasMenu, 'busca' => $busca]);
    }
    // Cadastrar Categoria
    public function novacategoria(){
        $categoria = Categoria::all();
        return view('site.produtos.novaCategoria', compact('categoria'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $categoria = new Categoria;

       $categoria->nome = $request->nome;
       $categoria->slug = $request->slug;
       $categoria->descricao = $request->descricao;

       $categoria->save();

       return redirect('Admindashboard/categorias');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function show(Categoria $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoria = Categoria::findOrFail($id);
        return view('site.produtos.editarCategoria', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $categoria = Categoria::findOrFail($request->id);

        $categoria->nome = $request->nome;
        $categoria->slug = $request->slug;
        $categoria->descricao = $request->descricao;

        $categoria->update($request->all());

        return redirect('Admindashboard/categorias')->with('sucesso', 'A categoria selecionada foi atualizada');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Categoria::findOrFail($id)->delete();
        return redirect('Admindashboard/categorias');
    }
}
