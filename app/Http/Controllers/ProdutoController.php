<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\produto;

class ProdutoController extends Controller
{
    public function criarProduto(Request $request) {
      $novoProduto = new produto;
      $novoProduto->codigo = $request->codigo;
      $novoProduto->nome = $request->nome;
      $novoProduto->preco = $request->preco;
      $novoProduto->id_categoria = $request->id_categoria;
      $novoProduto->save();
    }
    public function getProduto($id) {
      $produto = produto::findorfail($id);
      return response()->json([$produto]);
    }
    public function atualizarProduto(Request $request, $id){
      $produto = produto::findorfail($id);
      if($request->codigo){
        $produto->codigo = $request->codigo;
      }
      if($request->nome){
        $produto->nome = $request->nome;
      }
      if($request->preco){
        $produto->preco = $request->preco;
      }
      if($request->id_categoria){
        $produto->id_categoria = $request->id_categoria;
      }
      $produto->save();
    }
    public function deletarProduto($id){
      produto::destroy($id);
    }
}
