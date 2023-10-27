/* =======================================================
                   DATA TABLE
======================================================== */

$(document).ready( function () {
    $('#datatableWindows').DataTable();
});

/* =======================================================
                   EDITAR USUARIOS
======================================================== */

$(document).on("click", ".btnEditarUsuario", function () {
    var idUsuario = $(this).attr("idUsuario");
  
    var datos = new FormData();
    datos.append("idUsuario", idUsuario);
  
    $.ajax({
      url: "ajax/usuarios.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function (respuesta) {
        $("#editarNombreUsuario").val(respuesta["usuario"]);
        $("#idUsuario").val(respuesta["id_usuario"]);
        $("#editarNombreEmpleado").val(respuesta["nombre"]);
        $("#passwordActual").val(respuesta["contrasena"]);
        $("#editarPerfil").val(respuesta["perfil"]);
      },
    });
  });

  /* =======================================================
                ELIMINAR USUARIOS
======================================================== */

$(document).on("click", ".btnEliminarUsuario", function () {
  idUsuario = $(this).attr("idUsuario");

  swal({
    title: "¿Está seguro que quiere eliminar este usuario?",
    text: "Esta acción no se puede deshacer",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    cancelButtonText: "Cancelar",
    confirmButtonText: "Si, eliminar",
  }).then((result) => {
    if (result.value) {
      window.location = "index.php?ruta=usuarios&idUsuario=" + idUsuario;
    }
  });
});