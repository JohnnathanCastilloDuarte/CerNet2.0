<?php
/* Smarty version 3.1.34-dev-7, created on 2021-01-06 17:03:25
  from '/home/god/public_html/Pruebas_Desarrollo/templates/documentacion/inicio_documentacion.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ff5ed5d655311_03873767',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2de0756134770c9d32f4f8ec106fb0e86f789a42' => 
    array (
      0 => '/home/god/public_html/Pruebas_Desarrollo/templates/documentacion/inicio_documentacion.tpl',
      1 => 1609952602,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ff5ed5d655311_03873767 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="row">
  <div class="col-sm-12">
    <div class="card-header">
      Gestion de documentaciòn para procesos GEP
    </div>
    <div class="card">
      
      <div class="row-form">
        <div class="col-sm-12"><br></div>
      </div>   
      
      <div class="row-form">
        <div class="col-sm-6">
          <label>Selecciona la empresa:</label>
          <select class="form-control" id="empresa_documentacion">
            <option value="0">Seleccione...</option>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['array_empresa']->value, 'empresa');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['empresa']->value) {
?>
            <option value="<?php echo $_smarty_tpl->tpl_vars['empresa']->value['id_empresa'];?>
"><?php echo $_smarty_tpl->tpl_vars['empresa']->value['nombre_empresa'];?>
</option>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
          </select>
        </div>
        <br>
      </div>
      
      <div class="row">
        
        <div class="col-sm-6">
          <div class="card">
            <div class="card-header">
              Ordenes de trabajo
            </div>
            <div class="card-body">
              <table class="table" style="text-align:center;">
                <thead>
                  <th># OT</th>
                  <th>Fecha creación</th>
                </thead>
              </table>
            </div>
          </div>
        </div>
        
        <div class="col-sm-6">
          <div class="card">
            <div class="card-header">
              Servicios
            </div>
            <div class="card-body">
              <table class="table" style="text-align:center;">
                  <thead>
                    <th>Servicio</th>
                    <th>Item</th>
                    <th>Fecha creación</th>
                  </thead>
              </table>
            </div>
          </div>
        </div>
        
      </div>
      
    </div>
  </div>
</div><?php }
}
