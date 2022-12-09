<?php
/* Smarty version 3.1.47, created on 2022-10-16 08:16:02
  from '/www/wwwroot/subscribe/resources/views/metron/include/auth/scripts.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.47',
  'unifunc' => 'content_634b4d4238bc74_49464394',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7724118fe36a58784baaf6f8a5f1426b4fdfe04e' => 
    array (
      0 => '/www/wwwroot/subscribe/resources/views/metron/include/auth/scripts.tpl',
      1 => 1665876375,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:include/global/crisp.tpl' => 1,
    'file:include/global/chatra.tpl' => 1,
  ),
),false)) {
function content_634b4d4238bc74_49464394 (Smarty_Internal_Template $_smarty_tpl) {
?>                        <div class="p-5" id="auth-stf"></div>
                    </div>
                </div>
            </div>
        </div>
        <?php echo '<script'; ?>
>
            var loginConfig = {
                'base_url': "<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
",
                'switch': {
                    'geetest': <?php if ($_smarty_tpl->tpl_vars['geetest_html']->value != null) {?>true<?php } else { ?>false<?php }?>,
                    'recaptcha': <?php if ($_smarty_tpl->tpl_vars['recaptcha_sitekey']->value != null) {?>true<?php } else { ?>false<?php }?>
                },
                'telegram': {
                    bot: "<?php echo $_smarty_tpl->tpl_vars['telegram_bot']->value;?>
",
                    token: "<?php echo $_smarty_tpl->tpl_vars['login_token']->value;?>
",
                    number: "<?php echo $_smarty_tpl->tpl_vars['login_number']->value;?>
",
                },
                'register': {
                    'code': <?php if ($_smarty_tpl->tpl_vars['config']->value['register_mode'] == 'invite' && $_smarty_tpl->tpl_vars['metron']->value['register_code'] === true) {?>true<?php } else { ?>false<?php }?>,
                },
            };
        <?php echo '</script'; ?>
>

        <?php if ($_smarty_tpl->tpl_vars['geetest_html']->value != null) {?>
        <?php echo '<script'; ?>
 src="//static.geetest.com/static/tools/gt.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
>
            captcha = '';
            var handlerEmbed = function (captchaObj) {
                captchaObj.onSuccess(function () {
                    validate = captchaObj.getValidate();
                });
                captchaObj.appendTo(".embed-captcha");
                captcha = captchaObj;
            };
            initGeetest({
                gt: "<?php echo $_smarty_tpl->tpl_vars['geetest_html']->value->gt;?>
",
                challenge: "<?php echo $_smarty_tpl->tpl_vars['geetest_html']->value->challenge;?>
",
                product: "float",
                width: "100%",
                lang: 'zh-cn',
                offline: <?php if ($_smarty_tpl->tpl_vars['geetest_html']->value->success) {?>0<?php } else { ?>1<?php }?>
            }, handlerEmbed);
        <?php echo '</script'; ?>
>
        <?php }?>

        <?php if ($_smarty_tpl->tpl_vars['recaptcha_sitekey']->value != null) {?>
            <?php echo '<script'; ?>
 src="https://recaptcha.net/recaptcha/api.js" async defer><?php echo '</script'; ?>
>
        <?php }?>

        <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['metron']->value['assets_url'];?>
/plugins/global/plugins.bundle.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['metron']->value['assets_url'];?>
/js/metron-plugin.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['metron']->value['assets_url'];?>
/js/scripts.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['metron']->value['assets_url'];?>
/js/auth.js"><?php echo '</script'; ?>
>

        <?php if ($_smarty_tpl->tpl_vars['metron']->value['enable_cust_auth'] === true) {?>
        <?php if ($_smarty_tpl->tpl_vars['metron']->value['enable_cust'] === 'crisp' && $_smarty_tpl->tpl_vars['metron']->value['crisp_id'] != '') {?>
        <?php $_smarty_tpl->_subTemplateRender('file:include/global/crisp.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        <?php } elseif ($_smarty_tpl->tpl_vars['metron']->value['enable_cust'] === 'chatra' && $_smarty_tpl->tpl_vars['metron']->value['chatra_id'] != '') {?>
        <?php $_smarty_tpl->_subTemplateRender('file:include/global/chatra.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        <?php }?>
        <?php }
}
}
