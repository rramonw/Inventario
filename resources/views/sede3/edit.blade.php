@extends('adminlte::page')

@section('title', 'DGHC')

@section('content_header')
    <h1>EDITAR REGISTRO</h1>
@stop

@section('content')
    <form action="/sede3s/{{$sede3->id}}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="" class="form-label">IP</label>
        <input id="ip" name="ip" type="text" class="form-control" tabindex="1" value="{{$sede3->ip}}">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">PC</label>
        <input id="pc" name="pc" type="text" class="form-control" tabindex="2" value="{{$sede3->pc}}">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Num_Serie</label>
        <input id="num_serie" name="num_serie" type="text" class="form-control" tabindex="3" value="{{$sede3->num_serie}}">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Sector</label>
        <input id="sector" name="sector" type="text" class="form-control" tabindex="4" value="{{$sede3->sector}}">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Usuario</label>
        <input id="usuario" name="usuario" type="text" class="form-control" tabindex="5" value="{{$sede3->usuario}}">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Disponible</label>
        <input id="disponible" name="disponible" type="text" class="form-control" tabindex="6" value="{{$sede3->disponible}}">
    </div>
    <a href="/sede3s" class="btn btn-secondary" tabindex="7">Cancelar</a>
    <button type="submit" class="btn btn-primary" tabindex="8">Guardar</button>
    
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop