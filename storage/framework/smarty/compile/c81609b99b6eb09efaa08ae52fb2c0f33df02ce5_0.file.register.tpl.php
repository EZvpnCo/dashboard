<?php
/* Smarty version 3.1.47, created on 2022-10-16 08:22:45
  from '/www/wwwroot/subscribe/resources/views/metron/auth/register.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.47',
  'unifunc' => 'content_634b4ed5809d45_09684649',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c81609b99b6eb09efaa08ae52fb2c0f33df02ce5' => 
    array (
      0 => '/www/wwwroot/subscribe/resources/views/metron/auth/register.tpl',
      1 => 1665876375,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:include/auth/head.tpl' => 1,
    'file:include/auth/scripts.tpl' => 1,
  ),
),false)) {
function content_634b4ed5809d45_09684649 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
    <head>
        <title>注册 &mdash; <?php echo $_smarty_tpl->tpl_vars['config']->value["appName"];?>
</title>
        <?php $_smarty_tpl->_subTemplateRender('file:include/auth/head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

                        <div class="register-signin">
                            <div class="mb-10">
                                <h3>新用户注册</h3>
                            </div>
                            <form class="form" id="register_form">
                                <div id="register_form_1">

                                    <?php if ($_smarty_tpl->tpl_vars['config']->value['register_mode'] == 'invite') {?>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group mb-0">
                                                <input class="form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8 mt-5" type="text" placeholder="昵称" name="name" id="name" autocomplete="new-password" />
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group mb-0">
                                                <?php if ($_smarty_tpl->tpl_vars['metron']->value['register_code'] === true) {?>
                                                <input class="form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8 mt-5" data-code="true" type="text" placeholder="邀请码" name="code" id="code" autocomplete="new-password" />
                                                <?php } else { ?>
                                                <input class="form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8 mt-5" data-code="false" type="text" placeholder="邀请码(可留空)" name="code" id="code" autocomplete="new-password" />
                                                <?php }?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } else { ?>
                                    <div class="form-group mb-0" style="white-space:nowrap;">
                                        <input class="form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8 pr-0" type="text" placeholder="昵称" name="name" id="name" autocomplete="new-password" />
                                    </div>
                                    <?php }?>

                                    <?php if ($_smarty_tpl->tpl_vars['metron']->value['register_restricted_email'] === true) {?>
                                    <div class="form-group mb-0" style="white-space:nowrap;">
                                        <div class="input-group mt-5">
                                            <input class="form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-l-50 border-0 py-4 px-8 pr-0" type="text" placeholder="邮箱地址" name="email" id="email" autocomplete="new-password" />
                                            <select class="btn btn-pill btn-outline-code font-weight-bold rounded-l-0 pr-5 opacity-70 bg-dark-o-70" id="email_postfix" style="-webkit-appearance: none;">
                                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['metron']->value['list_of_available_mailboxes'], 'email');
$_smarty_tpl->tpl_vars['email']->index = -1;
$_smarty_tpl->tpl_vars['email']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['email']->value) {
$_smarty_tpl->tpl_vars['email']->do_else = false;
$_smarty_tpl->tpl_vars['email']->index++;
$__foreach_email_0_saved = $_smarty_tpl->tpl_vars['email'];
?>
                                                <option value="<?php echo $_smarty_tpl->tpl_vars['email']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['email']->index === 0) {?>selected=""<?php }?>><?php echo $_smarty_tpl->tpl_vars['email']->value;?>
</option>
                                                <?php
$_smarty_tpl->tpl_vars['email'] = $__foreach_email_0_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                            </select>
                                        </div>
                                    </div>
                                    <?php } else { ?>
                                    <div class="form-group mb-0" style="white-space:nowrap;">
                                        <input class="form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8 mt-5" type="text" placeholder="邮箱地址" name="email" id="email" autocomplete="new-password" />
                                    </div>
                                    <?php }?>

                                    <?php if ($_smarty_tpl->tpl_vars['config']->value['enable_email_verify'] == 'true') {?>
                                    <div class="form-group mb-0" style="white-space:nowrap;">
                                        <div class="input-group mt-5">
                                            <input class="form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-l-50 border-0 py-4 px-8 pr-0" type="text" placeholder="邮箱验证码" name="email_code" id="email_code" autocomplete="new-password" />
                                            <div class="input-group-append ml-0">
                                                <button type="button" class="btn btn-pill btn-outline-code font-weight-bold pr-5 opacity-70 bg-dark-o-70" id="send_email" onclick="sendMail()">获取验证码</button>
                                            </div>
                                        </div>
                                    </div>
                                    <?php }?>

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <input class="form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8 mt-5" type="password" placeholder="密码" name="passwd" id="passwd" autocomplete="new-password" />
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <input class="form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8 mt-5" type="password" placeholder="重复密码" name="repasswd" id="repasswd" autocomplete="new-password"/>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <?php if ($_smarty_tpl->tpl_vars['geetest_html']->value != null) {?>
                                <div class="form-group">
                                    <div class="embed-captcha"></div>
                                </div>
                                <?php }?>

                                <?php if ($_smarty_tpl->tpl_vars['recaptcha_sitekey']->value != null) {?>
                                    <div class="form-group">
                                    <div class="g-recaptcha" data-sitekey="<?php echo $_smarty_tpl->tpl_vars['recaptcha_sitekey']->value;?>
"></div>
                                    </div>
                                <?php }?>
                                <div class="form-group d-flex flex-wrap justify-content-between align-items-center px-5">
                                    <label class="checkbox checkbox-outline checkbox-white text-white m-0">
                                        <input type="checkbox" id="agree" name="agree"/>注册即代表同意 <a class="text-white font-weight-bold" data-toggle="modal" data-target="#tos-modal"><strong>服务条款</strong></a>
                                        <span></span>
                                    </label>
                                </div>
                                <div class="form-group text-center mt-10" style="white-space:nowrap;">
                                    <button type="button" id="register_submit" class="btn btn-pill btn-outline-white btn-block font-weight-bold opacity-90 px-15 py-3 ">注册</button>
                                </div>
                            </form>
                            <div class="mt-10">
                                <span class="opacity-70 mr-4">已经有账号 ?</span>
                                <a href="/auth/login" class="text-white font-weight-bold">立即登录</a>
                            </div>
                        </div>

                        <?php $_smarty_tpl->_subTemplateRender('file:include/auth/scripts.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php echo '<script'; ?>
>

    function sendMail() {
        var email = $("#email").val();
        var postfix = $("#email_postfix").val();
        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-top-center",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };
        if (!email) {
            toastr.error("邮箱不能为空");
            return false;
        }
        if (postfix !== undefined){
            email = email + postfix;
        }
        $("#send_email").attr("disabled", true);
        $.post("/auth/send", {
            email: email
        }, function (res) {
            res = JSON.parse(res);
            if(res.ret) {
                toastr.success(res.msg);
                timeoutChangeStyle();
            } else {
                toastr.error(res.msg);
                $("#send_email").attr("disabled", false);
            }
        })
    }

    var num = 60;
    function timeoutChangeStyle() {
        if (num == 0) {
            $("#send_email").text("发送验证码");
            num = 60;
            $("#send_email").attr("disabled", false);
        } else {
            var str = num + "s 后再次获取";
            $("#send_email").text(str);
            setTimeout("timeoutChangeStyle()", 1000);
        }
        num--;
    }

    if ((getCookie('uid')) != '') {
        window.location.href = '/user';
    }

         function getQueryVariable(variable) {
        var query = window.location.search.substring(1);
        var vars = query.split("&");
        for (var i = 0; i < vars.length; i++) {
            var pair = vars[i].split("=");
            if (pair[0] == variable) {
                return pair[1];
            }
        }
        return "";
    }

        function setCookie(cname, cvalue, exdays) {
        var d = new Date();
        d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
        var expires = "expires=" + d.toGMTString();
        document.cookie = cname + "=" + cvalue + "; " + expires;
    }

        function getCookie(cname) {
        var name = cname + "=";
        var ca = document.cookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i].trim();
            if (c.indexOf(name) == 0) return c.substring(name.length, c.length);
        }
        return "";
    }

        if (getQueryVariable('code') != '') {
        setCookie('code', getQueryVariable('code'), 30);
        window.location.href = '/auth/register';
    }

    <?php if ($_smarty_tpl->tpl_vars['config']->value['register_mode'] == 'invite') {?>
        if ((getCookie('code')) != '') {
        $("#code").val(getCookie('code'));
    }
    <?php }
echo '</script'; ?>
>

    </body>
</html>
<?php }
}
