<?php
/* Smarty version 3.1.34-dev-7, created on 2022-06-01 16:49:16
  from '/home/god/public_html/CerNet2.0/templates/sala_limpia/datos_informe_mapeo.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_6297988c3b5670_02798851',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '54485de2665b48edb7d51fbc56f1d576bbf0579a' => 
    array (
      0 => '/home/god/public_html/CerNet2.0/templates/sala_limpia/datos_informe_mapeo.tpl',
      1 => 1654102074,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6297988c3b5670_02798851 (Smarty_Internal_Template $_smarty_tpl) {
?><input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['id_asignado_sala_limpia']->value;?>
" id="id_asignado_sala_limpia">
<input type="hidden" name="" id="presion_sala_pa" value="<?php echo $_smarty_tpl->tpl_vars['presion_sala']->value;?>
">
<input type="hidden" name="" id="especificacion_1_temp" value="<?php echo $_smarty_tpl->tpl_vars['especificacion_1_temp']->value;?>
">
<input type="hidden" name="" id="especificacion_2_temp" value="<?php echo $_smarty_tpl->tpl_vars['especificacion_2_temp']->value;?>
">
<input type="hidden" name="" id="especificacion_1_hum" value="<?php echo $_smarty_tpl->tpl_vars['especificacion_1_hum']->value;?>
">
<input type="hidden" name="" id="especificacion_2_hum" value="<?php echo $_smarty_tpl->tpl_vars['especificacion_2_hum']->value;?>
">
<input type="hidden" name="" id="lux" value="<?php echo $_smarty_tpl->tpl_vars['lux']->value;?>
">
<input type="hidden" name="" id="lux" value="<?php echo $_smarty_tpl->tpl_vars['ren_hr']->value;?>
">
<input type="hidden" name="" id="ruido_dba" value="<?php echo $_smarty_tpl->tpl_vars['ruido_dba']->value;?>
">
<div class="row">
    
    <div class="col-sm-12">
        <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
            <li class="nav-item">
                <a role="tab" class="nav-link  active" id="tab-0" data-toggle="tab" href="#pruebas">
                <span>Pruebas</span>
                </a>
            </li>
            <li class="nav-item">
                <a role="tab" class="nav-link" id="tab-1" data-toggle="tab" href="#equipos">
                <span>Equipos</span>
                </a>
            </li>
            <li class="nav-item">
                <a role="tab" class="nav-link" id="tab-2" data-toggle="tab" href="#evidencia">
                <span>Evidencia grafica</span>
                </a>
            </li>

        </ul> 

        <div class="tab-content">
            <div class="tab-pane tabs-animation fade show active" id="pruebas" role="tabpanel">
                <form method="POST" id="formulario_salas">
                    <div id="accordion">
                                            
                            <div class="card">
                                <div class="card-header">
                                    <a data-toggle="collapse" data-target="#collapseOne1"  aria-controls="collapseOne1">
                                        Prueba de Part??culas en suspensi??n 
                                    </a>
                                </div>
                                <div class="card-body collapse in show" id="collapseOne1">
                                    <div class="row">
                                            <input type="hidden" name="id_ensayo_p11" id="id_ensayo_p11">
                                       <!--  <div class="col-sm-4">
                                            <label>Metodo de ensayo</label>
                                            <input type="text" id="ensayo_p11" name="ensayo_p11" class="form-control" placeholder="Metodo ensayo">
                                        </div> -->
                                        <div class="col-sm-6">
                                            <label>N?? Puntos por Medici??n</label>
                                            <input type="text" id="ensayo_p12" name="ensayo_p12" class="form-control" placeholder="Puntos por medici??n">
                                        </div>
                                        <div class="col-sm-6">
                                            <label>N?? Muestras por Punto</label>
                                            <input type="text" id="ensayo_p13" name="ensayo_p13" class="form-control" placeholder="Muestras por Punto">
                                        </div>
                                    </div>
                                    <br>
                                    <hr>
                                    <table class="table" style="text-align: center;">
                                    <thead>
                                        <th>Tama??os (??m)</th>
                                        <th>Media de los Promedios</th>
                                        <th>Desviaci??n Estandar</th>
                                        <th>M??ximo</th>
                                    </thead>
                                    <tbody id="listar_p1">

                                    </tbody>
                                    </table>
                                </div>
                            </div> 
                  <!--       <hr>
                        <div class="card">
                            <div class="card-header">
                                <a data-toggle="collapse" data-target="#collapseOne2"  aria-controls="collapseOne2">
                                    Prueba de Part??culas en suspensi??n
                                </a>
                            </div>
                            <div class="card-body collapse in show" id="collapseOne2">
                               
                                <table class="table" style="text-align: center;">
                                <thead>
                                    <th>Tama??os (??m)</th>
                                    <th>Promedios</th>
                                    <th>Cumple</th>
                                </thead>
                                <tbody id="listar_p2">

                                </tbody>
                                </table>
                            </div>
                        </div> -->     
                        <hr>
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <a data-toggle="collapse" data-target="#collapseOne3"  aria-controls="collapseOne3">
                                            Prueba de Diferencial de Presi??n
                                        </a> 
                                    </div>
                                </div>
                                
                            </div>

                            <div class="card-body collapse" id="collapseOne3">

                               <!--  <div class="row">
                                   
                                    <div class="col-sm-6">
                                        <input type="hidden" name="id_ensayo_p21" id="id_ensayo_p21">
                                        <label>M??todo de Ensayo:</label>
                                        <input type="text" name="ensayo_p21" id="ensayo_p21" class="form-control">
                                    </div>
                                     <div class="col-sm-6">
                                        <label>Especificacion de sala:</label>
                                        <input type="text" name="ensayo_p22" id="ensayo_p22" class="form-control" >
                                    </div>
                                </div> 
                                <hr> -->
                                <div class="col-sm-12">
                                    <div class="row" id="tabla" style="text-align: center;"></div>
                                </div>
                                    <hr>
                                <div style="text-align: right;">
                                    <button class="btn btn-success" id="agregar_prueba">Agregar</button>    
                                </div>                                        
                            </div>
                        </div>
                        
                        <hr>

                        <div class="card">
                            <div class="card-header">
                                <a data-toggle="collapse" data-target="#collapseOne4"  aria-controls="collapseOne4">
                                    Prueba de Medici??n de Temperatura ??C
                                </a>
                                <input type="hidden" name="id_prueba_4" id="id_prueba_4">
                            </div>
                            <div class="card-body collapse" id="collapseOne4">

                                <div class="row">
                                    <!-- <div class="col-sm-4">
                                        <input type="hidden" name="id_ensayo_p31" id="id_ensayo_p31" >
                                        <label>M??todo de Ensayo:</label>
                                        <input type="text" name="ensayo_p31" id="ensayo_p31" class="form-control">
                                    </div> -->
                                    <div class="col-sm-4">
                                        <label>N?? de muestras:</label>
                                        <input type="text" name="ensayo_p32" id="ensayo_p32" class="form-control" value="5" disabled="">
                                    </div>
                                </div>
                                <hr>

                                <div class="row" id="medicion_temp">
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="card">
                            <div class="card-header">
                                <a data-toggle="collapse" data-target="#collapseOne5"  aria-controls="collapseOne5">
                                    Prueba de Medici??n de Humedad Relativa, HR%
                                </a>
                            </div>
                            <div class="card-body collapse" id="collapseOne5">
                                <div class="row" id="medicion_hr">
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="card">
                            <div class="card-header">
                                <a data-toggle="collapse" data-target="#collapseOne6"  aria-controls="collapseOne6">
                                    Prueba de Medici??n de luminancia, Lux
                                </a>
                            </div>
                            <div class="card-body collapse" id="collapseOne6">
                                <div class="row">
                                    <!-- <div class="col-sm-4">
                                        <input type="hidden" name="id_ensayo_p41" id="id_ensayo_p41">
                                        <label>M??todo de Ensayo:</label>
                                        <input type="text" name="ensayo_p41" id="ensayo_p41" class="form-control">
                                    </div> -->
                                    <div class="col-sm-4">
                                        <label>N?? de muestras:</label>
                                        <input type="text" name="ensayo_p42" id="ensayo_p42" class="form-control" value="5" disabled="">
                                    </div>
                                </div>
                                <hr>
                                <div class="row" id="medicion_lux">
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="card">
                            <div class="card-header">
                                <a data-toggle="collapse" data-target="#collapseOne7"  aria-controls="collapseOne7">
                                    Prueba de Medici??n de Ruido, dBA
                                </a>
                            </div>
                            <div class="card-body collapse" id="collapseOne7">
                                <div class="row" id="medicion_dba">
                                </div>
                            </div>
                        </div>
                    
                        <hr>

                        <div class="card">
                            <div class="card-header">
                                <a data-toggle="collapse" data-target="#collapseOne12"  aria-controls="collapseOne12">
                                    Resultado - Prueba de Medici??n de Caudal de Inyecci??n de Aire, m??/h
                                </a>
                            </div>
                            <div class="card-body collapse" id="collapseOne12" style="overflow-x: auto;"> 

                                <div class="row">
                                   <!--  <div class="col-sm-4">
                                        <label for="">Metodo de ensayo:</label>
                                        <input type="hidden" id="id_ensayo_p51" name="id_ensayo_p51">
                                        <input type="text" name="ensayo_p51" id="ensayo_p51" class="form-control" value="1">
                                    </div> -->
                                    <div class="col-sm-4">
                                        <label for="">N?? de rejillas de inyecci??n:</label>
                                        <input type="text" readonly="" name="ensayo_p52" id="ensayo_p52" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['cantidad_inyecciones']->value;?>
">
                                    </div>
                                </div>
                        <br>
                                <table class="table" style="overflow-x: auto;width: 180%;">
                                    <thead>
                                        <th>Inyecci??n (m??/h)</th>
                                        <th>N??1</th>
                                        <th>N??2</th>
                                        <th>N??3</th>
                                        <th>N??4</th>
                                        <th>N??5</th>
                                        <th>N??6</th>
                                        <th>N??7</th>
                                        <th>N??8</th>
                                        <th>N??9</th>
                                        <th>N??10</th>
                                        <th>N??11</th>
                                        <th>N??12</th>
                                        <th>N??13</th>
                                        <th>N??14</th>
                                        <th>N??15</th>
                                    </thead>
                                    <tbody id="inyeccion_listar"></tbody>
                                </table>

                            </div>
                        </div>
                        
                        <hr>

                        <div class="card">
                            <div class="card-header">
                                <a data-toggle="collapse" data-target="#collapseOne13"  aria-controls="collapseOne13">
                                    Resultado - Prueba de Medici??n de Caudal de Extracci??n de Aire, m??/h
                                </a>
                            </div>
                            <div class="card-body collapse" id="collapseOne13" style="overflow-x: auto;"> 
                                <div class="row">
                                     <div class="col-sm-4">
                                        <label for="">N?? de Extractores:</label>
                                        <input type="text" readonly="" name="ensayo_p53" id="ensayo_p53" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['cantidad_extracciones']->value;?>
">
                                    </div> 
                                </div>
                                <br>
                                <table class="table" style="overflow-x: auto;width: 180%;">
                                    <thead>
                                        <th>Inyecci??n (m??/h)</th>
                                        <th>N??1</th>
                                        <th>N??2</th>
                                        <th>N??3</th>
                                        <th>N??4</th>
                                        <th>N??5</th>
                                        <th>N??6</th>
                                        <th>N??7</th>
                                        <th>N??8</th>
                                        <th>N??9</th>
                                        <th>N??10</th>
                                        <th>N??11</th>
                                        <th>N??12</th>
                                        <th>N??13</th>
                                        <th>N??14</th>
                                        <th>N??15</th>
                                    </thead>
                                    <tbody id="extraccion_listar"></tbody>
                                </table>              
                            </div>
                        </div>


                        <hr>

                        <!-- <div class="card">
                            <div class="card-header">
                                <a data-toggle="collapse" data-target="#collapseOne14"  aria-controls="collapseOne14">
                                    Resultado Final - C??lculo de Renovaci??n de Aire/Hora
                                </a>
                            </div>
                            <div class="card-body collapse" id="collapseOne14">  
                                <table class="table">
                                    <thead>
                                        <th>Promedio de Caudal Total Inyectado (m??/h) </th>
                                        <th>Renovaciones Aire/Hora Obtenidas </th>
                                        <th>Renovaciones Aire/Hora Obtenidas</th>
                                        <th>Cumple</th>
                                    </thead>
                                    <tbody id="renovaciones">

                                    </tbody>
                                </table>             
                            </div>
                        </div> 
                        
                        <hr>-->

                        <div class="card">
                            <div class="card-header">
                                <a data-toggle="collapse" data-target="#collapseOne15"  aria-controls="collapseOne15">
                                    Conclusiones informe
                                </a>
                            </div>
                            <div class="card-body collapse" id="collapseOne15">  
                              <div class="row">
                                 
                                <div class="col-sm-6">
                                      <label for="">Nombre informe:</label>
                                      <input type="text" name="nombre_informe" id="nombre_informe" class="form-control" readonly >
                                      <br>
                                  </div> 
                                  <div class="col-sm-6">
                                      <label for="">fecha medici??n:</label>
                                      <input type="date" name="fecha_medicion" id="fecha_medicion" class="form-control">
                                      <br>
                                  </div>
                                  <div class="col-sm-6">
                                    <label for="">Solicita:</label>
                                    <input type="text" name="solicitante" id="solicitante" class="form-control">
                                    <br>
                                 </div>
                                <div class="col-sm-6">
                                    <label for="">Responsable:</label>
                                    <input type="text" name="responsable" id="responsable" class="form-control" placeholder="Solicitante">
                                    <div class="alert alert-danger alert-sm" id="alerta_1">El usuario no se encuentra registrado</div>
                                    <br>
                                 </div>
                              </div>                              
                              <div class="row">
                                   <div class="col-sm-6">
                                      <input type="hidden" name="id_informe" id="id_informe">
                                     <label for="">Conclusiones:</label>
                                     <select class="form-control" name="conclusion_informe" id="conclusion_informe">
                                         <option value="0">Seleccione...</option>
                                         <option value="Pre-Informe">Pre-Informe</option>
                                         <option value="Informe">Informe</option>
                                     </select>
                                     <!--<textarea class="form-control" id="conclusion_informe" name="conclusion_informe"></textarea>--> 
                                  </div>
                              </div>
                            </div>
                        </div>
                        <br>
                        <div class="row" style="text-align: center;">
                            <div class="col-sm-12">
                                <button class="btn btn-info">Guardar</button>
                          
                </form>
                



                      <button class="btn btn-warning text-light" id="ver_informe_salas_limpias">Informe</button>

                      </div>
                        </div>
                        
                        <hr>

                    </div>




                <div class="row" style="text-align: center;">
                    <div class="col-sm-12">
                      
                    </div>
                    
                </div>
            </div>

            <div class="tab-pane tabs-animation fade" id="equipos" role="tabpanel">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <input type="hidden" value="salas_limpias" id="pk">
                                <div class="row">
                                    <div class="col-sm-8">
                                        <label>Seleccione equipo</label>
                                        <select class="form-control" id="tipo_prueba">
                                        <option value="">Seleccion</option>
                                        <option value="Prueba de conteo de particulas">Prueba de conteo de particulas</option>
                                        <option value="Prueba de Presi??n Diferencial">Prueba de Presi??n Diferencial</option>
                                        <option value="Prueba de temperatura y humedad relativa">Prueba de temperatura y humedad relativa</option>
                                        <option value="Prueba Medici??n de ruido">Prueba Medici??n de ruido</option>
                                        <option value="Prueba nivel de iluminaci??n">Prueba nivel de iluminaci??n</option>
                                        <option value="Prueba de medici??n de caudal">Prueba de medici??n de caudal</option>
                                        </select>
                                        <table class="table">
                                            <thead>
                                            <th>ID</th>
                                            <th>Nombre</th>
                                            <th>Certificado</th>
                                            <th>Fecha emisi??n</th>
                                            <th>Fecha vencimiento</th>
                                            <th>Agregar</th>
                                            </thead>
                                            <tbody id="listar_equipos_filtros">
                                            </tbody>
                    
                                        </table>
                                        <button class="btn btn-info" id="recargar_equipos">Recargar</button>        
                                    </div>
                                    <div class="col-sm-4" style="text-align:center">
                                        <label for="">Puedes crear nuevos equipos desde esta opci??n</label><br>
                                       <button class="btn btn-info" id="crear_nuevo_equipo" >Crear equipo</button>
                                      </div>
                                </div>
                                <br>

                                <div class="row">
                                  <div class="col-sm-12">
                                    <table class="table" style="text-align:center;">
                                       <thead>
                                         <th>Nombre equipo</th>
                                         <th>Tipo prueba</th>
                                         <th>Eliminar</th>
                                       </thead>
                                       <tbody id="equipos_agregados_medicion_filtros"></tbody>
                                    </table>
                                  </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane tabs-animation fade" id="evidencia" role="tabpanel">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <form method="post" id="formulario_evidencias_graficas_sala_limpia" enctype="multipart/form-data">
                                    <input type="hidden" name="id_asignado_graficas" value="<?php echo $_smarty_tpl->tpl_vars['id_asignado_sala_limpia']->value;?>
">
    
                                    <div class="row">
                                        <div class="col-sm-6">
                                          <label>Tipo de evidencia:</label>
                                          <select class="form-control" name="tipo_imagen">
                                            <option value="">Seleccion la categoria</option> 
                                            <option value="1">Imagen Registro de Conteo de Part??culas</option>
                                            <option value="2">Imagen Medicion de presion</option>
                                            <option value="3">Imagen Medicion de temperatura y humedad</option>
                                            <option value="4">Imagen Medicion de iluminacion y Ruido</option>
                                            <option value="5">Imagen Medicion de Caudal</option>
  
                                          </select>
                                        </div>
                                        <div class="col-sm-6">
                                          <label>Archivo:</label>
                                          <input name="imagen" type="file" class="form-control"/>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row" style="text-align: center;">
                                      <div class="col-sm-6">
                                        <button class="btn btn-info">Guardar</button>
                                      </div>
                                    </div>
                                </form>
                                

                                <br> 

                                <hr>
                                
                                <div class="row">
                                  <div class="col-sm-12">
                                    <div class="card">
                                      <div class="card-header">Imagen Conteo de particulas (boucher)</div>
                                      <div class="card-body">
                                        <div class="row" id="Listar_img_c1">
              
                                        </div>
                                         <div class="card-header">Imagen Medicion de presion</div>
                                        <div class="row" id="Listar_img_c2">
              
                                        </div>

                                         <div class="card-header">Imagen Medicion de temperatura y humedad</div>
                                        <div class="row" id="Listar_img_c3">
              
                                        </div>
                                        <div class="card-header">Imagen Medicion de iluminacion y Ruido</div>
                                        <div class="row" id="Listar_img_c4">
              
                                        </div>
                                        <div class="card-header">Imagen Medicion de Caudal</div>
                                        <div class="row" id="Listar_img_c5">
              
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <hr>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>       
    </div>
</div>

<?php echo '<script'; ?>
 src="design/js/controlador_salas_limpias.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="design/js/nuevo_equipo_cercal.js"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 type="text/javascript"><?php echo '</script'; ?>
><?php }
}
