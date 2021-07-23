@extends('adminlte::page')

@section('title', 'DGHC')

@section('content_header')
    <h1>EDITAR ARTICULO</h1>
@stop

@section('content')
    <form action="/articulos/{{$articulo->id}}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="" class="form-label">Categoria</label>
        <select id="idcategoria" name="idcategoria" class="form-control" tabindex="1">
            <option value="" selected="disabled">-- Seleccione una Categoria --</option>
            @foreach ($categorias as $categoria)
                <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Sector</label>
        <select id="idsector" name="idsector" class="form-control" tabindex="2">
            <option value="" selected="disabled">-- Seleccione un Sector --</option>
            @foreach ($sectors as $sector)
                <option value="{{$sector->id}}">{{$sector->nombre}}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Sede</label>
        <select id="idsede" name="idsede" class="form-control" tabindex="3">
            <option value="" selected="disabled">-- Seleccione una Sede --</option>
            @foreach ($sedes as $sede)
                <option value="{{$sede->id}}">{{$sede->nombre}}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Nombre</label>
        <input id="nombre" name="nombre" type="text" class="form-control" tabindex="4" value="{{$articulo->nombre}}">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Modelo</label>
        <input id="modelo" name="modelo" type="text" class="form-control" tabindex="5" value="{{$articulo->modelo}}">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Serial</label>
        <input id="serial" name="serial" type="text" class="form-control" tabindex="6" value="{{$articulo->serial}}">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Descripcion</label>
        <input id="descripcion" name="descripcion" type="text" class="form-control" tabindex="7" value="{{$articulo->descripcion}}">
    </div>
    <a href="/articulos" class="btn btn-secondary" tabindex="8">Cancelar</a>
    <button type="submit" class="btn btn-primary" tabindex="9">Guardar</button>
    
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop