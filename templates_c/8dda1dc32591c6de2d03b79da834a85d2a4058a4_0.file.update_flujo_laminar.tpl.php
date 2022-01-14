<?php
/* Smarty version 3.1.34-dev-7, created on 2022-01-13 19:56:01
  from '/home/god/public_html/CerNet2.0/templates/item/update_flujo_laminar.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_61e083d178bc77_28161340',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8dda1dc32591c6de2d03b79da834a85d2a4058a4' => 
    array (
      0 => '/home/god/public_html/CerNet2.0/templates/item/update_flujo_laminar.tpl',
      1 => 1642087957,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61e083d178bc77_28161340 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-header">
       <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['array_flujo_laminar']->value, 'flujo_laminar');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['flujo_laminar']->value) {
?>
        <h5 id="text_enunciado_flujo_laminar">
             Modificar flujo laminar
        </h5>
      </div>
      <input type="hidden" id="id_item_flujo_laminar" value="<?php echo $_smarty_tpl->tpl_vars['flujo_laminar']->value['id_item'];?>
">
      <div class="card-body">
         <div class="form-wizard-content">
          <div id="step-12">
            <div class="form-row">
              <div class="col-sm-6">
                <label>Nombre:</label>
                <input type="text" id="nombre_flujo_laminar" class="form-control" placeholder="Nombre flujo laminar" value="<?php echo $_smarty_tpl->tpl_vars['flujo_laminar']->value['nombre_item'];?>
">
              </div>
              <div class="col-sm-6">
                <label >Empresa</label>
                <select class="form-control" id="empresa_flujo_laminar" required>
                  <?php if ($_smarty_tpl->tpl_vars['flujo_laminar']->value['id_empresa_flujo'] == '') {?>
                  <option value="0">Seleccione....</option>
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
                  <?php } else { ?>
                  <option value="<?php echo $_smarty_tpl->tpl_vars['flujo_laminar']->value['id_empresa_flujo'];?>
"><?php echo $_smarty_tpl->tpl_vars['flujo_laminar']->value['nombre_empresa_flujo'];?>
</option>
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
                  <?php }?>

                </select>
              </div>

            </div>
            <br>
            <div class="form-row">
              <div class="col-sm-6">
                <label>Cantidad de filtros:</label>
                <input type="text" id="cantidad_filtros" class="form-control" placeholder="Cantidad de filtros" value="<?php echo $_smarty_tpl->tpl_vars['flujo_laminar']->value['cantidad_filtro'];?>
">
              </div>
            </div>

          
        <!---Cierre del content-->
      </div>
      <!--Cierre del wizard-->
      <div class="divider"></div>


    </div>
    <div class="row" style="text-align:center;">
      <div class="col-sm-12">
        <button class="mb-2 mr-2  btn-shadow btn-outline-2x btn btn-outline-info" id="btn_actualizar_flujo_laminar">Actualizar</button>
        <button class="mb-2 mr-2  btn-shadow btn-outline-2x btn btn-outline-success" id="btn_crear_flujo_laminar">Crear</button>
      </div>
    </div>
  <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
 
</div>
</div>
<?php echo '<script'; ?>
 type="text/javascript" src="design/js/update_flujo_laminar.js"><?php echo '</script'; ?>
><?php }
}
