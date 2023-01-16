$(function () {
    $.ajax({
        url: 'get_employees',
        type: 'GET',
        success: function(response) {
            var resultado = '<table id="table_servicios" class="table table-striped table-bordered nowrap" style="width:100%">';
            resultado += '<thead class="teal darken-4 lighten-2 white-text">';
            resultado += '<tr>';
              resultado += '<th>ID</th>';
              resultado += '<th>Nombre</th>';
              resultado += '<th>Apellido Paterno</th>';
              resultado += '<th>Apellido Materno</th>';
              resultado += '<th>Puesto</th>';
              resultado += '<th>Fecha de Ingreso</th>';
              resultado += '<th>Compañia</th>';
              resultado += '<th>Opciones</th>';
            resultado += '</tr>';
            resultado += '</thead>';
            resultado += "<tbody>";
              $.each(response.employees, function(index) {
                resultado += "<tr>";
                resultado += '<td>' + String(response.employees[index].id) + '</td>';
                resultado += '<td>' + String(response.employees[index].name) + '</td>';
                resultado += '<td>' + String(response.employees[index].first_name) + '</td>';
                resultado += '<td>' + String(response.employees[index].last_name) + '</td>';
                resultado += '<td>' + String(response.employees[index].position) + '</td>';
                resultado += '<td>' + response.employees[index].start_date + '</td>';
                resultado += '<td>' + String(response.employees[index].company) + '</td>';
                resultado +='<td><a href="#!" onclick="editar(' + response.employees[index].id + ')"><i class="fa-solid fa-pencil"></i></a>&nbsp&nbsp';          
                resultado +='<a href="#!" onclick="eliminar(' + response.employees[index].id + ')"><i class="fa-solid fa-trash-can text-danger"></i></li></a>';           
                resultado+='</td>';
               
                resultado += "</tr>";
              });
      
              resultado += '</tbody></table>';
            $("#content").html(resultado);
            $('#table_servicios').DataTable({
                dom: 'Blfrtip',
                lengthMenu: [
                    [10, 25, 50, -1],
                    ['10 Filas', '25 Filas', '50 Filas', 'Mostrar todo']
                ],
              "scrollX": true,
              "language": {
                "search": "Buscar:",
                "searchPlaceholder": "Busca por columnas",
                "lengthMenu": "Mostrar " + '<select id="Stabla">' +
                  '<option value="5">5</option>' +
                  '<option value="10">10</option>' +
                  '<option value="15">15</option>' +
                  '<option value="20">20</option>' +
                  '<option value="25">25</option>' +
                  '<option value="-1">TOTAL</option>' + '</select> registros' + "",
                "infoEmpty": "No hay resultado para esa búsqueda",
                "sInfoEmpty": "Mostrando 0 - 0 de un total de 0 registros",
                "sInfo": "Mostrando _START_ - _END_ de un total de _TOTAL_ registros",
                "sEmptyTable": "No hay activos registrados en Sistema",
                "sInfoFiltered": "(Filtrado de un total de _MAX_ total registros)",
                "sLoadingRecords": "Cargando...",
                "sProcessing": "Procesando...",
                "paginate": {
                  "previous": "<< Anterior ",
                  "next": ">> Siguiente",
                  "sLast": "Ultimo",
                  "sFirst": "Primero"
                }
              }
            });
        swal.close();
        },
        beforeSend: function() {
            Swal.fire({
                title: "",
                text: "Cargando",
                imageUrl: "img/loader.gif",
                button: false,
                allowOutsideClick: false
            });
        },
        error: function(data) {
            Swal.fire("Error","Problemas con la carga, intenta actualizando la pagina!", "error"
                );
        console.log('Error:', data);
        }
    });
});

function save_company(){
        $.ajax({
        url: 'save_company',
        type: 'GET',
        data: {
            name_company:$("#name_company").val()
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
            Swal.close();
            Swal.fire({
                title: 'Guardado Correctamente',
                icon:"success",
                confirmButtonColor: '#6ECCAF',
                confirmButtonText: 'OK',
              }).then((result) => {
                if (result.isConfirmed) {
                  location.reload();
                
                }
              })
        },
        beforeSend: function() {
        Swal.fire({
            title: "",
            text: "Cargando",
            imageUrl: "img/loader.gif",
            button: false,
            allowOutsideClick: false
        });
        },
        error: function(data) {
            Swal.fire("Error","Problemas con la carga, intenta actualizando la pagina!", "error"
            );
        console.log('Error:', data);
        }
    });
}
function save_position(){
        $.ajax({
        url: 'save_position',
        type: 'GET',
        data: {
            name_position:$("#name_position").val()
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
            Swal.close();
            Swal.fire({
                title: 'Guardado Correctamente',
                icon:"success",
                confirmButtonColor: '#6ECCAF',
                confirmButtonText: 'OK',
              }).then((result) => {
                if (result.isConfirmed) {
                  location.reload();
                
                }
              })
        },
        beforeSend: function() {
        Swal.fire({
            title: "",
            text: "Cargando",
            imageUrl: "img/loader.gif",
            button: false,
            allowOutsideClick: false
        });
        },
        error: function(data) {
            Swal.fire("Error","Problemas con la carga, intenta actualizando la pagina!", "error"
            );
        console.log('Error:', data);
        }
    });
}
function save_employee(){
        $.ajax({
        url: 'save_employee',
        type: 'GET',
        data: {
            name_employee:$("#name_employee").val(),
            first_name:$("#first_name").val(),
            last_name:$("#last_name").val(),
            start_date:$("#start_date").val(),
            position:$("#position").val(),
            company:$("#company").val()
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
            Swal.close();
            Swal.fire({
                title: 'Guardado Correctamente',
                icon:"success",
                confirmButtonColor: '#6ECCAF',
                confirmButtonText: 'OK',
              }).then((result) => {
                if (result.isConfirmed) {
                  location.reload();
                
                }
              })
        },
        beforeSend: function() {
        Swal.fire({
            title: "",
            text: "Cargando",
            imageUrl: "img/loader.gif",
            button: false,
            allowOutsideClick: false
        });
        },
        error: function(data) {
            Swal.fire("Error","Problemas con la carga, intenta actualizando la pagina!", "error"
            );
        console.log('Error:', data);
        }
    });
}
function update_employee(){
        $.ajax({
        url: 'update_employee',
        type: 'GET',
        data: {
            id:$("#id_employee").val(),
            name_employee:$("#name_employee").val(),
            first_name:$("#first_name").val(),
            last_name:$("#last_name").val(),
            start_date:$("#start_date").val(),
            position:$("#position").val(),
            company:$("#company").val()
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
            Swal.close();
            Swal.fire({
                title: 'Guardado Correctamente',
                icon:"success",
                confirmButtonColor: '#6ECCAF',
                confirmButtonText: 'OK',
              }).then((result) => {
                if (result.isConfirmed) {
                  location.reload();
                
                }
              })
        },
        beforeSend: function() {
        Swal.fire({
            title: "",
            text: "Cargando",
            imageUrl: "img/loader.gif",
            button: false,
            allowOutsideClick: false
        });
        },
        error: function(data) {
            Swal.fire("Error","Problemas con la carga, intenta actualizando la pagina!", "error"
            );
        console.log('Error:', data);
        }
    });
}
function editar(id){
    $.ajax({
        url: 'get_employee',
        type: 'GET',
        data: {
            id:id,
        },
        success: function(response) {
          $("#id_employee").val(response.employee.id);
          $("#name_employee").val(response.employee.name);
          $("#first_name").val(response.employee.first_name);
          $("#last_name").val(response.employee.last_name);
          $("#start_date").val(response.employee.start_date);
          $("#company").val(parseInt(response.employee.company_id)).trigger('change');
          $("#position").val(parseInt(response.employee.position_id)).trigger('change');
        },
        error: function() {
            Swal.fire("Problemas con la carga, intenta actualizando la pagina!", 
                "error"
                );
        }
    });
    $("#btn_guardar").attr("hidden", "true");
    $("#btn_modificar").removeAttr("hidden");
    var myModal = new bootstrap.Modal(document.getElementById('userModal'))
    myModal.show() 
}

function eliminar(id){
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
          confirmButton: 'btn btn-success',
          cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
      })
      
      swalWithBootstrapButtons.fire({
        title: 'Está seguro de eliminar el empleado?',
        text: "Se eliminará permanentemente!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Aceptar',
        cancelButtonText: 'Cancelar',
        reverseButtons: true
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: 'delete_employee',
                type: 'GET',
                data: {
                    id: id,
                },
                success: function(response) {
                    swalWithBootstrapButtons.fire(
                        'Eliminado!',
                        'El empleado se elimino correctamente.',
                        'success'
                      )
                },
                error: function() {
                    Swal.fire("Error", ":(", "error");
                }
            });
        
        } else if (
          /* Read more about handling dismissals below */
          result.dismiss === Swal.DismissReason.cancel
        ) {
          swalWithBootstrapButtons.fire(
            'Cancelado',
            'El empleado no se elimino',
            'info'
          )
        }
      })
}