<?php

Route::get('/', 'ClientesController@index');
Route::get('clientes','ClientesController@index');

Route::get('clientes/novo', 'ClientesController@novo');
Route::get('clientes/{cliente}/editar','ClientesController@editar');
Route::post('clientes/salvar', 'ClientesController@salvar');
Route::delete('clientes/{cliente}','ClientesController@excluir');
Route::patch('clientes/{cliente}', 'ClientesController@atualizar');//Segurança que não vai passar um "post"
