<?php
/* Smarty version 3.1.34-dev-7, created on 2022-01-31 22:51:17
  from '/home/god/public_html/CerNet2.0/templates/item/update_filtro.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_61f867e580dcd6_27967562',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '174faa9eb5dc95114cb87835de6da5030a87abc5' => 
    array (
      0 => '/home/god/public_html/CerNet2.0/templates/item/update_filtro.tpl',
      1 => 1643030826,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61f867e580dcd6_27967562 (Smarty_Internal_Template $_smarty_tpl) {
?><input type="hidden" id="id_item_filtro" value="<?php echo $_smarty_tpl->tpl_vars['id_item_filtro']->value;?>
">
<input type="hidden" id="id_tipo_filtro" value="<?php echo $_smarty_tpl->tpl_vars['id_tipo_filtro']->value;?>
">


<div class="row">
	<div class="col-sm-12">
		<div class="card">
			<div class="card-header">
				<h6>
					Configuración Filtro
				</h6>
			</div>
    </div><!--CIERRE DEL CARD-->  
  </div><!--CIERRE DEL COL-SM-12-->
</div><!--CIERRE DEL ROW--> 

<br>

<div class="card">
  <div class="card-body">      

       <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['array_filtro']->value, 'filtro');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['filtro']->value) {
?>
        <input type="hidden" id="id_filtro" value = "<?php echo $_smarty_tpl->tpl_vars['filtro']->value['id_filtro'];?>
">
        <div id="step-12">
					<div class="form-row">
           <div class="col-sm-6">
              <div class="position-relative form-group">               
                <label>Nombre: </label>
                <select class="form-control" id="nombre_filtro">
                  <?php if ($_smarty_tpl->tpl_vars['filtro']->value['nombre_item'] == '') {?>
                   <option value="0" selected>Seleccione...</option>
                   <option value="Filtro Absoluto HEPA H13 ">Filtro Absoluto HEPA H13</option>
                   <option value="Filtro Absoluto ULPA (H14)">Filtro Absoluto ULPA H14</option> 
                  <?php } else { ?>
                   <option value="<?php echo $_smarty_tpl->tpl_vars['filtro']->value['nombre_item'];?>
" selected=""><?php echo $_smarty_tpl->tpl_vars['filtro']->value['nombre_item'];?>
</option>
                   <option value="Filtro Absoluto HEPA H13">Filtro Absoluto HEPA H13</option>
                   <option value="Filtro Absoluto ULPA (H14)">Filtro Absoluto ULPA H14</option> 
                  <?php }?>
                </select>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="position-relative form-group">
               <label>Empresa:</label>
                    <input type="hidden" id="id_empresa" value="<?php echo $_smarty_tpl->tpl_vars['filtro']->value['id_empresa'];?>
">
                    <input type="text" id="buscador_empresa" class="form-control" placeholder="Ingresa el nombre de la empresa" value="<?php echo $_smarty_tpl->tpl_vars['filtro']->value['nombre_empresa'];?>
">
                    <div >
                      <table class="table" id="aqui_resultados_empresa">
                      </table>
                    </div>
              </div>
            </div>
          </div>
          
          <div class="form-row">
            <div class="col-sm-6">
              <label>Marca: </label>
              <input type="text" class="form-control" id="marca_filtro" value="<?php echo $_smarty_tpl->tpl_vars['filtro']->value['marca'];?>
" placeholder="Marca filtro">
            </div>
            <div class="col-sm-6">
              <label>Modelo: </label>
              <input type="text" class="form-control" id="modelo_filtro" value="<?php echo $_smarty_tpl->tpl_vars['filtro']->value['modelo'];?>
" required="" placeholder="Modelo filtro">
            </div>
          </div>
          
          <br>
          
          <div class="form-row">
            <div class="col-sm-6">
              <label>Serie: </label>
              <input type="text" class="form-control" id="serie_filtro" value="<?php echo $_smarty_tpl->tpl_vars['filtro']->value['serie'];?>
" required="" placeholder="Serie filtro">
            </div>
            <div class="col-sm-6">
              <label>Cantidad Filtros HEPA: </label>
              <input type="number" class="form-control" id="cantidad_filtros_filtro" value="<?php echo $_smarty_tpl->tpl_vars['filtro']->value['cantidad_filtros'];?>
" required="" placeholder="Cantidad de filtros">
            </div>
          </div>
          
          <br>
          
          <div class="form-row">
            <div class="col-sm-4">
              <label>Dirección: </label>
              <input type="text" class="form-control" id="ubicacion_filtro" value="<?php echo $_smarty_tpl->tpl_vars['filtro']->value['direccion'];?>
" required="" placeholder="Dirección de filtro">
            </div>
            <div class="col-sm-4">
              <label>Ubicado en: </label>      
              <select class="form-control" id="ubicado_en_filtro">
              <?php if ($_smarty_tpl->tpl_vars['filtro']->value['ubicacion_interna'] == '') {?>
                <option value="0">Seleccione...</option>
                <option value="UMA">UMA</option>
                <option value="Sala">Sala</option>
                <option value="VEX">VEX</option>
                <option value="VIN">VIN</option>
                <option value="COP">COP</option>
              <?php } else { ?>
                <option value="<?php echo $_smarty_tpl->tpl_vars['filtro']->value['ubicacion_interna'];?>
"><?php echo $_smarty_tpl->tpl_vars['filtro']->value['ubicacion_interna'];?>
</option>
                <option value="UMA">UMA</option>
                <option value="Sala">Sala</option>
                <option value="VEX">VEX</option>
                <option value="VIN">VIN</option>
                <option value="COP">COP</option>
              <?php }?>
              </select> 
             </div>
             <div class="col-sm-4">
              <label>Lugar: </label>
               <input type="text" class="form-control" id="lugar_filtro" value="<?php echo $_smarty_tpl->tpl_vars['filtro']->value['area_interna'];?>
" required="" placeholder="Lugar filtro">
             </div>
          </div>
          
          <br>
          
          <div class="form-row">
            <div class="col-sm-6">
              <label>Dimensiones: </label>
              <input type="text" class="form-control" id="tipo_filtro" value="<?php echo $_smarty_tpl->tpl_vars['filtro']->value['tipo_filtro'];?>
" required="" placeholder="Dimensiones del filtro">
            </div>
            <div class="col-sm-3">
              <label>Limite de penetración: </label>
              <input type="text" class="form-control" id="penetracion_filtro" <?php if ($_smarty_tpl->tpl_vars['filtro']->value['penetracion_filtro'] == '') {?> value="0,001" <?php } else { ?> value="<?php echo $_smarty_tpl->tpl_vars['filtro']->value['penetracion_filtro'];?>
" <?php }?> placeholder=" limite de penetración">
            </div>
            <div class="col-sm-3">
              <label>Eficiencia: </label>
              <input type="text" class="form-control" id="eficiencia" <?php if ($_smarty_tpl->tpl_vars['filtro']->value['eficiencia'] == '') {?> value="99,99 % (0,3um)" <?php } else { ?> value="<?php echo $_smarty_tpl->tpl_vars['filtro']->value['eficiencia'];?>
" <?php }?> placeholder="Eficiencia">
            </div>

          </div>
          <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
          </div>
          <br>
          
          <div class="form-row"> 
            <div class="col-sm-12" style="text-align:center;" id="tipo_botton_filtros">
              <button class="mb-2 mr-2  btn-shadow btn-outline-2x btn btn-outline-info" id="btn_editar_item_filtro">Actualizar</button>
              <button class="mb-2 mr-2  btn-shadow btn-outline-2x btn btn-outline-success" id="btn_crear_item_filtro">Crear</button>
            </div>
          </div>
          
        

        
    </div><!--TITULOS DEL WIZARD-->
  </div><!--CIERRE DEL CARDBODY--> 
 </div><!--CIERRE DEL CARD--> 
<?php echo '<script'; ?>
 src="design/js/filtros.js"><?php echo '</script'; ?>
>
<?php }
}
