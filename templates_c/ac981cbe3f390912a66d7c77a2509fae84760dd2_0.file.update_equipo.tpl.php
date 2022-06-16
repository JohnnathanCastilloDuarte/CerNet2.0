<?php
/* Smarty version 3.1.34-dev-7, created on 2022-06-16 17:20:01
  from 'C:\xampp\htdocs\CerNet2.0\templates\equipos_cercal\update_equipo.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_62ab4a210d10b4_19570125',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ac981cbe3f390912a66d7c77a2509fae84760dd2' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CerNet2.0\\templates\\equipos_cercal\\update_equipo.tpl',
      1 => 1655392799,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62ab4a210d10b4_19570125 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="row">
  <div class="col-sm-12">
      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['array_equipos']->value, 'equipos');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['equipos']->value) {
?>
    <div class="card">
      <div class="card-header">
        <h6>
          <?php if ($_smarty_tpl->tpl_vars['equipos']->value['id_equipo_cercal'] == '') {?>
          <h4>Crear equipo</h4>
          <?php } else { ?>
          <h4>Editar equipo</h4>
          <?php }?>
        </h6>
      </div>

      <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['equipos']->value['id_equipo_cercal'];?>
" id="id_equipo_cercal">
      <div class="card-body">
        <div class="col-sm-12">
          <div class="row">
             <div class="col-sm-6">
                <label>Nombre Equipo</label>
                <input type="text" name="" class="form-control" placeholder="Nombre equipo" value="<?php echo $_smarty_tpl->tpl_vars['equipos']->value['nombre_equipo'];?>
" id="nombre_equipo">
             </div> 
             <div class="col-sm-6">
                <label>Marca Equipo</label>
                <input type="text" name="" class="form-control" placeholder="Marca equipo" value="<?php echo $_smarty_tpl->tpl_vars['equipos']->value['marca_equipo'];?>
" id="marca_equipo">
             </div> 
          </div>
          <br>
          <div class="row">
             <div class="col-sm-6">
                <label>N° Serie equipo</label>
                <input type="text" name="" class="form-control" placeholder="Numero de Serie" value="<?php echo $_smarty_tpl->tpl_vars['equipos']->value['n_serie_equipo'];?>
" id="n_serie_equipo">
             </div> 
             <div class="col-sm-6">
                <label>Modelo equipo</label>
                <input type="text" name="" class="form-control" placeholder="Modelo equipo" value="<?php echo $_smarty_tpl->tpl_vars['equipos']->value['modelo_equipo'];?>
" id="modelo_equipo">
             </div> 
          </div>
          <br>
          <div class="row">
             <div class="col-sm-6">
                <label>Tipo de medición</label>

                <select class="form-control" id="tipo_medicion">
                      <?php if ($_smarty_tpl->tpl_vars['equipos']->value['tipo_medicion'] == '') {?>
                      <option value="">Seleccione...</option>
                      <?php } else { ?>
                      <option value="<?php echo $_smarty_tpl->tpl_vars['equipos']->value['tipo_medicion'];?>
"><?php echo $_smarty_tpl->tpl_vars['equipos']->value['tipo_medicion'];?>
</option>
                      <?php }?>
                      <option value="Prueba de conteo de particulas">Prueba de conteo de particulas</option>
                      <option value="Prueba de Presión Diferencial">Prueba de Presión Diferencial</option>
                      <option value="Prueba de temperatura y humedad relativa">Prueba de temperatura y humedad relativa</option>
                      <option value="Prueba Medición de ruido">Prueba Medición de ruido</option>
                      <option value="Prueba nivel de iluminación">Prueba nivel de iluminación</option>
                      <option value="Prueba de medición de caudal">Prueba de medición de caudal</option>
                </select>
               <!--  <input type="text" name="" class="form-control" placeholder="Tipo equipo" value="<?php echo $_smarty_tpl->tpl_vars['equipos']->value['tipo_equipo'];?>
" id="tipo_medicion"> -->
             </div> 
         
          <?php if ($_smarty_tpl->tpl_vars['equipos']->value['id_equipo_cercal'] == '') {?>
             <div class="col-sm-6">
                <label>Numero de certificado</label>
                <input type="text" name="" class="form-control" placeholder="Numero del certificado" id="n_certificado">
             </div> 
            </div>
            <br> 

            <div class="row">
             <div class="col-sm-4">
                <label>País</label>
                <select class="form-control" id="pais">
                  <option value="">Seleccione...</option>
                  <option value="Colombia">Colombia</option>
                  <option value="Chile">Chile</option>
                </select>
             </div> 
             <div class="col-sm-4">
                <label>Fecha emisión</label>
                <input type="date" name="" class="form-control" id="fecha_emision">
             </div> 
             <div class="col-sm-4">
                <label>Fecha vencimiento</label>
                <input type="date" name="" class="form-control" id="fecha_vencimiento">
             </div> 
          </div>
          <br>
          <?php } else { ?>
          </div>
          <br> 
          <?php }?>

          <div class="row">
            <div class="col-sm-12" style="text-align:center;">
                <button class="mb-2 mr-2  btn-shadow btn-outline-2x btn btn-outline-info" id="btn_editar_equipo">Actualizar</button>
                <button class="mb-2 mr-2  btn-shadow btn-outline-2x btn btn-outline-success" id="btn_nuevo_equipo">Crear</button>
            </div>
          </div>

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
 type="text/javascript" src="design/js/update_equipos_cercal.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="design/js/validar_campos_vacios.js"><?php echo '</script'; ?>
>
<?php }
}
