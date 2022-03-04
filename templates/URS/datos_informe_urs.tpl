<input type="hidden" value="{$id_asignado_urs}" id="id_asignado_urs">
<div class="row">
    <div class="col-sm-12">

    </div>
    <div class="col-sm-12">
        <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
            <li class="nav-item">
                <a role="tab" class="nav-link  active" id="tab-0" data-toggle="tab" href="#informacion1">
                    <span>informacion calificación</span>
                </a>
            </li>
            <li class="nav-item">
                <a role="tab" class="nav-link" id="tab-1" data-toggle="tab" href="#informacion2">
                    <span>Listas</span>
                </a>
            </li>
        </ul> 

        <div class="tab-content">
            <div class="tab-pane tabs-animation fade show active" id="informacion1" role="tabpanel">
                <form method="POST" id="formulario_urs">
                    <div class="row">
                        <div class="col-sm-12">
                            <div id="accordion">

                                <div class="card">
                                    <div class="card-header">
                                        <a data-toggle="collapse" data-target="#collapseOne1"  aria-controls="collapseOne1">
                                            Información 
                                        </a>
                                    </div>
                                    <div class="card-body collapse in show" id="collapseOne1">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <input type="hidden" name="" id="id_informe">
                                                <label>Nombre informe</label>
                                                <input type="text" name="" class="form-control" placeholder="Nombre informe" id="nombre_informe">
                                                <br>
                                            </div>
                                        </div>
                                        <div class="row">    
                                            <div class="col-sm-6">
                                                <label>Explicación global</label>
                                                <textarea class="form-control" placeholder="Explicación global" id="conclusion" style="height: 100px;"></textarea>
                                                <br>
                                            </div>
                                            <div class="col-sm-6">
                                                <label>Condición de trabajo</label>
                                                <textarea class="form-control" placeholder="Condiciones de trabajo " id="conclusion" style="height: 100px;"></textarea>
                                            </div>
                                            <div class="col-sm-6">
                                                <label>Objetivo</label>
                                                <textarea class="form-control" placeholder="Explicación global" id="conclusion" style="height: 100px;"></textarea>
                                                <br>
                                            </div>
                                            <div class="col-sm-6">
                                                <label>Introducción función</label>
                                                <textarea class="form-control" placeholder="Condiciones de trabajo " id="conclusion" style="height: 100px;"></textarea>
                                            </div>
                                            <div class="col-sm-12">
                                                <label>Montaje de equipo</label>
                                                <textarea class="form-control" placeholder="Montaje de quipo" id="conclusion" style="height: 100px;"></textarea>
                                                <br>
                                                <textarea class="form-control" placeholder="Montaje de quipo " id="conclusion" style="height: 100px;"></textarea>
                                                <br>
                                            </div>
                                            <div class="col-sm-6">
                                                <label>Rango operario</label>
                                                <input type="text" name="" class="form-control" placeholder="24 horas los 7 días de la semana" id="solicitante">
                                            </div>
                                            <div class="col-sm-6">
                                                <label>Norma que aplica</label>
                                                <input type="text" name="" class="form-control" placeholder="Norma que aplica" id="solicitante">
                                                <br>
                                            </div>
                                            <div class="col-sm-6">
                                                <label>Soporte técnico post marcha</label>
                                                <textarea class="form-control" placeholder="Montaje de quipo " id="conclusion" style="height: 100px;"></textarea>
                                                <br>
                                            </div>
                                            <div class="col-sm-3">
                                                <label>Soporte técnico post marcha</label>
                                                <input type="text" name="" class="form-control" placeholder="3 minutos">
                                                <br>
                                            </div>
                                        </div> 
                                        <br>
                                        <div style="text-align: center;">
                                          <button class="btn btn-sm btn-info float-center" id="actualizar_mapeo">Actualizar</button>
                                      </div>
                                  </div>

                              </div>
                          </div>    
                      </div>
                  </div>
                  <br>

                  <div class="row" style="text-align:center;">
                    <div class="col-sm-12">
                        <button class="btn btn-info">Guardar</button>

                    </form>
                    <button class="btn btn-warning text-light" id="abrir_informe">Informe</button>
                </div>
            </div>
        </div>






        <div class="tab-pane tabs-animation " id="informacion2" role="tabpanel2">
         <div class="tab-pane tabs-animation fade show " id="informacion11" role="tabpanel">
            <div class="row">
                <div class="col-sm-12">
                    <div id="accordion">

                        <div class="card">
                            <div class="card-header">
                                <a data-toggle="collapse" data-target="#collapseOne1"  aria-controls="collapseOne1">
                                    Glosario 
                                </a>
                            </div>
                            <div class="card-body collapse in show" id="collapseOne1">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Glosario</label>
                                        <select class="form-control">
                                            <option>Seleccione...</option>
                                        </select>
                                        <br>
                                    </div>
                                    <div class="col-sm-6">
                                        <h5>Crear glosario</h5>
                                        <input type="text" name="" class="form-control" placeholder="Nombre informe" id="nombre_informe">
                                        <br>
                                        <div style="text-align: center;">
                                            <button class="btn btn-success">Agregar</button>
                                        </div>
                                        <br>
                                    </div>
                                    <div class="col-sm-12">
                                       <table class="table">
                                        <thead>
                                            <tr>
                                                <th>N°</th>
                                                <th>Glosario</th>
                                                <th>Acción</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>
                                                    <button class="btn btn-danger">X</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <br>
                            <div style="text-align: center;">
                              <button class="btn btn btn-info float-center" id="guardar_glosario">Guardar</button>
                          </div>
                      </div>

                  </div>
              </div>    
          </div>
      </div>   
  </div>  
  <br>
  <br>
  <div class="tab-pane tabs-animation fade show" id="informacion2" role="tabpanel2">
    <div class="row">
        <div class="col-sm-12">
            <div id="accordion">

                <div class="card">
                    <div class="card-header">
                        <a data-toggle="collapse" data-target="#collapseOne2"  aria-controls="collapseOne2">
                            Backups 
                        </a>
                    </div>
                    <div class="card-body collapse in show" id="collapseOne2">
                        <div class="row">
                            <div class="col-sm-6">
                                <label>Backups</label>
                                <select class="form-control">
                                    <option>Seleccione...</option>
                                </select>
                                <br>
                            </div>
                            <div class="col-sm-6">
                                <h5>Crear backup</h5>
                                <input type="text" name="" class="form-control" placeholder="Nombre backup" id="nombre_informe">
                                <br>
                                <div style="text-align: center;">
                                    <button class="btn btn-success">Agregar</button>
                                </div>
                                <br>
                            </div>
                            <div class="col-sm-12">
                               <table class="table">
                                <thead>
                                    <tr>
                                        <th>N°</th>
                                        <th>Backup</th>
                                        <th>Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>
                                            <button class="btn btn-danger">X</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <br>
                    <div style="text-align: center;">
                      <button class="btn btn btn-info float-center" id="guardar_glosario">Guardar</button>
                  </div>
              </div>

          </div>
      </div>    
  </div>
</div>   
</div>  
<br>
<div class="tab-pane tabs-animation fade show disabled" id="informacion3" role="tabpanel3">
    <div class="row">
        <div class="col-sm-12">
            <div id="accordion">

               <div class="card">
                <div class="card-header">
                    <a data-toggle="collapse" data-target="#collapseOne3"  aria-controls="collapseOne3">
                        Alarmas
                    </a>
                </div>
                <div class="card-body collapse in show" id="collapseOne3">
                    <div class="row">
                        <div class="col-sm-6">
                            <label>Alarmas</label>
                            <select class="form-control">
                                <option>Seleccione...</option>
                            </select>
                            <br>
                        </div>
                        <div class="col-sm-6">
                            <h5>Crear alarma</h5>
                            <input type="text" name="" class="form-control" placeholder="Nombre alarma" id="nombre_informe">
                            <br>
                            <div style="text-align: center;">
                                <button class="btn btn-success">Agregar</button>
                            </div>
                            <br>
                        </div>
                        <div class="col-sm-12">
                           <table class="table">
                            <thead>
                                <tr>
                                    <th>N°</th>
                                    <th>Alarma</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>
                                        <button class="btn btn-danger">X</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <br>
                <div style="text-align: center;">
                  <button class="btn btn btn-info float-center" id="guardar_glosario">Guardar</button>
              </div>
          </div>

      </div>
  </div>    
</div>
</div>   
</div>  
<br>
<div class="tab-pane tabs-animation fade show disabled" id="informacion4" role="tabpanel4">
    <div class="row">
        <div class="col-sm-12">
            <div id="accordion">

               <div class="card">
                <div class="card-header">
                    <a data-toggle="collapse" data-target="#collapseOne4"  aria-controls="collapseOne4">
                        Resoluciones_informes
                    </a>
                </div>
                <div class="card-body collapse in show" id="collapseOne4">
                    <div class="row">
                        <div class="col-sm-6">
                            <label>Resoluciones</label>
                            <select class="form-control">
                                <option>Seleccione...</option>
                            </select>
                            <br>
                        </div>
                        <div class="col-sm-6">
                            <h5>Crear resolucion</h5>
                            <input type="text" name="" class="form-control" placeholder="Nombre resolucion" id="nombre_informe">
                            <br>
                            <div style="text-align: center;">
                                <button class="btn btn-success">Agregar</button>
                            </div>
                            <br>
                        </div>
                        <div class="col-sm-12">
                           <table class="table">
                            <thead>
                                <tr>
                                    <th>N°</th>
                                    <th>Alarma</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>
                                        <button class="btn btn-danger">X</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <br>
                <div style="text-align: center;">
                  <button class="btn btn btn-info float-center" id="guardar_glosario">Guardar</button>
              </div>
          </div>

      </div>
  </div>    
</div>
</div>   
</div>  


</div>




<script type="text/javascript" src="design/js/control_mapeo_urs.js"></script>
<script type="text/javascript" src="design/js/nuevo_equipo_cercal.js"></script>