/*$(document).ready(function(){
  window.history.replaceState({},'','FirmasCerNet2.0.php');
})*/
///////////VARIABLES GLOBALES
var id_documentacion = $("#primer_campo").val();
var id_persona = $("#segundo_campo").val();
var id_documentacion_encript = $("#tercer_campo").val();
var URLactual = window.location;




////FUNCIONES   A UTILIZAR
listar_documentacion_arriba();
ya_firmo();

////CAMPOS A OCULTAR
$("#m_1").hide();
$("#m_2").hide();
$("#ocultar_2").hide();
$("#ocultar_3").hide();


//////////// FUNCIÓN PARA CONOCER SI YA FIRMO EL DOCUMENTO

function ya_firmo() {
  const datos = {
    id_documentacion,
    id_persona
  }
  $.ajax({
    type: 'POST',
    data: datos,
    url: '../documentacion/yafirmo.php',
    success: function(response) {
      console.log(response);
      let traer = JSON.parse(response);

      if (traer.qr != null) {
        $("#firma_1").hide();
        $("#firma_2").hide();
        let msj = `<span class='text-muted' style='text-align:center;'>${traer.nombre} ${traer.apellido} Ya ha firmado:<br>
        Nombre proceso documental: ${traer.nombre_documento}.<br>
        OT: ${traer.ot}.<br>
        Empresas: Cercal Group - ${traer.empresa}.<br>
        El dia ${traer.fecha_registro}</span><br>
                     <img src="../documentacion/${traer.qr}" style="margin-left:150px" width="300px"/>`;
        $("#m").html(msj);
      } else {
        $("#id_t_firmantes").val(traer.id_t_firmantes);
      }




    }
  });
}



////////////CONTROLA EL EVENTO DE LAS FIRMAS
$("#firma_1").click(function() {
  $("#m").hide()
  $("#m_1").show();
  $("#m_2").hide();
});

$("#firma_2").click(function() {
  $("#m").hide()
  $("#m_2").show();
  $("#m_1").hide();
  generateToken()
});

//////////////CONTROLA LOS EVENTOS DE VOLVER
$("#volver1").click(function() {
  $("#m_1").hide();
  $("#m_2").hide();
  $("#m").show();
  ya_firmo();
});
$("#volver2").click(function() {
  $("#m_1").hide();
  $("#m_2").hide();
  $("#m").show()
  ya_firmo();
});


///////// GENERAR TOKEN
function generateToken() {
  var length = 50,
    charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789",
    retVal = "";
  for (var i = 0, n = charset.length; i < length; ++i) {
    retVal += charset.charAt(Math.floor(Math.random() * n));
  }
  $("#token_seguridad").val(retVal);
}



//// FUNCION PARA CONTROLAR LA FIRMA POR PLUMA
$("#firmar_1_c").click(function() {
  var canvas = document.getElementById('algo');
  var dataURL = canvas.toDataURL();
  var seleccion = 1;
  let id_t_firmantes = $("#id_t_firmantes").val();

  Swal.fire({
    title: 'Advertencia',
    text: 'Seguro, ¿Deseas firmar este archivo?',
    icon: 'question',
    showCloseButton: true,
    showCancelButton: true,
    confirmButtonText: 'Si',
    cancelButtonText: 'No'
  }).then((x) => {
    if (x.value) {
      const datos = {
        id_documentacion,
        id_persona,
        dataURL,
        seleccion,
        id_t_firmantes,
        URLactual
      }
      $.ajax({
        type: 'POST',
        data: datos,
        url: '../documentacion/firmar_ya.php',
        success: function(response) {
          console.log(response);

          if (response == "si") {
            ya_firmo();
            Swal.fire({
              title: 'Mensaje',
              text: 'Se ha firmado correctamente con pluma',
              icon: 'success',
              timer: 1500
            });
            ya_firmo();
            $("#firmar_1_c").hide();
          }
        }
      });
    }
  });

});

///// FUNCION PARA CONTROLAR LA FIRMA POR TOKEN
$("#firmar_2_c").click(function() {
  let identificacion = $("#identificacion_d").val();
  let token = $("#token_seguridad").val();
  let seleccion = 2;
  let id_t_firmantes = $("#id_t_firmantes").val();
  if (identificacion.length <= 4) {
    Swal.fire({
      title: 'Advertencia',
      text: 'Debes ingresar un numero de identificacion',
      icon: 'question',
      timer: 2000
    });
  } else {


    Swal.fire({
      title: 'Advertencia',
      text: 'Seguro, ¿Deseas firmar este archivo?',
      icon: 'question',
      showCloseButton: true,
      showCancelButton: true,
      confirmButtonText: 'Si',
      cancelButtonText: 'No'
    }).then((x) => {
      if (x.value) {
        const datos = {
          id_documentacion,
          id_persona,
          identificacion,
          token,
          seleccion,
          id_t_firmantes
        }
        $.ajax({
          type: 'POST',
          data: datos,
          url: '../documentacion/firmar_ya.php',
          success: function(response) {
            console.log(response);

            if (response == "si") {

              Swal.fire({
                title: 'Mensaje',
                text: 'Se ha firmado correctamente con token',
                icon: 'success',
                timer: 1500
              });
              ya_firmo();
              $("#firmar_2_c").hide();

            }
          }
        });
      }
    });

  }


});


////FUNCTION PARA LISTAR LOS DOCUMENTOS A VER
function listar_documentacion_arriba() {
  let id_documentacion = $("#primer_campo").val();


  $.ajax({
    type: 'POST',
    url: '../documentacion/listar_archivos_arriba.php',
    data: {
      id_documentacion
    },
    success: function(res) {
      console.log(res)
      let traer = JSON.parse(res);
      let template = "";
      let estado = "";
      let firma = "";
      let view = "";
      let template2 = "";
      let contador = 1;
      let firma2 = "";

      traer.forEach((x) => {

        template +=
          `
            <tr>
              <td>${x.fecha_registro}</td>
              <td>${x.nombre}</td>
              <td><img src='../documentacion/recursos/001-view.png' class='btn btn-primary' id='ver_c' data-id='${x.url}' data-mas='${x.id}'></td>
            </tr>
        
          `;

      });
      $("#listar_1").html(template);
    }
  });
}

////FUNCION QUE CONTROLA LA FIRMA
var limpiar = document.getElementById("limpiar");
var canvas = document.getElementById("algo");
var ctx = canvas.getContext("2d");
ctx.strokeStyle = "#222222";
ctx.lineWith = 2;
$(document).ready(function() {
  const img = new Image();
  img.src = 'linea.png';
  img.onload = function() {
    canvas.width = img.naturalWidth;
    canvas.height = img.naturalHeight;
    ctx.drawImage(img, 0, 0);
  };
});




$(document).on('click', '#limpiar', function() {

  location.reload();
});

window.requestAnimFrame = (function(callback) {
  return window.requestAnimationFrame ||
    window.webkitRequestAnimationFrame ||
    window.mozRequestAnimationFrame ||
    window.oRequestAnimationFrame ||
    window.msRequestAnimaitonFrame ||
    function(callback) {
      window.setTimeout(callback, 1000 / 60);
    };
})();

// Set up mouse events for drawing
var drawing = false;
var mousePos = {
  x: 0,
  y: 0
};
var lastPos = mousePos;
canvas.addEventListener("mousedown", function(e) {
  drawing = true;
  lastPos = getMousePos(canvas, e);
}, false);
canvas.addEventListener("mouseup", function(e) {
  drawing = false;
}, false);
canvas.addEventListener("mousemove", function(e) {
  mousePos = getMousePos(canvas, e);
}, false);

// Set up touch events for mobile, etc
canvas.addEventListener("touchstart", function(e) {
  mousePos = getTouchPos(canvas, e);
  var touch = e.touches[0];
  var mouseEvent = new MouseEvent("mousedown", {
    clientX: touch.clientX,
    clientY: touch.clientY
  });
  canvas.dispatchEvent(mouseEvent);
}, false);
canvas.addEventListener("touchend", function(e) {
  var mouseEvent = new MouseEvent("mouseup", {});
  canvas.dispatchEvent(mouseEvent);
}, false);
canvas.addEventListener("touchmove", function(e) {
  var touch = e.touches[0];
  var mouseEvent = new MouseEvent("mousemove", {
    clientX: touch.clientX,
    clientY: touch.clientY
  });
  canvas.dispatchEvent(mouseEvent);
}, false);

// Prevent scrolling when touching the canvas
document.body.addEventListener("touchstart", function(e) {
  if (e.target == canvas) {
    e.preventDefault();
  }
}, false);
document.body.addEventListener("touchend", function(e) {
  if (e.target == canvas) {
    e.preventDefault();
  }
}, false);
document.body.addEventListener("touchmove", function(e) {
  if (e.target == canvas) {
    e.preventDefault();
  }
}, false);

// Get the position of the mouse relative to the canvas
function getMousePos(canvasDom, mouseEvent) {
  var rect = canvasDom.getBoundingClientRect();
  return {
    x: mouseEvent.clientX - rect.left,
    y: mouseEvent.clientY - rect.top
  };
}

// Get the position of a touch relative to the canvas
function getTouchPos(canvasDom, touchEvent) {
  var rect = canvasDom.getBoundingClientRect();
  return {
    x: touchEvent.touches[0].clientX - rect.left,
    y: touchEvent.touches[0].clientY - rect.top
  };
}

// Draw to the canvas
function renderCanvas() {
  if (drawing) {
    ctx.moveTo(lastPos.x, lastPos.y);
    ctx.lineTo(mousePos.x, mousePos.y);
    ctx.stroke();
    lastPos = mousePos;
  }
}

// Allow for animation
(function drawLoop() {
  requestAnimFrame(drawLoop);
  renderCanvas();
})();

//////////////// VER PDF INDIVIDUAL
//// AQUI EMPIEZA LA FIRMAAQAAAAAAA
$(document).on("click", "#ver_c", function() {

  let lugar = $("#pdf_final").val();

  if (lugar == "externo") {
    window.open('https://cercal.net/CerNet2.0/informe_firmantes_final2.php?key=' + id_documentacion_encript);
  } else {
    window.open('http://localhost/CerNet2.0/informe_firmantes_final2.php?key=' + id_documentacion_encript);
  }

  /*
  $("#ocultar_1").hide();
  $("#ocultar_2").show();
 let url = $(this).attr('data-id');
  let id = $(this).attr('data-mas');
  let tipo = $(this).attr('data-algo');
   let imagen_lograda = "";
  if(tipo == 1){
    imagen_lograda = `<img src="${url}" width="100%" heigth="100%">`;
    var app = ( function () {
    var canvas = document.getElementById( 'imagen_aqui' ),
    context = canvas.getContext( '2d' ),

    // API
    public = { };

    public.loadPicture = function () {
    var imageObj = new Image();
    imageObj.src = url ;

    imageObj.onload = function () {
    context.drawImage( imageObj, 0, 0 );
    }
    };

    return public;
    } () );
    app.loadPicture()
    $("#imagen_pdf_completo").hide();
  }else{
    $("#imagen_aqui").hide()
    imagen_lograda = `<iframe src="${url}" style="width:100%;height:700px"></iframe>`;
    $("#imagen_pdf_completo").html(imagen_lograda);
  }
  
  */
  // $("#imagen_aqui").html(imagen_lograda);

});


/*
/////////// BOTTON PARA CERAR VISTA
$("#cerrar_close_cerrar").click(function(){
  $("#ocultar_1").show();
  $("#ocultar_2").hide();
  
});

//////// GENERAR INFORME

$("#generar_informe_firma").click(function(){
  window.open('https://cercal.net/CERNET/informe_firmantes_final.php?key='+id_documentacion);
});*/