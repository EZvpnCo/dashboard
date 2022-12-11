<!DOCTYPE html>
<html lang="en">
     <head>
         <title>Telegram settings &mdash; {$config["appName"]}</title>
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
                                         <h2 class="text-white font-weight-bold my-2 mr-5">Telegram settings</h2>
                                     </div>
                                 </div>
                                {include file='include/settings/menu.tpl'}
                                    
                                    <div class="flex-row-fluid ml-lg-8">
                                        <div class="card card-custom {$metron['style_shadow']}">
                                            <div class="card-header py-3">
                                                <div class="card-title align-items-start flex-column">
                                                     <h3 class="card-label font-weight-bolder text-primary">Telgegram settings</h3>
                                                     <span class="text-muted font-weight-bold font-size-sm mt-1">Update your Telegram information</span>
                                                 </div>
                                                <div class="card-toolbar">
                                                    
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <label class="col-3 col-xl-3"></label>
                                                    <div class="col-9 col-lg-9 col-xl-6">
                                                         <h5 class="font-weight-bold mb-6">Telegram information</h5>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-3 col-xl-3 col-lg-3 col-form-label text-right">Current binding</label>
                                                     <div class="col-9 col-md-6 col-lg-9 col-xl-6">
                                                         <p class="pt-3">{if $user->telegram_id == 0}unbound account{else}<a href="https://t.me/{$user->im_value}" target ="blank"> @{$user->im_value}</a>{/if}</p>
                                                     </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-3 col-xl-3 col-lg-3 col-form-label text-right"> </label>
                                                    <div class="col-9 col-md-6 col-lg-9 col-xl-6">
                                                        {if $user->telegram_id == 0}
                                                         <button type="button" class="btn btn-primary font-weight-bold btn-sm" data-toggle="modal" data-target="#bind-telegram-modal">Start binding</button>
                                                         <p class="form-text text-muted pt-2">Telegram needs to be accessed through a proxy</p>
                                                         {else}
                                                         <button type="button" class="btn btn-danger font-weight-bold btn-sm" onclick="setting.telegram('unbind');">Unbind</button>
                                                         <p class="form-text text-muted pt-2">After unbinding, the Telegram account will be removed from the corresponding group and banned</p>
                                                         {/if}
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-3 col-xl-3 col-lg-3 col-form-label text-right">Group link</label>
                                                    <div class="col-9 col-md-6 col-lg-9 col-xl-6">
                                                        {if $user->telegram_id == 0}
                                                        <button type="button" class="btn btn-primary font-weight-bold btn-sm disabled" disabled="disabled">Please bind account first</button>
                                                        {else}
                                                        <a href="{$config['telegram_group_link']}" target="_blank" class="btn btn-primary font-weight-bold btn-sm">Join the group</a>
                                                        <p class="form-text text-muted pt-2">If you are unable to join the group please contact <a href="https://t.me/{$telegram_bot}" target="_blank">@{$telegram_bot}</a> Apply for group unblocking</p>
                                                        {/if}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                    {include file='include/global/footer.tpl'}
                </div>
            </div>
        </div>
        {include file='include/global/scripts.tpl'}

<div class="modal fade" id="bind-telegram-modal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title {$style[$theme_style]['modal']['text_title']}"><strong>Bind Telegram account</strong></h5>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <a href="https://t.me/{$telegram_bot}?start={$bind_token}" target="_blank" class="btn btn-primary font-weight-bold btn-sm"><i class ="fab fa-telegram-plane"></i>One-click binding to Telegram</a>
                </div>
                <p class="font-size-h5 pt-5">If you encounter problems during the one-key binding process, you can try to manually bind:</p>
                <span class="kt-font-bolder">1. Add a robot account in Telegram<a href="https://t.me/{$telegram_bot}" target="_blank">@{$telegram_bot}</a></span><br>
                <span class="kt-font-bolder pt-2">2. Send command<code class="cursor_onclick copy-modal" data-clipboard-text="/start {$bind_token}">/start {$bind_token}</code>(click to copy) to the robot</span>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="window.location.reload();">Done</button>
                <button type="button" class="btn {$style[$theme_style]['modal']['btn_close']} font-weight-bold" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

    </body>
</html>