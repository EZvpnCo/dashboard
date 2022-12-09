<?php
/* Smarty version 3.1.47, created on 2022-10-19 19:10:29
  from '/www/wwwroot/subscribe/resources/views/material/user/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.47',
  'unifunc' => 'content_634fdb2536ad63_90411476',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7551d946ec5500f1bc50388a358da6815ba2fe7b' => 
    array (
      0 => '/www/wwwroot/subscribe/resources/views/material/user/index.tpl',
      1 => 1665876375,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:user/main.tpl' => 1,
    'file:dialog.tpl' => 1,
    'file:user/footer.tpl' => 1,
  ),
),false)) {
function content_634fdb2536ad63_90411476 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->smarty->ext->_tplFunction->registerTplFunctions($_smarty_tpl, array (
  'printClient' => 
  array (
    'compiled_filepath' => '/www/wwwroot/subscribe/storage/framework/smarty/compile/7551d946ec5500f1bc50388a358da6815ba2fe7b_0.file.index.tpl.php',
    'uid' => '7551d946ec5500f1bc50388a358da6815ba2fe7b',
    'call_name' => 'smarty_template_function_printClient_1822332693634fdb2510f7b8_90463004',
  ),
));
$_smarty_tpl->_subTemplateRender('file:user/main.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_smarty_tpl->_assignInScope('ssr_prefer', App\Utils\URL::SSRCanConnect($_smarty_tpl->tpl_vars['user']->value,0));
$_smarty_tpl->_assignInScope('pre_user', App\Utils\URL::cloneUser($_smarty_tpl->tpl_vars['user']->value));?>

<style>
.table {
    box-shadow: none;
}
table tr td:first-child {
    text-align: right;
    font-weight: bold;
}
</style>

<main class="content">

    <div class="content-header ui-content-header">
        <div class="container">
            <h1 class="content-heading">用户中心</h1>
        </div>
    </div>
    <div class="container">
        <section class="content-inner margin-top-no">
            <div class="ui-card-wrap">

                <div class="col-xx-12 col-xs-6 col-lg-3">
                    <div class="card user-info">
                        <div class="user-info-main">
                            <div class="nodemain">
                                <div class="nodehead node-flex">
                                    <div class="nodename">帐号等级</div>
                                </div>
                                <div class="nodemiddle node-flex">
                                    <div class="nodetype">
                                        <?php if ($_smarty_tpl->tpl_vars['user']->value->class != 0) {?>
                                            <dd>VIP <?php echo $_smarty_tpl->tpl_vars['user']->value->class;?>
</dd>
                                        <?php } else { ?>
                                            <dd>普通用户</dd>
                                        <?php }?>
                                    </div>
                                </div>
                                <div class="nodemiddle node-flex">
                                    <?php if ($_smarty_tpl->tpl_vars['user']->value->class_expire != "1989-06-04 00:05:00") {?>
                                        <div style="font-size: 14px">等级到期时间 <?php echo $_smarty_tpl->tpl_vars['user']->value->class_expire;?>
</div>
                                    <?php } else { ?>
                                        <div style="font-size: 14px">账户等级不会过期</div>
                                    <?php }?>
                                </div>
                            </div>
                        </div>
                        <div class="user-info-bottom">
                            <div class="nodeinfo node-flex">
                                <?php if ($_smarty_tpl->tpl_vars['user']->value->class != 0) {?>
                                    <span><i class="icon icon-md">add_circle</i>到期流量清空</span>
                                <?php } else { ?>
                                    <span><i class="icon icon-md">add_circle</i>升级解锁 VIP 节点</span>
                                <?php }?>
                                <a href="/user/shop" class="card-tag tag-orange">商店</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xx-12 col-xs-6 col-lg-3">
                    <div class="card user-info">
                        <div class="user-info-main">
                            <div class="nodemain">
                                <div class="nodehead node-flex">
                                    <div class="nodename">余额</div>
                                </div>
                                <div class="nodemiddle node-flex">
                                    <div class="nodetype">
                                        <?php echo $_smarty_tpl->tpl_vars['user']->value->money;?>
 CNY
                                    </div>
                                </div>
                                <div class="nodemiddle node-flex">
                                    <div style="font-size: 14px">账户有效时间：<?php echo substr($_smarty_tpl->tpl_vars['user']->value->expire_in,0,10);?>
</div>
                                </div>
                            </div>
                        </div>
                        <div class="user-info-bottom">
                            <div class="nodeinfo node-flex">
                                <span><i class="icon icon-md">attach_money</i>到期账户自动删除</span>
                                <a href="/user/code" class="card-tag tag-green">充值</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xx-12 col-xs-6 col-lg-3">
                    <div class="card user-info">
                        <div class="user-info-main">
                            <div class="nodemain">
                                <div class="nodehead node-flex">
                                    <div class="nodename">在线设备数</div>
                                </div>
                                <div class="nodemiddle node-flex">
                                    <div class="nodetype">
                                        <?php if ($_smarty_tpl->tpl_vars['user']->value->node_connector != 0) {?>
                                            <dd><?php echo $_smarty_tpl->tpl_vars['user']->value->online_ip_count();?>
 / <?php echo $_smarty_tpl->tpl_vars['user']->value->node_connector;?>
</dd>
                                        <?php } else { ?>
                                            <dd><?php echo $_smarty_tpl->tpl_vars['user']->value->online_ip_count();?>
 / 不限制</dd>
                                        <?php }?>
                                    </div>
                                </div>
                                <div class="nodemiddle node-flex">
                                    <?php if ($_smarty_tpl->tpl_vars['user']->value->lastSsTime() != "从未使用喵") {?>
                                        <div style="font-size: 14px">上次使用：<?php echo $_smarty_tpl->tpl_vars['user']->value->lastSsTime();?>
</div>
                                    <?php } else { ?>
                                        <div style="font-size: 14px">从未使用过</div>
                                    <?php }?>
                                </div>
                            </div>
                        </div>
                        <div class="user-info-bottom">
                            <div class="nodeinfo node-flex">
                                <span><i class="icon icon-md">donut_large</i>在线设备/设备限制数</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xx-12 col-xs-6 col-lg-3">
                    <div class="card user-info">
                        <div class="user-info-main">
                            <div class="nodemain">
                                <div class="nodehead node-flex">
                                    <div class="nodename">端口速率</div>
                                </div>
                                <div class="nodemiddle node-flex">
                                    <div class="nodetype">
                                        <?php if ($_smarty_tpl->tpl_vars['user']->value->node_speedlimit != 0) {?>
                                            <dd><code><?php echo $_smarty_tpl->tpl_vars['user']->value->node_speedlimit;?>
</code>Mbps</dd>
                                        <?php } else { ?>
                                            <dd>无限制</dd>
                                        <?php }?>
                                    </div>
                                </div>
                                <div class="nodemiddle node-flex">
                                    <div style="font-size: 14px">实际速率受限于运营商带宽上限</div>
                                </div>
                            </div>
                        </div>
                        <div class="user-info-bottom">
                            <div class="nodeinfo node-flex">
                                <span><i class="icon icon-md">signal_cellular_alt</i>账户最高下行网速</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="ui-card-wrap">

                <div class="col-xx-12 col-sm-5">

                    <div class="card">
                        <div class="card-main">
                        <div class="card-inner margin-bottom-no">
                            <p class="card-heading" style="margin-bottom: 0;"><i class="icon icon-md">account_circle</i>流量使用情况</p>

                                <?php if ($_smarty_tpl->tpl_vars['user']->value->valid_use_loop() != '未购买套餐.') {?>
                                <p>下次流量重置时间：<?php echo $_smarty_tpl->tpl_vars['user']->value->valid_use_loop();?>
</p>
                                <?php }?>

                                <div class="progressbar">
                                    <div class="before"></div>
                                    <div class="bar tuse color3"
                                         style="width:calc(<?php echo $_smarty_tpl->tpl_vars['user']->value->transfer_enable == 0 ? 0 : ($_smarty_tpl->tpl_vars['user']->value->u+$_smarty_tpl->tpl_vars['user']->value->d-$_smarty_tpl->tpl_vars['user']->value->last_day_t)/$_smarty_tpl->tpl_vars['user']->value->transfer_enable*100;?>
%);"></div>
                                    <div class="label-flex">
                                        <div class="label la-top">
                                            <div class="bar ard color3"></div>
                                            <span class="traffic-info">今日已用</span>
                                            <code class="card-tag tag-red"><?php echo $_smarty_tpl->tpl_vars['user']->value->TodayusedTraffic();?>
</code>
                                        </div>
                                    </div>
                                </div>
                                <div class="progressbar">
                                    <div class="before"></div>
                                    <div class="bar ard color2"
                                         style="width:calc(<?php echo $_smarty_tpl->tpl_vars['user']->value->transfer_enable == 0 ? 0 : $_smarty_tpl->tpl_vars['user']->value->last_day_t/$_smarty_tpl->tpl_vars['user']->value->transfer_enable*100;?>
%);">
                                        <span></span>
                                    </div>
                                    <div class="label-flex">
                                        <div class="label la-top">
                                            <div class="bar ard color2"><span></span></div>
                                            <span class="traffic-info">过去已用</span>
                                            <code class="card-tag tag-orange"><?php echo $_smarty_tpl->tpl_vars['user']->value->LastusedTraffic();?>
</code>
                                        </div>
                                    </div>
                                </div>
                                <div class="progressbar">
                                    <div class="before"></div>
                                    <div class="bar remain color"
                                         style="width:calc(<?php echo $_smarty_tpl->tpl_vars['user']->value->transfer_enable == 0 ? 0 : ($_smarty_tpl->tpl_vars['user']->value->transfer_enable-($_smarty_tpl->tpl_vars['user']->value->u+$_smarty_tpl->tpl_vars['user']->value->d))/$_smarty_tpl->tpl_vars['user']->value->transfer_enable*100;?>
%);">
                                        <span></span>
                                    </div>
                                    <div class="label-flex">
                                        <div class="label la-top">
                                            <div class="bar ard color"><span></span></div>
                                            <span class="traffic-info">剩余流量</span>
                                            <code class="card-tag tag-green" id="remain"><?php echo $_smarty_tpl->tpl_vars['user']->value->unusedTraffic();?>
</code>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="card-inner margin-bottom-no">
                                <p class="card-heading"><i class="icon icon-md">account_circle</i> 签到</p>

                                    <p>上次签到时间：<?php echo $_smarty_tpl->tpl_vars['user']->value->lastCheckInTime();?>
</p>

                                    <p id="checkin-msg"></p>

                                    <?php if ($_smarty_tpl->tpl_vars['geetest_html']->value != null) {?>
                                        <div id="popup-captcha"></div>
                                    <?php }?>
                                    <?php if ($_smarty_tpl->tpl_vars['recaptcha_sitekey']->value != null && $_smarty_tpl->tpl_vars['user']->value->isAbleToCheckin()) {?>
                                        <div class="g-recaptcha" data-sitekey="<?php echo $_smarty_tpl->tpl_vars['recaptcha_sitekey']->value;?>
"></div>
                                    <?php }?>

                                    <div class="card-action">
                                        <div class="usercheck pull-left">
                                            <?php if ($_smarty_tpl->tpl_vars['user']->value->isAbleToCheckin()) {?>
                                                <div id="checkin-btn">
                                                    <button id="checkin" class="btn btn-brand btn-flat"><span
                                                                class="icon">check</span>&nbsp;点我签到&nbsp;
                                                        <div><span class="icon">screen_rotation</span>&nbsp;或者摇动手机签到
                                                        </div>
                                                    </button>
                                                </div>
                                            <?php } else { ?>
                                                <p><a class="btn btn-brand disabled btn-flat" href="#"><span
                                                                class="icon">check</span>&nbsp;今日已签到</a></p>
                                            <?php }?>
                                        </div>
                                    </div>
                                </dl>
                            </div>

                        </div>
                    </div>

                    <div class="card">
                        <div class="card-main">
                            <div class="card-inner margin-bottom-no">
                                <p class="card-heading"><i class="icon icon-md">notifications_active</i> 公告栏</p>
                                <?php if ($_smarty_tpl->tpl_vars['ann']->value != null) {?>
                                    <p><?php echo $_smarty_tpl->tpl_vars['ann']->value->content;?>
</p>
                                    <br/>
                                    <strong>查看所有公告请<a href="/user/announcement">点击这里</a></strong>
                                <?php }?>
                                <?php if ($_smarty_tpl->tpl_vars['config']->value['enable_admin_contact'] === true) {?>
                                    <p class="card-heading">管理员联系方式</p>
                                    <?php if ($_smarty_tpl->tpl_vars['config']->value['admin_contact1'] != '') {?>
                                        <p><?php echo $_smarty_tpl->tpl_vars['config']->value['admin_contact1'];?>
</p>
                                    <?php }?>
                                    <?php if ($_smarty_tpl->tpl_vars['config']->value['admin_contact2'] != '') {?>
                                        <p><?php echo $_smarty_tpl->tpl_vars['config']->value['admin_contact2'];?>
</p>
                                    <?php }?>
                                    <?php if ($_smarty_tpl->tpl_vars['config']->value['admin_contact3'] != '') {?>
                                        <p><?php echo $_smarty_tpl->tpl_vars['config']->value['admin_contact3'];?>
</p>
                                    <?php }?>
                                <?php }?>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-xx-12 col-sm-7">

                    <div class="card quickadd">
                        <div class="card-main">
                            <div class="card-inner">
                                <div class="cardbtn-edit">
                                    <div class="card-heading"><i class="icon icon-md">phonelink</i> 快速使用</div>
                                </div>

								<nav class="tab-nav margin-top-no">
									<ul class="nav nav-list">
										<li class="active">
											<a class="" data-toggle="tab" href="#sub_center"><i class="icon icon-lg">info_outline</i>&nbsp;订阅中心</a>
										</li>
										<li>
											<a class="" data-toggle="tab" href="#info_center"><i class="icon icon-lg">flight_takeoff</i>&nbsp;连接信息</a>
										</li>
									</ul>
								</nav>

								<div class="card-inner">
									<div class="tab-content">

										<div class="tab-pane fade" id="info_center">
											<p>您的链接信息：</p>

											<?php if (App\Utils\URL::SSRCanConnect($_smarty_tpl->tpl_vars['user']->value)) {?>

												<?php $_smarty_tpl->_assignInScope('user', App\Utils\URL::getSSRConnectInfo($_smarty_tpl->tpl_vars['pre_user']->value));?>
                                                <table class="table">
                                                    <tbody>
                                                        <tr>
                                                            <td><strong>端口</strong></td>
                                                            <td><?php echo $_smarty_tpl->tpl_vars['user']->value->port;?>
</td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>密码</strong></td>
                                                            <td><?php echo $_smarty_tpl->tpl_vars['user']->value->passwd;?>
</td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>自定义加密</strong></td>
                                                            <td><?php echo $_smarty_tpl->tpl_vars['user']->value->method;?>
</td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>自定义协议</strong></td>
                                                            <td><?php echo $_smarty_tpl->tpl_vars['user']->value->protocol;?>
</td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>自定义混淆</strong></td>
                                                            <td><?php echo $_smarty_tpl->tpl_vars['user']->value->obfs;?>
</td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>自定义混淆参数</strong></td>
                                                            <td><?php echo $_smarty_tpl->tpl_vars['user']->value->obfs_param;?>
</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
												<hr/>
												<p>您好，您目前的 加密方式，混淆或协议 适用于 SSR 客户端，请您选用支持 SSR 的客户端来连接，或者到 <a href="/user/edit">资料编辑</a> 页面修改后再来查看此处。</p>
                                                <p>同时, ShadowsocksR 单端口多用户的连接不受您设置的影响，您可以在此使用相应的客户端进行连接</p>

											<?php } elseif (App\Utils\URL::SSCanConnect($_smarty_tpl->tpl_vars['user']->value)) {?>

                                                <?php $_smarty_tpl->_assignInScope('user', App\Utils\URL::getSSConnectInfo($_smarty_tpl->tpl_vars['pre_user']->value));?>
                                                <table class="table">
                                                    <tbody>
                                                        <tr>
                                                            <td><strong>端口</strong></td>
                                                            <td><?php echo $_smarty_tpl->tpl_vars['user']->value->port;?>
</td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>密码</strong></td>
                                                            <td><?php echo $_smarty_tpl->tpl_vars['user']->value->passwd;?>
</td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>自定义加密</strong></td>
                                                            <td><?php echo $_smarty_tpl->tpl_vars['user']->value->method;?>
</td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>自定义混淆</strong></td>
                                                            <td><?php echo $_smarty_tpl->tpl_vars['user']->value->obfs;?>
</td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>自定义混淆参数</strong></td>
                                                            <td><?php echo $_smarty_tpl->tpl_vars['user']->value->obfs_param;?>
</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
												<hr/>
                                                <p>您好，您目前的 加密方式，混淆或协议 适用于 SS 客户端，请您选用支持 SS 协议的客户端来连接，或者到 <a href="/user/edit">资料编辑</a> 页面修改后再来查看此处。</p>
                                                <p>同时, Shadowsocks 单端口多用户的连接不受您设置的影响，您可以在此使用相应的客户端进行连接</p>

                                            <?php } else { ?>

                                                <p>您的账户连接信息存在异常，请联系管理员</p>

											<?php }?>

										</div>

										<div class="tab-pane fade active in" id="sub_center">
											<nav class="tab-nav margin-top-no">
												<ul class="nav nav-list">
													<li class="active">
														<a class="" data-toggle="tab" href="#sub_center_general"><i class="icon icon-lg">star</i>&nbsp;General</a>
													</li>
													<li>
														<a class="" data-toggle="tab" href="#sub_center_windows"><i class="icon icon-lg">desktop_windows</i>&nbsp;Windows</a>
													</li>
													<li>
														<a class="" data-toggle="tab" href="#sub_center_mac"><i class="icon icon-lg">laptop_mac</i>&nbsp;macOS</a>
													</li>
													<li>
														<a class="" data-toggle="tab" href="#sub_center_ios"><i class="icon icon-lg">phone_iphone</i>&nbsp;iOS</a>
													</li>
													<li>
														<a class="" data-toggle="tab" href="#sub_center_android"><i class="icon icon-lg">android</i>&nbsp;Android</a>
													</li>
													<li>
														<a class="" data-toggle="tab" href="#sub_center_linux"><i class="icon icon-lg">devices_other</i>&nbsp;Linux</a>
													</li>
													<li>
														<a class="" data-toggle="tab" href="#sub_center_router"><i class="icon icon-lg">router</i>&nbsp;Router</a>
													</li>
												</ul>
											</nav>


                                            


											<div class="tab-pane fade active in" id="sub_center_general">
												<p>此处为通用订阅，适用于多种应用的订阅，如您使用的客户端不在各平台列举的名单中则在此使用订阅服务.</p>
                                                <hr/>
												<p><span class="icon icon-lg text-white">filter_1</span> [ SS ]：
													<a id="general_ss" class="copy-config btn-dl" onclick=Copyconfig("/user/getUserAllURL?type=ss","#general_ss","")><i class="material-icons icon-sm">send</i> 拷贝全部节点 URL</a>
												</p>
												<hr/>
												<p><span class="icon icon-lg text-white">filter_2</span> [ SSR ]：
													<a class="copy-text btn-dl" data-clipboard-text="<?php echo $_smarty_tpl->tpl_vars['subInfo']->value['ssr'];?>
"><i class="material-icons icon-sm">send</i> 拷贝订阅链接</a>.<a id="general_ssr" class="copy-config btn-dl" onclick=Copyconfig("/user/getUserAllURL?type=ssr","#general_ssr","")><i class="material-icons icon-sm">send</i> 拷贝全部节点 URL</a>
												</p>
												<hr/>
												<p>众所周知，由于当前 V2Ray 暂无统一格式的订阅.</p>
												<p>如您使用 V2Ray 节点，并且您所使用的客户端不在我们的支持内，且其不支持 V2RayN 格式的订阅，那么请您考虑更换客户端或与我们的客服联系.</p>
												<p><span class="icon icon-lg text-white">filter_3</span> [ V2RayN ]：
													<a class="copy-text btn-dl" data-clipboard-text="<?php echo $_smarty_tpl->tpl_vars['subInfo']->value['v2ray'];?>
"><i class="material-icons icon-sm">send</i> 拷贝订阅链接</a>.<a id="general_v2ray" class="copy-config btn-dl" onclick=Copyconfig("/user/getUserAllURL?type=v2ray","#general_v2ray","")><i class="material-icons icon-sm">send</i> 拷贝全部节点 URL</a>
												</p>
											</div>

											<div class="tab-pane fade" id="sub_center_windows">
												<p><span class="icon icon-lg text-white">filter_1</span> SS - [ SS ]：</p>
													<p>
                                                        应用下载：
                                                        <a class="btn-dl" href="<?php if ($_smarty_tpl->tpl_vars['config']->value["subscribe_client"] === true) {
if ($_smarty_tpl->tpl_vars['config']->value["subscribe_client_url"] == '') {?>/user/getPcClient<?php } else {
echo $_smarty_tpl->tpl_vars['config']->value["subscribe_client_url"];?>
/getClient/<?php echo $_smarty_tpl->tpl_vars['getClient']->value;
}?>?type=ss-win<?php } else { ?>/clients/ss-win.zip<?php }?>"><i class="material-icons icon-sm">cloud_download</i> 本站下载【高速】</a>
                                                        .
                                                        <a class="btn-dl" href="https://github.com/shadowsocks/shadowsocks-windows/releases"><i class="material-icons icon-sm">cloud_download</i> 官方下载</a>
                                                    </p>
													<p>
                                                        使用教程：
                                                        <a class="btn-dl" href="<?php if ($_smarty_tpl->tpl_vars['config']->value['use_this_doc'] === false) {?>/user/tutorial<?php } else { ?>/doc/#/Windows/Shadowsocks<?php }?>"><i class="material-icons icon-sm">turned_in_not</i> 点击查看</a>
                                                    </p>
													<p>
                                                        使用方式：
                                                        <a id="win_ss" class="copy-config btn-dl" onclick=Copyconfig("/user/getUserAllURL?type=ss","#win_ss","")><i class="material-icons icon-sm">send</i> 拷贝全部节点 URL</a>
                                                    </p>
												<hr/>
												<p><span class="icon icon-lg text-white">filter_2</span> SSD - [ SS ]：</p>
													<p>
                                                        应用下载：
                                                        <a class="btn-dl" href="<?php if ($_smarty_tpl->tpl_vars['config']->value["subscribe_client"] === true) {
if ($_smarty_tpl->tpl_vars['config']->value["subscribe_client_url"] == '') {?>/user/getPcClient<?php } else {
echo $_smarty_tpl->tpl_vars['config']->value["subscribe_client_url"];?>
/getClient/<?php echo $_smarty_tpl->tpl_vars['getClient']->value;
}?>?type=ssd-win<?php } else { ?>/ssr-download/ssd-win.7z<?php }?>"><i class="material-icons icon-sm">cloud_download</i> 本站下载【高速】</a>
                                                        .
                                                        <a class="btn-dl" href="https://github.com/CGDF-Github/SSD-Windows/releases"><i class="material-icons icon-sm">cloud_download</i> 官方下载</a>
                                                    </p>
                                                    <p>
                                                        使用教程：
                                                        <a class="btn-dl" href="<?php if ($_smarty_tpl->tpl_vars['config']->value['use_this_doc'] === false) {?>/user/tutorial<?php } else { ?>/doc/#/Windows/ShadowsocksD<?php }?>"><i class="material-icons icon-sm">turned_in_not</i> 点击查看</a>
                                                    </p>
													<p>
                                                        使用方式：
                                                        <a class="copy-text btn-dl" data-clipboard-text="<?php echo $_smarty_tpl->tpl_vars['subInfo']->value['ssd'];?>
"><i class="material-icons icon-sm">send</i> 拷贝订阅链接</a>
                                                        .
                                                        <a id="win_ssd" class="copy-config btn-dl" onclick=Copyconfig("/user/getUserAllURL?type=ssd","#win_ssd","")><i class="material-icons icon-sm">send</i> 拷贝全部节点 URL</a>
                                                    </p>
												<hr/>
												<p><span class="icon icon-lg text-white">filter_3</span> SSR(R) - [ SS/SSR ]：</p>
													<p>
                                                        应用下载：
                                                        <a class="btn-dl" href="<?php if ($_smarty_tpl->tpl_vars['config']->value["subscribe_client"] === true) {
if ($_smarty_tpl->tpl_vars['config']->value["subscribe_client_url"] == '') {?>/user/getPcClient<?php } else {
echo $_smarty_tpl->tpl_vars['config']->value["subscribe_client_url"];?>
/getClient/<?php echo $_smarty_tpl->tpl_vars['getClient']->value;
}?>?type=ssr-win<?php } else { ?>/ssr-download/ssr-win.7z<?php }?>"><i class="material-icons icon-sm">cloud_download</i> 本站下载【高速】</a>
                                                        .
                                                        <a class="btn-dl" href="https://github.com/shadowsocksrr/shadowsocksr-csharp/releases"><i class="material-icons icon-sm">cloud_download</i> 官方下载</a>
                                                    </p>
                                                    <p>
                                                        使用教程：
                                                        <a class="btn-dl" href="<?php if ($_smarty_tpl->tpl_vars['config']->value['use_this_doc'] === false) {?>/user/tutorial<?php } else { ?>/doc/#/Windows/ShadowsocksR<?php }?>"><i class="material-icons icon-sm">turned_in_not</i> 点击查看</a>
                                                    </p>
													<p>
                                                        使用方式：
                                                        <a class="copy-text btn-dl" data-clipboard-text="<?php echo $_smarty_tpl->tpl_vars['subInfo']->value['ssr'];?>
"><i class="material-icons icon-sm">send</i> 拷贝订阅链接</a>
                                                        .
                                                        <a id="win_ssr" class="copy-config btn-dl" onclick=Copyconfig("/user/getUserAllURL?type=ssr","#win_ssr","")><i class="material-icons icon-sm">send</i> 拷贝全部节点 URL</a>
                                                    </p>
												<hr/>

												<p><span class="icon icon-lg text-white">filter_4</span> SSTap - [ SS/SSR ]：</p>
													<p>
                                                        应用下载：
                                                        <a class="btn-dl" href="/ssr-download/SSTap.7z"><i class="material-icons icon-sm">cloud_download</i> 本站下载【高速】</a>
                                                    </p>
                                                    <p>
                                                        使用教程：
                                                        <a class="btn-dl" href="<?php if ($_smarty_tpl->tpl_vars['config']->value['use_this_doc'] === false) {?>/user/tutorial<?php } else { ?>/doc/#/Windows/SSTap<?php }?>"><i class="material-icons icon-sm">turned_in_not</i> 点击查看</a>
                                                    </p>
													<p>
                                                        使用方式：
                                                        <a class="copy-text btn-dl" data-clipboard-text="<?php echo $_smarty_tpl->tpl_vars['subInfo']->value['ssr'];?>
"><i class="material-icons icon-sm">send</i> 拷贝订阅链接</a>
                                                    </p>
												<hr/>

												<p><span class="icon icon-lg text-white">filter_5</span> V2RayN - [ SS/VMess ]：</p>
													<p>
                                                        应用下载：
                                                        <a class="btn-dl" href="<?php if ($_smarty_tpl->tpl_vars['config']->value["subscribe_client"] === true) {
if ($_smarty_tpl->tpl_vars['config']->value["subscribe_client_url"] == '') {?>/user/getPcClient<?php } else {
echo $_smarty_tpl->tpl_vars['config']->value["subscribe_client_url"];?>
/getClient/<?php echo $_smarty_tpl->tpl_vars['getClient']->value;
}?>?type=v2rayn-win<?php } else { ?>/ssr-download/v2rayn.zip<?php }?>"><i class="material-icons icon-sm">cloud_download</i> 本站下载【高速】</a>
                                                        .
                                                        <a class="btn-dl" href="https://github.com/2dust/v2rayN/releases"><i class="material-icons icon-sm">cloud_download</i> 官方下载</a>
                                                    </p>
                                                    <p>
                                                        使用教程：
                                                        <a class="btn-dl" href="<?php if ($_smarty_tpl->tpl_vars['config']->value['use_this_doc'] === false) {?>/user/tutorial<?php } else { ?>/doc/#/Windows/V2RayN<?php }?>"><i class="material-icons icon-sm">turned_in_not</i> 点击查看</a>
                                                    </p>
													<p>
                                                        使用方式：
                                                        <a class="copy-text btn-dl" data-clipboard-text="<?php echo $_smarty_tpl->tpl_vars['subInfo']->value['v2ray'];?>
"><i class="material-icons icon-sm">send</i> 拷贝订阅链接</a>
                                                        .
                                                        <a id="win_v2rayn" class="copy-config btn-dl" onclick=Copyconfig("/user/getUserAllURL?type=v2ray","#win_v2rayn","")><i class="material-icons icon-sm">send</i> 拷贝全部节点 URL</a>
                                                    </p>
												<hr/>
												<p><span class="icon icon-lg text-white">filter_6</span> Clash for Windows - [ SS/VMess ]：</p>
													<p>
                                                        应用下载：
                                                        <a class="btn-dl" href="/ssr-download/Clash-Windows.7z"><i class="material-icons icon-sm">cloud_download</i> 本站下载【高速】</a>
                                                        .
                                                        <a class="btn-dl" href="https://github.com/Fndroid/clash_for_windows_pkg/releases"><i class="material-icons icon-sm">cloud_download</i> 官方下载</a>
                                                    </p>
                                                    <p>
                                                        使用教程：
                                                        <a class="btn-dl" href="<?php if ($_smarty_tpl->tpl_vars['config']->value['use_this_doc'] === false) {?>/user/tutorial<?php } else { ?>/doc/#/Windows/Clash-for-Windows<?php }?>"><i class="material-icons icon-sm">turned_in_not</i> 点击查看</a>
                                                    </p>
													<p>
                                                        使用方式：
                                                        <a class="btn-dl" href="<?php echo $_smarty_tpl->tpl_vars['subInfo']->value['clash'];?>
"><i class="material-icons icon-sm">send</i> 配置文件下载</a>
                                                        .
                                                        <a class="btn-dl" href="clash://install-config?url=<?php echo urlencode($_smarty_tpl->tpl_vars['subInfo']->value['clash']);?>
"><i class="material-icons icon-sm">send</i> 配置一键导入</a>
                                                    </p>
                                            	<hr/>
												<p><span class="icon icon-lg text-white">filter_7</span> Clash for Windows - [ SS/SSR/VMess ]：</p>
													<p>
                                                        应用下载：
                                                        <a class="btn-dl" href="#"><i class="material-icons icon-sm">cloud_download</i> 暂无下载</a>
                                                    </p>
                                                    <p>
                                                        使用教程：
                                                        <a class="btn-dl" href="<?php if ($_smarty_tpl->tpl_vars['config']->value['use_this_doc'] === false) {?>/user/tutorial<?php } else { ?>/doc/#/Windows/Clash-for-Windows<?php }?>"><i class="material-icons icon-sm">turned_in_not</i> 点击查看</a>
                                                    </p>
													<p>
                                                        使用方式：
                                                        <a class="btn-dl" href="<?php echo $_smarty_tpl->tpl_vars['subInfo']->value['clash'];?>
"><i class="material-icons icon-sm">send</i> 配置文件下载</a>
                                                        .
                                                        <a class="btn-dl" href="clash://install-config?url=<?php echo urlencode($_smarty_tpl->tpl_vars['subInfo']->value['clash']);?>
"><i class="material-icons icon-sm">send</i> 配置一键导入</a>
                                                    </p>
                                            <?php if (array_key_exists('Windows',$_smarty_tpl->tpl_vars['config']->value['userCenterClient'])) {?>
                                                <?php if (count($_smarty_tpl->tpl_vars['config']->value['userCenterClient']['Windows']) != 0) {?>
                                                    <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'printClient', array('items'=>$_smarty_tpl->tpl_vars['config']->value['userCenterClient']['Windows']), true);?>

                                                <?php }?>
                                            <?php }?>
											</div>

											<div class="tab-pane fade" id="sub_center_mac">
												<p><span class="icon icon-lg text-white">filter_1</span> Surge - [ SS/VMess ]：</p>
													<p>
                                                        应用下载：
                                                        <a class="btn-dl" href="https://nssurge.com/mac/v3/Surge-latest.zip"><i class="material-icons icon-sm">cloud_download</i> 官方下载</a>
                                                    </p>
                                                    <p>
                                                        使用教程：
                                                        <a class="btn-dl" href="<?php if ($_smarty_tpl->tpl_vars['config']->value['use_this_doc'] === false) {?>/user/tutorial<?php } else { ?>/doc/#/macOS/Surge<?php }?>"><i class="material-icons icon-sm">turned_in_not</i> 点击查看</a>
                                                    </p>
													<p>
                                                        使用方式：
                                                        <a class="copy-text btn-dl" data-clipboard-text="<?php echo $_smarty_tpl->tpl_vars['subInfo']->value['surge4'];?>
"><i class="material-icons icon-sm">send</i> 拷贝 4.x 托管链接</a>
                                                        .
                                                        <a class="copy-text btn-dl" data-clipboard-text="<?php echo $_smarty_tpl->tpl_vars['subInfo']->value['surge3'];?>
"><i class="material-icons icon-sm">send</i> 拷贝 3.x 托管链接</a>
                                                        .
                                                        <a class="copy-text btn-dl" data-clipboard-text="<?php echo $_smarty_tpl->tpl_vars['subInfo']->value['surge_node'];?>
"><i class="material-icons icon-sm">send</i> 拷贝 3.x 节点链接</a>
                                                        .
                                                        <a class="copy-text btn-dl" data-clipboard-text="<?php echo $_smarty_tpl->tpl_vars['subInfo']->value['surge2'];?>
"><i class="material-icons icon-sm">send</i> 拷贝 2.x 托管链接</a>
                                                    </p>
												<hr/>
												<p><span class="icon icon-lg text-white">filter_2</span> ClashX - [ SS/VMess ]：</p>
													<p>
                                                        应用下载：
                                                        <a class="btn-dl" href="/ssr-download/ClashX.dmg"><i class="material-icons icon-sm">cloud_download</i> 本站下载【高速】</a>
                                                        .
                                                        <a class="btn-dl" href="https://github.com/yichengchen/clashX/releases"><i class="material-icons icon-sm">cloud_download</i> 官方下载</a>
                                                    </p>
                                                    <p>
                                                        使用教程：
                                                        <a class="btn-dl" href="<?php if ($_smarty_tpl->tpl_vars['config']->value['use_this_doc'] === false) {?>/user/tutorial<?php } else { ?>/doc/#/macOS/ClashX<?php }?>"><i class="material-icons icon-sm">turned_in_not</i> 点击查看</a>
                                                    </p>
													<p>
                                                        使用方式：
                                                        <a class="btn-dl" href="<?php echo $_smarty_tpl->tpl_vars['subInfo']->value['clash'];?>
"><i class="material-icons icon-sm">send</i> 配置文件下载</a>
                                                        .
                                                        <a class="btn-dl" href="clash://install-config?url=<?php echo urlencode($_smarty_tpl->tpl_vars['subInfo']->value['clash']);?>
"><i class="material-icons icon-sm">send</i> 配置一键导入</a>
                                                    </p>
                                                <hr/>
												<p><span class="icon icon-lg text-white">filter_3</span> ClashXR - [ SS/SSR/VMess ]：</p>
													<p>
                                                        应用下载：
                                                        <a class="btn-dl" href="#"><i class="material-icons icon-sm">cloud_download</i> 暂无下载</a>
                                                    </p>
                                                    <p>
                                                        使用教程：
                                                        <a class="btn-dl" href="<?php if ($_smarty_tpl->tpl_vars['config']->value['use_this_doc'] === false) {?>/user/tutorial<?php } else { ?>/doc/#/macOS/ClashX<?php }?>"><i class="material-icons icon-sm">turned_in_not</i> 点击查看</a>
                                                    </p>
													<p>
                                                        使用方式：
                                                        <a class="btn-dl" href="<?php echo $_smarty_tpl->tpl_vars['subInfo']->value['clash'];?>
"><i class="material-icons icon-sm">send</i> 配置文件下载</a>
                                                        .
                                                        <a class="btn-dl" href="clash://install-config?url=<?php echo urlencode($_smarty_tpl->tpl_vars['subInfo']->value['clash']);?>
"><i class="material-icons icon-sm">send</i> 配置一键导入</a>
                                                    </p>
                                                <hr/>
												<p><span class="icon icon-lg text-white">filter_4</span> V2RayU - [ SS/VMess ]：</p>
													<p>
                                                        应用下载：
                                                        <a class="btn-dl" href="/ssr-download/V2rayU.dmg"><i class="material-icons icon-sm">cloud_download</i> 本站下载【高速】</a>
                                                    </p>
                                                    <p>
                                                        使用教程：
                                                        <a class="btn-dl" href="<?php if ($_smarty_tpl->tpl_vars['config']->value['use_this_doc'] === false) {?>/user/tutorial<?php } else { ?>/doc/#/macOS/V2RayU<?php }?>"><i class="material-icons icon-sm">turned_in_not</i> 点击查看</a>
                                                    </p>
													<p>
                                                        使用方式：
                                                        <a class="copy-text btn-dl" data-clipboard-text="<?php echo $_smarty_tpl->tpl_vars['subInfo']->value['v2ray'];?>
"><i class="material-icons icon-sm">send</i> 拷贝订阅链接</a>
                                                    </p>
                                                <hr/>
												<p><span class="icon icon-lg text-white">filter_5</span> ShadowsocksX-NG - [ SS ]：</p>
													<p>
                                                        应用下载：
                                                        <a class="btn-dl" href="/ssr-download/ss-mac.zip"><i class="material-icons icon-sm">cloud_download</i> 本站下载【高速】</a>
                                                    </p>
                                                    <p>
                                                        使用教程：
                                                        <a class="btn-dl" href="<?php if ($_smarty_tpl->tpl_vars['config']->value['use_this_doc'] === false) {?>/user/tutorial<?php } else { ?>/doc/#/macOS/ShadowsocksX-NG<?php }?>"><i class="material-icons icon-sm">turned_in_not</i> 点击查看</a>
                                                    </p>
													<p>
                                                        使用方式：
                                                        <a id="mac_ss" class="copy-config btn-dl" onclick=Copyconfig("/user/getUserAllURL?type=ss","#mac_ss","")><i class="material-icons icon-sm">send</i> 拷贝全部节点 URL</a>
                                                    </p>
                                                <hr/>
												<p><span class="icon icon-lg text-white">filter_6</span> ShadowsocksX-NG-R8 - [ SSR ]：</p>
													<p>
                                                        应用下载：
                                                        <a class="btn-dl" href="/ssr-download/ssr-mac.dmg"><i class="material-icons icon-sm">cloud_download</i> 本站下载【高速】</a>
                                                    </p>
                                                    <p>
                                                        使用教程：
                                                        <a class="btn-dl" href="<?php if ($_smarty_tpl->tpl_vars['config']->value['use_this_doc'] === false) {?>/user/tutorial<?php } else { ?>/doc/#/macOS/ShadowsocksX-NG-R8<?php }?>"><i class="material-icons icon-sm">turned_in_not</i> 点击查看</a>
                                                    </p>
													<p>
                                                        使用方式：
                                                        <a class="copy-text btn-dl" data-clipboard-text="<?php echo $_smarty_tpl->tpl_vars['subInfo']->value['ssr'];?>
"><i class="material-icons icon-sm">send</i> 拷贝订阅链接</a>
                                                    </p>
                                            <?php if (array_key_exists('macOS',$_smarty_tpl->tpl_vars['config']->value['userCenterClient'])) {?>
                                                <?php if (count($_smarty_tpl->tpl_vars['config']->value['userCenterClient']['macOS']) != 0) {?>
                                                    <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'printClient', array('items'=>$_smarty_tpl->tpl_vars['config']->value['userCenterClient']['macOS']), true);?>

                                                <?php }?>
                                            <?php }?>
											</div>

											<div class="tab-pane fade" id="sub_center_ios">
											<?php if ($_smarty_tpl->tpl_vars['display_ios_class']->value >= 0) {?>
												<?php if ($_smarty_tpl->tpl_vars['user']->value->class >= $_smarty_tpl->tpl_vars['display_ios_class']->value && $_smarty_tpl->tpl_vars['user']->value->get_top_up() >= $_smarty_tpl->tpl_vars['display_ios_topup']->value) {?>
												<div><span class="icon icon-lg text-white">account_box</span> 本站iOS账户：</div>
												<div class="float-clear">
													<input type="text" class="input form-control form-control-monospace cust-link col-xx-12 col-sm-8 col-lg-7" name="input1" readonly value="<?php echo $_smarty_tpl->tpl_vars['ios_account']->value;?>
" readonly="true">
													<button class="copy-text btn btn-subscription col-xx-12 col-sm-3 col-lg-2" type="button" data-clipboard-text="<?php echo $_smarty_tpl->tpl_vars['ios_account']->value;?>
">点击复制</button>
                                                    <br>
												</div>
												<div><span class="icon icon-lg text-white">lock</span> 本站iOS密码：</div>
												<div class="float-clear">
													<input type="text" class="input form-control form-control-monospace cust-link col-xx-12 col-sm-8 col-lg-7" name="input1" readonly value="<?php echo $_smarty_tpl->tpl_vars['ios_password']->value;?>
" readonly="true">
													<button class="copy-text btn btn-subscription col-xx-12 col-sm-3 col-lg-2" type="button" data-clipboard-text="<?php echo $_smarty_tpl->tpl_vars['ios_password']->value;?>
">点击复制</button>
                                                    <br>
												</div>
												<p><span class="icon icon-lg text-white">error</span><strong>禁止将账户分享给他人！</strong></p>
												<hr/>
												<?php }?>
											<?php }?>
												<p><span class="icon icon-lg text-white">filter_1</span> Surge - [ SS/VMess ]：</p>
													<p>
                                                        应用下载：
                                                        <a class="btn-dl" href="https://itunes.apple.com/us/app/surge-3/id1442620678?ls=1&mt=8"><i class="material-icons icon-sm">cloud_download</i> 官方下载</a>
                                                    </p>
													<p>
                                                        使用教程：
                                                        <a class="btn-dl" href="<?php if ($_smarty_tpl->tpl_vars['config']->value['use_this_doc'] === false) {?>/user/tutorial<?php } else { ?>/doc/#/iOS/Surge<?php }?>"><i class="material-icons icon-sm">turned_in_not</i> 点击查看</a>
                                                    </p>
													<p>
                                                        相关说明：
                                                        Surge 4 托管配置中可能含有 VMess 节点，如您未订阅 Surge 4 请使用 3.x 一键.
                                                        其中 2 & 3 & 4 代表 Surge 的版本.
                                                    </p>
													<p>
                                                        使用方式：
                                                        <a class="btn-dl" href="surge3:///install-config?url=<?php echo urlencode($_smarty_tpl->tpl_vars['subInfo']->value['surge4']);?>
"><i class="material-icons icon-sm">send</i> 4.x 一键</a>
                                                        .
                                                        <a class="btn-dl" href="surge3:///install-config?url=<?php echo urlencode($_smarty_tpl->tpl_vars['subInfo']->value['surge3']);?>
"><i class="material-icons icon-sm">send</i> 3.x 一键</a>
                                                        .
                                                        <a class="copy-text btn-dl" data-clipboard-text="<?php echo $_smarty_tpl->tpl_vars['subInfo']->value['surge_node'];?>
"><i class="material-icons icon-sm">send</i> 节点 List</a>
                                                        .
                                                        <a class="btn-dl" href="surge:///install-config?url=<?php echo urlencode($_smarty_tpl->tpl_vars['subInfo']->value['surge2']);?>
"><i class="material-icons icon-sm">send</i> 2.x 一键</a>
                                                    </p>
												<hr/>
												<p><span class="icon icon-lg text-white">filter_2</span> Kitsunebi - [ SS/VMess ]：</p>
												    <p>该客户端专属订阅链接支持同时订阅 SS/V2Ray 节点.</p>
													<p>
                                                        应用下载：
                                                        <a class="btn-dl" href="https://itunes.apple.com/us/app/kitsunebi-proxy-utility/id1446584073?ls=1&mt=8"><i class="material-icons icon-sm">cloud_download</i> 官方下载</a>
                                                    </p>
                                                    <p>
                                                        使用教程：
                                                        <a class="btn-dl" href="<?php if ($_smarty_tpl->tpl_vars['config']->value['use_this_doc'] === false) {?>/user/tutorial<?php } else { ?>/doc/#/iOS/Kitsunebi<?php }?>"><i class="material-icons icon-sm">turned_in_not</i> 点击查看</a>
                                                    </p>
													<p>
                                                        使用方式：
                                                        <a class="copy-text btn-dl" data-clipboard-text="<?php echo $_smarty_tpl->tpl_vars['subInfo']->value['ss'];?>
"><i class="material-icons icon-sm">send</i> 拷贝 SS 订阅链接</a>
                                                        .
                                                        <a class="copy-text btn-dl" data-clipboard-text="<?php echo $_smarty_tpl->tpl_vars['subInfo']->value['kitsunebi'];?>
"><i class="material-icons icon-sm">send</i> 拷贝该应用专属订阅链接</a>
                                                    </p>
												<hr/>
												<p><span class="icon icon-lg text-white">filter_3</span> Quantumult - [ SS/SSR/VMess ]：</p>
												    <p>完整策略组配置 为使用了策略组结构的配置文件.</p>
													<p>
                                                        应用下载：
                                                        <a class="btn-dl" href="https://itunes.apple.com/us/app/quantumult/id1252015438?ls=1&mt=8"><i class="material-icons icon-sm">cloud_download</i> 官方下载</a>
                                                    </p>
                                                    <p>
                                                        使用教程：
                                                        <a class="btn-dl" href="<?php if ($_smarty_tpl->tpl_vars['config']->value['use_this_doc'] === false) {?>/user/tutorial<?php } else { ?>/doc/#/iOS/Quantumult_sub<?php }?>"><i class="material-icons icon-sm">turned_in_not</i> 点击查看</a>
                                                    </p>
													<p>
                                                        使用方式：
                                                        <a class="copy-text btn-dl" data-clipboard-text="<?php echo $_smarty_tpl->tpl_vars['subInfo']->value['ss'];?>
"><i class="material-icons icon-sm">send</i> 拷贝 SS 订阅链接</a>
                                                        .
                                                        <a class="copy-text btn-dl" data-clipboard-text="<?php echo $_smarty_tpl->tpl_vars['subInfo']->value['ssr'];?>
"><i class="material-icons icon-sm">send</i> 拷贝 SSR 订阅链接</a>
                                                        .
                                                        <a class="copy-text btn-dl" data-clipboard-text="<?php echo $_smarty_tpl->tpl_vars['subInfo']->value['quantumult_v2'];?>
"><i class="material-icons icon-sm">send</i> 拷贝 V2Ray 订阅链接</a>
                                                        <!--
                                                        .
                                                        <a id="quan_sub" class="copy-config btn-dl" onclick=Copyconfig("<?php echo $_smarty_tpl->tpl_vars['subInfo']->value['quantumult_sub'];?>
","#quan_sub","quantumult://settings?configuration=clipboard")><i class="material-icons icon-sm">send</i> 完整订阅配置</a>
                                                        -->
                                                        .
                                                        <a id="quan_conf" class="copy-config btn-dl" onclick=Copyconfig("<?php echo $_smarty_tpl->tpl_vars['subInfo']->value['quantumult_conf'];?>
","#quan_conf","quantumult://settings?configuration=clipboard")><i class="material-icons icon-sm">send</i> 完整策略组配置</a>
                                                    </p>
												<hr/>
												<p><span class="icon icon-lg text-white">filter_4</span> QuantumultX - [ SS/SSR/VMess ]：</p>
												    <p>该客户端专属订阅链接支持同时订阅 SS/SSR/V2Ray 节点.</p>
													<p>
                                                        应用下载：
                                                        <a class="btn-dl" href="https://apps.apple.com/us/app/quantumult-x/id1443988620"><i class="material-icons icon-sm">cloud_download</i> 官方下载</a>
                                                    </p>
                                                    <p>
                                                        使用教程：
                                                        <a class="btn-dl" href="<?php if ($_smarty_tpl->tpl_vars['config']->value['use_this_doc'] === false) {?>/user/tutorial<?php } else { ?>/doc/#/iOS/QuantumultX<?php }?>"><i class="material-icons icon-sm">turned_in_not</i> 点击查看</a>
                                                    </p>
													<p>
                                                        使用方式：
                                                        <a class="copy-text btn-dl" data-clipboard-text="<?php echo $_smarty_tpl->tpl_vars['subInfo']->value['ssr'];?>
"><i class="material-icons icon-sm">send</i> 拷贝 SSR 订阅链接</a>
                                                        .
                                                        <a class="copy-text btn-dl" data-clipboard-text="<?php echo $_smarty_tpl->tpl_vars['subInfo']->value['quantumultx'];?>
"><i class="material-icons icon-sm">send</i> 拷贝该应用专属订阅链接</a>
                                                    </p>
												<hr/>
												<p><span class="icon icon-lg text-white">filter_5</span> Shadowrocket - [ SS/SSR/VMess ]：</p>
												    <p>该客户端专属订阅链接支持同时订阅 SS/SSR/V2Ray 节点.</p>
													<p>
                                                        应用下载：
                                                        <a class="btn-dl" href="https://itunes.apple.com/us/app/shadowrocket/id932747118?mt=8"><i class="material-icons icon-sm">cloud_download</i> 官方下载</a>
                                                    </p>
                                                    <p>
                                                        使用教程：
                                                        <a class="btn-dl" href="<?php if ($_smarty_tpl->tpl_vars['config']->value['use_this_doc'] === false) {?>/user/tutorial<?php } else { ?>/doc/#/iOS/Shadowrocket<?php }?>"><i class="material-icons icon-sm">turned_in_not</i> 点击查看</a>
                                                    </p>
													<p>
                                                        使用方式：
                                                        <a class="copy-text btn-dl" data-clipboard-text="<?php echo $_smarty_tpl->tpl_vars['subInfo']->value['ss'];?>
"><i class="material-icons icon-sm">send</i> 拷贝 SS 订阅链接</a>
                                                        .
                                                        <a class="copy-text btn-dl" data-clipboard-text="<?php echo $_smarty_tpl->tpl_vars['subInfo']->value['ssr'];?>
"><i class="material-icons icon-sm">send</i> 拷贝 SSR 订阅链接</a>
                                                        .
                                                        <a class="copy-text btn-dl" data-clipboard-text="<?php echo $_smarty_tpl->tpl_vars['subInfo']->value['v2ray'];?>
"><i class="material-icons icon-sm">send</i> 拷贝 V2Ray 订阅链接</a>
                                                        .
                                                        <a class="copy-text btn-dl" data-clipboard-text="<?php echo $_smarty_tpl->tpl_vars['subInfo']->value['shadowrocket'];?>
"><i class="material-icons icon-sm">send</i> 拷贝该应用专属订阅链接</a>
                                                        .
                                                        <a class="btn-dl" onclick=AddSub("<?php echo $_smarty_tpl->tpl_vars['subInfo']->value['shadowrocket'];?>
","shadowrocket://add/sub://")><i class="material-icons icon-sm">send</i> 一键导入 Shadowrocket</a>
                                                    </p>
                                            <?php if (array_key_exists('iOS',$_smarty_tpl->tpl_vars['config']->value['userCenterClient'])) {?>
                                                <?php if (count($_smarty_tpl->tpl_vars['config']->value['userCenterClient']['iOS']) != 0) {?>
                                                    <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'printClient', array('items'=>$_smarty_tpl->tpl_vars['config']->value['userCenterClient']['iOS']), true);?>

                                                <?php }?>
                                            <?php }?>
											</div>

											<div class="tab-pane fade" id="sub_center_android">
												<p><span class="icon icon-lg text-white">filter_1</span> SS - [ SS ]：</p>
												    <p>该客户端仅 v5.0 以上版本支持订阅，如您未找到订阅配置之处，请尝试升级客户端.</p>
													<p>
                                                        应用下载：
                                                        <a class="btn-dl" href="/ssr-download/ss-android.apk"><i class="material-icons icon-sm">cloud_download</i> 本站下载【高速】</a>
                                                        .
                                                        <a class="btn-dl" href="https://github.com/shadowsocks/shadowsocks-android/releases"><i class="material-icons icon-sm">cloud_download</i> 官方下载</a>
                                                    </p>
													<p>
                                                        插件下载：
                                                        <a class="btn-dl" href="/ssr-download/ss-android-obfs.apk"><i class="material-icons icon-sm">cloud_download</i> 「必须」obfs 插件本站下载【高速】</a>
                                                    </p>
                                                    <p>
                                                        使用教程：
                                                        <a class="btn-dl" href="<?php if ($_smarty_tpl->tpl_vars['config']->value['use_this_doc'] === false) {?>/user/tutorial<?php } else { ?>/doc/#/Android/Shadowsocks-Android<?php }?>"><i class="material-icons icon-sm">turned_in_not</i> 点击查看</a>
                                                    </p>
													<p>
                                                        使用方式：
                                                        <a class="copy-text btn-dl" data-clipboard-text="<?php echo $_smarty_tpl->tpl_vars['subInfo']->value['ssa'];?>
"><i class="material-icons icon-sm">send</i> 拷贝该应用专属订阅链接</a>
                                                    </p>
												<hr/>
												<p><span class="icon icon-lg text-white">filter_2</span> SSD - [ SS ]：</p>
													<p>
                                                        应用下载：
                                                        <a class="btn-dl" href="/ssr-download/ssd-android.apk"><i class="material-icons icon-sm">cloud_download</i> 本站下载【高速】</a>
                                                        .
                                                        <a class="btn-dl" href="https://github.com/CGDF-Github/SSD-Android/releases"><i class="material-icons icon-sm">cloud_download</i> 官方下载</a>
                                                    </p>
													<p>
                                                        插件下载：
                                                        <a class="btn-dl" href="/ssr-download/ss-android-obfs.apk"><i class="material-icons icon-sm">cloud_download</i> 「必须」obfs 插件本站下载【高速】</a>
                                                    </p>
                                                    <p>
                                                        使用教程：
                                                        <a class="btn-dl" href="<?php if ($_smarty_tpl->tpl_vars['config']->value['use_this_doc'] === false) {?>/user/tutorial<?php } else { ?>/doc/#/Android/ShadowsocksD<?php }?>"><i class="material-icons icon-sm">turned_in_not</i> 点击查看</a>
                                                    </p>
													<p>
                                                        使用方式：
                                                        <a class="copy-text btn-dl" data-clipboard-text="<?php echo $_smarty_tpl->tpl_vars['subInfo']->value['ssd'];?>
"><i class="material-icons icon-sm">send</i> 拷贝该应用专属订阅链接</a>
                                                        .
                                                        <a id="android_ssd" class="copy-config btn-dl" onclick=Copyconfig("/user/getUserAllURL?type=ssd","#android_ssd","")><i class="material-icons icon-sm">send</i> 拷贝全部节点 URL</a>
                                                    </p>
												<hr/>
												<p><span class="icon icon-lg text-white">filter_3</span> SSR(R) - [ SSR ]：</p>
													<p>
                                                        应用下载：
                                                        <a class="btn-dl" href="/ssr-download/ssr-android.apk"><i class="material-icons icon-sm">cloud_download</i> SSR 本站下载【高速】</a>
                                                        .
                                                        <a class="btn-dl" href="/ssr-download/ssrr-android.apk"><i class="material-icons icon-sm">cloud_download</i> SSRR 本站下载【高速】</a>
                                                    </p>
                                                    <p>
                                                        使用教程：
                                                        <a class="btn-dl" href="<?php if ($_smarty_tpl->tpl_vars['config']->value['use_this_doc'] === false) {?>/user/tutorial<?php } else { ?>/doc/#/Android/ShadowsocksR<?php }?>"><i class="material-icons icon-sm">turned_in_not</i> 点击查看</a>
                                                    </p>
													<p>
                                                        使用方式：
                                                        <a class="copy-text btn-dl" data-clipboard-text="<?php echo $_smarty_tpl->tpl_vars['subInfo']->value['ssr'];?>
"><i class="material-icons icon-sm">send</i> 拷贝订阅链接</a>
                                                    </p>
												<hr/>
												<p><span class="icon icon-lg text-white">filter_4</span> V2RayNG - [ SS/VMess ]：</p>
													<p>
                                                        应用下载：
                                                        <a class="btn-dl" href="/ssr-download/v2rayng.apk"><i class="material-icons icon-sm">cloud_download</i> 本站下载【高速】</a>
                                                        .
                                                        <a class="btn-dl" href="https://github.com/2dust/v2rayNG/releases"><i class="material-icons icon-sm">cloud_download</i> 官方下载</a>
                                                    </p>
                                                    <p>
                                                        使用教程：
                                                        <a class="btn-dl" href="<?php if ($_smarty_tpl->tpl_vars['config']->value['use_this_doc'] === false) {?>/user/tutorial<?php } else { ?>/doc/#/Android/V2RayNG<?php }?>"><i class="material-icons icon-sm">turned_in_not</i> 点击查看</a>
                                                    </p>
													<p>
                                                        使用方式：
                                                        <a class="copy-text btn-dl" data-clipboard-text="<?php echo $_smarty_tpl->tpl_vars['subInfo']->value['v2ray'];?>
"><i class="material-icons icon-sm">send</i> 拷贝订阅链接</a>
                                                    </p>
												<hr/>
												<p><span class="icon icon-lg text-white">filter_5</span> Surfboard - [ SS/VMess ]：</p>
												    <p>该客户端新版本支持 V2Ray 节点，如您遇到配置解析错误等情况，请尝试升级客户端.</p>
													<p>
                                                        应用下载：
                                                        <a class="btn-dl" href="https://play.google.com/store/apps/details?id=com.getsurfboard"><i class="material-icons icon-sm">cloud_download</i> Google Play 下载</a>
                                                    </p>
                                                    <p>
                                                        使用教程：
                                                        <a class="btn-dl" href="<?php if ($_smarty_tpl->tpl_vars['config']->value['use_this_doc'] === false) {?>/user/tutorial<?php } else { ?>/doc/#/Android/Surfboard<?php }?>"><i class="material-icons icon-sm">turned_in_not</i> 点击查看</a>
                                                    </p>
													<p>
                                                        使用方式：
                                                        <a class="copy-text btn-dl" data-clipboard-text="<?php echo $_smarty_tpl->tpl_vars['subInfo']->value['surfboard'];?>
"><i class="material-icons icon-sm">send</i> 拷贝托管链接</a>
                                                        .
                                                        <a class="btn-dl" href="<?php echo $_smarty_tpl->tpl_vars['subInfo']->value['surfboard'];?>
"><i class="material-icons icon-sm">send</i> 配置文件下载</a>
                                                    </p>
												<hr/>
												<p><span class="icon icon-lg text-white">filter_6</span> Kitsunebi - [ SS/VMess ]：</p>
												    <p>该客户端专属订阅链接支持同时订阅 SS 和 V2Ray 节点.</p>
													<p>
                                                        应用下载：
                                                        <a class="btn-dl" href="https://play.google.com/store/apps/details?id=fun.kitsunebi.kitsunebi4android"><i class="material-icons icon-sm">cloud_download</i> Google Play 下载</a>
                                                    </p>
                                                    <p>
                                                        使用教程：
                                                        <a class="btn-dl" href="<?php if ($_smarty_tpl->tpl_vars['config']->value['use_this_doc'] === false) {?>/user/tutorial<?php } else { ?>/doc/#/Android/Kitsunebi<?php }?>"><i class="material-icons icon-sm">turned_in_not</i> 点击查看</a>
                                                    </p>
													<p>
                                                        使用方式：
                                                        <a class="copy-text btn-dl" data-clipboard-text="<?php echo $_smarty_tpl->tpl_vars['subInfo']->value['ss'];?>
"><i class="material-icons icon-sm">send</i> 拷贝 SS 订阅链接</a>
                                                        .
                                                        <a class="copy-text btn-dl" data-clipboard-text="<?php echo $_smarty_tpl->tpl_vars['subInfo']->value['kitsunebi'];?>
"><i class="material-icons icon-sm">send</i> 拷贝该应用专属订阅链接</a>
                                                    </p>
                                            <?php if (array_key_exists('Android',$_smarty_tpl->tpl_vars['config']->value['userCenterClient'])) {?>
                                                <?php if (count($_smarty_tpl->tpl_vars['config']->value['userCenterClient']['Android']) != 0) {?>
                                                    <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'printClient', array('items'=>$_smarty_tpl->tpl_vars['config']->value['userCenterClient']['Android']), true);?>

                                                <?php }?>
                                            <?php }?>
											</div>

											<div class="tab-pane fade" id="sub_center_linux">
												<p><span class="icon icon-lg text-white">filter_1</span> Electron SSR - [ SSR ]：</p>
													<p>
                                                        应用下载：
                                                        <a class="btn-dl" href="/ssr-download/ssr-linux.AppImage"><i class="material-icons icon-sm">cloud_download</i> 本站下载【高速】</a>
                                                    </p>
                                                    <p>
                                                        使用教程：
                                                        <a class="btn-dl" href="<?php if ($_smarty_tpl->tpl_vars['config']->value['use_this_doc'] === false) {?>/user/tutorial<?php } else { ?>/doc/#/Linux/ElectronSSR<?php }?>"><i class="material-icons icon-sm">turned_in_not</i> 点击查看</a>
                                                    </p>
													<p>
                                                        使用方式：
                                                        <a class="copy-text btn-dl" data-clipboard-text="<?php echo $_smarty_tpl->tpl_vars['subInfo']->value['ssr'];?>
"><i class="material-icons icon-sm">send</i> 拷贝订阅链接</a>
                                                    </p>
                                            <?php if (array_key_exists('Linux',$_smarty_tpl->tpl_vars['config']->value['userCenterClient'])) {?>
                                                <?php if (count($_smarty_tpl->tpl_vars['config']->value['userCenterClient']['Linux']) != 0) {?>
                                                    <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'printClient', array('items'=>$_smarty_tpl->tpl_vars['config']->value['userCenterClient']['Linux']), true);?>

                                                <?php }?>
                                            <?php }?>
											</div>

											<div class="tab-pane fade" id="sub_center_router">
												<p><span class="icon icon-lg text-white">filter_1</span> Koolshare 固件路由器/软路由：</p>
													<p>
                                                        应用下载：
                                                        <a class="btn-dl" href="https://github.com/hq450/fancyss_history_package"><i class="material-icons icon-sm">cloud_download</i> FancySS 下载页面</a>
                                                        .
                                                        <a class="btn-dl" href="https://github.com/hq450/fancyss_history_package/tree/master/fancyss_X64"><i class="material-icons icon-sm">cloud_download</i> FancySS 历史下载页面下载 V2Ray 插件</a>
                                                    </p>
                                                    <p>
                                                        使用教程：
                                                        <a class="btn-dl" href="<?php if ($_smarty_tpl->tpl_vars['config']->value['use_this_doc'] === false) {?>/user/tutorial<?php } else { ?>/doc/#/Router/Koolshare<?php }?>"><i class="material-icons icon-sm">turned_in_not</i> 点击查看</a>
                                                    </p>
													<p>
                                                        使用方式：
                                                        <a class="copy-text btn-dl" data-clipboard-text="<?php echo $_smarty_tpl->tpl_vars['subInfo']->value['ssr'];?>
"><i class="material-icons icon-sm">send</i> 拷贝 SSR 订阅链接</a>
                                                        .
                                                        <a class="copy-text btn-dl" data-clipboard-text="<?php echo $_smarty_tpl->tpl_vars['subInfo']->value['v2ray'];?>
"><i class="material-icons icon-sm">send</i> 拷贝 V2Ray 订阅链接</a>
                                                    </p>
                                            <?php if (array_key_exists('Router',$_smarty_tpl->tpl_vars['config']->value['userCenterClient'])) {?>
                                                <?php if (count($_smarty_tpl->tpl_vars['config']->value['userCenterClient']['Router']) != 0) {?>
                                                    <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'printClient', array('items'=>$_smarty_tpl->tpl_vars['config']->value['userCenterClient']['Router']), true);?>

                                                <?php }?>
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
            <?php $_smarty_tpl->_subTemplateRender('file:dialog.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

        </section>
    </div>
</main>


<?php $_smarty_tpl->_subTemplateRender('file:user/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/shake.js@1.2.2/shake.min.js"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
>

    function DateParse(str_date) {
        var str_date_splited = str_date.split(/[^0-9]/);
        return new Date(str_date_splited[0], str_date_splited[1] - 1, str_date_splited[2], str_date_splited[3], str_date_splited[4], str_date_splited[5]);
    }

<?php echo '</script'; ?>
>

<?php echo '<script'; ?>
>

    $(function () {
        new Clipboard('.copy-text');
    });

    $(".copy-text").click(function () {
        $("#result").modal();
        $$.getElementById('msg').innerHTML = '已复制，请您继续接下来的操作';
    });

    function AddSub(url,jumpurl="") {
	    let tmp = window.btoa(url);
	    window.location.href = jumpurl + tmp;
    }

    function Copyconfig(url,id,jumpurl="") {
        $.ajax({
            url: url,
            type: 'get',
            async: false,
            success: function(res) {
                if(res) {
                    $("#result").modal();
                    $("#msg").html("获取成功");
                    $(id).data('data', res);
		    		console.log(res);
                } else {
                    $("#result").modal();
                   $("#msg").html("获取失败，请稍后再试");
               }
            }
        });
        const clipboard = new Clipboard('.copy-config', {
            text: function() {
                return $(id).data('data');
            }
        });
        clipboard.on('success', function(e) {
				    $("#result").modal();
				    if (jumpurl != "") {
					    $("#msg").html("复制成功，即将跳转到 APP");
					    window.setTimeout(function () {
						    window.location.href = jumpurl;
					    }, 1000);

				    } else {
					    $("#msg").html("复制成功");
				    }
			    }
        );
        clipboard.on("error",function(e){
		    console.error('Action:', e.action);
		    console.error('Trigger:', e.trigger);
		    console.error('Text:', e.text);
			}
	    );
    }

    <?php if ($_smarty_tpl->tpl_vars['user']->value->transfer_enable-($_smarty_tpl->tpl_vars['user']->value->u+$_smarty_tpl->tpl_vars['user']->value->d) == 0) {?>
    window.onload = function () {
        $("#result").modal();
        $$.getElementById('msg').innerHTML = '您的流量已经用完或账户已经过期了，如需继续使用，请进入商店选购新的套餐~';
    };
    <?php }?>

    <?php if ($_smarty_tpl->tpl_vars['geetest_html']->value == null) {?>

    var checkedmsgGE = '<p><a class="btn btn-brand disabled btn-flat waves-attach" href="#"><span class="icon">check</span>&nbsp;已签到</a></p>';
    window.onload = function () {
        var myShakeEvent = new Shake({
            threshold: 15
        });
        myShakeEvent.start();
        window.addEventListener('shake', shakeEventDidOccur, false);
        function shakeEventDidOccur() {
            if ("vibrate" in navigator) {
                navigator.vibrate(500);
            }
            $.ajax({
                type: "POST",
                url: "/user/checkin",
                dataType: "json",<?php if ($_smarty_tpl->tpl_vars['recaptcha_sitekey']->value != null) {?>
                data: {
                    recaptcha: grecaptcha.getResponse()
                },<?php }?>
                success: (data) => {
                    if (data.ret) {

                        $$.getElementById('checkin-msg').innerHTML = data.msg;
                        $$.getElementById('checkin-btn').innerHTML = checkedmsgGE;
                        $("#result").modal();
                        $$.getElementById('msg').innerHTML = data.msg;
                        $$.getElementById('remain').innerHTML = data.trafficInfo['unUsedTraffic'];
                        $('.bar.remain.color').css('width', (data.unflowtraffic - (<?php echo $_smarty_tpl->tpl_vars['user']->value->u;?>
+<?php echo $_smarty_tpl->tpl_vars['user']->value->d;?>
)) / data.unflowtraffic * 100 + '%');
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
    };

    $(document).ready(function () {
        $("#checkin").click(function () {
            $.ajax({
                type: "POST",
                url: "/user/checkin",
                dataType: "json",<?php if ($_smarty_tpl->tpl_vars['recaptcha_sitekey']->value != null) {?>
                data: {
                    recaptcha: grecaptcha.getResponse()
                },<?php }?>
                success: (data) => {
                    if (data.ret) {
                        $$.getElementById('checkin-msg').innerHTML = data.msg;
                        $$.getElementById('checkin-btn').innerHTML = checkedmsgGE;
                        $("#result").modal();
                        $$.getElementById('msg').innerHTML = data.msg;
                        $$.getElementById('remain').innerHTML = data.trafficInfo['unUsedTraffic'];
                        $('.bar.remain.color').css('width', (data.unflowtraffic - (<?php echo $_smarty_tpl->tpl_vars['user']->value->u;?>
+<?php echo $_smarty_tpl->tpl_vars['user']->value->d;?>
)) / data.unflowtraffic * 100 + '%');
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
            })
        })
    })

    <?php } else { ?>

    window.onload = function () {
        var myShakeEvent = new Shake({
            threshold: 15
        });
        myShakeEvent.start();
        window.addEventListener('shake', shakeEventDidOccur, false);
        function shakeEventDidOccur() {
            if ("vibrate" in navigator) {
                navigator.vibrate(500);
            }
            c.show();
        }
    };

    var handlerPopup = function (captchaObj) {
        c = captchaObj;
        captchaObj.onSuccess(function () {
            var validate = captchaObj.getValidate();
            $.ajax({
                url: "/user/checkin", // 进行二次验证
                type: "post",
                dataType: "json",
                data: {
                    // 二次验证所需的三个值
                    geetest_challenge: validate.geetest_challenge,
                    geetest_validate: validate.geetest_validate,
                    geetest_seccode: validate.geetest_seccode
                },
                success: (data) => {
                    if (data.ret) {
                        $$.getElementById('checkin-msg').innerHTML = data.msg;
                        $$.getElementById('checkin-btn').innerHTML = checkedmsgGE;
                        $("#result").modal();
                        $$.getElementById('msg').innerHTML = data.msg;
                        $$.getElementById('remain').innerHTML = data.trafficInfo['unUsedTraffic'];
                        $('.bar.remain.color').css('width', (data.unflowtraffic - (<?php echo $_smarty_tpl->tpl_vars['user']->value->u;?>
+<?php echo $_smarty_tpl->tpl_vars['user']->value->d;?>
)) / data.unflowtraffic * 100 + '%');
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
        });
        // 弹出式需要绑定触发验证码弹出按钮
        //captchaObj.bindOn("#checkin")
        // 将验证码加到id为captcha的元素里
        captchaObj.appendTo("#popup-captcha");
        // 更多接口参考：http://www.geetest.com/install/sections/idx-client-sdk.html
    };

    initGeetest({
        gt: "<?php echo $_smarty_tpl->tpl_vars['geetest_html']->value->gt;?>
",
        challenge: "<?php echo $_smarty_tpl->tpl_vars['geetest_html']->value->challenge;?>
",
        product: "popup", // 产品形式，包括：float，embed，popup。注意只对PC版验证码有效
        offline: <?php if ($_smarty_tpl->tpl_vars['geetest_html']->value->success) {?>0<?php } else { ?>1<?php }?> // 表示用户后台检测极验服务器是否宕机，与SDK配合，用户一般不需要关注
    }, handlerPopup);

    <?php }?>

<?php echo '</script'; ?>
>

<?php if ($_smarty_tpl->tpl_vars['recaptcha_sitekey']->value != null) {?>
    <?php echo '<script'; ?>
 src="https://recaptcha.net/recaptcha/api.js" async defer><?php echo '</script'; ?>
>
<?php }
}
/* smarty_template_function_printClient_1822332693634fdb2510f7b8_90463004 */
if (!function_exists('smarty_template_function_printClient_1822332693634fdb2510f7b8_90463004')) {
function smarty_template_function_printClient_1822332693634fdb2510f7b8_90463004(Smarty_Internal_Template $_smarty_tpl,$params) {
$params = array_merge(array('items'=>null), $params);
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/www/wwwroot/subscribe/vendor/smarty/smarty/libs/plugins/modifier.replace.php','function'=>'smarty_modifier_replace',),));
?>

                                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['items']->value, 'item');
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
                                                    <hr/>
												    <p><span class="icon icon-lg text-white">filter_9_plus</span> <?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
 - [ <?php echo $_smarty_tpl->tpl_vars['item']->value['support'];?>
 ]：</p>
													<p>
                                                        应用下载：
                                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['item']->value['download_urls'], 'download_url');
$_smarty_tpl->tpl_vars['download_url']->index = -1;
$_smarty_tpl->tpl_vars['download_url']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['download_url']->value) {
$_smarty_tpl->tpl_vars['download_url']->do_else = false;
$_smarty_tpl->tpl_vars['download_url']->index++;
$_smarty_tpl->tpl_vars['download_url']->first = !$_smarty_tpl->tpl_vars['download_url']->index;
$__foreach_download_url_1_saved = $_smarty_tpl->tpl_vars['download_url'];
?>
                                                        <?php if (!$_smarty_tpl->tpl_vars['download_url']->first) {?>.<?php }?>
                                                        <a class="btn-dl" href="<?php echo $_smarty_tpl->tpl_vars['download_url']->value['url'];?>
"><i class="material-icons icon-sm">cloud_download</i> <?php echo $_smarty_tpl->tpl_vars['download_url']->value['name'];?>
</a>
                                                        <?php
$_smarty_tpl->tpl_vars['download_url'] = $__foreach_download_url_1_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                                    </p>
													<p>
                                                        使用教程：
                                                        <a class="btn-dl" href="<?php if ($_smarty_tpl->tpl_vars['config']->value['use_this_doc'] === false) {?>/user/tutorial<?php } else {
echo $_smarty_tpl->tpl_vars['item']->value['tutorial_url'];
}?>"><i class="material-icons icon-sm">turned_in_not</i> 点击查看</a>
                                                    </p>
                                                    <?php if ((isset($_smarty_tpl->tpl_vars['item']->value['description']))) {?>
													<p>
                                                        相关说明：
                                                        <?php echo $_smarty_tpl->tpl_vars['item']->value['description'];?>

                                                    </p>
                                                    <?php }?>
													<p>
                                                        使用方式：
                                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['item']->value['subscribe_urls'], 'subscribe_url');
$_smarty_tpl->tpl_vars['subscribe_url']->index = -1;
$_smarty_tpl->tpl_vars['subscribe_url']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['subscribe_url']->value) {
$_smarty_tpl->tpl_vars['subscribe_url']->do_else = false;
$_smarty_tpl->tpl_vars['subscribe_url']->index++;
$_smarty_tpl->tpl_vars['subscribe_url']->first = !$_smarty_tpl->tpl_vars['subscribe_url']->index;
$__foreach_subscribe_url_2_saved = $_smarty_tpl->tpl_vars['subscribe_url'];
?>
                                                        <?php if (!$_smarty_tpl->tpl_vars['subscribe_url']->first) {?>.<?php }?>
                                                        <?php $_smarty_tpl->_assignInScope('url', smarty_modifier_replace($_smarty_tpl->tpl_vars['subscribe_url']->value['url'],'%userUrl%',$_smarty_tpl->tpl_vars['subInfo']->value['link']));?>
                                                        <?php if ($_smarty_tpl->tpl_vars['subscribe_url']->value['type'] == 'href') {?>
                                                        <a class="btn-dl" href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
"><i class="material-icons icon-sm">send</i> <?php echo $_smarty_tpl->tpl_vars['subscribe_url']->value['name'];?>
</a>
                                                        <?php } else { ?>
                                                        <a class="copy-text btn-dl" data-clipboard-text="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
"><i class="material-icons icon-sm">send</i> <?php echo $_smarty_tpl->tpl_vars['subscribe_url']->value['name'];?>
</a>
                                                        <?php }?>
                                                    <?php
$_smarty_tpl->tpl_vars['subscribe_url'] = $__foreach_subscribe_url_2_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                                    </p>
                                                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                            <?php
}}
/*/ smarty_template_function_printClient_1822332693634fdb2510f7b8_90463004 */
}
