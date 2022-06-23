<?php
/* Smarty version 3.1.34-dev-7, created on 2022-06-06 23:22:36
  from 'C:\xampp\htdocs\CerNet2.0\templates\biblioteca_informes\inicio_biblioteca.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_629e701c6aac28_27323547',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd3f9b4b31f2fc6d7ad25b74befed117c0d50a5dd' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CerNet2.0\\templates\\biblioteca_informes\\inicio_biblioteca.tpl',
      1 => 1654550554,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_629e701c6aac28_27323547 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="row">
    <div class="col-sm 12">
        <div class="card">
            <div class="card-header">
                Biblioteca de informes
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4">
                        <label>Cliente</label>
                        <input type="text" name="" id="" class="form-control" placeholder="Ingrese el nombre del cliente" id="buscar_cliente">
                    </div>
                    <div class="col-sm-4">
                        <label for="">OT</label>
                        <select class="form-control" id="ot">
                        </select>                        
                    </div>
                    <div class="col-sm-4">
                        <label for="">Tipo de servicio</label>
                        <select name="" id="" class="form-control">

                        </select>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-12" style="text-align: center;">
                        <button class="btn btn-success">Buscar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<hr>

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header"></div>
        </div>
    </div>
</div><?php }
}
