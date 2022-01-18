<?php
/* Smarty version 3.1.34-dev-7, created on 2022-01-17 23:18:41
  from 'C:\xampp\htdocs\CerNet2.0\templates\item\update_camara_congelada.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_61e5eb41232898_76116289',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9739146fefc7e8e6e22c4f781606ce5fcbaad08e' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CerNet2.0\\templates\\item\\update_camara_congelada.tpl',
      1 => 1642457919,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61e5eb41232898_76116289 (Smarty_Internal_Template $_smarty_tpl) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['array_camara_congelada']->value, 'camara_congelada');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['camara_congelada']->value) {
?>
    <input type="hidden" id="id_item" value="<?php echo $_smarty_tpl->tpl_vars['camara_congelada']->value['id_item'];?>
">
    <input type="hidden" id="id_camara_congelada" value="<?php echo $_smarty_tpl->tpl_vars['camara_congelada']->value['id_camara_congelada'];?>
">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header"> 
                 <?php if ($_smarty_tpl->tpl_vars['camara_congelada']->value['id_item'] == '') {?>
                  <h5>Creacion camara congelada</h5>
                  <?php } else { ?>
                  <h5>Edición del equipo </h5>
                  <?php }?>
              </div>
                <div class="card-body">
                    <div class="row">
                        
                        <div class="col-sm-6">
                            <label>Nombre camara congelada</label>
                            <input type="text" id="nombre_camara_congelada" class="form-control" placeholder="Nombre camara congelada"  value="<?php echo $_smarty_tpl->tpl_vars['camara_congelada']->value['nombre_item'];?>
">
                        </div>
                        <div class="col-sm-6">
                        <label>Empresa</label>
                        <input type="text" id="buscador_empresa" class="form-control" placeholder="Ingresa el nombre de la empresa" value="<?php echo $_smarty_tpl->tpl_vars['camara_congelada']->value['nombre_empresa'];?>
">
                        <input type="hidden" id="id_empresa" value="<?php echo $_smarty_tpl->tpl_vars['camara_congelada']->value['id_empresa'];?>
">
                        <div>
                                <table class="table" id="aqui_resultados_empresa" >
                                </table>
                        </div> 
                        </div>
                    </div>    
                    <br>

                    <div class="row">
                        <div class="col-sm-6">
                            <label for="">Marca</label>
                            <input type="text" id="marca_camara_congelada" class="form-control" placeholder="Marca camara congelada" value="<?php echo $_smarty_tpl->tpl_vars['camara_congelada']->value['marca'];?>
">
                        </div>
                        <div class="col-sm-6">
                            <label for="">Modelo</label>
                            <input type="text" id="modelo_camara_congelada" class="form-control" placeholder="Modelo camara congelada" value="<?php echo $_smarty_tpl->tpl_vars['camara_congelada']->value['modelo'];?>
">
                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col-sm-4">
                            <label for="">Dirección</label>
                            <input type="text" id="direccion_camara_congelada" class="form-control" placeholder="Dirección camara congelada" value="<?php echo $_smarty_tpl->tpl_vars['camara_congelada']->value['direccion'];?>
">
                        </div>
                        <div class="col-sm-4">
                            <label for="">Ubicación interna</label>
                            <input type="text" id="ubicacion_camara_congelada" class="form-control" placeholder="Ubicación camara congelada" value="<?php echo $_smarty_tpl->tpl_vars['camara_congelada']->value['ubicacion_interna'];?>
">
                        </div>
                      <div class="col-sm-4">
                            <label for="">Área interna</label>
                            <input type="text" id="area_camara_congelada" class="form-control" placeholder="Área camara congelada" value="<?php echo $_smarty_tpl->tpl_vars['camara_congelada']->value['area_interna'];?>
">
                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col-sm-4">
                            <label for="">Valor seteado</label>
                            <input type="text" id="valor_seteado_camara_congelada" class="form-control" placeholder="°C" value="<?php echo $_smarty_tpl->tpl_vars['camara_congelada']->value['valor_seteado'];?>
">
                        </div>
                        <div class="col-sm-4">
                            <label for="">Limite Maximo</label>
                            <input type="text" id="limite_maximo_camara_congelada" class="form-control" placeholder="°C" value="<?php echo $_smarty_tpl->tpl_vars['camara_congelada']->value['valor_maximo'];?>
">
                        </div>
                        <div class="col-sm-4">
                            <label for="">Limite Minimo</label>
                            <input type="text" id="limite_minimo_camara_congelada" class="form-control" placeholder="°C" value="<?php echo $_smarty_tpl->tpl_vars['camara_congelada']->value['valor_minimo'];?>
">
                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col-sm-12" style="text-align:center;">
                            <button class="mb-2 mr-2  btn-shadow btn-outline-2x btn btn-outline-info" id="btn_editar_camara_congelada">Actualizar</button>
                            <button class="mb-2 mr-2  btn-shadow btn-outline-2x btn btn-outline-success" id="btn_nueva_camara_congelada">Crear</button>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>    
<?php echo '<script'; ?>
 type="text/javascript" src="design/js/update_camara_congelada.js"><?php echo '</script'; ?>
><?php }
}
