@extends('adminlte::page')

@section('title', 'DGHC')

@section('content_header')
    <h1>LISTADO DE SECTORES</h1>
@stop

@section('content')
@can('sectors.create')
<a href="sectors/create" class="btn btn-primary mb-3">CREAR</a>
@endcan
<table id="sectors" class="table table-dark table-striped mt-4">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Creado por</th>
            <th scope="col">Modificado por</th>
            <th scope="col">Fec/Creacion</th>
            <th scope="col">Fec/Actualizacion</th>
            <th scope="col">Condicion</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($sectors as $sector)
        <tr>
            <td>{{$sector->id}}</td>
            <td>{{$sector->nombre}}</td>
            <td>{{$sector->descripcion}}</td>
            <td>{{$sector->created_by}}</td>
            <td>{{$sector->updated_by}}</td> 
            <td>{{$sector->created_at}}</td>
            <td>{{$sector->updated_at}}</td>
            <td>{{$sector->condicion}}</td>
            
            <td>
                <form action="{{route ('sectors.destroy', $sector->id)}}" class="formulario-eliminar" method="POST">
                   @can('sectors.edit')
                   <a href="/sectors/{{$sector->id}}/edit" class="btn btn-info">Editar</a>
                   @endcan
                   @csrf
                   @method('DELETE')
                   @can('sectors.destroy')
                   <button type="submit" class="btn btn-danger">Borrar</button>
                   @endcan
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>

</table>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" integrity="sha512-RXf+QSDCUQs5uwRKaDoXt55jygZZm2V++WUZduaU/Ui/9EGp3f/2KZVahFZBKGH0s774sd3HmrhUy+SgOFQLVQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   
    </-- Para usar los botones -->
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
   
    </-- Para los estilos de excel  -->
    <script src="https://cdn.jsdelivr.net/npm/datatables-buttons-excel-styles@1.1.5/js/buttons.html5.styles.min.js">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/datatables-buttons-excel-styles@1.1.5/js/buttons.html5.styles.templates.min.js">
    </script>
<script>
    $(document).ready(function() {
    $('#sectors').DataTable({
        "lengthMenu": [[5,10, 50, -1], [5,10, 50, "All"]],
        dom: "lBfrtip",
            buttons:{
                dom:{
                    button:{
                        clasName:'btn'
                    }
                },
                buttons:[
                {
                    extend: "excel",
                    text:'Exportar a Excel',
                    className: 'btn btn-outline-success',
                    excelStyles:{
                        template: 'blue_medium'
                    }
                    
                }
                /*{
                    extend: "pdf",
                    text: 'Exportar a PDF',
                    className: 'btn btn-danger'
                    btn-outline-success

                }*/

                ]
            }
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