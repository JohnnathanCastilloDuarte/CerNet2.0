<div class="row">
  <div class="col-sm-12">
      {foreach from=$array_equipos item=equipos}
    <div class="card">
      <div class="card-header">
        <h6>
          {if $equipos.id_equipo_cercal == ''}
          <h4>Crear equipo</h4>
          {else}
          <h4>Editar equipo</h4>
          {/if}
        </h6>
      </div>

      <input type="hidden" value="{$equipos.id_equipo_cercal}" id="id_equipo_cercal">
      <div class="card-body">
        <div class="col-sm-12">
          <div class="row">
             <div class="col-sm-6">
                <label>Nombre Equipo</label>
                <input type="text" name="" class="form-control" placeholder="Nombre equipo" value="{$equipos.nombre_equipo}" id="nombre_equipo">
             </div> 
             <div class="col-sm-6">
                <label>Marca Equipo</label>
                <input type="text" name="" class="form-control" placeholder="Marca equipo" value="{$equipos.marca_equipo}" id="marca_equipo">
             </div> 
          </div>
          <br>
          <div class="row">
             <div class="col-sm-6">
                <label>N° Serie equipo</label>
                <input type="text" name="" class="form-control" placeholder="Numero de Serie" value="{$equipos.n_serie_equipo}" id="n_serie_equipo">
             </div> 
             <div class="col-sm-6">
                <label>Modelo equipo</label>
                <input type="text" name="" class="form-control" placeholder="Modelo equipo" value="{$equipos.modelo_equipo}" id="modelo_equipo">
             </div> 
          </div>
          <br>
          <div class="row">
             <div class="col-sm-6">
                <label>Tipo de medición</label>

                <select class="form-control" id="tipo_medicion">
                      {if $equipos.tipo_medicion == ''}
                      <option value="">Seleccione...</option>
                      {else}
                      <option value="{$equipos.tipo_medicion}">{$equipos.tipo_medicion}</option>
                      {/if}
                      <option value="Prueba de conteo de particulas">Prueba de conteo de particulas</option>
                      <option value="Prueba de Presión Diferencial">Prueba de Presión Diferencial</option>
                      <option value="Prueba de temperatura y humedad relativa">Prueba de temperatura y humedad relativa</option>
                      <option value="Prueba Medición de ruido">Prueba Medición de ruido</option>
                      <option value="Prueba nivel de iluminación">Prueba nivel de iluminación</option>
                      <option value="Prueba de medición de caudal">Prueba de medición de caudal</option>
                </select>
               <!--  <input type="text" name="" class="form-control" placeholder="Tipo equipo" value="{$equipos.tipo_equipo}" id="tipo_medicion"> -->
             </div> 
         
          {if $equipos.id_equipo_cercal == ''}
             <div class="col-sm-6">
                <label>Numero de certificado</label>
                <input type="text" name="" class="form-control" placeholder="Numero del certificado" id="n_certificado">
             </div> 
            </div>
            <br> 

            <div class="row">
             <div class="col-sm-4">
                <label>País</label>
                <select class="form-control" id="pais">
                  <option value="">Seleccione...</option>
                  <option value="Colombia">Colombia</option>
                  <option value="Chile">Chile</option>
                </select>
             </div> 
             <div class="col-sm-4">
                <label>Fecha emisión</label>
                <input type="date" name="" class="form-control" id="fecha_emision">
             </div> 
             <div class="col-sm-4">
                <label>Fecha vencimiento</label>
                <input type="date" name="" class="form-control" id="fecha_vencimiento">
             </div> 
          </div>
          <br>
          {else}
          </div>
          <br> 
          {/if}

          <div class="row">
            <div class="col-sm-12" style="text-align:center;">
                <button class="mb-2 mr-2  btn-shadow btn-outline-2x btn btn-outline-info" id="btn_editar_equipo">Actualizar</button>
                <button class="mb-2 mr-2  btn-shadow btn-outline-2x btn btn-outline-success" id="btn_nuevo_equipo">Crear</button>
            </div>
          </div>

        </div>
      </div>
     </div>
      {/foreach}
  </div>
</div>
<script type="text/javascript" src="design/js/update_equipos_cercal.js"></script>
<script type="text/javascript" src="design/js/validar_campos_vacios.js"></script>
