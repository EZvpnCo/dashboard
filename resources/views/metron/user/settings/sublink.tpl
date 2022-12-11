<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Subscription &mdash; {$config["appName"]}</title>
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
                                        <h2 class="text-white font-weight-bold my-2 mr-5">Subscription</h2>
                                    </div>
                                </div>
                                {include file='include/settings/menu.tpl'}
                                    
                                    <div class="flex-row-fluid ml-lg-8">
                                        <div class="card card-custom {$metron['style_shadow']}">
                                            <div class="card-header py-3">
                                                <div class="card-title align-items-start flex-column">
                                                    <h3 class="card-label font-weight-bolder text-primary">Subscription</h3>
                                                    <span class="text-muted font-weight-bold font-size-sm mt-1">Subscription link settings</span>
                                                </div>
                                                <div class="card-toolbar">
                                                    <button type="reset" class="btn btn-success mr-2" id="sublink_save_submit">Save changes</button>
                                                </div>
                                            </div>
                                            <form class="form" id="sublink_form">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <label class="col-3 col-xl-3"></label>
                                                        <div class="col-9 col-lg-9 col-xl-6">
                                                            <h5 class="font-weight-bold mb-6">Modify node connection password</h5>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-3 col-xl-3 col-lg-3 col-form-label text-right">New password</label>
                                                        <div class="col-9 col-md-6 col-lg-9 col-xl-6">
                                                            <div class="input-group input-group-lg input-group-solid">
                                                                <input class="form-control" type="text" value="" name="node_passwd" oldvalue="" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <label class="col-3 col-xl-3"></label>
                                                        <div class="col-9 col-md-6 col-lg-9 col-xl-6">
                                                            <h5 class="font-weight-bold mt-10 mb-6">Reset subscription link</h5>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-3 col-xl-3 col-lg-3 col-form-label text-right"> </label>
                                                        <div class="col-9 col-md-6 col-lg-9 col-xl-6">
                                                            <button type="button" class="btn btn-primary font-weight-bold btn-sm" onclick="setting.sublink();">Reset</button>
                                                            <p class="form-text text-muted pt-2">To generate a new subscription link, Make the original subscription cannot access nodes
                                                            <br />If want to subscribe to get old node cannot be used, At the same time, please modify the node connection password
                                                            <br />Subscribe to link theft, Please at the same time and modify the node connection password reset link</p>
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