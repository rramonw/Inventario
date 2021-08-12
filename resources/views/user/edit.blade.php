@extends('adminlte::page')

@section('title', 'DGHC')

@section('content_header')
    <h1>EDITAR USUARIO</h1>
@stop

@section('content')
    
    <form action="/users/{{$user->id}}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="" class="form-label">Nombre</label>
        <input id="name" name="name" type="text" class="form-control" tabindex="1" value="{{$user->name}}">
         
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Correo</label>
        <input id="email" name="email" type="text" class="form-control" tabindex="2" value="{{$user->email}}">
         @error('email')
        <div class="alert alert-danger">
        
        <small>*{{$message}}</small>
        
        </div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Contraseña</label>
        <input id="password" name="password" type="password" class="form-control" tabindex="3" value="{{$user->password}}">
         @error('password')
        <div class="alert alert-danger">
        
        <small>*{{$message}}</small>
        
        </div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Listado de Roles</label>
    
            @foreach ($roles as $role)
            <div>
                <label>
                    <input type="checkbox" value="{{$role->id}}" name="roles[]">
                    {{$role->name}}
                </label>
            </div>
                
            @endforeach

        </select>
        
    </div>

     <a href="/users" class="btn btn-secondary" tabindex="4">Cancelar</a>
    <button type="submit" class="formulario-actualizar btn btn-primary" tabindex="5">Guardar</button>
    
</form>

@if (session('actualizar') == 'ok')
    <script>
       Swal.fire(
      '¡Actualizado!',
      'El registro se modificó con exito.',
      'success'
    )  
    </script>

@endif

<script>
     $('.formulario-actualizar').submit(function(e){
        e.preventDefault();

        Swal.fire({
  title: '¿Estas seguro?',
  text: "¡Este registro se actualizara!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: '¡Si, actualizar!',
  cancelButtonText: 'Cancelar',
}).then((result) => {
  if (result.isConfirmed) {
    
    this.submit();
  }
})
     });

</script>  

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@stop