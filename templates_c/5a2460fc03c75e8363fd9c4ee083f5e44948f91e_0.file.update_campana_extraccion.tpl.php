<?php
/* Smarty version 3.1.34-dev-7, created on 2021-10-27 18:36:16
  from 'C:\xampp\htdocs\CerNet2.0\templates\item\update_campana_extraccion.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_61798000ddd531_11476878',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5a2460fc03c75e8363fd9c4ee083f5e44948f91e' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CerNet2.0\\templates\\item\\update_campana_extraccion.tpl',
      1 => 1635352551,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61798000ddd531_11476878 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-header">
        <h5 id="text_enunciado_campana">
         
        </h5>
      </div>
      <div class="card-body">
        <div id="smartwizard2" class="forms-wizard-alt">
          <ul class="forms-wizard">
            <li>
              <a href="#step-12">
               <em>1</em><span>Identificación del equipo</span>
             </a>
           </li>
         </ul>
         <div class="form-wizard-content">
          <div id="step-12">
            <div class="form-row">
              <div class="col-sm-6">
                <label>Nombre:</label>
                <input type="text" id="nombre_campana" class="form-control" required>
              </div>
              <div class="col-sm-6">
                <label id="empresa_label">Empresa</label>
                <select class="form-control" id="empresa_campana" required>
                  <option value="<?php echo $_smarty_tpl->tpl_vars['bodega']->value['id_empresa'];?>
"><?php echo $_smarty_tpl->tpl_vars['bodega']->value['nombre_empresa'];?>
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
                </select>
              </div>

            </div>
            <br>
            <div class="form-row">
              <div class="col-sm-6">
                <label>Ubicación del equipo:</label>
                <input type="text" id="ubicacion_campana" class="form-control" placeholder="ubicacion del equipo en el lugar empresa" >
              </div>
              <div class="col-sm-6">
                <label>Dirección:</label>
                <input type="text" id="direccion_campana" class="form-control" placeholder="Direccion campana" >
              </div>
            </div>
            <br>
            <div class="form-row">
              <div class="col-sm-4">
                <label>Tipo de campana:</label>
                <input type="text" class="form-control" id="tipo_campana" >
              </div>
              <div class="col-sm-4">
                <label>Marca:</label>
                <input type="text" class="form-control" id="marca_campana" >
              </div>
              <div class="col-sm-4">
                <label>Modelo:</label>
                <input type="text" class="form-control" id="modelo_campana" >
              </div>
            </div>
            <br>
            <div class="form-row">
              <div class="col-sm-4">
                <label>Codigo interno:</label>
                <input type="text" id="codigo_interno_campana" class="form-control" placeholder="Codigo interno" >
              </div>
              <div class="col-sm-4">
                <label>Serie</label>
                <input type="text" id="serie_campana" class="form-control" placeholder="N° Serie" >
              </div>
              <div class="col-sm-4">
                <label>Año fabricación</label>
                <input type="date" id="fecha_fabricacion_campana" class="form-control" placeholder="" >
              </div>
            </div>
            <br>
            <div class="form-row">
              <div class="col-sm-4">
                <label>Requisito velocidad de aire</label>
                <input class="form-control" type="text" id="velocidad_aire_campana" placeholder="Velocidad aire" >
              </div>
            </div>
          </div>
        </div>
        <!---Cierre del content-->
      </div>
      <!--Cierre del wizard-->
      <div class="divider"></div>

  
  </div>
  <div class="row" style="text-align:center;">
    <div class="col-sm-12">
      <button class="mb-2 mr-2  btn-shadow btn-outline-2x btn btn-outline-info" id="btn_editar_item_campana">Actualizar</button>
      <button class="mb-2 mr-2  btn-shadow btn-outline-2x btn btn-outline-success" id="btn_nuevo_item_campana">Crear</button>
    </div>
  </div>

  </div>
</div>
</div>
<?php echo '<script'; ?>
 type="text/javascript" src="design/js/campana.js"><?php echo '</script'; ?>
><?php }
}
