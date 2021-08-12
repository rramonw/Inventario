@extends('adminlte::page')

@section('title', 'DGHC')

@section('content_header')
    <h1>EDITAR CATEGORIA</h1>
@stop

@section('content')
    <form action="/categorias/{{$categoria->id}}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="" class="form-label">Nombre</label>
        <input id="nombre" name="nombre" type="text" class="form-control" tabindex="1" value="{{$categoria->nombre}}">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Descripcion</label>
        <input id="descripcion" name="pc" type="text" class="form-control" tabindex="2" value="{{$categoria->descripcion}}">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Condicion</label>
        <input id="condicion" name="condicion" type="boolean" class="form-control" tabindex="3" value="{{$categoria->condicion}}">
    </div>
    
    <a href="/categorias" class="btn btn-secondary" tabindex="4">Cancelar</a>
    <button type="submit" class="btn btn-primary" tabindex="5">Guardar</button>
    
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop