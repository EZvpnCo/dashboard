<?php
/* Smarty version 3.1.47, created on 2022-12-09 19:14:14
  from '/www/wwwroot/EZvpn/main-panel/resources/views/metron/admin/announcement/create.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.47',
  'unifunc' => 'content_63931886779419_86191837',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f83093265e8c5d9b8d93b0cb1d6aad7e316fbf8b' => 
    array (
      0 => '/www/wwwroot/EZvpn/main-panel/resources/views/metron/admin/announcement/create.tpl',
      1 => 1670053666,
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
function content_63931886779419_86191837 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:admin/main.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<main class="content">
    <div class="content-header ui-content-header">
        <div class="container">
            <h1 class="content-heading">Add the announcement</h1>
        </div>
    </div>
    <div class="container">
        <div class="col-lg-12 col-md-12">
            <section class="content-inner margin-top-no">

                <div class="card">
                    <div class="card-main">
                        <div class="card-inner">
                            <div class="form-group form-group-label">
                                <label class="floating-label" for="content">content</label>
                                <link rel="stylesheet"
                                      href="https://cdn.jsdelivr.net/npm/editor.md@1.5.0/css/editormd.min.css"/>
                                <div id="editormd">
                                    <textarea style="display:none;" id="content"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-main">
                        <div class="card-inner">

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-10 col-md-push-1">
                                        <div class="form-group form-group-label">
                                            <label class="floating-label" for="vip">VIPlevel</label>
                                            <input class="form-control maxwidth-edit" id="vip" type="text" name="vip">
                                            <p class="form-control-guide"><i class="material-icons">info</i>Send to equal to or higher than the level of the user
                                                0To be graded</p>
                                            <div class="checkbox switch">
                                                <label for="issend">
                                                    <input class="access-hide" id="issend" type="checkbox"
                                                           name="issend"><span class="switch-toggle"></span>Whether to send the mail
                                                </label>
                                            </div>

                                            <div class="checkbox switch">
                                                <label for="isaliyunapisend">
                                                    <input class="access-hide" id="isaliyunapisend" type="checkbox"
                                                           name="isaliyunapisend"><span class="switch-toggle"></span>Whether through ali cloud mail delivery WEB API Send E-mail
                                                </label>
                                            </div>

                                            <div class="checkbox switch">
                                                <label for="PushBear">
                                                    <input class="access-hide" id="PushBear" type="checkbox"
                                                           name="PushBear"><span class="switch-toggle"></span>Whether to usePushBear
                                                </label>
                                            </div>
                                            <p class="form-control-guide"><i class="material-icons">info</i>To focus on the user to push WeChat way qr code messages
                                            </p>
                                        </div>

                                        <button id="submit" type="submit"
                                                class="btn btn-block btn-brand waves-attach waves-light">add
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


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
    (() => {
        editor = editormd("editormd", {
            path: "https://cdn.jsdelivr.net/npm/editor.md@1.5.0/lib/", // Autoload modules mode, codemirror, marked... dependents libs path
            height: 720,
            saveHTMLToTextarea: true
        });

        /*
        // or
        var editor = editormd({
            id   : "editormd",
            path : "../lib/"
        });
        */
    })();

    window.addEventListener('load', () => {
        function submit(page = -1) {

            if ($$.getElementById('issend').checked) {
                var issend = 1;
            } else {
                var issend = 0;
            }
            if ($$.getElementById('isaliyunapisend').checked) {
                var isaliyunapisend = 1;
            } else {
                var isaliyunapisend = 0;
            }
            if ($$.getElementById('PushBear').checked) {
                var PushBear = 1;
            } else {
                var PushBear = 0;
            }
            if (page === -1) {
                sedPage = 1;
            } else {
                sedPage = page;
                var PushBear = 0;

            }
            $.ajax({
                type: "POST",
                url: "/admin/announcement",
                dataType: "json",
                data: {
                    content: editor.getHTML(),
                    markdown: $('.editormd-markdown-textarea').val(),
                    vip: $$getValue('vip'),
                    issend,
                    isaliyunapisend,
                    PushBear,
                    page: sedPage
                },
                success: data => {
                    if (data.ret === 1) {
                        $("#result").modal();
                        $$.getElementById('msg').innerHTML = data.msg;
                        window.setTimeout("location.href=top.document.referrer", <?php echo $_smarty_tpl->tpl_vars['config']->value['jump_delay'];?>
);
                    } else if (data.ret === 2) {
                        submit(data.msg);
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
            submit();
        });
    });


<?php echo '</script'; ?>
>
<?php }
}
