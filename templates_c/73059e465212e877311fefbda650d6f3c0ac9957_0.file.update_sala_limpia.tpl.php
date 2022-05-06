<?php
/* Smarty version 3.1.34-dev-7, created on 2022-05-06 13:36:09
  from '/home/god/public_html/CerNet2.0/templates/item/update_sala_limpia.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_6275244946e690_27300283',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '73059e465212e877311fefbda650d6f3c0ac9957' => 
    array (
      0 => '/home/god/public_html/CerNet2.0/templates/item/update_sala_limpia.tpl',
      1 => 1651844167,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6275244946e690_27300283 (Smarty_Internal_Template $_smarty_tpl) {
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
       <div id="smartwizard2" class="forms-wizard-alt"> 
         <ul class="forms-wizard">
            <li>
              <a href="#step-12">
                      <em>1</em><span>Identificación</span>
                  </a>
            </li>
            <li>
              <a href="#step-22">
                      <em>2</em><span>Especificación</span>
                  </a>
            </li>
            <li>
              <a href="#step-32">
                      <em>3</em><span>Infraestructura</span>
                  </a>
            </li>
          </ul>

      
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
                  <table class="table" id="aqui_resultados_empresa">
                  </table>
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="col-sm-6">
                <label>Clasificación OMS :</label>
                <select class="form-control" id="clasificacion_oms">
                  <option value="<?php echo $_smarty_tpl->tpl_vars['sala_limpia']->value['clasificacion_oms'];?>
"><?php echo $_smarty_tpl->tpl_vars['sala_limpia']->value['clasificacion_oms'];?>
</option>
                  <option value="A">Clase A</option>
                  <option value="B">Clase B</option>
                  <option value="C">Clase C</option>
                  <option value="D">Clase D</option>
                </select>
              </div>
              <div class="col-sm-6">
                <label>Clasificación ISO:</label>
                <select class="form-control" id="clasificacion_iso">
                  <option value="<?php echo $_smarty_tpl->tpl_vars['sala_limpia']->value['clasificacion_iso'];?>
"><?php echo $_smarty_tpl->tpl_vars['sala_limpia']->value['clasificacion_iso'];?>
</option>
                  <option value="5">ISO 5</option>
                  <option value="6">ISO 6</option>
                  <option value="7">ISO 7</option>
                  <option value="8">ISO 8</option>
                  <option value="9">ISO 9</option>
                <select>
              </div>
            </div>
            <br>
            <div class="form-row">
              <div class="col-sm-4">
                <label>Dirección de ejecución:</label>
                <input type="text" id="direccion_sala_limpia" class="form-control" placeholder="Dirección equipo" value="<?php echo $_smarty_tpl->tpl_vars['sala_limpia']->value['direccion'];?>
">
              </div>
              <div class="col-sm-4">
                <label>Codigo interno:</label>
                <input type="text" id="codigo_interna_sala_limpia" class="form-control" placeholder="Codigo interno" value="<?php echo $_smarty_tpl->tpl_vars['sala_limpia']->value['codigo_interna'];?>
">
              </div>
              <div class="col-sm-4">
                <label>Área interna:</label>
                <input type="text" id="area_interna_sala_limpia" class="form-control" placeholder="Área equipo" value="<?php echo $_smarty_tpl->tpl_vars['sala_limpia']->value['area_interna'];?>
">
              </div>
            </div>
            <br>
            <div class="form-row">
                <div class="col-sm-4">
                  <label>Estado de la sala:</label>
                  <select class="form-control" id="estado_sala">
                    <option value="<?php echo $_smarty_tpl->tpl_vars['sala_limpia']->value['estado_sala'];?>
"><?php echo $_smarty_tpl->tpl_vars['sala_limpia']->value['estado_sala'];?>
</option>
                    <option value="ATT Rest"> ATT Rest</option>
                    <option value="Operacion">Operacion</option>
                  </select>
                </div>
            </div>
  
         </div>   
          
         <div id="step-22">  

            <div class="form-row">
              <div class="col-sm-6">
                <label>Temperatura Minima °C:</label>
                <input type="text" id="temperatura_minima" class="form-control" placeholder="°C" value="<?php echo $_smarty_tpl->tpl_vars['sala_limpia']->value['temperatura_minima'];?>
">
              </div>
              <div class="col-sm-6">
                <label>Temperatura Maxima °C:</label>
                <input type="text" id="temperatura_maxima" class="form-control" placeholder="°C" value="<?php echo $_smarty_tpl->tpl_vars['sala_limpia']->value['temperatura_maxima'];?>
">
              </div>
              
            </div>
            <br>
            
            <div class="form-row">
              <div class="col-sm-12">
                <label for="">Informativo</label>
                <select class="form-control" style="width: 10%;" id="temperatura_informativa">
                  <?php if ($_smarty_tpl->tpl_vars['sala_limpia']->value['temperatura_informativa'] == '') {?>
                  <option value="">Seleccione...</option>
                  <option value="Si">Si</option>
                  <option value="No">No</option>
                  <?php } else { ?>
                  <option value="<?php echo $_smarty_tpl->tpl_vars['sala_limpia']->value['temperatura_informativa'];?>
"><?php echo $_smarty_tpl->tpl_vars['sala_limpia']->value['temperatura_informativa'];?>
</option>
                  <option value="Si">Si</option>
                  <option value="No">No</option>
                  <?php }?>
                </select>
              </div>
            </div>
            <hr>
            <div class="form-row">
              
                <div class="col-sm-6">
                  <label>Humedad relativa Minima % :</label>
                  <input type="text" id="hum_relativa_minima" class="form-control" placeholder="Hum %" value="<?php echo $_smarty_tpl->tpl_vars['sala_limpia']->value['hum_relativa_minima'];?>
">
                </div>
                <div class="col-sm-6">
                  <label>Humedad relativa Maxima % :</label>
                  <input type="text" id="hum_relativa_maxima" class="form-control" placeholder="Hum %" value="<?php echo $_smarty_tpl->tpl_vars['sala_limpia']->value['hum_relativa_maxima'];?>
">
                </div>
                
            </div>
            <br>
            <div class="form-row">
              <div class="col-sm-12">
                <label for="">Informativo</label>
                <select class="form-control" style="width: 10%;" id="humedad_informativa">
                  <?php if ($_smarty_tpl->tpl_vars['sala_limpia']->value['humedad_informativa'] == '') {?>
                  <option value="">Seleccione...</option>
                  <option value="Si">Si</option>
                  <option value="No">No</option>
                  <?php } else { ?>
                  <option value="<?php echo $_smarty_tpl->tpl_vars['sala_limpia']->value['humedad_informativa'];?>
"><?php echo $_smarty_tpl->tpl_vars['sala_limpia']->value['humedad_informativa'];?>
</option>
                  <option value="Si">Si</option>
                  <option value="No">No</option>
                  <?php }?>
                </select>
              </div>
            </div>
                      

          </div>
          <div id="step-32">

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
                  <label>Ren/hr:</label>
                  <input type="text" id="ren_hr" class="form-control" placeholder="Area en m2" value="<?php echo $_smarty_tpl->tpl_vars['sala_limpia']->value['ren_hr'];?>
" required="">
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
                <br>
              <div class="form-row">
                <div class="col-sm-4">
                  <label for="">Cantidad Extracciones aire:</label>
                  <input type="text" class="form-control" id="cantidad_extracciones">
                </div>
                <div class="col-sm-4">
                  <label for="">Cantidad de Inyecciones aire:</label>
                  <input type="text" id="cantidad_inyecciones" class="form-control">
                </div>
              </div>
              <br>
            <div class="form-row">
                <div class="col-sm-12" style="text-align:center;">
                  <button class="mb-2 mr-2  btn-shadow btn-outline-2x btn btn-outline-info" id="btn_editar_item_sala_limpia">Actualizar</button>
                </div> 
                <div class="col-sm-12" style="text-align:center;">
                  <button class="mb-2 mr-2  btn-shadow btn-outline-2x btn btn-outline-success" id="btn_crear_item_sala_limpia">Nuevo</button>
                </div>
           </div>


          </div>  
        </div>  
          
      </div>
      <div class="divider"></div>
        <div class="clearfix">
          <button type="button" id="next-btn2" class="btn-shadow btn-wide float-right btn-pill btn-hover-shine btn btn-primary">Siguiente</button>
          <button type="button" id="prev-btn2" class="btn-shadow float-right btn-wide btn-pill mr-3 btn btn-outline-secondary">Anterior</button>
        </div>
  </div>
    </div>

      <!---Cierre del content-->
    </div>
    <!--Cierre del wizard-->
    
</div>
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</div>
</div>
<?php echo '<script'; ?>
 type="text/javascript" src="design/js/update_sala_limpia.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="design/js/validar_campos_vacios.js"><?php echo '</script'; ?>
><?php }
}
