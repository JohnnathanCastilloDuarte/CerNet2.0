<?php
/* Smarty version 3.1.34-dev-7, created on 2022-05-26 16:47:48
  from '/home/god/public_html/CerNet2.0/templates/item/update_flujo_laminar.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_628faf349a2e86_11045833',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8dda1dc32591c6de2d03b79da834a85d2a4058a4' => 
    array (
      0 => '/home/god/public_html/CerNet2.0/templates/item/update_flujo_laminar.tpl',
      1 => 1653574827,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_628faf349a2e86_11045833 (Smarty_Internal_Template $_smarty_tpl) {
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
         <?php if ($_smarty_tpl->tpl_vars['flujo_laminar']->value['id_item'] == '') {?>
         Crear flujo laminar
         <?php } else { ?>
         Modificar flujo laminar
         <?php }?>
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
              <label>Empresa:</label>
              <input type="hidden" id="id_empresa" value="<?php echo $_smarty_tpl->tpl_vars['flujo_laminar']->value['id_empresa_flujo'];?>
">
              <input type="text" id="buscador_empresa" class="form-control" placeholder="Ingresa el nombre de la empresa" value="<?php echo $_smarty_tpl->tpl_vars['flujo_laminar']->value['nombre_empresa'];?>
">
              <div >
                <table class="table" id="aqui_resultados_empresa">
                </table>
              </div>
            </div>

          </div>
          <div class="">

          </div>
          <br>
          <div class="form-row">
            <div class="col-sm-6">
              <label>Cantidad de filtros:</label>
              <input type="text" id="cantidad_filtros" class="form-control" placeholder="Cantidad de filtros" value="<?php echo $_smarty_tpl->tpl_vars['flujo_laminar']->value['cantidad_filtro'];?>
">
            </div>
            <div class="col-sm-6">
              <label>Dirección:</label>
              <input class="form-control" type="text" name="" id="direccion_flujo" value="<?php echo $_smarty_tpl->tpl_vars['flujo_laminar']->value['direccion'];?>
" placeholder="Dirección">
            </div>
          </div>
          <div class="form-row">
            <div class="col-sm-6">
              <label>Ubicación interna:</label>
              <input type="text" id="ubicacion_interna" class="form-control" placeholder="Ubicación interna" value="<?php echo $_smarty_tpl->tpl_vars['flujo_laminar']->value['ubicacion_interna'];?>
">
            </div>
            <div class="col-sm-6">
              <label>Área interna:</label>
              <input class="form-control" type="text" name="" id="area_interna" value="<?php echo $_smarty_tpl->tpl_vars['flujo_laminar']->value['area_interna'];?>
" placeholder="Área interna">
            </div>
          </div>
          <br>
          <div class="form-row">
              <div class="col-sm-6">
                <label>Clasificación OMS :</label>
                <select class="form-control" id="clasificacion_oms">
                  <?php if ($_smarty_tpl->tpl_vars['flujo_laminar']->value['clasificacion_oms'] == '') {?>
                  <option value="">Seleccione...</option>
                  <option value="A">Clase A</option>
                  <option value="B">Clase B</option>
                  <option value="C">Clase C</option>
                  <option value="D">Clase D</option>
                  <option value="No Aplica">No Aplica</option>
                  <?php } elseif ($_smarty_tpl->tpl_vars['flujo_laminar']->value['clasificacion_oms'] != '') {?>
                  <option value="<?php echo $_smarty_tpl->tpl_vars['flujo_laminar']->value['clasificacion_oms'];?>
">Clase <?php echo $_smarty_tpl->tpl_vars['flujo_laminar']->value['clasificacion_oms'];?>
</option>
                  <option value="A">Clase A</option>
                  <option value="B">Clase B</option>
                  <option value="C">Clase C</option>
                  <option value="D">Clase D</option>
                  <option value="No Aplica">No Aplica</option>
                  <?php }?>
                </select>
              </div>
              <div class="col-sm-6">
                <label>Clasificación ISO:</label>
                <select class="form-control" id="clasificacion_iso">
                 <?php if ($_smarty_tpl->tpl_vars['flujo_laminar']->value['clasificacion_oms'] == '') {?>
                  <option value="">Seleccione...</option>
                  <option value="5">ISO 5</option>
                  <option value="6">ISO 6</option>
                  <option value="7">ISO 7</option>
                  <option value="8">ISO 8</option>
                  <option value="9">ISO 9</option>
                  <option value="No Aplica">No Aplica</option>
                <?php } elseif ($_smarty_tpl->tpl_vars['flujo_laminar']->value['clasificacion_oms'] != '') {?>
                   <option value="<?php echo $_smarty_tpl->tpl_vars['flujo_laminar']->value['clasificacion_iso'];?>
">ISO <?php echo $_smarty_tpl->tpl_vars['flujo_laminar']->value['clasificacion_iso'];?>
</option>
                   <option value="5">ISO 5</option>
                   <option value="6">ISO 6</option>
                   <option value="7">ISO 7</option>
                   <option value="8">ISO 8</option>
                   <option value="9">ISO 9</option>
                   <option value="No Aplica">No Aplica</option>
                <?php }?>   
                <select>
              </div>
            </div>
          <br>
          <div class="form-row">
            <div class="col-sm-4">
              <label>Tipo cabina:</label>
              <select class="form-control" id="tipo_cabina">
                <?php if ($_smarty_tpl->tpl_vars['flujo_laminar']->value['tipo_cabina'] == '') {?>
                <option value="">Seleccione...</option>
                <option>Vertical</option>
                <option>Horizontal</option>
                <?php } else { ?>
                <option value="<?php echo $_smarty_tpl->tpl_vars['flujo_laminar']->value['tipo_cabina'];?>
"><?php echo $_smarty_tpl->tpl_vars['flujo_laminar']->value['tipo_cabina'];?>
</option>
                <option>Vertical</option>
                <option>Horizontal</option>
                <?php }?>
              </select>
            </div>
            <div class="col-sm-4">
              <label>Marca:</label>
              <input class="form-control" type="text" name="" id="marca" value="<?php echo $_smarty_tpl->tpl_vars['flujo_laminar']->value['marca'];?>
" placeholder="Marca">
            </div>
            <div class="col-sm-4">
              <label>Modelo:</label>
              <input class="form-control" type="text" name="" id="modelo" value="<?php echo $_smarty_tpl->tpl_vars['flujo_laminar']->value['modelo'];?>
" placeholder="Modelo">
            </div>
          </div>
           <div class="form-row">
            <div class="col-sm-4">
              <label>N serie:</label>
              <input type="text" id="n_serie" class="form-control" placeholder="Numero de serie" value="<?php echo $_smarty_tpl->tpl_vars['flujo_laminar']->value['serie'];?>
">
            </div>
            <div class="col-sm-4">
              <label>Código:</label>
              <input class="form-control" type="text" name="" id="codigo" value="<?php echo $_smarty_tpl->tpl_vars['flujo_laminar']->value['codigo'];?>
" placeholder="Código">
            </div>
             <div class="col-sm-4">
              <label>Tipo dimenciones:</label>
              <input type="text" id="tipo_dimeciones" class="form-control" placeholder="Tipo dimenciones" value="<?php echo $_smarty_tpl->tpl_vars['flujo_laminar']->value['tipo_dimenciones'];?>
">
            </div>
          </div> 
          <div class="form-row">
           
            <div class="col-sm-4">
              <label>Limite penetración:</label>
              <input class="form-control" type="text" name="" id="limite_penetracion" value="<?php echo $_smarty_tpl->tpl_vars['flujo_laminar']->value['limite_penetracion'];?>
" placeholder="Limite penetracion">
            </div>
            <div class="col-sm-4">
              <label>Requisito de velocidad de aire:</label>
              <input class="form-control" type="text" name="" id="eficiencia" value="<?php echo $_smarty_tpl->tpl_vars['flujo_laminar']->value['eficiencia'];?>
" placeholder="Requisito de velocidad de aire">
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
>
  <?php echo '<script'; ?>
 type="text/javascript" src="design/js/validar_campos_vacios.js"><?php echo '</script'; ?>
><?php }
}
