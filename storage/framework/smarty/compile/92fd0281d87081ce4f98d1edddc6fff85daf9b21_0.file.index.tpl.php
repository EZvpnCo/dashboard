<?php
/* Smarty version 3.1.47, created on 2022-11-20 06:42:02
  from '/www/wwwroot/EZvpn/panel/resources/views/metron/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.47',
  'unifunc' => 'content_63795bba1603c3_03553179',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '92fd0281d87081ce4f98d1edddc6fff85daf9b21' => 
    array (
      0 => '/www/wwwroot/EZvpn/panel/resources/views/metron/index.tpl',
      1 => 1665876375,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:index-a.tpl' => 1,
  ),
),false)) {
function content_63795bba1603c3_03553179 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['metron']->value['index_enable'] == true) {?>
    <?php $_smarty_tpl->_subTemplateRender('file:index-a.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
} else { ?>
    <!DOCTYPE html>
    <html lang="zh-CN">
    <head>
        <meta http-equiv="refresh" content="0;url=/user">
    </head>
    </html>
<?php }
}
}
