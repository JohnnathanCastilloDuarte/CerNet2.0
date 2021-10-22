<?php
/* Smarty version 3.1.34-dev-7, created on 2021-10-22 23:59:30
  from 'C:\xampp\htdocs\CerNet2.0\templates\header.php' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_61733442245151_43748006',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ffba896e21398cf47a641a98b731b5ddc0ba9f3b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CerNet2.0\\templates\\header.php',
      1 => 1634939967,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61733442245151_43748006 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="app-container app-theme-white body-tabs-shadow fixed-header fixed-sidebar">
    <div class="app-header header-shadow">
        <div class="app-header__logo">
            <div class="logo-src"></div>
            <div class="header__pane ml-auto">
                <div>
                    <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
        </div>
        <div class="app-header__mobile-menu">
            <div>
                <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
        <div class="app-header__menu">
            <span>
                <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                    <span class="btn-icon-wrapper">
                        <i class="fa fa-ellipsis-v fa-w-6"></i>
                    </span>
                </button>
            </span>
        </div>    
        <div class="app-header__content">
            <div class="app-header-left">
                <!------------------------------------------------------------------------- BUSCADOR --------------------------------------------------------------------------------------->
                <div class="search-wrapper">
                 <div class="input-holder">
                     <input type="text" class="search-input" placeholder="Digita para buscar">
                     <button class="search-icon" id="buscar_general"><span></span></button>
                 </div>
                 <button class="close"></button>
             </div>

             <!---------------------------------------------------------------------- FIN DE BUSCADOR -------------------------------------------------------------------------------->     
             <!------------------------------------------------------------------------- MEGA MENÚ --------------------------------------------------------------------------------------->                  
             <ul class="header-megamenu nav">              
                <li class="nav-item">
                    <a href="javascript:void(0);" data-placement="bottom" rel="popover-focus" data-offset="300" data-toggle="popover-custom" class="nav-link">
                        <i class="nav-link-icon pe-7s-gift"> </i>
                        Mega Menú
                        <i class="fa fa-angle-down ml-2 opacity-5"></i>
                    </a>
                    <div class="rm-max-width">
                        <div class="d-none popover-custom-content">
                            <div class="dropdown-mega-menu">
                                <div class="grid-menu grid-menu-3col">
                                    <div class="no-gutters row">
                                        <div class="col-sm-6 col-xl-4">
                                            <ul class="nav flex-column">
                                                <li class="nav-item-header nav-item">
                                                    Overview
                                                </li>
                                                <li class="nav-item">
                                                    <a href="javascript:void(0);" class="nav-link">
                                                        <i class="nav-link-icon lnr-inbox">
                                                        </i>
                                                        <span>
                                                            Contacts
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="javascript:void(0);" class="nav-link">
                                                        <i class="nav-link-icon lnr-book">
                                                        </i>
                                                        <span>
                                                            Incidents
                                                        </span>
                                                        <div class="ml-auto badge badge-pill badge-danger">5
                                                        </div>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="javascript:void(0);" class="nav-link">
                                                        <i class="nav-link-icon lnr-picture">
                                                        </i>
                                                        <span>
                                                            Companies
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a disabled="" href="javascript:void(0);" class="nav-link disabled">
                                                        <i class="nav-link-icon lnr-file-empty">
                                                        </i>
                                                        <span>
                                                            Dashboards
                                                        </span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-6 col-xl-4">
                                            <ul class="nav flex-column">
                                                <li class="nav-item-header nav-item">
                                                    Favourites
                                                </li>
                                                <li class="nav-item">
                                                    <a href="javascript:void(0);" class="nav-link">
                                                        Reports Conversions
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="javascript:void(0);" class="nav-link">
                                                        Quick Start
                                                        <div class="ml-auto badge badge-success">New</div>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="javascript:void(0);" class="nav-link">Users &amp; Groups</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="javascript:void(0);" class="nav-link">Proprieties</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-6 col-xl-4">
                                            <ul class="nav flex-column">
                                                <li class="nav-item-header nav-item">Sales &amp; Marketing
                                                </li>
                                                <li class="nav-item">
                                                    <a href="javascript:void(0);" class="nav-link">Queues
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="javascript:void(0);" class="nav-link">Resource Groups
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="javascript:void(0);" class="nav-link">Goal Metrics
                                                        <div class="ml-auto badge badge-warning">3
                                                        </div>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="javascript:void(0);" class="nav-link">Campaigns
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
            <!------------------------------------------------------------------------- FIN DE MEGA MENU --------------------------------------------------------------------------------------->                         
        </div>
        <!------------------------------------------------------------------------- NOTIFICACIONES --------------------------------------------------------------------------------------->               
        <div class="app-header-right">
            <div class="header-dots">
                <div class="dropdown">
                    <button type="button" aria-haspopup="true" aria-expanded="false" data-toggle="dropdown" class="p-0 mr-2 btn btn-link">
                        <span class="icon-wrapper icon-wrapper-alt rounded-circle">
                            <span class="icon-wrapper-bg bg-danger"></span>
                            <i class="icon text-danger icon-anim-pulse ion-android-notifications"></i>
                            <span class="badge badge-dot badge-dot-sm badge-danger"></span>
                        </span>
                    </button>
                    <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu rm-pointers dropdown-menu dropdown-menu-right" style="width:800px;">
                        <div class="dropdown-menu-header mb-0">
                            <div class="dropdown-menu-header-inner bg-deep-blue">
                                <div class="menu-header-image opacity-1" ></div>
                                <div class="menu-header-content text-dark">
                                    <h5 class="menu-header-title">Notificaciones</h5>
                                    <h6 class="menu-header-subtitle">Tienes <b id="cantidad_aprobaciones">0</b> por aprobar</h6>
                                </div>
                            </div>
                        </div>
                        <ul class="tabs-animated-shadow tabs-animated nav nav-justified tabs-shadow-bordered p-3">
                            <li class="nav-item" id="aprobacion_informes">
                                <a role="tab" class="nav-link" data-toggle="tab" href="#tab-messages-header" id="clickmeame">
                                    <span>Informes</span>
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab-messages-header" role="tabpanel">
                                <div class="scroll-area-sm">
                                    <div class="scrollbar-container">
                                        <div class="p-3">
                                            <div class="notifications-box" style="text-align:center;">
                                             <div class="row">
                                              <div class="col-sm-12 p-1" style="text-align:center;">
                                                <button class="btn btn-primary" id="reload_aprobaciones">
                                                 <i class="fas fa-sync"> Recargar</i>	
                                             </button>
                                         </div>
                                     </div>
                                     <table class="table" >
                                      <thead>
                                       <tr>
                                        <th colspan="2">Informe</th>
                                        <th>Observación</th>
                                        <th>Estado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody id="resultados_de_aprobaciones">
                                   <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['aprobaciones']->value, 'aprobacion');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['aprobacion']->value) {
?>
                                   <tr>
                                       <form id="form_5" method="POST">

                                         <input type='hidden' value='<?php echo $_smarty_tpl->tpl_vars['mi_id']->value;?>
' name='id_validaa' id="id_valida">
                                         <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['aprobacion']->value['id_aprobado'];?>
" name="id_oculto_aprobacion">
                                         <td><button value="<?php echo $_smarty_tpl->tpl_vars['aprobacion']->value['id_aprobado'];?>
" id="ver_pdf_aprobaciones" class="mb-2 mr-2  btn-shadow btn-outline-2x btn btn-outline-danger"><img src='design/images/pdf.png' width='50px'/></button></td>
                                         <td><?php echo $_smarty_tpl->tpl_vars['aprobacion']->value['nombre_informe'];?>
</td>
                                         <td><textarea name="observacion_aprobacion" class="form-control"><?php echo $_smarty_tpl->tpl_vars['aprobacion']->value['observaciones'];?>
</textarea></td>
                                         <td><select class="form-control" name="estado_aprobacion">
                                          <option value="2"><span class="text-success">Aprobar</span></option>
                                          <option value="3"><span class="text-danger">Corregir</span></option>
                                      </select></td>
                                      <td><button type="submit" class="mb-2 mr-2  btn-shadow btn-outline-2x btn btn-outline-info">Aceptar</button></td>
                                  </form>
                              </tr>	
                              <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                          </tbody>
                      </table>                                               
                  </div>
              </div>
          </div>
      </div>
  </div>
  <div class="tab-pane" id="tab-events-header" role="tabpanel">
    <div class="scroll-area-sm">
        <div class="scrollbar-container">
            <div class="p-3">
                <div class="vertical-without-time vertical-timeline vertical-timeline--animate vertical-timeline--one-column">
                    <div class="vertical-timeline-item vertical-timeline-element">
                        <div><span class="vertical-timeline-element-icon bounce-in"><i class="badge badge-dot badge-dot-xl badge-success"> </i></span>
                            <div class="vertical-timeline-element-content bounce-in"><h4 class="timeline-title">All Hands Meeting</h4>
                                <p>Lorem ipsum dolor sic amet, today at <a href="javascript:void(0);">12:00 PM</a></p><span class="vertical-timeline-element-date"></span></div>
                            </div>
                        </div>
                        <div class="vertical-timeline-item vertical-timeline-element">
                            <div><span class="vertical-timeline-element-icon bounce-in"><i class="badge badge-dot badge-dot-xl badge-warning"> </i></span>
                                <div class="vertical-timeline-element-content bounce-in"><p>Another meeting today, at <b class="text-danger">12:00 PM</b></p>
                                    <p>Yet another one, at <span class="text-success">15:00 PM</span></p><span class="vertical-timeline-element-date"></span></div>
                                </div>
                            </div>
                            <div class="vertical-timeline-item vertical-timeline-element">
                                <div><span class="vertical-timeline-element-icon bounce-in"><i class="badge badge-dot badge-dot-xl badge-danger"> </i></span>
                                    <div class="vertical-timeline-element-content bounce-in"><h4 class="timeline-title">Build the production release</h4>
                                        <p>Lorem ipsum dolor sit amit,consectetur eiusmdd tempor incididunt ut labore et dolore magna elit enim at minim veniam quis nostrud</p><span
                                        class="vertical-timeline-element-date"></span></div>
                                    </div>
                                </div>
                                <div class="vertical-timeline-item vertical-timeline-element">
                                    <div><span class="vertical-timeline-element-icon bounce-in"><i class="badge badge-dot badge-dot-xl badge-primary"> </i></span>
                                        <div class="vertical-timeline-element-content bounce-in"><h4 class="timeline-title text-success">Something not important</h4>
                                            <p>Lorem ipsum dolor sit amit,consectetur elit enim at minim veniam quis nostrud</p><span class="vertical-timeline-element-date"></span></div>
                                        </div>
                                    </div>
                                    <div class="vertical-timeline-item vertical-timeline-element">
                                        <div><span class="vertical-timeline-element-icon bounce-in"><i class="badge badge-dot badge-dot-xl badge-success"> </i></span>
                                            <div class="vertical-timeline-element-content bounce-in"><h4 class="timeline-title">All Hands Meeting</h4>
                                                <p>Lorem ipsum dolor sic amet, today at <a href="javascript:void(0);">12:00 PM</a></p><span class="vertical-timeline-element-date"></span></div>
                                            </div>
                                        </div>
                                        <div class="vertical-timeline-item vertical-timeline-element">
                                            <div><span class="vertical-timeline-element-icon bounce-in"><i class="badge badge-dot badge-dot-xl badge-warning"> </i></span>
                                                <div class="vertical-timeline-element-content bounce-in"><p>Another meeting today, at <b class="text-danger">12:00 PM</b></p>
                                                    <p>Yet another one, at <span class="text-success">15:00 PM</span></p><span class="vertical-timeline-element-date"></span></div>
                                                </div>
                                            </div>
                                            <div class="vertical-timeline-item vertical-timeline-element">
                                                <div><span class="vertical-timeline-element-icon bounce-in"><i class="badge badge-dot badge-dot-xl badge-danger"> </i></span>
                                                    <div class="vertical-timeline-element-content bounce-in"><h4 class="timeline-title">Build the production release</h4>
                                                        <p>Lorem ipsum dolor sit amit,consectetur eiusmdd tempor incididunt ut labore et dolore magna elit enim at minim veniam quis nostrud</p><span
                                                        class="vertical-timeline-element-date"></span></div>
                                                    </div>
                                                </div>
                                                <div class="vertical-timeline-item vertical-timeline-element">
                                                    <div><span class="vertical-timeline-element-icon bounce-in"><i class="badge badge-dot badge-dot-xl badge-primary"> </i></span>
                                                        <div class="vertical-timeline-element-content bounce-in"><h4 class="timeline-title text-success">Something not important</h4>
                                                            <p>Lorem ipsum dolor sit amit,consectetur elit enim at minim veniam quis nostrud</p><span class="vertical-timeline-element-date"></span></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab-errors-header" role="tabpanel">
                                    <div class="scroll-area-sm">
                                        <div class="scrollbar-container">
                                            <div class="no-results pt-3 pb-0">
                                                <div class="swal2-icon swal2-success swal2-animate-success-icon">
                                                    <div class="swal2-success-circular-line-left" style="background-color: rgb(255, 255, 255);"></div>
                                                    <span class="swal2-success-line-tip"></span>
                                                    <span class="swal2-success-line-long"></span>
                                                    <div class="swal2-success-ring"></div>
                                                    <div class="swal2-success-fix" style="background-color: rgb(255, 255, 255);"></div>
                                                    <div class="swal2-success-circular-line-right" style="background-color: rgb(255, 255, 255);"></div>
                                                </div>
                                                <div class="results-subtitle">All caught up!</div>
                                                <div class="results-title">There are no system errors!</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!------------------------------------------------------------------------- FIN DE NOTIFICACIONES --------------------------------------------------------------------------------------->
                    <!------------------------------------------------------------------------- ACTIVIDAD --------------------------------------------------------------------------------------->       
                    <div class="dropdown">
                        <button type="button" aria-haspopup="true" data-toggle="dropdown" aria-expanded="false" class="p-0 btn btn-link dd-chart-btn">
                            <span class="icon-wrapper icon-wrapper-alt rounded-circle">
                                <span class="icon-wrapper-bg bg-success"></span>
                                <i class="icon text-success ion-ios-analytics"></i>
                            </span>
                        </button>
                        <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu-xl rm-pointers dropdown-menu dropdown-menu-right">
                            <div class="dropdown-menu-header">
                                <div class="dropdown-menu-header-inner bg-premium-dark">
                                    <div class="menu-header-image" style="background-image: url('assets/images/dropdown-header/abstract4.jpg');"></div>
                                    <div class="menu-header-content text-white">
                                        <h5 class="menu-header-title">Users Online
                                        </h5>
                                        <h6 class="menu-header-subtitle">Recent Account Activity Overview
                                        </h6>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-chart">
                                <div class="widget-chart-content">
                                    <div class="icon-wrapper rounded-circle">
                                        <div class="icon-wrapper-bg opacity-9 bg-focus">
                                        </div>
                                        <i class="lnr-users text-white">
                                        </i>
                                    </div>
                                    <div class="widget-numbers">
                                        <span>344k</span>
                                    </div>
                                    <div class="widget-subheading pt-2">
                                        Profile views since last login
                                    </div>
                                    <div class="widget-description text-danger">
                                        <span class="pr-1">
                                            <span>176%</span>
                                        </span>
                                        <i class="fa fa-arrow-left"></i>
                                    </div>
                                </div>
                                <div class="widget-chart-wrapper">
                                    <div id="dashboard-sparkline-carousel-3-pop"></div>
                                </div>
                            </div>
                            <ul class="nav flex-column">
                                <li class="nav-item-divider mt-0 nav-item">
                                </li>
                                <li class="nav-item-btn text-center nav-item">
                                    <button class="btn-shine btn-wide btn-pill btn btn-warning btn-sm">
                                        <i class="fa fa-cog fa-spin mr-2">
                                        </i>
                                        View Details
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!------------------------------------------------------------------------- DATOS DE USUARIO LOGEADO --------------------------------------------------------------------------------------->                      
                <div class="header-btn-lg pr-0">
                    <div class="widget-content p-0">
                        <div class="widget-content-wrapper">
                            <div class="widget-content-left">
                                <div class="btn-group">
                                    <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">

                                       <?php if (isset($_smarty_tpl->tpl_vars['imagen_usuario']->value)) {?>
                                       <?php $_smarty_tpl->_assignInScope('imagen', "templates/usuario/".((string)$_smarty_tpl->tpl_vars['imagen_usuario']->value));?>
                                       <?php } else { ?>
                                       <?php $_smarty_tpl->_assignInScope('imagen', 'design/assets/images/user.png');?>
                                       <?php }?> 

                                        <img width="42" class="rounded-circle" src="<?php echo $_smarty_tpl->tpl_vars['imagen']->value;?>
" alt=""> 
                                      
                                        <i class="fa fa-angle-down ml-2 opacity-8"></i>
                                    </a>
                                    <div tabindex="-1" role="menu" aria-hidden="true" class="rm-pointers dropdown-menu-lg dropdown-menu dropdown-menu-right">
                                        <div class="dropdown-menu-header">
                                            <div class="dropdown-menu-header-inner bg-info">
                                                <div class="menu-header-image opacity-2"></div>
                                                <div class="menu-header-content text-left">
                                                    <div class="widget-content p-0">
                                                        <div class="widget-content-wrapper">
                                                            <div class="widget-content-left mr-3">

                                                             <a title="Mi Cuenta" href="index.php?module=<?php echo $_smarty_tpl->tpl_vars['modulo']->value[1];?>
&page=<?php echo $_smarty_tpl->tpl_vars['page']->value[2];?>
&user=<?php echo $_smarty_tpl->tpl_vars['mi_id']->value;?>
">
                                                                
                                                                <img width="42" class="rounded-circle" src="<?php echo $_smarty_tpl->tpl_vars['imagen']->value;?>
" alt=""> 

                                                            </a>	
                                                        </div>
                                                        <div class="widget-content-left">
                                                            <div class="widget-heading"><?php echo $_smarty_tpl->tpl_vars['mi_nombre']->value;?>

                                                            </div>
                                                            <div class="widget-subheading opacity-8"><?php echo $_smarty_tpl->tpl_vars['mi_cargo']->value;?>

                                                            </div>
                                                        </div>
                                                        <div class="widget-content-right mr-2">
                                                            <a href='#' class="btn-pill btn-shadow btn-shine btn btn-focus" id="btn_cerrar_sesion">Salir
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="scroll-area-xs" style="height:100px;">
                                        <div class="scrollbar-container ps">
                                            <ul class="nav flex-column">
                                                <li class="nav-item-header nav-item">Actividades
                                                </li>
                                                <li class="nav-item">
                                                    <a href="javascript:void(0);" class="nav-link">Chat
                                                        <div class="ml-auto badge badge-pill badge-info">
                                                        </div>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="javascript:void(0);" class="nav-link">Cambiar Contraseña
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <ul class="nav flex-column">
                                        <li class="nav-item-divider mb-0 nav-item"></li>
                                    </ul>

                                    <ul class="nav flex-column">
                                        <li class="nav-item-divider nav-item">
                                        </li>
                                        <li class="nav-item-btn text-center nav-item">
                                            <button class="btn-wide btn btn-primary btn-sm">
                                                Open Messages
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content-left  ml-3 header-user-info">
                            <div class="widget-heading">																
                               <?php echo $_smarty_tpl->tpl_vars['mi_nombre']->value;?>

                           </div>
                           <div class="widget-subheading">
                             <?php echo $_smarty_tpl->tpl_vars['mi_cargo']->value;?>

                         </div>
                     </div>
                 </div>
             </div>
         </div>
         <!------------------------------------------------------------------------- FIN DE DATOS DE USUARIO LOGEADO --------------------------------------------------------------------------------------->               
     </div>
 </div>
</div>


<?php echo '<script'; ?>
>
  $("#reload_aprobaciones").click(function(){
     location.reload();
 });
<?php echo '</script'; ?>
>
<?php }
}
