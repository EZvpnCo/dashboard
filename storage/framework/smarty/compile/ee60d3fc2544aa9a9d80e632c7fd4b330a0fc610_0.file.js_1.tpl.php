<?php
/* Smarty version 3.1.47, created on 2022-10-19 19:10:50
  from '/www/wwwroot/subscribe/resources/views/material/table/js_1.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.47',
  'unifunc' => 'content_634fdb3a8ffcc7_45725302',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ee60d3fc2544aa9a9d80e632c7fd4b330a0fc610' => 
    array (
      0 => '/www/wwwroot/subscribe/resources/views/material/table/js_1.tpl',
      1 => 1665876375,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_634fdb3a8ffcc7_45725302 (Smarty_Internal_Template $_smarty_tpl) {
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
