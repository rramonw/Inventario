@extends('adminlte::page')

@section('title', 'DGHC')

@section('content_header')
    <h1>CREAR REGISTRO</h1>
@stop

@section('content')
    <form action="/relevamientos" method="POST">
    @csrf
    <div class="mb-3">
        <label for="" class="form-label">IP</label>
        <input id="ip" name="ip" type="text" class="form-control" tabindex="1">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">PC</label>
        <input id="pc" name="pc" type="text" class="form-control" tabindex="2">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Num_Serie</label>
        <input id="num_serie" name="num_serie" type="text" class="form-control" tabindex="3">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Sector</label>
        <input id="sector" name="sector" type="text" class="form-control" tabindex="4">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Usuario</label>
        <input id="usuario" name="usuario" type="text" class="form-control" tabindex="5">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Disponible</label>
        <input id="disponible" name="disponible" type="text" class="form-control" tabindex="6">
    </div>
    <a href="/relevamientos" class="btn btn-secondary" tabindex="7">Cancelar</a>
    <button type="submit" class="btn btn-primary" tabindex="8">Guardar</button>
    
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop