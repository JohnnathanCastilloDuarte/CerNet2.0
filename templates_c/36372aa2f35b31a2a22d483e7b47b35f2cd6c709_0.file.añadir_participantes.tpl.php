<?php
/* Smarty version 3.1.34-dev-7, created on 2021-10-12 23:15:37
  from 'C:\xampp\htdocs\CerNet2.0\templates\documentacion\añadir_participantes.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_6165faf9d796f0_86727674',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '36372aa2f35b31a2a22d483e7b47b35f2cd6c709' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CerNet2.0\\templates\\documentacion\\añadir_participantes.tpl',
      1 => 1634070939,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6165faf9d796f0_86727674 (Smarty_Internal_Template $_smarty_tpl) {
?><ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
	<li class="nav-item">
		<a role="tab" class="nav-link active" id="tab-0" data-toggle="tab" href="#tab1">
			<span>Participantes</span>
		</a>
	</li>
	<li class="nav-item" id="asignacion_mapeo_ultrafreezer">
		<a role="tab" class="nav-link" id="tab-1" data-toggle="tab" href="#tab2">
			<span>Información</span>
		</a>
	</li>
</ul>

<div class="tab-content">
  <div class="tab-pane tabs-animation fade show active" id="tab1" role="tabpanel">
    <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['id_documentacion']->value;?>
" id="id_documentacion">
    <input type="hidden" id="id_persona_documentacion_oculto">
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header">
            Añadir participantes
          </div>

          <div class="card-body">

            <div class="row">
              <div class="col-sm-12">
                <div class="card">
                  <div class="card-header">
                    Participantes nuevos
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <div class="col-sm-6">
                        Empresa
                        <select class="form-control" id="empresa_participante_documentacion" required>
                          <option value="0">Seleccione...</option>
                          <option value="1">Cercal Group</option> 
                          <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['array_empresa_documentacion']->value, 'empresa_documentacion');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['empresa_documentacion']->value) {
?>
 
                            <option value="<?php echo $_smarty_tpl->tpl_vars['empresa_documentacion']->value['id_empresa'];?>
"><?php echo $_smarty_tpl->tpl_vars['empresa_documentacion']->value['nombre_empresa'];?>
</option>
                           <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        </select>
                      </div>

                      <div class="col-sm-6">
                        Usuarios registrados
                        <select id="listar_usuarios_cernet" class="form-control">
                        </select>
                      </div>
                    </div>
                    <input type="hidden" id="id_usuario_documentacion_hide">
                    <div class="row">
                      <div class="col-sm-6">
                        <label>Nombres:</label>
                        <input type="text" class="form-control" id="nombres_participante_documentacion" placeholder="Ingrese nombres" required>
                      </div>
                      <div class="col-sm-6">
                        <label>Apellidos:</label>
                        <input type="text" class="form-control" id="apellidos_partipante_documentacion" placeholder="Ingrese apellidos" required>
                      </div>
                    </div>  
                    <br>

                    <div class="row">
                      <div class="col-sm-6">
                        <label>Email</label>
                        <input type="email" class="form-control" id="email_participante_documentacion" placeholder="Ingrese email" required>
                      </div>
                      <div class="col-sm-6" id="ocultar_si_email">
                        <label>Re email</label>
                        <input type="email" class="form-control" id="email_participante_documentacion_re" placeholder="Confirme email" required>
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-sm-6">
                        <label>Cargo</label>
                        <input type="text" id="cargo_participante_documentacion" class="form-control">
                      </div>
                    </div>
                    <br>
                     <div class="row">
                      <div class="col-sm-6">
                        <label>Rol</label>
                        <select class="form-control" id="rol_participante_documentacion" required>
                          <option value="0">Seleccione...</option>
                          <option value="1">Elaborador</option>
                          <option value="2">Revisador</option>
                          <option value="3">Aprobador</option>
                        </select>
                      </div>

                    </div>
                    <br>

                    <div class="row">
                      <div class="col-sm-12" style="text-align:center;">
                        <button class="btn btn-success" id="guardar_persona_documentacion">
                          Guardar
                        </button>

                        <button class="btn btn-primary" id="actualizar_persona_documentacion">
                          Actualizar
                        </button>
                        <button class="btn btn-danger" id="volver_nuevo_participante">
                          <i class="pe-7s-close"></i>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>


            <div class="row">
                <div class="col-sm-12">
                <div class="card">
                  <div class="card-header">
                    Participantes añadidos
                  </div>
                  <div class="card-body">
                    <h6 style="text-align:center;">
                      PARTICIPANTES
                    </h6>
                    <table class="table" style="text-align:center;">
                      <thead>
                        <th>Nombres</th>
                        <th>Email</th>
                        <th>Rol</th>
                        <th>Empresa</th>
                        <th colspan="3">Gestion</th>
                      </thead>
                      <tbody id="listo_participantes_1">

                      </tbody>
                    </table>
                    <!--
                      <h6 style="text-align:center;">
                      PARTICIPANTES APROBADORES
                     </h6>
                     <table class="table" width="100%">
                      <thead>
                        <th>Nombres</th>
                        <th>Email</th>
                        <th>Rol</th>
                        <th>Empresa</th>
                        <th colspan="3">Gestion</th>
                      </thead>
                      <tbody id="listo_participantes_2">

                      </tbody>
                    </table>-->
                    

                  </div>
                </div>
              </div>
            </div>

          </div>

        </div>
      </div>  
    </div>
  </div><!--CIERRE DEL PRIMER TAB-->  
  <div class="tab-pane tabs-animation fade show" id="tab2" role="tabpanel">
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="row">
            <div class="col-sm-6">
              <div class="card">
                <div class="card-header"><h5>Participantes que ya firmaron</h5></div>
                <div class="card-body">
                  <div class="scroll-area-sm">
                    <div class="scrollbar-container">
                      <table class="table">
                        <thead>
                          <th>#</th>
                          <th>Nombres</th>
                          <th>Fecha firma</th>
                        </thead>
                        <tbody id="participantes_firmaron_ok">

                        </tbody>
                      </table>
                    </div>
                  </div>  
                  <label class="text-primary">Enviar informe para auditor(es) del proyecto </label>
                  <button class="btn btn-primary" id="correo_informe_1"><i class="pe-7s-mail"></i></button>
                </div>
              </div>
            </div>
            
            <div class="col-sm-6">
              <div class="card">
                <div class="card-header"><h5>Participantes que no han firmado</h5></div>
                <div class="card-body">
                  <div class="scroll-area-sm">
                    <div class="scrollbar-container">
                      <table class="table">
                        <thead>
                          <th>#</th>
                          <th>Nombres</th>
                        </thead>
                        <tbody id="participantes_firmaron_no">

                        </tbody>
                      </table>
                    </div>
                  </div>  
                  <label class="text-primary">Enviar informe para auditor(es) del proyecto </label>
                  <button class="btn btn-primary" id="correo_informe_2"><i class="pe-7s-mail"></i></button>
                  <br>
                  <label class="text-primary">Recordar a firmantes </label>
                  <button class="btn btn-warning" id="correo_informe_3"><i class="pe-7s-mail"></i></button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>  
  </div><!--CIERRE DEL SEGUNDO TAB-->
  
</div><!--CIERRE DEL COMPONENTES DE LAST TABS-->    
<?php echo '<script'; ?>
 type="text/javascript" src="design/js/funciones_documentacion.js"><?php echo '</script'; ?>
><?php }
}
