@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span style="font-family:impact;">Clientes</span>
                  <a class="pull-right" href="{{url('clientes/novo')}}">Adicionar um cliente </a>
                </div>

                <div class="panel-body">
                  @if(Session::has('mesnsagemSucesso')) <!-- Se o "Session" Posuir a msg "mesnsagemSucesso", faz.. -->
                      <div class="alert alert-success">{{ Session::get('mesnsagemSucesso') }}</div>
                  @endif
                    <table class="table table-striped table-bordered table-hover table-responsive">
                      <th>Nome</th>
                      <th>Idade</th>
                      <th>Telefone</th>
                      <th>Endereço</th>
                      <th>Ações</th>
                      <tbody>
                        @foreach($clientes as $cliente)
                          <tr>
                             <td>{{ $cliente->nome }}</td>
                             <td>{{ $cliente->idade }}</td>
                             <td>{{ $cliente->telefone }}</td>
                             <td>{{ $cliente->endereco }}</td>
                             <td>
                               <a href="clientes/{{ $cliente->id }}/editar" class="btn btn-sm btn-info">Editar</a>
                               {!! Form::open(['method' => 'DELETE', 'url' => '/clientes/'.$cliente->id, 'style' => 'display: inline;']) !!}
                               <button type="submit" href="clientes/{{ $cliente->id }}/excluir" class="btn btn-sm btn-danger">Excluir</button>
                               {!! Form::close() !!}
                             </td>
                          </tr>
                          @endforeach
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
