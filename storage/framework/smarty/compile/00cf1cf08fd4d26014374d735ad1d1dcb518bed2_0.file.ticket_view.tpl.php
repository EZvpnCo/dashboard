<?php
/* Smarty version 3.1.47, created on 2022-12-09 19:10:34
  from '/www/wwwroot/EZvpn/main-panel/resources/views/metron/user/ticket_view.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.47',
  'unifunc' => 'content_639317aa78dc25_79542913',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '00cf1cf08fd4d26014374d735ad1d1dcb518bed2' => 
    array (
      0 => '/www/wwwroot/EZvpn/main-panel/resources/views/metron/user/ticket_view.tpl',
      1 => 1670092670,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:include/global/head.tpl' => 1,
    'file:include/global/menu.tpl' => 1,
    'file:include/global/footer.tpl' => 1,
    'file:include/global/scripts.tpl' => 1,
  ),
),false)) {
function content_639317aa78dc25_79542913 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
    <head>
        <title>The work order system &mdash; <?php echo $_smarty_tpl->tpl_vars['config']->value["appName"];?>
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
                                        <h2 class="text-white font-weight-bold my-2 mr-5">The repair order #<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
</h2>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <a href="/user/ticket" class="btn btn-white font-weight-bold py-3 px-6">Returns a single table</a>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex flex-column-fluid" id="ticket_view" data-ticketid="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">

                            <div class="container">

                                <div class="row">
                                    <div class="col-12">

                                        <div class="card card-custom <?php echo $_smarty_tpl->tpl_vars['metron']->value['style_shadow'];?>
">
                                            <div class="card-header align-items-center flex-wrap justify-content-between py-5 h-auto">
                                                <div class="d-flex align-items-center my-2">
                                                    <a href="/user/ticket" class="btn btn-clean btn-icon btn-sm mr-6" data-inbox="back">
                                                        <i class="flaticon2-left-arrow-1"></i>
                                                    </a>
                                                    <div class="font-weight-bold font-size-h3 text-primary mr-3"><strong><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</strong></div>
                                                    <!--<span class="label label-light-primary font-weight-bold label-inline mr-2">In the processing</span>-->
                                                </div>
                                                <!--
                                                <div class="d-flex align-items-center justify-content-end text-right my-2">
                                                    <span class="text-muted font-weight-bold mr-4" data-toggle="dropdown"> </span>
                                                    <span class="btn btn-default btn-icon btn-sm mr-2" data-toggle="tooltip" title="The previous page">
                                                        <i class="ki ki-bold-arrow-back icon-sm"></i>
                                                    </span>
                                                    <span class="btn btn-default btn-icon btn-sm mr-2" data-toggle="tooltip" title="The next page">
                                                        <i class="ki ki-bold-arrow-next icon-sm"></i>
                                                    </span>
                                                </div>-->
                                            </div>

                                            <div class="card-body p-0">
                                                <div class="card-spacer mb-3" id="ticket_reply">
                                                    <div class="card card-custom shadow-sm">
                                                        <div class="card-body p-0">
                                                            <form id="ticket_reply_form">
                                                                <div class="d-block">
                                                                    <div id="ticket_reply_editor" class="border-0" style="height: 150px"></div>
                                                                    <div class="dropzone dropzone-multi px-8 py-4" id="ticket_reply_attachments">
                                                                        <div class="dropzone-items">
                                                                            <div class="dropzone-item" style="display:none">
                                                                                <div class="dropzone-file">
                                                                                    <div class="dropzone-filename" title="some_image_file_name.jpg">
                                                                                        <span data-dz-name="">some_image_file_name.jpg</span>
                                                                                        <strong>(
                                                                                        <span data-dz-size="">340kb</span>)</strong>
                                                                                    </div>
                                                                                    <div class="dropzone-error" data-dz-errormessage=""></div>
                                                                                </div>
                                                                                <div class="dropzone-progress">
                                                                                    <div class="progress">
                                                                                        <div class="progress-bar bg-primary" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0" data-dz-uploadprogress=""></div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="dropzone-toolbar">
                                                                                    <span class="dropzone-delete" data-dz-remove="">
                                                                                        <i class="flaticon2-cross"></i>
                                                                                    </span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="d-flex align-items-center justify-content-between py-5 pl-8 pr-5 border-top">
                                                                    <div class="d-flex align-items-center mr-3">
                                                                        <div class="btn-group mr-4">
                                                                            <span class="btn btn-primary font-weight-bold px-6" id="ticket_reply_submit" onclick="ticket.reply();">Reply to the repair order</span>
                                                                        </div>
                                                                        <!--<span class="btn btn-icon btn-sm btn-clean mr-2" id="ticket_reply_attachments_select">
                                                                            <i class="flaticon2-clip-symbol"></i>
                                                                        </span>-->
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ticketset']->value, 'ticket');
$_smarty_tpl->tpl_vars['ticket']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['ticket']->value) {
$_smarty_tpl->tpl_vars['ticket']->do_else = false;
?>
                                                    <div class="cursor-pointer shadow-xs toggle-on" data-inbox="message">
                                                        <div class="d-flex align-items-center card-spacer-x py-6">
                                                            <span class="symbol symbol-50 mr-4">
                                                                <span class="symbol-label" style="background-image: url('<?php echo $_smarty_tpl->tpl_vars['ticket']->value->User()->gravatar;?>
')"></span>
                                                            </span>
                                                            <div class="d-flex flex-column flex-grow-1 flex-wrap mr-2">
                                                                <div class="d-flex">
                                                                    <a href="#" class="font-size-lg font-weight-bolder <?php echo $_smarty_tpl->tpl_vars['style']->value[$_smarty_tpl->tpl_vars['theme_style']->value]['global']['text'];?>
 text-hover-primary mr-2"><?php echo $_smarty_tpl->tpl_vars['ticket']->value->User()->user_name;?>
</a>
                                                                    <div class="font-weight-bold text-muted">
                                                                        <?php if ($_smarty_tpl->tpl_vars['ticket']->value->User()->isAdmin()) {?>
                                                                        <span class="label label-success label-dot mr-2"></span>The response of the service
                                                                        <?php } else { ?>
                                                                        <span class="label label-primary label-dot mr-2"></span>The user response
                                                                        <?php }?>
                                                                    </div>
                                                                </div>
                                                                <div class="d-flex flex-column">
                                                                    <div class="toggle-off-item">
                                                                        <span class="font-weight-bold text-muted cursor-pointer" data-toggle="dropdown">Contents of which have been launched
                                                                        <i class="flaticon2-down icon-xs ml-1 text-dark-50"></i></span>
                                                                    </div>
                                                                    <div class="text-muted font-weight-bold toggle-on-item" data-inbox="toggle">Contents of which have been folded</div>
                                                                </div>
                                                            </div>
                                                            <div class="d-flex align-items-center">
                                                                <div class="font-weight-bold text-muted mr-2"><?php echo date('Y-m-d H:i:s',$_smarty_tpl->tpl_vars['ticket']->value->datetime);?>
</div>
                                                            </div>
                                                        </div>
                                                        <div class="card-spacer-x py-3 toggle-off-item">
                                                            <?php if ($_smarty_tpl->tpl_vars['ticket']->value->User()->isAdmin()) {?>
                                                            <p>How do you do?<?php echo $_smarty_tpl->tpl_vars['user']->value->user_name;?>
</p>
                                                            <?php }?>
                                                            <p><?php echo $_smarty_tpl->tpl_vars['ticket']->value->content;?>
</p>
                                                        </div>
                                                    </div>
                                                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
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
    </body>
</html><?php }
}
