<?php
/* Smarty version 3.1.34-dev-7, created on 2022-03-31 17:03:04
  from 'C:\xampp\htdocs\CerNet2.0\templates\aire_comprimido\datos_informe_mapeo.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_6245c2a85935d1_74658225',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '952a5fd33c2654509b8344af9f9823fcfbda52dd' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CerNet2.0\\templates\\aire_comprimido\\datos_informe_mapeo.tpl',
      1 => 1648738981,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6245c2a85935d1_74658225 (Smarty_Internal_Template $_smarty_tpl) {
?><input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['id_asignado_filtro']->value;?>
" id="id_asignado_filtro">

<div class="row">

    <div class="col-sm-12">
      <div class="card">
        <div class="card-header">
          Inspección aire comprimido
        </div>

        <div class="card-body">

         <div class="card">
          <div class="card-header">
            <a data-toggle="collapse" data-target="#collapseOne11"  aria-controls="collapseOne11">
             Información
            </a>
          </div>
           <div class="card-body collapse collapse show" id="collapseOne11" >
          
              <div class="row col-sm-12">
                <div class="col-sm-6">
                  <label>Nombre informe:</label>
                  <input type="text" name="nombre_informe" id="nombre_informe" class="form-control" placeholder="Nombre del informe">
                </div>
                <div class="col-sm-6">
                  <label>Solicitante:</label>
                  <input type="text" name="solicitante" id="solicitante" class="form-control" placeholder="Nombre quien solicita">
                </div>
                <div class="col-sm-6">
                  <label>Atención Sr (a):</label>
                  <input type="text" name="atencion" id="atencion" class="form-control" placeholder="Nombre Atención">
                </div>
                <div class="col-sm-6">
                  <label>Nº Acta de Inspección:</label>
                  <input type="text" name="n_acta_inspecion" id="n_acta_inspecion" class="form-control" placeholder="Numero°  acta de inspeccion">
                </div>
                <div class="col-sm-12">
                  <label>Conclusión</label>
                 <textarea name="conclusion" id="conclusion" class="form-control" placeholder="Conclusión"></textarea>
                </div>

              </div>
     
           </div>
         </div><!--CARD 1-->
        <br>
        <!-- INICIO CARD 2 -->
        <div class="card">
          <div class="card-header">
            <a data-toggle="collapse" data-target="#collapseOne22"  aria-controls="collapseOne22">
             RESULTADOS – NORMA: UNE-EN ISO 8573-1 
            </a>
          </div>
           <div class="card-body collapse collapse show" id="collapseOne22" >
          
              <table class="table">
                <tr>
                  <td>as</td>
                </tr>
              </table>
     
           </div>
         </div><!--CARD 2-->
         <br>










         <div class="card col-sm-6">
          <div class="card-header">
            <a data-toggle="collapse" data-target="#collapseOne22"  aria-controls="collapseOne22">
              Inspeccion Visual
            </a>
          </div>
           <div class="card-body collapse" id="collapseOne22" >
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
            <div class="row">

              <div class="col-sm-12">
                <div class="card">
                  <div class="card-header">
                    <a data-toggle="collapse" data-target="#collapseOne99"  aria-controls="collapseOne99" id="img_filtros">
                      Evidencia grafica
                    </a>
                  </div>
                  <div class="card-body collapse" id="collapseOne99">
                    <div class="row" style="text-align:center;">
                      <div class="col-sm-3"></div>
                      <div class="col-sm-6">
                        <form  id="formulario_envia_img" enctype="multipart/form-data" method="POST">
                          <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['id_asignado_filtro']->value;?>
" name="id_asignado_filtro">
                          <input type="text" class="form-control" placeholder="Enunciado de la imagen" name="enunciado_imagen">
                          <br>
                          <input type="file" name="img_a_subir" class="form-control">
                          <br>
                          <button class="btn btn-success">Cargar</button>
                        </form>
                      </div>
                    </div>
                    <br>
                    <div class="row" id="aqui_imagenes">
      
                    </div>
                      
                    
                  </div>
                </div>
              </div>
            </div>

            <br>
            <div class="row">
              <div class="col-sm-12" style="text-align:center;">
                <button class="btn btn-success"  id="btn_nuevo_filtro_mapeo">Aceptar</button>
  							<button class="btn btn-info"  id="btn_actualizar_filtro_mapeo">Actualizar</button>
                <button class="btn btn-warning text-light" id="abrir_informe">Informe</button>
              </div>
            </div>
               
         </div><!--CIERRE DEL DIV ACORDION-->
         <div><br></div>
       </div>    <!-- cierre de la card -->
    </div><!--cierre del div col sm 9-->
</div> 


<?php }
}
