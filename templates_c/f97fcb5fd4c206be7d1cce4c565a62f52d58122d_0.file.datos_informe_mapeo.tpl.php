<?php
/* Smarty version 3.1.34-dev-7, created on 2021-10-29 21:49:27
  from 'C:\xampp\htdocs\CerNet2.0\templates\campana_extraccion\datos_informe_mapeo.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_617c50473af091_48240992',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f97fcb5fd4c206be7d1cce4c565a62f52d58122d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CerNet2.0\\templates\\campana_extraccion\\datos_informe_mapeo.tpl',
      1 => 1635536966,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_617c50473af091_48240992 (Smarty_Internal_Template $_smarty_tpl) {
?><input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['id_asignado_filtro']->value;?>
" id="id_asignado_filtro">

<div class="row">
  <div class="col-sm-3" style="text-align:center;">
    <div class="card">
      <div class="card-header">
        Inspección de Integridad de Filtro
      </div>
      <div class="card-body">
        <br>
        <div class="row">
          <div class="col-sm-12" style="text-align:left;">
            <h5>Numero de OT:</h5><h6 class="text-muted" id="ot_filtro_label"></h6>
          </div>
        </div>
        
        <hr style="color: #0056b2;" />
        
        <div class="row">
          <div class="col-sm-12" style="text-align:left;">
            <h5>Cliente:</h5><h6 class="text-muted" id="cliente_filtro_label"></h6>
          </div>
        </div>
        
        <hr style="color: #0056b2;" />
        
        <div class="row">
          <div class="col-sm-12" style="text-align:left;">
            <h5>Marca:</h5><h6 class="text-muted" id="marca_filtro_label"></h6>
          </div>
        </div>
        
        <hr style="color: #0056b2;" />
        
        <div class="row">
          <div class="col-sm-12" style="text-align:left;">
            <h5>Modelo:</h5><h6 class="text-muted" id="modelo_filtro_label">datos</h6>
          </div>
        </div>
        
        <hr style="color: #0056b2;" />
        
        <div class="row">
          <div class="col-sm-12" style="text-align:left;">
            <h5>Serie:</h5><h6 class="text-muted" id="serie_filtro_label">datos</h6>
          </div>
        </div>
        
        <hr style="color: #0056b2;" />
        
        <div class="row">
          <div class="col-sm-12" style="text-align:left;">
            <h5>Ubicación:</h5><h6 class="text-muted" id="ubicacion_filtro_label">datos</h6>
          </div>
        </div>
        
        
        <hr style="color: #0056b2;" />
        
        <div class="row">
          <div class="col-sm-12" style="text-align:left;">
            <h5>Ubicado en:</h5><h6 class="text-muted" id="ubicadoen_filtro_label">datos</h6>
          </div>
        </div>
        
        
        <hr style="color: #0056b2;" />
        
        <div class="row">
          <div class="col-sm-12" style="text-align:left;">
            <h5>Filtro y dimensiones:</h5><h5 class="text-muted" id="dimensiones_filtro_label">datos</h5>
          </div>
        </div>
        
        <hr style="color: #0056b2;" />
        
        <div class="row">
          <div class="col-sm-12" style="text-align:left;">
            <h5>Descripción de filtros:</h5><h6 class="text-muted" id="descripcion_filtro_label">datos</h6>
          </div>
        </div>
        
        <hr style="color: #0056b2;" />
        
        <div class="row">
          <div class="col-sm-12" style="text-align:left;">
            <h5>Limite de penetración:</h5><h6 class="text-muted" id="penetracion_filtro_label">datos</h6>
          </div>
        </div>
        
        <hr style="color: #0056b2;" />
        
        <div class="row">
          <div class="col-sm-12" style="text-align:left;">
            <h5>Eficiencia:</h5><h6 class="text-muted" id="eficiencia_filtro_label">datos</h6>
          </div>
        </div>
        
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
          </ul>       
        </div>

        <div class="tab-content">
          <div class="tab-pane tabs-animation fade show active" id="inspeccion" role="tabpanel">
            <div class="card-body">

              <div id="cuerpo_mapeo_freezer">




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
                      <select class="form-control" id="inspeccion_visual_1">
                        <option>Seleccione</option>
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
                      <select class="form-control" id="inspeccion_visual_2">
                        <option>Seleccione</option>
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
                      <select class="form-control" id="inspeccion_visual_3">
                        <option>Seleccione</option>
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
                      <select class="form-control" id="inspeccion_visual_4">
                        <option>Seleccione</option>
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
                      <select class="form-control" id="inspeccion_visual_5">
                        <option>Seleccione</option>
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
                    <div class="col-sm-2">
                      <label>Cantidad de filtros: </label>

                    </div>
                    <div class="col-sm-2">
                      <input type="number" class="form-control" id="cantidad_filtros_input" readonly>
                    </div>

                  </div>
                  <br>
                  <div class="row">
                    <div class="col-sm-12">
                      <table class="table" style="text-align:center">
                        <thead>
                          <th>N° Filtro</th>
                          <th>Zona A</th>
                          <th>Zona A</th>
                          <th>Zona B</th>
                          <th>Zona B</th>
                          <th>Zona C</th>
                          <th>Zona C</th>
                          <th>Zona D</th>
                          <th>Zona D</th>
                        </thead>
                        <tbody id="agregando_filtros">

                        </tbody>
                      </table>
                    </div>
                  </div>

                </div>
              </div><!--CARD 2-->

              <br>

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
                      <textarea class="form-control" id="conclusion"></textarea>
                    </div>

                    <div class="col-sm-6">
                      <label>Duración de Certificado: </label>
                      <input type="text" class="form-control" id="duracio_certificado">
                    </div>
                    <div class="col-sm-6">
                     <label>Fecha de medición: </label>
                     <input type="date" class="form-control" id="fecha_medicion">
                   </div>

                   <div class="col-sm-6">
                    <label>Responsable: </label>
                    <input type="text" class="form-control" id="resposable">
                  </div>
                  <div class="col-sm-6">
                    <label>Firma: </label>
                    <input type="text" class="form-control" id="firma">
                  </div>

                  <div class="col-sm-12">
                    <label>Código QR de Verificación: </label>
                    <input type="text" class="form-control" id="codigo_qr">
                  </div>
                </div>
                <br>


              </div>
            </div><!--CARD 3-->

            <br>




      </div>
    </div>
  </div>

    <div class="tab-pane tabs-animation fade show" id="pruebas" role="tabpanel">
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


                <div class="row">
                  <div class="col-sm-12">
                    <br>
                    <table class="table"><tr><td></td></tr></table>
                    <label><b>Equipo Utilizado en la Medición</b></label>
                    <table class="table" style="text-align:center">
                      <thead>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>N° Serie</th>
                        <th>Certificado calibrqación</th>
                        <th>Última Calibración</th>
                        <th>Trazabilidad</th>
                      </thead>
                      <tbody id="pb_resumen">

                      </tbody>
                    </table>
                  </div>
                </div>
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
                  </div>
                </div>


                <div class="row">
                  <div class="col-sm-12">
                      <label><b>Equipos Utilizados en la Medición</b></label>
                    <table class="table" style="text-align:center">
                      <thead>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>N° Serie</th>
                        <th>Certificado calibrqación</th>
                        <th>Última Calibración</th>
                        <th>Trazabilidad</th>
                      </thead>
                      <tbody id="pb_equipos_temp_hum">

                      </tbody>
                    </table>
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
                        <th>Punto de Muestreo</th>
                        <th>1</th>
                        <th>2</th>
                        <th>3</th>
                        <th>Promedio</th>
                      </thead>
                      <tbody id="pb_Punto_Muestreo">

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
                     <th>Punto de Muestreo</th>
                     <th>1</th>
                     <th>2</th>
                     <th>3</th>
                     <th>Promedio</th>
                   </thead>
                   <tbody id="pb_resumen_presion_sonora">

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
                     <th>Promedio</th>
                   </thead>
                   <tbody id="pb_resumen_presion_sonora">

                   </tbody>
                 </table>
               </div>
             </div>
             <br>
             <div class="row">
              <div class="col-sm-12">
                <label><b>Equipos Utilizados en la Medición</b></label>
                <table class="table" style="text-align:center">
                  <thead>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>N° Serie</th>
                    <th>Certificado calibrqación</th>
                    <th>Última Calibración</th>
                    <th>Trazabilidad</th>
                  </thead>
                  <tbody id="pb_equipos_temp_hum">

                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div><!-- FIN CARD 5-->


        </div>
     </div>


     </div>  
   </div>
</div>





<br>





</div><!--CIERRE DEL DIV ACORDION-->

</div><!--cierre del div col sm 9-->
</div> 







<?php echo '<script'; ?>
 type="text/javascript" src="design/js/control_mapeo_filtros.js"><?php echo '</script'; ?>
>

<?php }
}
