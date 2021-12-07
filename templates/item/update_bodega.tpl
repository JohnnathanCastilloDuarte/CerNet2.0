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
													<em>2</em><span>Infraestructura</span>
											</a>
            </li>
            <li>
              <a href="#step-32">
													<em>3</em><span>Equipos</span>
											</a>
            </li>
            <li id="si_envia">
              <a href="#step-42">
													<em>4</em><span>Evidencia</span>
											</a>
            </li>

          </ul>
          <div class="form-wizard-content">
            <div id="step-12">
              <div class="form-row">
                <div class="col-sm-6">
                  <input type="hidden" id="id_item_bodega" value="{$id_item}">
                  <div class="position-relative form-group">
                    <label>Nombre bodega:</label><input name="text" id="nombre_bodega" class="form-control" value="{$bodega.nombre_item}">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="position-relative form-group">
                    <label>Empresa:</label>
                    <input type="text" id="buscador_empresa" class="form-control" placeholder="Ingresa el nombre de la empresa">

                    <div >
                      
                      <table class="table" id="aqui_resultados_empresa">
                         
                      </table>
                    </div>
                    <!--
                    <select id="empresa_bodega" class="form-control">
                      <option value="{$bodega.id_empresa}">{$bodega.nombre_empresa}</option>
                      {foreach from=$array_empresa item=empresa}
                      <option value="{$empresa.id_empresa}">{$empresa.nombre_empresa}</option>
                      {/foreach}
                    </select>-->
                  </div>
                </div>
              </div>



              <div class="form-row">
                <div class="col-sm-12">
                  <div class="position-relative form-group">
                    <label>Descripción:</label>
                    <textarea class="form-control" id="descripcion_item_bodega">{$bodega.descripcion_bodega}</textarea>
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
                <div class="col-sm-6">
                  <label>Codigo interno / N° Serie:</label>
                  <input type="text" id="codigo_bodega" class="form-control" placeholder="Codigo bodega" value="{$bodega.codigo_interno}">
                </div>
              </div>

              {section name=i loop=$explode_producto} {if $explode_producto[i] eq "Alimentos"} {$alimentos="checked"} {elseif $explode_producto[i] eq "Cosméticos"} {$cosmeticos="checked"} {elseif $explode_producto[i] eq "Dispositivos Médicos"} {$dispositivos_medicos="checked"}
              {elseif $explode_producto[i] eq "Farmacéuticos"} {$farmaceutico="checked"} {elseif $explode_producto[i] eq "Insumos Médicos"} {$insumos_medicos="checked"} {elseif $explode_producto[i] eq "Materias Primas"} {$materias_primas="checked"} {elseif
              $explode_producto[i] eq "Sustancias Peligrosas"} {$sustancias_peligrosas="checked"} {elseif $explode_producto[i] eq "Otros"} {$otros="checked"} {else} {$otros_e=$explode_producto[i]} {/if} {/section}

              <div class="form-row">
                <div class="col-sm-6">
                  <div class="position-relative form-group">
                    <label>Productos que almacena:</label>
                    <br>
                    <input type="checkbox" name="alimentos" id="productos" value="Alimentos" {$alimentos}>
                    <label>Alimentos</label>
                    <br>
                    <input type="checkbox" name="cosmetios" id="productos" value="Cosméticos" {$cosmeticos}>
                    <label>Cosméticos</label>
                    <br>
                    <input type="checkbox" name="dispocitivosmedicos" id="productos" value="Dispositivos Médicos" {$dispositivos_medicos}>
                    <label>Dispositivos Médicos</label>
                    <br>
                    <input type="checkbox" name="farmaceuticos" id="productos" value="Farmacéuticos" {$farmaceutico}>
                    <label>Farmacéuticos</label>
                    <br>
                    <input type="checkbox" name="insumosmedicos" id="productos" value="Insumos Médicos" {$insumos_medicos}>
                    <label>Insumos Médicos</label>
                    <br>
                    <input type="checkbox" name="materiasprimas" id="productos" value="Materias Primas" {$materias_primas}>
                    <label>Materias Primas</label>
                    <br>
                    <input type="checkbox" name="sustanciaspeligrosas" id="productos" value="Sustancias Peligrosas" {$sustancias_peligrosas}>
                    <label>Insumos Médicos</label>
                    <br>
                    <input type="checkbox" name="otros" value="Otros" id="productos" {$otros}>
                    <label>Otros</label>
                    <br>
                  </div>
                </div>
              </div>

              <div id="otros_productos">
                <div class="form-row">
                  <div class="col-sm-12">
                    <label>Descripción de productos que almacena</label>
                    <textarea id="productos_bodega" class="form-control" placeholder="Describa los productos que almacena">{$otros_e}</textarea>
                  </div>
                </div>
              </div>
            </div>
            <!--Cierre del step 12-->




            <div id="step-22">
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
                <div class="col-sm-6">
                  <div class="position-relative form-group">
                    <label>Volumen de la bodega:</label>
                    <input type="text" id="volume_bodega" class="form-control" placeholder="Volumen bodega" value="{$bodega.volumen}">
                  </div>
                </div>
                <div class="col-sm-6">
                  <label>Altura de la bodega:</label>
                  <input type="text" id="altura_bodega" class="form-control" placeholder="Altura bodega" value="{$bodega.altura}">
                </div>
              </div>

              {section name=f loop=$explode_muro} {if $explode_muro[f] eq "Muro de hormigón"} {$hormigon = "checked"} {elseif $explode_muro[f] eq "Muro de isopol"} {$isopol = "checked"} {elseif $explode_muro[f] eq "Muro de ladrillo"} {$ladrillo = "checked"} {elseif
              $explode_muro[f] eq "Muro de madera"} {$madera = "checked"} {elseif $explode_muro[f] eq "otro muro"} {$otro_muro = "checked"} {elseif $explode_muro[f] eq "- "} {$otro_muro_e = $explode_muro[i] } {/if} {/section}



              <div class="form-row">
                <div class="col-sm-6">
                  <div class="position-relative form-group">
                    <label>Tipo de muro:</label>
                    <br>
                    <input type="checkbox" name="tipo_muro_bodega_1" id="tipo_muro" value="Muro de hormigón" {$hormigon}>
                    <label> Muro de hormigón </label>
                    <br>
                    <input type="checkbox" name="tipo_muro_bodega_2" id="tipo_muro" value="Muro de isopol" {$isopol}>
                    <label> Muro de isopol </label>
                    <br>
                    <input type="checkbox" name="tipo_muro_bodega_3" id="tipo_muro" value="Muro de ladrillo" {$ladrillo}>
                    <label> Muro de ladrillo </label>
                    <br>
                    <input type="checkbox" name="tipo_muro_bodega_4" id="tipo_muro" value="Muro de madera" {$madera}>
                    <label> Muro de madera </label>
                    <br>
                    <input type="checkbox" name="tipo_muro_bodega_5" id="tipo_muro" value="otro_muro" {$otro_muro}>
                    <label> Otro tipo de muro </label>
                    <textarea class="form-control" id="otro_tipo_muro_bodega" placeholder="Especifica el tipo de muro">{$otro_muro_e}</textarea>
                  </div>
                </div>
                {section name=i loop=$explode_cielo} {if $explode_cielo[i] eq "Cielo de hormigón"} {$cielo_hormigon = "checked"} {elseif $explode_cielo[i] eq "Cielo de isopol"} {$cielo_isopol = "checked"} {elseif $explode_cielo[i] eq "Cielo de plachas metalicas"} {$cielo_plachas_metalicas
                = "checked"} {elseif $explode_cielo[i] eq "otro cielo"} {$otro_cielo = "checked"} {elseif $explode_cielo[i] eq "- "} {$otro_cielo_e = $explode_cielo[i]} {/if} {/section}



                <div class="col-sm-6">
                  <div class="position-relative form-group">
                    <label>Tipo de cielo</label>
                    <br>
                    <input type="checkbox" name="tipo_cielo_bodega_1" id="tipo_cielo" value="Cielo de hormigón" {$cielo_hormigon}>
                    <label> Cielo de hormigón </label>
                    <br>
                    <input type="checkbox" name="tipo_cielo_bodega_2" id="tipo_cielo" value="Cielo de isopol" {$cielo_isopol}>
                    <label> Cielo de isopol </label>
                    <br>
                    <input type="checkbox" name="tipo_cielo_bodega_3" id="tipo_cielo" value="Cielo de plachas metalicas" {$cielo_plachas_metalicas}>
                    <label> Cielo de planchas metálicas </label>
                    <br>
                    <input type="checkbox" name="tipo_cielo_bodega_4" id="tipo_cielo" value="otro_cielo" {$otro_cielo}>
                    <label> Otro tipo de cielo </label>
                    <textarea class="form-control" id="otro_tipo_cielo_bodega" placeholder="Especifica el tipo de cielo">{$otro_cielo_e}</textarea>
                  </div>
                </div>
              </div>

            </div>
            <!--Cierre del step 22-->

            {section name=i loop=$explode_climatizacion} {if $explode_climatizacion[i] eq "Mezclador de aire"} {$mezclador_aire = "checked"} {elseif $explode_climatizacion[i] eq "Sistema HVAC"} {$sistema_hvac ="checked"} {elseif $explode_climatizacion[i] eq "Split"}
            {$split = "checked"} {elseif $explode_climatizacion[i] eq "No climatizacion"} {$no_climatizacion = "checked"} {/if} {/section}
            <div id="step-32">
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
              <br><!--
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