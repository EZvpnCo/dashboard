<?php
/* Smarty version 3.1.47, created on 2022-12-04 19:20:49
  from '/www/wwwroot/EZvpn/main-panel/resources/views/metron/admin/invite.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.47',
  'unifunc' => 'content_638c8291519cc4_87864238',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3007266a4afe5a90f3afe7cd68af30a786095e72' => 
    array (
      0 => '/www/wwwroot/EZvpn/main-panel/resources/views/metron/admin/invite.tpl',
      1 => 1670053666,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:admin/main.tpl' => 1,
    'file:table/checkbox.tpl' => 1,
    'file:table/table.tpl' => 1,
    'file:dialog.tpl' => 1,
    'file:admin/footer.tpl' => 1,
    'file:table/js_1.tpl' => 1,
    'file:table/js_2.tpl' => 1,
  ),
),false)) {
function content_638c8291519cc4_87864238 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:admin/main.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<main class="content">
    <div class="content-header ui-content-header">
        <div class="container">
            <h1 class="content-heading">The invitation</h1>
        </div>
    </div>
    <div class="container">
        <section class="content-inner margin-top-no">

            <div class="card">
                <div class="card-main">
                    <div class="card-inner">
                        <p>Public invitation code function has been abandoned, if you want to open registration in, please .config.php Lt. register_mode The project is set to open </p>
                    </div>
                </div>
            </div>

            <div class="card">
				<div class="card-main">
					<div class="card-inner">

						<div class="form-group form-group-label">
							<label class="floating-label" for="userid">Users need to modify the inviter</label>
							<input class="form-control maxwidth-edit" id="userid" type="text">
							<p class="form-control-guide"><i class="material-icons">info</i>Fill in the userID</p>
						</div>

						<div class="form-group form-group-label">
							<label class="floating-label" for="refid">Inviter'sID</label>
							<input class="form-control maxwidth-edit" id="refid" type="number">
						</div>


					</div>

					<div class="card-action">
						<div class="card-action-btn pull-left">
							<a class="btn btn-flat waves-attach" id="confirm"><span class="icon">check</span>&nbsp;To change the</a>
						</div>
					</div>
				</div>
			</div>

            <div class="card">
                <div class="card-main">
                    <div class="card-inner">

                        <div class="form-group form-group-label">
                            <label class="floating-label" for="uid">The number of users need to increase the invitation link</label>
                            <input class="form-control maxwidth-edit" id="uid" type="text">
                            <p class="form-control-guide"><i class="material-icons">info</i>Fill in the userIDA complete mailbox, or the user</p>
                        </div>

                        <div class="form-group form-group-label">
                            <label class="floating-label" for="prefix">Invite link number</label>
                            <input class="form-control maxwidth-edit" id="num" type="number">
                        </div>


                    </div>

                    <div class="card-action">
                        <div class="card-action-btn pull-left">
                            <a class="btn btn-flat waves-attach" id="invite"><span class="icon">check</span>&nbsp;increase</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card margin-bottom-no">
                <div class="card-main">
                    <div class="card-inner">
                        <p class="card-heading">Rebate record</p>
                        <p>Display list item: <?php $_smarty_tpl->_subTemplateRender('file:table/checkbox.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
                        </p>
                        <div class="card-table">
                            <div class="table-responsive">
                                <?php $_smarty_tpl->_subTemplateRender('file:table/table.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
                            </div>
                        </div>


                    </div>
                </div>
            </div>

            <?php $_smarty_tpl->_subTemplateRender('file:dialog.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


    </div>


</main>


<?php $_smarty_tpl->_subTemplateRender('file:admin/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php echo '<script'; ?>
>
    <?php $_smarty_tpl->_subTemplateRender('file:table/js_1.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


    $$.getElementById('invite').addEventListener('click', () => {
        $.ajax({
            type: "POST",
            url: "/admin/invite",
            dataType: "json",
            data: {
                prefix: $$getValue('invite'),
                uid: $$getValue('uid'),
                num: $$getValue('num'),
            },
            success: data => {
                if (data.ret) {
                    $("#result").modal();
                    $$.getElementById('msg').innerHTML = data.msg;
                    window.setTimeout("location.href='/admin/invite'", <?php echo $_smarty_tpl->tpl_vars['config']->value['jump_delay'];?>
 );
                } else {
                    $("#result").modal();
                    $$.getElementById('msg').innerHTML = data.msg;
                }
                // window.location.reload();
            },
            error: jqXHR => {
                alert(`An error occurred：${
                        jqXHR.status
                        }`);
            }
        })
    })

    $$.getElementById('confirm').addEventListener('click', () => {
        $.ajax({
            type: "POST",
            url: "/admin/chginvite",
            dataType: "json",
            data: {
                prefix: $$.getElementById('confirm').value,
                userid: $$.getElementById('userid').value,
                refid: $$.getElementById('refid').value,
            },
            success: data => {
                if (data.ret) {
                    $("#result").modal();
                    $$.getElementById('msg').innerHTML = data.msg;
                    window.setTimeout("location.href='/admin/invite'", <?php echo $_smarty_tpl->tpl_vars['config']->value['jump_delay'];?>
 );
                } else {
                    $("#result").modal();
                    $$.getElementById('msg').innerHTML = data.msg;
                }
                // window.location.reload();
            },
            error: jqXHR => {
                alert(`An error occurred：${jqXHR.status}`);
            }
        })
    })

    window.addEventListener('load', () => {
        <?php $_smarty_tpl->_subTemplateRender('file:table/js_2.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    });
<?php echo '</script'; ?>
>
<?php }
}
