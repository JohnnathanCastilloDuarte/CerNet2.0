<?php
/* Smarty version 3.1.34-dev-7, created on 2022-05-24 16:12:08
  from 'C:\xampp\htdocs\CerNet2.0\templates\item\update_bodega.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_628ce7b810ff53_64412395',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '10cd508aa62a2b747cc0b00d78a3d76fc3305eb7' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CerNet2.0\\templates\\item\\update_bodega.tpl',
      1 => 1653400635,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_628ce7b810ff53_64412395 (Smarty_Internal_Template $_smarty_tpl) {
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
                          <em>1</em><span>Especificación</span>
                      </a>
            </li>
            <li>
              <a href="#step-32">
													<em>2</em><span>Infraestructura</span>
											</a>
            </li>
            <li>
              <a href="#step-42">
													<em>3</em><span>Equipos</span>
											</a>
            </li>
            <li id="si_envia">
              <a href="#step-52">
													<em>4</em><span>Evidencia</span>
											</a>
            </li>

          </ul>
    
          <div class="form-wizard-content">
           
           <input value='<?php echo $_smarty_tpl->tpl_vars['id_tipo']->value;?>
' id='id_tipo' type="hidden">
            <div id="step-12">
              <div class="form-row">
                <div class="col-sm-6">
                  <input type="hidden" id="id_item_bodega" value="<?php echo $_smarty_tpl->tpl_vars['id_item']->value;?>
">
                  <div class="position-relative form-group">
                    <label>Nombre bodega:</label><input name="text" id="nombre_bodega" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['bodega']->value['nombre_item'];?>
" placeholder="Nombre de bodega" required>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="position-relative form-group">
                    <label>Empresa:</label>
                    <input type="hidden" id="id_empresa" value="<?php echo $_smarty_tpl->tpl_vars['bodega']->value['id_empresa'];?>
">
                    <input type="text" id="buscador_empresa" class="form-control" placeholder="Ingresa el nombre de la empresa" value="<?php echo $_smarty_tpl->tpl_vars['bodega']->value['nombre_empresa'];?>
">
                    <div >
                      
                      <table class="table" id="aqui_resultados_empresa">
                         
                      </table>
                    </div>
              
                  </div>
                </div>
              </div>
              <div class="form-row">
                <div class="col-sm-12">
                  <div class="position-relative form-group">
                    <label>Descripción:</label>
                    <textarea class="form-control" id="descripcion_item_bodega" placeholder="Descripción"><?php echo $_smarty_tpl->tpl_vars['bodega']->value['descripcion_bodega'];?>
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
                <div class="col-sm-3">
                  <label>Codigo interno / N° Serie:</label>
                  <input type="text" id="codigo_bodega" class="form-control" placeholder="Codigo bodega" value="<?php echo $_smarty_tpl->tpl_vars['bodega']->value['codigo_interno'];?>
">
                </div>
                 <div class="col-sm-3">
                  <label>Clasificación item:</label>
                  <input type="text" id="clasificacion_item" class="form-control" placeholder="Clasificación item" value="<?php echo $_smarty_tpl->tpl_vars['bodega']->value['clasificacion_item'];?>
">
                </div>
              </div>
<!--
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
-->  
              <div class="form-row">
                <div class="col-sm-12">
                     <label>Productos que almacena:</label>
                    <textarea id="productos_bodega" class="form-control" placeholder="Describa los productos que almacena"><?php echo $_smarty_tpl->tpl_vars['bodega']->value['productos'];?>
</textarea>
                  </div>
              </div>
              <br>
              <div class="form-row">
                  <div class="col-sm-4">
                    <label>Marca:</label>
                    <input type="text" id="marca_bodega" class="form-control" placeholder="Marca bodega" value="<?php echo $_smarty_tpl->tpl_vars['bodega']->value['marca'];?>
">
                  </div>
                
                <div class="col-sm-4">
                  <label>Modelo:</label>
                  <input type="text" id="modelo_bodega" class="form-control" placeholder="Modelo bodega" value="<?php echo $_smarty_tpl->tpl_vars['bodega']->value['modelo'];?>
">
                </div>
                   
              </div>
            </div>
            <!--Cierre del step 12-->




            <div id="step-22">
              <div class="form-row">
                 <div class="col-sm-4">
                  <div class="position-relative form-group">
                    <label>Temperatura maxima:</label>
                    <input type="text" id="temp_max" class="form-control" placeholder="Temperatura maxima" value="<?php echo $_smarty_tpl->tpl_vars['bodega']->value['temp_max'];?>
">
                  </div>
                </div>
                <div class="col-sm-4">
                  <label>Temperatura minima:</label>
                  <input type="text" id="temp_min" class="form-control" placeholder="Temperatura minima" value="<?php echo $_smarty_tpl->tpl_vars['bodega']->value['temp_min'];?>
">
                </div>
                <div class="col-sm-4">
                    <label>Valor seteado temperatura:</label>
                    <input type="text" id="valor_seteado_temp" class="form-control" placeholder="Valo seteado temperatura" value="<?php echo $_smarty_tpl->tpl_vars['bodega']->value['valor_seteado_temp'];?>
">
                  </div>
              </div>
              <div class="form-row">
                <div class="col-sm-4">
                  <label>Humedad relativa maxima:</label>
                 <input type="text" id="hr_max" class="form-control" placeholder="Humedad Maxima" value="<?php echo $_smarty_tpl->tpl_vars['bodega']->value['hr_max'];?>
">
                </div>
                 <div class="col-sm-4">
                    <label>Humedad relativa minima:</label>
                    <input type="text" id="hr_min" class="form-control" placeholder="Humedad Minima" value="<?php echo $_smarty_tpl->tpl_vars['bodega']->value['hr_min'];?>
">
                  </div>
                  <div class="col-sm-4">
                    <label>Valor seteado Humedad:</label>
                    <input type="text" id="valor_seteado_hum" class="form-control" placeholder="Valor seteado" value="<?php echo $_smarty_tpl->tpl_vars['bodega']->value['valor_seteado_hum'];?>
">
                  </div>
              </div>
               
              
              

            </div>

            <div id="step-32">
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
                <div class="col-sm-4">
                  <label>Orientación principal:</label>
                  <input type="text" id="orientacion_principal" class="form-control" placeholder="Orientación principal" value="<?php echo $_smarty_tpl->tpl_vars['bodega']->value['orientacion_principal'];?>
">
                </div>
                <div class="col-sm-4">
                    <label>Orientación recepción:</label>
                    <input type="text" id="orientacion_recepcion" class="form-control" placeholder="Orientación recepción" value="<?php echo $_smarty_tpl->tpl_vars['bodega']->value['orientacion_recepcion'];?>
">
                </div>
                <div class="col-sm-4">
                  <label>Orientación despacho:</label>
                  <input type="text" id="orientacion_despacho" class="form-control" placeholder="Orientación despacho" value="<?php echo $_smarty_tpl->tpl_vars['bodega']->value['orientacion_despacho'];?>
">
                </div>
              </div>
              <br>
              <div class="form-row">
                <div class="col-sm-4">
                  <label>Número puertas:</label>
                  <input type="text" id="num_puertas" class="form-control" placeholder="Numero puertas" value="<?php echo $_smarty_tpl->tpl_vars['bodega']->value['num_puertas'];?>
">
                </div>
                 <div class="col-sm-4">
                    <label>Salida emergencia:</label>
                    <input type="text" id="salida_emergencia" class="form-control" placeholder="Salida emergencia" value="<?php echo $_smarty_tpl->tpl_vars['bodega']->value['salida_emergencia'];?>
">
                </div>
                <div class="col-sm-4">
                  <label>Cantidad rack:</label>
                  <input type="text" id="cantidad_rack" class="form-control" placeholder="Cantidad rack" value="<?php echo $_smarty_tpl->tpl_vars['bodega']->value['cantidad_rack'];?>
">
                </div>
              </div>
              <br>
              <div class="form-row">
                <div class="col-sm-4">
                  <label>Número estantes:</label>
                  <input type="text" id="num_estantes" class="form-control" placeholder="Número estantes" value="<?php echo $_smarty_tpl->tpl_vars['bodega']->value['num_estantes'];?>
">
                </div>
                <div class="col-sm-4">
                  <div class="position-relative form-group">
                    <label>Altura maxima rack:</label>
                    <input type="text" id="altura_max_rack" class="form-control" placeholder="Altura maxima rack" value="<?php echo $_smarty_tpl->tpl_vars['bodega']->value['altura_max_rack'];?>
">
                  </div>
                </div>
                <div class="col-sm-4">
                  <label>Sistema extraccion:</label>
                  <input type="text" id="sistema_extraccion" class="form-control" placeholder="Sistema extracción" value="<?php echo $_smarty_tpl->tpl_vars['bodega']->value['sistema_extraccion'];?>
">
                </div>
              </div> 
              <div class="form-row">
                <div class="col-sm-4">
                  <label>Cielo pasa lus:</label>
                  <input type="text" id="cielo_lus" class="form-control" placeholder="Clielo pasa lus" value="<?php echo $_smarty_tpl->tpl_vars['bodega']->value['cielo_lus'];?>
">
                </div>
                <div class="col-sm-4">
                  <div class="position-relative form-group">
                    <label>Cantidad iluminarias:</label>
                    <input type="text" id="cantidad_iluminarias" class="form-control" placeholder="Cantidad iluminarias" value="<?php echo $_smarty_tpl->tpl_vars['bodega']->value['cantidad_iluminarias'];?>
">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="position-relative form-group">
                    <label>Volumen de la bodega:</label>
                    <input type="text" id="volume_bodega" class="form-control" placeholder="Volumen bodega" value="<?php echo $_smarty_tpl->tpl_vars['bodega']->value['volumen'];?>
">
                  </div>
                </div>
              </div>
              <div class="form-row">
                 <div class="col-sm-4">
                    <label>Cantidad Ventanas:</label>
                    <input type="text" id="cantidad_ventana" class="form-control" placeholder="Cantidad ventanas" value="<?php echo $_smarty_tpl->tpl_vars['bodega']->value['cantidad_ventana'];?>
">
                  </div>
                  <div class="col-sm-4">
                  <label>Altura de la bodega:</label>
                   <input type="text" id="altura_bodega" class="form-control" placeholder="Altura bodega" value="<?php echo $_smarty_tpl->tpl_vars['bodega']->value['altura'];?>
">
                </div>
               </div> 
               <br>
               <?php
$__section_f_1_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['explode_muro']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_f_1_total = $__section_f_1_loop;
$_smarty_tpl->tpl_vars['__smarty_section_f'] = new Smarty_Variable(array());
if ($__section_f_1_total !== 0) {
for ($__section_f_1_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_f']->value['index'] = 0; $__section_f_1_iteration <= $__section_f_1_total; $__section_f_1_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_f']->value['index']++){
?> <?php if ($_smarty_tpl->tpl_vars['explode_muro']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_f']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_f']->value['index'] : null)] == "Muro de hormigón") {?> <?php $_smarty_tpl->_assignInScope('hormigon', "checked");?> <?php } elseif ($_smarty_tpl->tpl_vars['explode_muro']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_f']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_f']->value['index'] : null)] == "Muro de isopol") {?> <?php $_smarty_tpl->_assignInScope('isopol', "checked");?> <?php } elseif ($_smarty_tpl->tpl_vars['explode_muro']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_f']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_f']->value['index'] : null)] == "Muro de ladrillo") {?> <?php $_smarty_tpl->_assignInScope('ladrillo', "checked");?> <?php } elseif ($_smarty_tpl->tpl_vars['explode_muro']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_f']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_f']->value['index'] : null)] == "Muro de madera") {?> <?php $_smarty_tpl->_assignInScope('madera', "checked");?> <?php } elseif ($_smarty_tpl->tpl_vars['explode_muro']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_f']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_f']->value['index'] : null)] == "otro_muro") {?> <?php $_smarty_tpl->_assignInScope('otro_muro', "checked");?> <?php } elseif ($_smarty_tpl->tpl_vars['explode_muro']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_f']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_f']->value['index'] : null)] == "- ") {?> <?php $_smarty_tpl->_assignInScope('otro_muro_e', $_smarty_tpl->tpl_vars['explode_muro']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]);?> <?php }?> <?php
}
}
?>

          

              <div class="form-row">
                <div class="col-sm-6">
                  <div class="position-relative form-group">
                    <label>Tipo de muro:</label>
                    <textarea class="form-control" id="otro_tipo_muro_bodega" placeholder="Especifica el tipo de muro"><?php echo $_smarty_tpl->tpl_vars['otro_muro_e']->value;?>
</textarea>
                  </div>
                </div>
      

                <div class="col-sm-6">
                  <div class="position-relative form-group">
                    <label>Tipo de cielo</label>
                    <textarea class="form-control" id="otro_tipo_cielo_bodega" placeholder="Especifica el tipo de cielo"><?php echo $_smarty_tpl->tpl_vars['otro_cielo_e']->value;?>
</textarea>
                  </div>
                </div>
              </div>




            </div>  
            <!--Cierre del step 22-->

            <?php
$__section_i_2_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['explode_climatizacion']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_i_2_total = $__section_i_2_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_2_total !== 0) {
for ($__section_i_2_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_2_iteration <= $__section_i_2_total; $__section_i_2_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?> <?php if ($_smarty_tpl->tpl_vars['explode_climatizacion']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)] == "Mezclador de aire") {?> <?php $_smarty_tpl->_assignInScope('mezclador_aire', "checked");?> <?php } elseif ($_smarty_tpl->tpl_vars['explode_climatizacion']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)] == "Sistema HVAC") {?> <?php $_smarty_tpl->_assignInScope('sistema_hvac', "checked");?> <?php } elseif ($_smarty_tpl->tpl_vars['explode_climatizacion']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)] == "Split") {?>
            <?php $_smarty_tpl->_assignInScope('split', "checked");?> <?php } elseif ($_smarty_tpl->tpl_vars['explode_climatizacion']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)] == "No climatizacion") {?> <?php $_smarty_tpl->_assignInScope('no_climatizacion', "checked");?> <?php }?> <?php
}
}
?>
            <div id="step-42">
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
$__section_i_3_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['explode_plano']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_i_3_total = $__section_i_3_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_3_total !== 0) {
for ($__section_i_3_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_3_iteration <= $__section_i_3_total; $__section_i_3_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
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
                
              <br>
              <?php if ($_smarty_tpl->tpl_vars['bodega']->value['estado'] != 0) {
$_smarty_tpl->_assignInScope('estado1', "checked");
} else {
$_smarty_tpl->_assignInScope('estado2', "checked");
}?>

             <div class="form-row">
              <div class="col-sm-3">
                <label>Estado de aprobación</label><br>
                <lable style="color: #50ff00;">Aprobado: <input type="radio" name="estado_bodega" id="estado_bodega_si" value="1" <?php echo $_smarty_tpl->tpl_vars['estado1']->value;?>
></lable>
                ||
                <lable style="color: #ff0000;">No Aprobado: <input type="radio" name="estado_bodega" id="estado_bodega_no" value="0" <?php echo $_smarty_tpl->tpl_vars['estado2']->value;?>
></lable>
                
              </div>
             </div> 
              <!--
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
>
  <?php echo '<script'; ?>
 type="text/javascript" src="design/js/validar_campos_vacios.js"><?php echo '</script'; ?>
>
<?php }
}
