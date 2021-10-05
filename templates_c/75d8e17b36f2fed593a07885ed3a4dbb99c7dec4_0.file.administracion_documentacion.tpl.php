<?php
/* Smarty version 3.1.34-dev-7, created on 2021-08-11 14:52:30
  from '/home/god/public_html/CERNET/templates/documentacion/head_templates/administracion_documentacion.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_6113e42ed05f84_06198631',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '75d8e17b36f2fed593a07885ed3a4dbb99c7dec4' => 
    array (
      0 => '/home/god/public_html/CERNET/templates/documentacion/head_templates/administracion_documentacion.tpl',
      1 => 1628693521,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6113e42ed05f84_06198631 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-header">Modulo de documentacion</div>
       <div class="card-body">
         <div class="row">
          <div class="col-sm-5">
            <button class="btn btn-info" id="TodasHead">Todas</button>
            <button class="btn btn-info" id="RevisadasHead">Revisadas</button>
            <button class="btn btn-info" id="RechazadasHead">Con errores</button> 
          </div>
         </div>
         <br>
        <table class="table" style="text-align:center">
          <thead>
            <th>COD</th>
            <th>Empresa</th>
            <th>Nombre</th>
            <th>Creado por</th>
            <th>Fecha creación</th>
            <th>Estado</th> 
            <th colspan="3">Acciones</th>
          </thead>
          <tbody id="traer_documentacion_head">
          
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<?php echo '<script'; ?>
 type="text/javascript" src="design/js/funcion_documentacion_head.js"><?php echo '</script'; ?>
><?php }
}
