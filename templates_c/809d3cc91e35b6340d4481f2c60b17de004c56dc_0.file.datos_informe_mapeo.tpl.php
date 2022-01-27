<?php
/* Smarty version 3.1.34-dev-7, created on 2022-01-25 23:33:23
  from '/home/god/public_html/CerNet2.0/templates/mapeos_generales/datos_informe_mapeo.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_61f088c3e7c625_53711794',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '809d3cc91e35b6340d4481f2c60b17de004c56dc' => 
    array (
      0 => '/home/god/public_html/CerNet2.0/templates/mapeos_generales/datos_informe_mapeo.tpl',
      1 => 1643153600,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61f088c3e7c625_53711794 (Smarty_Internal_Template $_smarty_tpl) {
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
                <input type="text" name="" id="bandeja_general" class="form-control" placeholder="Ingrese el nombre de la bandeja / altura">
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
                    <input type="date" class="form-control" id="fecha_inicio_mapeo_general">
                  </div>
                  <div class="col-sm-3">
                    <label>H:</label>
                    <select class="form-control" id="hora_inicio_mapeo_general">
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
                    <select class="form-control" id="minuto_inicio_mapeo_general">
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
                    <select class="form-control" id="segundo_inicio_mapeo_general">
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
                    <input type="date" class="form-control" id="fecha_fin_mapeo_general">
                  </div>
                  <div class="col-sm-3">
                    <label>H:</label>
                    <select class="form-control" id="hora_fin_mapeo_general">
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
                    <select class="form-control" id="minuto_fin_mapeo_general">
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
                    <select class="form-control" id="segundo_fin_mapeo_general">
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
                  <div class="col-sm-6">
                    <label for="">Intervalo:</label>
                    <input type="text" placeholder="Intervalo en seg" class="form-control" id="intervalo_mapeo">
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

  <div class="tab-pane tabs-animation fade show" id="asignacion_general" role="tabpanel">
    <div class="row">
      <div class="col-sm-6">
        <div class="card">
          <div class="card-header">Lista de mapeos disponibles</div>
          <div class="card-body">
            <table class="table" style="text-align:center;">
              <thead>
                <th>Nombre</th>
                <th>Inicio</th>
                <th>Fin</th>
                <th>Acciones</th>
              </thead>
              <tbody id="traer_mapeos_asignacion">

              </tbody>
            </table>
          </div>
        </div>
      </div>

      <div class="col-sm-6" id="lista_de_bandejas">
        <div class="card">
          <div class="card-header">Lista de bandejas/Alturas disponibles</div>
          <div class="card-body">
            <table class="table" style="text-align:center;">
              <thead>
                <th>Nombre</th>
                <th>Opciones</th>
              </thead>
              <tbody id="traer_bandejas_asignacion">

              </tbody>

            </table>
          </div>
        </div>
      </div>


    </div>

    <hr>

    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-body" style="text-align:center;">
            <span class="text-muted">Mapeo a configurar: </span> <span class="text-danger" id="nombre_mapeo_configurar">----</span>
            <span class="text-muted">bandeja a configurar: </span> <span class="text-danger" id="nombre_bandeja_configurar">----</span>

            <input type="hidden" id="id_mapeo_configurar">
            <input type="hidden" id="id_bandeja_configurar">

          </div>
        </div>
      </div>
    </div>

    <hr>

    <div class="row" id="asignacion_sensores">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header">
            Asignación de sensores <input type="text" class="form-control" id="buscador_sensores" placeholder="Ingresa el nombre del sensor a buscar">
          </div>
          <div class="card-body">
            <table class="table" style="text-align:center;">
              <thead>
                <th>Nombre sensor</th>
                <th>Certificado</th>
                <th>Fecha vencimiento</th>
                <th>Asignar</th>
              </thead>
              <tbody id="resultado_sensores">
                <tr id="titulo_predeterminado_sensor">
                  <td colspan="3"><span class="text-warning">No has ingresado ningún sensor</span></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <hr>

    <div class="row" id="mostrar_sensores">
      <div class="col-sm-12">
        <div class="card-header">Sensores asignados</div>
        <div class="card body" id="from_termocupla">
          <table class="table" style="text-align:center;">
            <thead>
              <th>Sensor</th>
              <th>Posición</th>
              <th>Remover</th>
            </thead>
            <tbody id="listar_sensores_asignados_termocupla">
            </tbody>
          </table>

          <hr>
          <button class="btn btn-success" id="cargado_archivo_dc">Archivo cargado</button>
          <button class="btn btn-danger" id="cargar_archivo_dc">Cargar archivo</button>

        </div>
        <div class="card body" id="from_sensores">
          <table class="table" style="text-align:center;">
            <thead>
              <th>Sensor</th>
              <th>Posición</th>
              <th>Cantidad registros</th>
              <th>Opciones</th>

            </thead>
            <tbody id="listar_sensores_asignados_sensores">
            </tbody>
          </table>

          <hr>
        </div>
      </div>
    </div>

    <hr>

    <div class="row" id="mostrar_dato_crudo">
      <div class="col-sm-12" id="datos_crudos_card">
        <div class="card" id="datos_crudos_termocupla">
          <div class="card-header">
            <span>Datos crudos </span><span class="text-danger">X</span>
          </div>
          <div class="card-body" style="text-align: center;">
            <form id="formulario_sensores_generales" enctype="multipart/form-data" method="post">
              <input type="hidden" id="id_mapeo_datos_crudos" name="id_mapeo">
              <input type="hidden" name="movimiento" value="configurar_datos_crudos">
              <table class="table" style="text-align:center;">
                <thead>
                  <th>Sensor</th>
                  <th>Colum. Temp</th>
                  <th>Colum. Hum</th>
                </thead>
                <tbody id="sensores_asignado_dc">

                </tbody>
              </table>


              <hr>
              <button class="btn btn-info" id="configuracion_datos_crudos">Configurar</button>
            </form>
            <button class="btn btn-danger" id="eliminar_datos_crudos">Eliminar</button>
            <img src="design/images/loading_mapeos.gif" id="banner_cargando"></img>

          </div>
        </div>
        <div class="row justify-content-center align-item-center " id="id_contenedor">
          <div class="card col-sm-6 shadow-lg p-3 mb-5 bg-white rounded" id="datos_crudos_sensores" style="position: absolute;top: -700px;">
            <div class="card-header ">
              <div class="col-sm-11"> Subir datos crudos </div>

              <div style=""><span class="btn btn-danger float-right" id="cerrar_dato">X</span></div>
            </div>
            <div class="card-body">
              <form id="form_cargar_archivos" enctype="multipart/form-data" method="post">
                <div class="row" id="configurar_sensor_aqui">

                </div>
                <br>
                <div class="row" style="text-align: center;">
                  <div class="col-sm-12">
                    <button class="btn btn-primary">
                                  Enviar
                                </button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>

      </div>
    </div>
    <hr>
  </div>
  <!--Cierre de content de asignación--->

  <div class="tab-pane tabs-animation fade show" id="informes_1_general" role="tabpanel">
    <div class="row">
      <div class="col-sm-4"></div>
      <div class="col-sm-2" style="text-align:center;">
        <div class="form-row col-sm-12">
          <div class="col-sm-9">
            <input type="text" id="correlativo" class="form-control" placeholder="Ingresar correlativo">
          </div>
          <div class="col-sm-3">
            <button class="btn btn-success" id="asignar_correlativo"><i class="pe-7s-check"></i></button>
          </div>
        </div>
      </div>
    </div>
    <hr>
    <div class="row">
      <div class="col-sm-6">
        <div class="card">
          <div class="card-header">
            Seleccion de pruebas
          </div>
          <div class="card-body">
            <table class="table" style="text-align:center;">
              <thead>
                <th>Nombre</th>
                <th>Inicio</th>
                <th>Fin</th>
                <th>Acciones</th>
              </thead>
              <tbody id="traer_mapeos_informe">

              </tbody>
            </table>
          </div>
        </div>
      </div>

      <div class="col-sm-6">
        <div class="card">
          <div class="card-header">Creación de informes para prueba <span class="text-primary" id="nombre_prueba_creacion_informe"></span></div>
          <div class="card-body">
            <div class="row" style="text-align:center;">
              <div class="col-sm-3">
                <button class="btn btn-info" id="creacion_temp">TEMP</button>
              </div>
              <div class="col-sm-3">
                <button class="btn btn-info" id="creacion_hum">HUM</button>
              </div>
              <div class="col-sm-3">
                <button class="btn btn-info" id="creacion_base">Info Base</button>
              </div>
              <div class="col-sm-3">
                <button class="btn btn-info" id="creacion_ar">Analisis de Riesgo</button>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>



    <br>
    <div class="row">
      <div class="col-sm-12">
        <div class="card" id="card_informes">
          <div class="card-header">Lista de informes para la prueba <span class="text-primary" id="nombre_prueba_informe"></span></div>
          <div class="card-body">
            <input type="hidden" id="id_mapeo_informe">

            <table class="table" style="text-align:center">
              <thead>
                <th>Nombre</th>
                <th>Tipo</th>
                <th>Fecha Creación</th>
                <th>Acciones</th>
              </thead>
              <tbody id="listar_informe"></tbody>
            </table>
          </div>
        </div>

        <div class="card" id="edicion_informe">
          <div class="card-header">Edición de informe <button id="close_edicion" class="btn btn-danger" style="margin-left: 80%;">X</button></div>
          <div class="card-body" id="editar_informe_row">
            
                     
          </div>
        </div>
      </div>
    </div>

  </div>
  <!---FINAL DEL CONTENT PARA INFORMES--->

</div>




<?php echo '<script'; ?>
 type="text/javascript" src="design/js/controlador_mapeo_general.js"><?php echo '</script'; ?>
><?php }
}
