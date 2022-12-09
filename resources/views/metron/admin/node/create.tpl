{include file='admin/main.tpl'}
{$methods = [
'none',
'aes-128-ctr',
'aes-192-ctr',
'aes-256-ctr',
'aes-128-cfb',
'aes-192-cfb',
'aes-256-cfb',
'aes-128-cfb8',
'aes-192-cfb8',
'aes-256-cfb8',
'rc4',
'rc4-md5',
'rc4-md5-6',
'salsa20',
'chacha20',
'xsalsa20',
'xchacha20',
'chacha20-ietf'
]}
{$protocols = [
'origin',
'verify_deflate',
'auth_sha1_v4',
'auth_aes128_md5',
'auth_aes128_sha1',
'auth_chain_a',
'auth_chain_b',
'auth_chain_c',
'auth_chain_d',
'auth_chain_e',
'auth_chain_f',
'auth_akarin_rand',
'auth_akarin_spec_a'
]}
{$obfss = [
'plain',
'http_simple',
'http_post',
'random_head',
'tls1.2_ticket_auth',
'tls1.2_ticket_fastauth'
]}

<main class="content">
    <div class="content-header ui-content-header">
        <div class="container">
            <h1 class="content-heading">Add a node</h1>
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
                                            <label class="floating-label" for="name">The name of the node</label>
                                            <input class="form-control maxwidth-edit" id="name" type="text" name="name">
                                        </div>
                                        <div class="form-group form-group-label">
                                            <label class="floating-label" for="server">The node address</label>
                                            <input class="form-control maxwidth-edit" id="server" type="text" name="server">
                                        </div>
                                        <div class="form-group form-group-label">
                                            <label class="floating-label" for="server">nodeIP</label>
                                            <input class="form-control maxwidth-edit" id="node_ip" name="node_ip" type="text">
                                            <p class="form-control-guide"><i class="material-icons">info</i>If the node address to fill in for the domain name, this value will be ignored
                                            </p>
                                        </div>
                                        <!--
                                        <div class="form-group form-group-label" hidden="hidden">
                                            <label class="floating-label" for="method">encryption</label>
                                            <input class="form-control maxwidth-edit" id="method" type="text" name="method"
                                                   value="aes-256-cfb">
                                        </div> -->

                                        <div class="form-group form-group-label">
                                            <label class="floating-label" for="rate">Flow ratio</label>
                                            <input class="form-control maxwidth-edit" id="rate" type="text" name="rate"
                                                   value="1">
                                        </div>

                                        <div class="form-group form-group-label" hidden="hidden">
                                            <div class="checkbox switch">
                                                <label for="custom_method">
                                                    <input class="access-hide" id="custom_method" type="checkbox"
                                                           name="custom_method" checked="checked" disabled><span
                                                            class="switch-toggle"></span>A custom encryption
                                                </label>
                                            </div>
                                        </div>

                                        <div class="form-group form-group-label" hidden="hidden">
                                            <div class="checkbox switch">
                                                <label for="custom_rss">
                                                    <input class="access-hide" id="custom_rss" type="checkbox" name="custom_rss"
                                                           checked="checked" disabled><span class="switch-toggle"></span>The custom protocol&confusion
                                                </label>
                                            </div>
                                        </div>

                                        <div class="form-group form-group-label">
                                            <label for="mu_only">
                                                <label class="floating-label" for="sort">Single port is enabled by the user</label>
                                                <select id="mu_only" class="form-control maxwidth-edit" name="is_multi_user">
                                                    <option value="-1">Only enable ordinary port</option>
                                                    <option value="0">Single port users and ordinary port</option>
                                                    <option value="1">Only enable single port users</option>
                                                </select>
                                            </label>
                                        </div>


                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-main">
                                    <div class="card-inner">
                                        <p class="form-control-guide"><i class="material-icons">info</i>When set to"Only enable single port users", And many user port 0 when, Issued by the node custom configurations</p>
                                        <div class="form-group form-group-label">
                                            <label class="floating-label" for="port">Multiple user port</label>
                                            <input class="form-control maxwidth-edit" id="port" name="port" type="text" value="0">
                                        </div>
                                        <div class="form-group form-group-label">
                                            <label class="floating-label" for="passwd">Node password</label>
                                            <input class="form-control maxwidth-edit" id="passwd" name="passwd" type="text" value="MetronTheme">
                                        </div>
                                        <div class="form-group form-group-label">
                                            <label for="method">
                                                <label class="floating-label" for="method">encryption</label>
                                                <select id="method" class="form-control maxwidth-edit" name="method">
                                                    {foreach $methods as $method}
                                                        <option value="{$method}">{$method}</option>
                                                    {/foreach}
                                                </select>
                                            </label>
                                        </div>
                                        <div class="form-group form-group-label">
                                            <label for="protocol">
                                                <label class="floating-label" for="protocol">agreement</label>
                                                <select id="protocol" class="form-control maxwidth-edit" name="protocol">
                                                    {foreach $protocols as $protocol}
                                                        <option value="{$protocol}">{$protocol}</option>
                                                    {/foreach}
                                                </select>
                                            </label>
                                        </div>
                                        <div class="form-group form-group-label">
                                            <label for="obfs">
                                                <label class="floating-label" for="obfs">Confusing way</label>
                                                <select id="obfs" class="form-control maxwidth-edit" name="obfs">
                                                    {foreach $obfss as $obfs}
                                                        <option value="{$obfs}">{$obfs}</option>
                                                    {/foreach}
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
                                                           name="type"><span class="switch-toggle"></span>Whether or not shown
                                                </label>
                                            </div>
                                        </div>


                                        <div class="form-group form-group-label">
                                            <label class="floating-label" for="status">Node status</label>
                                            <input class="form-control maxwidth-edit" id="status" type="text" name="status"
                                                   value="available">
                                        </div>

                                        <div class="form-group form-group-label">
                                            <div class="form-group form-group-label">
                                                <label class="floating-label" for="sort">The node type</label>
                                                <select id="sort" class="form-control maxwidth-edit" name="sort">
                                                    <option value="0">Shadowsocks</option>
                                                    <option value="1">VPN/Radiusbasis</option>
                                                    <option value="2">SSH</option>
                                                    <option value="5">Anyconnect</option>
                                                    <option value="9">Shadowsocks Single port users</option>
                                                    <option value="10">Shadowsocks transit</option>
                                                    <option value="11">V2Ray</option>
                                                    <option value="12">V2Ray transit</option>
                                                    <option value="13">Shadowsocks V2Ray-Plugin&Obfs</option>
                                                    <option value="14">Trojan</option>
                                                    <option value="15">V2Ray-VLESS</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group form-group-label">
                                            <label class="floating-label" for="info">The node description</label>
                                            <input class="form-control maxwidth-edit" id="info" type="text" name="info"
                                                   value="No description">
                                        </div>

                                        <div class="form-group form-group-label">
                                            <label class="floating-label" for="class">Node level</label>
                                            <input class="form-control maxwidth-edit" id="class" type="text" value="0"
                                                   name="class">
                                            <p class="form-control-guide"><i class="material-icons">info</i>Don't please fill in the classification0, grading fill in the corresponding Numbers</p>
                                        </div>


                                        <div class="form-group form-group-label">
                                            <label class="floating-label" for="group">Node group</label>
                                            <input class="form-control maxwidth-edit" id="group" type="text" value="0"
                                                   name="group">
                                            <p class="form-control-guide"><i class="material-icons">info</i>Please fill in the group as Numbers, not grouping0</p>
                                        </div>


                                        <div class="form-group form-group-label">
                                            <label class="floating-label" for="node_bandwidth_limit">The node flow limit (GB)</label>
                                            <input class="form-control maxwidth-edit" id="node_bandwidth_limit" type="text"
                                                   value="0" name="node_bandwidth_limit">
                                            <p class="form-control-guide"><i class="material-icons">info</i>Unlimited please fill0</p>
                                        </div>

                                        <div class="form-group form-group-label">
                                            <label class="floating-label" for="bandwidthlimit_resetday">Node flow limit to empty</label>
                                            <input class="form-control maxwidth-edit" id="bandwidthlimit_resetday" type="text"
                                                   value="1" name="bandwidthlimit_resetday">
                                        </div>

                                        <div class="form-group form-group-label">
                                            <label class="floating-label" for="node_speedlimit">Node speed limit (Mbps)</label>
                                            <input class="form-control maxwidth-edit" id="node_speedlimit" type="text" value="0"
                                                   name="node_speedlimit">
                                            <p class="form-control-guide"><i class="material-icons">info</i>Don't limit to fill0For each user port to take effect</p>
                                        </div>

                                        <div class="form-group form-group-label">
                                            <label class="floating-label" for="node_speedlimit">The node ordering</label>
                                            <input class="form-control maxwidth-edit" id="node_sort" type="text" value="0"
                                                   name="node_sort">
                                            <p class="form-control-guide"><i class="material-icons">info</i>The greater the number the more</p>
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
                                                    class="btn btn-block btn-brand waves-attach waves-light">add
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                {include file='dialog.tpl'}


        </div>


    </div>
</main>

{include file='admin/footer.tpl'}


<script>
    {literal}
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
            {/literal}
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
                        window.setTimeout("location.href=top.document.referrer", {$config['jump_delay']});
                    } else {
                        $("#result").modal();
                        $$.getElementById('msg').innerHTML = data.msg;
                    }
                },
                error: (jqXHR) => {
                    $("#result").modal();
                    $$.getElementById('msg').innerHTML = `An error occurred：${
                            jqXHR.status
                    }`;
                }
            });
        }
    });

</script>
