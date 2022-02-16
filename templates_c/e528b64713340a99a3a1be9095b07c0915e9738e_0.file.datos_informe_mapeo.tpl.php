<?php
/* Smarty version 3.1.34-dev-7, created on 2022-02-16 15:57:30
  from 'C:\xampp\htdocs\CerNet2.0\templates\sala_limpia\datos_informe_mapeo.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_620d10da7408a0_50612515',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e528b64713340a99a3a1be9095b07c0915e9738e' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CerNet2.0\\templates\\sala_limpia\\datos_informe_mapeo.tpl',
      1 => 1645023443,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_620d10da7408a0_50612515 (Smarty_Internal_Template $_smarty_tpl) {
?><input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['id_asignado_sala_limpia']->value;?>
" id="id_asignado_sala_limpia">
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
                            <div class="card">
                                <div class="card-header">
                                    <a data-toggle="collapse" data-target="#collapseOne1"  aria-controls="collapseOne1">
                                        Prueba de Partículas en suspensión
                                    </a>
                                </div>
                                <div class="card-body collapse in show" id="collapseOne1">
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <input type="hidden" name="id_ensayo_p11" id="id_ensayo_p11">
                                            <label>Metodo de ensayo</label>
                                            <input type="text" id="ensayo_p11" name="ensayo_p11" class="form-control">
                                        </div>
                                        <div class="col-sm-2">
                                            <label>N° Puntos por Medición</label>
                                            <input type="text" id="ensayo_p12" name="ensayo_p12" class="form-control">
                                        </div>
                                        <div class="col-sm-2">
                                            <label>N° Muestras por Punto</label>
                                            <input type="text" id="ensayo_p13" name="ensayo_p13" class="form-control">
                                        </div>
                                        <div class="col-sm-3">
                                            <label>Volumen por Muestras (L)</label>
                                            <input type="text" id="ensayo_p14" name="ensayo_p14" class="form-control">
                                        </div>
                                        <div class="col-sm-3">
                                            <label>Altura toma de Muestras (m)</label>
                                            <input type="text" id="ensayo_p15" name="ensayo_p15" class="form-control">
                                        </div>
                                    </div>
                                    <hr>
                                    <table class="table" style="text-align: center;">
                                    <thead>
                                        <th>Tamaños (µm)</th>
                                        <th>Media de los Promedios</th>
                                        <th>Desviación Estandar</th>
                                        <th>Máximo</th>
                                        <th>Cumple</th>
                                    </thead>
                                    <tbody id="listar_p1">

                                    </tbody>
                                    </table>
                                </div>
                            </div> 
                        <hr>
                        <div class="card">
                            <div class="card-header">
                                <a data-toggle="collapse" data-target="#collapseOne2"  aria-controls="collapseOne2">
                                    Prueba de Partículas en suspensión
                                </a>
                            </div>
                            <div class="card-body collapse in show" id="collapseOne2">
                               
                                <table class="table" style="text-align: center;">
                                <thead>
                                    <th>Tamaños (µm)</th>
                                    <th>Promedios</th>
                                    <th>Cumple</th>
                                </thead>
                                <tbody id="listar_p2">

                                </tbody>
                                </table>
                            </div>
                        </div>     
                        </div>
                    
                    
                        <hr>

                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <a data-toggle="collapse" data-target="#collapseOne3"  aria-controls="collapseOne3">
                                            Prueba de Difencial de Presión
                                        </a> 
                                    </div>
                                </div>
                                
                            </div>

                            <div class="card-body collapse" id="collapseOne3">

                                <div class="row">
                                   
                                    <div class="col-sm-6">
                                        <input type="hidden" name="id_ensayo_p21" id="id_ensayo_p21">
                                        <label>Método de Ensayo:</label>
                                        <input type="text" name="ensayo_p21" id="ensayo_p21" class="form-control">
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Especificacion de sala:</label>
                                        <input type="text" name="ensayo_p22" id="ensayo_p22" class="form-control">
                                    </div>
                                </div>
                                <hr>
                            
                                <table class="table" id="tabla_prueba_3">
                                        
                                </table>
                            </div>
                        </div>
                        
                        <hr>

                        <div class="card">
                            <div class="card-header">
                                <a data-toggle="collapse" data-target="#collapseOne4"  aria-controls="collapseOne4">
                                    Prueba de Medición de Temperatura °C
                                </a>
                                <input type="hidden" name="id_prueba_4" id="id_prueba_4">
                            </div>
                            <div class="card-body collapse" id="collapseOne4">

                                <div class="row">
                                    <div class="col-sm-4">
                                        <input type="hidden" name="id_ensayo_p31" id="id_ensayo_p31">
                                        <label>Método de Ensayo:</label>
                                        <input type="text" name="ensayo_p31" id="ensayo_p31" class="form-control">
                                    </div>
                                    <div class="col-sm-4">
                                        <label>N° de muestras:</label>
                                        <input type="text" name="ensayo_p32" id="ensayo_p32" class="form-control">
                                    </div>
                                    <div class="col-sm-4">
                                        <label>Altura toma de muestras:</label>
                                        <input type="text" name="ensayo_p33" id="ensayo_p33" class="form-control">
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
                                    Prueba de Medición de Humedad Relativa, HR%
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
                                    Prueba de Medición de luminancia, Lux
                                </a>
                            </div>
                            <div class="card-body collapse" id="collapseOne6">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <input type="hidden" name="id_ensayo_p41" id="id_ensayo_p41">
                                        <label>Método de Ensayo:</label>
                                        <input type="text" name="ensayo_p41" id="ensayo_p41" class="form-control">
                                    </div>
                                    <div class="col-sm-4">
                                        <label>N° de muestras:</label>
                                        <input type="text" name="ensayo_p42" id="ensayo_p42" class="form-control">
                                    </div>
                                    <div class="col-sm-4">
                                        <label>Altura toma de muestras:</label>
                                        <input type="text" name="ensayo_p43" id="ensayo_p43" class="form-control">
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
                                    Prueba de Medición de Ruido, dBA
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
                                    Resultado - Prueba de Medición de Caudal de Inyección de Aire, m³/h
                                </a>
                            </div>
                            <div class="card-body collapse" id="collapseOne12"> 

                                <div class="row">
                                    <div class="col-sm-4">
                                        <label for="">Metodo de ensayo:</label>
                                        <input type="hidden" id="id_ensayo_p51" name="id_ensayo_p51">
                                        <input type="text" name="ensayo_p51" id="ensayo_p51" class="form-control">
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="">N° de rejillas de inyección:</label>
                                        <input type="text" name="ensayo_p52" id="ensayo_p52" class="form-control">
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="">N° de Extractores:</label>
                                        <input type="text" name="ensayo_p53" id="ensayo_p53" class="form-control">
                                    </div>
                                </div>
                        <br>
                                <table class="table">
                                    <thead>
                                        <th>Inyección (m³/h)</th>
                                        <th>N°1</th>
                                        <th>N°2</th>
                                        <th>N°3</th>
                                        <th>N°4</th>
                                        <th>N°5</th>
                                        <th>N°6</th>
                                        <th>N°7</th>
                                        <th>N°8</th>
                                        <th>N°9</th>
                                        <th>N°10</th>
                                        <th>N°11</th>
                                        <th>N°12</th>
                                        <th>N°13</th>
                                        <th>N°14</th>
                                        <th>N°15</th>
                                    </thead>
                                    <tbody id="inyeccion_listar"></tbody>
                                </table>

                            </div>
                        </div>
                        
                        <hr>

                        <div class="card">
                            <div class="card-header">
                                <a data-toggle="collapse" data-target="#collapseOne13"  aria-controls="collapseOne13">
                                    Resultado - Prueba de Medición de Caudal de Extracción de Aire, m³/h
                                </a>
                            </div>
                            <div class="card-body collapse" id="collapseOne13">   
                                <table class="table">
                                    <thead>
                                        <th>Inyección (m³/h)</th>
                                        <th>N°1</th>
                                        <th>N°2</th>
                                        <th>N°3</th>
                                        <th>N°4</th>
                                        <th>N°5</th>
                                        <th>N°6</th>
                                        <th>N°7</th>
                                        <th>N°8</th>
                                        <th>N°9</th>
                                        <th>N°10</th>
                                        <th>N°11</th>
                                        <th>N°12</th>
                                        <th>N°13</th>
                                        <th>N°14</th>
                                        <th>N°15</th>
                                    </thead>
                                    <tbody id="extraccion_listar"></tbody>
                                </table>              
                            </div>
                        </div>


                        <hr>

                        <div class="card">
                            <div class="card-header">
                                <a data-toggle="collapse" data-target="#collapseOne14"  aria-controls="collapseOne14">
                                    Resultado Final - Cálculo de Renovación de Aire/Hora
                                </a>
                            </div>
                            <div class="card-body collapse" id="collapseOne14">  
                                <table class="table">
                                    <thead>
                                        <th>Promedio de Caudal Total Inyectado (m³/h) </th>
                                        <th>Renovaciones Aire/Hora Obtenidas </th>
                                        <th>Renovaciones Aire/Hora Obtenidas</th>
                                        <th>Cumple</th>
                                    </thead>
                                    <tbody id="renovaciones">

                                    </tbody>
                                </table>             
                            </div>
                        </div>
                        
                        <hr>

                        

                        <div class="card">
                            <div class="card-header">
                                <a data-toggle="collapse" data-target="#collapseOne15"  aria-controls="collapseOne15">
                                    Conclusiones informe
                                </a>
                            </div>
                            <div class="card-body collapse" id="collapseOne15">  
                              <div class="row">
                                  <div class="col-sm-6">
                                      <input type="hidden" name="id_informe" id="id_informe">
                                     <label for="">Conclusiones:</label>
                                     <textarea class="form-control" id="conclusion_informe" name="conclusion_informe"></textarea> 
                                  </div>
                                  <div class="col-sm-6">
                                    <label for="">Solicita:</label>
                                    <input type="text" name="solicitante" id="solicitante" class="form-control">
                                 </div>
                              </div>
                              
                              <div class="row">
                                  <div class="col-sm-6">
                                      <label for="">Nombre informe:</label>
                                      <input type="text" name="nombre_informe" id="nombre_informe" class="form-control">
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
                                        <option value="Prueba de Presión Diferencial">Prueba de Presión Diferencial</option>
                                        <option value="Prueba de temperatura y humedad relativa">Prueba de temperatura y humedad relativa</option>
                                        <option value="Prueba Medición de ruido">Prueba Medición de ruido</option>
                                        <option value="Prueba nivel de iluminación">Prueba nivel de iluminación</option>
                                        <option value="Prueba de medición de caudal">Prueba de medición de caudal</option>
                                        </select>
                                        <table class="table">
                                            <thead>
                                            <th>ID</th>
                                            <th>Nombre</th>
                                            <th>Certificado</th>
                                            <th>Fecha emisión</th>
                                            <th>Fecha vencimiento</th>
                                            <th>Agregar</th>
                                            </thead>
                                            <tbody id="listar_equipos_filtros">
                                            </tbody>
                    
                                        </table>
                                        <button class="btn btn-info" id="recargar_equipos">Recargar</button>        
                                    </div>
                                    <div class="col-sm-4" style="text-align:center">
                                        <label for="">Puedes crear nuevos equipos desde esta opción</label><br>
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
                                            <option value="1">Imagen Registro de Conteo de Partículas</option>
  
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
                                      <div class="card-header">Conteo de particulas</div>
                                      <div class="card-body">
                                        <div class="row" id="Listar_img_c1">
              
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
><?php }
}
