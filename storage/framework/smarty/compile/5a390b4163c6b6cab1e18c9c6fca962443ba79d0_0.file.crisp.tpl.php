<?php
/* Smarty version 3.1.47, created on 2022-12-09 20:33:04
  from '/www/wwwroot/EZvpn/main-panel/resources/views/metron/include/global/crisp.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.47',
  'unifunc' => 'content_63932b0048b8b6_86477259',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5a390b4163c6b6cab1e18c9c6fca962443ba79d0' => 
    array (
      0 => '/www/wwwroot/EZvpn/main-panel/resources/views/metron/include/global/crisp.tpl',
      1 => 1665876374,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63932b0048b8b6_86477259 (Smarty_Internal_Template $_smarty_tpl) {
?>         <!-- crisp -->
        <?php echo '<script'; ?>
 type="text/javascript">
        window.$crisp = [];
        window.CRISP_WEBSITE_ID = "<?php echo $_smarty_tpl->tpl_vars['metron']->value['crisp_id'];?>
";
        CRISP_TOKEN_ID = '<?php echo $_smarty_tpl->tpl_vars['user']->value->uuid;?>
';
        (function () {
            d = document;
            s = d.createElement("script");
            s.src = "https://client.crisp.chat/l.js";
            s.async = 1;
            d.getElementsByTagName("head")[0].appendChild(s);
        })();
        <?php echo '</script'; ?>
>
        <!-- crisp push -->
        <?php echo '<script'; ?>
>
            $crisp.push(
                ["set", "user:email", "<?php echo $_smarty_tpl->tpl_vars['user']->value->email;?>
"],
                ["set", "user:nickname", "<?php echo $_smarty_tpl->tpl_vars['user']->value->user_name;?>
"]
            );
            $crisp.push(
                ["set", "session:data", 
                    [
                        [
                            ["ID", "<?php echo $_smarty_tpl->tpl_vars['user']->value->id;?>
"],
                            ["VIP", "<?php echo $_smarty_tpl->tpl_vars['user']->value->class;?>
"],
                            ["VIP_Time", "<?php echo $_smarty_tpl->tpl_vars['user']->value->class_expire;?>
"],
                            ["Money", "¥ "+"<?php echo $_smarty_tpl->tpl_vars['user']->value->money;?>
"],
                            ["Traffic", '<?php echo $_smarty_tpl->tpl_vars['user']->value->unusedTraffic();?>
'],
                            ["Last_Time", '<?php echo $_smarty_tpl->tpl_vars['user']->value->lastSsTime();?>
'],
                            ["Reg_Time", '<?php echo $_smarty_tpl->tpl_vars['user']->value->reg_date;?>
'],
                            ["Update_Time", '<?php echo date("Y-m-d H:i:s");?>
'],
                        ]
                    ]
                ]
            );
        <?php echo '</script'; ?>
><?php }
}
