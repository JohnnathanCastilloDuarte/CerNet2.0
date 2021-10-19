<?php
/* Smarty version 3.1.34-dev-7, created on 2021-10-19 18:06:20
  from 'C:\xampp\htdocs\CerNet2.0\templates\left_menu.php' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_616eecfce8e1e5_32516054',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '958d413d8e34f2c9c8fc26cde2b59eb42bc81bc2' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CerNet2.0\\templates\\left_menu.php',
      1 => 1634659577,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_616eecfce8e1e5_32516054 (Smarty_Internal_Template $_smarty_tpl) {
?><!-----------------------------------------------------MENÚ IZQUIERDO--------------------------------------------------------->     


<div class="app-main">
  <div class="app-sidebar sidebar-shadow">
    <div class="app-header__logo">
      <div class="logo-src"></div>
      <div class="header__pane ml-auto">
      <div>
      <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
      <span class="hamburger-box"><span class="hamburger-inner"></span></span>
      </button>
      </div>
      </div>
    </div>
    <div class="app-header__mobile-menu">
    <div>
    <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
    <span class="hamburger-box"><span class="hamburger-inner"></span></span>
    </button>
    </div>
    </div>
    <div class="app-header__menu">
    <span>
    <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
    <span class="btn-icon-wrapper"><i class="fa fa-ellipsis-v fa-w-6"></i></span>
    </button>
    </span>
    </div>  

    <!------------------------------------------------------------------INICIA MENU IZQUIERDO-------------------------------------------------------------------------------->
    <div class="scrollbar-sidebar">
    <div class="app-sidebar__inner">
    <ul class="vertical-nav-menu">
    <li class="app-sidebar__heading">Menú</li>
    <li>
    <a href="index.php">
    <i class="metismenu-icon pe-7s-rocket"></i>Dashboard</a>			
    </li>

    <div id="modulo_1">
    <li>
    <a href="index.php?module=<?php echo $_smarty_tpl->tpl_vars['modulo']->value[0];?>
&page=<?php echo $_smarty_tpl->tpl_vars['page']->value[0];?>
"><i class="metismenu-icon pe-7s-server"></i>Modulos</a>
    </li>                     
    </div>

    <!--<div id="modulo_2">
    <li>
    <a href="#"><i class="metismenu-icon pe-7s-user"></i>Perfil</a>
    </li>
    </div>-->  
    <!--
    <div id="modulo_2">
    <li>
    <a  href="#"> <i class="metismenu-icon pe-7s-browser"></i>Control de cambios<i class="metismenu-state-icon pe-7s-angle-down caret-left"></i></a>
    <ul>
    <li>
    <a href="index.php?module=<?php echo $_smarty_tpl->tpl_vars['modulo']->value[1]['Control_de_cambios'];?>
&page=<?php echo $_smarty_tpl->tpl_vars['page']->value[0];?>
"><i class="metismenu-icon"></i>Agregar cambio</a>
    </li>
    <li>
    <a href="index.php?module=<?php echo $_smarty_tpl->tpl_vars['modulo']->value[1]['Control_de_cambios'];?>
&page=<?php echo $_smarty_tpl->tpl_vars['page']->value[1];?>
"><i class="metismenu-icon"></i>Gestionar cambios</a>
    </li> 
    <li>
    <a href="index.php?module=<?php echo $_smarty_tpl->tpl_vars['modulo']->value[1]['Control_de_cambios'];?>
&page=<?php echo $_smarty_tpl->tpl_vars['page']->value[2];?>
"><i class="metismenu-icon"></i>Historial control de cambio</a>
    </li>
    </ul> 
    </li>
    </div>-->
    <!--   
    <li>
    <a  href="#"> <i class="metismenu-icon pe-7s-network"></i>Control de activos<i class="metismenu-state-icon pe-7s-angle-down caret-left"></i></a>
    <ul>
    <li>
    <a href="index.php?module=<?php echo $_smarty_tpl->tpl_vars['modulo']->value[8]['Activos'];?>
&page=<?php echo $_smarty_tpl->tpl_vars['page']->value[0];?>
"><i class="metismenu-icon"></i>Agregar activo</a>
    </li>
    <li>
    <a href="index.php?module=<?php echo $_smarty_tpl->tpl_vars['modulo']->value[8]['Activos'];?>
&page=<?php echo $_smarty_tpl->tpl_vars['page']->value[1];?>
"><i class="metismenu-icon"></i>Gestionar activos</a>
    </li> 
    <li>
    <a href="index.php?module=<?php echo $_smarty_tpl->tpl_vars['modulo']->value[8]['Activos'];?>
&page=<?php echo $_smarty_tpl->tpl_vars['page']->value[3];?>
"><i class="metismenu-icon"></i>Mantenimiento de activos</a>
    </li>
    <li>
    <a href="index.php?module=<?php echo $_smarty_tpl->tpl_vars['modulo']->value[8]['Activos'];?>
&page=<?php echo $_smarty_tpl->tpl_vars['page']->value[3];?>
"><i class="metismenu-icon"></i>Historico de activos</a>
    </li>								
    </ul>
    </li>													
    </div>
    -->

    <div id="modulo_3">
    <li><a href="#" class="text-default"><i class="metismenu-icon pe-7s-user"></i>Usuarios<i class="metismenu-state-icon pe-7s-angle-down caret-left"></i></a>
    <ul>						
    <li>
    <a href="index.php?module=<?php echo $_smarty_tpl->tpl_vars['modulo']->value[1];?>
&page=<?php echo $_smarty_tpl->tpl_vars['page']->value[0];?>
"><i class="metismenu-icon pe-7s-add-user"></i>Nuevo Usuario</a>
    </li>
    <li>
    <a href="index.php?module=<?php echo $_smarty_tpl->tpl_vars['modulo']->value[1];?>
&page=<?php echo $_smarty_tpl->tpl_vars['page']->value[1];?>
"><i class="metismenu-icon pe-7s-users "></i>Gestionar Usuarios</a>
    </li>
    <!--
    <li>
    <a href="index.php?module=<?php echo $_smarty_tpl->tpl_vars['modulo']->value[1];?>
&page=<?php echo $_smarty_tpl->tpl_vars['page']->value[3];?>
"><i class="metismenu-icon pe-7s-graph2"></i>Historial usuario</a>
    </li>-->
    <li id="rolyprivilegiopage">
    <a href="index.php?module=<?php echo $_smarty_tpl->tpl_vars['modulo']->value[1];?>
&page=<?php echo $_smarty_tpl->tpl_vars['page']->value[4];?>
"><i class="metismenu-icon pe-7s-look"></i>Rol y Privilegio</a>
    </li>
    </ul>
    </li> 
    </div>


    <div id="modulo_3_externo">
    <li><a href="#" class="text-default"><i class="metismenu-icon pe-7s-user"></i>Mi perfil<i class="metismenu-state-icon pe-7s-angle-down caret-left"></i></a>
    <ul>						

    <li>
    <a href="index.php?module=<?php echo $_smarty_tpl->tpl_vars['modulo']->value[2]['Usuario'];?>
&page=<?php echo $_smarty_tpl->tpl_vars['page']->value[5];?>
&user=<?php echo $_smarty_tpl->tpl_vars['mi_id']->value;?>
"><i class="metismenu-icon pe-7s-users "></i>Gestionar datos</a>
    </li>
    </ul>
    </li> 
    </div>	




    <div id="modulo_4">
    <li><a href="#"><i class="metismenu-icon pe-7s-id"></i>Clientes<i class="metismenu-state-icon pe-7s-angle-down caret-left"></i></a>
    <ul>
    <li>
    <a href="index.php?module=<?php echo $_smarty_tpl->tpl_vars['modulo']->value[4];?>
&page=<?php echo $_smarty_tpl->tpl_vars['page']->value[0];?>
"><i class="metismenu-icon ion-android-contact"></i>Nuevo Cliente</a>
    </li>
    <li>
    <a href="index.php?module=<?php echo $_smarty_tpl->tpl_vars['modulo']->value[4];?>
&page=<?php echo $_smarty_tpl->tpl_vars['page']->value[1];?>
"><i class="metismenu-icon ion-android-contacts"></i>Gestionar Cliente</a>
    </li>	
    <li>
    <a href="index.php?module=<?php echo $_smarty_tpl->tpl_vars['modulo']->value[4];?>
&page=<?php echo $_smarty_tpl->tpl_vars['page']->value[3];?>
"><i class="metismenu-icon pe-7s-graph2"></i>Historial Cliente</a>
    </li>
    </ul>
    </li>
    </div>



    <div id="modulo_4_usuario_externo">
    <li><a href="#"><i class="metismenu-icon pe-7s-star"></i>Mi empresa<i class="metismenu-state-icon pe-7s-angle-down caret-left"></i></a>
    <ul>
    <li>
    <a href="index.php?module=<?php echo $_smarty_tpl->tpl_vars['modulo']->value[3]['Clientes'];?>
&page=<?php echo $_smarty_tpl->tpl_vars['page']->value[1];?>
"><i class="metismenu-icon ion-android-contact"></i>Gestionar empresa</a>
    </li>	
    <li>
    <a href="index.php?module=<?php echo $_smarty_tpl->tpl_vars['modulo']->value[3]['Clientes'];?>
&page=<?php echo $_smarty_tpl->tpl_vars['page']->value[3];?>
"><i class="metismenu-icon pe-7s-graph2"></i>Historial empresa</a>
    </li>
    </ul>
    </li> 
    </div>






    <div id="modulo_5">
    <li><a href="#"><i class="metismenu-icon pe-7s-keypad"></i>Item<i class="metismenu-state-icon pe-7s-angle-down caret-left"></i></a>
    <ul>
    <li>
    <a href="index.php?module=<?php echo $_smarty_tpl->tpl_vars['modulo']->value[4]['Item'];?>
&page=<?php echo $_smarty_tpl->tpl_vars['page']->value[0];?>
"><i class="metismenu-icon fa-th-large"></i>Nuevo Item</a>
    </li>
    <li id="gestion_item">
    <a href="index.php?module=<?php echo $_smarty_tpl->tpl_vars['modulo']->value[4]['Item'];?>
&page=<?php echo $_smarty_tpl->tpl_vars['page']->value[1];?>
"><i class="metismenu-icon  pe-7s-plugin"></i>Gestionar Item</a>
    </li>
    <li>
    <a href="index.php?module=<?php echo $_smarty_tpl->tpl_vars['modulo']->value[4]['Item'];?>
&page=<?php echo $_smarty_tpl->tpl_vars['page']->value[3];?>
"><i class="metismenu-icon pe-7s-graph2"></i>Historial Item</a>
    </li>	
    </ul>
    </li> 
    </div>




    <div id="modulo_6">    
    <li><a href="#"><i class="metismenu-icon pe-7s-global"></i>Ordenes de trabajo<i class="metismenu-state-icon pe-7s-angle-down caret-left"></i></a>
    <ul>
    <li>
    <a href="index.php?module=<?php echo $_smarty_tpl->tpl_vars['modulo']->value[5];?>
&page=<?php echo $_smarty_tpl->tpl_vars['page']->value[0];?>
"><i class="metismenu-icon pe-7s-paperclip"></i>Nueva OT</a>
    </li>
    <li>
    <a href="index.php?module=<?php echo $_smarty_tpl->tpl_vars['modulo']->value[5];?>
&page=<?php echo $_smarty_tpl->tpl_vars['page']->value[1];?>
"><i class="metismenu-icon pe-7s-paperclip"></i>Gestion OT</a>
    </li>
    <li>
    <a href="index.php?module=<?php echo $_smarty_tpl->tpl_vars['modulo']->value[5];?>
&page=<?php echo $_smarty_tpl->tpl_vars['page']->value[3];?>
"><i class="metismenu-icon pe-7s-graph2"></i>Historial OT</a>
    </li>
    </ul>
    </li>
    </div>



    <div id="modulo_7">
    <li><a href="#"><i class="metismenu-icon pe-7s-config"></i>Servicios<i class="metismenu-state-icon pe-7s-angle-down caret-left"></i></a>
    <ul>
    <li>
    <a href="index.php?module=<?php echo $_smarty_tpl->tpl_vars['modulo']->value[6]['Servicios'];?>
&page=<?php echo $_smarty_tpl->tpl_vars['page']->value[0];?>
"><i class="metismenu-icon pe-7s-portfolio"></i>Nuevo servicio</a>
    </li>
    </ul>
    </li>
    </div>



    <div id="modulo_8">
    <li><a href="#"><i class="metismenu-icon pe-7s-copy-file"></i>Informes<i class="metismenu-state-icon pe-7s-angle-down caret-left"></i></a>
    <ul>
    <li>
    <a href="index.php?module=<?php echo $_smarty_tpl->tpl_vars['modulo']->value[6];?>
&page=<?php echo $_smarty_tpl->tpl_vars['page']->value[0];?>
"><i class="metismenu-icon pe-7s-news-paper"></i>Refrigeradores</a>
    </li>
    <!--
    <li>
    <a href="index.php?module=<?php echo $_smarty_tpl->tpl_vars['modulo']->value[6];?>
&page=<?php echo $_smarty_tpl->tpl_vars['page']->value[2];?>
"><i class="metismenu-icon pe-7s-graph2"></i>Historial Refrigeradores</a>
    </li>-->
    <li>
    <a href="index.php?module=<?php echo $_smarty_tpl->tpl_vars['modulo']->value[6];?>
&page=<?php echo $_smarty_tpl->tpl_vars['page']->value[3];?>
"><i class="metismenu-icon pe-7s-news-paper"></i>UltraFreezer</a>
    </li>

    <li>
    <a href="index.php?module=<?php echo $_smarty_tpl->tpl_vars['modulo']->value[6];?>
&page=<?php echo $_smarty_tpl->tpl_vars['page']->value[4];?>
"><i class="metismenu-icon pe-7s-news-paper"></i>Freezer</a>
    </li>

    <li>
    <a href="index.php?module=<?php echo $_smarty_tpl->tpl_vars['modulo']->value[6];?>
&page=<?php echo $_smarty_tpl->tpl_vars['page']->value[5];?>
"><i class="metismenu-icon pe-7s-news-paper"></i>Estufa e incubadora</a>
    </li>

    <li>
    <a href="index.php?module=<?php echo $_smarty_tpl->tpl_vars['modulo']->value[6];?>
&page=<?php echo $_smarty_tpl->tpl_vars['page']->value[6];?>
"><i class="metismenu-icon pe-7s-news-paper"></i>Automoviles</a>
    </li>

    <li>
    <a href="index.php?module=<?php echo $_smarty_tpl->tpl_vars['modulo']->value[6];?>
&page=<?php echo $_smarty_tpl->tpl_vars['page']->value[7];?>
"><i class="metismenu-icon pe-7s-news-paper"></i>Filtros</a>
    </li>


    </ul>
    </li>
    </div>

    <div id="modulo_9">
    <li><a href="#"><i class="metismenu-icon pe-7s-box1"></i>Documentación<i class="metismenu-state-icon pe-7s-angle-down caret-left"></i></a>
    <ul>
    <li>
    <a href="index.php?module=<?php echo $_smarty_tpl->tpl_vars['modulo']->value[2];?>
&page=<?php echo $_smarty_tpl->tpl_vars['page']->value[0];?>
">Gestion documental</a>
      <a href="index.php?module=<?php echo $_smarty_tpl->tpl_vars['modulo']->value[2];?>
&page=<?php echo $_smarty_tpl->tpl_vars['page']->value[1];?>
">Revisión documental</a>
    </li>
    </ul>  
    </li> 
    </div>
      
    <div id="modulo_10">
      <li><a href="#"><i class="metismenu-icon pe-7s-box1"></i>Cargos<i class="metismenu-state-icon pe-7s-angle-down caret-left"></i></a>
        <ul>
          <li>
            <a href="index.php?module=<?php echo $_smarty_tpl->tpl_vars['modulo']->value[3];?>
&page=<?php echo $_smarty_tpl->tpl_vars['page']->value[0];?>
">Gestionar cargo</a>
          </li>
        </ul>  
      </li> 
    </div>
      
    </div>
    </div>
  </div> 
 
   
<!-------------------------------------------------- FIN DE MENU IZQUIERDO ------------------------------------------------------->    <?php }
}
