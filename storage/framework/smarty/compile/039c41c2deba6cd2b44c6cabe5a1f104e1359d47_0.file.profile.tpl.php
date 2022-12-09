<?php
/* Smarty version 3.1.47, created on 2022-12-04 05:05:38
  from '/www/wwwroot/EZvpn/main-panel/resources/views/metron/user/settings/profile.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.47',
  'unifunc' => 'content_638bba22adae02_75259202',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '039c41c2deba6cd2b44c6cabe5a1f104e1359d47' => 
    array (
      0 => '/www/wwwroot/EZvpn/main-panel/resources/views/metron/user/settings/profile.tpl',
      1 => 1670092670,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:include/global/head.tpl' => 1,
    'file:include/global/menu.tpl' => 1,
    'file:include/settings/menu.tpl' => 1,
    'file:include/global/footer.tpl' => 1,
    'file:include/global/scripts.tpl' => 1,
  ),
),false)) {
function content_638bba22adae02_75259202 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
    <head>
        <title>Data editor &mdash; <?php echo $_smarty_tpl->tpl_vars['config']->value["appName"];?>
</title>
        <?php $_smarty_tpl->_subTemplateRender('file:include/global/head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        <div class="d-flex flex-column flex-root">
            <div class="d-flex flex-row flex-column-fluid page">
                <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
                    <?php $_smarty_tpl->_subTemplateRender('file:include/global/menu.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
                    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                        <div class="subheader min-h-lg-175px pt-5 pb-7 subheader-transparent" id="kt_subheader">
                            <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                                <div class="d-flex align-items-center flex-wrap mr-2">
                                    <div class="d-flex flex-column">
                                        <h2 class="text-white font-weight-bold my-2 mr-5">Data editor</h2>
                                    </div>
                                </div>
                                <?php $_smarty_tpl->_subTemplateRender('file:include/settings/menu.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
                                    
                                    <div class="flex-row-fluid ml-lg-8">
                                        <div class="card card-custom <?php echo $_smarty_tpl->tpl_vars['metron']->value['style_shadow'];?>
">
                                            <div class="card-header py-3">
                                                <div class="card-title align-items-start flex-column">
                                                    <h3 class="card-label font-weight-bolder text-primary">Data editor</h3>
                                                    <span class="text-muted font-weight-bold font-size-sm mt-1">Update your personal information</span>
                                                </div>
                                                <div class="card-toolbar">
                                                    <button type="reset" class="btn btn-success mr-2" id="profile_save_submit">Save the changes</button>
                                                </div>
                                            </div>
                                            <form class="form" id="profile_form">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <label class="col-3 col-xl-3"></label>
                                                        <div class="col-9 col-lg-9 col-xl-6">
                                                            <h5 class="font-weight-bold mb-6">Personal information</h5>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-3 ol-xl-3 col-lg-3 col-form-label text-right">Head portrait</label>
                                                        <div class="col-9 col-lg-9 col-xl-6">
                                                            <div class="image-input image-input-outline" id="kt_profile_avatar" style="background-image: url(<?php echo $_smarty_tpl->tpl_vars['metron']->value['assets_url'];?>
/media/users/blank.png)">
                                                                <div class="image-input-wrapper" style="background-image: url(<?php echo $_smarty_tpl->tpl_vars['user']->value->gravatar;?>
)"></div>
                                                                <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                                                                    <i class="fa fa-pen icon-sm text-muted"></i>
                                                                    <input type="file" name="profile_avatar" accept=".png, .jpg, .jpeg" />
                                                                    <input type="hidden" name="profile_avatar_remove" />
                                                                </label>
                                                                <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                                                                    <i class="ki ki-bold-close icon-xs text-muted"></i>
                                                                </span>
                                                                <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove" data-toggle="tooltip" title="Remove avatar">
                                                                    <i class="ki ki-bold-close icon-xs text-muted"></i>
                                                                </span>
                                                            </div>
                                                            <span class="form-text text-muted">Temporarily does not support the change <!-- Allows the types of files:png, jpg, jpeg --></span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-3 col-xl-3 col-lg-3 col-form-label text-right">nickname</label>
                                                        <div class="col-9 col-md-6 col-lg-9 col-xl-6">
                                                            <div class="input-group input-group-lg input-group-solid">
                                                                <input type="text" class="form-control" <?php if ($_smarty_tpl->tpl_vars['metron']->value['change_username'] !== true) {?>disabled="disabled" <?php }?> value="<?php echo $_smarty_tpl->tpl_vars['user']->value->user_name;?>
" name="user_name" oldvalue="<?php echo $_smarty_tpl->tpl_vars['user']->value->user_name;?>
"/>
                                                            </div>
                                                            <?php if ($_smarty_tpl->tpl_vars['metron']->value['change_username'] !== true) {?>
                                                            <span class="form-text text-muted">From modification nickname</span>
                                                            <?php }?>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <label class="col-3 col-xl-3"></label>
                                                        <div class="col-9 col-md-6 col-lg-9 col-xl-6">
                                                            <h5 class="font-weight-bold mt-10 mb-6">Contact information</h5>
                                                        </div>
                                                    </div>
                                                    <!--
                                                    <div class="form-group row">
                                                        <label class="col-3 col-xl-3 col-lg-3 col-form-label text-right">Mobile phone number</label>
                                                        <div class="col-9 col-md-6 col-lg-9 col-xl-6">
                                                            <div class="input-group input-group-lg input-group-solid">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">
                                                                        <i class="la la-phone"></i>
                                                                    </span>
                                                                </div>
                                                                <input type="text" class="form-control form-control-lg form-control-solid" value="+35278953712" placeholder="Phone" />
                                                            </div>
                                                            <span class="form-text text-muted">We will never share your number with anyone else</span>
                                                        </div>
                                                    </div>-->
                                                    <?php if ($_smarty_tpl->tpl_vars['metron']->value['register_restricted_email'] === true) {?>
                                                    <div class="form-group row">
                                                        <label class="col-3 col-xl-3 col-lg-3 col-form-label text-right">Email address</label>
                                                        <div class="col-9 col-md-6 col-lg-9 col-xl-6">
                                                            <div class="input-group input-group-lg input-group-solid">
                                                                <input type="text" class="form-control" <?php if ($_smarty_tpl->tpl_vars['metron']->value['change_usermail'] !== true) {?>disabled="disabled"<?php }?>value="<?php echo $_smarty_tpl->tpl_vars['email_name']->value;?>
" name="email_name" oldvalue="<?php echo $_smarty_tpl->tpl_vars['email_name']->value;?>
"/>
                                                                <div class="input-group-append">
                                                                    <select class="form-control selectpicker" <?php if ($_smarty_tpl->tpl_vars['metron']->value['change_usermail'] !== true) {?>disabled="disabled"<?php }?> id="email_suffix" oldvalue="<?php echo $_smarty_tpl->tpl_vars['email_suffix']->value;?>
">
                                                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['email_whitelist']->value, 'emailsuffix');
$_smarty_tpl->tpl_vars['emailsuffix']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['emailsuffix']->value) {
$_smarty_tpl->tpl_vars['emailsuffix']->do_else = false;
?>
                                                                            <option value='<?php echo $_smarty_tpl->tpl_vars['emailsuffix']->value;?>
' <?php if ($_smarty_tpl->tpl_vars['emailsuffix']->value == $_smarty_tpl->tpl_vars['email_suffix']->value) {?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['emailsuffix']->value;?>
</option>
                                                                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <?php if ($_smarty_tpl->tpl_vars['metron']->value['change_usermail'] !== true) {?>
                                                            <span class="form-text text-muted">Forbidden to modify email</span>
                                                            <?php }?>
                                                        </div>
                                                    </div>
                                                    <?php } else { ?>
                                                    <div class="form-group row">
                                                        <label class="col-3 col-xl-3 col-lg-3 col-form-label text-right">Email address</label>
                                                        <div class="col-9 col-md-6 col-lg-9 col-xl-6">
                                                            <div class="input-group input-group-lg input-group-solid">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">
                                                                        <i class="la la-envelope-o"></i>
                                                                    </span>
                                                                </div>
                                                                <input type="text" class="form-control form-control-lg form-control-solid" value="<?php echo $_smarty_tpl->tpl_vars['user']->value->email;?>
" name="email" oldvalue="<?php echo $_smarty_tpl->tpl_vars['user']->value->email;?>
" placeholder="email" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php }?>
                                                    <?php if ($_smarty_tpl->tpl_vars['config']->value['enable_email_verify'] === true && $_smarty_tpl->tpl_vars['metron']->value['change_usermail'] === true) {?>
                                                    <div class="form-group row">
                                                        <label class="col-3 col-xl-3 col-lg-3 col-form-label text-right">Verification code</label>
                                                        <div class="col-9 col-md-6 col-lg-9 col-xl-6">
                                                        <div class="input-group input-group-lg input-group-solid">
                                                            <input type="text" class="form-control" value="" name="email_code" />
                                                            <div class="input-group-append">
                                                                <button class="btn btn-primary" type="button" onclick="setting.profile('send_email_code');" id="send_email_code">Get verification code</button>
                                                            </div>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <?php }?>
                                                    <div class="form-group row">
                                                        <label class="col-3 col-xl-3 col-lg-3 col-form-label text-right">Receive notifications</label>
                                                        <div class="col-9 col-md-6 col-lg-9 col-xl-6">
                                                            <div class="checkbox-inline">
                                                                <label class="checkbox">
                                                                <input type="checkbox" id="sendDailyMail" <?php if ($_smarty_tpl->tpl_vars['user']->value->sendDailyMail == 1) {?>checked="checked"<?php }?> />Use of information and announcement mail daily receiving flow
                                                                <span></span></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                    <?php $_smarty_tpl->_subTemplateRender('file:include/global/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
                </div>
            </div>
        </div>
        <?php $_smarty_tpl->_subTemplateRender('file:include/global/scripts.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    </body>
</html><?php }
}
