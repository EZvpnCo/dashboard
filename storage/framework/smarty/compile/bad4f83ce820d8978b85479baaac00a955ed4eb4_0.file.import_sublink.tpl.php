<?php
/* Smarty version 3.1.47, created on 2022-11-20 06:42:10
  from '/www/wwwroot/EZvpn/panel/resources/views/metron/include/global/import_sublink.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.47',
  'unifunc' => 'content_63795bc280c8a2_37382557',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bad4f83ce820d8978b85479baaac00a955ed4eb4' => 
    array (
      0 => '/www/wwwroot/EZvpn/panel/resources/views/metron/include/global/import_sublink.tpl',
      1 => 1665876375,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63795bc280c8a2_37382557 (Smarty_Internal_Template $_smarty_tpl) {
?>        <?php echo '<script'; ?>
>
            function importSublink(client) {
            if (client == 'ssr') {
                index.oneclickImport('ssr', '<?php echo $_smarty_tpl->tpl_vars['subInfo']->value["ssr"];?>
');
            };
            if (client == 'clash') {
                index.oneclickImport('clash','<?php echo $_smarty_tpl->tpl_vars['subInfo']->value["clash"];?>
')
            };
            if (client == 'shadowrocket') {
                index.oneclickImport('shadowrocket','<?php echo $_smarty_tpl->tpl_vars['subInfo']->value["shadowrocket"];?>
')
            };
            if (client == 'quantumult') {
                index.oneclickImport('quantumult','<?php echo $_smarty_tpl->tpl_vars['subInfo']->value["ssr"];?>
')
            };
            if (client == 'quantumult_v2') {
                index.oneclickImport('quantumult_v2','<?php echo $_smarty_tpl->tpl_vars['subInfo']->value["quantumult_v2"];?>
')
            };
            if (client == 'stash') {
                location.href = "stash://install-config?url=" + encodeURIComponent('<?php echo $_smarty_tpl->tpl_vars['subInfo']->value["stash"];?>
') + "&name=" + '<?php echo $_smarty_tpl->tpl_vars['config']->value["appName"];?>
'
            };
            }
            function qrcodeSublink(client) {
                if (client == 'shadowrocket') {
                    index.qrcodeImport('shadowrocket', '<?php echo $_smarty_tpl->tpl_vars['subInfo']->value["shadowrocket"];?>
');
                }
            }
        <?php echo '</script'; ?>
>
<?php }
}
