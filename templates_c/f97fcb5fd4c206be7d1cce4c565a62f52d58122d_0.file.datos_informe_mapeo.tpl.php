<?php
/* Smarty version 3.1.34-dev-7, created on 2021-11-10 18:01:43
  from 'C:\xampp\htdocs\CerNet2.0\templates\campana_extraccion\datos_informe_mapeo.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_618bfaf779ace4_74245142',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f97fcb5fd4c206be7d1cce4c565a62f52d58122d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CerNet2.0\\templates\\campana_extraccion\\datos_informe_mapeo.tpl',
      1 => 1636563700,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_618bfaf779ace4_74245142 (Smarty_Internal_Template $_smarty_tpl) {
?><input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['id_asignado_filtro']->value;?>
" id="id_asignado_filtro">

<div class="row">
  <div class="col-sm-3" style="text-align:center;">
    <div class="card">
      <div class="card-header">
        Inspección en campana de ectracción
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
                        <tbody id="resultados">
                          <tr>
                            <td>Velocidad de Aire, 25% Apertura (m/s</td>
                            <td><input type="text" name="" class="form-control" placeholder="-"></td>
                            <td><input type="text" name="" class="form-control" placeholder="-"></td>
                            <td><input type="text" name="" class="form-control" placeholder="-"></td>
                          </tr>
                          <tr>
                            <td>Velocidad de Aire, 50% Apertura (m/s)</td>
                            <td><input type="text" name="" class="form-control" placeholder="-"></td>
                            <td><input type="text" name="" class="form-control" placeholder="-"></td>
                            <td><input type="text" name="" class="form-control" placeholder="-"></td>
                          </tr>
                          <tr>
                            <td>Velocidad de Aire, 75% Apertura (m/s)</td>
                            <td><input type="text" name="" class="form-control" placeholder="-"></td>
                            <td><input type="text" name="" class="form-control" placeholder="-"></td>
                            <td><input type="text" name="" class="form-control" placeholder="-"></td>
                          </tr>
                          <tr>
                            <td>Velocidad de Aire, 100% Apertura (m/s)</td>
                            <td><input type="text" name="" class="form-control" placeholder="-"></td>
                            <td><input type="text" name="" class="form-control" placeholder="-"></td>
                            <td><input type="text" name="" class="form-control" placeholder="-"></td>
                          </tr>
                          <tr>
                            <td>Medición de Temperatura</td>
                            <td><input type="text" name="" class="form-control" placeholder="-"></td>
                            <td><input type="text" name="" class="form-control" placeholder="-"></td>
                            <td><input type="text" name="" class="form-control" placeholder="-"></td>
                          </tr>
                          <tr>
                            <td>Medición de Humedad Relativa</td>
                            <td><input type="text" name="" class="form-control" placeholder="-"></td>
                            <td><input type="text" name="" class="form-control" placeholder="-"></td>
                            <td><input type="text" name="" class="form-control" placeholder="-"></td>
                          </tr>
                          <tr>
                            <td>Presión Sonora Equipo</td>
                            <td><input type="text" name="" class="form-control" placeholder="-"></td>
                            <td><input type="text" name="" class="form-control" placeholder="-"></td>
                            <td><input type="text" name="" class="form-control" placeholder="-"></td>
                          </tr>
                          <tr>
                            <td>Presión Sonora Sala</td>
                            <td><input type="text" name="" class="form-control" placeholder="-"></td>
                            <td><input type="text" name="" class="form-control" placeholder="-"></td>
                            <td><input type="text" name="" class="form-control" placeholder="-"></td>
                          </tr>
                          <tr>
                            <td>Nivel de Iluminación</td>
                            <td><input type="text" name="" class="form-control" placeholder="-"></td>
                            <td><input type="text" name="" class="form-control" placeholder="-"></td>
                            <td><input type="text" name="" class="form-control" placeholder="-"></td>
                          </tr>
                          <tr>
                            <td>Prueba de Humo</td>
                            <td><input type="text" name="" class="form-control" placeholder="-"></td>
                            <td><input type="text" name="" class="form-control" placeholder="-"></td>
                            <td><input type="text" name="" class="form-control" placeholder="-"></td>
                          </tr>
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
                        <tr>
                          <td>25%</td>
                          <td><input type="text" name="" class="form-control" placeholder="-"></td>
                          <td><input type="text" name="" class="form-control" placeholder="-"></td>
                          <td><input type="text" name="" class="form-control" placeholder="-"></td>
                          <td><input type="text" name="" class="form-control" placeholder="-"></td>
                          <td><input type="text" name="" class="form-control" placeholder="-"></td>
                          <td><input type="text" name="" class="form-control" placeholder="-"></td>
                        </tr>
                        <tr>
                          <td>50%</td>
                          <td><input type="text" name="" class="form-control" placeholder="-"></td>
                          <td><input type="text" name="" class="form-control" placeholder="-"></td>
                          <td><input type="text" name="" class="form-control" placeholder="-"></td>
                          <td><input type="text" name="" class="form-control" placeholder="-"></td>
                          <td><input type="text" name="" class="form-control" placeholder="-"></td>
                          <td><input type="text" name="" class="form-control" placeholder="-"></td>
                        </tr>
                        <tr>
                          <td>75%</td>
                          <td><input type="text" name="" class="form-control" placeholder="-"></td>
                          <td><input type="text" name="" class="form-control" placeholder="-"></td>
                          <td><input type="text" name="" class="form-control" placeholder="-"></td>
                          <td><input type="text" name="" class="form-control" placeholder="-"></td>
                          <td><input type="text" name="" class="form-control" placeholder="-"></td>
                          <td><input type="text" name="" class="form-control" placeholder="-"></td>
                        </tr>
                        <tr>
                          <td>100%</td>
                          <td><input type="text" name="" class="form-control" placeholder="-"></td>
                          <td><input type="text" name="" class="form-control" placeholder="-"></td>
                          <td><input type="text" name="" class="form-control" placeholder="-"></td>
                          <td><input type="text" name="" class="form-control" placeholder="-"></td>
                          <td><input type="text" name="" class="form-control" placeholder="-"></td>
                          <td><input type="text" name="" class="form-control" placeholder="-"></td>
                        </tr>

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
                         <tr>
                          <td>25%</td>
                          <td><input type="text" name="" class="form-control" placeholder="-"></td>
                          <td><input type="text" name="" class="form-control" placeholder="-"></td>
                          <td><input type="text" name="" class="form-control" placeholder="-"></td>
                          <td><input type="text" name="" class="form-control" placeholder="-"></td>
                        </tr>
                        <tr>
                          <td>50%</td>
                          <td><input type="text" name="" class="form-control" placeholder="-"></td>
                          <td><input type="text" name="" class="form-control" placeholder="-"></td>
                          <td><input type="text" name="" class="form-control" placeholder="-"></td>
                          <td><input type="text" name="" class="form-control" placeholder="-"></td>
                        </tr>
                        <tr>
                          <td>75%</td>
                          <td><input type="text" name="" class="form-control" placeholder="-"></td>
                          <td><input type="text" name="" class="form-control" placeholder="-"></td>
                          <td><input type="text" name="" class="form-control" placeholder="-"></td>
                          <td><input type="text" name="" class="form-control" placeholder="-"></td>
                        </tr>
                        <tr>
                          <td>100%</td>
                          <td><input type="text" name="" class="form-control" placeholder="-"></td>
                          <td><input type="text" name="" class="form-control" placeholder="-"></td>
                          <td><input type="text" name="" class="form-control" placeholder="-"></td>
                          <td><input type="text" name="" class="form-control" placeholder="-"></td>
                        </tr>

                      </tbody>
                    </table>
                    imagen <input type="file" name="" class="form-control">
                  </div>
                </div>
                <br>
                <hr>

                <div class="row">
                  <div class="col-sm-12">                   
                    <label><b>Equipo Utilizado en la Medición</b></label>
                    <select class="form-control col-sm-4" id="idequipo">
                      <option>Seleccione...</option>
                    </select>
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
                          <tr>
                            <td><input type="text" name="" class="form-control " placeholder="-"></td>
                            <td><input type="text" name="" class="form-control " placeholder="-"></td>
                            <td><input type="text" name="" class="form-control " placeholder="-"></td>
                            <td><input type="text" name="" class="form-control " placeholder="-"></td>
                            <td><input type="text" name="" class="form-control " placeholder="-"></td>
                            <td><input type="text" name="" class="form-control " placeholder="-"></td>
                          </tr>
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
                        <tr>
                          <td>Temperatura,°C</td>
                          <td><input type="text" name="" class="form-control " placeholder="-"></td>
                          <td><input type="text" name="" class="form-control " placeholder="-"></td>
                          <td><input type="text" name="" class="form-control " placeholder="-"></td>
                          <td><input type="text" name="" class="form-control " placeholder="-"></td>
                        </tr>
                        <tr>
                          <td>Humedad Relativa, %</td>
                          <td><input type="text" name="" class="form-control " placeholder="-"></td>
                          <td><input type="text" name="" class="form-control " placeholder="-"></td>
                          <td><input type="text" name="" class="form-control " placeholder="-"></td>
                          <td><input type="text" name="" class="form-control " placeholder="-"></td>
                        </tr>

                      </tbody>
                    </table>
                    imagen <input type="file" name="" class="form-control" id="imagen">
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
                          <tr>
                          <td>Equipo <br>(dB-A Lento)</td>
                          <td><input type="text" name="" class="form-control " placeholder="-"></td>
                          <td><input type="text" name="" class="form-control " placeholder="-"></td>
                          <td><input type="text" name="" class="form-control " placeholder="-"></td>
                          <td><input type="text" name="" class="form-control " placeholder="-"></td>
                        </tr>
                        <tr>
                          <td>Sala <br>(dB-A Lento)</td>
                          <td><input type="text" name="" class="form-control " placeholder="-"></td>
                          <td><input type="text" name="" class="form-control " placeholder="-"></td>
                          <td><input type="text" name="" class="form-control " placeholder="-"></td>
                          <td><input type="text" name="" class="form-control " placeholder="-"></td>
                        </tr>
                      </tbody>
                    </table>
                     imagen <input type="file" name="" class="form-control" id="imagen">
                  </div>
                </div>


                <div class="row">
                  <div class="col-sm-12">
                      <label><b>Equipos Utilizados en la Medición</b></label>
                       <select class="form-control col-sm-4" id="idequipo">
                      <option>Seleccione...</option>
                    </select>
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
                        <tr>
                            <td><input type="text" name="" class="form-control " placeholder="-"></td>
                            <td><input type="text" name="" class="form-control " placeholder="-"></td>
                            <td><input type="text" name="" class="form-control " placeholder="-"></td>
                            <td><input type="text" name="" class="form-control " placeholder="-"></td>
                            <td><input type="text" name="" class="form-control " placeholder="-"></td>
                            <td><input type="text" name="" class="form-control " placeholder="-"></td>
                          </tr>
                          <tr>
                            <td><input type="text" name="" class="form-control " placeholder="-"></td>
                            <td><input type="text" name="" class="form-control " placeholder="-"></td>
                            <td><input type="text" name="" class="form-control " placeholder="-"></td>
                            <td><input type="text" name="" class="form-control " placeholder="-"></td>
                            <td><input type="text" name="" class="form-control " placeholder="-"></td>
                            <td><input type="text" name="" class="form-control " placeholder="-"></td>
                          </tr>
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
                        <th>Condiciones</th>
                        <th>resultado</th>
                        <th>Cumple</th>
                      </thead>
                      <tbody id="pb_Punto_Muestreo">
                         <tr>
                            <td>Ubicación de Prueba</td>
                            <td><input type="text" name="" class="form-control " placeholder="-"></td>
                            <td><select name="" class="form-control ">
                              <option>NA</option>
                              <option>CUMPLE</option>
                            </select></td>
                          </tr>
                          <tr>
                            <td>Dirección del Flujo Especificado</td>
                            <td><input type="text" name="" class="form-control " placeholder="-"></td>
                            <td><select name="" class="form-control ">
                              <option>NA</option>
                              <option>CUMPLE</option>
                            </select></td>
                          </tr>
                          <tr>
                            <td>Visualización de Flujo Reverso</td>
                            <td><input type="text" name="" class="form-control " placeholder="-"></td>
                            <td><select name="" class="form-control ">
                              <option>NA</option>
                              <option>CUMPLE</option>
                            </select></td>
                          </tr>
                          <tr>
                            <td>Visualización de Vórtices</td>
                            <td><input type="text" name="" class="form-control " placeholder="-"></td>
                            <td><select name="" class="form-control ">
                              <option>NA</option>
                              <option>CUMPLE</option>
                            </select></td>
                          </tr>
                          <tr>
                            <td>Cumple Especificaciones</td>
                            <td><input type="text" name="" class="form-control " placeholder="-"></td>
                            <td><select name="" class="form-control ">
                              <option>NA</option>
                              <option>CUMPLE</option>
                            </select></td>
                          </tr>

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
                         <tr>
                            <td>Ubicación de Prueba</td>
                            <td><input type="text" name="" class="form-control " placeholder="-"></td>
                            <td><select name="" class="form-control ">
                              <option>NA</option>
                              <option>CUMPLE</option>
                            </select></td>
                          </tr>
                          <tr>
                            <td>Visualización de Flujo Reverso</td>
                            <td><input type="text" name="" class="form-control " placeholder="-"></td>
                            <td><select name="" class="form-control ">
                              <option>NA</option>
                              <option>CUMPLE</option>
                            </select></td>
                          </tr>
                          <tr>
                            <td>Visualización de Puntos Muertos</td>
                            <td><input type="text" name="" class="form-control " placeholder="-"></td>
                            <td><select name="" class="form-control ">
                              <option>NA</option>
                              <option>CUMPLE</option>
                            </select></td>
                          </tr>
                          <tr>
                            <td>Cumple Especificaciones</td>
                            <td><input type="text" name="" class="form-control " placeholder="-"></td>
                            <td><select name="" class="form-control ">
                              <option>NA</option>
                              <option>CUMPLE</option>
                            </select></td>
                          </tr>
                          <tr>
                            <td>Cumple Prueba de Humo</td>
                            <td><input type="text" name="" class="form-control " placeholder="-"></td>
                            <td><select name="" class="form-control ">
                              <option>NA</option>
                              <option>CUMPLE</option>
                            </select></td>
                          </tr>

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
                   <tbody id="pb_dsn594">
                    <tr>
                    <td>Lux</td>
                    <td><input type="text" name="" class="form-control " placeholder="-"></td>
                    <td><input type="text" name="" class="form-control " placeholder="-"></td>
                    <td><input type="text" name="" class="form-control " placeholder="-"></td>
                    <td><input type="text" name="" class="form-control " placeholder="-"></td>
                    </tr>
                   </tbody>
                 </table>
               </div>
             </div>
             <br>
             <div class="row">
              <div class="col-sm-12">
                <label><b>Equipos Utilizados en la Medición</b></label>
                <select class="form-control col-sm-6">
                  <option>Seleccione...</option>
                </select>
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


<button class="btn btn-success" id="ir_informe_campanas">Informe</button>


</div><!--CIERRE DEL DIV ACORDION-->

</div><!--cierre del div col sm 9-->
</div> 







<?php echo '<script'; ?>
 type="text/javascript" src="design/js/control_mapeo_campanas.js"><?php echo '</script'; ?>
>

<?php }
}
