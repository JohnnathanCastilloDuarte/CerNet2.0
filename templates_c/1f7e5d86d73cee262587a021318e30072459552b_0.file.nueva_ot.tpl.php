<?php
/* Smarty version 3.1.34-dev-7, created on 2022-06-17 23:30:35
  from 'C:\xampp\htdocs\CerNet2.0\templates\OT\nueva_ot.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_62acf27ba3bf98_85581940',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1f7e5d86d73cee262587a021318e30072459552b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CerNet2.0\\templates\\OT\\nueva_ot.tpl',
      1 => 1655483633,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62acf27ba3bf98_85581940 (Smarty_Internal_Template $_smarty_tpl) {
?><ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
  <li class="nav-item">
    <a role="tab" class="nav-link active" id="tab-0" data-toggle="tab" href="#crear_ot">
		<span>Nueva OT</span>
		</a>
  </li>
</ul>

<div class="tab-content">
  <div class="tab-pane tabs-animation fade show active" id="crear_ot" role="tabpanel">
    <div class="row">
      <div class="col-sm-5">
        <div class="card">
          <div class="card-header">
            Creación de OT
          </div>
          <div class="card-body">
            <div class="row">
              <label>Numero OT:</label>
              <div class="input-group">
                <div class="input-group-prepend"><span class="input-group-text">OT-</span></div>
                <input type="text" id="num_ot" class="form-control" placeholder="Ingrese el numero de OT" maxlength="5" required>
                <div class="input-group-append"><a class="btn btn-success text-white" id="btn_buscar_num_ot" style="bg-color:white;">Buscar</a></div>
              </div>
            </div>
            <br>
         
            <div id="sin_ot">
              <input type="hidden" id="id_ot_oculto">
              <div class="row">
                <label>Empresa</label>
                <input type="text" id="buscador_empresa" class="form-control" placeholder="Ingresa el nombre de la empresa">
                <input type="hidden" id="id_empresa" value="<?php echo $_smarty_tpl->tpl_vars['camara_congelada']->value['id_empresa'];?>
">
                <div>

                  <table class="table" id="aqui_resultados_empresa">
                  </table>
                </div>
              </div>
              <div class="row">
                <label>Usuario</label>
                <input type="text" id="buscador_usuarios" class="form-control" placeholder="Ingresa el usuario">
                <input type="hidden" id="id_usuario">
                <div>

                  <table class="table" id="aqui_resultados_usuario">
                  </table>
                </div>
              </div>
              <br>
              <div class="row" style="text-align:center;">
                <div class="col-sm-12">
                  <a class="mb-2 mr-2  btn-shadow btn-outline-2x btn btn-outline-info text-info" id="btn_nueva_ot">Aceptar</a>
				  <a class="mb-2 mr-2  btn-shadow btn-outline-2x btn btn-outline-info text-primary" id="btn_editar_ot">Actualizar</a>
                  <button class="mb-2 mr-2  btn-shadow btn-outline-2x btn btn-outline-primary" id="btn_gestionar_ot_1">Gestionar OT</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <?php echo '<script'; ?>
 type="text/javascript" src="design/js/num_ot.js"><?php echo '</script'; ?>
>

</div><?php }
}
