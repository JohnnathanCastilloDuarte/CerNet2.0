<?php
/* Smarty version 3.1.34-dev-7, created on 2021-10-29 23:44:33
  from 'C:\xampp\htdocs\CerNet2.0\templates\filtros\datos_informe_mapeo.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_617c6b416ab535_70756164',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '673e3e75561e7cc48a071a81c0463f730f13393a' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CerNet2.0\\templates\\filtros\\datos_informe_mapeo.tpl',
      1 => 1635543838,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_617c6b416ab535_70756164 (Smarty_Internal_Template $_smarty_tpl) {
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
          <a data-toggle="collapse" data-target="#collapseOne44"  aria-controls="collapseOne44">
            Inspeccion Visual
          </a>
        </div>
         <div class="card-body collapse" id="collapseOne44" >
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
                  Filtro presenta reparaciones:
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
                  Filtro presenta rotura:
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
                  Filtro presenta deterioro en sellos perimetrales:
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
                  Filtros instalados correctamente:
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
           <div class="row">
              <div class="col-sm-6">
                <h5>
                  Presenta colmatación:
                </h5>
              </div>
              <div class="col-sm-6">
                <select class="form-control" id="inspeccion_visual_6">
                  <option>Seleccione</option>
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
                Prueba de Integridad de Filtros - UNE-EN ISO 14.644-3
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
              <div class="col-sm-5">
                <button class="btn btn-success" id="generar_posicion_filtros">Generar</button>
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
                        <input type="number" value="22.9" class="form-control" id="concentracion_particulas_filtro">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <br>
          <div class="row">
            <div class="col-sm-12">  
              <div class="card">
               <div class="card-header">
                 <a data-toggle="collapse" data-target="#collapseOne77"  aria-controls="collapseOne77">
                   Equipos Utilizados en la Medición
                 </a>  
               </div>
               <div class="card-body collapse" id="collapseOne77">
                 <div class="row">
                   <div class="col-sm-6" style="text-align:center;">
                     <label>Seleccione equipo</label>
                     <select id="listar_equipos_filtros" class="form-control">
                         
                     </select>
                     <button class="btn btn-info" id="recargar">Recargar</button>
                   </div>
                   <div class="col-sm-6" style="text-align:center">
                     <label for="">Puedes crear nuevos equipos desde esta opción</label><br>
                    <button class="btn btn-info" id="crear_nuevo_equipo" >Crear equipo</button>
                   </div>
                 </div>
               </div>
             </div>
           </div>
          </div>
          
         
   
       </div><!--CIERRE DEL DIV ACORDION-->
           
  </div><!--cierre del div col sm 9-->
</div> 


<?php echo '<script'; ?>
 type="text/javascript" src="design/js/control_mapeo_filtros.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="design/js/nuevo_equipo_cercal.js"><?php echo '</script'; ?>
>

<?php }
}
