<?php
/* Smarty version 3.1.34-dev-7, created on 2021-12-09 18:45:35
  from 'C:\xampp\htdocs\CerNet2.0\templates\mapeos_generales\datos_informe_mapeo.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_61b240bfabc5c4_99116340',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0fb157695bcbf2926c2970945ac5309203d270ce' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CerNet2.0\\templates\\mapeos_generales\\datos_informe_mapeo.tpl',
      1 => 1639071933,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61b240bfabc5c4_99116340 (Smarty_Internal_Template $_smarty_tpl) {
?><ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
	<li class="nav-item">
		<a role="tab" class="nav-link active" id="tab-0" data-toggle="tab" href="#creacion">
			<span>Creación</span>
		</a>
	</li>
	<li class="nav-item" id="asignacion_mapeo_general">
		<a role="tab" class="nav-link" id="asignacion" data-toggle="tab" href="#asignacion_general">
			<span>Asignación</span>
		</a>
	</li>

	<li class="nav-item" id="asignacion_informe_general">
		<a role="tab" class="nav-link" id="informes" data-toggle="tab" href="#informes_1_general">
			<span>Informes</span>
		</a>
	</li>
</ul>

<!---VARIABLES NECESARIAS-->
<input type="hidden" id="id_asignado" value="<?php echo $_smarty_tpl->tpl_vars['id_asignado']->value;?>
">


<div class="tab-content">
    <div class="tab-pane tabs-animation fade show active" id="creacion" role="tabpanel">
        <div class="row">
            <div class="col-sm-5">
                <div class="card">
                    <div class="card-header">Creación de bandejas / Alturas</div>
                    <div class="card-body">
                        <div class="row" style="text-align:center;">
                            <div class="col-sm-12">
                                <label for="">Nombre Bandeja / Altura:</label>
                                <input type="text" name="" id="bandeja_general"class="form-control" placeholder="Ingrese el nombre de la bandeja / altura">
                                <input type="hidden" name="" id="id_bandeja">
                                <br>
                                <button class="btn btn-success" id="btn_nueva_altura_bandeja">Guardar</button>
                                <button class="btn btn-info" id="btn_edita_altura_bandeja">Editar</button>
                                <button class="btn btn-danger" id="btn_atras_altura_bandeja">X</button>
                            </div>
                        </div>
                        
                        <hr>

                        <table class="table" style="text-align:center;">
                            <thead>
                                <th>Nombre</th>
                                <th>Opciones</th>
                            </thead>
                            <tbody id="traer_bandejas">

                            </tbody>

                        </table>
                    </div>
                </div>
            </div>

            <div class="col-sm-7">
                <div class="card">
                    <div class="card-header">
                        <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
							<li class="nav-item">
								<a role="tab" class="nav-link  active" id="mapeo" data-toggle="tab" href="#crear_mapeo_general">
									<span>Mapeo</span>
								</a>
							</li>
							<li class="nav-item">
								<a role="tab" class="nav-link" id="vermapeo" data-toggle="tab" href="#ver_mapeo_general">
									<span>Ver mapeo</span>
								</a>
							</li>
						
						</ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane tabs-animation fade show active" id="crear_mapeo_general" role="tabpanel">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label for="">Nombre prueba:</label>
                                        <input type="text" name="" id="nombre_prueba" class="form-control" placeholder="Ingrese el nombre de la prueba">
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label for="">Inicio de la prueba</label>
                                    </div>
                                </div> 
                                
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label>Fecha:</label>
                                        <input type="date" class="form-control" id="fecha_inicio_mapeo_general" >
                                    </div>
                                    <div class="col-sm-3">
                                        <label>H:</label>
                                        <select  class="form-control" id="hora_inicio_mapeo_general" >
                                            <?php
$_smarty_tpl->tpl_vars['hora'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['hora']->step = 1;$_smarty_tpl->tpl_vars['hora']->total = (int) ceil(($_smarty_tpl->tpl_vars['hora']->step > 0 ? 24+1 - (0) : 0-(24)+1)/abs($_smarty_tpl->tpl_vars['hora']->step));
if ($_smarty_tpl->tpl_vars['hora']->total > 0) {
for ($_smarty_tpl->tpl_vars['hora']->value = 0, $_smarty_tpl->tpl_vars['hora']->iteration = 1;$_smarty_tpl->tpl_vars['hora']->iteration <= $_smarty_tpl->tpl_vars['hora']->total;$_smarty_tpl->tpl_vars['hora']->value += $_smarty_tpl->tpl_vars['hora']->step, $_smarty_tpl->tpl_vars['hora']->iteration++) {
$_smarty_tpl->tpl_vars['hora']->first = $_smarty_tpl->tpl_vars['hora']->iteration === 1;$_smarty_tpl->tpl_vars['hora']->last = $_smarty_tpl->tpl_vars['hora']->iteration === $_smarty_tpl->tpl_vars['hora']->total;?>
                                            <?php if ($_smarty_tpl->tpl_vars['hora']->value < 10) {?>
                                            <option value="0<?php echo $_smarty_tpl->tpl_vars['hora']->value;?>
">0<?php echo $_smarty_tpl->tpl_vars['hora']->value;?>
</option>
                                            <?php } else { ?>
                                            <option value="<?php echo $_smarty_tpl->tpl_vars['hora']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['hora']->value;?>
</option>
                                            <?php }?>									
                                            <?php }
}
?>
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <label>M:</label>
                                        <select  class="form-control" id="minuto_inicio_mapeo_general" >
                                            <?php
$_smarty_tpl->tpl_vars['minuto'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['minuto']->step = 1;$_smarty_tpl->tpl_vars['minuto']->total = (int) ceil(($_smarty_tpl->tpl_vars['minuto']->step > 0 ? 60+1 - (0) : 0-(60)+1)/abs($_smarty_tpl->tpl_vars['minuto']->step));
if ($_smarty_tpl->tpl_vars['minuto']->total > 0) {
for ($_smarty_tpl->tpl_vars['minuto']->value = 0, $_smarty_tpl->tpl_vars['minuto']->iteration = 1;$_smarty_tpl->tpl_vars['minuto']->iteration <= $_smarty_tpl->tpl_vars['minuto']->total;$_smarty_tpl->tpl_vars['minuto']->value += $_smarty_tpl->tpl_vars['minuto']->step, $_smarty_tpl->tpl_vars['minuto']->iteration++) {
$_smarty_tpl->tpl_vars['minuto']->first = $_smarty_tpl->tpl_vars['minuto']->iteration === 1;$_smarty_tpl->tpl_vars['minuto']->last = $_smarty_tpl->tpl_vars['minuto']->iteration === $_smarty_tpl->tpl_vars['minuto']->total;?>
                                            <?php if ($_smarty_tpl->tpl_vars['minuto']->value < 10) {?>
                                            <option value="0<?php echo $_smarty_tpl->tpl_vars['minuto']->value;?>
">0<?php echo $_smarty_tpl->tpl_vars['minuto']->value;?>
</option>
                                            <?php } else { ?>
                                            <option value="<?php echo $_smarty_tpl->tpl_vars['minuto']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['minuto']->value;?>
</option>
                                            <?php }?>									
                                            <?php }
}
?>
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <label>S:</label>
                                        <select  class="form-control" id="segundo_inicio_mapeo_general" >
                                            <?php
$_smarty_tpl->tpl_vars['segundo'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['segundo']->step = 1;$_smarty_tpl->tpl_vars['segundo']->total = (int) ceil(($_smarty_tpl->tpl_vars['segundo']->step > 0 ? 60+1 - (0) : 0-(60)+1)/abs($_smarty_tpl->tpl_vars['segundo']->step));
if ($_smarty_tpl->tpl_vars['segundo']->total > 0) {
for ($_smarty_tpl->tpl_vars['segundo']->value = 0, $_smarty_tpl->tpl_vars['segundo']->iteration = 1;$_smarty_tpl->tpl_vars['segundo']->iteration <= $_smarty_tpl->tpl_vars['segundo']->total;$_smarty_tpl->tpl_vars['segundo']->value += $_smarty_tpl->tpl_vars['segundo']->step, $_smarty_tpl->tpl_vars['segundo']->iteration++) {
$_smarty_tpl->tpl_vars['segundo']->first = $_smarty_tpl->tpl_vars['segundo']->iteration === 1;$_smarty_tpl->tpl_vars['segundo']->last = $_smarty_tpl->tpl_vars['segundo']->iteration === $_smarty_tpl->tpl_vars['segundo']->total;?>
                                            <?php if ($_smarty_tpl->tpl_vars['segundo']->value < 10) {?>
                                            <option value="0<?php echo $_smarty_tpl->tpl_vars['segundo']->value;?>
">0<?php echo $_smarty_tpl->tpl_vars['segundo']->value;?>
</option>
                                            <?php } else { ?>
                                            <option value="<?php echo $_smarty_tpl->tpl_vars['segundo']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['segundo']->value;?>
</option>
                                            <?php }?>									
                                            <?php }
}
?>
                                        </select>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label for="">Fin de la prueba</label>
                                    </div>
                                </div> 
                                
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label>Fecha:</label>
                                        <input type="date" class="form-control" id="fecha_fin_mapeo_general" >
                                    </div>
                                    <div class="col-sm-3">
                                        <label>H:</label>
                                        <select  class="form-control" id="hora_fin_mapeo_general" >
                                            <?php
$_smarty_tpl->tpl_vars['hora'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['hora']->step = 1;$_smarty_tpl->tpl_vars['hora']->total = (int) ceil(($_smarty_tpl->tpl_vars['hora']->step > 0 ? 24+1 - (0) : 0-(24)+1)/abs($_smarty_tpl->tpl_vars['hora']->step));
if ($_smarty_tpl->tpl_vars['hora']->total > 0) {
for ($_smarty_tpl->tpl_vars['hora']->value = 0, $_smarty_tpl->tpl_vars['hora']->iteration = 1;$_smarty_tpl->tpl_vars['hora']->iteration <= $_smarty_tpl->tpl_vars['hora']->total;$_smarty_tpl->tpl_vars['hora']->value += $_smarty_tpl->tpl_vars['hora']->step, $_smarty_tpl->tpl_vars['hora']->iteration++) {
$_smarty_tpl->tpl_vars['hora']->first = $_smarty_tpl->tpl_vars['hora']->iteration === 1;$_smarty_tpl->tpl_vars['hora']->last = $_smarty_tpl->tpl_vars['hora']->iteration === $_smarty_tpl->tpl_vars['hora']->total;?>
                                            <?php if ($_smarty_tpl->tpl_vars['hora']->value < 10) {?>
                                            <option value="0<?php echo $_smarty_tpl->tpl_vars['hora']->value;?>
">0<?php echo $_smarty_tpl->tpl_vars['hora']->value;?>
</option>
                                            <?php } else { ?>
                                            <option value="<?php echo $_smarty_tpl->tpl_vars['hora']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['hora']->value;?>
</option>
                                            <?php }?>									
                                            <?php }
}
?>
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <label>M:</label>
                                        <select  class="form-control" id="minuto_fin_mapeo_general" >
                                            <?php
$_smarty_tpl->tpl_vars['minuto'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['minuto']->step = 1;$_smarty_tpl->tpl_vars['minuto']->total = (int) ceil(($_smarty_tpl->tpl_vars['minuto']->step > 0 ? 60+1 - (0) : 0-(60)+1)/abs($_smarty_tpl->tpl_vars['minuto']->step));
if ($_smarty_tpl->tpl_vars['minuto']->total > 0) {
for ($_smarty_tpl->tpl_vars['minuto']->value = 0, $_smarty_tpl->tpl_vars['minuto']->iteration = 1;$_smarty_tpl->tpl_vars['minuto']->iteration <= $_smarty_tpl->tpl_vars['minuto']->total;$_smarty_tpl->tpl_vars['minuto']->value += $_smarty_tpl->tpl_vars['minuto']->step, $_smarty_tpl->tpl_vars['minuto']->iteration++) {
$_smarty_tpl->tpl_vars['minuto']->first = $_smarty_tpl->tpl_vars['minuto']->iteration === 1;$_smarty_tpl->tpl_vars['minuto']->last = $_smarty_tpl->tpl_vars['minuto']->iteration === $_smarty_tpl->tpl_vars['minuto']->total;?>
                                            <?php if ($_smarty_tpl->tpl_vars['minuto']->value < 10) {?>
                                            <option value="0<?php echo $_smarty_tpl->tpl_vars['minuto']->value;?>
">0<?php echo $_smarty_tpl->tpl_vars['minuto']->value;?>
</option>
                                            <?php } else { ?>
                                            <option value="<?php echo $_smarty_tpl->tpl_vars['minuto']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['minuto']->value;?>
</option>
                                            <?php }?>									
                                            <?php }
}
?>
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <label>S:</label>
                                        <select  class="form-control" id="segundo_fin_mapeo_general" >
                                            <?php
$_smarty_tpl->tpl_vars['segundo'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['segundo']->step = 1;$_smarty_tpl->tpl_vars['segundo']->total = (int) ceil(($_smarty_tpl->tpl_vars['segundo']->step > 0 ? 60+1 - (0) : 0-(60)+1)/abs($_smarty_tpl->tpl_vars['segundo']->step));
if ($_smarty_tpl->tpl_vars['segundo']->total > 0) {
for ($_smarty_tpl->tpl_vars['segundo']->value = 0, $_smarty_tpl->tpl_vars['segundo']->iteration = 1;$_smarty_tpl->tpl_vars['segundo']->iteration <= $_smarty_tpl->tpl_vars['segundo']->total;$_smarty_tpl->tpl_vars['segundo']->value += $_smarty_tpl->tpl_vars['segundo']->step, $_smarty_tpl->tpl_vars['segundo']->iteration++) {
$_smarty_tpl->tpl_vars['segundo']->first = $_smarty_tpl->tpl_vars['segundo']->iteration === 1;$_smarty_tpl->tpl_vars['segundo']->last = $_smarty_tpl->tpl_vars['segundo']->iteration === $_smarty_tpl->tpl_vars['segundo']->total;?>
                                            <?php if ($_smarty_tpl->tpl_vars['segundo']->value < 10) {?>
                                            <option value="0<?php echo $_smarty_tpl->tpl_vars['segundo']->value;?>
">0<?php echo $_smarty_tpl->tpl_vars['segundo']->value;?>
</option>
                                            <?php } else { ?>
                                            <option value="<?php echo $_smarty_tpl->tpl_vars['segundo']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['segundo']->value;?>
</option>
                                            <?php }?>									
                                            <?php }
}
?>
                                        </select>
                                    </div>
                                </div>

                                <br>
                                <div class="row">
                                    <div class="col-sm-12" style="text-align:center;">
                                        <input type="hidden" id="id_mapeo">
                                        <button class="btn btn-success" id="btn_nuevo_mapeo_general">Crear</button>
                                        <button class="btn btn-info" id="btn_editar_mapeo_general">Actualizar</button>
                                        <button class="btn btn-danger" id="btn_atras_mapeo_general">X</button>
                                    </div>
                                </div>
                            </div>        
                       
                            <div class="tab-pane tabs-animation fade show" id="ver_mapeo_general" role="tabpanel">
                                <table class="table" style="text-align:center;">
                                    <thead>
                                        <th>Nombre</th>
                                        <th>Inicio</th>
                                        <th>Fin</th>
                                        <th>Acciones</th>
                                    </thead>
                                    <tbody id="traer_mapeos">

                                    </tbody>
                                </table>
                            </div>
                        </div>     
                        
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

 


<?php echo '<script'; ?>
 type="text/javascript" src="design/js/controlador_mapeo_general.js"><?php echo '</script'; ?>
><?php }
}
