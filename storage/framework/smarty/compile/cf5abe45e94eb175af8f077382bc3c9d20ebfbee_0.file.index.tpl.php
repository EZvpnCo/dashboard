<?php
/* Smarty version 3.1.47, created on 2022-12-01 04:39:05
  from '/www/wwwroot/EZvpn/main-panel/resources/views/metron-en/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.47',
  'unifunc' => 'content_6387bf6915ae67_76266596',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cf5abe45e94eb175af8f077382bc3c9d20ebfbee' => 
    array (
      0 => '/www/wwwroot/EZvpn/main-panel/resources/views/metron-en/index.tpl',
      1 => 1665876374,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:index-a.tpl' => 1,
  ),
),false)) {
function content_6387bf6915ae67_76266596 (Smarty_Internal_Template $_smarty_tpl) {
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
