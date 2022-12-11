<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Profile &mdash; {$config["appName"]}</title>
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
                                        <h2 class="text-white font-weight-bold my-2 mr-5">Profile</h2>
                                    </div>
                                </div>
                                {include file='include/settings/menu.tpl'}
                                    
                                    <div class="flex-row-fluid ml-lg-8">
                                        <div class="card card-custom {$metron['style_shadow']}">
                                            <div class="card-header py-3">
                                                <div class="card-title align-items-start flex-column">
                                                    <h3 class="card-label font-weight-bolder text-primary">Profile</h3>
                                                    <span class="text-muted font-weight-bold font-size-sm mt-1">Edit your personal information</span>
                                                </div>
                                                <div class="card-toolbar">
                                                    <button type="reset" class="btn btn-success mr-2" id="profile_save_submit">Save changes</button>
                                                </div>
                                            </div>
                                            <form class="form" id="profile_form">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <label class="col-3 col-xl-3"></label>
                                                        <div class="col-9 col-lg-9 col-xl-6">
                                                            <h5 class="font-weight-bold mb-6">Personal information</h5>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-3 ol-xl-3 col-lg-3 col-form-label text-right">Avatar</label>
                                                        <div class="col-9 col-lg-9 col-xl-6">
                                                            <div class="image-input image-input-outline" id="kt_profile_avatar" style="background-image: url({$metron['assets_url']}/media/users/blank.png)">
                                                                <div class="image-input-wrapper" style="background-image: url({$user->gravatar})"></div>
                                                                <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                                                                    <i class="fa fa-pen icon-sm text-muted"></i>
                                                                    <input type="file" name="profile_avatar" accept=".png, .jpg, .jpeg" />
                                                                    <input type="hidden" name="profile_avatar_remove" />
                                                                </label>
                                                                <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                                                                    <i class="ki ki-bold-close icon-xs text-muted"></i>
                                                                </span>
                                                                <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove" data-toggle="tooltip" title="Remove avatar">
                                                                    <i class="ki ki-bold-close icon-xs text-muted"></i>
                                                                </span>
                                                            </div>
                                                            <span class="form-text text-muted">Temporarily does not support the change <!-- Allows the types of files:png, jpg, jpeg --></span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-3 col-xl-3 col-lg-3 col-form-label text-right">Username</label>
                                                        <div class="col-9 col-md-6 col-lg-9 col-xl-6">
                                                            <div class="input-group input-group-lg input-group-solid">
                                                                <input type="text" class="form-control" {if $metron['change_username'] !== true}disabled="disabled" {/if} value="{$user->user_name}" name="user_name" oldvalue="{$user->user_name}"/>
                                                            </div>
                                                            {if $metron['change_username'] !== true}
                                                            <span class="form-text text-muted">Can't modify username</span>
                                                            {/if}
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <label class="col-3 col-xl-3"></label>
                                                        <div class="col-9 col-md-6 col-lg-9 col-xl-6">
                                                            <h5 class="font-weight-bold mt-10 mb-6">Contact information</h5>
                                                        </div>
                                                    </div>
                                                    <!--
                                                    <div class="form-group row">
                                                        <label class="col-3 col-xl-3 col-lg-3 col-form-label text-right">Mobile phone number</label>
                                                        <div class="col-9 col-md-6 col-lg-9 col-xl-6">
                                                            <div class="input-group input-group-lg input-group-solid">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">
                                                                        <i class="la la-phone"></i>
                                                                    </span>
                                                                </div>
                                                                <input type="text" class="form-control form-control-lg form-control-solid" value="+35278953712" placeholder="Phone" />
                                                            </div>
                                                            <span class="form-text text-muted">We will never share your number with anyone else</span>
                                                        </div>
                                                    </div>-->
                                                    {if $metron['register_restricted_email'] === true}
                                                    <div class="form-group row">
                                                        <label class="col-3 col-xl-3 col-lg-3 col-form-label text-right">Email</label>
                                                        <div class="col-9 col-md-6 col-lg-9 col-xl-6">
                                                            <div class="input-group input-group-lg input-group-solid">
                                                                <input type="text" class="form-control" {if $metron['change_usermail'] !== true}disabled="disabled"{/if}value="{$email_name}" name="email_name" oldvalue="{$email_name}"/>
                                                                <div class="input-group-append">
                                                                    <select class="form-control selectpicker" {if $metron['change_usermail'] !== true}disabled="disabled"{/if} id="email_suffix" oldvalue="{$email_suffix}">
                                                                        {foreach $email_whitelist as $emailsuffix}
                                                                            <option value='{$emailsuffix}' {if $emailsuffix == $email_suffix} selected="selected"{/if}>{$emailsuffix}</option>
                                                                        {/foreach}
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            {if $metron['change_usermail'] !== true}
                                                            <span class="form-text text-muted">Forbidden to modify email</span>
                                                            {/if}
                                                        </div>
                                                    </div>
                                                    {else}
                                                    <div class="form-group row">
                                                        <label class="col-3 col-xl-3 col-lg-3 col-form-label text-right">Email address</label>
                                                        <div class="col-9 col-md-6 col-lg-9 col-xl-6">
                                                            <div class="input-group input-group-lg input-group-solid">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">
                                                                        <i class="la la-envelope-o"></i>
                                                                    </span>
                                                                </div>
                                                                <input type="text" class="form-control form-control-lg form-control-solid" value="{$user->email}" name="email" oldvalue="{$user->email}" placeholder="email" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {/if}
                                                    {if $config['enable_email_verify'] === true && $metron['change_usermail'] === true}
                                                    <div class="form-group row">
                                                        <label class="col-3 col-xl-3 col-lg-3 col-form-label text-right">Verification code</label>
                                                        <div class="col-9 col-md-6 col-lg-9 col-xl-6">
                                                        <div class="input-group input-group-lg input-group-solid">
                                                            <input type="text" class="form-control" value="" name="email_code" />
                                                            <div class="input-group-append">
                                                                <button class="btn btn-primary" type="button" onclick="setting.profile('send_email_code');" id="send_email_code">Get verification code</button>
                                                            </div>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    {/if}
                                                    <div class="form-group row">
                                                        <label class="col-3 col-xl-3 col-lg-3 col-form-label text-right">Receive notifications</label>
                                                        <div class="col-9 col-md-6 col-lg-9 col-xl-6">
                                                            <div class="checkbox-inline">
                                                                <label class="checkbox">
                                                                <input type="checkbox" id="sendDailyMail" {if $user->sendDailyMail==1}checked="checked"{/if} />Use of information and announcement mail daily receiving flow
                                                                <span></span></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
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
    </body>
</html>