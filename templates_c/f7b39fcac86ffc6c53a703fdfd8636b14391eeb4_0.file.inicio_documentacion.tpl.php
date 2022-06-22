<?php
/* Smarty version 3.1.34-dev-7, created on 2022-04-28 13:03:46
  from '/home/god/public_html/CerNet2.0/templates/documentacion/inicio_documentacion.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_626a90b2c22d21_39433344',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f7b39fcac86ffc6c53a703fdfd8636b14391eeb4' => 
    array (
      0 => '/home/god/public_html/CerNet2.0/templates/documentacion/inicio_documentacion.tpl',
      1 => 1649429192,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_626a90b2c22d21_39433344 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="row">
  <div class="col-sm-12">
    <div class="card-header">
      Sistema de gestión de aprobaciones
    </div>
    <div class="card">
      
      <div class="row-form">
        <div class="col-sm-12"><br></div>
      </div>   
      
      <div class="row-form">
        <div class="col-sm-6">
         <!-- <label>Selecciona la empresa:</label>
          <select class="form-control" id="empresa_documentacion">
            <option value="0">Seleccione...</option>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['array_empresa']->value, 'empresa');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['empresa']->value) {
?>
            <option value="<?php echo $_smarty_tpl->tpl_vars['empresa']->value['id_empresa'];?>
"><?php echo $_smarty_tpl->tpl_vars['empresa']->value['nombre_empresa'];?>
</option>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
          </select>-->
          <label>Empresa:</label>
            <input type="hidden" id="id_empresa">
            <input type="text" id="buscador_empresa" class="form-control" placeholder="Ingresa el nombre de la empresa" value="<?php echo $_smarty_tpl->tpl_vars['filtro']->value['nombre_empresa'];?>
">
            <div >
              <table class="table" id="aqui_resultados_empresa">
              </table>
            </div>
        </div>
        <br>
      </div>
      
      <div class="row">
        
        <div class="col-sm-6">
          <div class="card">
            <div class="card-header">
              Ordenes de trabajo
            </div>
            <div class="card-body">
              <table class="table" style="text-align:center;">
                <thead>
                  <th># OT</th>
                  <th>Fecha creación</th>
                  <th>Acciones</th>
                </thead>
                <tbody id="traer_ot_documentacion">
                
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="card">
            <div class="card-header"> 
              En proceso de documentación
            </div>
            
            <div class="card-body">
              <table class="table" style="text-align:center;">
                <thead>
                  <th>#</th>
                  <th>OT</th>
                  <th>Fecha creación</th>
                  <th>Acciones</th>
                </thead>
                <tbody id="despues_documentacion">
                </tbody>
              </table>
            </div>
          </div>
        
        </div>
      </div>     
    </div>
  </div>
</div>
<?php echo '<script'; ?>
 type="text/javascript" src="design/js/funciones_documentacion.js"><?php echo '</script'; ?>
><?php }
}
