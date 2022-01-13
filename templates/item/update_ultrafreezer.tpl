<div class="row">
  <div class="col-sm-12">
    {foreach from=$array_ultrafreezer item=ultrafreezer}

    <div class="card">
      <div class="card-header">
        <h5>
          Edición del equipo <span>{$ultrafreezer.nombre_ultrafreezer}</span>
        </h5>
      </div>
      <div class="card-body">
        <div id="smartwizard2" class="forms-wizard-alt">
          <ul class="forms-wizard">
            <li>
              <a href="#step-12">
											<em>1</em><span>Identificación del equipo</span>
									</a>
            </li>
            <li>
              <a href="#step-22">
											<em>2</em><span>Caracteristica del equipo</span>
									</a>
            </li>
            <!--	<li>
									<a href="#step-32">
											<em>3</em><span>Equipos</span>
									</a>
							</li>
						<li id="si_envia">
									<a href="#step-42">
											<em>4</em><span>Evidencia</span>
									</a>
							</li>-->
          </ul>

          <div class="form-wizard-content">
            <div id="step-12">
              <div class="form-row">
                <div class="col-sm-6">
                <input type="hidden" id="id_item_ultrafreezer" value="{$ultrafreezer.id_ultrafreezer}">
                  <input type="hidden" id="id_item_2_ultrafreezer" value="{$ultrafreezer.id_item}">
                  <label>Nombre del Ultrafreezer</label>
                  <input type="text" id="nombre_ultrafreezer" class="form-control" value="{$ultrafreezer.nombre_ultrafreezer}" required="" placeholder="Nombre ultrafreezer">
                </div>
                <div class="col-sm-6">
                 <label>Empresa:</label>
                    <input type="hidden" id="id_empresa" value="{$ultrafreezer.id_empresa}">
                    <input type="text" id="buscador_empresa" class="form-control" placeholder="Ingresa el nombre de la empresa" value="{$ultrafreezer.nombre_empresa}">
                    <div>
                      <table class="table" id="aqui_resultados_empresa">
                      </table>
                    </div>
                </div>

              </div>
              <br>
              <div class="form-row">
                <div class="col-sm-6">
                  <label>Fabricante/Marca:</label>
                  <input type="text" id="fabricante_ultrafreezer" class="form-control" placeholder="Fabricante ultrafreezer" value="{$ultrafreezer.fabricante}" required="">
                </div>
                <div class="col-sm-6">
                  <label>Modelo:</label>
                  <input type="text" id="modelo_ultrafreezer" class="form-control" placeholder="Modelo ultrafreezer" value="{$ultrafreezer.modelo}" required="">
                </div>
              </div>
              <br>
              <div class="form-row">
                <div class="col-sm-12">
                  <label>Descripción:</label>
                  <textarea class="form-control" id="desc_ultrafreezer" placeholder="Descripción"> {$ultrafreezer.descripcion_ultrafreezer}</textarea>
                </div>
              </div>
              <br>
              <div class="form-row">
                <div class="col-sm-4">
                  <label>N° Serie:</label>
                  <input type="text" id="n_serie_ultrafreezer" class="form-control" placeholder="N° Serie" value="{$ultrafreezer.n_serie}">
                </div>
                <div class="col-sm-4">
                  <label>Codigo interno:</label>
                  <input type="text" id="codigo_interno_ultrafreezer" class="form-control" placeholder="Codigo interno" value="{$ultrafreezer.c_interno}">
                </div>
                <div class="col-sm-4">
                  <label>Año fabricación</label>
                  <input type="date" id="fecha_fabricacion_ultrafreezer" class="form-control" placeholder="" value="{$ultrafreezer.fecha_fabricacion}">
                </div>
              </div>
            </div>

            <div id="step-22">
              <div class="form-row">
                <div class="col-sm-4">
                  <label>Dirección equipo:</label>
                  <input type="text" id="direccion_ultrafreezer" class="form-control" placeholder="Dirección equipo" value="{$ultrafreezer.direccion}">
                </div>
                <div class="col-sm-4">
                  <label>Ubicación interna equipo:</label>
                  <input type="text" id="ubicacion_interna_ultrafreezer" class="form-control" placeholder="Ubicación equipo" value="{$ultrafreezer.ubicacion}">
                </div>
                 <div class="col-sm-4">
                  <label>Área interna equipo:</label>
                  <input type="text" id="area_interna_ultrafreezer" class="form-control" placeholder="Área interna" value="{$ultrafreezer.area_interna}">
                </div>
              </div>
              <br>
              <div class="form-row">
                <div class="col-sm-4">
                  <label>Voltaje:</label>
                  <input type="text" id="voltaje_ultrafreezer" class="form-control" placeholder="Voltaje" value="{$ultrafreezer.voltaje}">
                </div>
                <div class="col-sm-4">
                  <label>Potencia:</label>
                  <input type="text" id="potencia_ultrafreezer" class="form-control" placeholder="Potencia" value="{$ultrafreezer.potencia}">
                </div>
                <div class="col-sm-4">
                  <label>Capacidad:</label>
                  <input type="text" id="capacidad_ultrafreezer" class="form-control" placeholder="Capacidad" value="{$ultrafreezer.capacidad}">
                </div>
              </div>
              <br>
              <div class="form-row">
                <div class="col-sm-3">
                  <label>Peso:</label>
                  <input type="text" id="peso_ultrafreezer" class="form-control" placeholder="Peso" value="{$ultrafreezer.peso}">
                </div>
                <div class="col-sm-3">
                  <label>Alto(mm):</label>
                  <input type="text" id="alto_ultrafreezer" class="form-control" placeholder="Alto" value="{$ultrafreezer.alto}">
                </div>
                <div class="col-sm-3">
                  <label>Largo(mm):</label>
                  <input type="text" id="largo_ultrafreezer" class="form-control" placeholder="Largo" value="{$ultrafreezer.largo}">
                </div>
                <div class="col-sm-3">
                  <label>Ancho(mm):</label>
                  <input type="text" id="ancho_ultrafreezer" class="form-control" placeholder="Ancho" value="{$ultrafreezer.ancho}">
                </div>
              </div>

              <br>
              <div class="form-row">
                <div class="col-sm-4">
                  <label>Valor seteado temperatura:</label>
                  <input type="text" id="valor_seteado_tem_ultrafreezer" class="form-control" placeholder="Valor seteado temperatura" value="{$ultrafreezer.seteado_tem}" required>
                </div>

                <div class="col-sm-4">
                  <label>Temperatura minima:</label>
                  <input type="text" id="temperatura_minima_ultrafreezer" class="form-control" placeholder="Temperatura minima" value="{$ultrafreezer.tem_min}" required>
                </div>

                <div class="col-sm-4">
                  <label>Temperatura maxima:</label>
                  <input type="text" id="temperatura_maxima_ultrafreezer" class="form-control" placeholder="Temperatura maxima" value="{$ultrafreezer.tem_max}" required>
                </div>
              </div>

              <br>

              <div class="form-row">
                <div class="col-sm-4">
                  <label>Valor seteado Humedad:</label>
                  <input type="text" id="valor_seteado_hum_ultrafreezer" class="form-control" placeholder="Valor seteado humedad" value="{$ultrafreezer.seteado_hum}" required>
                </div>

                <div class="col-sm-4">
                  <label>Humedad minima:</label>
                  <input type="text" id="humedad_minima_ultrafreezer" class="form-control" placeholder="humedad minima" value="{$ultrafreezer.hum_min}" required>
                </div>

                <div class="col-sm-4">
                  <label>Humedad maxima:</label>
                  <input type="text" id="humedad_maxima_ultrafreezer" class="form-control" placeholder="humedad maxima" value="{$ultrafreezer.hum_max}" required>
                </div>
              </div>

              <br>
              <div class="form-row" id="btns_ultrafreezer">
                <div class="col-sm-12" style="text-align:center;">
                  <button class="mb-2 mr-2  btn-shadow btn-outline-2x btn btn-outline-success" id="btn_crear_item_ultrafreezer">Crear</button>  
                  <button class="mb-2 mr-2  btn-shadow btn-outline-2x btn btn-outline-info" id="btn_editar_item_ultrafreezer">Actualizar</button>
                </div>
              </div>

            </div>
          </div>
          <!---Cierre del content-->
        </div>
        <!--Cierre del wizard-->
        <div class="divider"></div>
        <div class="clearfix">
          <button type="button" id="next-btn2" class="btn-shadow btn-wide float-right btn-pill btn-hover-shine btn btn-primary">Siguiente</button>
          <button type="button" id="prev-btn2" class="btn-shadow float-right btn-wide btn-pill mr-3 btn btn-outline-secondary">Anterior</button>
        </div>


      </div>
    </div>
    {/foreach}
  </div>
</div>
<script type="text/javascript" src="design/js/update_ultrafreezer.js"></script>