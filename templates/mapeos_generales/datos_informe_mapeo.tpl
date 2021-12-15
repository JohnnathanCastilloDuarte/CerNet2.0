<ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
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
<input type="hidden" id="id_asignado" value="{$id_asignado}">


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
                                            {for $hora=0 to 24}
                                            {if $hora lt 10}
                                            <option value="0{$hora}">0{$hora}</option>
                                            {else}
                                            <option value="{$hora}">{$hora}</option>
                                            {/if}									
                                            {/for}
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <label>M:</label>
                                        <select  class="form-control" id="minuto_inicio_mapeo_general" >
                                            {for $minuto=0 to 60}
                                            {if $minuto lt 10}
                                            <option value="0{$minuto}">0{$minuto}</option>
                                            {else}
                                            <option value="{$minuto}">{$minuto}</option>
                                            {/if}									
                                            {/for}
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <label>S:</label>
                                        <select  class="form-control" id="segundo_inicio_mapeo_general" >
                                            {for $segundo=0 to 60}
                                            {if $segundo lt 10}
                                            <option value="0{$segundo}">0{$segundo}</option>
                                            {else}
                                            <option value="{$segundo}">{$segundo}</option>
                                            {/if}									
                                            {/for}
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
                                            {for $hora=0 to 24}
                                            {if $hora lt 10}
                                            <option value="0{$hora}">0{$hora}</option>
                                            {else}
                                            <option value="{$hora}">{$hora}</option>
                                            {/if}									
                                            {/for}
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <label>M:</label>
                                        <select  class="form-control" id="minuto_fin_mapeo_general" >
                                            {for $minuto=0 to 60}
                                            {if $minuto lt 10}
                                            <option value="0{$minuto}">0{$minuto}</option>
                                            {else}
                                            <option value="{$minuto}">{$minuto}</option>
                                            {/if}									
                                            {/for}
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <label>S:</label>
                                        <select  class="form-control" id="segundo_fin_mapeo_general" >
                                            {for $segundo=0 to 60}
                                            {if $segundo lt 10}
                                            <option value="0{$segundo}">0{$segundo}</option>
                                            {else}
                                            <option value="{$segundo}">{$segundo}</option>
                                            {/if}									
                                            {/for}
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

            <div class="col-sm-6">
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
                        <span class="text-muted">Mapeo a configurar: </span> <span class="text-primary" id="nombre_mapeo_configurar">----</span>
                        <span class="text-muted">bandeja a configurar: </span> <span class="text-primary" id="nombre_bandeja_configurar">----</span>

                        <input type="hidden" id="id_mapeo_configurar">
                        <input type="hidden" id="id_bandeja_configurar">

                    </div>
                </div>
            </div>
        </div>

        <hr>

        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header">
                        Asignación de sensores <input type="text" class="form-control" id="buscador_sensores" placeholder="Ingresa el nombre del sensor a buscar">
                    </div>
                    <div class="card-body">
                        <table class="table" style="text-align:center;">
                            <thead>
                                <th>Nombre sensor</th>
                                <th>Certificado</th>
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

            <div class="col-sm-6">
                <div class="card-header">Sensores asignados</div>
                <div class="card body">
                    <table class="table" style="text-align:center;">
                        <thead>
                            <th>Sensor</th>
                            <th>Posición</th>
                            <th>Remover</th>
                        </thead>
                        <tbody id="listar_sensores_asignados">
                        </tbody>
                    </table>

                    <hr>
                    <button class="btn btn-success" id="cargado_archivo_dc">Archivo cargado</button>
                    <button class="btn btn-danger" id="cargar_archivo_dc">Cargar archivo</button>

                </div>
            </div>
        </div>

        <hr>

        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header">
                        Datos crudos <span class="text-muted" style="margin-left: 100px;">Estado Datos crudos</span>
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
            </div>
        </div>
    </div> <!--Cierre de content de asignación--->

    <div class="tab-pane tabs-animation fade show" id="informes_1_general" role="tabpanel">
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-2" style="text-align:center;">
                <input type="text"  id="correlativo" class="form-control" placeholder="Ingresar correlativo">
                <br>
                <button class="btn btn-success" id="asignar_correlativo">Asignar</button>
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
                            <div class="col-sm-4">
                                <button class="btn btn-info" id="creacion_temp">TEMP</button>
                            </div>
                            <div class="col-sm-4">
                                <button class="btn btn-info" id="creacion_hum">HUM</button>
                            </div>
                            <div class="col-sm-4">
                                <button class="btn btn-info" id="creacion_base">Info Base</button>
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
                    <div class="card-body">

                    </div>
                </div>
            </div>
        </div>

    </div><!---FINAL DEL CONTENT PARA INFORMES--->

</div>

 


<script type="text/javascript" src="design/js/controlador_mapeo_general.js"></script>