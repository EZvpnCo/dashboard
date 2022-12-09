<?php
/* Smarty version 3.1.47, created on 2022-12-03 14:12:28
  from '/www/wwwroot/EZvpn/main-panel/resources/views/metron/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.47',
  'unifunc' => 'content_638ae8cc7102b4_54227783',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bb65583a6425a0315688bcf11715edcf220b8e09' => 
    array (
      0 => '/www/wwwroot/EZvpn/main-panel/resources/views/metron/index.tpl',
      1 => 1670046565,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:index-a.tpl' => 1,
  ),
),false)) {
function content_638ae8cc7102b4_54227783 (Smarty_Internal_Template $_smarty_tpl) {
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
