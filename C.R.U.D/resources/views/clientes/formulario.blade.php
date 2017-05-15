@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                  Informe abaixo as informações do cliente
                  <a class="pull-right" href="{{ url('clientes') }}">Listagem de clientes</a>
                </div>

                <div class="panel-body">
                    @if(Session::has('mesnsagemSucesso')) <!-- Se o "Session" Posuir a msg "mesnsagemSucesso", faz.. -->
                        <div class="alert alert-success">{{ Session::get('mesnsagemSucesso') }}</div>
                    @endif

                    @if(Request::is('*/editar')) <!-- Para abrir o form de duas maneiras, se for edição..-->
                        {!! Form::model($cliente, ['method' => 'PATCH', 'url' => 'clientes/'.$cliente->id]) !!} <!-- Form model binding -->

                    @else
                        {!! Form::open(['url' => 'clientes/salvar']) !!}
                    @endif

                    {!! Form::label('nome','Nome') !!}
                    {!! Form::input('text','nome',null , ['class' => 'form-control', 'autofocus', 'placeholder' => 'Insira seu Nome']) !!}

                    {!! Form::label('idade','Idade') !!}
                    {!! Form::input('text','idade',null , ['class' => 'form-control', 'placeholder' => 'Insira sua Idade']) !!}

                    {!! Form::label('telefone','Telefone') !!}
                    {!! Form::input('text','telefone',null , ['class' => 'form-control','placeholder' => 'Insira seu Telefone']) !!}

                    {!! Form::label('endereco','Endereço') !!}
                    {!! Form::input('text','endereco',null , ['class' => 'form-control','placeholder' => 'Insira seu Endereco']) !!}

                    {!! Form::submit('Salvar', ['class' => 'btn btn-primary'])!!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
