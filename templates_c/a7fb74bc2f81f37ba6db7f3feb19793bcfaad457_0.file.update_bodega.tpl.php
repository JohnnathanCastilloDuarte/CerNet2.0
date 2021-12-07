<?php
/* Smarty version 3.1.34-dev-7, created on 2021-11-08 13:45:49
  from '/home/god/public_html/CerNet2.0/templates/item/update_bodega.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_61892a0de9b955_74961366',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a7fb74bc2f81f37ba6db7f3feb19793bcfaad457' => 
    array (
      0 => '/home/god/public_html/CerNet2.0/templates/item/update_bodega.tpl',
      1 => 1634879379,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61892a0de9b955_74961366 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-header">
        <h6>
          Editar bodega
        </h6>
      </div>

      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['array_bodega']->value, 'bodega');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['bodega']->value) {
?>
      <div class="card-body">
        <div id="smartwizard2" class="forms-wizard-alt">
          <ul class="forms-wizard">
            <li>
              <a href="#step-12">
													<em>1</em><span>Identificación</span>
											</a>
            </li>
            <li>
              <a href="#step-22">
													<em>2</em><span>Infraestructura</span>
											</a>
            </li>
            <li>
              <a href="#step-32">
													<em>3</em><span>Equipos</span>
											</a>
            </li>
            <li id="si_envia">
              <a href="#step-42">
													<em>4</em><span>Evidencia</span>
											</a>
            </li>

          </ul>
          <div class="form-wizard-content">
            <div id="step-12">
              <div class="form-row">
                <div class="col-sm-6">
                  <input type="hidden" id="id_item_bodega" value="<?php echo $_smarty_tpl->tpl_vars['id_item']->value;?>
">
                  <div class="position-relative form-group">
                    <label>Nombre bodega:</label><input name="text" id="nombre_bodega" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['bodega']->value['nombre_item'];?>
">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="position-relative form-group">
                    <label>Empresa:</label>
                    <select id="empresa_bodega" class="form-control">
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
              </div>



              <div class="form-row">
                <div class="col-sm-12">
                  <div class="position-relative form-group">
                    <label>Descripción:</label>
                    <textarea class="form-control" id="descripcion_item_bodega"><?php echo $_smarty_tpl->tpl_vars['bodega']->value['descripcion_bodega'];?>
</textarea>
                  </div>
                </div>
              </div>

              <div class="form-row">
                <div class="col-sm-6">
                  <div class="position-relative form-group">
                    <label>Dirección bodega:</label>
                    <input id="direccion_bodega" type="text" class="form-control" placeholder="Dirección de la bodega" value="<?php echo $_smarty_tpl->tpl_vars['bodega']->value['direccion'];?>
">
                  </div>
                </div>
                <div class="col-sm-6">
                  <label>Codigo interno / N° Serie:</label>
                  <input type="text" id="codigo_bodega" class="form-control" placeholder="Codigo bodega" value="<?php echo $_smarty_tpl->tpl_vars['bodega']->value['codigo_interno'];?>
">
                </div>
              </div>

              <?php
$__section_i_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['explode_producto']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_i_0_total = $__section_i_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_0_total !== 0) {
for ($__section_i_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_0_iteration <= $__section_i_0_total; $__section_i_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?> <?php if ($_smarty_tpl->tpl_vars['explode_producto']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)] == "Alimentos") {?> <?php $_smarty_tpl->_assignInScope('alimentos', "checked");?> <?php } elseif ($_smarty_tpl->tpl_vars['explode_producto']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)] == "Cosméticos") {?> <?php $_smarty_tpl->_assignInScope('cosmeticos', "checked");?> <?php } elseif ($_smarty_tpl->tpl_vars['explode_producto']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)] == "Dispositivos Médicos") {?> <?php $_smarty_tpl->_assignInScope('dispositivos_medicos', "checked");?>
              <?php } elseif ($_smarty_tpl->tpl_vars['explode_producto']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)] == "Farmacéuticos") {?> <?php $_smarty_tpl->_assignInScope('farmaceutico', "checked");?> <?php } elseif ($_smarty_tpl->tpl_vars['explode_producto']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)] == "Insumos Médicos") {?> <?php $_smarty_tpl->_assignInScope('insumos_medicos', "checked");?> <?php } elseif ($_smarty_tpl->tpl_vars['explode_producto']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)] == "Materias Primas") {?> <?php $_smarty_tpl->_assignInScope('materias_primas', "checked");?> <?php } elseif ($_smarty_tpl->tpl_vars['explode_producto']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)] == "Sustancias Peligrosas") {?> <?php $_smarty_tpl->_assignInScope('sustancias_peligrosas', "checked");?> <?php } elseif ($_smarty_tpl->tpl_vars['explode_producto']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)] == "Otros") {?> <?php $_smarty_tpl->_assignInScope('otros', "checked");?> <?php } else { ?> <?php $_smarty_tpl->_assignInScope('otros_e', $_smarty_tpl->tpl_vars['explode_producto']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]);?> <?php }?> <?php
}
}
?>

              <div class="form-row">
                <div class="col-sm-6">
                  <div class="position-relative form-group">
                    <label>Productos que almacena:</label>
                    <br>
                    <input type="checkbox" name="alimentos" id="productos" value="Alimentos" <?php echo $_smarty_tpl->tpl_vars['alimentos']->value;?>
>
                    <label>Alimentos</label>
                    <br>
                    <input type="checkbox" name="cosmetios" id="productos" value="Cosméticos" <?php echo $_smarty_tpl->tpl_vars['cosmeticos']->value;?>
>
                    <label>Cosméticos</label>
                    <br>
                    <input type="checkbox" name="dispocitivosmedicos" id="productos" value="Dispositivos Médicos" <?php echo $_smarty_tpl->tpl_vars['dispositivos_medicos']->value;?>
>
                    <label>Dispositivos Médicos</label>
                    <br>
                    <input type="checkbox" name="farmaceuticos" id="productos" value="Farmacéuticos" <?php echo $_smarty_tpl->tpl_vars['farmaceutico']->value;?>
>
                    <label>Farmacéuticos</label>
                    <br>
                    <input type="checkbox" name="insumosmedicos" id="productos" value="Insumos Médicos" <?php echo $_smarty_tpl->tpl_vars['insumos_medicos']->value;?>
>
                    <label>Insumos Médicos</label>
                    <br>
                    <input type="checkbox" name="materiasprimas" id="productos" value="Materias Primas" <?php echo $_smarty_tpl->tpl_vars['materias_primas']->value;?>
>
                    <label>Materias Primas</label>
                    <br>
                    <input type="checkbox" name="sustanciaspeligrosas" id="productos" value="Sustancias Peligrosas" <?php echo $_smarty_tpl->tpl_vars['sustancias_peligrosas']->value;?>
>
                    <label>Insumos Médicos</label>
                    <br>
                    <input type="checkbox" name="otros" value="Otros" id="productos" <?php echo $_smarty_tpl->tpl_vars['otros']->value;?>
>
                    <label>Otros</label>
                    <br>
                  </div>
                </div>
              </div>

              <div id="otros_productos">
                <div class="form-row">
                  <div class="col-sm-12">
                    <label>Descripción de productos que almacena</label>
                    <textarea id="productos_bodega" class="form-control" placeholder="Describa los productos que almacena"><?php echo $_smarty_tpl->tpl_vars['otros_e']->value;?>
</textarea>
                  </div>
                </div>
              </div>
            </div>
            <!--Cierre del step 12-->




            <div id="step-22">
              <div class="form-row">
                <div class="col-sm-4">
                  <div class="position-relative form-group">
                    <label>Largo de la bodega:</label>
                    <input type="text" id="largo_bodega" class="form-control" placeholder="Largo bodega" value="<?php echo $_smarty_tpl->tpl_vars['bodega']->value['largo'];?>
">
                  </div>
                </div>
                <div class="col-sm-4">
                  <label>Ancho de la bodega:</label>
                  <input type="text" id="ancho_bodega" class="form-control" placeholder="Ancho bodega" value="<?php echo $_smarty_tpl->tpl_vars['bodega']->value['ancho'];?>
">
                </div>
                <div class="col-sm-4">
                  <label>Superficie de la bodega:</label>
                  <input type="text" id="superficie_bodega" class="form-control" placeholder="Superficie bodega" value="<?php echo $_smarty_tpl->tpl_vars['bodega']->value['superficie'];?>
">
                </div>
              </div>

              <div class="form-row">
                <div class="col-sm-6">
                  <div class="position-relative form-group">
                    <label>Volumen de la bodega:</label>
                    <input type="text" id="volume_bodega" class="form-control" placeholder="Volumen bodega" value="<?php echo $_smarty_tpl->tpl_vars['bodega']->value['volumen'];?>
">
                  </div>
                </div>
                <div class="col-sm-6">
                  <label>Altura de la bodega:</label>
                  <input type="text" id="altura_bodega" class="form-control" placeholder="Altura bodega" value="<?php echo $_smarty_tpl->tpl_vars['bodega']->value['altura'];?>
">
                </div>
              </div>

              <?php
$__section_f_1_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['explode_muro']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_f_1_total = $__section_f_1_loop;
$_smarty_tpl->tpl_vars['__smarty_section_f'] = new Smarty_Variable(array());
if ($__section_f_1_total !== 0) {
for ($__section_f_1_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_f']->value['index'] = 0; $__section_f_1_iteration <= $__section_f_1_total; $__section_f_1_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_f']->value['index']++){
?> <?php if ($_smarty_tpl->tpl_vars['explode_muro']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_f']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_f']->value['index'] : null)] == "Muro de hormigón") {?> <?php $_smarty_tpl->_assignInScope('hormigon', "checked");?> <?php } elseif ($_smarty_tpl->tpl_vars['explode_muro']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_f']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_f']->value['index'] : null)] == "Muro de isopol") {?> <?php $_smarty_tpl->_assignInScope('isopol', "checked");?> <?php } elseif ($_smarty_tpl->tpl_vars['explode_muro']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_f']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_f']->value['index'] : null)] == "Muro de ladrillo") {?> <?php $_smarty_tpl->_assignInScope('ladrillo', "checked");?> <?php } elseif ($_smarty_tpl->tpl_vars['explode_muro']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_f']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_f']->value['index'] : null)] == "Muro de madera") {?> <?php $_smarty_tpl->_assignInScope('madera', "checked");?> <?php } elseif ($_smarty_tpl->tpl_vars['explode_muro']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_f']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_f']->value['index'] : null)] == "otro muro") {?> <?php $_smarty_tpl->_assignInScope('otro_muro', "checked");?> <?php } elseif ($_smarty_tpl->tpl_vars['explode_muro']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_f']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_f']->value['index'] : null)] == "- ") {?> <?php $_smarty_tpl->_assignInScope('otro_muro_e', $_smarty_tpl->tpl_vars['explode_muro']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]);?> <?php }?> <?php
}
}
?>



              <div class="form-row">
                <div class="col-sm-6">
                  <div class="position-relative form-group">
                    <label>Tipo de muro:</label>
                    <br>
                    <input type="checkbox" name="tipo_muro_bodega_1" id="tipo_muro" value="Muro de hormigón" <?php echo $_smarty_tpl->tpl_vars['hormigon']->value;?>
>
                    <label> Muro de hormigón </label>
                    <br>
                    <input type="checkbox" name="tipo_muro_bodega_2" id="tipo_muro" value="Muro de isopol" <?php echo $_smarty_tpl->tpl_vars['isopol']->value;?>
>
                    <label> Muro de isopol </label>
                    <br>
                    <input type="checkbox" name="tipo_muro_bodega_3" id="tipo_muro" value="Muro de ladrillo" <?php echo $_smarty_tpl->tpl_vars['ladrillo']->value;?>
>
                    <label> Muro de ladrillo </label>
                    <br>
                    <input type="checkbox" name="tipo_muro_bodega_4" id="tipo_muro" value="Muro de madera" <?php echo $_smarty_tpl->tpl_vars['madera']->value;?>
>
                    <label> Muro de madera </label>
                    <br>
                    <input type="checkbox" name="tipo_muro_bodega_5" id="tipo_muro" value="otro_muro" <?php echo $_smarty_tpl->tpl_vars['otro_muro']->value;?>
>
                    <label> Otro tipo de muro </label>
                    <textarea class="form-control" id="otro_tipo_muro_bodega" placeholder="Especifica el tipo de muro"><?php echo $_smarty_tpl->tpl_vars['otro_muro_e']->value;?>
</textarea>
                  </div>
                </div>
                <?php
$__section_i_2_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['explode_cielo']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_i_2_total = $__section_i_2_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_2_total !== 0) {
for ($__section_i_2_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_2_iteration <= $__section_i_2_total; $__section_i_2_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?> <?php if ($_smarty_tpl->tpl_vars['explode_cielo']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)] == "Cielo de hormigón") {?> <?php $_smarty_tpl->_assignInScope('cielo_hormigon', "checked");?> <?php } elseif ($_smarty_tpl->tpl_vars['explode_cielo']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)] == "Cielo de isopol") {?> <?php $_smarty_tpl->_assignInScope('cielo_isopol', "checked");?> <?php } elseif ($_smarty_tpl->tpl_vars['explode_cielo']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)] == "Cielo de plachas metalicas") {?> <?php $_smarty_tpl->_assignInScope('cielo_plachas_metalicas', "checked");?> <?php } elseif ($_smarty_tpl->tpl_vars['explode_cielo']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)] == "otro cielo") {?> <?php $_smarty_tpl->_assignInScope('otro_cielo', "checked");?> <?php } elseif ($_smarty_tpl->tpl_vars['explode_cielo']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)] == "- ") {?> <?php $_smarty_tpl->_assignInScope('otro_cielo_e', $_smarty_tpl->tpl_vars['explode_cielo']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]);?> <?php }?> <?php
}
}
?>



                <div class="col-sm-6">
                  <div class="position-relative form-group">
                    <label>Tipo de cielo</label>
                    <br>
                    <input type="checkbox" name="tipo_cielo_bodega_1" id="tipo_cielo" value="Cielo de hormigón" <?php echo $_smarty_tpl->tpl_vars['cielo_hormigon']->value;?>
>
                    <label> Cielo de hormigón </label>
                    <br>
                    <input type="checkbox" name="tipo_cielo_bodega_2" id="tipo_cielo" value="Cielo de isopol" <?php echo $_smarty_tpl->tpl_vars['cielo_isopol']->value;?>
>
                    <label> Cielo de isopol </label>
                    <br>
                    <input type="checkbox" name="tipo_cielo_bodega_3" id="tipo_cielo" value="Cielo de plachas metalicas" <?php echo $_smarty_tpl->tpl_vars['cielo_plachas_metalicas']->value;?>
>
                    <label> Cielo de planchas metálicas </label>
                    <br>
                    <input type="checkbox" name="tipo_cielo_bodega_4" id="tipo_cielo" value="otro_cielo" <?php echo $_smarty_tpl->tpl_vars['otro_cielo']->value;?>
>
                    <label> Otro tipo de cielo </label>
                    <textarea class="form-control" id="otro_tipo_cielo_bodega" placeholder="Especifica el tipo de cielo"><?php echo $_smarty_tpl->tpl_vars['otro_cielo_e']->value;?>
</textarea>
                  </div>
                </div>
              </div>

            </div>
            <!--Cierre del step 22-->

            <?php
$__section_i_3_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['explode_climatizacion']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_i_3_total = $__section_i_3_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_3_total !== 0) {
for ($__section_i_3_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_3_iteration <= $__section_i_3_total; $__section_i_3_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?> <?php if ($_smarty_tpl->tpl_vars['explode_climatizacion']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)] == "Mezclador de aire") {?> <?php $_smarty_tpl->_assignInScope('mezclador_aire', "checked");?> <?php } elseif ($_smarty_tpl->tpl_vars['explode_climatizacion']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)] == "Sistema HVAC") {?> <?php $_smarty_tpl->_assignInScope('sistema_hvac', "checked");?> <?php } elseif ($_smarty_tpl->tpl_vars['explode_climatizacion']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)] == "Split") {?>
            <?php $_smarty_tpl->_assignInScope('split', "checked");?> <?php } elseif ($_smarty_tpl->tpl_vars['explode_climatizacion']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)] == "No climatizacion") {?> <?php $_smarty_tpl->_assignInScope('no_climatizacion', "checked");?> <?php }?> <?php
}
}
?>
            <div id="step-32">
              <div class="form-row">
                <div class="col-sm-6">
                  <label>-Sistema de climatización</label>
                  <br>
                  <input type="checkbox" name="sistema_climatizacion_1" id="climatizacion" value="Mezclador de aire" <?php echo $_smarty_tpl->tpl_vars['mezclador_aire']->value;?>
>
                  <label>Mezclador de aire</label>
                  <br>
                  <input type="checkbox" name="sistema_climatizacion_2" id="climatizacion" value="Sistema HVAC" <?php echo $_smarty_tpl->tpl_vars['sistema_hvac']->value;?>
>
                  <label>Sistema HVAC</label>
                  <br>
                  <input type="checkbox" name="sistema_climatizacion_3" id="climatizacion" value="Split" <?php echo $_smarty_tpl->tpl_vars['split']->value;?>
>
                  <label>Split</label>
                  <br>
                  <input type="checkbox" name="otro_climatizacion_4" id="climatizacion" value="No climatizacion" <?php echo $_smarty_tpl->tpl_vars['no_climatizacion']->value;?>
>
                  <label>No cuenta</label>
                  <br>
                </div>
                <?php if ($_smarty_tpl->tpl_vars['bodega']->value['monitoreo'] == "Si") {?> <?php $_smarty_tpl->_assignInScope('monitore_1', "checked");?> <?php } else { ?> <?php $_smarty_tpl->_assignInScope('monitore_2', "checked");?> <?php }?>
                <div class="col-sm-6">
                  <label>-Sistema de monitoreo de temperatura</label><br>
                  <label>Si </label>
                  <input type="radio" name="s_m_t" value="Si" id="s_m_t" <?php echo $_smarty_tpl->tpl_vars['monitore_1']->value;?>
>
                  <br>
                  <label>No </label>
                  <input type="radio" name="s_m_t" value="No" id="s_m_t" <?php echo $_smarty_tpl->tpl_vars['monitore_2']->value;?>
>
                </div>
              </div>
              <br> <?php if ($_smarty_tpl->tpl_vars['bodega']->value['alarma'] == "Si") {?> <?php $_smarty_tpl->_assignInScope('alarma_1', "checked");?> <?php } else { ?> <?php $_smarty_tpl->_assignInScope('alarma_2', "checked");?> <?php }?>
              <div class="form-row">
                <div class="col-sm-6">
                  <label>-Sistema de monitoreo de temperatura - Alarmas</label><br>
                  <label>Si </label>
                  <input type="radio" name="s_m_t_a" value="Si" id="s_m_t_a" <?php echo $_smarty_tpl->tpl_vars['alarma_1']->value;?>
>
                  <br>
                  <label>No </label>
                  <input type="radio" name="s_m_t_a" value="No"  id="s_m_t_a"<?php echo $_smarty_tpl->tpl_vars['alarma_2']->value;?>
>
                </div>
                <?php
$__section_i_4_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['explode_plano']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_i_4_total = $__section_i_4_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_4_total !== 0) {
for ($__section_i_4_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_4_iteration <= $__section_i_4_total; $__section_i_4_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?> <?php if ($_smarty_tpl->tpl_vars['explode_plano']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)] == "Arquitectura") {?> <?php $_smarty_tpl->_assignInScope('arquitectura', "checked");?> <?php } elseif ($_smarty_tpl->tpl_vars['explode_plano']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)] == "Flujo de procesos") {?> <?php $_smarty_tpl->_assignInScope('flujo_procesos', "checked");?> <?php } elseif ($_smarty_tpl->tpl_vars['explode_plano']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)] == "Sensores de monitoreo") {?> <?php $_smarty_tpl->_assignInScope('sensores_monitoreo', "checked");?> <?php } elseif ($_smarty_tpl->tpl_vars['explode_plano']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)] == "No cuenta con planos") {?> <?php $_smarty_tpl->_assignInScope('no_planos', "checked");?> <?php }?> <?php
}
}
?>

                <div class="col-sm-6">
                  <label>-Planos</label><br>
                  <input type="checkbox" name="p_s_m_t_a" id="planos" value="Arquitectura" <?php echo $_smarty_tpl->tpl_vars['arquitectura']->value;?>
>
                  <label>Arquitectura</label>
                  <br>
                  <input type="checkbox" name="p_s_m_t_a" id="planos" value="Flujo de procesos" <?php echo $_smarty_tpl->tpl_vars['flujo_procesos']->value;?>
>
                  <label>Flujo de procesos</label>
                  <br>
                  <input type="checkbox" name="p_s_m_t_a" id="planos" value="Sensores de monitoreo" <?php echo $_smarty_tpl->tpl_vars['sensores_monitoreo']->value;?>
>
                  <label>Sensores de monitoreo</label>
                  <br>
                  <input type="checkbox" name="no_planos" id="planos" value="No cuenta con planos" <?php echo $_smarty_tpl->tpl_vars['no_planos']->value;?>
>
                  <label>No cuenta con planos</label>
                  <br>
                </div>
              </div>
              <br> <?php if ($_smarty_tpl->tpl_vars['bodega']->value['analisis_riesgo']) {?> <?php $_smarty_tpl->_assignInScope('ar_1', "checked");?> <?php } else { ?> <?php $_smarty_tpl->_assignInScope('ar_2', "checked");?> <?php }?>
              <div class="form-row">
                <div class="col-sm-6">
                  <label>Cuenta con analisis de riesgo</label><br>
                  <label>Si </label>
                  <input type="radio" name="analisis_riesgo" value="Si" id = "analisis_riesgo" <?php echo $_smarty_tpl->tpl_vars['ar_1']->value;?>
>
                  <br>
                  <label>No </label>
                  <input type="radio" name="analisis_riesgo" value="No" id = "analisis_riesgo" <?php echo $_smarty_tpl->tpl_vars['ar_2']->value;?>
>
                </div>
                <?php if ($_smarty_tpl->tpl_vars['bodega']->value['ficha_estabilidad']) {?> <?php $_smarty_tpl->_assignInScope('ficha_1', "checked");?> <?php } else { ?> <?php $_smarty_tpl->_assignInScope('ficha_2', "checked");?> <?php }?>
                <div class="col-sm-6">
                  <label>Cuenta con fichas de estabilidad de producto?</label><br>
                  <label>Si </label>
                  <input type="radio" name="fichas_estabilidad" id="fichas_estabilidad" value="Si" <?php echo $_smarty_tpl->tpl_vars['ficha_1']->value;?>
>
                  <br>
                  <label>No </label>
                  <input type="radio" name="fichas_estabilidad" id="fichas_estabilidad" value="No" <?php echo $_smarty_tpl->tpl_vars['ficha_2']->value;?>
>
                </div>
              </div>
              <br><!--
              <div class="form-row">
                <div class="col-sm-12">
                  <input type="checkbox" name="copia_correo" value="Si" id="enviar_item_bodega">
                  <label>Enviar una copia a mi correo</label>
                </div>
              </div>-->
              <br>
              <div class="form-row">
                <div class="col-sm-12" style="text-align:center;">
                  <button class="mb-2 mr-2  btn-shadow btn-outline-2x btn btn-outline-info" id="btn_editar_item_bodega">Actualizar</button>
                  <button class="mb-2 mr-2  btn-shadow btn-outline-2x btn btn-outline-success" id="btn_nuevo_item_bodega">Crear</button>

                </div>
              </div>
            </div>

            <div id="step-42">
              <div id="cuerpo_interno_correo">
              </div>
            </div>

          </div>
          <!--Cierre del content wizzard-->
        </div>
        <div class="divider"></div>
        <div class="clearfix">
          <button type="button" id="next-btn2" class="btn-shadow btn-wide float-right btn-pill btn-hover-shine btn btn-primary">Siguiente</button>
          <button type="button" id="prev-btn2" class="btn-shadow float-right btn-wide btn-pill mr-3 btn btn-outline-secondary">Anterior</button>
        </div>
      </div>
      <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>


    </div>
  </div>
  <?php echo '<script'; ?>
 type="text/javascript" src="design/js/update_bodega.js"><?php echo '</script'; ?>
><?php }
}
