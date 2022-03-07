<?php
/* Smarty version 3.1.34-dev-7, created on 2022-02-25 20:13:43
  from 'C:\xampp\htdocs\CerNet2.0\templates\Calificacion\datos_calificacion.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_62192a67c501f4_05614098',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0092604579fedc00b7e1eaf399358a80d0c364b9' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CerNet2.0\\templates\\Calificacion\\datos_calificacion.tpl',
      1 => 1645816422,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62192a67c501f4_05614098 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="card">
    <div class="card-header">
        Generación de informes para calificación
        
    </div>
    <div class="card-body">
        <label for="">Clickea el boton del informe que quieras generar:</label>
        <br> 
        <br>
        <div class="row">
            <div class="col-sm-1">
                <button class="btn btn-info" id="crear_informe" value="URS">URS</button>
            </div>
            <div class="col-sm-1">
                <button class="btn btn-info" id="crear_informe" value="DQ">DQ</button>
            </div>
        </div>
    </div>
</div>
<hr>
<label for="">Informes de calificación generados:</label>
<hr>

<div class="card">
    <div class="card-body">
        <table class="table" id="example" style="text-align: center;">
            <thead>
                <th>#</th>
                <th>Empresa</th>
                <th>Tipo Informe</th>
                <th>Nombre informe</th>
                <th>Fecha creación</th>
                <th>Opciones</th>
            </thead>
            <tbody id="trae_informes">

            </tbody>
        </table>
    </div>
</div>

<?php echo '<script'; ?>
 src="design/js/controlador_calificaciones.js"><?php echo '</script'; ?>
><?php }
}
