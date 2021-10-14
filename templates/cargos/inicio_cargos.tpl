<div class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-header">
        Asignación de cargos
      </div>
      <div class="card-body">
        
        <div class="row">
          <div class="col-sm-6">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-12">
                    <label>Seleccione compañia</label>
                    <select id="empresa_cargo" class="form-control">
        
                    </select>
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-sm-12">
                    <label>Usuario:</label>
                    <select id="traer_empleados_cargos" class="form-control">
                         
                    </select>
                    <input type="hidden" id="id_usuario_cargos">
                  </div>
                </div>
                <br>
                <div class="row" style="text-align:center;">
                  <div class="col-sm-12" id="informacion_cargo">
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="card"> 
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-6">
                    <label>Departamento:</label>
                    <select class="form-control" id="departamento_cargo">
                      
                    </select>
                  </div>
                  <div class="col-sm-6">
                    <label>Cargo:</label>
                    <select class="form-control" id="cargo_cargo">
                      <option value="0">Seleccione...</option>
                      <option value="CEO">CEO</option>
                      <option value="COO">COO</option>
                      <option value="Ingeniero validaciones">Ingeniero Validaciones</option>
                      <option value="Consultor GEP">Consultor GEP</option>
                      <option value="Consultor SPOT">Consultor SPOT</option>
                      <option value="Analista documental">Analista Documental</option>
                      <option value="TI">TI</option>
                      <option value="Calidad">Calidad</option>
                      <option value="Head">Head</option>
                    </select>
                  </div>
                </div>

                <br>

                <div class="row">
                  <div class="col-sm-6">
                    <label>Rol de informe</label>
                    <select id="rol_informe" class="form-control">
                      <option value="0">Seleccione</option>
                      <option value="Elaborador">Elaborador</option>
                      <option value="Aprobador">Aprobador</option>
                      <option value="Revisor">Revisor</option>
                    </select>
                  </div>
                </div>
                <br>
                <div class="row" style="text-align:center;">
                  <div class="col-sm-12">
                    <button class="btn btn-success" id="asignar_cargo">
                      Modificar
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="design/js/control_cargos.js"></script>