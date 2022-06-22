<?php
/* Smarty version 3.1.34-dev-7, created on 2021-04-09 09:48:04
  from '/home/god/public_html/CERNET/templates/documentacion/inicio_documentacion.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_607022d4db83e5_89331497',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'aae663baa2d5f6c6736131baf3d7b7a9f171163a' => 
    array (
      0 => '/home/god/public_html/CERNET/templates/documentacion/inicio_documentacion.tpl',
      1 => 1617959973,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_607022d4db83e5_89331497 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="row">
  <div class="col-sm-12">
    <div class="card-header">
      Gestion de documentaciòn para procesos GEP
    </div>
    <div class="card">
      
      <div class="row-form">
        <div class="col-sm-12"><br></div>
      </div>   
      
      <div class="row-form">
        <div class="col-sm-6">
          <label>Selecciona la empresa:</label>
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
          </select>
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
