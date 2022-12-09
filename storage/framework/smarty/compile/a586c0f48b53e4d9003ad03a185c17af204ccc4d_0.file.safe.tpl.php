<?php
/* Smarty version 3.1.47, created on 2022-12-04 05:06:11
  from '/www/wwwroot/EZvpn/main-panel/resources/views/metron/user/settings/safe.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.47',
  'unifunc' => 'content_638bba4390fc15_09389876',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a586c0f48b53e4d9003ad03a185c17af204ccc4d' => 
    array (
      0 => '/www/wwwroot/EZvpn/main-panel/resources/views/metron/user/settings/safe.tpl',
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
function content_638bba4390fc15_09389876 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
    <head>
        <title>Security Settings &mdash; <?php echo $_smarty_tpl->tpl_vars['config']->value["appName"];?>
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
                                        <h2 class="text-white font-weight-bold my-2 mr-5">Security Settings</h2>
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
                                                    <button type="reset" class="btn btn-success mr-2" id="safe_save_submit">Save the changes</button>
                                                </div>
                                            </div>
                                            <form class="form" id="safe_form">
                                                <div class="card-body">

                                                    <div class="row">
                                                        <label class="col-3 col-xl-3"></label>
                                                        <div class="col-9 col-lg-9 col-xl-6">
                                                            <h5 class="font-weight-bold mb-6">The login password</h5>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-3 col-xl-3 col-lg-3 col-form-label text-right">The old password</label>
                                                        <div class="col-9 col-md-6 col-lg-9 col-xl-6">
                                                            <div class="input-group input-group-lg input-group-solid">
                                                                <input class="form-control" type="password" value="" name="old_passwd" oldvalue="" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-3 col-xl-3 col-lg-3 col-form-label text-right">The new password</label>
                                                        <div class="col-9 col-md-6 col-lg-9 col-xl-6">
                                                            <div class="input-group input-group-lg input-group-solid">
                                                                <input class="form-control" type="password" value="" name="new_passwd" oldvalue="" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-3 col-xl-3 col-lg-3 col-form-label text-right">Confirm password</label>
                                                        <div class="col-9 col-md-6 col-lg-9 col-xl-6">
                                                            <div class="input-group input-group-lg input-group-solid">
                                                                <input class="form-control" type="password" value="" name="ret_passwd" oldvalue="" />
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <label class="col-3 col-xl-3"></label>
                                                        <div class="col-9 col-md-6 col-lg-9 col-xl-6">
                                                            <h5 class="font-weight-bold mt-10 mb-6">Account security</h5>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-3 col-xl-3 col-lg-3 col-form-label text-right">Step 2 to verify</label>
                                                        <div class="col-9 col-md-6 col-lg-9 col-xl-6">
                                                            <?php if ($_smarty_tpl->tpl_vars['user']->value->ga_enable == 1) {?>
                                                            <button type="button" class="btn btn-primary font-weight-bold btn-sm" data-toggle="modal" data-target="#step2-false-modal">Close the validation</button>
                                                            <?php } else { ?>
                                                            <button type="button" class="btn btn-primary font-weight-bold btn-sm" data-toggle="modal" data-target="#step2-modal">Enables validation</button>
                                                            <?php }?>
                                                            <p class="form-text text-muted pt-2">Login account validation requirement when dynamic code, In order to confirm your identity and protect your account from destruction</p>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-3 col-xl-3 col-lg-3 col-form-label text-right"> </label>
                                                        <div class="col-9 col-md-6 col-lg-9 col-xl-6">
                                                            <button type="button" class="btn btn-danger font-weight-bold btn-sm" data-toggle="modal" data-target="#delete-account-modal">Delete the account !</button>
                                                            <p class="form-text text-muted pt-2">Permanent cancellation to remove all the account information !</p>
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

<!-- Step 2 to verify modal -->
<div class="modal fade" id="step2-modal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title <?php echo $_smarty_tpl->tpl_vars['style']->value[$_smarty_tpl->tpl_vars['theme_style']->value]['modal']['text_title'];?>
"><strong>Enable the two-step verification</strong></h5>
            </div>
            <div class="modal-body text-center">
                <code>Please useScan the qr codetwo-step verificationAPPScan the qr code</code><br />
                <code>It is recommended to use Google Authenticator</code>
                <div class="pt-6 pb-2" id="ga-qr" safe-url="<?php echo $_smarty_tpl->tpl_vars['user']->value->getGAurl();?>
"></div>
                <p>Keys:<?php echo $_smarty_tpl->tpl_vars['user']->value->ga_token;?>
</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal" data-toggle="modal" href="#step2-2-modal">The next step</button>
                <button type="button" class="btn <?php echo $_smarty_tpl->tpl_vars['style']->value[$_smarty_tpl->tpl_vars['theme_style']->value]['modal']['btn_close'];?>
 font-weight-bold" data-dismiss="modal">Shut down</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="step2-2-modal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title <?php echo $_smarty_tpl->tpl_vars['style']->value[$_smarty_tpl->tpl_vars['theme_style']->value]['modal']['text_title'];?>
"><strong>Verify the dynamic code</strong></h5>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Confirm the dynamic code</label>
                    <input class="form-control" type="number" id="ga-code" name="ga-code">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="ga-enable-true" onclick="setting.safe('step2', true);">Save the changes</button>
                <button type="button" class="btn <?php echo $_smarty_tpl->tpl_vars['style']->value[$_smarty_tpl->tpl_vars['theme_style']->value]['modal']['btn_close'];?>
 font-weight-bold" data-dismiss="modal">Shut down</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="step2-false-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title <?php echo $_smarty_tpl->tpl_vars['style']->value[$_smarty_tpl->tpl_vars['theme_style']->value]['modal']['text_title'];?>
"><strong>Close the two-step verification</strong></h5>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <code>Close the second step after verification, the login account no longer verify dynamic code, your account security will decline.</code>
                </div>
                <div class="form-group mt-3">
                    <label>The account login password</label>
                    <div class="input-group">
                        <input class="form-control" type="password" id="ga-passwd" name="ga_passwd">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="ga-enable-false" onclick="setting.safe('step2', false);">Save the changes</button>
                <button type="button" class="btn <?php echo $_smarty_tpl->tpl_vars['style']->value[$_smarty_tpl->tpl_vars['theme_style']->value]['modal']['btn_close'];?>
 font-weight-bold" data-dismiss="modal">Shut down</button>
            </div>
        </div>
    </div>
</div>
<!-- Delete the account modal -->
<div class="modal fade" id="delete-account-modal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title <?php echo $_smarty_tpl->tpl_vars['style']->value[$_smarty_tpl->tpl_vars['theme_style']->value]['modal']['text_title'];?>
"><strong>Delete the account</strong></h5>
            </div>
            <form class="kt-form" id="user_profile_delete_account">
            <div class="modal-body">
                <p class="text-danger">Note: all of your data will be permanently deleted, and cannot be recovered.</p>
                <p class="text-danger">Please careful operation!Please careful operation!Please careful operation!</p>
                <div class="form-group">
                    <label>The account login password</label>
                    <div class="input-group">
                        <input class="form-control" type="password" id="delete_passwd" name="delete_passwd">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" id="kill" onclick="setting.safe('kill', true);">Sure to delete</button>
                <button type="button" class="btn <?php echo $_smarty_tpl->tpl_vars['style']->value[$_smarty_tpl->tpl_vars['theme_style']->value]['modal']['btn_close'];?>
 font-weight-bold" data-dismiss="modal">Shut down</button>
            </div>
            </form>
        </div>
    </div>
</div>

    </body>
</html><?php }
}
