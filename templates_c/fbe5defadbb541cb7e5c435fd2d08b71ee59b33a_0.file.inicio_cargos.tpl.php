<?php
/* Smarty version 3.1.34-dev-7, created on 2021-08-17 16:52:53
  from '/home/god/public_html/CERNET/templates/cargos/inicio_cargos.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_611be96536bc33_21112068',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fbe5defadbb541cb7e5c435fd2d08b71ee59b33a' => 
    array (
      0 => '/home/god/public_html/CERNET/templates/cargos/inicio_cargos.tpl',
      1 => 1629217735,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_611be96536bc33_21112068 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-header">
        Asignación de cargos
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-sm-6">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-12">
                    <label>Usuario:</label>
                    <select id="traer_empleados_cargos" class="form-control">
                         
                    </select>
                    <input type="hidden" id="id_usuario_cargos">
                  </div>
                </div>
                <br>
                <div class="row" style="text-align:center;">
                  <div class="col-sm-12" id="informacion_cargo">
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="card"> 
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-6">
                    <label>Departamento:</label>
                    <select class="form-control" id="departamento_cargo">
                      
                    </select>
                  </div>
                  <div class="col-sm-6">
                    <label>Cargo:</label>
                    <select class="form-control" id="cargo_cargo">
                      <option value="0">Seleccione...</option>
                      <option value="Ingeniero validaciones">Ingeniero Validaciones</option>
                      <option value="Consultor GEP">Consultor GEP</option>
                      <option value="Consultor SPOT">Consultor SPOT</option>
                      <option value="Analista documental">Analista Documental</option>
                      <option value="TI">TI</option>
                      <option value="Calidad">Calidad</option>
                      <option value="Head">Head</option>
                    </select>
                  </div>
                </div>
                <br>
                <div class="row" style="text-align:center;">
                  <div class="col-sm-12">
                    <button class="btn btn-success" id="asignar_cargo">
                      Modificar
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php echo '<script'; ?>
 src="design/js/control_cargos.js"><?php echo '</script'; ?>
><?php }
}
