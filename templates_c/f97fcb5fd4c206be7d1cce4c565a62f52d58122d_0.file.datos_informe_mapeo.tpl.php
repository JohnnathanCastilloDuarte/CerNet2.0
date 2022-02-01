<?php
/* Smarty version 3.1.34-dev-7, created on 2022-02-01 15:16:53
  from 'C:\xampp\htdocs\CerNet2.0\templates\campana_extraccion\datos_informe_mapeo.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_61f940d5bec335_21173886',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f97fcb5fd4c206be7d1cce4c565a62f52d58122d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CerNet2.0\\templates\\campana_extraccion\\datos_informe_mapeo.tpl',
      1 => 1643725012,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61f940d5bec335_21173886 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="row">
  <div class="col-sm-3" style="text-align:center;">
    <div class="card">
      <div class="card-header">
        Inspección en campana de extracción
      </div>
      <div class="card-body">
        <br>
        <div class="row">
          <div class="col-sm-12" style="text-align:left;">
            <h5>Numero de OT:</h5><h6 class="text-muted" id="ot_campana_label"></h6>
          </div>
        </div>
        
        <hr style="color: #0056b2;" />
        
        <div class="row">
          <div class="col-sm-12" style="text-align:left;">
            <h5>Cliente:</h5><h6 class="text-muted" id="cliente_campana_label"></h6>
          </div>
        </div>
        
        <hr style="color: #0056b2;" />
        
        
      </div>
    </div>
  </div><!--Cierre del col sm 2 -->
  

  <div class="col-sm-9">
    <div id="accordion">  
      <div class="card">
        <div class="card-header">
          <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
            <li class="nav-item">
              <a role="tab" class="nav-link  active" id="tab-0" data-toggle="tab" href="#inspeccion">
                <span>Inspección</span>
              </a>
            </li>
            <li class="nav-item">
              <a role="tab" class="nav-link" id="tab-1" data-toggle="tab" href="#pruebas">
                <span>Pruebas</span>
              </a>
            </li>
            <li class="nav-item">
              <a role="tab" class="nav-link" id="tab-2" data-toggle="tab" href="#equipos">
                <span>Equipos</span>
              </a>
            </li>
            <li class="nav-item">
              <a role="tab" class="nav-link" id="tab-2" data-toggle="tab" href="#evidencia_grafica">
                <span>Evidencia grafica</span>
              </a>
            </li>
          </ul>       
        </div>

        <div class="tab-content">
          <div class="tab-pane tabs-animation fade show active" id="inspeccion" role="tabpanel">
            <input type="hidden" name="" id="id_informe_campana" value="<?php echo $_smarty_tpl->tpl_vars['id_informe']->value;?>
">
            <form id="formulario_1_campana_extraccion" Method="post">
            <div class="card-body">

              <div id="cuerpo_mapeo_campana">
                <div class="col-sm-6">
                  <label>Nombre informe</label>
                  <input type="text" class="form-control" name="nombre_informe" id="nombre_informe" >  

                </div>
                
              <br>
              <input type="hidden" id="id_inspeccion" name="id_inspeccion">
              <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['id_asignado_filtro']->value;?>
" id="id_asignado_campana" name="id_asignado_campana">

               <div class="card">
                <div class="card-header">
                  <a data-toggle="collapse" data-target="#collapseOne44"  aria-controls="collapseOne44">
                    Inspeccion Visual
                  </a> 
                </div>
                <div class="card-body" id="collapseOne44" >
                  <div class="row">
                    <div class="col-sm-6">
                      <h5>
                        Equipo en buenas condiciones de operación:
                      </h5>
                    </div>
                    <div class="col-sm-6">
                      <select class="form-control" id="inspeccion_visual_1" name="inspeccion_visual_1">
                        <option id="valor_insp_1">Seleccione</option>
                        <option value="Si">Si</option>
                        <option value="No">No</option>
                      </select>
                    </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-sm-6">
                      <h5>
                        Conexión eléctrica en buenas condiciones:
                      </h5>
                    </div>
                    <div class="col-sm-6">
                      <select class="form-control" id="inspeccion_visual_2" name="inspeccion_visual_2">
                        <option id="valor_insp_2">Seleccione</option>
                        <option value="Si">Si</option>
                        <option value="No">No</option>
                      </select>
                    </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-sm-6">
                      <h5>
                        Presenta todas sus partes y accesorios:
                      </h5>
                    </div>
                    <div class="col-sm-6">
                      <select class="form-control" id="inspeccion_visual_3" name="inspeccion_visual_3">
                        <option id="valor_insp_3">Seleccione</option>
                        <option value="Si">Si</option>
                        <option value="No">No</option>
                      </select>
                    </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-sm-6">
                      <h5>
                        EquipoLímpio y sin elementos externos:
                      </h5>
                    </div>
                    <div class="col-sm-6">
                      <select class="form-control" id="inspeccion_visual_4" name="inspeccion_visual_4">
                        <option id="valor_insp_4">Seleccione</option>
                        <option value="Si">Si</option>
                        <option value="No">No</option>
                      </select>
                    </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-sm-6">
                      <h5>
                        Posee identificación:
                      </h5>
                    </div>
                    <div class="col-sm-6">
                      <select class="form-control" id="inspeccion_visual_5" name="inspeccion_visual_5">
                        <option id="valor_insp_5">Seleccione</option>
                        <option value="Si">Si</option>
                        <option value="No">No</option>
                      </select>
                    </div>
                  </div>
                  <br>

                </div>
              </div><!--CARD 1-->

              <br>

              <div class="card">
                <div class="card-header">
                  <a data-toggle="collapse" data-target="#collapseOne55"  aria-controls="collapseOne55">
                    RESULTADOS - NORMA: UNE-EN ISO 14.644-1:2000 y UNE-EN ISO 14.644-3:2005
                  </a>
                </div>
                <div class="card-body collapse" id="collapseOne55">
                  <div class="row">


                  </div>
                  <br>
                  <div class="row">
                    <div class="col-sm-12">
                      <table class="table" style="text-align:center">
                        <thead>
                          <th>Medición</th>
                          <th>Requisito</th>
                          <th>Valor Obtenidos</th>
                          <th>Veredicto</th>
                        </thead>
                        <tbody id="resultados_prueba_1">
                                  
                        </tbody>
                      </table>
                    </div>
                  </div>

                </div>
              </div><!--CARD 2-->

              <br>
              <button class="btn btn-info">Guardar</button>
             
              </form>
              
              
              <!--
              <div class="card">
                <div class="card-header">
                  <a data-toggle="collapse" data-target="#collapseOne551"  aria-controls="collapseOne551">
                    Conclusión y adicionales
                  </a>
                </div>
                <div class="card-body collapse" id="collapseOne551">
                  <div class="row">
                    <div class="col-sm-4">
                      <label>Cantidad de filtros: </label>
                    </div>
                    <div class="col-sm-12">
                      <textarea class="form-control" id="conclusion" required=""></textarea>
                    </div>

                    <div class="col-sm-6">
                      <label>Duración de Certificado: </label>
                      <input type="text" class="form-control" id="duracio_certificado" required="">
                    </div>
                    <div class="col-sm-6">
                     <label>Fecha de medición: </label>
                     <input type="date" class="form-control" id="fecha_medicion" required="">
                   </div>

                   <div class="col-sm-6">
                    <label>Responsable: </label>
                    <input type="text" class="form-control" id="resposable" required="">
                  </div>
                  <div class="col-sm-6">
                    <label>Firma: </label>
                    <input type="text" class="form-control" id="firma" required="">
                  </div>

                  <div class="col-sm-12">
                    <label>Código QR de Verificación: </label>
                    <input type="text" class="form-control" id="codigo_qr" required="">
                  </div>
                </div>
                <br>


              </div>
            </div>CARD 3-->

            <br>

          </div>
    </div>


  </div>


    <div class="tab-pane tabs-animation fade show" id="pruebas" role="tabpanel">
      <form id="formulario_2_campana_extraccion">
        <div class="card-body">
          <!--INICIO CARD 4-->
          <div class="card">
              <div class="card-header">
                <a data-toggle="collapse" data-target="#collapseOne552"  aria-controls="collapseOne552">
                  PRUEBA DE MEDICION DE VELOCIDAD DE AIRE
                  
                </a>
              </div>
              <div class="card-body collapse" id="collapseOne552">
                
                <br>
                <div class="row">
                  <div class="col-sm-12">
                    <label><b>Prueba de Medición de Velocidad de Aire - UNE-EN ISO 14.644-3:2005</b></label>
                    <table class="table" style="text-align:center">
                      <thead>
                        <th>Apertura</th>
                        <th>Medición 1 (m/s)</th>
                        <th>Medición 2 (m/s)</th>
                        <th>Medición 3 (m/s)</th>
                        <th>Medición 4 (m/s)</th>
                        <th>Medición 5 (m/s)</th>
                        <th>Medición 6 (m/s)</th>
                      </thead>
                      <tbody id="pb_mediciones_aire">
                     
                      </tbody>
                    </table>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-12">
                    <table class="table" style="text-align:center">
                      <thead>
                        <th>Apertura</th>
                        <th>Medida de los Promedios de Velocidad de aire</th>
                        <th>Máxima velocidad medida</th>
                        <th>Mínima velocidad medida</th>
                        <th>Mínima velocidad aceptada</th>
                      </thead>
                      <tbody id="pb_resumen">
                     
                      </tbody>
                    </table>
                  </div>
                </div>
                <br>
                <hr>

              </div>
            </div><!-- FIN CARD 4-->

              <br>

            <!--INICIO CARD 5-->
          <div class="card">
              <div class="card-header">
                <a data-toggle="collapse" data-target="#collapseOne553"  aria-controls="collapseOne553">
                  PRUEBAS DE TEMPERATURA / HUMEDAD RELATIVA Y PRESIÓN SONORA
                </a>
              </div>
              <div class="card-body collapse" id="collapseOne553">
                
                <br>
                <div class="row">
                  <div class="col-sm-12">
                  <label><b>Prueba de Temperatura y Humedad Relativa - UNE-EN ISO 14.644-3:2005</b></label>
                    <table class="table" style="text-align:center">
                      <thead>
                        <th>Punto de Muestreo</th>
                        <th>1</th>
                        <th>2</th>
                        <th>3</th>
                        <th>Promedio</th>
                      </thead>
                      <tbody id="pb_Punto_Muestreo">
                 
                      </tbody>
                    </table>
                    <!--
                    imagen <input type="file" name="" class="form-control" id="imagen">-->
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-12">
                     <label><b>Prueba de Medición de Presión Sonora - DS N°594</b></label>
                    <table class="table" style="text-align:center">
                      <thead>
                         <th>Punto de Muestreo</th>
                        <th>1</th>
                        <th>2</th>
                        <th>3</th>
                        <th>Promedio</th>
                      </thead>
                      <tbody id="pb_resumen_presion_sonora">
                   
                      </tbody>
                    </table>
                    <!--
                     imagen <input type="file" name="" class="form-control" id="imagen">-->
                  </div>
                </div>


              </div>
            </div><!-- FIN CARD 5-->

              <br>

            <!--INICIO CARD 5-->
            <div class="card">
              <div class="card-header">
                <a data-toggle="collapse" data-target="#collapseOne554"  aria-controls="collapseOne554">
                  PRUEBAS DE HUMO Y NIVEL DE ILUMINACIÓN
                </a>
              </div>
              <div class="card-body collapse" id="collapseOne554">

                <br>
                <div class="row">
                    <label><b>Prueba de Humo - ANSI/ASHRAE 110-1995 Method of Testing Performance of Laboratory Fume Hoods</b></label>
                    <br>
                  <div class="col-sm-12">
                    <label><b>Prueba N°1: Contención de Aire Externo</b></label>
                    <table class="table" style="text-align:center">
                      <thead>
                        <th>Condiciones</th>
                        <th>resultado</th>
                        <th>Cumple</th>
                      </thead>
                      <tbody id="Contencion_de_Aire_Externo">
                      
                      </tbody>
                    </table>
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-sm-12">
                   <label><b>Prueba N°2: Unidireccionalidad</b></label>
                   <table class="table" style="text-align:center">
                    <thead>
                        <th>Condiciones</th>
                        <th>resultado</th>
                        <th>Cumple</th>
                   </thead>
                   <tbody id="Pb_unidireccional">
                    </tbody>
                 </table>
               </div>
             </div>
             <br>
             <div class="row">
                  <div class="col-sm-12">
                   <label><b>Prueba de Medición de Nivel de Iluminación - DS N°594</b></label>
                   <table class="table" style="text-align:center">
                    <thead>
                     <th>Punto de Muestreo</th>
                     <th>1</th>
                     <th>2</th>
                     <th>3</th>
                     <th>4</th>
                     <th>5</th>
                     <th>Promedio</th>
                   </thead>
                   <tbody id="pb_dsn594">
                   </tbody>
                 </table>
               </div>
             </div>
             <br>
          
          </div>
        </div><!-- FIN CARD 5-->
        <br>
        <button class="btn btn-info">Grabar</button>
        </div>
       
      </form>
     </div>

        <div class="tab-pane tabs-animation fade show" id="equipos" role="tabpanel">  
          <div class="row" id="tarjeta_equipos_medicion_filtros">
            <div class="col-sm-12">  
              <div class="card">
               <div class="card-header">
                 <input type="hidden" value="campana_extraccion" id="pk">
                 
                   Equipos Utilizados en la Medición
                 
               </div>
               <div class="card-body">
                 <div class="row">
                   <div class="col-sm-8" style="text-align:center;">
                     <label>Seleccione equipo</label>
                     <select class="form-control" id="tipo_prueba">
                       <option value="">Seleccion</option>
                       <option value="Prueba Velocidad Aire">Prueba de Medición de Velocidad de Aire - UNE-EN ISO 14.644-3:2005</option>
                       <option value="Prueba temperatura humedad">Prueba de Temperatura y Humedad Relativa - UNE-EN ISO 14.644-3:2005</option>
                       <option value="Prueba sonora">Prueba de Medición de Presión Sonora - DS N°594</option>
                       <option value="Prueba luminosidad">Prueba de Medición de Nivel de Iluminación - DS N°594</option>
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


        <div class="tab-pane tabs-animation fade show" id="evidencia_grafica" role="tabpanel">  
          <div class="row">
            <div class="col-sm-12">
              <div class="card">
                <div class="card-body">
                  <form method="post" id="formulario_evidencias_graficas_campana" enctype="multipart/form-data">
                    <input type="hidden" name="id_asignado_graficas" value="<?php echo $_smarty_tpl->tpl_vars['id_asignado_filtro']->value;?>
">
                  <div class="row">
                    <div class="col-sm-6">
                      <label>Tipo de evidencia:</label>
                      <select class="form-control" name="tipo_imagen">
                        <option value="">Seleccion la categoria</option> 
                        <option value="1">Imagen velocidad de aire</option>
                        <option value="2">Imagen Temperatura y Humedad relativa</option>
                        <option value="3">Imagen de Presión sonora</option>
                        <option value="4">Imagen de Nivel de iluminación</option>   
                        <option value="5">Imagen Frontal</option>    
                        <option value="6">Imagen de placa</option>
                        <option value="7">Imagen de area de trabajo</option>   
                      </select>
                    </div>
                    <div class="col-sm-6">
                      <label>Archivo:</label>
                      <input name="imagen" type="file" class="form-control"/>
                    </div>
                  </div>
                  <br>
                  <div class="row" style="text-align: center;">
                    <div class="col-sm-12">
                      <button class="btn btn-info">Guardar</button>
                    </div>
                  </div>
                  </form>

                  <br> 

                  <hr>
                  
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="card">
                        <div class="card-header">Velocidad de aire</div>
                        <div class="card-body">
                          <div class="row" id="Listar_img_c1">

                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="card">
                        <div class="card-header">Temp y HR</div>
                        <div class="card-body">
                          <div class="row" id="Listar_img_c2">

                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="card">
                        <div class="card-header">Presión Sonora</div>
                        <div class="card-body">
                          <div class="row" id="Listar_img_c3">

                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="card">
                        <div class="card-header">Nivel de iluminación</div>
                        <div class="card-body">
                          <div class="row" id="Listar_img_c4">

                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <hr> 
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="card">
                        <div class="card-header">IMG Frontal</div>
                        <div class="card-body">
                          <div class="row" id="Listar_img_c5">

                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <hr> 
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="card">
                        <div class="card-header">IMG Placa</div>
                        <div class="card-body">
                          <div class="row" id="Listar_img_c6">

                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <hr> 
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="card">
                        <div class="card-header">IMG Frontal</div>
                        <div class="card-body">
                          <div class="row" id="Listar_img_c7">

                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <hr> 
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="card">
                        <div class="card-header">IMG Area de trabajo</div>
                        <div class="card-body">
                          <div class="row" id="Listar_img_c8">

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
     </div> 

     
 
    </div>

</div>
<br>  
<button class="btn btn-warning" id="abrir_informe">Informe</button>
<br>

<!--
<button class="btn btn-success" id="ir_informe_campanas">Informe</button>-->


</div><!--CIERRE DEL DIV ACORDION-->

</div><!--cierre del div col sm 9-->
</div> 







<?php echo '<script'; ?>
 type="text/javascript" src="design/js/control_mapeo_campanas.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="design/js/nuevo_equipo_cercal.js"><?php echo '</script'; ?>
>

<?php }
}
