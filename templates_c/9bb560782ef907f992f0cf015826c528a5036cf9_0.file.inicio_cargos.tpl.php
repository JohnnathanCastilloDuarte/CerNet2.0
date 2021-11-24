<?php
/* Smarty version 3.1.34-dev-7, created on 2021-11-24 15:55:17
  from 'C:\xampp\htdocs\CerNet2.0\templates\cargos\inicio_cargos.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_619e525596a7f5_68118496',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9bb560782ef907f992f0cf015826c528a5036cf9' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CerNet2.0\\templates\\cargos\\inicio_cargos.tpl',
      1 => 1637765716,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_619e525596a7f5_68118496 (Smarty_Internal_Template $_smarty_tpl) {
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
                    <label>Seleccione compañia</label>
                    <select id="empresa_cargo" class="form-control">
        
                    </select>
                  </div>
                </div>
                <br>
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
             
                    </select>
                  </div>
                </div>

                <br>
                <!--
                <div class="row">
                  <div class="col-sm-6">
                    <label>Rol de informe</label>
                    <select id="rol_informe" class="form-control">
                      <option value="0">Seleccione</option>
                      <option value="Elaborador">Elaborador</option>
                      <option value="Aprobador">Aprobador</option>
                      <option value="Revisor">Revisor</option>
                    </select>
                  </div>
                </div>-->
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
