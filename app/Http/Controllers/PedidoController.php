<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pedido;

class PedidoController extends Controller
{
    public function criarPedido(Request $request) {
      $novoPedido = new pedido;
      $novoPedido->numero = $request->numero;
      $novoPedido->data = $request->data;
      $novoPedido->quantidade = $request->quantidade;
      $novoPedido->id_produto = $request->id_produto;
      $novoPedido->id_cliente = $request->id_cliente;
      $novoPedido->save();
    }
    public function getPedido($id) {
      pedido =pedido::findorfail($id);
      return response()->json([pedido]);
    }
    public function atualizaPedido(Request $request, $id){
      pedido =pedido::findorfail($id);
      if($request->numero){
        opedido->numero = $request->numero;
      }
      if($request->data){
        opedido->data = $request->data;
      }
      if($request->quantidade){
        opedido->quantidade = $request->quantidade;
      }
      if($request->id_produto){
        opedido->id_produto = $request->id_produto;
      }
      if($request->id_cliente){
        pedido->id_cliente = $request->id_cliente;
      }
      pedido->save();
    }
    public function deletaPedido($id){
     pedido::destroy($id);
    }
}
