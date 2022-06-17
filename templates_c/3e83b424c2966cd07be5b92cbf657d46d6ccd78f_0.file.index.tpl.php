<?php
/* Smarty version 3.1.34-dev-7, created on 2022-03-03 21:25:44
  from 'C:\xampp\htdocs\CerNet2.0\templates\Calificacion\DQ\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_622124484e90d2_98724266',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3e83b424c2966cd07be5b92cbf657d46d6ccd78f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CerNet2.0\\templates\\Calificacion\\DQ\\index.tpl',
      1 => 1646270708,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_622124484e90d2_98724266 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                Informe de calificación DQ    
            </div>
        </div>
    </div>
</div>
<hr>
<ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
    <li class="nav-item">
        <a role="tab" class="nav-link active" id="tab-0" data-toggle="tab" href="#info_general">
            <span>Información general</span>
        </a>
    </li>
</ul>

<div class="tab-content">
    <div class="tab-pane tabs-animation fade show active" id="info_general" role="tabpanel">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <label>Funcion del item:</label><br>
                                <textarea class="form-control" id="funcion_dq"></textarea>
                            </div>
                            <div class="col-sm-6">
                                <label>Cuenta con planos</label>
                                <select class="form-control" id="anexo_alcance" style="width: 12%;">
                                    <option value="0">No</option>
                                    <option valule="1">Si</option>
                                </select>
                                <br>
                                <input type="text" id="anexo_leyenda" class="form-control" placeholder="Ingresa el anexo">
                            </div>
                        </div>
                        <br>
                        <div class="row" style="text-align:center;">
                            <div class="col-sm-12">
                                <button class="btn btn-primary" id="btn_actualizar_datos_1">Actualizar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <input type="hidden" id="id_datos_1"> 
                        <div class="row">
                            <div class="col-sm-5" style="text-align:center;">
                                <label>Nombre del equipo</label>
                                <input type="text" id="nombre_del_equipo_dq" class="form-control"><br>
                                <label>Descripción</label>
                                <textarea class="form-control" id="descripcion_dq_sistema"></textarea>
                                <br>
                                <button class="btn btn-primary" id="btn_creador_sistema">Crear sistema</button>
                            </div>
                            <div class="col-sm-7" style="text-align: center;">
                                <table class="table">
                                    <thead>
                                        <th>Nombre equipo</th>
                                        <th>Eliminar</th>
                                    </thead>
                                    <tbody id="sistemas_de_apoyo_asignado"></tbody>
                                </table>        
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table" style="text-align:center;">
                                    <thead>
                                        <th style="width: 41%;">Nombre</th>
                                        <th style="width: 30%;">Descripión</th>
                                        <th>Opciones</th>
                                    </thead>
                                    <tbody id="listar_sistemas"></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div> <!--Cierre de la primera pestaña-->
    
    

</div><!--Cierre del div content-->

<?php echo '<script'; ?>
 src="design/js/controlador_dq.js"><?php echo '</script'; ?>
>
<?php }
}
