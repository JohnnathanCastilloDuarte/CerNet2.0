<?php
/* Smarty version 3.1.34-dev-7, created on 2022-04-19 23:25:19
  from 'C:\xampp\htdocs\CerNet2.0\templates\aire_comprimido\datos_informe_mapeo.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_625f28bf8d72f6_48349866',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '952a5fd33c2654509b8344af9f9823fcfbda52dd' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CerNet2.0\\templates\\aire_comprimido\\datos_informe_mapeo.tpl',
      1 => 1650403502,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_625f28bf8d72f6_48349866 (Smarty_Internal_Template $_smarty_tpl) {
?>

<div class="row">

    <div class="col-sm-12">
      <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
          <li class="nav-item">
            <a role="tab" class="nav-link active" id="tab-0" data-toggle="tab" href="#creacion">
              <span>Creación</span>
            </a>
          </li>
          <li class="nav-item" id="medicion_aire_comprimido">
            <a role="tab" class="nav-link" id="asignacion" data-toggle="tab" href="#mediciones">
              <span>Mediciones</span>
            </a>
          </li>
          <li class="nav-item" id="Requisitos_aire_comprimido">
            <a role="tab" class="nav-link" id="asignacion" data-toggle="tab" href="#Requisitos">
              <span>Requisitos</span>
            </a>
          </li>
          <li class="nav-item" id="Requisitos_aire_comprimido">
            <a role="tab" class="nav-link" id="asignacion" data-toggle="tab" href="#imagenes">
              <span>Imagenes</span>
            </a>
          </li>
      </ul>
 <div class="tab-content">    
    <div class="tab-pane tabs-animation fade show active" id="creacion" role="tabpanel"> 
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

<form id="formulario">        
<input type="text" value="<?php echo $_smarty_tpl->tpl_vars['id_asignado_aire']->value;?>
" id="id_asignado_aire" name="id_asignado_aire">   
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
                <div class="col-sm-6">
                  <label>Conclusión</label>
                 <textarea name="conclusion" id="conclusion" class="form-control" placeholder="Conclusión"></textarea>
                </div> 
                <div class="col-sm-6">
                  <label for="">Responsable:</label>
                  <input type="text" name="responsable" id="responsable" class="form-control" placeholder="Solicitante">
                  <div class="alert alert-danger alert-sm" id="alerta_1">El usuario no se encuentra registrado</div>
                </div>

              </div>
     
           </div>
         </div><!--CARD 1-->
        <br>
        <!-- INICIO CARD 2 -->
           <div class="card col-sm-8" >
          <div class="card-header">
            <a data-toggle="collapse" data-target="#collapseOne33" aria-controls="collapseOne33">
              ISPECCION VISUAL
            </a>
          </div>
          <div class="card-body collapse collapse show" id="collapseOne33">
                <input type="hidden" name="id_inspeccion_visual" id="id_inspeccion_visual">
              <table class="table">
                   <tr>
                     <th>Punto de Conexión en buenas condiciones de operación</th>
                     <td><input type="" class="form-control" name="insp1" id="insp1"></td>
                   </tr>
                   <tr>
                     <th>Equipo Limpio y sin elementos externos</th>
                     <td><input type="" class="form-control" name="insp2" id="insp2"></td>
                   </tr>
                     <th>Posee identificación</th>
                     <td><input type="" class="form-control" name="insp3" id="insp3"></td>
                   <tr>
                     <th>Presenta filtros en buenas condiciones</th>
                     <td><input type="" class="form-control" name="insp4" id="insp4"></td>
                   </tr>
                   <tr>
                     <th>Presenta todas sus partes y accesorios</th>
                     <td><input type="" class="form-control" name="insp5" id="insp5"></td>
                   </tr>
              </table>
          </div>
        </div>
        <br>     
                        <button class="btn btn-info"  id="btn_actualizar_filtro_mapeo">Actualizar</button>
         </div>
</form>
       </div>    <!-- cierre de la card -->
    </div><!--cierre del div 1-->
    <div class="tab-pane tabs-animation fade sjow" id="mediciones" role="tabpanel">
      <div class="card">
        <div class="card-header">
          Mediciones
        </div>
        <div class="card-body">
                  <div class="card">
          <div class="card-header">
            <a data-toggle="collapse" data-target="#collapseOne22"  aria-controls="collapseOne22">
             RESULTADOS – NORMA: UNE-EN ISO 8573-1 
            </a>
          </div>
<form id="formulario2">
<input type="text" value="<?php echo $_smarty_tpl->tpl_vars['id_asignado_aire']->value;?>
" id="id_asignado_aire" name="id_asignado_aire">   
           <div class="card-body collapse collapse show" id="collapseOne22" >
              <table class="table" id="tabla_items">
               
              </table>
           </div>
         </div><!--CARD 2-->
          <br>
            <div class="card"> 
                <div class="card-header">
                   <a data-toggle="collapse" data-target="#collapseOne12"  aria-controls="collapseOne12">
                      Medición Nº 1
                  </a>
                </div>
                <div class="card-body collapse collapse show" id="collapseOne12" >
                    <table id="tabla_mediciones1" class="table">
                 
                    </table>
                </div>  
            </div>
            <br>
             <div class="card">   
                <div class="card-header">
                   <a data-toggle="collapse" data-target="#collapseOne23"  aria-controls="collapseOne23">
                      Medición Nº 2
                  </a>
                </div>
                <div class="card-body collapse collapse " id="collapseOne23" >
                    <table id="tabla_mediciones2" class="table">
                      
                    </table>
                </div>  
            </div>
            <br>
             <div class="card"> 
                <div class="card-header">
                   <a data-toggle="collapse" data-target="#collapseOne34"  aria-controls="collapseOne34">
                      Medición Nº 3
                  </a>
                </div>
                <div class="card-body collapse collapse " id="collapseOne34" >
                    <table id="tabla_mediciones3" class="table">
                      
                    </table>
                </div>  
            </div>
            <br>
             <div class="card"> 
                <div class="card-header">
                   <a data-toggle="collapse" data-target="#collapseOne45"  aria-controls="collapseOne45">
                      Medición temperatura
                  </a>
                </div>
                <div class="card-body collapse collapse " id="collapseOne45" >
                    <table id="tabla_mediciones4" class="table">
                      
                    </table>
                </div>  
            </div>
            <br>
             <button class="btn btn-info"  id="btn_actualizar_filtro_mapeo">Actualizar</button>
</form>
        </div>
      </div>
    </div><!-- cierre del div 2 -->
    <div class="tab-pane tabs-animation fade sjow" id="Requisitos" role="tabpanel">
      <div class="card">
        <div class="card-header">
          Requisitos
        </div>
        <div class="card-body">
            <div class="card"> 
                <div class="card-header">
                   <a data-toggle="collapse" data-target="#collapseOne13"  aria-controls="collapseOne13">
                      Requisitos ISO 8573-1 
                  </a>
                </div>
                <div class="card-body collapse collapse show" id="collapseOne13" >
                    <table class="table" id="tabla_mediciones5"></table>
                </div>  
            </div>
            <br>
            <div class="card"> 
                <div class="card-header">
                   <a data-toggle="collapse" data-target="#collapseOne24"  aria-controls="collapseOne24">
                      Requisitos ISO 8573-1
                  </a>
                </div>
                <div class="card-body collapse collapse show" id="collapseOne24" >
                    <table class="table" id="tabla_mediciones6"></table>
                </div>  
            </div>
        </div>
      </div>
    </div><!-- cierre del div 3 -->
    <div class="tab-pane tabs-animation fade sjow" id="imagenes" role="tabpanel">
      <div class="card">
        <div class="card-header">
          Imagenes
        </div>
        <div class="card-body">
            Cargue de imagenes
        </div>
      </div>
    </div><!-- cierre del div 4 -->
    <br>
 <div class="row">
              <div class="col-sm-12" style="text-align:center;">
                
                <button class="btn btn-warning text-light" id="abrir_informe">Informe</button>
              </div>
            </div>
</div>
<br>
</div>  

</div> 

<?php echo '<script'; ?>
 type="text/javascript" src="design/js/control_mapeo_aire_comprimido.js"><?php echo '</script'; ?>
>


<?php }
}
