<?php
/* Smarty version 3.1.47, created on 2022-10-16 08:15:59
  from '/www/wwwroot/subscribe/resources/views/metron/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.47',
  'unifunc' => 'content_634b4d3f54d590_29436923',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7594bd7a07fbaf38807b57209e90befc4118d895' => 
    array (
      0 => '/www/wwwroot/subscribe/resources/views/metron/index.tpl',
      1 => 1665876375,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:index-a.tpl' => 1,
  ),
),false)) {
function content_634b4d3f54d590_29436923 (Smarty_Internal_Template $_smarty_tpl) {
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
