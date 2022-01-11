<?php
/* Smarty version 3.1.34-dev-7, created on 2022-01-11 15:04:21
  from 'C:\xampp\htdocs\CerNet2.0\templates\item\update_sala_limpia.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_61dd8e6500f958_52687709',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a6f47c0c8509753ce8676c6b0dc8cf65abab77ce' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CerNet2.0\\templates\\item\\update_sala_limpia.tpl',
      1 => 1641909857,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61dd8e6500f958_52687709 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="row">
  <div class="col-sm-12">
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['array_sala_limpia']->value, 'sala_limpia');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['sala_limpia']->value) {
?>

    <div class="card">
      <div class="card-header">
        <h5>
          Edición del equipo <span><?php echo $_smarty_tpl->tpl_vars['sala_limpia']->value['nombre_sala_limpia'];?>
</span>
        </h5>
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
                      <input type="text" id="buscador_empresa" class="form-control" placeholder="Ingresa el nombre de la empresa" value="<?php echo $_smarty_tpl->tpl_vars['sala_limpia']->value['nombre_empresaluisg'];?>
">
                      <input type="hidden" id="id_empresa" value="<?php echo $_smarty_tpl->tpl_vars['sala_limpia']->value['id_empresa'];?>
">
                      <div>
                        <table class="table" id="aqui_resultados_empresa" >
                        </table>
                      </div> 
                </div>

              </div>
              <br>
              <div class="form-row">
                <div class="col-sm-6">
                  <label>Área :</label>
                  <input type="text" id="area_sala_limpia" class="form-control" placeholder="Area sala limpia" value="<?php echo $_smarty_tpl->tpl_vars['sala_limpia']->value['Area_sala_limpia'];?>
" required="">
                </div>
                <div class="col-sm-6">
                  <label>Código:</label>
                  <input type="text" id="codigo_sala_limpia" class="form-control" placeholder="Codigo sala limpia" value="<?php echo $_smarty_tpl->tpl_vars['sala_limpia']->value['codigo'];?>
" required="">
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
                  <input type="text" id="volumen_m2_sala_limpia" class="form-control" placeholder="Volumen en m2" value="<?php echo $_smarty_tpl->tpl_vars['sala_limpia']->value['volumen_m3'];?>
">
                </div>
                <div class="col-sm-4">
                  <label>Estado sala:</label>
                  <input type="text" id="estado_sala_limpia" class="form-control" placeholder="Estado de la sala" value="<?php echo $_smarty_tpl->tpl_vars['sala_limpia']->value['estado_sala'];?>
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
