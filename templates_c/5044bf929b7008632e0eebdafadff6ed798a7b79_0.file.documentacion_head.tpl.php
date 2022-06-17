<?php
/* Smarty version 3.1.34-dev-7, created on 2021-08-04 17:32:08
  from '/home/god/public_html/CERNET/templates/documentacion/head_templates/documentacion_head.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_610acf18de6615_21205067',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5044bf929b7008632e0eebdafadff6ed798a7b79' => 
    array (
      0 => '/home/god/public_html/CERNET/templates/documentacion/head_templates/documentacion_head.tpl',
      1 => 1628098327,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_610acf18de6615_21205067 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-header">Modulo de documentacion</div>
       <div class="card-body">
         <div class="row">
          <div class="col-sm-5">
            <button class="btn btn-info" id="TodasHead">Todas</button>
            <button class="btn btn-info" id="RevisadasHead">Revisadas</button>
            <button class="btn btn-info" id="RechazadasHead">Rechazadas</button> 
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
