
<div class="row">
  <div class="col-sm-12">
   
    <div class="card" id="listado">
      <div class="card-header">
        <h5>
          Listado de equipos
        </h5>
      </div>

      <div class="card-body">
        <table class="table table-striped table-bordered" id="example" style="width: 100%; text-align:center;">
          <thead>
            <th>ID</th>
            <th>Nombre</th>
            <th>Tipo</th>
            <th>Fecha vencimiento</th>
            <th>Pais</th>
            <th>Días vencimiento</th>
            <th>Numero certificado</th>
            <th>Editar</th>
            <th>Nuevo certificado</th>
            <th>Eliminar</th>
          </thead>
      
          {foreach from=$array_mostrar_equipo item=equipo}
          <tr>
            <td>{$equipo.id_equipo_cercal}
             <!--  <input type="text" id="id_equipo_cercal_gestor" value="{$equipo.id_equipo_cercal}"> -->
            </td>
            <td>{$equipo.nombre_equipo}</td>
            <td>{$equipo.tipo_medicion}</td>
            <td>
              <span id="fecha_vencimiento{$equipo.id_equipo_cercal}">{$equipo.fecha_vencimiento}</span>
              <input type="date" name="" id="fecha_vencimiento_gestor{$equipo.id_equipo_cercal}" class="form-control" value="{$equipo.fecha_vencimiento}" style="display: none">
            </td>
            <td>{$equipo.pais}</td>
            <td><span class="text-{$equipo.color}">{$equipo.diferencia}</span></td>
            <td>
              <span id="numero_certificado{$equipo.id_equipo_cercal}">{$equipo.numero_certificado}</span>
              <input type="text" name="" id="numero_certificado_gestor{$equipo.id_equipo_cercal}" class="form-control" value="{$equipo.numero_certificado}" style="display: none"></td>
            <td>
              <a id="btn_editar_item" href="index.php?module={$modulo[10]}&page={$page[0]}&equipo={$equipo.id_equipo_cercal}" class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-outline-2x btn btn-outline-info btn-sm"><i class="lnr-pencil btn-icon-wrapper"></i></a>
           </td>
           <td>
               <a data-id="{$equipo.id_equipo_cercal}" class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-outline-2x btn btn-outline-warning btn-sm" id="btn_agregar_certificado"><i class="lnr-cross btn-icon-wrapper pe-7s-news-paper"></i></a>

               <!-- <a data-id="{$equipo.id_equipo_cercal}" style="display: none;" id="btn_nuevo_certificado" class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-outline-2x btn btn-outline-success btn-sm" ><i class="lnr-cross btn-icon-wrapper pe-7s-check"></i></a>

                <a data-id="{$equipo.id_equipo_cercal}" style="display: none;" id="btn_cancelar_update_certificado"  class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-outline-2x btn btn-outline-danger btn-sm" ><i class="lnr-cross btn-icon-wrapper"></i></a>  -->
           </td>
           <td>    
              <a data-id="{$equipo.id_item}" data-tipoitem="{$equipo.id_tipo}" id="btn_eliminar_item" data-nombre="{$equipo.nombre_item}"  class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-outline-2x btn btn-outline-danger btn-sm" ><i class="lnr-cross btn-icon-wrapper"></i></a>
            </td>
          </tr> 
          {/foreach}
        </table>
        
    </div>

   </div>

   <!-- ARREGLAR -->
   <div class="card" id="addcertificado">
      <div class="card-header">
        <div class="row">
            <div>
               <h4>Agregar Certificado</h4>
            </div>
        </div>
      </div>
      <div class="card-body">
            <input type="text" id="id_equipo_certificado">
          <div class="row">
            <div class="col-sm-4">
                <label>Fecha de emisión</label>
                <input type="date" name="" class="form-control" id="fecha_emision_update">
            </div>
            <div class="col-sm-4">
                <label>Numero certificado</label>
                <input type="text" placeholder="Numero Certificado" name="" class="form-control" id="numero_certificado_update">
            </div>
            <div class="col-sm-4">
                <label>País</label>
                <select class="form-control" id="pais_update">
                    <option value="">Seleccione...</option>
                    <option value="Colombia">Colombia</option>
                    <option value="Chile">Chile</option>
                </select>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-sm-12" style="text-align: center;">
                <button class="btn btn-success" id="btn_guardar_certificado">Agregar Certificado</button>
                <button class="btn btn-danger" id="btn_cancelar_update_certificado">Cancelar</button>
            </div>
          </div>
      </div>
   </div>
 </div>
</div> 
<script type="text/javascript" src="design/js/control_equipos.js"></script>

