<?php
/* Smarty version 3.1.34-dev-7, created on 2022-01-13 21:12:19
  from 'C:\xampp\htdocs\CerNet2.0\templates\item\update_sala_limpia.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_61e087a3a05896_66650597',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a6f47c0c8509753ce8676c6b0dc8cf65abab77ce' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CerNet2.0\\templates\\item\\update_sala_limpia.tpl',
      1 => 1642103945,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61e087a3a05896_66650597 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="row">
  <div class="col-sm-12">
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['array_sala_limpia']->value, 'sala_limpia');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['sala_limpia']->value) {
?>

    <div class="card">
      <div class="card-header">
        <?php if ($_smarty_tpl->tpl_vars['sala_limpia']->value['id_sala_limpia'] == '') {?>

        <h5>
          Creación de item sala limpia
        </h5>
        <?php } else { ?>
        <h5>
          Edición del equipo <span><?php echo $_smarty_tpl->tpl_vars['sala_limpia']->value['nombre_sala_limpia'];?>
</span>
        </h5>
        <?php }?>
      </div>
      <div class="card-body">
          <div class="form-wizard-content">
            <div id="step-12">
              <div class="form-row">
                <div class="col-sm-6">
                <input type="hidden" id="id_item_sala_limpia" value="<?php echo $_smarty_tpl->tpl_vars['sala_limpia']->value['id_sala_limpia'];?>
">
                <input type="hidden" id="id_item_2_sala_limpia" value="<?php echo $_smarty_tpl->tpl_vars['sala_limpia']->value['id_item'];?>
">

                  <label>Nombre del sala limpia</label>
                  <input type="text" id="nombre_sala_limpia" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['sala_limpia']->value['nombre_sala_limpia'];?>
" required="" placeholder="Nombre sala limpia">
                </div>
                <div class="col-sm-6">
                  <label>Empresa</label>
                      <input type="text" id="buscador_empresa" class="form-control" placeholder="Ingresa el nombre de la empresa" value="<?php echo $_smarty_tpl->tpl_vars['sala_limpia']->value['nombre_empresa'];?>
">
                      <input type="hidden" id="id_empresa" value="<?php echo $_smarty_tpl->tpl_vars['sala_limpia']->value['id_empresa'];?>
">
                      <div>
                        <table class="table" id="aqui_resultados_empresa" >
                        </table>
                      </div> 
                </div>

              </div>
              
              <div class="form-row">
                <div class="col-sm-6">
                  <label>Clasificación OMS :</label>
                  <input type="text" id="clasificacion_oms" class="form-control" placeholder="Clasificación OMS " value="<?php echo $_smarty_tpl->tpl_vars['sala_limpia']->value['clasificacion_oms'];?>
" required="">
                </div>
                <div class="col-sm-6">
                  <label>Clasificación ISO:</label>
                  <input type="text" id="clasificacion_iso" class="form-control" placeholder="Clasificación ISO" value="<?php echo $_smarty_tpl->tpl_vars['sala_limpia']->value['clasificacion_iso'];?>
" required="">
                </div>
              </div>
              <br>
              <div class="form-row">
                    <div class="col-sm-4">
                      <label>Dirección equipo:</label>
                      <input type="text" id="direccion_sala_limpia" class="form-control" placeholder="Dirección equipo" value="<?php echo $_smarty_tpl->tpl_vars['sala_limpia']->value['direccion'];?>
">
                    </div>
                    <div class="col-sm-4">
                      <label>Ubicación interna equipo:</label>
                      <input type="text" id="ubicacion_interna_sala_limpia" class="form-control" placeholder="Ubicación equipo" value="<?php echo $_smarty_tpl->tpl_vars['sala_limpia']->value['ubicacion_interna'];?>
">
                    </div>
                    <div class="col-sm-4">
                      <label>Área interna equipo:</label>
                      <input type="text" id="area_interna_sala_limpia" class="form-control" placeholder="Área equipo" value="<?php echo $_smarty_tpl->tpl_vars['sala_limpia']->value['area_interna'];?>
">
                    </div>
                  </div>
              <br>
              <div class="form-row">
                <div class="col-sm-4">
                  <label>Área m2:</label>
                   <input type="text" id="area_m2_sala_limpia" class="form-control" placeholder="Area en m2" value="<?php echo $_smarty_tpl->tpl_vars['sala_limpia']->value['area_m2'];?>
" required="">
                </div>
 
                <div class="col-sm-4">
                  <label>Volumen m3:</label>
                  <input type="text" id="volumen_m3_sala_limpia" class="form-control" placeholder="Volumen en m3" value="<?php echo $_smarty_tpl->tpl_vars['sala_limpia']->value['volumen_m3'];?>
">
                </div>
                <div class="col-sm-4">
                  <label>Claudal teorico m3/h :</label>
                  <input type="text" id="claudal_m3h" class="form-control" placeholder="Claudal teorico m3/h " value="<?php echo $_smarty_tpl->tpl_vars['sala_limpia']->value['claudal_m3h'];?>
">
                </div>
              </div>
              <br>
               <div class="form-row">
                <div class="col-sm-4">
                  <label>Ren/hr:</label>
                   <input type="text" id="ren_hr" class="form-control" placeholder="Area en m2" value="<?php echo $_smarty_tpl->tpl_vars['sala_limpia']->value['ren_hr'];?>
" required="">
                </div>
 
                <div class="col-sm-4">
                  <label>Temperatura °C:</label>
                  <input type="text" id="temperatura" class="form-control" placeholder="°C" value="<?php echo $_smarty_tpl->tpl_vars['sala_limpia']->value['temperatura'];?>
">
                </div>
                <div class="col-sm-4">
                  <label>Humedad relativa % :</label>
                  <input type="text" id="hum_relativa" class="form-control" placeholder="Hum %" value="<?php echo $_smarty_tpl->tpl_vars['sala_limpia']->value['hum_relativa'];?>
">
                </div>
              </div>
              <br>
               <div class="form-row">
                <div class="col-sm-4">
                  <label>Luz, lux:</label>
                   <input type="text" id="lux" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['sala_limpia']->value['lux'];?>
" required="" placeholder="Luz, lux">
                </div>
 
                <div class="col-sm-4">
                  <label>Ruido, dBA:</label>
                  <input type="text" id="ruido_dba" class="form-control" placeholder="Ruido" value="<?php echo $_smarty_tpl->tpl_vars['sala_limpia']->value['ruido_dba'];?>
">
                </div>
                <div class="col-sm-4">
                  <label>Presión sala [Pa]:</label>
                  <input type="text" id="presion_sala" class="form-control" placeholder="Presión sala" value="<?php echo $_smarty_tpl->tpl_vars['sala_limpia']->value['presion_sala'];?>
">
                </div>
              </div>
              <br>
              <div class="form-row">
                <div class="col-sm-4">
                  <label>Presión versus:</label>
                   <input type="text" id="presion_versus" class="form-control" placeholder="Presión versus" value="<?php echo $_smarty_tpl->tpl_vars['sala_limpia']->value['presion_versus'];?>
" required="">
                </div>
 
                <div class="col-sm-4">
                  <label>Tipo de Presión:</label>
                  <input type="text" id="tipo_presion" class="form-control" placeholder="Tipo presión" value="<?php echo $_smarty_tpl->tpl_vars['sala_limpia']->value['tipo_presion'];?>
">
                </div>
                <div class="col-sm-4">
                  <label>Puntos de muestreo normal ISO 14644-1:2015:</label>
                  <input type="text" id="puntos_muestreo" class="form-control" placeholder="Puntos muestreo normal" value="<?php echo $_smarty_tpl->tpl_vars['sala_limpia']->value['puntos_muestreo'];?>
">
                </div>
              </div>
              
              
            </div>

              <br>
               <div class="col-sm-12" style="text-align:center;">
                  <button class="mb-2 mr-2  btn-shadow btn-outline-2x btn btn-outline-success" id="btn_crear_item_sala_limpia">Crear</button>  
                  <button class="mb-2 mr-2  btn-shadow btn-outline-2x btn btn-outline-info" id="btn_editar_item_sala_limpia">Actualizar</button>
                </div>
            </div>
          </div>
          <!---Cierre del content-->
        </div>
        <!--Cierre del wizard-->

      </div>
    </div>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
  </div>
</div>
<?php echo '<script'; ?>
 type="text/javascript" src="design/js/update_sala_limpia.js"><?php echo '</script'; ?>
><?php }
}
