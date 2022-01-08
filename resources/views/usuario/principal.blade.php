@extends('welcome')
@section('meta')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection

@section('cuerpo')
<div class="col-sm-12">
  <div class="card my-3 shadow p-3 mb-5 bg-body rounded-1">
    <div class="card-header">
      <h2 style="font-family: fantasy;">Usuarios registrados</h2>
    </div>
    <div class="card-body text-center">
      <div class="table-responsive">
        <table class="table table-hover table-striped my-3" id="usuarios">
          <thead class="table-dark">
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Nombre</th>
              <th scope="col">Apellido</th>
              <th scope="col">Correo</th>
              <th scope="col">Telefono</th>
              <th scope="col">Acciones</th>
            </tr>
          </thead>
         
        </table>
        </div>
    </div>
    <div class="card-footer text-end">
      <button type="button" class="btn btn-primary" style="color: white;" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
          <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
        </svg> Agregar empleado
      </button>
      
      
    </div>
  </div>
<!--Agregamos el modal para el registro del empleado-->
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Agregar empleado</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="form-empleado">
          @csrf
          <div class="row">
            <div class="col-sm-6">
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="name" required placeholder="Nombre" name="name">
                <label for="name">Nombre(s)</label>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="last_name" placeholder="Apellido" required name="last_name">
                <label for="last_name">Apellidos</label>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-floating mb-3">
                <input type="email" class="form-control" id="email" placeholder="Correo" required name="email">
                <label for="email">Correo</label>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="phone_number" placeholder="Correo" required name="phone_number">
                <label for="phone_number">Telefono</label>
              </div>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal" style="color: white">Registrar</button>
        </form>
      </div>
    </div>
  </div>
</div>

</div>

<!--Modal para eliminar-->
<!-- Modal -->
<div class="modal fade" id="modaleliminar" tabindex="-1" aria-labelledby="modaleliminarLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modaleliminarLabel">Eliminar empleado</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       ¿Desea eliminar este registro?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-danger" id="eliminar" name="eliminar" style="color: white">Guardar Cambios</button>
      </div>
    </div>
  </div>
</div>

<!--Modal para acutalizar-->
<div class="modal fade" id="actualizar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="actualizarLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="actualizarLabel">Actualizar datos</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="form-empleado-actualizar">
          @csrf
          <input type="hidden" name="id" id="id">
          <div class="row">
            <div class="col-sm-6">
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="nameac" required placeholder="Nombre" name="nameac">
                <label for="nameac">Nombre(s)</label>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="last_nameac" placeholder="Apellido" required name="last_nameac">
                <label for="last_nameac">Apellidos</label>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-floating mb-3">
                <input type="email" class="form-control" id="emailac" placeholder="Correo" required name="emailac">
                <label for="emailac">Correo</label>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="phone_numberac" placeholder="Correo" required name="phone_numberac">
                <label for="phone_numberac">Telefono</label>
              </div>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-success" data-bs-dismiss="modal" style="color: white">Actualizar datos</button>
        </form>
      </div>
    </div>
  </div>
</div>




<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.3/datatables.min.js"></script>

<script>
  $( document ).ready(function() {
    $('#usuarios').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: '{{route('obtener')}}',
        columns: [
            {data: 'id'},
            {data: 'name'},
            {data: 'last_name'},
            {data: 'email'},
            {data: 'phone_number'},
            {data: 'action', orderable: false}
        ]
    });
    
});
</script>
<script>
   $( "#form-empleado" ).submit(function( event ) {
 
  event.preventDefault();
  var nombre= $('#name').val();
  var last_name= $('#last_name').val();
  var email= $('#email').val();
  var phone_number= $('#phone_number').val();
  var token = $('input[name=_token]').val();
  
  $.ajax({
    url: '{{route('user.store')}}',
    type: 'POST',
    data: {
      nombre: nombre,
      last_name: last_name,
      email: email,
      phone_number: phone_number,
      _token: token,
    },
    success:function(response){
    if(response){
      $('#form-empleado')[0].reset();
      toastr.success('We do have the Kapua suite available.', 'Turtle Bay Resort', {timeOut: 5000});
      $('#usuarios').DataTable().ajax.reload();
    }
  },
  });
  
});
</script>
<script>
  var id_eliminar;
  $(document).on('click', '.delete', function(){
      id_eliminar = $(this).attr('id');
      console.log(id_eliminar);
      $('#modaleliminar').modal('show');
  });

  $('#eliminar').click(function(){
    console.log('hola');
    
    $.ajax({
        url: 'user/eliminar/'+id_eliminar,
        
        beforeSend:function(){
          $('#eliminar').text('Eliminando..');
        },
        success:function(data){
          setTimeout(function(){
              $('#modaleliminar').modal('hide');
              $('#usuarios').DataTable().ajax.reload();
              $('#eliminar').text('Guardar Cambios');
            },2000);
        },
    });
  });
</script>
<script>
  function editarUser(id){
    console.log(id);
    $.get('user/'+id+'/edit', function(usuario){
      $('#nameac').val(usuario.name);
      $('#last_nameac').val(usuario.last_name);
      $('#emailac').val(usuario.email);
      $('#phone_numberac').val(usuario.phone_number);
      $('#id').val(usuario.id);
      $('#actualizar').modal('show');
    });
  }
</script>
  <script>
    $( "#form-empleado-actualizar" ).submit(function( event ) {
        event.preventDefault();
       
        var id= $('#id').val();
        var nombre2= $('#nameac').val();
        var last_name2= $('#last_nameac').val();
        var email2= $('#emailac').val();
        var phone_number2= $('#phone_numberac').val();
        var token2 = $('input[name=_token]').val();
        console.log(id);
        $.ajax({
    url: '{{route('actualizaruser')}}',
    type: 'POST',
    data: {
      id: id,
      nombre: nombre2,
      last_name: last_name2,
      email: email2,
      phone_number: phone_number2,
      _token: token2,
    },
    success:function(response){
    if(response){
      $('#actualizar').modal('hide');
      toastr.success('We do have the Kapua suite available.', 'Turtle Bay Resort', {timeOut: 5000});
      $('#usuarios').DataTable().ajax.reload();
    }
  },
  });
  console.log(id);
    });

  </script>
@endsection