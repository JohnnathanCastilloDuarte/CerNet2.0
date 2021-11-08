<?php
/* Smarty version 3.1.34-dev-7, created on 2021-11-08 20:43:33
  from 'C:\xampp\htdocs\CerNet2.0\templates\filtros\datos_informe_mapeo.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_61897de5b3ba55_11686720',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '673e3e75561e7cc48a071a81c0463f730f13393a' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CerNet2.0\\templates\\filtros\\datos_informe_mapeo.tpl',
      1 => 1636400611,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61897de5b3ba55_11686720 (Smarty_Internal_Template $_smarty_tpl) {
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
     <!-- <form id="form_filtro_1" enctype="multipart/form-data" method="post">--> 
       <div class="card">
        <div class="card-header">
          <a data-toggle="collapse" data-target="#collapseOne44"  aria-controls="collapseOne44">
            Inspeccion Visual
          </a>
        </div>
         <div class="card-body collapse" id="collapseOne44" >
            <input type="hidden" name="id_informe_filtro" id="id_informe_filtro">

            <div class="row">
              <div class="col-sm-6">
                <h5>
                  Equipo en buenas condiciones de operación:
                </h5>
              </div>
              <div class="col-sm-6">
                <select class="form-control" id="inspeccion_visual_1" name="inspeccion_visual[]">
                  <option id="insp1_traido_db">Seleccione</option>
                  <option value="Si">Si</option>
                  <option value="No">No</option>
                </select>
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-sm-6">
                <h5>
                  Filtro presenta reparaciones:
                </h5>
              </div>
              <div class="col-sm-6">
                <select class="form-control" id="inspeccion_visual_2" name="inspeccion_visual[]">
                  <option  id="insp2_traido_db">Seleccione</option>
                  <option value="Si">Si</option>
                  <option value="No">No</option>
                </select>
              </div>
            </div>
           <br>
           <div class="row">
              <div class="col-sm-6">
                <h5>
                  Filtro presenta rotura:
                </h5>
              </div>
              <div class="col-sm-6">
                <select class="form-control" id="inspeccion_visual_3" name="inspeccion_visual[]">
                  <option  id="insp3_traido_db">Seleccione</option>
                  <option value="Si">Si</option>
                  <option value="No">No</option>
                </select>
              </div>
            </div>
           <br>
           <div class="row">
              <div class="col-sm-6">
                <h5>
                  Filtro presenta deterioro en sellos perimetrales:
                </h5>
              </div>
              <div class="col-sm-6">
                <select class="form-control" id="inspeccion_visual_4" name="inspeccion_visual[]">
                  <option  id="insp4_traido_db">Seleccione</option>
                  <option value="Si">Si</option>
                  <option value="No">No</option>
                </select>
              </div>
            </div>
           <br>
           <div class="row">
              <div class="col-sm-6">
                <h5>
                  Filtros instalados correctamente:
                </h5>
              </div>
              <div class="col-sm-6">
                <select class="form-control" id="inspeccion_visual_5" name="inspeccion_visual[]">
                  <option  id="insp5_traido_db">Seleccione</option>
                  <option value="Si">Si</option>
                  <option value="No">No</option>
                </select>
              </div>
            </div>
           <br>
           <div class="row">
              <div class="col-sm-6">
                <h5>
                  Presenta colmatación:
                </h5>
              </div>
              <div class="col-sm-6">
                <select class="form-control" id="inspeccion_visual_6" name="inspeccion_visual[]">
                  <option  id="insp6_traido_db">Seleccione</option>
                  <option value="Si">Si</option>
                  <option value="No">No</option>
                </select>
              </div>
            </div>

         </div>
       </div><!--CARD 1-->

        <br>
        
        <div class="card">
          <div class="card-header">
            <a data-toggle="collapse" data-target="#collapseOne55"  aria-controls="collapseOne55">
                Detalle de mediciones
              </a>
          </div>
          <div class="card-body collapse" id="collapseOne55">
            
            <div class="row">
              <div class="col-sm-2">
                <label>Cantidad de filtros: </label>

              </div>
              <div class="col-sm-2">
                <input type="text" class="form-control" id="cantidad_filtros_input" readonly>
              </div>
              <!--<div class="col-sm-5">
                <button class="btn btn-success" id="generar_posicion_filtros">Generar</button>
              </div>-->
   

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
            <a data-toggle="collapse" data-target="#collapseOne88"  aria-controls="collapseOne88">
              Resultado de mediciones: Norma UNE-EN-ISO 14.644-3:2005
            </a>
          </div>
          <div class="card-body collapse" id="collapseOne88">
            <table class="table" style="text-align:center;">
              <thead>
                <th>Medicion</th>
                <th>Valor obtenido</th>
              </thead>
              <tbody id="medicion_del_norma_une_en_iso">

              </tbody>
            </table>  
          </div>
        </div>
        
        <br>
        
          <div class="row">
            <div class="col-sm-6">  
               <div class="card">
                <div class="card-header">
                  <a data-toggle="collapse" data-target="#collapseOne66"  aria-controls="collapseOne66">
                    Especificación de Inyección de partículas de 0,3 a 5 micrones en forma de aerosol
                  </a>  
                </div>
                <div class="card-body collapse" id="collapseOne66">
                  <div class="row" >
                    <div class="col-sm-6" style="text-align:center;">  
                      <label>Concentración de partículas en aerosol (mg/litro):</label>
                    </div>
                    <div class="col-sm-6" style="text-align:center;">
                      <div class="col-sm-6">
                        <input type="number" value="22.9" class="form-control" id="concentracion_particulas_filtro" name="concentracion_particulas_filtro">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <br>
          <div class="row" id="tarjeta_equipos_medicion_filtros">
            <div class="col-sm-12">  
              <div class="card">
               <div class="card-header">
                 <a data-toggle="collapse" data-target="#collapseOne77"  aria-controls="collapseOne77">
                   Equipos Utilizados en la Medición
                 </a>  
               </div>
               <div class="card-body collapse" id="collapseOne77">
                 <div class="row">
                   <div class="col-sm-8" style="text-align:center;">
                     <label>Seleccione equipo</label>
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
               </div>
             </div>
           </div>
          </div>
          <br>

          <div class="row">
            <div class="col-sm-12" style="text-align:center;">
              <button class="btn-shadow btn-outline-2x btn btn-outline-success"  id="btn_nuevo_filtro_mapeo">Aceptar</button>
							<button class="btn-shadow btn-outline-2x btn btn-outline-info"  id="btn_actualizar_filtro_mapeo">Actualizar</button>
            </div>
          </div>
             
       </div><!--CIERRE DEL DIV ACORDION-->
    <!--  </form> -->    
  </div><!--cierre del div col sm 9-->
</div> 



<?php echo '<script'; ?>
 type="text/javascript" src="design/js/control_mapeo_campanas.js"><?php echo '</script'; ?>
>


<?php echo '<script'; ?>
 type="text/javascript" src="design/js/control_mapeo_filtros.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="design/js/nuevo_equipo_cercal.js"><?php echo '</script'; ?>
>

<?php }
}
