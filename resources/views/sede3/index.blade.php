@extends('adminlte::page')

@section('title', 'DGHC')

@section('content_header')
    <h1>RELEVAMIENTO SEDE 3</h1>
@stop

@section('content')
<a href="sede3s/create" class="btn btn-primary mb-3">CREAR</a>

<table id="sede3s" class="table table-dark table-striped mt-4">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">IP</th>
            <th scope="col">PC</th>
            <th scope="col">Num_Serie</th>
            <th scope="col">Sector</th>
            <th scope="col">Usuario</th>
            <th scope="col">Disponible</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($sede3s as $sede3)
        <tr>
            <td>{{$sede3->id}}</td>
            <td>{{$sede3->ip}}</td>
            <td>{{$sede3->pc}}</td>
            <td>{{$sede3->num_serie}}</td>
            <td>{{$sede3->sector}}</td>
            <td>{{$sede3->usuario}}</td>
            <td>{{$sede3->disponible}}</td>
            <td>
                <form action="{{route ('sede3s.destroy', $sede3->id)}}" class="formulario-eliminar" method="POST">
                   <a href="/sede3s/{{$sede3->id}}/edit" class="btn btn-info">Editar</a>
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
    $('#sede3s').DataTable({
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