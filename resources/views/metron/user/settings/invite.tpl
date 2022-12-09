<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Invitation to register &mdash; {$config["appName"]}</title>
        {include file='include/global/head.tpl'}
        <div class="d-flex flex-column flex-root">
            <div class="d-flex flex-row flex-column-fluid page">
                <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
                    {include file='include/global/menu.tpl'}
                    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                        <div class="subheader min-h-lg-175px pt-5 pb-7 subheader-transparent" id="kt_subheader">
                            <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                                <div class="d-flex align-items-center flex-wrap mr-2">
                                    <div class="d-flex flex-column">
                                        <h2 class="text-white font-weight-bold my-2 mr-5">Invitation to register</h2>
                                    </div>
                                </div>
                                {include file='include/settings/menu.tpl'}

                                    <div class="flex-row-fluid ml-lg-8">
                                        <div class="row">
                                            <div class="col-md-5 col-lg-12 col-xl-5">
                                                <div class="card card-custom bgi-no-repeat gutter-b {$metron['style_shadow']}" style="min-height: 250px; background-position: calc(100% + 0.5rem) calc(100% + 0.5rem); background-size: 100% auto; background-image: url({$metron['assets_url']}/media/svg/patterns/rhone-2.svg)">
                                                    <div class="card-body">
                                                        <div class="p-4">
                                                            <h3 class="{$style[$theme_style]['global']['title']} font-weight-bolder">The rebate balance</h3>
                                                            <p class="{$style[$theme_style]['global']['title']} display-3 display1-lg pb-2" style="padding-top: 10px; padding-bottom: 10px"><span class="display-4"><strong>¥</strong> </span><strong>{$user->back_money}</strong></p>
                                                            <div class="pb-5">
                                                                <a href="Javascript:;" class="btn btn-danger font-weight-bold px-6 py-3" data-toggle="modal" data-target="#take_money_modal">withdrawal</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card card-custom bgi-no-repeat gutter-b {$metron['style_shadow']}" style="min-height: 400px; background-position: right top; background-size: 30% auto; background-image: url({$metron['assets_url']}/media/svg/shapes/abstract-3.svg)">
                                                    <div class="card-header border-0 pt-5">
                                                        <div class="card-title font-weight-bolder">
                                                            <div class="card-label text-primary font-weight-bold font-size-h3">
                                                                <strong>&nbsp;&nbsp;Invite function</strong>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-body pt-1">
                                                        <ul class="dashboard-tabs nav nav-pills row nav-primary row-paddingless m-0 p-0" role="tablist">
                                                            <li class="nav-item d-flex col flex-grow-1 flex-shrink-0 mr-3 mb-3 mb-lg-0 cursor_onclick">
                                                                <a class="nav-link border d-flex flex-grow-1 rounded flex-column align-items-center active" data-toggle="pill" href="#tab_invite_item">
                                                                    <span class="nav-text font-size-lg py-2 font-weight-bold text-center">details</span>
                                                                </a>
                                                            </li>
                                                            <li class="nav-item d-flex col flex-grow-1 flex-shrink-0 mr-3 mb-3 mb-lg-0 cursor_onclick">
                                                                <a class="nav-link border d-flex flex-grow-1 rounded flex-column align-items-center" data-toggle="pill" href="#tab_invite_setting">
                                                                    <span class="nav-text font-size-lg py-2 font-weight-bold text-center">Set up the</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                        <div class="separator separator-dashed separator-border-4 p-5"></div>
                                                        <div class="tab-content m-0 p-0">
                                                            <div class="tab-pane active" id="tab_invite_item" role="tabpanel">
                                                                <div class="card-body pb-0 pl-0">
                                                                    <div class="h2"><strong>When you invite a friend register</strong></div>
                                                                    {if $user->rebate != 0}
                                                                        <div class="h5 pt-1">You will get the other party<code>{if $user->c_rebate == 1 || $metron['c_rebate'] == true}Every time{else}For the first time{/if}</code>Top-up amount <code>{if $user->rebate > 0}{$user->rebate}%{else}{$config["code_payback"]}%{/if}</code> rebate</div>
                                                                    {/if}
                                                                    {if $config['invite_gift'] > 0}
                                                                        <div class="h5 pt-1">You will be a one-off <code>{$config["invite_gift"]}GB</code> Traffic reward</div>
                                                                    {/if}
                                                                    {if $config['invite_get_money'] > 0}
                                                                        <div class="h5 pt-1">TAWill get <code>{$config["invite_get_money"]}</code> Yuan reward as the initial capital</div>
                                                                    {/if}
                                                                    <div class="h6 pt-3" style="font-size: 0.8em">The remaining &nbsp;<code>{$user->invite_num}</code>&nbsp; Invited the number of times</div>
                                                                    <div class="pt-2">
                                                                        <button type="button" class="btn btn-primary btn-shadow btn-lg copy-text" data-clipboard-text="{$config["baseUrl"]}/auth/register?code={$code->code}">Copy invitation link</button>
                                                                        <button type="button" class="btn btn-primary btn-shadow btn-lg copy-text" data-clipboard-text="{$code->code}">Copy the invitation code</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane" id="tab_invite_setting" role="tabpanel">
                                                                <div class="card-body pb-0">
                                                                    <div class="pb-5">
                                                                        <button class="btn btn-primary"  data-toggle="modal" id="reset-link" onclick="setting.invite('reset');">Reset the invite code/link</button>
                                                                    </div>
                                                                    {if $config['invite_price']>=0 && $user->invite_num >= 0}
                                                                    <div class="form-group" id="pay_code_form">
                                                                        <label>Purchase invitation number  {$config['invite_price']}yutimen/time</label>
                                                                        <div class="input-group input-group-solid">
                                                                            <input type="number" class="form-control" placeholder="Number of input" id="buy-invite-num"/>
                                                                            <div class="input-group-append">
                                                                                <button class="btn btn-primary" type="button" onclick="setting.invite('buynum');">buy</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    {/if}
                                                                    {if $config['custom_invite_price']>=0}
                                                                    <div class="form-group" id="pay_code_form">
                                                                        <label>Custom invite code  {$config['custom_invite_price']}yuan/time</label>
                                                                        <div class="input-group input-group-solid">
                                                                            <input type="text" class="form-control" placeholder="Enter the invitation code" id="custom-invite-link"/>
                                                                            <div class="input-group-append">
                                                                                <button class="btn btn-primary" type="button" onclick="setting.invite('custom');">确认</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    {/if}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-7 col-lg-12 col-xl-7">
                                                <div class="card card-custom gutter-b card-stretch {$metron['style_shadow']}">
                                                    <div class="card-header flex-wrap border-0 pt-6">
                                                        <div class="card-title">
                                                            <h3 class="card-label text-primary"><strong>Rebate record</strong>
                                                            <span class="d-block text-muted pt-2 font-size-sm">Invite users to bring you a rebate</span></h3>
                                                        </div>
                                                    </div>
                                                    <div class="card-body pt-0">
                                                        <div class="datatable datatable-bordered datatable-head-custom" id="ajax_invite_back_data"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        {if $metron['invite_user'] === true}
                                        {if $metron['invite_user_for'] !== true || $metron['invite_user_for'] === true && $user->c_rebate === 1}
                                        <div class="card card-custom gutter-b {$metron['style_shadow']}">
                                            <div class="card-header flex-wrap border-0 pt-6">
                                                <div class="card-title">
                                                    <h3 class="card-label text-primary"><strong>Invite users to record</strong>
                                                    <span class="d-block text-muted pt-2 font-size-sm">You invite all the user list</span></h3>
                                                </div>
                                            </div>
                                            <div class="card-body pt-0">
                                                <div class="mb-7">
                                                    <div class="row align-items-center">
                                                        <div class="col-lg-9 col-xl-8">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-4 my-2 my-md-0">
                                                                    <div class="d-flex align-items-center">
                                                                        <label class="mr-3 mb-0 d-none d-md-block">state:</label>
                                                                        <select class="form-control" id="invite_user_status">
                                                                            <option value="">all</option>
                                                                            <option value="1">A prepaid phone users</option>
                                                                            <option value="0">No prepaid phone users</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="datatable datatable-bordered datatable-head-custom" id="ajax_invite_user_data"></div>
                                            </div>
                                        </div>
                                        {/if}
                                        {/if}

                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                    {include file='include/global/footer.tpl'}
                </div>
            </div>
        </div>

<div class="modal fade" id="take_money_modal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title {$style[$theme_style]['modal']['text_title']}"><strong>Withdrawal application</strong></h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label class="col-form-label text-lg-right text-left">Input amount:</label>
                    <div class="input-group input-group-solid">
                        <input type="number" class="form-control" placeholder="The amount of input to extract" name="take_money"/>
                    </div>
                </div>
                <label class="col-form-label text-lg-right text-left">Extraction method:</label>
                <ul class="dashboard-tabs nav nav-pills row nav-primary row-paddingless m-0 p-0" role="tablist">
                    <li class="nav-item d-flex col flex-grow-1 flex-shrink-0 mr-3 mb-3 mb-lg-0 cursor_onclick">
                        <a class="nav-link border py-5 d-flex flex-grow-1 rounded flex-column align-items-center active" data-toggle="pill" data-metron="1">
                            <span class="nav-icon py-2 w-auto">
                                <i class="fab fas fa-wallet icon-2x"></i>
                            </span>
                            <span class="nav-text font-size-lg py-2 font-weight-bold text-center">Go to the balance<br/>
                            <small>0 yuan The lift</small></span>
                        </a>
                    </li>
                    {if $metron['take_cash_enable'] === true}
                    <li class="nav-item d-flex col flex-grow-1 flex-shrink-0 mr-3 mb-3 mb-lg-0 cursor_onclick">
                        <a class="nav-link border py-5 d-flex flex-grow-1 rounded flex-column align-items-center" data-toggle="pill" data-metron="2">
                            <span class="nav-icon py-2 w-auto">
                                <i class="fab fas fa-people-arrows icon-2x"></i>
                            </span>
                            <span class="nav-text font-size-lg py-2 font-weight-bold text-center">To apply for cash withdrawals<br />
                            <small>{$metron['take_back_total']} yuan The lift</small></span>
                        </a>
                    </li>
                    {/if}
                </ul>
            </div>
            <div class="modal-footer">
                {if $metron['take_cash_enable'] === true}
                <a href="Javascript:;" class="btn btn-danger" data-toggle="modal" data-target="#agent_setting_modal">Withdrawal account Settings</a>
                {/if}
                <button type="button" class="btn btn-primary" type="button" onclick="setting.take_total();">confirm</button>
                <button type="button" class="btn {$style[$theme_style]['modal']['btn_close']} font-weight-bold" data-dismiss="modal">cancel</button>
            </div>
        </div>
    </div>
</div>

{if $metron['take_cash_enable'] === true}
<div class="modal fade" id="agent_setting_modal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title {$style[$theme_style]['modal']['text_title']}"><strong>Withdrawal is set</strong></h4>
            </div>
            <div class="modal-body">
                <p class="text-danger">Be sure to check whether the account is correct, As a result of incorrect account no to account, This site is not responsible for! </p>
                <div class="form-group">
                    <label class="col-form-label text-lg-right text-left">Account type:</label>
                    <select class="form-control" id="take_account_type" data-style="btn-primary">
                        {foreach $metron['take_account_type'] as $acctype}
                        <option value="{$acctype}" {if isset($user->config['take_account']) && $acctype == $user->config['take_account']['type']}selected="selected"{/if}>{$acctype}</option>
                        {/foreach}
                    </select>
                </div>
                <div class="form-group">
                    <label class="col-form-label text-lg-right text-left">Withdrawal account:</label>
                    <div class="input-group input-group-solid">
                        {if isset($user->config['take_account']) && $user->config['take_account']['acc']}
                        <input type="text" class="form-control" placeholder="Enter the withdrawal account" value="{$user->config['take_account']['acc']}" name="take_account_value"/>
                        {else}
                        <input type="text" class="form-control" placeholder="Enter the withdrawal account" value="" name="take_account_value"/>
                        {/if}
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary buyTrafficPackage" type="button" onclick="setting.take_account_setting();">confirm</button>
                <button type="button" class="btn {$style[$theme_style]['modal']['btn_close']} font-weight-bold" data-dismiss="modal">cancel</button>
            </div>
        </div>
    </div>
</div>
{/if}

        {include file='include/global/scripts.tpl'}
    </body>
</html>
