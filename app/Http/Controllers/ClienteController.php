<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\cliente;


class ClienteController extends Controller
{
    public function criarCliente(Request $request) {
    $novoCliente = new cliente;
    $novoCliente->codigo = $request->codigo;
    $novoCliente->nome = $request->nome;
    $novoCliente->endereco = $request->endereco;
    $novoCliente->telefone = $request->telefone;
    $novoCliente->limite_de_credito = $request->limite_de_credito;
    $novoCliente->status = $request->status;

    $novoCliente->save();
  }
  public function getCliente($id) {
    $cliente = cliente::findorfail($id);
    return response()->json([$cliente]);
  }
  public function atualizarCliente(Request $request, $id){
    $cliente = cliente::findorfail($id);
    if($request->codigo){
      $cliente->codigo = $request->codigo;
    }
    if($request->nome){
      $cliente->nome = $request->nome;
    }
    if($request->telefone){
      $cliente->telefone = $request->telefone;
    }
    if($request->endereco){
      $cliente->endereco = $request->endereco;
    }
    if($request->telefone){
      $cliente->telefone = $request->telefone;
    }
    if($request->limite_de_credito){
      $cliente->limite_de_credito = $request->limite_de_credito;
    }
    if($request->status){
      $cliente->status = $request->status;
    }
    $cliente->save();
  }
  public function deletarCliente($id){
    cliente::destroy($id);
  }
}
