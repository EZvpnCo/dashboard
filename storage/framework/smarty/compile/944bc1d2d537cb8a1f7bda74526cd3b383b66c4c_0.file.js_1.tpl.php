<?php
/* Smarty version 3.1.47, created on 2022-10-16 08:27:06
  from '/www/wwwroot/subscribe/resources/views/metron/table/js_1.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.47',
  'unifunc' => 'content_634b4fda914cb4_33847948',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '944bc1d2d537cb8a1f7bda74526cd3b383b66c4c' => 
    array (
      0 => '/www/wwwroot/subscribe/resources/views/metron/table/js_1.tpl',
      1 => 1665876375,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_634b4fda914cb4_33847948 (Smarty_Internal_Template $_smarty_tpl) {
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
