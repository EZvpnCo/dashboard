<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>{$config['appName']}</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=1280">
    <link rel="stylesheet" href="/theme/zhujike/i.css">
    <meta http-equiv="Cache-Control" content="no-siteapp">
    <meta name="apple-mobile-web-app-title" content="Hostker">
    <meta name="google" value="notranslate">
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no"
          name="viewport">
</head>

<body class="">
<div id="stage">
    <article class="step-1">
        <div class="step-1-in">
            <div id="test" style="transform: rotateX(-1.445deg) rotateY(-1.815deg);">
                <header>
                    <div class="layout"><h1>{$config['appName']}</h1>
                        <nav>
                            <a href="/">Home page</a>
                            {*                            <a href="https://www.hostker.com/about.html">The document</a>*}
                            {if $user->isLogin}
                                <a href="/user" class="login-link">The user center</a>
                            {else}
                                <a href="/auth/login" class="login-link">landing</a>
                            {/if}
                        </nav>
                    </div>
                </header>
                <h2><span class="line line-1">May be<span class="moji-1">The most of</span>the</span> <span
                            class="line line-2">Cloud computing service providers</span></h2><i class="bg"></i> <i class="hr"></i>
                <div class="shell-box"><i class="shell-shadow"></i> <i class="shell"><span></span></i></div>
                <a class="link-reg" href="/auth/register">Begin to use</a><i class="light"></i></div>
        </div>
    </article>
    <span class="tip tip-1">Scroll down</span>
    <article class="step-2">
        <div class="content"><h3 class="ui-h ui-h-1">Technical advantages</h3>
            <ul>
                <li class="feature-1">
                    <div class="icon"><i></i><big>1</big><cite>Second</cite></div>
                    <h4>The second level condition monitoring</h4>
                    <p>Feel cloud hosting heartbeat, locate performance bottlenecks seconds</p></li>
                <li class="feature-2">
                    <div class="icon"><i></i><big>1</big><cite>Minute</cite></div>
                    <h4>50 Second out-of-the-box</h4>
                    <p>Minutes built cloud hosting, want to code is code without pressure</p></li>
                <li class="feature-3">
                    <div class="icon"><i></i><big>1</big><cite>Hour</cite></div>
                    <h4>A granular hour</h4>
                    <p>On-demand pricing is the real cloud computing!</p></li>
                <li class="feature-4">
                    <div class="icon"><i></i><big>1000</big><cite>Mbps</cite></div>
                    <h4>Gigabit network interconnection</h4>
                    <p>Internal source mirror station, upgrade without having to wait</p></li>
                <li class="feature-5">
                    <div class="icon"><i></i><big></big><cite>SmartQuota</cite></div>
                    <h4>Dynamic resource quota</h4>
                    <p>Large neighbor is not terrible, intelligent quota control it</p></li>
                <li class="feature-6">
                    <div class="icon"><i></i><cite>API</cite></div>
                    <h4>Open interface support</h4>
                    <p>From now on become cluster maintenanceSo Easy！</p></li>
            </ul>
        </div>
        <i class="after"></i></article>
    <article class="step-3"><h3 class="ui-h ui-h-2">Service purchase</h3>
        <ul>
            {foreach $I18N['plans-info'][$i18n->lang] as $name => $plan}
                <li>
                    <div class="head"><h4 id="price-1"><big>{$plan['currency']}{$plan['price']}
                                yuan/{$plan['billing']}</big>
                            <small> {$plan['name']}</small></h4></div>
                    <ul>
                        {foreach $plan['features'] as $feature}
                            {if $feature['support'] == true}
                                <li><i>√</i> <b>{$feature['name']}</b></li>
                            {else}
                                <li><i>×</i> <b>{$feature['name']}</b></li>
                            {/if}
                        {/foreach}
                    </ul>
                    <a class="button" href="/user/shop">buy</a>
                </li>
            {/foreach}
        </ul>
        <div class="note layout" id="price-note"><p>※
                The data center in China(Hong Kong), Japan(Tokyo, OsaLos Angeles, SAN joLos Angeles, SAN jose,、SAN jose), SingaporeThe slope, the UK,(Lomethoddon)FrankfurtmethodHenri Frankfort), the Netherlands,(Amsterdam)</p></div>
    </article>
    <article class="step-4">
        <div id="step4">
            <div class="content"><i></i>
                <h3 class="ui-h ui-h-3">Hardware defense</h3>
                <div class="note layout"><p>Using shield cluster to cleaning</p>
                    <p>Automatic detection within one minute 3-7 Level attack package features start the defense plan</p></div>
                <a class="button" href="/user/shop" target="_blank">Enter the use</a>
                <div class="note layout"><p class="op5">The highest caTo protect thebe customized to upgrade to 200G To protect the</p></div>
            </div>
            <i class="shell-2"></i></div>
    </article>
    <footer class="step-5">
        <div class="htko"><p>The beginning of everything, the continuation of the dream</p></div>
        <div class="layout">
            <div class="l"><a href="/" target="_blank">@{$config['appName']}</a></div>
            <div class="r"><a href="https://90.cx/" target="_blank">{$config['appName']}</a></div>
        </div>
    </footer>
</div>
<script src="/theme/zhujike/hm.js"></script>
<script src="/theme/zhujike/c.js"></script>
<div style="display:none">
    <script type="text/javascript" src="/theme/zhujike/stats.js" charset="UTF-8"></script>
</div>
</body>
</html>
