
<div class="row">
  <div class="col-sm-12">
    {foreach from=$array_automovil item=automovil}
    <div class="card">
      <div class="card-header">
        <h5>
          Edición del equipo <span>{$automovil.nombre_automovil}</span>
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
											<em>2</em><span>Infraestructura</span>
									</a>
            </li>
          </ul>
          <input type="hidden"  id="id_item_automovil" value="{$automovil.id_item}">
          <input type="hidden" id="id_automovil" value="{$automovil.id_automovil}">

          <div class="form-wizard-content">
            <div id="step-12">
              <div class="form-row">
                <div class="col-sm-6">  
                  <label>Nombre del vehículo</label>
                  <input type="text" id="nombre_automovil" class="form-control" value="{$automovil.nombre_item}" placeholder="Nombre vehículo">
                </div>
                <div class="col-sm-6">
                  <label>Empresa</label>
                  <label>Empresa:</label>
                    <input type="hidden" id="id_empresa" value="{$automovil.id_empresa}">
                    <input type="text" id="buscador_empresa" class="form-control" placeholder="Ingresa el nombre de la empresa" value="{$automovil.nombre_empresa}">
                    <div >
                      <table class="table" id="aqui_resultados_empresa">
                      </table>
                    </div>
                </div>

              </div>
              <br>
              <div class="form-row">
                <div class="col-sm-4">
                  <label>Fabricante/Marca:</label>
                  <input type="text" id="fabricante_automovil" class="form-control" placeholder="Fabricante/Marca" value="{$automovil.fabricante}">
                </div>
                <div class="col-sm-4">
                  <label>Modelo:</label>
                  <input type="text" id="modelo_automovil" class="form-control" placeholder="Modelo " value="{$automovil.modelo}">
                </div>
                <div class="col-sm-4">
                  <label>Placa/Patente:</label>
                  <input type="text" id="placa_automovil" class="form-control" placeholder="Placa/Patente vehículo" value="{$automovil.placa}">
                </div>
              </div>
              <br>
              <div class="form-row">
                <div class="col-sm-12">
                  <label>Descripción:</label>
                  <textarea class="form-control" id="desc_automovil" placeholder="Descripción">{$automovil.descripcion}</textarea>
                </div>
              </div>
              <br>
              <div class="form-row">
                <div class="col-sm-4">
                  <label>N° Serie:</label>
                  <input type="text" id="n_serie_automovil" class="form-control" placeholder="N° Serie" value="{$automovil.n_serie}">
                </div>
                <div class="col-sm-4">
                  <label>Código interno:</label>
                  <input type="text" id="codigo_interno_automovil" class="form-control" placeholder="Código interno" value="{$automovil.c_interno}">
                </div>
                <div class="col-sm-4">
                  <label>Año fabricación</label>
                  <input type="date" id="fecha_fabricacion_automovil" class="form-control" placeholder="" value="{$automovil.fecha_fabricacion}">
                </div>
              </div>
              <br>
              <div class="form-row">
                <div class="col-sm-4">
                  <label>Dirección equipo:</label>
                  <input type="text" id="direccion_automovil" class="form-control" placeholder="Dirección equipo" value="{$automovil.direccion}">
                </div>
                <div class="col-sm-4">
                  <label>Ubicación interna equipo:</label>
                  <input type="text" id="ubicacion_interna_automovil" class="form-control" placeholder="Ubicación equipo" value="{$automovil.ubicacion_interna}">
                </div>
                <div class="col-sm-4">
                  <label>Área interna equipo:</label>
                  <input type="text" id="area_interna_automovil" class="form-control" placeholder="Área equipo" value="{$automovil.area_interna}">
                </div>
              </div>
            </div>


            <div id="step-22">              
              <br>
              <div class="form-row">
                <div class="col-sm-4">
                  <label>Voltaje(V):</label>
                  <input type="text" id="voltaje_automovil" class="form-control" placeholder="Voltaje" value="{$automovil.voltaje}">
                </div>
                <div class="col-sm-4">
                  <label>Potencia(A):</label>
                  <input type="text" id="potencia_automovil" class="form-control" placeholder="Potencia" value="{$automovil.potencia}">
                </div>
                <div class="col-sm-4">
                  <label>Capacidad(m3):</label>
                  <input type="text" id="capacidad_automovil" class="form-control" placeholder="Capacidad" value="{$automovil.capacidad}">
                </div>
              </div>
              <br>
              <div class="form-row">
                <div class="col-sm-3">
                  <label>Peso(K):</label>
                  <input type="text" id="peso_automovil" class="form-control" placeholder="Peso" value="{$automovil.peso}">
                </div>
                <div class="col-sm-3">
                  <label>Alto(mm):</label>
                  <input type="text" id="alto_automovil" class="form-control" placeholder="Alto" value="{$automovil.alto}">
                </div>
                <div class="col-sm-3">
                  <label>Largo(mm):</label>
                  <input type="text" id="largo_automovil" class="form-control" placeholder="Largo" value="{$automovil.largo}">
                </div>
                <div class="col-sm-3">
                  <label>Ancho(mm):</label>
                  <input type="text" id="ancho_automovil" class="form-control" placeholder="Ancho" value="{$automovil.ancho}">
                </div>
              </div>

              <br>

              <div class="form-row">
                <div class="col-sm-4">
                  <label>Valor seteado temperatura(°C):</label>
                  <input type="text" id="valor_seteado_tem_automovil" class="form-control" placeholder="Valor seteado temperatura" value="{$automovil.seteado_tem}" required>
                </div>

                <div class="col-sm-4">
                  <label>Temperatura mínima(°C):</label>
                  <input type="text" id="temperatura_minima_automovil" class="form-control" placeholder="Temperatura mínima" value="{$automovil.tem_min}" required>
                </div>

                <div class="col-sm-4">
                  <label>Temperatura máxima(°C):</label>
                  <input type="text" id="temperatura_maxima_automovil" class="form-control" placeholder="Temperatura máxima" value="{$automovil.tem_max}" required>
                </div>
              </div>
              <br>
              <div class="form-row">
                <div class="col-sm-12" style="text-align:center;">
                  <button class="mb-2 mr-2  btn-shadow btn-outline-2x btn btn-outline-info" id="btn_editar_item_automovil">Actualizar</button>
                </div> 
                <div class="col-sm-12" style="text-align:center;">
                  <button class="mb-2 mr-2  btn-shadow btn-outline-2x btn btn-outline-success" id="btn_nuevo_item_automovil">Nuevo</button>
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
<script type="text/javascript" src="design/js/update_automovil.js"></script>