<?php
/* Smarty version 3.1.47, created on 2022-11-29 01:21:07
  from '/www/wwwroot/EZvpn/main-panel/resources/views/metron/table/js_1.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.47',
  'unifunc' => 'content_6384ee037d2c25_16237367',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '716ae5e66905f38f30ca68ce30b1656081a86579' => 
    array (
      0 => '/www/wwwroot/EZvpn/main-panel/resources/views/metron/table/js_1.tpl',
      1 => 1665876375,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6384ee037d2c25_16237367 (Smarty_Internal_Template $_smarty_tpl) {
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
