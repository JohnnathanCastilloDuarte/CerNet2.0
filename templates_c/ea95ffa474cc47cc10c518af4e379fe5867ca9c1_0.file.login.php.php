<?php
/* Smarty version 3.1.34-dev-7, created on 2020-07-03 17:46:26
  from '/var/www/html/Pruebas_Desarrollo/templates/login.php' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5eff99225ff908_00154210',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ea95ffa474cc47cc10c518af4e379fe5867ca9c1' => 
    array (
      0 => '/var/www/html/Pruebas_Desarrollo/templates/login.php',
      1 => 1593809181,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5eff99225ff908_00154210 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="app-container app-theme-white body-tabs-shadow">
  <div class="app-container">
    <div class="h-100">
        <div class="h-100 no-gutters row">
            <div class="d-none d-lg-block col-lg-4">
                <div class="slider-light">
                    <div class="slick-slider">
                        <div>
                            <div class="position-relative h-100 d-flex justify-content-center align-items-center bg-plum-plate" tabindex="-1">
                                <div class="slide-img-bg" style="background-image: url('assets/images/originals/city.jpg');"></div>
                                <div class="slider-content"></div>
                            </div>
                        </div>
                        <div>
                            <div class="position-relative h-100 d-flex justify-content-center align-items-center bg-premium-dark" tabindex="-1">
                                <div class="slide-img-bg" style="background-image: url('assets/images/originals/citynights.jpg');"></div>
                                <div class="slider-content"></div>
                            </div>
                        </div>
                        <div>
                            <div class="position-relative h-100 d-flex justify-content-center align-items-center bg-sunny-morning" tabindex="-1">
                                <div class="slide-img-bg" style="background-image: url('assets/images/originals/citydark.jpg');"></div>
                                <div class="slider-content"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="h-100 d-flex bg-white justify-content-center align-items-center col-md-12 col-lg-8">
                <div class="mx-auto app-login-box col-sm-12 col-md-10 col-lg-9">
                    <div class="app-logo"></div>
                    <h4 class="mb-0">
                        <span class="d-block">Bienvenido</span>
                        <span>Por favor inicia sesión, para poder continuar</span></h4>
                        <div class="col-sm-12"><?php echo $_smarty_tpl->tpl_vars['error_0001']->value;?>
</div>                  
                    <div class="divider row"></div>
                    <div>
                        <form method="POST" name="start_session">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="position-relative form-group"><label for="usuario" class="">Usuario</label><input name="usuario" id="usuario" placeholder="Digita tu nombre de usuario" type="text" class="form-control"></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="position-relative form-group"><label for="examplePassword" class="">Contraseña</label><input name="password" id="examplePassword" placeholder="Digita tu contraseña" type="password" class="form-control"></div>
                                </div>
                            </div>
                            <div class="position-relative form-check"><input name="check" id="exampleCheck" type="checkbox" class="form-check-input"><label for="exampleCheck" class="form-check-label">Mantenerme conectado</label></div>
                            <div class="divider row"></div>
                            <div class="d-flex align-items-center">
                                <div class="ml-auto"><a href="javascript:void(0);" class="btn-lg btn btn-link">Recupera tu contraseña</a>
                                    <button class="btn btn-primary btn-lg">Iniciar sesión</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
</div><?php }
}
