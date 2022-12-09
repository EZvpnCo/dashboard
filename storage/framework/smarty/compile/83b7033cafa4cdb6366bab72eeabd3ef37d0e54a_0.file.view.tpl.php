<?php
/* Smarty version 3.1.47, created on 2022-12-09 19:11:11
  from '/www/wwwroot/EZvpn/main-panel/resources/views/metron/admin/ticket/view.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.47',
  'unifunc' => 'content_639317cf849ca7_44098377',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '83b7033cafa4cdb6366bab72eeabd3ef37d0e54a' => 
    array (
      0 => '/www/wwwroot/EZvpn/main-panel/resources/views/metron/admin/ticket/view.tpl',
      1 => 1670053670,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:admin/main.tpl' => 1,
    'file:dialog.tpl' => 1,
    'file:admin/footer.tpl' => 1,
  ),
),false)) {
function content_639317cf849ca7_44098377 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:admin/main.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/editor.md@1.5.0/css/editormd.min.css"/>

<main class="content">
    <div class="content-header ui-content-header">
        <div class="container">
            <h1 class="content-heading">Check the work order</h1>
        </div>
    </div>
    <div class="container">
        <div class="col-lg-12 col-sm-12">
            <section class="content-inner margin-top-no">

                <div class="card">
                    <div class="card-main">
                        <div class="card-inner">
                            <div class="form-group form-group-label">
                                <label class="floating-label" for="content">content</label>
                                <div id="editormd">
                                    <textarea style="display:none;" id="content"></textarea>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div aria-hidden="true" class="modal modal-va-middle fade" id="changetouser_modal" role="dialog"
                     tabindex="-1">
                    <div class="modal-dialog modal-xs">
                        <div class="modal-content">
                            <div class="modal-heading">
                                <a class="modal-close" data-dismiss="modal">×</a>
                                <h2 class="modal-title">Confirm to switch to the user?</h2>
                            </div>
                            <div class="modal-inner">
                                <p>After switching to the user, you can at any time through the menu at the bottom of the "return an administrator" button to return to this work order.</p>
                            </div>
                            <div class="modal-footer">
                                <p class="text-right">
                                    <button class="btn btn-flat btn-brand-accent waves-attach waves-effect" data-dismiss="modal" type="button">cancel</button>
                                    <button class="btn btn-flat btn-brand-accent waves-attach" data-dismiss="modal" id="changetouser_input" type="button">determine</button>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-main">
                        <div class="card-inner">

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-10">
                                        <button id="submit" type="submit" class="btn btn-brand waves-attach waves-light">add</button>
                                        <button id="close" type="submit" class="btn btn-brand-accent waves-attach waves-light">Add and close</button>
                                        <button id="close_directly" type="submit" class="btn btn-brand-accent waves-attach waves-light">Directly closed</button>
                                        <button  id="changetouser" class="btn btn-brand waves-attach waves-light" onClick="changetouser_modal_show()">Switch to the user</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php echo $_smarty_tpl->tpl_vars['ticketset']->value->render();?>

                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ticketset']->value, 'ticket');
$_smarty_tpl->tpl_vars['ticket']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['ticket']->value) {
$_smarty_tpl->tpl_vars['ticket']->do_else = false;
?>
                    <div class="card">
                        <aside class="card-side pull-left" style="padding: 16px; text-align: center">
                            <img style="border-radius: 100%; width: 100%" src="<?php echo $_smarty_tpl->tpl_vars['ticket']->value->User()->gravatar;?>
">
                            <br>
                            <?php echo $_smarty_tpl->tpl_vars['ticket']->value->User()->user_name;?>

                        </aside>
                        <div class="card-main">
                            <div class="card-inner">
                                <?php echo $_smarty_tpl->tpl_vars['ticket']->value->content;?>

                            </div>
                            <div class="card-action" style="padding: 12px"> <?php echo $_smarty_tpl->tpl_vars['ticket']->value->datetime();?>
</div>
                        </div>
                    </div>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                <?php echo $_smarty_tpl->tpl_vars['ticketset']->value->render();?>



                <?php $_smarty_tpl->_subTemplateRender('file:dialog.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

        </div>

    </div>
</main>

<?php $_smarty_tpl->_subTemplateRender('file:admin/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/editor.md@1.5.0/editormd.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
    function changetouser_modal_show() {
        $("#changetouser_modal").modal();
    }

    window.addEventListener('load', () => {
        function submit() {
            $("#result").modal();
            $$.getElementById('msg').innerHTML = `Is submitted。`;
            $.ajax({
                type: "PUT",
                url: "/admin/ticket/<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
",
                dataType: "json",
                data: {
                    content: editor.getHTML(),
                    status
                },
                success: data => {
                    if (data.ret) {
                        $("#result").modal();
                        $$.getElementById('msg').innerHTML = data.msg;
                        window.setTimeout("location.href=top.document.referrer", <?php echo $_smarty_tpl->tpl_vars['config']->value['jump_delay'];?>
);
                    } else {
                        $("#result").modal();
                        $$.getElementById('msg').innerHTML = data.msg;
                    }
                },
                error: jqXHR => {
                    $("#result").modal();
                    $$.getElementById('msg').innerHTML = `An error occurred：${
                            jqXHR.status
                            }`;
                }
            });
        }

        $$.getElementById('submit').addEventListener('click', () => {
            status = 1;
            submit();
        });

        $$.getElementById('close').addEventListener('click', () => {
            status = 0;
            submit();
        });

        $$.getElementById('close_directly').addEventListener('click', () => {
            status = 0;
            $("#result").modal();
            $$.getElementById('msg').innerHTML = `Is submitted。`;
            $.ajax({
                type: "PUT",
                url: "/admin/ticket/<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
",
                dataType: "json",
                data: {
                    content: 'The work order has been closed',
                    status
                },
                success: data => {
                    if (data.ret) {
                        $("#result").modal();
                        $$.getElementById('msg').innerHTML = data.msg;
                        window.setTimeout("location.href=top.document.referrer", <?php echo $_smarty_tpl->tpl_vars['config']->value['jump_delay'];?>
);
                    } else {
                        $("#result").modal();
                        $$.getElementById('msg').innerHTML = data.msg;
                    }
                },
                error: jqXHR => {
                    $("#result").modal();
                    $$.getElementById('msg').innerHTML = `An error occurred：${
                            jqXHR.status
                            }`;
                }
            });
        });

        function changetouser_id() {
            $.ajax({
                type: "POST",
                url: "/admin/user/changetouser",
                dataType: "json",
                data: {
                    userid: <?php echo $_smarty_tpl->tpl_vars['ticket']->value->User()->id;?>
,
                    adminid: <?php echo $_smarty_tpl->tpl_vars['user']->value->id;?>
,
                    local: '/admin/ticket/' + <?php echo $_smarty_tpl->tpl_vars['ticket']->value->id;?>
 +'/view'
                },
                success: data => {
                    if (data.ret) {
                        $("#result").modal();
                        $$.getElementById('msg').innerHTML = data.msg;
                        window.setTimeout("location.href='/user'", <?php echo $_smarty_tpl->tpl_vars['config']->value['jump_delay'];?>
);
                    } else {
                        $("#result").modal();
                        $$.getElementById('msg').innerHTML = data.msg;
                    }
                },
                error: jqXHR => {
                    $("#result").modal();
                    $$.getElementById('msg').innerHTML = `An error occurred：${
                            jqXHR.status
                            }`;
                }
            });
        }

        $$.getElementById('changetouser_input').addEventListener('click', () => {
            changetouser_id();
        });

    });

    (() => {
        editor = editormd("editormd", {
            path: "https://cdn.jsdelivr.net/npm/editor.md@1.5.0/lib/", // Autoload modules mode, codemirror, marked... dependents libs path
            height: 450,
            saveHTMLToTextarea: true,
            emoji: true
        });

        /*
        // or
        var editor = editormd({
            id   : "editormd",
            path : "../lib/"
        });
        */
    })();

<?php echo '</script'; ?>
>
<?php }
}
