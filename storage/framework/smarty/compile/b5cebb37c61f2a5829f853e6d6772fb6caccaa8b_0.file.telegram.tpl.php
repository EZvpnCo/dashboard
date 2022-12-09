<?php
/* Smarty version 3.1.47, created on 2022-12-09 19:44:13
  from '/www/wwwroot/EZvpn/main-panel/resources/views/metron/user/settings/telegram.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.47',
  'unifunc' => 'content_63931f8d52e632_59315298',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b5cebb37c61f2a5829f853e6d6772fb6caccaa8b' => 
    array (
      0 => '/www/wwwroot/EZvpn/main-panel/resources/views/metron/user/settings/telegram.tpl',
      1 => 1670586248,
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
function content_63931f8d52e632_59315298 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
     <head>
         <title>Telegram Settings &mdash; <?php echo $_smarty_tpl->tpl_vars['config']->value["appName"];?>
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
                                         <h2 class="text-white font-weight-bold my-2 mr-5">Telegram Settings</h2>
                                     </div>
                                 </div>
                                <?php $_smarty_tpl->_subTemplateRender('file:include/settings/menu.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
                                    
                                    <div class="flex-row-fluid ml-lg-8">
                                        <div class="card card-custom <?php echo $_smarty_tpl->tpl_vars['metron']->value['style_shadow'];?>
">
                                            <div class="card-header py-3">
                                                <div class="card-title align-items-start flex-column">
                                                     <h3 class="card-label font-weight-bolder text-primary">Telgegram settings</h3>
                                                     <span class="text-muted font-weight-bold font-size-sm mt-1">Update your Telegram information</span>
                                                 </div>
                                                <div class="card-toolbar">
                                                    
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <label class="col-3 col-xl-3"></label>
                                                    <div class="col-9 col-lg-9 col-xl-6">
                                                         <h5 class="font-weight-bold mb-6">Telegram information</h5>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-3 col-xl-3 col-lg-3 col-form-label text-right">current binding</label>
                                                     <div class="col-9 col-md-6 col-lg-9 col-xl-6">
                                                         <p class="pt-3"><?php if ($_smarty_tpl->tpl_vars['user']->value->telegram_id == 0) {?>unbound account<?php } else { ?><a href="https://t.me/<?php echo $_smarty_tpl->tpl_vars['user']->value->im_value;?>
" target ="blank"> @<?php echo $_smarty_tpl->tpl_vars['user']->value->im_value;?>
</a><?php }?></p>
                                                     </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-3 col-xl-3 col-lg-3 col-form-label text-right"> </label>
                                                    <div class="col-9 col-md-6 col-lg-9 col-xl-6">
                                                        <?php if ($_smarty_tpl->tpl_vars['user']->value->telegram_id == 0) {?>
                                                         <button type="button" class="btn btn-primary font-weight-bold btn-sm" data-toggle="modal" data-target="#bind-telegram-modal">Start binding</button>
                                                         <p class="form-text text-muted pt-2">Telegram needs to be accessed through a proxy</p>
                                                         <?php } else { ?>
                                                         <button type="button" class="btn btn-danger font-weight-bold btn-sm" onclick="setting.telegram('unbind');">Unbind</button>
                                                         <p class="form-text text-muted pt-2">After unbinding, the Telegram account will be removed from the corresponding group and banned</p>
                                                         <?php }?>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-3 col-xl-3 col-lg-3 col-form-label text-right">Group link</label>
                                                    <div class="col-9 col-md-6 col-lg-9 col-xl-6">
                                                        <?php if ($_smarty_tpl->tpl_vars['user']->value->telegram_id == 0) {?>
                                                        <button type="button" class="btn btn-primary font-weight-bold btn-sm disabled" disabled="disabled">Please bind account first</button>
                                                        <?php } else { ?>
                                                        <a href="<?php echo $_smarty_tpl->tpl_vars['config']->value['telegram_group_link'];?>
" target="_blank" class="btn btn-primary font-weight-bold btn-sm">Join the group</a>
                                                        <p class="form-text text-muted pt-2">If you are unable to join the group please contact <a href="https://t.me/<?php echo $_smarty_tpl->tpl_vars['telegram_bot']->value;?>
" target="_blank">@<?php echo $_smarty_tpl->tpl_vars['telegram_bot']->value;?>
</a> Apply for group unblocking</p>
                                                        <?php }?>
                                                    </div>
                                                </div>
                                            </div>
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

<div class="modal fade" id="bind-telegram-modal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title <?php echo $_smarty_tpl->tpl_vars['style']->value[$_smarty_tpl->tpl_vars['theme_style']->value]['modal']['text_title'];?>
"><strong>Bind Telegram account</strong></h5>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <a href="https://t.me/<?php echo $_smarty_tpl->tpl_vars['telegram_bot']->value;?>
?start=<?php echo $_smarty_tpl->tpl_vars['bind_token']->value;?>
" target="_blank" class="btn btn-primary font-weight-bold btn-sm"><i class ="fab fa-telegram-plane"></i>One-click binding to Telegram</a>
                </div>
                <p class="font-size-h5 pt-5">If you encounter problems during the one-key binding process, you can try to manually bind:</p>
                <span class="kt-font-bolder">1. Add a robot account in Telegram<a href="https://t.me/<?php echo $_smarty_tpl->tpl_vars['telegram_bot']->value;?>
" target="_blank">@<?php echo $_smarty_tpl->tpl_vars['telegram_bot']->value;?>
</a></span><br>
                <span class="kt-font-bolder pt-2">2. Send command<code class="cursor_onclick copy-modal" data-clipboard-text="/start <?php echo $_smarty_tpl->tpl_vars['bind_token']->value;?>
">/start <?php echo $_smarty_tpl->tpl_vars['bind_token']->value;?>
</code>(click to copy) to the robot</span>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="window.location.reload();">I am bound</button>
                <button type="button" class="btn <?php echo $_smarty_tpl->tpl_vars['style']->value[$_smarty_tpl->tpl_vars['theme_style']->value]['modal']['btn_close'];?>
 font-weight-bold" data-dismiss="modal">closure</button>
            </div>
        </div>
    </div>
</div>

    </body>
</html><?php }
}
