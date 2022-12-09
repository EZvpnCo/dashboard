<?php
/* Smarty version 3.1.47, created on 2022-12-01 04:38:54
  from '/www/wwwroot/EZvpn/main-panel/resources/views/metron-en/include/global/head.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.47',
  'unifunc' => 'content_6387bf5e58eac2_50029616',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9c8747ec62bc102637ba9eb77e74ed7b9400bc90' => 
    array (
      0 => '/www/wwwroot/EZvpn/main-panel/resources/views/metron-en/include/global/head.tpl',
      1 => 1669802440,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6387bf5e58eac2_50029616 (Smarty_Internal_Template $_smarty_tpl) {
?><meta charset="UTF-8" />
<meta name="renderer" content="webkit" />
<meta name="description" content="Updates and statistics" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="format-detection" content="telephone=no,email=no" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<link href="<?php echo $_smarty_tpl->tpl_vars['metron']->value['assets_url'];?>
/css/fonts.css?family=Poppins:300,400,500,600,700" rel="stylesheet" />
<?php if ($_smarty_tpl->tpl_vars['theme_style']->value === 'dark') {?>
    <link href="<?php echo $_smarty_tpl->tpl_vars['metron']->value['assets_url'];?>
/css/style/dark/plugins.dark.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo $_smarty_tpl->tpl_vars['metron']->value['assets_url'];?>
/css/style/dark/giatun.dark.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo $_smarty_tpl->tpl_vars['metron']->value['assets_url'];?>
/css/style/dark/style.dark.css" rel="stylesheet" type="text/css" />
<?php } else { ?>
    <link href="<?php echo $_smarty_tpl->tpl_vars['metron']->value['assets_url'];?>
/css/style/white/plugins.white.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo $_smarty_tpl->tpl_vars['metron']->value['assets_url'];?>
/css/style/white/giatun.white.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo $_smarty_tpl->tpl_vars['metron']->value['assets_url'];?>
/css/style/white/style.white.css" rel="stylesheet" type="text/css" />
<?php }?>
<link href="/favicon.ico" rel="shortcut icon" />
</head>
<body id="kt_body" <?php if ($_smarty_tpl->tpl_vars['theme_style']->value !== 'dark') {?>style="background-image: url(<?php echo $_smarty_tpl->tpl_vars['metron']->value['user_background_top'];?>
)"<?php }?> class="quick-panel-right demo-panel-right offcanvas-right header-fixed subheader-enabled page-loading">
<div id="kt_header_mobile" class="header-mobile">
    <!--Start::Mobile terminal Logo
    <a href="/user">
        <img alt="Logo" src="logo-letter-1.png" class="logo-default max-h-30px" />
    </a>-->
    <h2 class="logo-default title-3d"><?php echo $_smarty_tpl->tpl_vars['config']->value["appName"];?>
</h1>
        <!--End::Mobile terminal Logo-->
        <div class="d-flex align-items-center">
            <button class="btn p-0 burger-icon burger-icon-left ml-4" id="kt_header_mobile_toggle">
                <span></span>
            </button>
            <button class="btn btn-icon btn-hover-transparent-white p-0 ml-3" id="kt_header_mobile_topbar_toggle">
                    <span class="svg-icon svg-icon-xl">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox= "0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <polygon points="0 0 24 0 24 24 0 24" />
                                <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247, 21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
                            </g>
                        </svg>
                    </span>
            </button>
        </div>
</div><?php }
}
