<?php
/* Smarty version 3.1.34-dev-7, created on 2022-04-20 17:51:09
  from '/home/god/public_html/CerNet2.0/templates/Calificacion/gestionar_calificaciones.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_6260480d330944_08433708',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fcd129ac44d751c203b1435a7798689aeaa3adc2' => 
    array (
      0 => '/home/god/public_html/CerNet2.0/templates/Calificacion/gestionar_calificaciones.tpl',
      1 => 1649429192,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6260480d330944_08433708 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h6>
                    Lista de calificaciones
                </h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="form-row">
                                    <div class="col-sm-9">
                                        Informes Mapeos
                                    </div>
                                    <div class="col-sm-9">
                                        Generados: <span class="badge badge-pill badge-primary" id="mapeo_campanas_generadas">-</span>
                                        En proceso: <span class="badge badge-pill badge-warning" id="mapeo_campana_proceso">-</span>
                                        Terminados: <span class="badge badge-pill badge-danger" id="mapeo_campana_terminada">-</span>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <th>OT</th>
                                        <th>Item</th>
                                        <th>Empresa</th>
                                        <th>Usuario asignado</th>
                                        <th>Acciones</th>
                                    </thead>
                                    <tbody>
                                        <?php if ($_smarty_tpl->tpl_vars['conteo_mapeo']->value == 0) {?>
                                        <tr>
                                            <td>
                                            
                                                    Sin resultados
        
                                            </td>   
                                        </tr>   
                                        <?php } else { ?>
                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['array_mapeo']->value, 'mapeo');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['mapeo']->value) {
?>
                                        <tr>
                                            <td><?php echo $_smarty_tpl->tpl_vars['mapeo']->value['numot'];?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['mapeo']->value['item'];?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['mapeo']->value['empresa'];?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['mapeo']->value['nombre_usuario'];?>
 <?php echo $_smarty_tpl->tpl_vars['mapeo']->value['apellido_usuario'];?>
</td>
                                            <td>
                                                <a href="index.php?module=<?php echo $_smarty_tpl->tpl_vars['modulo']->value[6];?>
&page=<?php echo $_smarty_tpl->tpl_vars['page']->value[9];?>
&asignado=<?php echo $_smarty_tpl->tpl_vars['mapeo']->value['id_asignado'];?>
&type=<?php echo $_smarty_tpl->tpl_vars['id_servicio_mapeo']->value;?>
" class="btn btn-outline-success">Informe</a>
                                            </td>
                                        </tr>
                                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                        <?php }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    
                     
                </div>
            
            </div>
        </div>
    </div>
</div><?php }
}
