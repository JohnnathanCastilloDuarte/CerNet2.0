<div class="row">
  <div class="col-sm-12">
    {foreach from=$array_estufa item=estufa}
    <div class="card">
      <div class="card-header">
        <h5>
          Edición del equipo <span>{$estufa.nombre_estufa}</span>
        </h5>
      </div>
      <div class="card-body">
        <div id="smartwizard2" class="forms-wizard-alt">
          <ul class="forms-wizard">
            <li>
              <a href="#step-12">
											<em>1</em><span>Identificación</span>
									</a>
            </li>
            <li>
              <a href="#step-22">
											<em>2</em><span>Especificación </span>
									</a>
            </li> 
            <li>
              <a href="#step-32">
                      <em>3</em><span>Infraestructura</span>
                 </a>
            </li>
            <!--	
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
                  <input type="hidden" id="id_item_estufa" value="{$estufa.id_estufa}">
                  <input type="hidden" id="id_item_2_estufa" value="{$estufa.id_item}">
                  <input type="hidden" id="id_empresa_estufa" value="{$estufa.id_empresa}">
                  <label>Nombre del Estufa</label>
                  <input type="text" id="nombre_estufa" class="form-control" value="{$estufa.nombre}" placeholder = "Nombre estufa">
                </div>
                
                <div class="col-sm-6">
                 <label>Empresa:</label>
                    <input type="hidden" id="id_empresa" value="{$estufa.id_empresa}">
                    <input type="text" id="buscador_empresa" class="form-control" placeholder="Ingresa el nombre de la empresa" value="{$estufa.nombre_empresa}">
                    <div >
                      <table class="table" id="aqui_resultados_empresa">
                      </table>
                    </div>
                </div>
              </div>
              <div class="form-row">
                <div class="col-sm-6">
                  <label>Fabricante/Marca:</label>
                  <input type="text" id="fabricante_estufa" class="form-control" placeholder="Fabricante estufa" value="{$estufa.fabricante}">
                </div>
                <div class="col-sm-6">
                  <label>Modelo:</label>
                  <input type="text" id="modelo_estufa" class="form-control" placeholder="Modelo estufa" value="{$estufa.modelo}">
                </div>
              </div>
              <br>
              <div class="form-row">
                <div class="col-sm-12">
                  <label>Descripcion:</label>
                  <textarea class="form-control" id="desc_estufa">{$estufa.descripcion}</textarea>
                </div>
              </div>
              <br>
              <div class="form-row">
                <div class="col-sm-4">
                  <label>N° Serie:</label>
                  <input type="text" id="n_serie_estufa" class="form-control" placeholder="N° Serie" value="{$estufa.n_serie}">
                </div>
                <div class="col-sm-4">
                  <label>Codigo interno:</label>
                  <input type="text" id="codigo_interno_estufa" class="form-control" placeholder="Codigo interno" value="{$estufa.c_interno}">
                </div>
                <div class="col-sm-4">
                  <label>Año fabricación</label>
                  <input type="date" id="fecha_fabricacion_estufa" class="form-control" placeholder="" value="{$estufa.fecha_fabricacion}">
                </div>
              </div>
              <br>
              <div class="form-row">
                <div class="col-sm-4">
                  <label>Dirección equipo:</label>
                  <input type="text" id="direccion_estufa" class="form-control" placeholder="Dirección equipo" value="{$estufa.direccion}">
                </div>
                <div class="col-sm-4">
                  <label>Ubicación interna equipo:</label>
                  <input type="text" id="ubicacion_interna_estufa" class="form-control" placeholder="Ubicación equipo" value="{$estufa.ubicacion_interna}">
                </div>
                <div class="col-sm-4">
                  <label>Área interna equipo:</label>
                  <input type="text" id="area_interna_estufa" class="form-control" placeholder="Área equipo" value="{$estufa.area_interna}">
                </div>
              </div>
            </div>

            <div id="step-22">
              <div class="form-row">
                <div class="col-sm-4">
                  <label>Valor seteado temperatura:</label>
                  <input type="text" id="valor_seteado_tem_estufa" class="form-control" placeholder="Valor seteado temperatura" value="{$estufa.seteado_tem}" required>
                </div>

                <div class="col-sm-4">
                  <label>Temperatura minima:</label>
                  <input type="text" id="temperatura_minima_estufa" class="form-control" placeholder="Temperatura minima" value="{$estufa.tem_min}" required>
                </div>

                <div class="col-sm-4">
                  <label>Temperatura maxima:</label>
                  <input type="text" id="temperatura_maxima_estufa" class="form-control" placeholder="Temperatura maxima" value="{$estufa.tem_max}" required>
                </div>
              </div> 
            </div>

            <div id="step-32">
                <div class="form-row">
                <div class="col-sm-4">
                  <label>Voltaje:</label>
                  <input type="text" id="voltaje_estufa" class="form-control" placeholder="Voltaje" value="{$estufa.voltaje}">
                </div>
                <div class="col-sm-4">
                  <label>Potencia:</label>
                  <input type="text" id="potencia_estufa" class="form-control" placeholder="Potencia" value="{$estufa.potencia}">
                </div>
                <div class="col-sm-4">
                  <label>Capacidad:</label>
                  <input type="text" id="capacidad_estufa" class="form-control" placeholder="Capacidad" value="{$estufa.capacidad}">
                </div>
              </div>
              <br>
              <div class="form-row">
                <div class="col-sm-3">
                  <label>Peso:</label>
                  <input type="text" id="peso_estufa" class="form-control" placeholder="Peso" value="{$estufa.peso}">
                </div>
                <div class="col-sm-3">
                  <label>Alto(mm):</label>
                  <input type="text" id="alto_estufa" class="form-control" placeholder="Alto" value="{$estufa.alto}">
                </div>
                <div class="col-sm-3">
                  <label>Largo(mm):</label>
                  <input type="text" id="largo_estufa" class="form-control" placeholder="Largo" value="{$estufa.largo}">
                </div>
                <div class="col-sm-3">
                  <label>Ancho(mm):</label>
                  <input type="text" id="ancho_estufa" class="form-control" placeholder="Ancho" value="{$estufa.ancho}">
                </div>
              </div>
              <br>
                <div class="form-row">
                <div class="col-sm-12" style="text-align:center;">
                  <button class="mb-2 mr-2  btn-shadow btn-outline-2x btn btn-outline-success" id="btn_nuevo_item_estufa">Nuevo</button>
                  <button class="mb-2 mr-2  btn-shadow btn-outline-2x btn btn-outline-info" id="btn_editar_item_estufa">Actualizar</button>
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
<script type="text/javascript" src="design/js/update_estufa.js"></script>