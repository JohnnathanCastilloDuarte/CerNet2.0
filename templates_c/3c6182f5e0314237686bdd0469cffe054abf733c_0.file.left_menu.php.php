<?php
/* Smarty version 3.1.34-dev-7, created on 2020-12-07 16:53:06
  from '/home/god/public_html/Pruebas_Desarrollo/CerNet2.0/templates/left_menu.php' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fce5df2dd3ad6_74809741',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3c6182f5e0314237686bdd0469cffe054abf733c' => 
    array (
      0 => '/home/god/public_html/Pruebas_Desarrollo/CerNet2.0/templates/left_menu.php',
      1 => 1606264350,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fce5df2dd3ad6_74809741 (Smarty_Internal_Template $_smarty_tpl) {
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
            <a href="#">
						 <i class="metismenu-icon pe-7s-rocket"></i><i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>Dashboard</a>			
           		<ul>
              <li id="dashboard1">
                <a href="index.php?module=<?php echo $_smarty_tpl->tpl_vars['modulo']->value[0]['Dashboard'];?>
&page=<?php echo $_smarty_tpl->tpl_vars['page']->value[0];?>
"> <i class="metismenu-icon"></i>Dashboard 1</a>
              </li>
              <li id="dashboard2">
                <a href="index.html"> <i class="metismenu-icon"></i>Dashboard 2</a>
              </li>          
              <li id="dashboard3">
                <a href="#"><i class="metismenu-icon"></i>Dashboard 3<i class="metismenu-state-icon pe-7s-angle-down caret-left"></i></a>
                <ul>
                  <li>
                    <a href="dashboards-minimal-1.html"><i class="metismenu-icon"></i>Dashboard 3.1</a>
                  </li>
                  <li>
                    <a href="dashboards-minimal-1.html"><i class="metismenu-icon"></i>Dashboard 3.2</a>
                  </li>              
									</ul>
								</li>
							</ul>
						</li>
						<li id="modulo_admin_persona">
								 <a href="#"><i class="metismenu-icon pe-7s-user"></i>Perfil</a>
							</li>
					<li id="modulo_modulos">
								 <a href="index.php?module=<?php echo $_smarty_tpl->tpl_vars['modulo']->value[4]['Modulos'];?>
&page=<?php echo $_smarty_tpl->tpl_vars['page']->value[0];?>
"><i class="metismenu-icon pe-7s-server"></i>Modulos</a>
							</li>
         
					<div id="modulo_control_cambios">
		
						<li>
							<a  href="#"> <i class="metismenu-icon pe-7s-browser"></i>Control de cambios<i class="metismenu-state-icon pe-7s-angle-down caret-left"></i></a>
							<ul>
								<li>
									<a href="index.php?module=<?php echo $_smarty_tpl->tpl_vars['modulo']->value[2]['ControldeCambios'];?>
&page=<?php echo $_smarty_tpl->tpl_vars['page']->value[0];?>
"><i class="metismenu-icon"></i>Agregar cambio</a>
								</li>
								<li>
									<a href="index.php?module=<?php echo $_smarty_tpl->tpl_vars['modulo']->value[2]['ControldeCambios'];?>
&page=<?php echo $_smarty_tpl->tpl_vars['page']->value[1];?>
"><i class="metismenu-icon"></i>Gestionar cambios</a>
								</li> 
								<li>
									<a href="index.php?module=<?php echo $_smarty_tpl->tpl_vars['modulo']->value[2]['ControldeCambios'];?>
&page=<?php echo $_smarty_tpl->tpl_vars['page']->value[3];?>
"><i class="metismenu-icon"></i>Historial control de cambio</a>
								</li>
							</ul>
						</li>

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
				
					<div id="modulo_persona">
          <li class="app-sidebar__heading">Usuarios</li>
						
          <li>
            <a href="index.php?module=<?php echo $_smarty_tpl->tpl_vars['modulo']->value[0]['Usuario'];?>
&page=<?php echo $_smarty_tpl->tpl_vars['page']->value[0];?>
"><i class="metismenu-icon pe-7s-add-user"></i>Nuevo Usuario</a>
          </li>
          <li>
            <a href="index.php?module=<?php echo $_smarty_tpl->tpl_vars['modulo']->value[0]['Usuario'];?>
&page=<?php echo $_smarty_tpl->tpl_vars['page']->value[1];?>
"><i class="metismenu-icon pe-7s-users "></i>Gestionar Usuarios</a>
          </li>
					<li id="rolyprivilegiopage">
            <a href="index.php?module=<?php echo $_smarty_tpl->tpl_vars['modulo']->value[0]['Usuario'];?>
&page=<?php echo $_smarty_tpl->tpl_vars['page']->value[3];?>
"><i class="metismenu-icon pe-7s-look"></i>Rol y Privilegio</a>
          </li>
					<li>
							<a href="index.php?module=<?php echo $_smarty_tpl->tpl_vars['modulo']->value[0]['Usuario'];?>
&page=<?php echo $_smarty_tpl->tpl_vars['page']->value[4];?>
"><i class="metismenu-icon pe-7s-graph2"></i>Historial usuario</a>
						</li>	
					</div>	
					
					<div id="modulo_empresa">
					<li class="app-sidebar__heading" >Clientes</li>
					<li>
            <a href="index.php?module=<?php echo $_smarty_tpl->tpl_vars['modulo']->value[1]['Cliente'];?>
&page=<?php echo $_smarty_tpl->tpl_vars['page']->value[0];?>
"><i class="metismenu-icon ion-android-contact"></i>Nuevo Cliente</a>
          </li>
          <li>
            <a href="index.php?module=<?php echo $_smarty_tpl->tpl_vars['modulo']->value[1]['Cliente'];?>
&page=<?php echo $_smarty_tpl->tpl_vars['page']->value[1];?>
"><i class="metismenu-icon ion-android-contacts"></i>Gestionar Cliente</a>
          </li>	
					<li>
            <a href="index.php?module=<?php echo $_smarty_tpl->tpl_vars['modulo']->value[1]['Cliente'];?>
&page=<?php echo $_smarty_tpl->tpl_vars['page']->value[3];?>
"><i class="metismenu-icon pe-7s-graph2"></i>Historial Cliente</a>
          </li>	
					</div>
					<div id="modulo_empresa_cliente">
					<li class="app-sidebar__heading" >Mi empresa</li>
					<li>
            <a href="index.php?module=<?php echo $_smarty_tpl->tpl_vars['modulo']->value[1]['Cliente'];?>
&page=<?php echo $_smarty_tpl->tpl_vars['page']->value[2];?>
"><i class="metismenu-icon ion-android-contact"></i>Gestionar empresa</a>
          </li>	
					<li>
            <a href="index.php?module=<?php echo $_smarty_tpl->tpl_vars['modulo']->value[1]['Cliente'];?>
&page=<?php echo $_smarty_tpl->tpl_vars['page']->value[3];?>
"><i class="metismenu-icon pe-7s-graph2"></i>Historial empresa</a>
          </li>
					</div>
				
					<li class="app-sidebar__heading">Item</li>
					<li>
            <a href="index.php?module=<?php echo $_smarty_tpl->tpl_vars['modulo']->value[3]['Item'];?>
&page=<?php echo $_smarty_tpl->tpl_vars['page']->value[0];?>
"><i class="metismenu-icon fa-th-large"></i>Nuevo Item</a>
          </li>
          <li id="gestion_item">
            <a href="index.php?module=<?php echo $_smarty_tpl->tpl_vars['modulo']->value[3]['Item'];?>
&page=<?php echo $_smarty_tpl->tpl_vars['page']->value[1];?>
"><i class="metismenu-icon  pe-7s-plugin"></i>Gestionar Item</a>
          </li>
					<li>
            <a href="index.php?module=<?php echo $_smarty_tpl->tpl_vars['modulo']->value[3]['Item'];?>
&page=<?php echo $_smarty_tpl->tpl_vars['page']->value[3];?>
"><i class="metismenu-icon pe-7s-graph2"></i>Historial Cliente</a>
          </li>	
				
					<li class="app-sidebar__heading">ORDENES DE TRABAJO</li>
					<li>
            <a href="index.php?module=<?php echo $_smarty_tpl->tpl_vars['modulo']->value[5]['OT'];?>
&page=<?php echo $_smarty_tpl->tpl_vars['page']->value[0];?>
"><i class="metismenu-icon pe-7s-paperclip"></i>Nueva OT</a>
          </li>
					<li>
            <a href="index.php?module=<?php echo $_smarty_tpl->tpl_vars['modulo']->value[5]['OT'];?>
&page=<?php echo $_smarty_tpl->tpl_vars['page']->value[1];?>
"><i class="metismenu-icon pe-7s-paperclip"></i>Gestion OT</a>
          </li>
					<li>
            <a href="index.php?module=<?php echo $_smarty_tpl->tpl_vars['modulo']->value[5]['OT'];?>
&page=<?php echo $_smarty_tpl->tpl_vars['page']->value[3];?>
"><i class="metismenu-icon pe-7s-graph2"></i>Historial OT</a>
          </li>
				
					<li class="app-sidebar__heading">SERVICIOS</li>
					<li>
            <a href="index.php?module=<?php echo $_smarty_tpl->tpl_vars['modulo']->value[6]['Servicios'];?>
&page=<?php echo $_smarty_tpl->tpl_vars['page']->value[0];?>
"><i class="metismenu-icon pe-7s-portfolio"></i>Nuevo servicio</a>
          </li>
					
						<li class="app-sidebar__heading">INFORMES</li>
					<li>
            <a href="index.php?module=<?php echo $_smarty_tpl->tpl_vars['modulo']->value[9]['Informes'];?>
&page=<?php echo $_smarty_tpl->tpl_vars['page']->value[0];?>
"><i class="metismenu-icon pe-7s-news-paper"></i>
							Refrigeradores </a>
						<div style="text-align:center">
							<span class="badge badge-pill badge-primary" id="calificacion_refrigerador_c"></span>
							<span class="badge badge-pill badge-info" id="mapeo_refrigerador_c"></span>
						</div>
          </li>
					<li>
            <a href="index.php?module=<?php echo $_smarty_tpl->tpl_vars['modulo']->value[9]['Informes'];?>
&page=<?php echo $_smarty_tpl->tpl_vars['page']->value[2];?>
"><i class="metismenu-icon pe-7s-graph2"></i>Historial Refrigeradores</a>
          </li>
        </ul>
      </div>
    </div>
  </div>      
<!-------------------------------------------------- FIN DE MENU IZQUIERDO ------------------------------------------------------->    <?php }
}
