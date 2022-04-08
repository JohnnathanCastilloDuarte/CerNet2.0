<?php
/* Smarty version 3.1.34-dev-7, created on 2022-03-29 17:58:34
  from 'C:\xampp\htdocs\CerNet2.0\templates\item\update_automovil.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_62432caaeafb14_26477231',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6fc649fa5424e9b7c98809fde91a66e30d4d3df6' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CerNet2.0\\templates\\item\\update_automovil.tpl',
      1 => 1648569513,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62432caaeafb14_26477231 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="row">
  <div class="col-sm-12">
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['array_automovil']->value, 'automovil');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['automovil']->value) {
?>
    <div class="card">
      <div class="card-header">
        <h5>
          Edición del equipo <span><?php echo $_smarty_tpl->tpl_vars['automovil']->value['nombre_automovil'];?>
</span>
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
											<em>2</em><span>Especificación </span>
									</a>
            </li>
            <li>
              <a href="#step-32">
                      <em>2</em><span>Infraestructura</span>
                  </a>
            </li>
          </ul>
          <input type="hidden"  id="id_item_automovil" value="<?php echo $_smarty_tpl->tpl_vars['automovil']->value['id_item'];?>
">
          <input type="hidden" id="id_automovil" value="<?php echo $_smarty_tpl->tpl_vars['automovil']->value['id_automovil'];?>
">

          <div class="form-wizard-content">
            <div id="step-12">
              <div class="form-row">
                <div class="col-sm-6">  
                  <label>Nombre del vehículo</label>
                  <input type="text" id="nombre_automovil" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['automovil']->value['nombre_item'];?>
" placeholder="Nombre vehículo">
                </div>
                <div class="col-sm-6">
                  <label>Empresa</label>
                  <label>Empresa:</label>
                    <input type="hidden" id="id_empresa" value="<?php echo $_smarty_tpl->tpl_vars['automovil']->value['id_empresa'];?>
">
                    <input type="text" id="buscador_empresa" class="form-control" placeholder="Ingresa el nombre de la empresa" value="<?php echo $_smarty_tpl->tpl_vars['automovil']->value['nombre_empresa'];?>
">
                    <div >
                      <table class="table" id="aqui_resultados_empresa">
                      </table>
                    </div>
                </div>
              </div>
              <div class="form-row">
                <div class="col-sm-4">
                  <label>Fabricante/Marca:</label>
                  <input type="text" id="fabricante_automovil" class="form-control" placeholder="Fabricante/Marca" value="<?php echo $_smarty_tpl->tpl_vars['automovil']->value['fabricante'];?>
">
                </div>
                <div class="col-sm-4">
                  <label>Modelo:</label>
                  <input type="text" id="modelo_automovil" class="form-control" placeholder="Modelo " value="<?php echo $_smarty_tpl->tpl_vars['automovil']->value['modelo'];?>
">
                </div>
                <div class="col-sm-4">
                  <label>Placa/Patente:</label>
                  <input type="text" id="placa_automovil" class="form-control" placeholder="Placa/Patente vehículo" value="<?php echo $_smarty_tpl->tpl_vars['automovil']->value['placa'];?>
">
                </div>
              </div>
              <br>
              <div class="form-row">
                <div class="col-sm-12">
                  <label>Descripción:</label>
                  <textarea class="form-control" id="desc_automovil" placeholder="Descripción"><?php echo $_smarty_tpl->tpl_vars['automovil']->value['descripcion'];?>
</textarea>
                </div>
              </div>
              <br>
              <div class="form-row">
                <div class="col-sm-4">
                  <label>N° Serie:</label>
                  <input type="text" id="n_serie_automovil" class="form-control" placeholder="N° Serie" value="<?php echo $_smarty_tpl->tpl_vars['automovil']->value['n_serie'];?>
">
                </div>
                <div class="col-sm-4">
                  <label>Código interno:</label>
                  <input type="text" id="codigo_interno_automovil" class="form-control" placeholder="Código interno" value="<?php echo $_smarty_tpl->tpl_vars['automovil']->value['c_interno'];?>
">
                </div>
                <div class="col-sm-4">
                  <label>Año fabricación</label>
                  <input type="date" id="fecha_fabricacion_automovil" class="form-control" placeholder="" value="<?php echo $_smarty_tpl->tpl_vars['automovil']->value['fecha_fabricacion'];?>
">
                </div>
              </div>
              <br>
              <div class="form-row">
                <div class="col-sm-4">
                  <label>Dirección equipo:</label>
                  <input type="text" id="direccion_automovil" class="form-control" placeholder="Dirección equipo" value="<?php echo $_smarty_tpl->tpl_vars['automovil']->value['direccion'];?>
">
                </div>
                <div class="col-sm-4">
                  <label>Ubicación interna equipo:</label>
                  <input type="text" id="ubicacion_interna_automovil" class="form-control" placeholder="Ubicación equipo" value="<?php echo $_smarty_tpl->tpl_vars['automovil']->value['ubicacion_interna'];?>
">
                </div>
                <div class="col-sm-4">
                  <label>Área interna equipo:</label>
                  <input type="text" id="area_interna_automovil" class="form-control" placeholder="Área equipo" value="<?php echo $_smarty_tpl->tpl_vars['automovil']->value['area_interna'];?>
">
                </div>
              </div>
            </div>
            <div id="step-22">              
              <div class="form-row">
                <div class="col-sm-4">
                  <label>Valor seteado temperatura(°C):</label>
                  <input type="text" id="valor_seteado_tem_automovil" class="form-control" placeholder="Valor seteado temperatura" value="<?php echo $_smarty_tpl->tpl_vars['automovil']->value['seteado_tem'];?>
" required>
                </div>

                <div class="col-sm-4">
                  <label>Temperatura mínima(°C):</label>
                  <input type="text" id="temperatura_minima_automovil" class="form-control" placeholder="Temperatura mínima" value="<?php echo $_smarty_tpl->tpl_vars['automovil']->value['tem_min'];?>
" required>
                </div>

                <div class="col-sm-4">
                  <label>Temperatura máxima(°C):</label>
                  <input type="text" id="temperatura_maxima_automovil" class="form-control" placeholder="Temperatura máxima" value="<?php echo $_smarty_tpl->tpl_vars['automovil']->value['tem_max'];?>
" required>
                </div>
              </div>
              

            </div>
            <div id="step-32">

              <div class="form-row">
                <div class="col-sm-4">
                  <label>Voltaje(V):</label>
                  <input type="text" id="voltaje_automovil" class="form-control" placeholder="Voltaje" value="<?php echo $_smarty_tpl->tpl_vars['automovil']->value['voltaje'];?>
">
                </div>
                <div class="col-sm-4">
                  <label>Potencia(A):</label>
                  <input type="text" id="potencia_automovil" class="form-control" placeholder="Potencia" value="<?php echo $_smarty_tpl->tpl_vars['automovil']->value['potencia'];?>
">
                </div>
                <div class="col-sm-4">
                  <label>Capacidad(m3):</label>
                  <input type="text" id="capacidad_automovil" class="form-control" placeholder="Capacidad" value="<?php echo $_smarty_tpl->tpl_vars['automovil']->value['capacidad'];?>
">
                </div>
              </div>
              <br>
              <div class="form-row">
                <div class="col-sm-3">
                  <label>Peso(K):</label>
                  <input type="text" id="peso_automovil" class="form-control" placeholder="Peso" value="<?php echo $_smarty_tpl->tpl_vars['automovil']->value['peso'];?>
">
                </div>
                <div class="col-sm-3">
                  <label>Alto(mm):</label>
                  <input type="text" id="alto_automovil" class="form-control" placeholder="Alto" value="<?php echo $_smarty_tpl->tpl_vars['automovil']->value['alto'];?>
">
                </div>
                <div class="col-sm-3">
                  <label>Largo(mm):</label>
                  <input type="text" id="largo_automovil" class="form-control" placeholder="Largo" value="<?php echo $_smarty_tpl->tpl_vars['automovil']->value['largo'];?>
">
                </div>
                <div class="col-sm-3">
                  <label>Ancho(mm):</label>
                  <input type="text" id="ancho_automovil" class="form-control" placeholder="Ancho" value="<?php echo $_smarty_tpl->tpl_vars['automovil']->value['ancho'];?>
">
                </div>
              </div>

              <br>

                <br>
              <div class="form-row">
                <div class="col-sm-12" style="text-align:center;">
                  <button class="mb-2 mr-2  btn-shadow btn-outline-2x btn btn-outline-info" id="btn_editar_item_automovil">Actualizar</button>
                </div> 
                <div class="col-sm-12" style="text-align:center;">
                  <button class="mb-2 mr-2  btn-shadow btn-outline-2x btn btn-outline-success" id="btn_nuevo_item_automovil">Nuevo</button>
                </div>
              </div>
            </div> 
          </div>
          <!---Cierre del content-->
        </div>
        <!--Cierre del wizard-->
        <div class="divider"></div>
         <div class="clearfix">
          <button type="button" id="next-btn2" class="btn-shadow btn-wide float-right btn-pill btn-hover-shine btn btn-primary">Siguiente</button>
          <button type="button" id="prev-btn2" class="btn-shadow float-right btn-wide btn-pill mr-3 btn btn-outline-secondary">Anterior</button>
         </div>
      </div>
    </div>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
  </div>
</div>
<?php echo '<script'; ?>
 type="text/javascript" src="design/js/update_automovil.js"><?php echo '</script'; ?>
><?php }
}
