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
            <h1 class="content-heading">Edit node #{$node->id}</h1>
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
                                            <input class="form-control maxwidth-edit" id="name" name="name" type="text"
                                                   value="{$node->name}">
                                        </div>
                                        <div class="form-group form-group-label">
                                            <label class="floating-label" for="server">The node address</label>
                                            <input class="form-control maxwidth-edit" id="server" name="server" type="text"
                                                   value="{$node->server}">
                                        </div>

                                        <div class="form-group form-group-label">
                                            <label class="floating-label" for="server">nodeIP</label>
                                            <input class="form-control maxwidth-edit" id="node_ip" name="node_ip" type="text"
                                                   value="{$node->node_ip}">
                                            <p class="form-control-guide"><i class="material-icons">info</i>If the node address to fill in for the domain name, this value will be ignored
                                            </p>
                                        </div>
                                        <!--
                                        <div class="form-group form-group-label" hidden="hidden">
                                            <label class="floating-label" for="method">encryption</label>
                                            <input class="form-control maxwidth-edit" id="method" name="method" type="text"
                                                   value="{$node->method}">
                                        </div> -->

                                        <div class="form-group form-group-label">
                                            <label class="floating-label" for="rate">Flow ratio</label>
                                            <input class="form-control maxwidth-edit" id="rate" name="rate" type="text"
                                                   value="{$node->traffic_rate}">
                                        </div>


                                        <div class="form-group form-group-label" hidden="hidden">
                                            <div class="checkbox switch">
                                                <label for="custom_method">
                                                    <input {if $node->custom_method==1}checked{/if} class="access-hide"
                                                           id="custom_method" name="custom_method" type="checkbox"><span
                                                            class="switch-toggle"></span>A custom encryption
                                                </label>
                                            </div>
                                        </div>

                                        <div class="form-group form-group-label" hidden="hidden">
                                            <div class="checkbox switch">
                                                <label for="custom_rss">
                                                    <input {if $node->custom_rss==1}checked{/if} class="access-hide"
                                                           id="custom_rss" type="checkbox" name="custom_rss"><span
                                                            class="switch-toggle"></span>The custom protocol&confusion
                                                </label>
                                            </div>
                                        </div>

                                        <div class="form-group form-group-label">
                                            <label for="mu_only">
                                                <label class="floating-label" for="sort">Single port is enabled by the user</label>
                                                <select id="mu_only" class="form-control maxwidth-edit" name="is_multi_user">
                                                    <option value="0" {if $node->mu_only==0}selected{/if}>Single port users and ordinary port</option>
                                                    <option value="-1" {if $node->mu_only==-1}selected{/if}>Only enable ordinary port</option>
                                                    <option value="1" {if $node->mu_only==1}selected{/if}>Only enable single port users</option>
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
                                            <input class="form-control maxwidth-edit" id="port" name="port" type="text" value="{$node->port}">
                                        </div>
                                        <div class="form-group form-group-label">
                                            <label class="floating-label" for="passwd">Node password</label>
                                            <input class="form-control maxwidth-edit" id="passwd" name="passwd" type="text" value="{$node->passwd}">
                                        </div>
                                        <div class="form-group form-group-label">
                                            <label for="method">
                                                <label class="floating-label" for="method">encryption</label>
                                                <select id="method" class="form-control maxwidth-edit" name="method">
                                                    {foreach $methods as $method}
                                                        <option value="{$method}" {if $node->method == $method}selected{/if}>{$method}</option>
                                                    {/foreach}
                                                </select>
                                            </label>
                                        </div>
                                        <div class="form-group form-group-label">
                                            <label for="protocol">
                                                <label class="floating-label" for="protocol">agreement</label>
                                                <select id="protocol" class="form-control maxwidth-edit" name="protocol">
                                                    {foreach $protocols as $protocol}
                                                        <option value="{$protocol}" {if $node->protocol == $protocol}selected{/if}>{$protocol}</option>
                                                    {/foreach}
                                                </select>
                                            </label>
                                        </div>
                                        <div class="form-group form-group-label">
                                            <label for="obfs">
                                                <label class="floating-label" for="obfs">Confusing way</label>
                                                <select id="obfs" class="form-control maxwidth-edit" name="obfs">
                                                    {foreach $obfss as $obfs}
                                                        <option value="{$obfs}" {if $node->obfs == $obfs}selected{/if}>{$obfs}</option>
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
                                                    <input {if $node->type==1}checked{/if} class="access-hide" id="type"
                                                           name="type" type="checkbox"><span class="switch-toggle"></span>Whether or not shown
                                                </label>
                                            </div>
                                        </div>

                                        <div class="form-group form-group-label">
                                            <label class="floating-label" for="status">Node status</label>
                                            <input class="form-control maxwidth-edit" id="status" name="status" type="text"
                                                   value="{$node->status}">
                                        </div>

                                        <div class="form-group form-group-label">
                                            <div class="form-group form-group-label">
                                                <label class="floating-label" for="sort">The node type</label>
                                                <select id="sort" class="form-control maxwidth-edit" name="sort">
                                                    <option value="0" {if $node->sort==0}selected{/if}>Shadowsocks</option>
                                                    <option value="1" {if $node->sort==1}selected{/if}>VPN/Radiusbasis</option>
                                                    <option value="2" {if $node->sort==2}selected{/if}>SSH</option>
                                                    <option value="5" {if $node->sort==5}selected{/if}>Anyconnect</option>
                                                    <option value="9" {if $node->sort==9}selected{/if}>Shadowsocks Single port users</option>
                                                    <option value="10" {if $node->sort==10}selected{/if}>Shadowsocks transit</option>
                                                    <option value="11" {if $node->sort==11}selected{/if}>V2Ray</option>
                                                    <option value="12" {if $node->sort==12}selected{/if}>V2Ray transit</option>
                                                    <option value="13" {if $node->sort==13}selected{/if}>Shadowsocks V2Ray-Plugin&Obfs</option>
                                                    <option value="14" {if $node->sort==14}selected{/if}>Trojan</option>
                                                    <option value="15" {if $node->sort==15}selected{/if}>V2Ray-VLESS</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group form-group-label">
                                            <label class="floating-label" for="info">The node description</label>
                                            <input class="form-control maxwidth-edit" id="info" name="info" type="text"
                                                   value="{$node->info}">
                                        </div>

                                        <div class="form-group form-group-label">
                                            <label class="floating-label" for="class">Node level</label>
                                            <input class="form-control maxwidth-edit" id="class" name="class" type="text"
                                                   value="{$node->node_class}">
                                            <p class="form-control-guide"><i class="material-icons">info</i>Don't please fill in the classification0, grading fill in the corresponding Numbers</p>
                                        </div>

                                        <div class="form-group form-group-label">
                                            <label class="floating-label" for="group">Node group</label>
                                            <input class="form-control maxwidth-edit" id="group" name="group" type="text"
                                                   value="{$node->node_group}">
                                            <p class="form-control-guide"><i class="material-icons">info</i>Please fill in the group as Numbers, not grouping0</p>
                                        </div>


                                        <div class="form-group form-group-label">
                                            <label class="floating-label" for="node_bandwidth_limit">The node flow limit (GB)</label>
                                            <input class="form-control maxwidth-edit" id="node_bandwidth_limit"
                                                   name="node_bandwidth_limit" type="text"
                                                   value="{$node->node_bandwidth_limit/1024/1024/1024}">
                                            <p class="form-control-guide"><i class="material-icons">info</i>Unlimited please fill0</p>
                                        </div>

                                        <div class="form-group form-group-label">
                                            <label class="floating-label" for="bandwidthlimit_resetday">Node flow limit to empty</label>
                                            <input class="form-control maxwidth-edit" id="bandwidthlimit_resetday"
                                                   name="bandwidthlimit_resetday" type="text"
                                                   value="{$node->bandwidthlimit_resetday}">
                                        </div>

                                        <div class="form-group form-group-label">
                                            <label class="floating-label" for="node_speedlimit">Node speed limit (Mbps)</label>
                                            <input class="form-control maxwidth-edit" id="node_speedlimit"
                                                   name="node_speedlimit" type="text" value="{$node->node_speedlimit}">
                                            <p class="form-control-guide"><i class="material-icons">info</i>Don't limit to fill0For each user port to take effect</p>
                                        </div>

                                        <div class="form-group form-group-label">
                                            <label class="floating-label" for="node_speedlimit">The node ordering</label>
                                            <input class="form-control maxwidth-edit" id="node_sort"
                                                   name="node_sort" type="text" value="{$node->node_sort}">
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
                                                    class="btn btn-block btn-brand waves-attach waves-light">Modify the
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


{literal}
<script>

    $('#main_form').validate({
        rules: {
            name: {required: true},
            server: {required: true},
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

                type: "PUT",
                url: "/admin/node/{$node->id}",
                dataType: "json",
                {literal}
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
                    sort: $$getValue('sort'),
                    node_speedlimit: $$getValue('node_speedlimit'),
                    node_sort: $$getValue('node_sort'),
                    class: $$getValue('class'),
                    node_bandwidth_limit: $$getValue('node_bandwidth_limit'),
                    bandwidthlimit_resetday: $$getValue('bandwidthlimit_resetday')
                    {/literal},
                    custom_rss,
                    mu_only: $$getValue('mu_only')
                },
                success: (data) => {
                    if (data.ret) {
                        $("#result").modal();
                        $$.getElementById('msg').innerHTML = data.msg;
                        window.setTimeout("location.href=top.document.referrer", {$config['jump_delay']});

                    } else {
                        $("#result").modal();
                        $$.getElementById('msg').innerHTML = data.msg;
                    }
                },
                {literal}
                error: (jqXHR) => {
                    $("#result").modal();
                    $$.getElementById('msg').innerHTML = `An error occurred：${jqXHR.status}`;
                }
            });
        }
    });
    {/literal}
</script>

