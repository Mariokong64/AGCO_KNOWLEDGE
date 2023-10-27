var editorActual = null;

/* ====================================================================
    FUNCIÓN A EJECUTAR DESDE EL MÓDULO DE WINDOWS (JavaScriptGeneral.js)
  ====================================================================== */

$(document).on("click", ".btnRevisarTemaWindows", function () {
  var idTema = $(this).attr("idTemaWindows");
  var seccion = "windows";

  if (editorActual != null) {
    editorActual.destroy().then(() => {
      generarEditor(idTema, seccion);
    });
  } else {
    generarEditor(idTema, seccion);
  }
});

/* ====================================================================
    FUNCIÓN A EJECUTAR DESDE EL MÓDULO DE INTELISIS (JavaScriptGeneral.js)
  ====================================================================== */

$(document).on("click", ".btnRevisarTemaIntelisis", function () {
  var idTema = $(this).attr("idTemaIntelisis");
  var seccion = "intelisis";

  if (editorActual != null) {
    editorActual.destroy().then(() => {
      generarEditor(idTema, seccion);
    });
  } else {
    generarEditor(idTema, seccion);
  }
});

/* ==============================================================================
    FUNCIÓN A EJECUTAR DESDE EL MÓDULO DE AGCO SOLUTIONS (JavaScriptGeneral.js)
  ============================================================================== */

$(document).on("click", ".btnRevisarTemaAGCOsolutions", function () {
  var idTema = $(this).attr("idTemaAGCOsolutions");
  var seccion = "solutions";

  if (editorActual != null) {
    editorActual.destroy().then(() => {
      generarEditor(idTema, seccion);
    });
  } else {
    generarEditor(idTema, seccion);
  }
});

/* ==============================================================================
    FUNCIÓN A EJECUTAR DESDE EL MÓDULO DE INTERNET (JavaScriptGeneral.js)
  ============================================================================== */

$(document).on("click", ".btnRevisarTemaInternet", function () {
  var idTema = $(this).attr("idTemaInternet");
  var seccion = "internet";

  if (editorActual != null) {
    editorActual.destroy().then(() => {
      generarEditor(idTema, seccion);
    });
  } else {
    generarEditor(idTema, seccion);
  }
});

/* ==============================================================================
    FUNCIÓN A EJECUTAR DESDE EL MÓDULO DE SERVIDORES (JavaScriptGeneral.js)
  ============================================================================== */

$(document).on("click", ".btnRevisarTemaServidores", function () {
  var idTema = $(this).attr("idTemaServidores");
  var seccion = "servidores";

  if (editorActual != null) {
    editorActual.destroy().then(() => {
      generarEditor(idTema, seccion);
    });
  } else {
    generarEditor(idTema, seccion);
  }
});

/* ==============================================================================
    FUNCIÓN A EJECUTAR DESDE EL MÓDULO DE OFFICE (JavaScriptGeneral.js)
  ============================================================================== */

$(document).on("click", ".btnRevisarTemaOffice", function () {
  var idTema = $(this).attr("idTemaOffice");
  var seccion = "office";

  if (editorActual != null) {
    editorActual.destroy().then(() => {
      generarEditor(idTema, seccion);
    });
  } else {
    generarEditor(idTema, seccion);
  }
});

/* ==============================================================================
    FUNCIÓN A EJECUTAR DESDE EL MÓDULO DE AGCO AF SYSTEM (JavaScriptGeneral.js)
  ============================================================================== */

$(document).on("click", ".btnRevisarTemaAFsystem", function () {
  var idTema = $(this).attr("idTemaAFsystem");
  var seccion = "AFSystem";

  if (editorActual != null) {
    editorActual.destroy().then(() => {
      generarEditor(idTema, seccion);
    });
  } else {
    generarEditor(idTema, seccion);
  }
});

/* ==============================================================================
    FUNCIÓN A EJECUTAR DESDE EL MÓDULO DE WIKI (JavaScriptGeneral.js)
  ============================================================================== */

$(document).on("click", ".btnRevisarTemaWiki", function () {
  var idTema = $(this).attr("idTemaWiki");
  var seccion = "wiki";

  if (editorActual != null) {
    editorActual.destroy().then(() => {
      generarEditor(idTema, seccion);
    });
  } else {
    generarEditor(idTema, seccion);
  }
});

/* ==============================================================================
    FUNCIÓN A EJECUTAR DESDE EL MÓDULO DE OTROS (JavaScriptGeneral.js)
  ============================================================================== */

$(document).on("click", ".btnRevisarTemaOtros", function () {
  var idTema = $(this).attr("idTemaOtros");
  var seccion = "otros";

  if (editorActual != null) {
    editorActual.destroy().then(() => {
      generarEditor(idTema, seccion);
    });
  } else {
    generarEditor(idTema, seccion);
  }
});

/* ==================================================================================================
    FUNCIÓN GENERAL QUE GENERA EL EDITOR DE TEXTO Y LE PONE CONTENIDO DESEADO (JavaScriptGeneral.js)
  ================================================================================================== */

function generarEditor(idTema, seccion) {
  var editor;

  switch (seccion) {
    case "windows":
      var datos = new FormData();
      datos.append("idTemaWindows", idTema);
      break;

    case "intelisis":
      var datos = new FormData();
      datos.append("idTemaIntelisis", idTema);
      break;

    case "solutions":
      var datos = new FormData();
      datos.append("idTemasolutions", idTema);
      break;

    case "internet":
      var datos = new FormData();
      datos.append("idTemaInternet", idTema);
      break;

    case "servidores":
      var datos = new FormData();
      datos.append("idTemaServidores", idTema);
      break;

    case "office":
      var datos = new FormData();
      datos.append("idTemaOffice", idTema);
      break;

    case "AFSystem":
      var datos = new FormData();
      datos.append("idTemaAFsystem", idTema);
      break;

    case "wiki":
      var datos = new FormData();
      datos.append("idTemaWiki", idTema);
      break;

    case "otros":
      var datos = new FormData();
      datos.append("idTemaOtros", idTema);
      break;
  }

  $.ajax({
    url: "ajax/editorTexto.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {
      console.log(respuesta);

      //obtenemos los datos de las respuestas para concatenarlas y mostrar el mensaje de quién fué el último en editar
      var usuario = respuesta["nombre"];
      var fechaEdicion = respuesta["fecha_edicion"];
      var ultimaEdicion =
        "Última edición por " + usuario + " el " + fechaEdicion;
      document.getElementById("ultimaEdicion").setAttribute("type", "text");
      $("#ultimaEdicion").addClass("ultima-edicion");
      $("#ultimaEdicion").text(ultimaEdicion);

      //obtenemos los datos de las respuestas para concatenarlas y mostrar el mensaje de quién fué el usuario que creó el tema

      //cambiamos el atributo para que se muestre el tema y agregarle la clase de CSS para que cambie de formato
      document.getElementById("tema").setAttribute("type", "text");
      $("#tema").addClass("tema-cool");
      $("#EditarTitulo").val(respuesta["tema"]);
      $("#idTitulo").val(respuesta["id_contenido"]);
      $("#nombreTabla").val(respuesta.nombre_tabla);
      $("#tabla").val(respuesta.nombre_tabla);

      // Almacenamos el contenido del tema en el elemento oculto y ponemos el contenido de los inputs
      $("#contenidoTema").val(respuesta["contenido"]);
      $("#idTema").val(respuesta["id_contenido"]);
      $("#tema").text(respuesta["tema"]);
      $("#mi-contenedor").show();

      //Aquí le damos los valores del id y de la tabla al boton de eliminar si es que esta en el HTML debido a las credenciales del usuario

      var botonEliminar = document.querySelector(".btnEliminarTema");
      if (botonEliminar) {
        var nombreTabla = respuesta["nombre_tabla"];
        var idContenido = respuesta["id_contenido"];
        botonEliminar.setAttribute("idTema", idContenido);
        botonEliminar.setAttribute("nombreTabla", nombreTabla);
      }

      // Abrimos el editor CKEditor
      if (typeof ClassicEditor !== "undefined") {
        ClassicEditor.create(document.querySelector("#editorDeTexto"), {
          extraPlugins: [MyCustomUploadAdapterPlugin],
        })
          .then((createdEditor) => {
            // Obtenemos el contenido del elemento oculto y lo establecemos en CKEditor
            var contenido = $("#contenidoTema").val();
            createdEditor.setData(contenido);

            // Asignamos el valor del nuevo editor al editor actual para eliminarlo si volvemos a presionar el botón
            editor = createdEditor;
            editorActual = editor;
          })
          .catch((error) => {
            console.error(error);
          });
      }
    },
  });
}

/* =======================================================
                ELIMINAR CATEGORIA
======================================================== */

$(document).on("click", ".btnEliminarTema", function () {
  var idTema = $(this).attr("idTema");
  var nombreTabla = $(this).attr("nombreTabla");

  switch (nombreTabla) {
    case "temas_windows":
      ruta = "windows";
      break;

    case "temas_intelisis":
      ruta = "intelisis";
      break;

    case "temas_af_system":
      ruta = "afsystem";
      break;

    case "temas_agco_solutions":
      ruta = "agcosolutions";
      break;

    case "temas_internet":
      ruta = "internet";
      break;

    case "temas_office":
      ruta = "office";
      break;

    case "temas_servidores":
      ruta = "servidores";
      break;

    case "temas_wiki":
      ruta = "wiki";
      break;

    case "temas_otros":
      ruta = "otros";
      break;
  }

  swal({
    title: "¿Está seguro que quiere eliminar este tema?",
    text: "Esta acción no se puede deshacer",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    cancelButtonText: "Cancelar",
    confirmButtonText: "Si, eliminar",
    closeOnConfirm: false,
  }).then(function (result) {
    if (result.value) {
      window.location =
        "index.php?ruta=" +
        ruta +
        "&idTema=" +
        idTema +
        "&nombreTabla=" +
        nombreTabla;
    }
  });
});
