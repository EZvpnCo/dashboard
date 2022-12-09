<?php
/* Smarty version 3.1.47, created on 2022-12-09 18:03:13
  from '/www/wwwroot/EZvpn/main-panel/resources/views/metron/admin/user/edit.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.47',
  'unifunc' => 'content_639307e18321f2_37058268',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3505b9b29aeff7d5dbc5cb6cd752da05563b619c' => 
    array (
      0 => '/www/wwwroot/EZvpn/main-panel/resources/views/metron/admin/user/edit.tpl',
      1 => 1670053668,
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
function content_639307e18321f2_37058268 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:admin/main.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<main class="content">
    <div class="content-header ui-content-header">
        <div class="container">
            <h1 class="content-heading">The user to edit #<?php echo $_smarty_tpl->tpl_vars['edit_user']->value->id;?>
</h1>
        </div>
    </div>
    <div class="container">
        <div class="col-lg-12 col-sm-12">
            <section class="content-inner margin-top-no">

                <div class="card">
                    <div class="card-main">
                        <div class="card-inner">
                            <div class="form-group form-group-label">
                                <label class="floating-label" for="email">email</label>
                                <input class="form-control maxwidth-edit" id="email" type="email"
                                       value="<?php echo $_smarty_tpl->tpl_vars['edit_user']->value->email;?>
">
                            </div>

                            <div class="form-group form-group-label">
                                <label class="floating-label" for="remark">note(Only the administrator is visible)</label>
                                <input class="form-control maxwidth-edit" id="remark" type="text"
                                       value="<?php echo $_smarty_tpl->tpl_vars['edit_user']->value->remark;?>
">
                            </div>

                            <div class="form-group form-group-label">
                                <label class="floating-label" for="pass">password(Do not change the blank, please)</label>
                                <input class="form-control maxwidth-edit" id="pass" type="password"
                                       autocomplete="new-password">
                            </div>

                            <div class="form-group form-group-label">
                                <div class="checkbox switch">
                                    <label for="is_admin">
                                        <input <?php if ($_smarty_tpl->tpl_vars['edit_user']->value->is_admin == 1) {?>checked<?php }?> class="access-hide"
                                               id="is_admin" type="checkbox"><span class="switch-toggle"></span>If the administrator
                                    </label>
                                </div>
                            </div>

                            <div class="form-group form-group-label">
                                <div class="checkbox switch">
                                    <label for="enable">
                                        <input <?php if ($_smarty_tpl->tpl_vars['edit_user']->value->enable == 1) {?>checked<?php }?> class="access-hide" id="enable"
                                               type="checkbox"><span class="switch-toggle"></span>The user is enabled
                                    </label>
                                </div>
                            </div>

                            <div class="form-group form-group-label">
                                <div class="checkbox switch">
                                    <label for="ga_enable">
                                        <input <?php if ($_smarty_tpl->tpl_vars['edit_user']->value->ga_enable == 1) {?>checked<?php }?> class="access-hide"
                                               id="ga_enable" type="checkbox"><span class="switch-toggle"></span>Whether to open the secondary authentication
                                    </label>
                                </div>
                            </div>

                            <div class="form-group form-group-label">
                                <label class="floating-label" for="money">money</label>
                                <input class="form-control maxwidth-edit" id="money" type="text"
                                       value="<?php echo $_smarty_tpl->tpl_vars['edit_user']->value->money;?>
">
                            </div>

                            <div class="form-group form-group-label">
                                <label for="is_multi_user">
                                    <label class="floating-label" for="sort">Single port user load port</label>
                                    <select id="is_multi_user" class="form-control maxwidth-edit" name="is_multi_user">
                                        <option value="0" <?php if ($_smarty_tpl->tpl_vars['edit_user']->value->is_multi_user == 0) {?>selected<?php }?>>Not a single port loading port by the user
                                        </option>
                                        <option value="1" <?php if ($_smarty_tpl->tpl_vars['edit_user']->value->is_multi_user == 1) {?>selected<?php }?>>Mixed type single port user load port
                                        </option>
                                        <option value="2" <?php if ($_smarty_tpl->tpl_vars['edit_user']->value->is_multi_user == 2) {?>selected<?php }?>>Protocol type single port user load port
                                        </option>
                                    </select>
                                </label>
                            </div>


                        </div>
                    </div>
                </div>

				<div class="card">
					<div class="card-main">
						<div class="card-inner">

                            <div class="form-group form-group-label">
                                <div class="checkbox switch">
                                    <label for="agent">
                                        <input <?php if ($_smarty_tpl->tpl_vars['edit_user']->value->agent == 1) {?>checked<?php }?> class="access-hide" id="agent" type="checkbox"><span class="switch-toggle"></span>Whether the agent
                                    </label>
                                    <p class="form-control-guide"><i class="material-icons">info</i>This function needs additional topic Agent authorization, Open useless without authorization</p>
                                </div>
                            </div>

                            <div class="form-group form-group-label">
                                <div class="checkbox switch">
                                    <label for="c_rebate">
                                        <input <?php if ($_smarty_tpl->tpl_vars['edit_user']->value->c_rebate == 1) {?>checked<?php }?> class="access-hide" id="c_rebate" type="checkbox"><span class="switch-toggle"></span>Open loop rebate
                                    </label>
                                    <p class="form-control-guide"><i class="material-icons">info</i>Apply to all users, Including the agent</p>
                                </div>
                            </div>
                            
                            <div class="form-group form-group-label">
                                <label class="floating-label" for="back_money">The rebate balance</label>
                                <input class="form-control maxwidth-edit" id="back_money" type="text" value="<?php echo $_smarty_tpl->tpl_vars['edit_user']->value->back_money;?>
">
                                <p class="form-control-guide"><i class="material-icons">info</i>Apply to all users, Including the agent</p>
                            </div>

                            <div class="form-group form-group-label">
                                <label class="floating-label" for="rebate">Rebate percentage</label>
                                <input class="form-control maxwidth-edit" id="rebate" type="text" value="<?php echo $_smarty_tpl->tpl_vars['edit_user']->value->rebate;?>
">
                                <p class="form-control-guide"><i class="material-icons">info</i>Apply to all users, Including the agent;  -1 According to the .config.php Set the rebate percentage in rebate, The other to the corresponding proportion</p>
                            </div>

						</div>
					</div>
				</div>

				<div class="card">
					<div class="card-main">
						<div class="card-inner">

                            <div class="form-group form-group-label">
                                <label class="floating-label" for="ban_time">The manual banned time (minutesnutes), do not ban don't change</label>
                                <input class="form-control maxwidth-edit" id="ban_time" type="text"
                                       value="0">
                            </div>

                            <div class="form-group form-group-label">
                                <label class="floating-label" for="last_detect_ban_time">The last time is banned</label>
                                <input class="form-control maxwidth-edit" id="last_detect_ban_time" type="text"
                                       value="<?php echo $_smarty_tpl->tpl_vars['edit_user']->value->last_detect_ban_time();?>
" readonly>
                            </div>

                            <div class="form-group form-group-label">
                                <label class="floating-label" for="relieve_time">The current unlock time</label>
                                <input class="form-control maxwidth-edit" id="relieve_time" type="text"
                                       value="<?php echo $_smarty_tpl->tpl_vars['edit_user']->value->relieve_time();?>
" readonly>
                            </div>

                            <div class="form-group form-group-label">
                                <label class="floating-label" for="detect_ban_number">The cumulative number of banned</label>
                                <input class="form-control maxwidth-edit" id="detect_ban_number" type="text"
                                       value="<?php if ($_smarty_tpl->tpl_vars['edit_user']->value->detect_ban_number() == 0) {?>Benchmarking users, not been banned<?php } else { ?>It's too bad, the user has been banned <?php echo $_smarty_tpl->tpl_vars['edit_user']->value->detect_ban_number();?>
 Times?<?php }?>" readonly>
                            </div>

                            <div class="form-group form-group-label">
                                <label class="floating-label" for="all_detect_number">The cumulative number of violations</label>
                                <input class="form-control maxwidth-edit" id="all_detect_number" type="text"
                                       value="<?php echo $_smarty_tpl->tpl_vars['edit_user']->value->all_detect_number;?>
" readonly>
                            </div>

						</div>
					</div>
				</div>

                <div class="card">
                    <div class="card-main">
                        <div class="card-inner">
                            <div class="form-group form-group-label">
                                <label class="floating-label" for="port">End connections</label>
                                <input class="form-control maxwidth-edit" id="port" type="text"
                                       value="<?php echo $_smarty_tpl->tpl_vars['edit_user']->value->port;?>
">
                            </div>

                            <div class="form-group form-group-label">
                                <label class="floating-label" for="passwd">Connect the password</label>
                                <input class="form-control maxwidth-edit" id="passwd" type="text"
                                       value="<?php echo $_smarty_tpl->tpl_vars['edit_user']->value->passwd;?>
">
                            </div>

                            <div class="form-group form-group-label">
                                <label class="floating-label" for="method">A custom encryption</label>
                                <input class="form-control maxwidth-edit" id="method" type="text"
                                       value="<?php echo $_smarty_tpl->tpl_vars['edit_user']->value->method;?>
">
                            </div>

                            <div class="form-group form-group-label">
                                <label class="floating-label" for="protocol">The custom protocol</label>
                                <input class="form-control maxwidth-edit" id="protocol" type="text"
                                       value="<?php echo $_smarty_tpl->tpl_vars['edit_user']->value->protocol;?>
">
                            </div>

                            <div class="form-group form-group-label">
                                <label class="floating-label" for="protocol_param">The custom protocol parameters</label>
                                <input class="form-control maxwidth-edit" id="protocol_param" type="text"
                                       value="<?php echo $_smarty_tpl->tpl_vars['edit_user']->value->protocol_param;?>
">
                            </div>

                            <div class="form-group form-group-label">
                                <label class="floating-label" for="obfs">Custom confusing way</label>
                                <input class="form-control maxwidth-edit" id="obfs" type="text"
                                       value="<?php echo $_smarty_tpl->tpl_vars['edit_user']->value->obfs;?>
">
                            </div>

                            <div class="form-group form-group-label">
                                <label class="floating-label" for="obfs_param">Confused custom parameters</label>
                                <input class="form-control maxwidth-edit" id="obfs_param" type="text"
                                       value="<?php echo $_smarty_tpl->tpl_vars['edit_user']->value->obfs_param;?>
">
                            </div>
                        </div>
                    </div>
                </div>


                <div class="card">
                    <div class="card-main">
                        <div class="card-inner">
                            <div class="form-group form-group-label">
                                <label class="floating-label" for="transfer_enable">Total flow (GB)</label>
                                <input class="form-control maxwidth-edit" id="transfer_enable" type="text"
                                       value="<?php echo $_smarty_tpl->tpl_vars['edit_user']->value->enableTrafficInGB();?>
">
                            </div>

                            <div class="form-group form-group-label">
                                <label class="floating-label" for="usedTraffic">Have used traffic</label>
                                <input class="form-control maxwidth-edit" id="usedTraffic" type="text"
                                       value="<?php echo $_smarty_tpl->tpl_vars['edit_user']->value->usedTraffic();?>
" readonly>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-main">
                        <div class="card-inner">
                            <div class="form-group form-group-label">
                                <label class="floating-label" for="auto_reset_day">Automatic reset flow</label>
                                <input class="form-control maxwidth-edit" id="auto_reset_day" type="number"
                                       value="<?php echo $_smarty_tpl->tpl_vars['edit_user']->value->auto_reset_day;?>
">
                            </div>

                            <div class="form-group form-group-label">
                                <label class="floating-label" for="auto_reset_bandwidth">Reset the flow value(GB)</label>
                                <input class="form-control maxwidth-edit" id="auto_reset_bandwidth" type="number"
                                       value="<?php echo $_smarty_tpl->tpl_vars['edit_user']->value->auto_reset_bandwidth;?>
">
                            </div>
                        </div>
                    </div>
                </div>


                <div class="card">
                    <div class="card-main">
                        <div class="card-inner">
                            <div class="form-group form-group-label">
                                <label class="floating-label" for="invite_num">Number of available invitation</label>
                                <input class="form-control maxwidth-edit" id="invite_num" type="number"
                                       value="<?php echo $_smarty_tpl->tpl_vars['edit_user']->value->invite_num;?>
">
                            </div>

                            <div class="form-group form-group-label">
                                <label class="floating-label" for="ref_by">inviterID</label>
                                <input class="form-control maxwidth-edit" id="ref_by" type="text"
                                       value="<?php echo $_smarty_tpl->tpl_vars['edit_user']->value->ref_by;?>
" readonly>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="card">
                    <div class="card-main">
                        <div class="card-inner">
                            <div class="form-group form-group-label">
                                <label class="floating-label" for="group">The user group</label>
                                <input class="form-control maxwidth-edit" id="group" type="number"
                                       value="<?php echo $_smarty_tpl->tpl_vars['edit_user']->value->node_group;?>
">
                                <p class="form-control-guide"><i class="material-icons">info</i>Users can only access to the group is equal to the number or0The nodes of the</p>
                            </div>

                            <div class="form-group form-group-label">
                                <label class="floating-label" for="class">User level</label>
                                <input class="form-control maxwidth-edit" id="class" type="number"
                                       value="<?php echo $_smarty_tpl->tpl_vars['edit_user']->value->class;?>
">
                                <p class="form-control-guide"><i class="material-icons">info</i>Users can only access to the level of less than or equal to the number of nodes</p>
                            </div>


                            <div class="form-group form-group-label">
                                <label class="floating-label" for="class_expire">User level expiration time</label>
                                <input class="form-control maxwidth-edit" id="class_expire" type="text"
                                       value="<?php echo $_smarty_tpl->tpl_vars['edit_user']->value->class_expire;?>
">
                                <p class="form-control-guide"><i class="material-icons">info</i>Please don't move without expired</p>
                            </div>

                            <div class="form-group form-group-label">
                                <label class="floating-label" for="expire_in">The user account expiration time</label>
                                <input class="form-control maxwidth-edit" id="expire_in" type="text"
                                       value="<?php echo $_smarty_tpl->tpl_vars['edit_user']->value->expire_in;?>
">
                                <p class="form-control-guide"><i class="material-icons">info</i>Please don't move without expired</p>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-main">
                        <div class="card-inner">

                            <div class="form-group form-group-label">
                                <label class="floating-label" for="node_speedlimit">Speed limit users, users enjoy the speed in each node(Mbps)</label>
                                <input class="form-control maxwidth-edit" id="node_speedlimit" type="text"
                                       value="<?php echo $_smarty_tpl->tpl_vars['edit_user']->value->node_speedlimit;?>
">
                                <p class="form-control-guide"><i class="material-icons">info</i>0 To not limit</p>
                            </div>

                            <div class="form-group form-group-label">
                                <label class="floating-label" for="node_connector">Users connected at the same time IP The number</label>
                                <input class="form-control maxwidth-edit" id="node_connector" type="text"
                                       value="<?php echo $_smarty_tpl->tpl_vars['edit_user']->value->node_connector;?>
">
                                <p class="form-control-guide"><i class="material-icons">info</i>0 To not limit</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-main">
                        <div class="card-inner">

                            <div class="form-group form-group-label">
                                <label class="floating-label" for="node_speedlimit">User access is prohibitedIPA line of one</label>
                                <textarea class="form-control maxwidth-edit" id="forbidden_ip"
                                          rows="8"><?php echo $_smarty_tpl->tpl_vars['edit_user']->value->get_forbidden_ip();?>
</textarea>
                            </div>

                            <div class="form-group form-group-label">
                                <label class="floating-label" for="node_speedlimit">Forbid user access port, a line one</label>
                                <textarea class="form-control maxwidth-edit" id="forbidden_port"
                                          rows="8"><?php echo $_smarty_tpl->tpl_vars['edit_user']->value->get_forbidden_port();?>
</textarea>
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
                                        <button id="submit" type="submit"
                                                class="btn btn-block btn-brand waves-attach waves-light">Modify the
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
>
    //document.getElementById("class_expire").value="<?php echo $_smarty_tpl->tpl_vars['edit_user']->value->class_expire;?>
";

    window.addEventListener('load', () => {
        function submit() {
            if (document.getElementById('is_admin').checked) {
                var is_admin = 1;
            } else {
                var is_admin = 0;
            }

            if (document.getElementById('enable').checked) {
                var enable = 1;
            } else {
                var enable = 0;
            }

            if (document.getElementById('ga_enable').checked) {
                var ga_enable = 1;
            } else {
                var ga_enable = 0;
            }
			
            if (document.getElementById('c_rebate').checked) {
                var c_rebate = 1;
            } else {
                var c_rebate = 0;
            }

            if (document.getElementById('agent').checked) {
                var agent = 1;
            } else {
                var agent = 0;
            }

            $.ajax({
                type: "PUT",
                url: "/admin/user/<?php echo $_smarty_tpl->tpl_vars['edit_user']->value->id;?>
",
                dataType: "json",
                data: {
                    email: $$getValue('email'),
                    pass: $$getValue('pass'),
                    auto_reset_day: $$getValue('auto_reset_day'),
                    auto_reset_bandwidth: $$getValue('auto_reset_bandwidth'),
                    is_multi_user: $$getValue('is_multi_user'),
                    port: $$getValue('port'),
                    group: $$getValue('group'),
                    passwd: $$getValue('passwd'),
                    transfer_enable: $$getValue('transfer_enable'),
                    invite_num: $$getValue('invite_num'),
                    node_speedlimit: $$getValue('node_speedlimit'),
                    method: $$getValue('method'),
                    remark: $$getValue('remark'),
                    money: $$getValue('money'),
                    c_rebate,
                    agent,
                    back_money: $$getValue('back_money'),
                    rebate: $$getValue('rebate'),
                    enable,
                    is_admin,
                    ga_enable,
                    ban_time: $$getValue('ban_time'),
                    ref_by: $$getValue('ref_by'),
                    forbidden_ip: $$getValue('forbidden_ip'),
                    forbidden_port: $$getValue('forbidden_port'),
                    class: $$getValue('class'),
                    class_expire: $$getValue('class_expire'),
                    expire_in: $$getValue('expire_in'),
                    node_connector: $$getValue('node_connector'),
                    protocol: $$getValue('protocol'),
                    protocol_param: $$getValue('protocol_param'),
                    obfs: $$getValue('obfs'),
                    obfs_param: $$getValue('obfs_param'),
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

        $("html").keydown(event => {
            if (event.keyCode == 13) {
                submit();
            }
        });

        $$.getElementById('submit').addEventListener('click', submit);

    })
<?php echo '</script'; ?>
>
<?php }
}
