<?php
/* Smarty version 3.1.34-dev-7, created on 2022-01-27 21:01:15
  from '/home/god/public_html/CerNet2.0/templates/documentacion/head_templates/administracion_documentacion.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_61f3081b213b74_18082346',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dd287fffe76997700eb273716c1ef55c8685ee01' => 
    array (
      0 => '/home/god/public_html/CerNet2.0/templates/documentacion/head_templates/administracion_documentacion.tpl',
      1 => 1643317213,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61f3081b213b74_18082346 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-header">Modulo de documentacion</div>
       <div class="card-body">
         <div class="row">
          <div class="col-sm-5">
          <!--
            <button class="btn btn-info" id="TodasHead">Todas</button>
            <button class="btn btn-info" id="RevisadasHead">Revisadas</button>
            <button class="btn btn-info" id="RechazadasHead">Con errores</button> -->
          </div>
         </div>
         <br>
        <table class="table" style="text-align:center">
          <thead>
            <th>COD</th>
            <th>Empresa</th>
            <th>Nombre</th>
            <th>Creado por</th>
          
            <th>Ver</th>
            <th>Comentarios</th>
            <th>Cronograma</th>
            <th>Estado</th>
            <th>Estado actual</th> 
             <th>Historial</th> 
          </thead>
          <tbody id="traer_documentacion_head">
          
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<br>

<div class="row" id="historial_aprobacion">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-header">Historial aprobación <button class="btn btn-danger" style="margin-left: 85%;" id="cerrar_historial">X</button></div>
      <div class="card-body">
      <br> 
      <div class="row" id="m">
      </div>
        <div class="row">
          <div class="col-sm-2" id="aqui_pdf_bton"></div>
        </div>
    </div>
    </div>
    
  </div>
</div>
<hr>
<div class="row" id="row_rechazos">
  <input type="hidden" id="id_documentacion_rechazos">
  <div class="col-sm-3"></div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-header">
        Rechazos documentación
        <button class="btn btn-danger" style="margin-left: auto;border-radius: 20px;" id="cerrar_tarjeta_rechazos">X</button>
      </div>
      <div class="card-body">
        <div class="row" id="enunciado_rechazo">
            <div class="col-sm-12">
              <label>Motivo rechazo</label>
              <textarea id="motivo_rechazo" style="width:100%">Escribe...</textarea>
          </div>
        </div>

        <br>

        <div class="row" style="text-align:center;">
          <div class="col-sm-12">
              <button class="btn btn-success" id="guarda_rechazo">Guardar rechazo</button>
          </div>
        </div>

        <br>
        
        <div class="row">
          <div class="col-sm-12">
            <div class="card">
              <div class="card-header">Historial rechazos x documentación</div>
              <div class="card-body">
                <table class='table' style="text-align: center;">
                  <thead>
                    <th>Quien rechaza</th>
                    <th>Motivo</th>
                    <th>Fecha</th> 
                  </thead>
                  <tbody id="aqui_todos_rechazos">

                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php echo '<script'; ?>
 type="text/javascript" src="design/js/funcion_documentacion_head.js"><?php echo '</script'; ?>
><?php }
}
