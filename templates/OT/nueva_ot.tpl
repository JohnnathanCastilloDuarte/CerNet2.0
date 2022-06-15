<ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
  <li class="nav-item">
    <a role="tab" class="nav-link active" id="tab-0" data-toggle="tab" href="#crear_ot">
		<span>Nueva OT</span>
		</a>
  </li>
</ul>

<div class="tab-content">
  <div class="tab-pane tabs-animation fade show active" id="crear_ot" role="tabpanel">
    <div class="row">
      <div class="col-sm-5">
        <div class="card">
          <div class="card-header">
            Creación de OT
          </div>
          <div class="card-body">
            <div class="row">
              <label>Numero OT:</label>
              <div class="input-group">
                <div class="input-group-prepend"><span class="input-group-text">OT-</span></div>
                <input type="text" id="num_ot" class="form-control" placeholder="Ingrese el numero de OT" maxlength="5" required>
                <div class="input-group-append"><a class="btn btn-success text-white" id="btn_buscar_num_ot" style="bg-color:white;">Buscar</a></div>
              </div>
            </div>
            <br>
         
            <div id="sin_ot">
              <input type="hidden" id="id_ot_oculto">
              <div class="row">
                <label>Empresa</label>
                <input type="text" id="buscador_empresa" class="form-control" placeholder="Ingresa el nombre de la empresa">
                <input type="hidden" id="id_empresa" value="{$camara_congelada.id_empresa}">
                <div>

                  <table class="table" id="aqui_resultados_empresa">
                  </table>
                </div>
              </div>
              <div class="row">
                <label>Usuario</label>
                <input type="text" id="buscador_usuarios" class="form-control" placeholder="Ingresa el usuario">
                <input type="hidden" id="id_usuario">
                <div>

                  <table class="table" id="aqui_resultados_usuario">
                  </table>
                </div>
              </div>
              <br>
              <div class="row" style="text-align:center;">
                <div class="col-sm-12">
                  <a class="mb-2 mr-2  btn-shadow btn-outline-2x btn btn-outline-info text-info" id="btn_nueva_ot">Aceptar</a>
				  <a class="mb-2 mr-2  btn-shadow btn-outline-2x btn btn-outline-info text-primary" id="btn_editar_ot">Actualizar</a>
                  <button class="mb-2 mr-2  btn-shadow btn-outline-2x btn btn-outline-primary" id="btn_gestionar_ot_1">Gestionar OT</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <script type="text/javascript" src="design/js/num_ot.js"></script>

</div>