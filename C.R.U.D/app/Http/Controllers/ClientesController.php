<?php

namespace App\Http\Controllers;

use App\Cliente;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Redirect;

class ClientesController extends Controller
{
  public function index() //Métodos
  {
    $clientes = Cliente::get();
    return view('clientes/lista',['clientes' => $clientes]);
  }

  public function novo()
  {
    return view('clientes/formulario');
  }

  public function salvar(Request $request)
  {
    $cliente = new Cliente();

    $cliente = $cliente->create($request-> all());
    //Barra no inicio do Session, pois acessa a raiz. (pode importar a classe também.)
    \Session::flash('mesnsagemSucesso','Cliente foi cadastrado com sucesso!!!');

    return Redirect::to('clientes/novo');
  }

  public function editar($id)
  {
    $cliente = Cliente::findOrFail($id); //Acessando um método estatico. fOF caso não encontre, gera uma msg de erro.

    return view('clientes/formulario',['cliente' => $cliente]);
  }

  public function atualizar($id,Request $request)
  {
    $cliente = Cliente::findOrFail($id); //Verificando se existe tal cliente

    $cliente->update($request->all());

    \Session::flash('mesnsagemSucesso','Cliente foi atualizado com sucesso!!!');
    return Redirect::to('clientes/'.$cliente->id.'/editar');
  }

  public function excluir($id)
  {
    $cliente = Cliente::findOrFail($id);
    $cliente->delete();

    \Session::flash('mesnsagemSucesso','Cliente foi deletado com sucesso!!!');
      return Redirect::to('clientes');
  }
}
