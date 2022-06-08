<?php
/* Smarty version 3.1.34-dev-7, created on 2022-06-08 00:12:04
  from 'C:\xampp\htdocs\CerNet2.0\templates\item\update_campana_extraccion.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_629fcd34bddd83_91414812',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5a2460fc03c75e8363fd9c4ee083f5e44948f91e' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CerNet2.0\\templates\\item\\update_campana_extraccion.tpl',
      1 => 1654639922,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_629fcd34bddd83_91414812 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-header">
 
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['array_campana']->value, 'campana');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['campana']->value) {
?>
        <h5 id="text_enunciado_campana">

        </h5>
      </div>
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

          </ul>

          
           <div class="form-wizard-content">
               <input type='hidden' id='type_campana' value='<?php echo $_smarty_tpl->tpl_vars['id_tipo']->value;?>
'>
               <input type='hidden' id='id_item_campana' value='<?php echo $_smarty_tpl->tpl_vars['id_item']->value;?>
'>
              <div id="step-12">
                <div class="form-row">
                  <div class="col-sm-6">
                    <label>Nombre:</label>
                    <input type="text" id="nombre_campana" class="form-control" placeholder="Nombre campana" value="<?php echo $_smarty_tpl->tpl_vars['campana']->value['nombre_item'];?>
">
                  </div>
                  <div class="col-sm-6">
                    <label>Empresa:</label>
                        <input type="hidden" id="id_empresa" value="<?php echo $_smarty_tpl->tpl_vars['campana']->value['id_empresa'];?>
">
                        <input type="text" id="buscador_empresa" class="form-control" placeholder="Ingresa el nombre de la empresa" value="<?php echo $_smarty_tpl->tpl_vars['campana']->value['nombre_empresa'];?>
">
                        <div >
                          <table class="table" id="aqui_resultados_empresa">
                          </table>
                        </div>
                  </div>

                </div>
                <br>
                <div class="form-row">
                  <div class="col-sm-4">
                    <label>Dirección:</label>
                    <input type="text" id="direccion_campana" class="form-control" placeholder="Direccion campana" value="<?php echo $_smarty_tpl->tpl_vars['campana']->value['direccion'];?>
">
                  </div>
                  <div class="col-sm-4">
                    <label>Ubicación del equipo:</label>
                    <input type="text" id="ubicacion_campana" class="form-control" placeholder="ubicacion del equipo en el lugar empresa" value="<?php echo $_smarty_tpl->tpl_vars['campana']->value['ubicacion_interna'];?>
">
                  </div>
                  <div class="col-sm-4"> 
                    <label>Área interna:</label>
                    <input type="text" id="area_interna" class="form-control" placeholder="ubicacion del equipo en el lugar empresa" value="<?php echo $_smarty_tpl->tpl_vars['campana']->value['area_interna'];?>
">
                  </div>
                </div>
                <br>
                <div class="form-row">
                  <div class="col-sm-4">
                    <label>Tipo de campana:</label>
                    <input type="text" class="form-control" id="tipo_campana" placeholder="Tipo campana" value="<?php echo $_smarty_tpl->tpl_vars['campana']->value['tipo_campana'];?>
">
                  </div>
                  <div class="col-sm-4">
                    <label>Marca:</label>
                    <input type="text" class="form-control" id="marca_campana" placeholder="Marca campana" value="<?php echo $_smarty_tpl->tpl_vars['campana']->value['marca'];?>
">
                  </div>
                  <div class="col-sm-4">
                    <label>Modelo:</label>
                    <input type="text" class="form-control" id="modelo_campana" placeholder="Modelo campana" value="<?php echo $_smarty_tpl->tpl_vars['campana']->value['modelo'];?>
">
                  </div>
                </div>
                <br>
                <div class="form-row">
                  <div class="col-sm-4">
                    <label>Codigo interno:</label>
                    <input type="text" id="codigo_interno_campana" class="form-control" placeholder="Codigo interno" value="<?php echo $_smarty_tpl->tpl_vars['campana']->value['codigo'];?>
">
                  </div>
                  <div class="col-sm-4">
                    <label>Serie</label>
                    <input type="text" id="serie_campana" class="form-control" placeholder="N° Serie" value="<?php echo $_smarty_tpl->tpl_vars['campana']->value['n_serie'];?>
">
                  </div>
                  <div class="col-sm-4">
                    <label>Fecha fabricación</label>
                    <input type="date" id="fecha_fabricacion_campana" class="form-control" placeholder="" value="<?php echo $_smarty_tpl->tpl_vars['campana']->value['fecha_fabricacion'];?>
">
                  </div>
                </div>
                <br>
                <div class="form-row">
                  <div class="col-sm-4">
                    <label>Requisito velocidad de aire</label>
                    <input class="form-control" type="text" id="velocidad_aire_campana" placeholder="Velocidad aire" value="<?php echo $_smarty_tpl->tpl_vars['campana']->value['requisito_velocidad'];?>
">
                  </div>
                </div>
              </div>

              <div id="step-22">
                <div class="form-row">
                  <div class="col-sm-6">
                    <label>Temperatura minima:</label>
                    <input type="text" id="tem_min" class="form-control" placeholder="Temperatura minima" value="<?php echo $_smarty_tpl->tpl_vars['campana']->value['tem_min'];?>
">
                  </div>
                  <div class="col-sm-6">
                    <label>Temperatura maxima:</label>
                        <input type="text" id="tem_max" class="form-control" placeholder="Temperatura maxima" value="<?php echo $_smarty_tpl->tpl_vars['campana']->value['tem_max'];?>
">
                  </div>
                    <div class="col-sm-6">
                      <label>Humedad minima:</label>
                      <input type="text" id="hum_min" class="form-control" placeholder="Humedad minima" value="<?php echo $_smarty_tpl->tpl_vars['campana']->value['hum_min'];?>
">
                    </div>
                    <div class="col-sm-6">
                      <label>Humedad maxima:</label>
                      <input type="text" id="hum_max" class="form-control" placeholder="Humedad maxima" value="<?php echo $_smarty_tpl->tpl_vars['campana']->value['hum_max'];?>
">
                    </div>
                </div>
                <br>
              
              </div>

              <div id="step-32">
                <div class="form-row">
                  <div class="col-sm-6">
                    <label>Presión sonora equipo:</label>
                      <input type="text" id="presion_sonora_equipo" class="form-control" placeholder="Presion sonora del equipo" value="<?php echo $_smarty_tpl->tpl_vars['campana']->value['presion_sonora_equipo'];?>
">
                  </div>
             <!--      <div class="col-sm-3">
                    <label>Presión sonora equipo:</label>
                      <input type="text" id="nombre_campana" class="form-control" placeholder="Presion sonora del equipo" value="<?php echo $_smarty_tpl->tpl_vars['campana']->value['nombre_item'];?>
">
                  </div> -->
                  <div class="col-sm-6">
                    <label>Presión sonora sala:</label>
                        <input type="text" id="presion_sonora_sala" class="form-control" placeholder="Presión Sonora" value="<?php echo $_smarty_tpl->tpl_vars['campana']->value['presion_sonora_sala'];?>
">
                  </div>
                </div>
                <br>
                <div class="form-row">
                  <div class="col-sm-6">
                    <label>Nivel de Iluminación:</label>
                    <input type="text" id="nivel_iluminacion" class="form-control" placeholder="Direccion campana" value="<?php echo $_smarty_tpl->tpl_vars['campana']->value['nivel_iluminacion'];?>
">
                  </div>
                  <div class="col-sm-6">
                    <label>Prueba de Humo:</label>
                    <input type="text" id="prueba_humo" class="form-control" placeholder="ubicacion del equipo en el lugar empresa" value="<?php echo $_smarty_tpl->tpl_vars['campana']->value['prueba_humo'];?>
">
                  </div>
                </div>
                <br>
                 <div class="row" style="text-align:center;">
                  <div class="col-sm-12">
                    <button class="mb-2 mr-2  btn-shadow btn-outline-2x btn btn-outline-info" id="btn_editar_item_campana">Actualizar</button>
                    <button class="mb-2 mr-2  btn-shadow btn-outline-2x btn btn-outline-success" id="btn_nuevo_item_campana">Crear</button>
                  </div>
                </div>
              </div>

          </div>
        </div>  

   
    
        <!--Cierre del wizard-->
        <div class="divider">
        </div>
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
</div>
<?php echo '<script'; ?>
 type="text/javascript" src="design/js/campana.js"><?php echo '</script'; ?>
><?php }
}
