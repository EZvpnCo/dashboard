<?php
/* Smarty version 3.1.47, created on 2022-11-20 06:42:32
  from '/www/wwwroot/EZvpn/panel/resources/views/metron/table/js_1.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.47',
  'unifunc' => 'content_63795bd8a0fa17_03685915',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b0dccc82fff036b5029defbaf6278ef0521f49f7' => 
    array (
      0 => '/www/wwwroot/EZvpn/panel/resources/views/metron/table/js_1.tpl',
      1 => 1665876375,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63795bd8a0fa17_03685915 (Smarty_Internal_Template $_smarty_tpl) {
?>function modify_table_visible(id, key) {
if(document.getElementById(id).checked)
{
table_1.columns( '.' + key ).visible( true );
localStorage.setItem(window.location.href + '-haschecked-' + id, true);
}
else
{
table_1.columns( '.' + key ).visible( false );
localStorage.setItem(window.location.href + '-haschecked-' + id, false);
}
}
<?php }
}
