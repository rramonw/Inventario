@extends('adminlte::page')

@section('title', 'DGHC')

@section('content_header')
    <h1>INVENTARIO GENERAL</h1>
@stop

@section('content')
<a href="articulos/create" class="btn btn-primary mb-3">CREAR</a>

<table id="articulos" class="table table-dark table-striped mt-4">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Categoria</th>
            <th scope="col">Sector</th>
            <th scope="col">Sede</th>
            <th scope="col">Nombre</th>
            <th scope="col">Modelo</th>
            <th scope="col">Serial</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($articulos as $articulo)
        <tr>
            <td>{{$articulo->id}}</td>
            <td>{{$articulo->idcategoria}}</td>
            <td>{{$articulo->idsector}}</td>
            <td>{{$articulo->idsede}}</td>
            <td>{{$articulo->nombre}}</td>
            <td>{{$articulo->modelo}}</td>
            <td>{{$articulo->serial}}</td>
            <td>{{$articulo->descripcion}}</td>
            <td>
                <form action="{{route ('articulos.destroy', $articulo->id)}}" class="formulario-eliminar" method="POST">
                   <a href="/articulos/{{$articulo->id}}/edit" class="btn btn-info">Editar</a>
                   @csrf
                   @method('DELETE')
                   <button type="submit" class="btn btn-danger">Borrar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>

</table>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css">

@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function() {
    $('#articulos').DataTable({
        "lengthMenu": [[5,10, 50, -1], [5,10, 50, "All"]]
    });
} );
</script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    
@if (session('eliminar') == 'ok')
    <script>
       Swal.fire(
      '¡Eliminado!',
      'El registro se elimino con exito.',
      'success'
    ) 
    </script>

@endif

<script>
     $('.formulario-eliminar').submit(function(e){
        e.preventDefault();

        Swal.fire({
  title: '¿Estas seguro?',
  text: "¡Este registro se eliminara definitivamente!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: '¡Si, eliminar!',
  cancelButtonText: 'Cancelar',
}).then((result) => {
  if (result.isConfirmed) {
    /*Swal.fire(
      'Deleted!',
      'Your file has been deleted.',
      'success'
    )*/
    this.submit();
  }
})
     });


    /*Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.isConfirmed) {
    Swal.fire(
      'Deleted!',
      'Your file has been deleted.',
      'success'
    )
  }
})*/
</script>
@stop