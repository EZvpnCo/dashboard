<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Shop &mdash; {$config["appName"]}</title>
        {include file='include/global/head.tpl'}
        <style>
            .bg-radial-gradient-plan-1 {
                background: radial-gradient(#00ad12, #2aff6c);
            }
            .bg-radial-gradient-plan-2 {
                background: radial-gradient(#00a1ad, #2affba);
            }
            .bg-radial-gradient-plan-3 {
                background: radial-gradient(#0069ad, #2ac4ff);
            }
            .nav.nav-pills.nav-primary .nav-link.active {
                color: #545454 !important;
                background-color: transparent;
                border: 2px solid #3faf4c !important;
            }
            .nav.nav-pills.nav-primary .show>.nav-link .nav-text, .nav.nav-pills.nav-primary .nav-link:hover:not(.active) .nav-text {
                color: #3faf4c;
            }
            .nav.nav-pills.nav-primary .nav-link.active .nav-text {
                color: #545454;
                font-size: 16px !important;
            }


            .bg-radial-gradient-plan-1 .btn.btn-primary {
                color: #FFFFFF;
                background-color: #00ad12;
                border-color: #00ad12;
            }
            .bg-radial-gradient-plan-1 .btn.btn-primary:hover:not(.btn-text) {
                color: #FFFFFF;
                background-color: #2aff6c;
                border-color: #2aff6c;
            }
            .bg-radial-gradient-plan-1 .text-primary {
                color: #00ad12 !important;
            }


            .bg-radial-gradient-plan-2 .btn.btn-primary {
                color: #FFFFFF;
                background-color: #00a1ad;
                border-color: #00a1ad;
            }
            .bg-radial-gradient-plan-2 .btn.btn-primary:hover:not(.btn-text) {
                color: #FFFFFF;
                background-color: #2affba;
                border-color: #2affba;
            }
            .bg-radial-gradient-plan-2 .text-primary {
                color: #00a1ad !important;
            }


            .bg-radial-gradient-plan-3 .btn.btn-primary {
                color: #FFFFFF;
                background-color: #0069ad;
                border-color: #0069ad;
            }
            .bg-radial-gradient-plan-3 .btn.btn-primary:hover:not(.btn-text) {
                color: #FFFFFF;
                background-color: #2ac4ff;
                border-color: #2ac4ff;
            }
            .bg-radial-gradient-plan-3 .text-primary {
                color: #0069ad !important;
            }

        </style>
        <div class="d-flex flex-column flex-root">
            <div class="d-flex flex-row flex-column-fluid page">
                <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
                    {include file='include/global/menu.tpl'}
                    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                        <div class="subheader min-h-lg-175px pt-5 pb-7 subheader-transparent" id="kt_subheader">
                            <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                                <div class="d-flex align-items-center flex-wrap mr-2">
                                    <div class="d-flex flex-column">
                                        <h2 class="text-white font-weight-bold my-2 mr-5">Shop</h2>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <a href="javascript:;" class="btn {$style[$theme_style]['global']['btn_subheader']} font-weight-bold py-3 px-6" data-toggle="modal" data-target="#traffic_package_modal">Buy traffic</a>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex flex-column-fluid">
                            <div class="container">

                                <div class="row">

                                    {if $metron['shop_pop_enable'] === true}
                                    <div class="col-12">
                                        <div class="card card-custom gutter-b {$metron['style_shadow']}">
                                            <div class="card-body mt-4">
                                                {$metron['shop_pop_info']}
                                            </div>
                                        </div>
                                    </div>
                                    {/if}

                                    {if $metron['shop_activity_true'] === true && strtotime({$metron['shop_activity_buy_time']}) > time()}
                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 col-xxl-3">
                                        <div class="card card-custom {$style[$theme_style]['shop']['card_head']} gutter-b card-stretch {$metron['style_shadow']}" style="border-bottom-right-radius: 1.5rem;border-bottom-left-radius: 1.5rem;">
                                            <div class="card-header border-0" style="min-height: 50px;">
                                            </div>
                                            <div class="card-body d-flex flex-column p-0" style="position: relative;">
                                                <div class="" style="height: 100px; min-height: 100px;">
                                                    <h3 class="display-3 text-white text-center"><strong>{$metron['shop_activity_name']}</strong></h3>
                                                </div>
                                                <div class="card-spacer {$style[$theme_style]['shop']['card_bg']} card-rounded flex-grow-1 {$metron['style_shadow']}">
                                                    <ul class="dashboard-tabs nav nav-pills row nav-primary row-paddingless m-0 p-0" role="tablist">
                                                        <li class="nav-item d-flex col flex-grow-1 flex-shrink-0 ml-1 mr-1 mb-0 cursor_onclick">
                                                            <a class="nav-link border d-flex flex-grow-1 rounded flex-column align-items-center p-1 active" data-toggle="pill" href="#shop-activity">
                                                                <span class="nav-text font-size-lg py-2 font-weight-bold text-center">
                                                                    <span id="_t">The countdown:</span>
                                                                    <span id="_d"> </span>
                                                                    <span id="_h"> </span>
                                                                    <span id="_m"> </span>
                                                                    <span id="_s"> </span>
                                                                </span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                    <div class="tab-content m-0 p-0">
                                                        <div class="tab-pane active show" id="shop-activity" role="tabpanel">
                                                            {foreach $shops as $shop}
                                                            {if $shop->id !== $metron['shop_activity_id']}{continue}{/if}
                                                            <div class="row">
                                                                <div class="col pl-6 pt-6 pb-0">
                                                                    <div class="display-3 text-primary font-weight-bolder"><small><i class="fa fa-yen-sign text-primary"></i></small> <strong>{$shop->price}</strong></div>
                                                                </div>
                                                            </div>
                                                            {$shopLt = $shop->limitamount()}
                                                            {$shopBi = $shop->limitamount('bi')}
                                                            {$shopCan = $shop->limitamount('can')}
                                                            <div class="d-flex flex-column w-100 pl-2 pt-3">
                                                                <span class="font-size-sm text-muted font-weight-bold pb-3">
                                                                    {if $shopLt == 0}The unlimited purchase goods{else}<span class="{if $shopBi < 5}text-danger{else}text-primary{/if}">{if $shopCan === 0}The goods has been sold out, Try to buy the other time{else}This commodity purchase surplus {$shopCan} Copy of the{/if}{/if}</span>
                                                                </span>
                                                                <div class="progress progress-md w-100">
                                                                    <div class="progress-bar progress-bar-striped {if $shopBi < 5}bg-danger{else}bg-primary{/if}" role="progressbar" style="width: {$shopBi}%;" aria-valuenow="{$shopBi}" aria-valuemin="0" aria-valuemax="100">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row text-center {$style[$theme_style]['shop']['card_text']}">
                                                                <div class="col pl-6 pt-6 pb-0">
                                                                    <div class="font-size-sm text-muted font-weight-bold">Membership grade</div>
                                                                    <div class="font-size-h4 font-weight-bolder">{$metron['user_level'][$shop->user_class()]}</div>
                                                                </div>
                                                                <div class="col pl-6 pt-6 pb-0">
                                                                    <div class="font-size-sm text-muted font-weight-bold">Rank the length</div>
                                                                    <div class="font-size-h4 font-weight-bolder">{$shop->class_expire()} day</div>
                                                                </div>
                                                            </div>
                                                            <div class="row text-center {$style[$theme_style]['shop']['card_text']}">
                                                                <div class="col pl-6 pt-6 pb-0">
                                                                    <div class="font-size-sm text-muted font-weight-bold">Add traffic</div>
                                                                    <div class="font-size-h4 font-weight-bolder">{$shop->bandwidth()} GB</div>
                                                                </div>
                                                                <div class="col pl-6 pt-6 pb-0">
                                                                    <div class="font-size-sm text-muted font-weight-bold">The reset cycle</div>
                                                                    <div class="font-size-h4 font-weight-bolder">{if $shop->reset()!=0}{$shop->reset()}Day to reset the{else}Due to reset{/if}</div>
                                                                </div>
                                                            </div>
                                                            <div class="row text-center {$style[$theme_style]['shop']['card_text']}">
                                                                <div class="col pl-6 pt-6 pb-0">
                                                                    <div class="font-size-sm text-muted font-weight-bold">At the same time online</div>
                                                                    <div class="font-size-h4 font-weight-bolder">{if {$shop->connector()} == '0' }unlimited{else}{$shop->connector()}A device{/if}</div>
                                                                </div>
                                                                <div class="col pl-6 pt-6 pb-0">
                                                                    <div class="font-size-sm text-muted font-weight-bold">Peak rate</div>
                                                                    <div class="font-size-h4 font-weight-bolder">{if {$shop->speedlimit()} == '0' }unlimited{else}{$shop->speedlimit()}Mbps{/if}</div>
                                                                </div>
                                                            </div>
                                                            {if $metron['shop_activity_text'] !== ''}
                                                            <div class="row text-center">
                                                                <div class="col pl-6 pt-4 pb-0">
                                                                    <div class="font-size-h4 font-weight-bolder {$style[$theme_style]['shop']['card_text']}">{$metron['shop_activity_text']}</div>
                                                                </div>
                                                            </div>
                                                            {/if}
                                                            {foreach $shop->content_extra() as $service}
                                                            <div class="row text-center">
                                                                <div class="col pl-6 pt-4 pb-0">
                                                                    {if $service[0] === 'true'}
                                                                    <div class="font-size-h4 font-weight-bolder {$style[$theme_style]['shop']['card_text']}">{$service[1]}</div>
                                                                    {else}
                                                                    <div class="font-size-h4 font-weight-bolder text-dark-50"><del>{$service[1]}</del></div>
                                                                    {/if}
                                                                </div>
                                                            </div>
                                                            {/foreach}
                                                            <div class="pt-8">
                                                                {if $shopLt != 0 && $shopCan <= 0}
                                                                <button class="btn {$style[$theme_style]['shop']['card_btn']} btn-block btn-pill" href="javascript:void(0);" type="button" onClick="shop.metronBuy('{$shop->id}',{$shop->auto_renew});" id="buytext-{$shop->id}" disabled="true">The goods has reached the upper limit</button>
                                                                {else}
                                                                <button class="btn {$style[$theme_style]['shop']['card_btn']} btn-block btn-pill" href="javascript:void(0);" type="button" onClick="shop.metronBuy('{$shop->id}',{$shop->auto_renew});" id="buytext-{$shop->id}">buy</button>
                                                                {/if}
                                                            </div>
                                                            {/foreach}
                                                        </div>
                                                    </div>
                                                </div>
                                            <div class="resize-triggers"><div class="expand-trigger"><div style="width: 414px; height: 419px;"></div></div><div class="contract-trigger"></div></div></div>
                                        </div>
                                    </div>
                                    <script> var shop_activity_time = "{$metron['shop_activity_buy_time']}"; </script>
                                    {/if}

                                    {if $metron['shop_Experience_true'] === true && $user->class === -1 && $user->lastSsTime() == 'Never use meow' && $metron['shop_Experience_pos'] === 'top'}
                                        {include file='include/shop/Trial.tpl'}
                                    {/if}

                                    {foreach $metron['shop_plan'] as $shop_class_name => $shop_info_time_id}
                                    {foreach $shop_info_time_id as $shop_info => $shop_time_id}
                                    <div class="col-xs-12 col-lg-6">
                                        <div class="card card-custom
                                        {if $shop_class_name == 'Daily' or $shop_class_name == 'Daily+'} bg-radial-gradient-plan-1
                                        {elseif $shop_class_name == 'Trade' or $shop_class_name == 'Trade+'} bg-radial-gradient-plan-2
                                        {elseif $shop_class_name == 'Game' or $shop_class_name == 'Game+'} bg-radial-gradient-plan-3
                                        {else} bg-radial-gradient-primary
                                        {/if}
                                        gutter-b card-stretch {$metron['style_shadow']}" style="border-bottom-right-radius: 1.5rem;border-bottom-left-radius: 1.5rem;">
                                            <div class="card-header border-0" style="min-height: 50px;">
                                            </div>
                                            <div class="card-body d-flex flex-column p-0" style="position: relative;">
                                                <div class="" style="height: 100px; min-height: 100px;">
                                                    <h3 class="display-3 text-white text-center"><strong>{$shop_class_name}</strong></h3>
                                                </div>
                                                <div class="card-spacer {$style[$theme_style]['shop']['card_bg']} card-rounded flex-grow-1 {$metron['style_shadow']}">

                                                    <ul class="dashboard-tabs nav nav-pills row nav-primary row-paddingless m-0 p-0" role="tablist">
                                                        {foreach $shop_time_id as $shop_time => $shop_id}
                                                        <li class="nav-item d-flex col flex-grow-1 flex-shrink-0 ml-1 mr-1 mb-0 cursor_onclick">
                                                            <a class="nav-link border d-flex flex-grow-1 rounded flex-column align-items-center p-1 {if $shop_id@index === 0} active{/if}" data-toggle="pill" href="#tab-shop-{$shop_id}">
                                                                <span class="nav-text font-size-lg py-2 font-weight-bold text-center">{$shop_time}</span>
                                                            </a>
                                                        </li>
                                                        {/foreach}
                                                    </ul>

                                                    <div class="tab-content m-0 p-0">
                                                        {foreach $shop_time_id as $shop_time => $shop_id}
                                                        <div class="tab-pane {if $shop_id@index === 0} active show{/if}" id="tab-shop-{$shop_id}" role="tabpanel">
                                                            {foreach $shops as $shop}
                                                            {if $shop->id !== $shop_id}{continue}{/if}
                                                            <div class="row">
                                                                <div class="col pl-6 pt-6 pb-0">
                                                                    <div class="display-3 text-primary font-weight-bolder"><small><i class="fa fa-dollar-sign text-primary"></i></small> <strong>{$shop->price}</strong></div>
                                                                </div>
                                                            </div>
                                                            {$shopLt = $shop->limitamount()}
                                                            {$shopBi = $shop->limitamount('bi')}
                                                            {$shopCan = $shop->limitamount('can')}
                                                            <div class="d-flex flex-column w-100 pl-2 pt-3">
                                                                <span class="font-size-sm text-muted font-weight-bold pb-3">
                                                                    {if $shopLt == 0}Unlimited{else}<span class="{if $shopBi < 5}text-danger{else}text-primary{/if}">{if $shopCan === 0}Sold out{else}This commodity purchase surplus {$shopCan} Copy of the{/if}{/if}</span>
                                                                </span>
                                                                <div class="progress progress-md w-100">
                                                                    <div class="progress-bar progress-bar-striped {if $shopBi < 5}bg-danger{else}bg-primary{/if}" role="progressbar" style="width: {$shopBi}%;" aria-valuenow="{$shopBi}" aria-valuemin="0" aria-valuemax="100">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row text-center {$style[$theme_style]['shop']['card_text']}">
                                                                <div class="col pl-6 pt-6 pb-0">
                                                                    <div class="font-size-sm text-muted font-weight-bold">Membership</div>
                                                                    <div class="font-size-h4 font-weight-bolder">{$metron['user_level'][$shop->user_class()]}</div>
                                                                </div>
                                                                <div class="col pl-6 pt-6 pb-0">
                                                                    <div class="font-size-sm text-muted font-weight-bold">Time</div>
                                                                    <div class="font-size-h4 font-weight-bolder">{$shop->class_expire()} Day</div>
                                                                </div>
                                                            </div>
                                                            <div class="row text-center {$style[$theme_style]['shop']['card_text']}">
                                                                <div class="col pl-6 pt-6 pb-0">
                                                                    <div class="font-size-sm text-muted font-weight-bold">Traffic</div>
                                                                    <!--<div class="font-size-h4 font-weight-bolder">{$shop->bandwidth()} GB</div>-->
                                                                    <div class="font-size-h4 font-weight-bolder">Unlimited</div>
                                                                </div>
                                                                <div class="col pl-6 pt-6 pb-0">
                                                                    <div class="font-size-sm text-muted font-weight-bold">Reset cycle</div>
                                                                    <div class="font-size-h4 font-weight-bolder">{if $shop->reset()!=0}Every {$shop->reset()}Day{else}No-reset{/if}</div>
                                                                </div>
                                                            </div>
                                                            <div class="row text-center {$style[$theme_style]['shop']['card_text']}">
                                                                <div class="col pl-6 pt-6 pb-0">
                                                                    <div class="font-size-sm text-muted font-weight-bold">Devices</div>
                                                                    <div class="font-size-h4 font-weight-bolder">{if {$shop->connector()} == '0' }Unlimited{else}{$shop->connector()} Device{/if}</div>
                                                                </div>
                                                                <div class="col pl-6 pt-6 pb-0">
                                                                    <div class="font-size-sm text-muted font-weight-bold">Peak rate</div>
                                                                    <div class="font-size-h4 font-weight-bolder">{if {$shop->speedlimit()} == '0' }Unlimited{else}{$shop->speedlimit()}Mbps{/if}</div>
                                                                </div>
                                                            </div>
                                                            {if $shop_info !== ''}
                                                            <div class="row text-center">
                                                                <div class="col pl-6 pt-4 pb-0">
                                                                    <div class="font-size-h4 font-weight-bolder {$style[$theme_style]['shop']['card_text']}">{$shop_info}</div>
                                                                </div>
                                                            </div>
                                                            {/if}
                                                            {foreach $shop->content_extra() as $service}
                                                            <div class="row text-center">
                                                                <div class="col pl-6 pt-4 pb-0">
                                                                    {if $service[0] === 'true'}
                                                                    <div class="font-size-h4 font-weight-bolder {$style[$theme_style]['shop']['card_text']}">{$service[1]}</div>
                                                                    {else}
                                                                    <div class="font-size-h4 font-weight-bolder text-dark-50"><del>{$service[1]}</del></div>
                                                                    {/if}
                                                                </div>
                                                            </div>
                                                            {/foreach}
                                                            <div class="pt-8">
                                                                {if $shopLt != 0 && $shopCan <= 0}
                                                                <button class="btn {$style[$theme_style]['shop']['card_btn']} btn-block btn-pill" href="javascript:void(0);" type="button" onClick="shop.metronBuy('{$shop->id}',{$shop->auto_renew});" id="buytext-{$shop->id}" disabled="true">Finished</button>
                                                                {else}
                                                                <button class="btn {$style[$theme_style]['shop']['card_btn']} btn-block btn-pill" href="javascript:void(0);" type="button" onClick="shop.metronBuy('{$shop->id}',{$shop->auto_renew});" id="buytext-{$shop->id}">Buy</button>
                                                                {/if}
                                                            </div>
                                                            {/foreach}
                                                        </div>
                                                        {/foreach}
                                                    </div>
                                                </div>
                                            <div class="resize-triggers"><div class="expand-trigger"><div style="width: 414px; height: 419px;"></div></div><div class="contract-trigger"></div></div></div>
                                        </div>
                                    </div>
                                    {/foreach}
                                    {/foreach}

                                    {if $metron['shop_Experience_true'] === true && $user->class === -1 && $user->lastSsTime() == 'Never use meow' && $metron['shop_Experience_pos'] === 'bottom'}
                                        {include file='include/shop/Trial.tpl'}
                                    {/if}

                                </div>

                            </div>
                        </div>
                    </div>
                    {include file='include/global/footer.tpl'}
                </div>
            </div>
        </div>
        {include file='include/global/scripts.tpl'}

    </body>
</html>
