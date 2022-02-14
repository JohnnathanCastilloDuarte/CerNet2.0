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
                    <select class="form-control" id="minuto_inicio_mapeo_general">
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
                    <select class="form-control" id="segundo_inicio_mapeo_general">
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
                    <input type="date" class="form-control" id="fecha_fin_mapeo_general">
                  </div>
                  <div class="col-sm-3">
                    <label>H:</label>
                    <select class="form-control" id="hora_fin_mapeo_general">
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
                    <select class="form-control" id="minuto_fin_mapeo_general">
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
                    <select class="form-control" id="segundo_fin_mapeo_general">
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
    <div class="row" tyle="text-align:center;">
      <div class="col-sm-12">
        <div class="form-row">
          <div class="col-sm-4">
            <input type="text" id="correlativo" class="form-control" placeholder="Ingresar correlativo">
          </div>
           <div class="col-sm-5">
            <input type="text" id="responsable_informe" class="form-control" placeholder="Ingresar el responsable">
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
          <hr>
          <div class="card-body" id="edicion_imagenes">

            <form id="formulario_para_imagenes" enctype="multipart/form-data" method="post">
              <input type="hidden" name="id_informe_imagenes" id="id_informe_imagenes">
              <input type="hidden" name="tipo_informe" id="tipo_informe">
              <div class="row" style="text-align: center;">
                <div class="col-sm-4">
                    <label>Ubicación de sensores</label><br>
                    <input type='file' name='imagen_tipo_1' class='form-control'>
                </div>

                <div class="col-sm-4">
                    <label>Valores promedio, mínima y maxíma</label><button id="ver_grafico_todos_promedio" class="btn btn-success" style="width: 10%;padding: 0;"><img src="design/images/grafico.jpg" style="width: 100%;"></button><br>
                    <input type='file' name='imagen_tipo_2' class='form-control'>
                </div>

                <div class="col-sm-4">
                    <label>Periodo representativo</label><button id="ver_grafico_todos_todos" class="btn btn-success" style="width: 10%;padding: 0;" ><img src="design/images/grafico.jpg" style="width: 100%;"></button><br>
                    <input type='file' name='imagen_tipo_3' class='form-control'>
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-sm-12" style="text-align: center;">
                  <button class="btn btn-info" id="actualizar_imagenes">subir</button>
                </div>
              </div>  
            </form>

            <hr>

            <div class="row" id="aqui_imagenes_informe">
              
            </div>
        </div>
        
        <div class="card" id="edicion_informe_base">
          <div class="card-header">Edición de informe <button id="close_edicion_base" class="btn btn-danger" style="margin-left: 80%;">X</button></div>
          <div class="card-body">
            <form id="formulario_informe" enctype="multipart/form-data" method="post">
              
              <div class="row">
                <div class="col-sm-6">
                    <label>Acta de inspección:</label>
                    <input type="text" class="form-control" name="acta_inspeccion" placeholder="N°123" id="acta_inspeccion">
                </div>
              </div>
            <div class="row">
              <div class="col-sm-6">
                <label>Conclusiones:</label>
                <textarea id="conclusiones_informe_base"  name="conclusiones_informe_base" style="width: 100%;" class="form-control"></textarea>
              </div>
              <div class="col-sm-6">
                <label>Observaciones:</label>
                <textarea id="observaciones_informe_base"  name="observaciones_informe_base"style="width: 100%;" class="form-control"></textarea>
              </div>
            </div>
           
            <hr>
            
            <div class="row">
              <div class="col-sm-3">
                <label>Cargar imagen equipo 1</label>
                <input type="file" name="imagen_base_equipo_1" class="form-control">  
              </div> 
              <div class="col-sm-3">
                <label>Cargar imagen equipo 2</label>
                <input type="file" name="imagen_base_equipo_2" class="form-control">  
              </div>
              <div class="col-sm-3">
                <label>Cargar imagen equipo 3</label>
                <input type="file" name="imagen_base_equipo_3" class="form-control">  
              </div>
              <div class="col-sm-3">
                <label>Cargar imagen equipo 4</label>
                <input type="file" name="imagen_base_equipo_4" class="form-control">  
              </div> 
            </div>
               <hr>
            <div class="row"  style="text-align:center;" id="btn_informe_base">
            
            </div>
            </form>
            <hr>
            <div class="row">
              <div class="col-sm-12">
                <table class="table" style="text-align:center;">
                  <thead>
                     <th>Numeral</th>
                    <th>Observaciones</th>
                    <th>Eliminar</th>
                  </thead>
                  <tbody id="lista_observaciones_informe_base"></tbody>
                </table>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>

  </div>
  <!---FINAL DEL CONTENT PARA INFORMES--->

</div>




<script type="text/javascript" src="design/js/controlador_mapeo_general.js"></script>