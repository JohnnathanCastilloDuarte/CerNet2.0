<?php
/* Smarty version 3.1.34-dev-7, created on 2022-02-14 19:17:16
  from '/home/god/public_html/CerNet2.0/templates/flujo_laminar/datos_informe_mapeo.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_620aaabc62a525_56556581',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ad4306d32b82e272e78e4f68e4182ba01b9da23b' => 
    array (
      0 => '/home/god/public_html/CerNet2.0/templates/flujo_laminar/datos_informe_mapeo.tpl',
      1 => 1644854048,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_620aaabc62a525_56556581 (Smarty_Internal_Template $_smarty_tpl) {
?><input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['id_asignado_flujo_laminar']->value;?>
" id="id_asignado_flujo_laminar">
<div class="row">
    <div class="col-sm-4">
        <div class="card">
            <div class="card-header">
                <h6>Información del mapeo</h6>
            </div>
            <div class="card-body">
                <div class="col-sm-12">
                    <input type="hidden" name="" id="id_informe">
                    <label>Nombre informe</label>
                    <input type="text" name="" class="form-control" placeholder="Nombre informe" id="nombre_informe">
                </div>
                <div class="col-sm-12">
                    <label>Solicitante</label>
                    <input type="text" name="" class="form-control" placeholder="solicitante" id="solicitante">
                </div>
                <div class="col-sm-12">
                    <label>Conclusión</label>
                    <textarea class="form-control" placeholder="Conclusión" id="conclusion" style="height: 190px;"></textarea>
                </div>
                <br>
                <div style="text-align: center;">
                  <button class="btn btn-sm btn-info float-center" id="actualizar_mapeo">Actualizar</button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
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
                <form method="POST" id="formulario_flujo_laminar">
                <div class="row">
                    <div class="col-sm-12">
                            <div id="accordion">
                                
                                <div class="card">
                                    <div class="card-header">
                                        <a data-toggle="collapse" data-target="#collapseOne1"  aria-controls="collapseOne1">
                                        Inspeccion Visual
                                        </a>
                                    </div>
                                    <div class="card-body collapse in show" id="collapseOne1">
                                            <table class="table">
                                                <thead>
                                                    <th>Inspección</th>
                                                    <th>Cumple</th>
                                                </thead>
                                                <tbody id="resultados_inspeccion_visual">

                                                </tbody>
                                            </table>
                                    </div>
                                </div>
                            </div>    
                    </div>
                </div>
                
                <hr>

                <div class="row">
                    <div class="col-sm-12">
                        <div id="accordion">
                                
                            <div class="card">
                                <div class="card-header">
                                    <a data-toggle="collapse" data-target="#collapseOne2"  aria-controls="collapseOne2">
                                        RESULTADOS - NORMA: UNE-EN ISO 14.644-1:2015 y NSF/ANSI 49:2008
                                    </a>
                                </div>
                                <div class="card-body collapse" id="collapseOne2">
                                    <table class="table">
                                        <thead>
                                            <th>Medición</th>
                                            <th>Requisito</th>
                                            <th>Valor Obtenido</th>
                                            <th>Veredicto</th>
                                        </thead>
                                        <tbody id="aqui_prueba_1"></tbody>
                                    </table>
                                </div>
                            </div>        
                        </div>
                    </div>
                    </div>   

                <hr>

                <div class="row">
                    <div class="col-sm-12">
                            <div id="accordion">
                                    
                                <div class="card">
                                    <div class="card-header">
                                        <a data-toggle="collapse" data-target="#collapseOne3"  aria-controls="collapseOne3">
                                            Prueba de Integridad de Filtros UNE-EN ISO 14.644-3:2005
                                        </a>
                                    </div>
                                    <div class="card-body collapse" id="collapseOne3">
                                        <table class="table">
                                            <thead>
                                                <th>Filtros interiores</th>
                                                <th>Zona A</th>
                                                <th>Zona A</th>
                                                <th>Zona B</th>
                                                <th>Zona B</th>
                                                <th>Zona C</th>
                                                <th>Zona C</th>
                                                <th>Zona D</th>
                                                <th>Zona D</th>
                                            </thead>
                                            <tbody id="aqui_prueba_2">

                                            </tbody>
                                        </table>
                                    </div>
                                </div>    

                            </div>
                    </div>
                </div>

                <hr>

                <div class="row">
                    <div class="col-sm-12">
                        <div id="accordion">
                                
                            <div class="card">
                                <div class="card-header">
                                    <a data-toggle="collapse" data-target="#collapseOne4"  aria-controls="collapseOne4">
                                        Prueba de Medición de Entrada de Aire - NSF/ANSI 49:2008
                                    </a>
                                </div>
                                <div class="card-body collapse" id="collapseOne4">
                                    <table class="table">
                                        <thead>
                                            <th>N° Filtro</th>
                                            <th>Medición 1 (m/s)</th>
                                            <th>Medición 2 (m/s)</th>
                                            <th>Medición 3 (m/s)</th>
                                            <th>Medición 4 (m/s)</th>
                                            <th>Medición 5 (m/s)</th>
                                            <th>Medición 6 (m/s)</th>
                                        </thead>
                                        <tbody id="aqui_prueba_3">

                                        </tbody>
                                    </table>
                                </div>
                            </div>    

                        </div>
                    </div>
                </div>

                <hr>

                <div class="row">
                    <div class="col-sm-12">
                        <div id="accordion">
                                
                            <div class="card">
                                <div class="card-header">
                                    <a data-toggle="collapse" data-target="#collapseOne5"  aria-controls="collapseOne5">
                                        Prueba de Temperatura y Humedad Relativa - UNE-EN ISO 14.644-3:2005
                                    </a>
                                </div>
                                <div class="card-body collapse" id="collapseOne5">
                                    <table class="table">
                                        <thead>
                                            <th>Punto de Muestreo</th>
                                            <th>1</th>
                                            <th>2</th>
                                            <th>3</th>
                                            <th>Promedio</th>
                                        </thead>
                                        <tbody id="aqui_prueba_4">

                                        </tbody>
                                    </table>
                                </div>
                            </div>    

                        </div>
                    </div>
                </div>

                <hr>

                <div class="row">
                    <div class="col-sm-12">
                        <div id="accordion">
                                
                            <div class="card">
                                <div class="card-header">
                                    <a data-toggle="collapse" data-target="#collapseOne6"  aria-controls="collapseOne6">
                                        Prueba de Temperatura y Humedad Relativa - UNE-EN ISO 14.644-3:2005
                                    </a>
                                </div>
                                <div class="card-body collapse" id="collapseOne6">
                                    <table class="table">
                                        <thead>
                                            <th>Punto de Muestreo</th>
                                            <th>1</th>
                                            <th>2</th>
                                            <th>3</th>
                                            <th>Promedio</th>
                                        </thead>
                                        <tbody id="aqui_prueba_5">

                                        </tbody>
                                    </table>
                                </div>
                            </div>    

                        </div>
                    </div>
                </div>


                <hr>

                <div class="row">
                    <div class="col-sm-12">
                        <div id="accordion">
                                
                            <div class="card">
                                <div class="card-header">
                                    <a data-toggle="collapse" data-target="#collapseOne7"  aria-controls="collapseOne7">
                                        Contención de Aire Externo
                                    </a>
                                </div>
                                <div class="card-body collapse" id="collapseOne7">
                                    <table class="table">
                                        <thead>
                                            <th>Condiciones</th>
                                            <th>Resultado</th>
                                            <th>Cumple</th>
                                        </thead>
                                        <tbody id="aqui_prueba_6">

                                        </tbody>
                                    </table>
                                </div>
                            </div>    

                        </div>
                    </div>
                </div>

                <hr>

                <div class="row">
                    <div class="col-sm-12">
                        <div id="accordion">
                                
                            <div class="card">
                                <div class="card-header">
                                    <a data-toggle="collapse" data-target="#collapseOne8"  aria-controls="collapseOne8">
                                        Unidireccionalidad
                                    </a>
                                </div>
                                <div class="card-body collapse" id="collapseOne8">
                                    <table class="table">
                                        <thead>
                                            <th>Condiciones</th>
                                            <th>Resultado</th>
                                            <th>Cumple</th>
                                        </thead>
                                        <tbody id="aqui_prueba_7">

                                        </tbody>
                                    </table>
                                </div>
                            </div>    

                        </div>
                    </div>
                </div>

                <hr>

                <div class="row">
                    <div class="col-sm-12">
                        <div id="accordion">
                                
                            <div class="card">
                                <div class="card-header">
                                    <a data-toggle="collapse" data-target="#collapseOne9"  aria-controls="collapseOne9">
                                        Prueba de Medición de Nivel de Iluminación - DS N°594
                                    </a>
                                </div>
                                <div class="card-body collapse" id="collapseOne9">
                                    <table class="table">
                                        <thead>
                                            <th>Punto de Muestreo</th>
                                            <th>1</th>
                                            <th>2</th>
                                            <th>3</th>
                                            <th>4</th>
                                            <th>5</th>
                                            <th>Promedio</th>
                                        </thead>
                                        <tbody id="aqui_prueba_8">

                                        </tbody>
                                    </table>
                                </div>
                            </div>    

                        </div>
                    </div>
                </div>

                <hr>

                <div class="row" style="text-align:center;">
                    <div class="col-sm-12">
                            <button class="btn btn-info">Guardar</button>
                    </div>
                </div>
                </form>
                <button class="btn btn-warning" id="abrir_informe">Informe</button>
            </div>
            
            <div class="tab-pane tabs-animation fade" id="equipos" role="tabpanel">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <input type="hidden" value="flujo_laminar" id="pk">
                                <div class="row">
                                    <div class="col-sm-8">
                                        <label>Seleccione equipo</label>
                                        <select class="form-control" id="tipo_prueba">
                                        <option value="">Seleccion</option>
                                        <option value="Prueba integridad filtros">Prueba de integridad de filtros</option>
                                        <option value="Prueba de velocidad de aire">Prueba de velocidad de aire</option>
                                        <option value="Prueba de conteo de particulas">Prueba de conteo de particulas</option>
                                        <option value="Prueba de temperatura y humedad relativa">Prueba de temperatura y humedad relativa</option>
                                        <option value="Prueba sonora">Prueba sonora</option>
                                        <option value="Prueba nivel de iluminación">Prueba nivel de iluminación</option>
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
                                <form method="post" id="formulario_evidencias_graficas_flujo_laminar" enctype="multipart/form-data">
                                    <input type="hidden" name="id_asignado_graficas" value="<?php echo $_smarty_tpl->tpl_vars['id_asignado_flujo_laminar']->value;?>
">
    
                                    <div class="row">
                                        <div class="col-sm-6">
                                          <label>Tipo de evidencia:</label>
                                          <select class="form-control" name="tipo_imagen">
                                            <option value="">Seleccion la categoria</option> 
                                            <option value="1">Imagen conteo de particulas</option>
                                            <option value="2">Imagen frontal</option>
                                            <option value="3">Imagen placa</option>
                                            <option value="4">Imagen area de trabajo</option>    
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
                                      <div class="card-header">Conteo de particulas</div>
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
                                        <div class="card-header">Imagen frontal</div>
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
                                        <div class="card-header">Imagen placa</div>
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
                                        <div class="card-header">Imagen area trabajo</div>
                                        <div class="card-body">
                                            <div class="row" id="Listar_img_c4">
                
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
<?php echo '<script'; ?>
 type="text/javascript" src="design/js/control_mapeo_flujo_laminar.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="design/js/nuevo_equipo_cercal.js"><?php echo '</script'; ?>
><?php }
}
