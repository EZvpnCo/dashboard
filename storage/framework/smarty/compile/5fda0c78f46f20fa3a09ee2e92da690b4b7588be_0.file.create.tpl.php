<?php
/* Smarty version 3.1.47, created on 2022-10-16 17:28:21
  from '/www/wwwroot/subscribe/resources/views/metron/admin/node/create.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.47',
  'unifunc' => 'content_634bceb5772550_42698596',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5fda0c78f46f20fa3a09ee2e92da690b4b7588be' => 
    array (
      0 => '/www/wwwroot/subscribe/resources/views/metron/admin/node/create.tpl',
      1 => 1665876375,
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
function content_634bceb5772550_42698596 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:admin/main.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_smarty_tpl->_assignInScope('methods', array('none','aes-128-ctr','aes-192-ctr','aes-256-ctr','aes-128-cfb','aes-192-cfb','aes-256-cfb','aes-128-cfb8','aes-192-cfb8','aes-256-cfb8','rc4','rc4-md5','rc4-md5-6','salsa20','chacha20','xsalsa20','xchacha20','chacha20-ietf'));
$_smarty_tpl->_assignInScope('protocols', array('origin','verify_deflate','auth_sha1_v4','auth_aes128_md5','auth_aes128_sha1','auth_chain_a','auth_chain_b','auth_chain_c','auth_chain_d','auth_chain_e','auth_chain_f','auth_akarin_rand','auth_akarin_spec_a'));
$_smarty_tpl->_assignInScope('obfss', array('plain','http_simple','http_post','random_head','tls1.2_ticket_auth','tls1.2_ticket_fastauth'));?>

<main class="content">
    <div class="content-header ui-content-header">
        <div class="container">
            <h1 class="content-heading">添加节点</h1>
        </div>
    </div>
    <div class="container">
        <div class="col-lg-12 col-sm-12">
            <section class="content-inner margin-top-no">
                <form id="main_form">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-main">
                                    <div class="card-inner">
                                        <div class="form-group form-group-label">
                                            <label class="floating-label" for="name">节点名称</label>
                                            <input class="form-control maxwidth-edit" id="name" type="text" name="name">
                                        </div>
                                        <div class="form-group form-group-label">
                                            <label class="floating-label" for="server">节点地址</label>
                                            <input class="form-control maxwidth-edit" id="server" type="text" name="server">
                                        </div>
                                        <div class="form-group form-group-label">
                                            <label class="floating-label" for="server">节点IP</label>
                                            <input class="form-control maxwidth-edit" id="node_ip" name="node_ip" type="text">
                                            <p class="form-control-guide"><i class="material-icons">info</i>如果“节点地址”填写为域名，则此处的值会被忽视
                                            </p>
                                        </div>
                                        <!--
                                        <div class="form-group form-group-label" hidden="hidden">
                                            <label class="floating-label" for="method">加密方式</label>
                                            <input class="form-control maxwidth-edit" id="method" type="text" name="method"
                                                   value="aes-256-cfb">
                                        </div> -->

                                        <div class="form-group form-group-label">
                                            <label class="floating-label" for="rate">流量比例</label>
                                            <input class="form-control maxwidth-edit" id="rate" type="text" name="rate"
                                                   value="1">
                                        </div>

                                        <div class="form-group form-group-label" hidden="hidden">
                                            <div class="checkbox switch">
                                                <label for="custom_method">
                                                    <input class="access-hide" id="custom_method" type="checkbox"
                                                           name="custom_method" checked="checked" disabled><span
                                                            class="switch-toggle"></span>自定义加密
                                                </label>
                                            </div>
                                        </div>

                                        <div class="form-group form-group-label" hidden="hidden">
                                            <div class="checkbox switch">
                                                <label for="custom_rss">
                                                    <input class="access-hide" id="custom_rss" type="checkbox" name="custom_rss"
                                                           checked="checked" disabled><span class="switch-toggle"></span>自定义协议&混淆
                                                </label>
                                            </div>
                                        </div>

                                        <div class="form-group form-group-label">
                                            <label for="mu_only">
                                                <label class="floating-label" for="sort">单端口多用户启用</label>
                                                <select id="mu_only" class="form-control maxwidth-edit" name="is_multi_user">
                                                    <option value="-1">只启用普通端口</option>
                                                    <option value="0">单端口多用户与普通端口并存</option>
                                                    <option value="1">只启用单端口多用户</option>
                                                </select>
                                            </label>
                                        </div>


                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-main">
                                    <div class="card-inner">
                                        <p class="form-control-guide"><i class="material-icons">info</i>当设置为"只启用单端口多用户", 并且多用户端口不为 0 时, 下发该节点自定义配置</p>
                                        <div class="form-group form-group-label">
                                            <label class="floating-label" for="port">多用户端口</label>
                                            <input class="form-control maxwidth-edit" id="port" name="port" type="text" value="0">
                                        </div>
                                        <div class="form-group form-group-label">
                                            <label class="floating-label" for="passwd">节点密码</label>
                                            <input class="form-control maxwidth-edit" id="passwd" name="passwd" type="text" value="MetronTheme">
                                        </div>
                                        <div class="form-group form-group-label">
                                            <label for="method">
                                                <label class="floating-label" for="method">加密方式</label>
                                                <select id="method" class="form-control maxwidth-edit" name="method">
                                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['methods']->value, 'method');
$_smarty_tpl->tpl_vars['method']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['method']->value) {
$_smarty_tpl->tpl_vars['method']->do_else = false;
?>
                                                        <option value="<?php echo $_smarty_tpl->tpl_vars['method']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['method']->value;?>
</option>
                                                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                                </select>
                                            </label>
                                        </div>
                                        <div class="form-group form-group-label">
                                            <label for="protocol">
                                                <label class="floating-label" for="protocol">协议</label>
                                                <select id="protocol" class="form-control maxwidth-edit" name="protocol">
                                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['protocols']->value, 'protocol');
$_smarty_tpl->tpl_vars['protocol']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['protocol']->value) {
$_smarty_tpl->tpl_vars['protocol']->do_else = false;
?>
                                                        <option value="<?php echo $_smarty_tpl->tpl_vars['protocol']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['protocol']->value;?>
</option>
                                                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                                </select>
                                            </label>
                                        </div>
                                        <div class="form-group form-group-label">
                                            <label for="obfs">
                                                <label class="floating-label" for="obfs">混淆方式</label>
                                                <select id="obfs" class="form-control maxwidth-edit" name="obfs">
                                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['obfss']->value, 'obfs');
$_smarty_tpl->tpl_vars['obfs']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['obfs']->value) {
$_smarty_tpl->tpl_vars['obfs']->do_else = false;
?>
                                                        <option value="<?php echo $_smarty_tpl->tpl_vars['obfs']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['obfs']->value;?>
</option>
                                                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                                </select>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-main">
                                    <div class="card-inner">
                                        <div class="form-group form-group-label">
                                            <div class="checkbox switch">
                                                <label for="type">
                                                    <input checked class="access-hide" id="type" type="checkbox"
                                                           name="type"><span class="switch-toggle"></span>是否显示
                                                </label>
                                            </div>
                                        </div>


                                        <div class="form-group form-group-label">
                                            <label class="floating-label" for="status">节点状态</label>
                                            <input class="form-control maxwidth-edit" id="status" type="text" name="status"
                                                   value="可用">
                                        </div>

                                        <div class="form-group form-group-label">
                                            <div class="form-group form-group-label">
                                                <label class="floating-label" for="sort">节点类型</label>
                                                <select id="sort" class="form-control maxwidth-edit" name="sort">
                                                    <option value="0">Shadowsocks</option>
                                                    <option value="1">VPN/Radius基础</option>
                                                    <option value="2">SSH</option>
                                                    <option value="5">Anyconnect</option>
                                                    <option value="9">Shadowsocks 单端口多用户</option>
                                                    <option value="10">Shadowsocks 中转</option>
                                                    <option value="11">V2Ray</option>
                                                    <option value="12">V2Ray 中转</option>
                                                    <option value="13">Shadowsocks V2Ray-Plugin&Obfs</option>
                                                    <option value="14">Trojan</option>
                                                    <option value="15">V2Ray-VLESS</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group form-group-label">
                                            <label class="floating-label" for="info">节点描述</label>
                                            <input class="form-control maxwidth-edit" id="info" type="text" name="info"
                                                   value="无描述">
                                        </div>

                                        <div class="form-group form-group-label">
                                            <label class="floating-label" for="class">节点等级</label>
                                            <input class="form-control maxwidth-edit" id="class" type="text" value="0"
                                                   name="class">
                                            <p class="form-control-guide"><i class="material-icons">info</i>不分级请填0，分级填写相应数字</p>
                                        </div>


                                        <div class="form-group form-group-label">
                                            <label class="floating-label" for="group">节点群组</label>
                                            <input class="form-control maxwidth-edit" id="group" type="text" value="0"
                                                   name="group">
                                            <p class="form-control-guide"><i class="material-icons">info</i>分组为数字，不分组请填0</p>
                                        </div>


                                        <div class="form-group form-group-label">
                                            <label class="floating-label" for="node_bandwidth_limit">节点流量上限（GB）</label>
                                            <input class="form-control maxwidth-edit" id="node_bandwidth_limit" type="text"
                                                   value="0" name="node_bandwidth_limit">
                                            <p class="form-control-guide"><i class="material-icons">info</i>不设上限请填0</p>
                                        </div>

                                        <div class="form-group form-group-label">
                                            <label class="floating-label" for="bandwidthlimit_resetday">节点流量上限清空日</label>
                                            <input class="form-control maxwidth-edit" id="bandwidthlimit_resetday" type="text"
                                                   value="1" name="bandwidthlimit_resetday">
                                        </div>

                                        <div class="form-group form-group-label">
                                            <label class="floating-label" for="node_speedlimit">节点限速（Mbps）</label>
                                            <input class="form-control maxwidth-edit" id="node_speedlimit" type="text" value="0"
                                                   name="node_speedlimit">
                                            <p class="form-control-guide"><i class="material-icons">info</i>不限速填0，对于每个用户端口生效</p>
                                        </div>

                                        <div class="form-group form-group-label">
                                            <label class="floating-label" for="node_speedlimit">节点排序</label>
                                            <input class="form-control maxwidth-edit" id="node_sort" type="text" value="0"
                                                   name="node_sort">
                                            <p class="form-control-guide"><i class="material-icons">info</i>数字越大越靠前</p>
                                        </div>
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
                                            <button id="submit" type="submit"
                                                    class="btn btn-block btn-brand waves-attach waves-light">添加
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <?php $_smarty_tpl->_subTemplateRender('file:dialog.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


        </div>


    </div>
</main>

<?php $_smarty_tpl->_subTemplateRender('file:admin/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<?php echo '<script'; ?>
>
    
    $('#main_form').validate({
        rules: {
            name: {required: true},
            method: {required: true},
            rate: {required: true},
            info: {required: true},
            group: {required: true},
            status: {required: true},
            node_speedlimit: {required: true},
            sort: {required: true},
            node_bandwidth_limit: {required: true},
            bandwidthlimit_resetday: {required: true}
        },

        submitHandler: () => {
            if ($$.getElementById('custom_method').checked) {
                var custom_method = 1;
            } else {
                var custom_method = 0;
            }

            if ($$.getElementById('type').checked) {
                var type = 1;
            } else {
                var type = 0;
            }
            
            if ($$.getElementById('custom_rss').checked) {
                var custom_rss = 1;
            } else {
                var custom_rss = 0;
            }

            $.ajax({
                type: "POST",
                url: "/admin/node",
                dataType: "json",
                data: {
                    name: $$getValue('name'),
                    server: $$getValue('server'),
                    node_ip: $$getValue('node_ip'),
                    method: $$getValue('method'),
                    port: $$getValue("port"),
                    obfs: $$getValue("obfs"),
                    protocol: $$getValue("protocol"),
                    passwd: $$getValue("passwd"),
                    custom_method,
                    rate: $$getValue('rate'),
                    info: $$getValue('info'),
                    type,
                    group: $$getValue('group'),
                    status: $$getValue('status'),
                    node_speedlimit: $$getValue('node_speedlimit'),
                    node_sort: $$getValue('node_sort'),
                    sort: $$getValue('sort'),
                    class: $$getValue('class'),
                    node_bandwidth_limit: $$getValue('node_bandwidth_limit'),
                    bandwidthlimit_resetday: $$getValue('bandwidthlimit_resetday'),
                    custom_rss,
                    mu_only: $$getValue('mu_only')
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
                error: (jqXHR) => {
                    $("#result").modal();
                    $$.getElementById('msg').innerHTML = `发生错误：${
                            jqXHR.status
                    }`;
                }
            });
        }
    });

<?php echo '</script'; ?>
>
<?php }
}
