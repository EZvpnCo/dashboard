<!DOCTYPE html>
<html lang="zh-CN">
    <head>
        <title>Node configuration &mdash; {$config["appName"]}</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- The font -->
        <link href="{if $metron['assets_true']===true}{$metron['assets_url']}{else}/theme{/if}/metron/css/fonts.css?family=Poppins:300,400,500,600,700" rel="stylesheet" >
        <!-- Global style -->
        <link href="{if $metron['assets_true']===true}{$metron['assets_url']}{else}/theme{/if}/metron/css/plugins.css" rel="stylesheet" type="text/css" />
        <link href="{if $metron['assets_true']===true}{$metron['assets_url']}{else}/theme{/if}/metron/css/style.css" rel="stylesheet" type="text/css" />
        <!-- ico -->
        <link rel="shortcut icon" href="/favicon.ico" />
        <style>
        body {
            background: #fff;
            font-family: "Poppins", sans-serif;
            margin: 0;
            overflow-x: hidden;
            color: #000000;
            font-weight: 300
        }
        </style>
</head>

<!-- The page content start -->
<div class="fix-header card-no-border logo-center" id="nodeinfo-ssr">
    <!-- Node configuration options list start -->
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="nav-wrapper">
                <ul class="nav nav-pills nav-fill flex-md-row" id="tabs-text" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link mb-sm-3 mb-md-0 active" id="qr-card" data-toggle="tab" href="#node-qr-card" role="tab" aria-controls="all" aria-selected="true">Qr code</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mb-sm-3 mb-md-0" id="detail-card" data-toggle="tab" href="#node-detail-card" role="tab" aria-controls="all" aria-selected="true">Manual configuration</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mb-sm-3 mb-md-0" id="json-card" data-toggle="tab" href="#node-json-card" role="tab" aria-controls="all" aria-selected="true">Json</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Node configuration options list The end of the -->
    <!-- Node configuration options start -->
    <div class="tab-content br-n pn">
        <!-- Qr code start -->
        <div class="tab-pane fade active show" id="node-qr-card" role="tabpanel" aria-labelledby="all-tab">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-body">
                        <div class="text-center">
                            {$ssr_item = $node->getItem($user, $mu, $relay_rule_id, 0)}
                            <p style="color:red">{$node->name}</p>
                            <div class="text-center">
                                <a href="{URL::getItemUrl($ssr_item, 0)}">
                                    <div id="ss-qr-n">
                                    </div>
                                </a>
                            </div>
                            <p>Mobile phone click the qr code can jumpAPPThe import</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Qr code The end of the -->
        <!-- Manual configuration start -->
        <div class="tab-pane fade" id="node-detail-card" role="tabpanel" aria-labelledby="all-tab">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-body">
                        <div class="text-center">
                            <p style="color:red">{$node->name}</p>
                            {$ssr_item = $node->getItem($user, $mu, $relay_rule_id, 0)}
                            <p align="left">
                                The address of the server:<code>{$ssr_item['address']}</code><br>
                                Server port:<code>{$ssr_item['port']}</code><br>
                                Method of encryption:<code>{$ssr_item['method']}</code><br>
                                Password:<code>{$ssr_item['passwd']}</code><br>
                                Protocol:<code>{$ssr_item['protocol']}</code><br>
                                Protocol parameters:<code>{$ssr_item['protocol_param']}</code><br>
                                Confused:<code>{$ssr_item['obfs']}</code><br>
                                Confuse parameters:<code>{$ssr_item['obfs_param']}</code>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Manual configuration The end of the -->
        <!-- jsonconfiguration start -->
        <div class="tab-pane fade" id="node-json-card" role="tabpanel" aria-labelledby="all-tab">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-body">
                        <div class="card-main">
                            <div class="card-inner">
                                <pre style="color:#e83e8c">
{
"server": "{$ssr_item['address']}",
"local_address": "127.0.0.1",
"local_port": 1080,
"timeout": 300,
"workers": 1,
"server_port": {$ssr_item['port']},
"password": "{$ssr_item['passwd']}",
"method": "{$ssr_item['method']}",
"obfs": "{$ssr_item['obfs']}",
"obfs_param": "{$ssr_item['obfs_param']}",
"protocol": "{$ssr_item['protocol']}",
"protocol_param": "{$ssr_item['protocol_param']}"
}
                                </pre>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- jsonconfiguration The end of the -->
    </div>
    <!-- Node configuration options The end of the -->
    <!-- The introduction ofscript start -->
	<script src="{if $metron['assets_true']===true}{$metron['assets_url']}{else}/theme{/if}/metron/js/plugins.js" type="text/javascript"></script>
	<!-- <script src="{if $metron['assets_true']===true}{$metron['assets_url']}{else}/theme{/if}/metron/js/scripts.js" type="text/javascript"></script> -->
    <script src="{if $metron['assets_true']===true}{$metron['assets_url']}{else}/theme{/if}/metron/plugins/jQuery-qrcode/jquery.qrcode.min.js"></script>
    <script>
    var KTAppOptions = {
        "colors": {
            "state": {
                "brand": "#366cf3",
                "light": "#ffffff",
                "dark": "#282a3c",
                "primary": "#5867dd",
                "success": "#34bfa3",
                "info": "#36a3f7",
                "warning": "#ffb822",
                "danger": "#fd3995"
            },
            "base": {
                "label": ["#c5cbe3", "#a1a8c3", "#3d4465", "#3e4466"],
                "shape": ["#f0f3ff", "#d9dffa", "#afb4d4", "#646c9a"]
            }
        }
    };
    </script>
    <script>
    {if URL::SSRCanConnect($user, $mu)}
    var text_qrcode2 = '{URL::getItemUrl($ssr_item, 0)}';
    jQuery('#ss-qr-n').qrcode({
        "text": text_qrcode2
    });
    {/if}
    </script>
    <!-- The introduction ofscript The end of the -->
</div>

</html>