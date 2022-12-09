<?php
/* Smarty version 3.1.47, created on 2022-12-04 05:09:12
  from '/www/wwwroot/EZvpn/main-panel/resources/views/metron/500.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.47',
  'unifunc' => 'content_638bbaf8a5c761_07022407',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '44b053862867d9d43839328f9f977940cd8a653b' => 
    array (
      0 => '/www/wwwroot/EZvpn/main-panel/resources/views/metron/500.tpl',
      1 => 1670092670,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_638bbaf8a5c761_07022407 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en" >
    <head>
        <meta charset="utf-8"/>
        <title>An error occurred &mdash; <?php echo $_smarty_tpl->tpl_vars['config']->value["appName"];?>
</title>
        <meta name="description" content=""/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
        <link href="<?php echo $_smarty_tpl->tpl_vars['metron']->value['assets_url'];?>
/css/fonts.css?family=Poppins:300,400,500,600,700" rel="stylesheet" />
        <link href="<?php echo $_smarty_tpl->tpl_vars['metron']->value['assets_url'];?>
/css/pages/error/error-6.css?v=7.0.3" rel="stylesheet" type="text/css"/>
        <link href="<?php echo $_smarty_tpl->tpl_vars['metron']->value['assets_url'];?>
/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $_smarty_tpl->tpl_vars['metron']->value['assets_url'];?>
/css/style.bundle.css" rel="stylesheet" type="text/css" />
        <link rel="shortcut icon" href="/favicon.ico"/>
</head>
    <body id="kt_body" class="quick-panel-right demo-panel-right offcanvas-right header-fixed subheader-enabled page-loading"  >
        <div class="d-flex flex-column flex-root">
            <div class="error error-6 d-flex flex-row-fluid bgi-size-cover bgi-position-center" style="background-image: url(<?php echo $_smarty_tpl->tpl_vars['metron']->value['assets_url'];?>
/media/error/bg6.jpg);">
                <div class="d-flex flex-column flex-row-fluid text-center">
                    <h1 class="error-title font-weight-boldest text-white mb-12" style="margin-top: 12rem;">500 error</h1>
                    <p class="display-4 font-weight-bold text-white">
                        The server seems to be collapsed~<br/>
                        If appear this error<br/>
                        Try to send the repair order contact customer service
                    </p>
                    <div>
                        <a href="/user" class="btn btn-light">Return to the home page</a>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
<?php }
}
