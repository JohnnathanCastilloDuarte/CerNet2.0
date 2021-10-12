<?php
/* Smarty version 3.1.34-dev-7, created on 2021-10-11 17:43:00
  from 'C:\xampp\htdocs\CerNet2.0\templates\documentacion\head_templates\administracion_documentacion.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_61645b84ba4e81_64666795',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dacc3226028ac407487abd6292caa5e047f333c3' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CerNet2.0\\templates\\documentacion\\head_templates\\administracion_documentacion.tpl',
      1 => 1633966970,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61645b84ba4e81_64666795 (Smarty_Internal_Template $_smarty_tpl) {
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
          
            <th>Ver</th>
            <th>Comentarios</th>
            <th>Cronograma</th>
            <th>Estado</th>
              <th>Estado actual</th> 
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
