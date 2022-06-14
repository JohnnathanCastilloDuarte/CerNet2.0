
<div class="row">
  <div class="col-sm-12">
   
    <div class="card">
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
              {$equipo.fecha_vencimiento}
              <input type="date" name="" id="fecha_vencimiento_gestor{$equipo.id_equipo_cercal}" class="form-control" value="{$equipo.fecha_vencimiento}">
            </td>
            <td>{$equipo.pais}</td>
            <td><span class="text-{$equipo.color}">{$equipo.diferencia}</span></td>
            <td>{$equipo.numero_certificado}
              <input type="text" name="" id="numero_certificado_gestor{$equipo.id_equipo_cercal}" class="form-control" value="{$equipo.numero_certificado}"></td>
            <td>
              <a id="btn_editar_item" href="index.php?module={$modulo[10]}&page={$page[0]}&equipo={$equipo.id_equipo_cercal}" class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-outline-2x btn btn-outline-info btn-sm"><i class="lnr-pencil btn-icon-wrapper"></i></a>
           </td>
           <td>
               <a data-id="{$equipo.id_item}" data-tipoitem="{$equipo.id_tipo}" id="btn_eliminar_item" data-nombre="{$equipo.nombre_item}"  class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-outline-2x btn btn-outline-warning btn-sm" ><i class="lnr-cross btn-icon-wrapper pe-7s-news-paper"></i></a>

               <a data-id="{$equipo.id_equipo_cercal}" id="btn_nuevo_certificado" class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-outline-2x btn btn-outline-success btn-sm" ><i class="lnr-cross btn-icon-wrapper pe-7s-check"></i></a>

                <a data-id="{$equipo.id_equipo_cercal}" id="btn_cancelar_update_certificado"  class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-outline-2x btn btn-outline-danger btn-sm" ><i class="lnr-cross btn-icon-wrapper"></i></a> 
           </td>
           <td>    
              <a data-id="{$equipo.id_item}" data-tipoitem="{$equipo.id_tipo}" id="btn_eliminar_item" data-nombre="{$equipo.nombre_item}"  class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-outline-2x btn btn-outline-danger btn-sm" ><i class="lnr-cross btn-icon-wrapper"></i></a>
            </td>
          </tr> 
          {/foreach}
        </table>
        
    </div>

   </div>
 </div>
</div> 
<script type="text/javascript" src="design/js/control_equipos.js"></script>

