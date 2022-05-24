<div class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-header">
        <h6>
          Editar bodega
        </h6>
      </div>

      {foreach from=$array_bodega item=bodega}
      <div class="card-body">
        <div id="smartwizard2" class="forms-wizard-alt">
          <ul class="forms-wizard">
            <li>
              <a href="#step-12">
													<em>1</em><span>Identificación</span>
											</a>
            </li>
            <li>
              <a href="#step-22">
                          <em>1</em><span>Especificación</span>
                      </a>
            </li>
            <li>
              <a href="#step-32">
													<em>2</em><span>Infraestructura</span>
											</a>
            </li>
            <li>
              <a href="#step-42">
													<em>3</em><span>Equipos</span>
											</a>
            </li>
            <li id="si_envia">
              <a href="#step-52">
													<em>4</em><span>Evidencia</span>
											</a>
            </li>

          </ul>
    
          <div class="form-wizard-content">
           
           <input value='{$id_tipo}' id='id_tipo' type="hidden">
            <div id="step-12">
              <div class="form-row">
                <div class="col-sm-6">
                  <input type="hidden" id="id_item_bodega" value="{$id_item}">
                  <div class="position-relative form-group">
                    <label>Nombre bodega:</label><input name="text" id="nombre_bodega" class="form-control" value="{$bodega.nombre_item}" placeholder="Nombre de bodega" required>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="position-relative form-group">
                    <label>Empresa:</label>
                    <input type="hidden" id="id_empresa" value="{$bodega.id_empresa}">
                    <input type="text" id="buscador_empresa" class="form-control" placeholder="Ingresa el nombre de la empresa" value="{$bodega.nombre_empresa}">
                    <div >
                      
                      <table class="table" id="aqui_resultados_empresa">
                         
                      </table>
                    </div>
              
                  </div>
                </div>
              </div>
              <div class="form-row">
                <div class="col-sm-12">
                  <div class="position-relative form-group">
                    <label>Descripción:</label>
                    <textarea class="form-control" id="descripcion_item_bodega" placeholder="Descripción">{$bodega.descripcion_bodega}</textarea>
                  </div>
                </div>
              </div>

              <div class="form-row">
                <div class="col-sm-6">
                  <div class="position-relative form-group">
                    <label>Dirección bodega:</label>
                    <input id="direccion_bodega" type="text" class="form-control" placeholder="Dirección de la bodega" value="{$bodega.direccion}">
                  </div>
                </div>
                <div class="col-sm-3">
                  <label>Codigo interno / N° Serie:</label>
                  <input type="text" id="codigo_bodega" class="form-control" placeholder="Codigo bodega" value="{$bodega.codigo_interno}">
                </div>
                 <div class="col-sm-3">
                  <label>Clasificación item:</label>
                  <input type="text" id="clasificacion_item" class="form-control" placeholder="Clasificación item" value="{$bodega.clasificacion_item}">
                </div>
              </div>
<!--
              {section name=i loop=$explode_producto} {if $explode_producto[i] eq "Alimentos"} {$alimentos="checked"} {elseif $explode_producto[i] eq "Cosméticos"} {$cosmeticos="checked"} {elseif $explode_producto[i] eq "Dispositivos Médicos"} {$dispositivos_medicos="checked"}
              {elseif $explode_producto[i] eq "Farmacéuticos"} {$farmaceutico="checked"} {elseif $explode_producto[i] eq "Insumos Médicos"} {$insumos_medicos="checked"} {elseif $explode_producto[i] eq "Materias Primas"} {$materias_primas="checked"} {elseif
              $explode_producto[i] eq "Sustancias Peligrosas"} {$sustancias_peligrosas="checked"} {elseif $explode_producto[i] eq "Otros"} {$otros="checked"} {else} {$otros_e=$explode_producto[i]} {/if} {/section}
-->  
              <div class="form-row">
                <div class="col-sm-12">
                     <label>Productos que almacena:</label>
                    <textarea id="productos_bodega" class="form-control" placeholder="Describa los productos que almacena">{$bodega.productos}</textarea>
                  </div>
              </div>
              <br>
              <div class="form-row">
                  <div class="col-sm-4">
                    <label>Marca:</label>
                    <input type="text" id="marca_bodega" class="form-control" placeholder="Marca bodega" value="{$bodega.marca}">
                  </div>
                
                <div class="col-sm-4">
                  <label>Modelo:</label>
                  <input type="text" id="modelo_bodega" class="form-control" placeholder="Modelo bodega" value="{$bodega.modelo}">
                </div>
                   
              </div>
            </div>
            <!--Cierre del step 12-->




            <div id="step-22">
              <div class="form-row">
                 <div class="col-sm-4">
                  <div class="position-relative form-group">
                    <label>Temperatura maxima:</label>
                    <input type="text" id="temp_max" class="form-control" placeholder="Temperatura maxima" value="{$bodega.temp_max}">
                  </div>
                </div>
                <div class="col-sm-4">
                  <label>Temperatura minima:</label>
                  <input type="text" id="temp_min" class="form-control" placeholder="Temperatura minima" value="{$bodega.temp_min}">
                </div>
                <div class="col-sm-4">
                    <label>Valor seteado temperatura:</label>
                    <input type="text" id="valor_seteado_temp" class="form-control" placeholder="Valo seteado temperatura" value="{$bodega.valor_seteado_temp}">
                  </div>
              </div>
              <div class="form-row">
                <div class="col-sm-4">
                  <label>Humedad relativa maxima:</label>
                 <input type="text" id="hr_max" class="form-control" placeholder="Humedad Maxima" value="{$bodega.hr_max}">
                </div>
                 <div class="col-sm-4">
                    <label>Humedad relativa minima:</label>
                    <input type="text" id="hr_min" class="form-control" placeholder="Humedad Minima" value="{$bodega.hr_min}">
                  </div>
                  <div class="col-sm-4">
                    <label>Valor seteado Humedad:</label>
                    <input type="text" id="valor_seteado_hum" class="form-control" placeholder="Valor seteado" value="{$bodega.valor_seteado_hum}">
                  </div>
              </div>
               
              
              

            </div>

            <div id="step-32">
              <div class="form-row">
                <div class="col-sm-4">
                  <div class="position-relative form-group">
                    <label>Largo de la bodega:</label>
                    <input type="text" id="largo_bodega" class="form-control" placeholder="Largo bodega" value="{$bodega.largo}">
                  </div>
                </div>
                <div class="col-sm-4">
                  <label>Ancho de la bodega:</label>
                  <input type="text" id="ancho_bodega" class="form-control" placeholder="Ancho bodega" value="{$bodega.ancho}">
                </div>
                <div class="col-sm-4">
                  <label>Superficie de la bodega:</label>
                  <input type="text" id="superficie_bodega" class="form-control" placeholder="Superficie bodega" value="{$bodega.superficie}">
                </div>
              </div>

              <div class="form-row">
                <div class="col-sm-4">
                  <label>Orientación principal:</label>
                  <input type="text" id="orientacion_principal" class="form-control" placeholder="Orientación principal" value="{$bodega.orientacion_principal}">
                </div>
                <div class="col-sm-4">
                    <label>Orientación recepción:</label>
                    <input type="text" id="orientacion_recepcion" class="form-control" placeholder="Orientación recepción" value="{$bodega.orientacion_recepcion}">
                </div>
                <div class="col-sm-4">
                  <label>Orientación despacho:</label>
                  <input type="text" id="orientacion_despacho" class="form-control" placeholder="Orientación despacho" value="{$bodega.orientacion_despacho}">
                </div>
              </div>
              <br>
              <div class="form-row">
                <div class="col-sm-4">
                  <label>Número puertas:</label>
                  <input type="text" id="num_puertas" class="form-control" placeholder="Numero puertas" value="{$bodega.num_puertas}">
                </div>
                 <div class="col-sm-4">
                    <label>Salida emergencia:</label>
                    <input type="text" id="salida_emergencia" class="form-control" placeholder="Salida emergencia" value="{$bodega.salida_emergencia}">
                </div>
                <div class="col-sm-4">
                  <label>Cantidad rack:</label>
                  <input type="text" id="cantidad_rack" class="form-control" placeholder="Cantidad rack" value="{$bodega.cantidad_rack}">
                </div>
              </div>
              <br>
              <div class="form-row">
                <div class="col-sm-4">
                  <label>Número estantes:</label>
                  <input type="text" id="num_estantes" class="form-control" placeholder="Número estantes" value="{$bodega.num_estantes}">
                </div>
                <div class="col-sm-4">
                  <div class="position-relative form-group">
                    <label>Altura maxima rack:</label>
                    <input type="text" id="altura_max_rack" class="form-control" placeholder="Altura maxima rack" value="{$bodega.altura_max_rack}">
                  </div>
                </div>
                <div class="col-sm-4">
                  <label>Sistema extraccion:</label>
                  <input type="text" id="sistema_extraccion" class="form-control" placeholder="Sistema extracción" value="{$bodega.sistema_extraccion}">
                </div>
              </div> 
              <div class="form-row">
                <div class="col-sm-4">
                  <label>Cielo pasa lus:</label>
                  <input type="text" id="cielo_lus" class="form-control" placeholder="Clielo pasa lus" value="{$bodega.cielo_lus}">
                </div>
                <div class="col-sm-4">
                  <div class="position-relative form-group">
                    <label>Cantidad iluminarias:</label>
                    <input type="text" id="cantidad_iluminarias" class="form-control" placeholder="Cantidad iluminarias" value="{$bodega.cantidad_iluminarias}">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="position-relative form-group">
                    <label>Volumen de la bodega:</label>
                    <input type="text" id="volume_bodega" class="form-control" placeholder="Volumen bodega" value="{$bodega.volumen}">
                  </div>
                </div>
              </div>
              <div class="form-row">
                 <div class="col-sm-4">
                    <label>Cantidad Ventanas:</label>
                    <input type="text" id="cantidad_ventana" class="form-control" placeholder="Cantidad ventanas" value="{$bodega.cantidad_ventana}">
                  </div>
                  <div class="col-sm-4">
                  <label>Altura de la bodega:</label>
                   <input type="text" id="altura_bodega" class="form-control" placeholder="Altura bodega" value="{$bodega.altura}">
                </div>
               </div> 
               <br>
               {section name=f loop=$explode_muro} {if $explode_muro[f] eq "Muro de hormigón"} {$hormigon = "checked"} {elseif $explode_muro[f] eq "Muro de isopol"} {$isopol = "checked"} {elseif $explode_muro[f] eq "Muro de ladrillo"} {$ladrillo = "checked"} {elseif
              $explode_muro[f] eq "Muro de madera"} {$madera = "checked"} {elseif $explode_muro[f] eq "otro_muro"} {$otro_muro = "checked"} {elseif $explode_muro[f] eq "- "} {$otro_muro_e = $explode_muro[i] } {/if} {/section}

          

              <div class="form-row">
                <div class="col-sm-6">
                  <div class="position-relative form-group">
                    <label>Tipo de muro:</label>
                    <textarea class="form-control" id="otro_tipo_muro_bodega" placeholder="Especifica el tipo de muro">{$otro_muro_e}</textarea>
                  </div>
                </div>
      

                <div class="col-sm-6">
                  <div class="position-relative form-group">
                    <label>Tipo de cielo</label>
                    <textarea class="form-control" id="otro_tipo_cielo_bodega" placeholder="Especifica el tipo de cielo">{$otro_cielo_e}</textarea>
                  </div>
                </div>
              </div>




            </div>  
            <!--Cierre del step 22-->

            {section name=i loop=$explode_climatizacion} {if $explode_climatizacion[i] eq "Mezclador de aire"} {$mezclador_aire = "checked"} {elseif $explode_climatizacion[i] eq "Sistema HVAC"} {$sistema_hvac ="checked"} {elseif $explode_climatizacion[i] eq "Split"}
            {$split = "checked"} {elseif $explode_climatizacion[i] eq "No climatizacion"} {$no_climatizacion = "checked"} {/if} {/section}
            <div id="step-42">
              <div class="form-row">
                <div class="col-sm-6">
                  <label>-Sistema de climatización</label>
                  <br>
                  <input type="checkbox" name="sistema_climatizacion_1" id="climatizacion" value="Mezclador de aire" {$mezclador_aire}>
                  <label>Mezclador de aire</label>
                  <br>
                  <input type="checkbox" name="sistema_climatizacion_2" id="climatizacion" value="Sistema HVAC" {$sistema_hvac}>
                  <label>Sistema HVAC</label>
                  <br>
                  <input type="checkbox" name="sistema_climatizacion_3" id="climatizacion" value="Split" {$split}>
                  <label>Split</label>
                  <br>
                  <input type="checkbox" name="otro_climatizacion_4" id="climatizacion" value="No climatizacion" {$no_climatizacion}>
                  <label>No cuenta</label>
                  <br>
                </div>
                {if $bodega.monitoreo eq "Si"} {$monitore_1 = "checked"} {else} {$monitore_2 = "checked"} {/if}
                <div class="col-sm-6">
                  <label>-Sistema de monitoreo de temperatura</label><br>
                  <label>Si </label>
                  <input type="radio" name="s_m_t" value="Si" id="s_m_t" {$monitore_1}>
                  <br>
                  <label>No </label>
                  <input type="radio" name="s_m_t" value="No" id="s_m_t" {$monitore_2}>
                </div>
              </div>
              <br> {if $bodega.alarma eq "Si"} {$alarma_1 = "checked"} {else} {$alarma_2 = "checked"} {/if}
              <div class="form-row">
                <div class="col-sm-6">
                  <label>-Sistema de monitoreo de temperatura - Alarmas</label><br>
                  <label>Si </label>
                  <input type="radio" name="s_m_t_a" value="Si" id="s_m_t_a" {$alarma_1}>
                  <br>
                  <label>No </label>
                  <input type="radio" name="s_m_t_a" value="No"  id="s_m_t_a"{$alarma_2}>
                </div>
                {section name=i loop=$explode_plano} {if $explode_plano[i] eq "Arquitectura"} {$arquitectura = "checked"} {elseif $explode_plano[i] eq "Flujo de procesos"} {$flujo_procesos = "checked"} {elseif $explode_plano[i] eq "Sensores de monitoreo"} {$sensores_monitoreo
                = "checked"} {elseif $explode_plano[i] eq "No cuenta con planos"} {$no_planos = "checked"} {/if} {/section}

                <div class="col-sm-6">
                  <label>-Planos</label><br>
                  <input type="checkbox" name="p_s_m_t_a" id="planos" value="Arquitectura" {$arquitectura}>
                  <label>Arquitectura</label>
                  <br>
                  <input type="checkbox" name="p_s_m_t_a" id="planos" value="Flujo de procesos" {$flujo_procesos}>
                  <label>Flujo de procesos</label>
                  <br>
                  <input type="checkbox" name="p_s_m_t_a" id="planos" value="Sensores de monitoreo" {$sensores_monitoreo}>
                  <label>Sensores de monitoreo</label>
                  <br>
                  <input type="checkbox" name="no_planos" id="planos" value="No cuenta con planos" {$no_planos}>
                  <label>No cuenta con planos</label>
                  <br>
                </div>
              </div>
              <br> {if $bodega.analisis_riesgo} {$ar_1 = "checked"} {else} {$ar_2 = "checked"} {/if}
              <div class="form-row">
                <div class="col-sm-6">
                  <label>Cuenta con analisis de riesgo</label><br>
                  <label>Si </label>
                  <input type="radio" name="analisis_riesgo" value="Si" id = "analisis_riesgo" {$ar_1}>
                  <br>
                  <label>No </label>
                  <input type="radio" name="analisis_riesgo" value="No" id = "analisis_riesgo" {$ar_2}>
                </div>
                {if $bodega.ficha_estabilidad} {$ficha_1 = "checked"} {else} {$ficha_2 = "checked"} {/if}
                <div class="col-sm-6">
                  <label>Cuenta con fichas de estabilidad de producto?</label><br>
                  <label>Si </label>
                  <input type="radio" name="fichas_estabilidad" id="fichas_estabilidad" value="Si" {$ficha_1}>
                  <br>
                  <label>No </label>
                  <input type="radio" name="fichas_estabilidad" id="fichas_estabilidad" value="No" {$ficha_2}>
                </div>
              </div>
                
              <br>
              {if $bodega.estado != 0}{$estado1 = "checked"}{else}{$estado2 = "checked"}{/if}

             <div class="form-row">
              <div class="col-sm-3">
                <label>Estado de aprobación</label><br>
                <lable style="color: #50ff00;">Aprobado: <input type="radio" name="estado_bodega" id="estado_bodega_si" value="1" {$estado1}></lable>
                ||
                <lable style="color: #ff0000;">No Aprobado: <input type="radio" name="estado_bodega" id="estado_bodega_no" value="0" {$estado2}></lable>
                
              </div>
             </div> 
              <!--
              <div class="form-row">
                <div class="col-sm-12">
                  <input type="checkbox" name="copia_correo" value="Si" id="enviar_item_bodega">
                  <label>Enviar una copia a mi correo</label>
                </div>
              </div>-->
              <br>
              <div class="form-row">
                <div class="col-sm-12" style="text-align:center;">
                  <button class="mb-2 mr-2  btn-shadow btn-outline-2x btn btn-outline-info" id="btn_editar_item_bodega">Actualizar</button>
                  <button class="mb-2 mr-2  btn-shadow btn-outline-2x btn btn-outline-success" id="btn_nuevo_item_bodega">Crear</button>

                </div>
              </div>
            </div>

            <div id="step-42">
              <div id="cuerpo_interno_correo">
              </div>
            </div>

          </div>
            
          <!--Cierre del content wizzard-->
        </div>
      
        <div class="divider"></div>
        <div class="clearfix">
          <button type="button" id="next-btn2" class="btn-shadow btn-wide float-right btn-pill btn-hover-shine btn btn-primary">Siguiente</button>
          <button type="button" id="prev-btn2" class="btn-shadow float-right btn-wide btn-pill mr-3 btn btn-outline-secondary">Anterior</button>
        </div>
      </div>
      {/foreach}


    </div>
  </div>

  <script type="text/javascript" src="design/js/update_bodega.js"></script>
  <script type="text/javascript" src="design/js/validar_campos_vacios.js"></script>
