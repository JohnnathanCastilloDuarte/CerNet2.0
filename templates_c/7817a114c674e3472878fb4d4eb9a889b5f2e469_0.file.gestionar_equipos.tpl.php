<?php
/* Smarty version 3.1.34-dev-7, created on 2022-06-14 18:56:13
  from 'C:\xampp\htdocs\CerNet2.0\templates\equipos_cercal\gestionar_equipos.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_62a8bdad53d4a1_75815293',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7817a114c674e3472878fb4d4eb9a889b5f2e469' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CerNet2.0\\templates\\equipos_cercal\\gestionar_equipos.tpl',
      1 => 1655225760,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62a8bdad53d4a1_75815293 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="row">
  <div class="col-sm-12">
   
    <div class="card">
      <div class="card-header">
        <h5>
          Listado de equipos
        </h5>
      </div>

      <div class="card-body">
        <table class="table table-striped table-bordered" id="example" style="width: 100%; text-align:center;">
          <thead>
            <th>ID</th>
            <th>Nombre</th>
            <th>Tipo</th>
            <th>Fecha vencimiento</th>
            <th>Pais</th>
            <th>Días vencimiento</th>
            <th>Numero certificado</th>
            <th>Editar</th>
            <th>Nuevo certificado</th>
            <th>Eliminar</th>
          </thead>
      
          <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['array_mostrar_equipo']->value, 'equipo');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['equipo']->value) {
?>
          <tr>
            <td><?php echo $_smarty_tpl->tpl_vars['equipo']->value['id_equipo_cercal'];?>

             <!--  <input type="text" id="id_equipo_cercal_gestor" value="<?php echo $_smarty_tpl->tpl_vars['equipo']->value['id_equipo_cercal'];?>
"> -->
            </td>
            <td><?php echo $_smarty_tpl->tpl_vars['equipo']->value['nombre_equipo'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['equipo']->value['tipo_medicion'];?>
</td>
            <td>
              <?php echo $_smarty_tpl->tpl_vars['equipo']->value['fecha_vencimiento'];?>

              <input type="date" name="" id="fecha_vencimiento_gestor<?php echo $_smarty_tpl->tpl_vars['equipo']->value['id_equipo_cercal'];?>
" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['equipo']->value['fecha_vencimiento'];?>
">
            </td>
            <td><?php echo $_smarty_tpl->tpl_vars['equipo']->value['pais'];?>
</td>
            <td><span class="text-<?php echo $_smarty_tpl->tpl_vars['equipo']->value['color'];?>
"><?php echo $_smarty_tpl->tpl_vars['equipo']->value['diferencia'];?>
</span></td>
            <td><?php echo $_smarty_tpl->tpl_vars['equipo']->value['numero_certificado'];?>

              <input type="text" name="" id="numero_certificado_gestor<?php echo $_smarty_tpl->tpl_vars['equipo']->value['id_equipo_cercal'];?>
" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['equipo']->value['numero_certificado'];?>
"></td>
            <td>
              <a id="btn_editar_item" href="index.php?module=<?php echo $_smarty_tpl->tpl_vars['modulo']->value[10];?>
&page=<?php echo $_smarty_tpl->tpl_vars['page']->value[0];?>
&equipo=<?php echo $_smarty_tpl->tpl_vars['equipo']->value['id_equipo_cercal'];?>
" class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-outline-2x btn btn-outline-info btn-sm"><i class="lnr-pencil btn-icon-wrapper"></i></a>
           </td>
           <td>
               <a data-id="<?php echo $_smarty_tpl->tpl_vars['equipo']->value['id_item'];?>
" data-tipoitem="<?php echo $_smarty_tpl->tpl_vars['equipo']->value['id_tipo'];?>
" id="btn_eliminar_item" data-nombre="<?php echo $_smarty_tpl->tpl_vars['equipo']->value['nombre_item'];?>
"  class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-outline-2x btn btn-outline-warning btn-sm" ><i class="lnr-cross btn-icon-wrapper pe-7s-news-paper"></i></a>

               <a data-id="<?php echo $_smarty_tpl->tpl_vars['equipo']->value['id_equipo_cercal'];?>
" id="btn_nuevo_certificado" class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-outline-2x btn btn-outline-success btn-sm" ><i class="lnr-cross btn-icon-wrapper pe-7s-check"></i></a>

                <a data-id="<?php echo $_smarty_tpl->tpl_vars['equipo']->value['id_equipo_cercal'];?>
" id="btn_cancelar_update_certificado"  class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-outline-2x btn btn-outline-danger btn-sm" ><i class="lnr-cross btn-icon-wrapper"></i></a> 
           </td>
           <td>    
              <a data-id="<?php echo $_smarty_tpl->tpl_vars['equipo']->value['id_item'];?>
" data-tipoitem="<?php echo $_smarty_tpl->tpl_vars['equipo']->value['id_tipo'];?>
" id="btn_eliminar_item" data-nombre="<?php echo $_smarty_tpl->tpl_vars['equipo']->value['nombre_item'];?>
"  class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-outline-2x btn btn-outline-danger btn-sm" ><i class="lnr-cross btn-icon-wrapper"></i></a>
            </td>
          </tr> 
          <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </table>
        
    </div>

   </div>
 </div>
</div> 
<?php echo '<script'; ?>
 type="text/javascript" src="design/js/control_equipos.js"><?php echo '</script'; ?>
>

<?php }
}
