<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Wallet &mdash; {$config["appName"]}</title>
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
                                        <h2 class="text-white font-weight-bold my-2 mr-5">Wallet</h2>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">

                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-column-fluid">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-5">
                                        <div id="code-getmoney" class="card card-custom bgi-no-repeat gutter-b card-stretch {$metron['style_shadow']}" style="min-height: 400px; background-position: calc(100% + 0.5rem) calc(100% + 0.5rem); background-size: 150% auto; background-image: url({$metron['assets_url']}/media/svg/patterns/taieri.svg)">
                                            <div class="card-body">
                                                <div class="p-4">
                                                    <h3 class="{$style[$theme_style]['global']['title']} font-weight-bolder my-7">Balance</h3>
                                                    <p class="{$style[$theme_style]['global']['title']} display-2 display1-lg pb-10" style="padding-top: 10px; padding-bottom: 10px"><span class="display-4"><strong>$</strong> </span><strong>{$user->money}</strong></p>
                                                    <a href="Javascript:;" class="btn btn-danger font-weight-bold px-6 py-3" onclick="code.payTab();">
                                                    <i class="fa fa-plus"></i>Increase wallet balance</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="code-setmoney" class="card card-custom bgi-no-repeat gutter-b card-stretch {$metron['style_shadow']}" style="display: none; min-height: 400px; background-position: right top; background-size: 30% auto; background-image: url({$metron['assets_url']}/media/svg/shapes/abstract-3.svg)">
                                            <div class="card-header border-0 pt-5">
                                                <div class="card-title font-weight-bolder">
                                                    <div class="card-label {$style[$theme_style]['global']['title']} font-weight-bold font-size-h3">
                                                        <i class="fab fa-cc-amazon-pay icon-lg {$style[$theme_style]['global']['title']}"></i><strong>&nbsp;&nbsp;Increase wallet balance</strong>
                                                        &nbsp;&nbsp;<button type="button" class="btn btn-primary btn-sm" onclick="code.payTab();">Back</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <ul class="dashboard-tabs nav nav-pills row nav-primary row-paddingless m-0 p-0" role="tablist">
                                                    <li class="nav-item d-flex col flex-grow-1 flex-shrink-0 mr-3 mb-3 mb-lg-0 cursor_onclick">
                                                        <a class="nav-link border d-flex flex-grow-1 rounded flex-column align-items-center active" data-toggle="pill" href="#tab_Recharge_online">
                                                            <span class="nav-icon py-2 w-auto">
                                                                <span class="svg-icon svg-icon-3x">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                            <rect x="0" y="0" width="24" height="24"/>
                                                                            <path d="M8,2.5 C7.30964406,2.5 6.75,3.05964406 6.75,3.75 L6.75,20.25 C6.75,20.9403559 7.30964406,21.5 8,21.5 L16,21.5 C16.6903559,21.5 17.25,20.9403559 17.25,20.25 L17.25,3.75 C17.25,3.05964406 16.6903559,2.5 16,2.5 L8,2.5 Z" fill="#000000" opacity="0.3"/>
                                                                            <path d="M8,2.5 C7.30964406,2.5 6.75,3.05964406 6.75,3.75 L6.75,20.25 C6.75,20.9403559 7.30964406,21.5 8,21.5 L16,21.5 C16.6903559,21.5 17.25,20.9403559 17.25,20.25 L17.25,3.75 C17.25,3.05964406 16.6903559,2.5 16,2.5 L8,2.5 Z M8,1 L16,1 C17.5187831,1 18.75,2.23121694 18.75,3.75 L18.75,20.25 C18.75,21.7687831 17.5187831,23 16,23 L8,23 C6.48121694,23 5.25,21.7687831 5.25,20.25 L5.25,3.75 C5.25,2.23121694 6.48121694,1 8,1 Z M9.5,1.75 L14.5,1.75 C14.7761424,1.75 15,1.97385763 15,2.25 L15,3.25 C15,3.52614237 14.7761424,3.75 14.5,3.75 L9.5,3.75 C9.22385763,3.75 9,3.52614237 9,3.25 L9,2.25 C9,1.97385763 9.22385763,1.75 9.5,1.75 Z" fill="#000000" fill-rule="nonzero"/>
                                                                        </g>
                                                                    </svg>
                                                                </span>
                                                            </span>
                                                            <span class="nav-text font-size-lg py-2 font-weight-bold text-center">Online pay</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item d-flex col flex-grow-1 flex-shrink-0 mr-3 mb-3 mb-lg-0 cursor_onclick">
                                                        <a class="nav-link border d-flex flex-grow-1 rounded flex-column align-items-center" data-toggle="pill" href="#tab_Redeem_code">
                                                            <span class="nav-icon py-2 w-auto">
                                                                <span class="svg-icon svg-icon-3x">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                            <rect x="0" y="0" width="24" height="24"/>
                                                                            <path d="M2,6 L21,6 C21.5522847,6 22,6.44771525 22,7 L22,17 C22,17.5522847 21.5522847,18 21,18 L2,18 C1.44771525,18 1,17.5522847 1,17 L1,7 C1,6.44771525 1.44771525,6 2,6 Z M11.5,16 C13.709139,16 15.5,14.209139 15.5,12 C15.5,9.790861 13.709139,8 11.5,8 C9.290861,8 7.5,9.790861 7.5,12 C7.5,14.209139 9.290861,16 11.5,16 Z" fill="#000000" opacity="0.3" transform="translate(11.500000, 12.000000) rotate(-345.000000) translate(-11.500000, -12.000000) "/>
                                                                            <path d="M2,6 L21,6 C21.5522847,6 22,6.44771525 22,7 L22,17 C22,17.5522847 21.5522847,18 21,18 L2,18 C1.44771525,18 1,17.5522847 1,17 L1,7 C1,6.44771525 1.44771525,6 2,6 Z M11.5,16 C13.709139,16 15.5,14.209139 15.5,12 C15.5,9.790861 13.709139,8 11.5,8 C9.290861,8 7.5,9.790861 7.5,12 C7.5,14.209139 9.290861,16 11.5,16 Z M11.5,14 C12.6045695,14 13.5,13.1045695 13.5,12 C13.5,10.8954305 12.6045695,10 11.5,10 C10.3954305,10 9.5,10.8954305 9.5,12 C9.5,13.1045695 10.3954305,14 11.5,14 Z" fill="#000000"/>
                                                                        </g>
                                                                    </svg>
                                                                </span>
                                                            </span>
                                                            <span class="nav-text font-size-lg py-2 font-weight-bold text-center">Conversion code</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                                <div class="separator separator-dashed separator-border-4 p-5"></div>
                                                <div class="tab-content m-0 p-0">
                                                    <div class="tab-pane active" id="tab_Recharge_online" role="tabpanel">
                                                        <div class="card-body pb-0">
                                                            <div class="form-group" id="pay_amount_form">
                                                                <div class="input-group input-group-solid">
                                                                    <input type="number" class="form-control" placeholder="Amount" id="amount" name="amount"/>
                                                                </div>
                                                            </div>
                                                            <div class="text-right">
                                                                {if $config['payment_system'] == 'metronpay'}
                                                                <button type="button" class="btn btn-primary btn-shadow btn-lg" onclick="code.metronPay('modal');">Confirm</button>
                                                                {/if}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane" id="tab_Redeem_code" role="tabpanel">
                                                        <div class="card-body pb-0">
                                                            <div class="form-group" id="pay_code_form">
                                                                <div class="input-group input-group-solid">
                                                                    <input type="text" class="form-control" placeholder="Code" id="pay_code" name="pay_code"/>
                                                                </div>
                                                            </div>
                                                            <div class="text-right">
                                                                <button type="button" class="btn btn-primary btn-shadow btn-lg" id="code-update" onclick="code.update();">Confirm</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-7">
                                        <div class="card card-custom gutter-b card-stretch {$metron['style_shadow']}">
                                            <div class="card-header flex-wrap border-0 pt-6">
                                                <div class="card-title">
                                                    <h3 class="card-label {$style[$theme_style]['global']['title']}"><strong>Payment list</strong>
                                                    <span class="d-block text-muted pt-2 font-size-sm">List of pay</span></h3>
                                                </div>
                                            </div>
                                            <div class="card-body pt-0">
                                                <div class="datatable datatable-bordered datatable-head-custom" id="ajax_code_data"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <div class="card card-custom gutter-b {$metron['style_shadow']}">
                                            <div class="card-header flex-wrap border-0 pt-6">
                                                <div class="card-title">
                                                    <h3 class="card-label {$style[$theme_style]['global']['title']}"><strong>Pay orders</strong>
                                                    <span class="d-block text-muted pt-2 font-size-sm">All pay orders list</span></h3>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="mb-7">
                                                    <div class="row align-items-center">
                                                        <div class="col-lg-9 col-xl-8">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-4 my-2 my-md-0">
                                                                    <div class="d-flex align-items-center">
                                                                        <label class="mr-3 mb-0 d-none d-md-block">Status:</label>
                                                                        <select class="form-control" id="kt_form_status">
                                                                            <option value="">All</option>
                                                                            <option value="0">Unpaid</option>
                                                                            <option value="1">Paid</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="datatable datatable-bordered datatable-head-custom" id="ajax_paylist_data"></div>
                                            </div>
                                        </div>

                                        <div class="card card-custom gutter-b {$metron['style_shadow']}">
                                            <div class="card-header flex-wrap border-0 pt-6">
                                                <div class="card-title">
                                                    <h3 class="card-label {$style[$theme_style]['global']['title']}"><strong>Packages orders</strong>
                                                    <span class="d-block text-muted pt-2 font-size-sm">All buy package orders</span></h3>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="mb-7">
                                                    <div class="row align-items-center">
                                                        <div class="col-lg-9 col-xl-8">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-4 my-2 my-md-0">
                                                                    <div class="d-flex align-items-center">
                                                                        <label class="mr-3 mb-0 d-none d-md-block">Status:</label>
                                                                        <select class="form-control" id="kt_form_usedd">
                                                                            <option value="">All</option>
                                                                            <option value="0">Failure</option>
                                                                            <option value="1">Using</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="datatable datatable-bordered datatable-head-custom" id="ajax_shop_data"></div>
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

<!-- Online top-up payment -->
<div class="modal fade" id="metronpay-modal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title {$style[$theme_style]['modal']['text_title']}" id="metronpay-title"><strong>Payment confirmation</strong></h5>
            </div>
            <div class="modal-body kt-padding-t-30">
                <p class="text-center pt-3" id="metronpay-modal-body-url" style="display: none;">Click to open the new page for payment, If long time not to account, please contact customer service</p>
                <p id="metronpay-modal-body-qrcode" style="display: none;"></p>
            </div>
            <div class="modal-footer">
                <a id="to-pay" href="##" class="btn btn-primary">To pay</a>
                <button type="button" class="btn {$style[$theme_style]['modal']['btn_close']} font-weight-bold" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Online top-up payment -->
<div class="modal fade" id="metronPay_modal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content shadow-lg">
            <div class="modal-header">
                <h4 class="modal-title {$style[$theme_style]['modal']['text_title']}"><strong>Choose payment way</strong></h4>
            </div>
            <div class="modal-body pb-0">
                <div class="form-group row form-group-marginless">
                    <div class="col-lg-12">
                        <div class="card card-custom card-shadowless card-stretch gutter-b pb-0 pt-6">
                            <ul class="dashboard-tabs nav nav-pills row row-paddingless m-0 p-0" role="tablist" id="pay_the">
                            {if $config['payment_system'] == 'metronpay'}
                                {if $metron['pay_alipay'] != 'none' && $metron['pay_alipay'] != ''}
                                    <li class="nav-alipay nav-item d-flex col flex-grow-1 flex-shrink-0 mr-3 mb-3 mb-lg-0 cursor_onclick">
                                        <a class="nav-link border py-10 d-flex flex-grow-1 rounded flex-column align-items-center active" data-toggle="pill" data-name="pay_alipay">
                                        <span class="nav-icon py-2 w-auto">
                                            <i class="fab fa-alipay icon-2x"></i>
                                        </span>
                                            <span class="nav-text font-size-lg py-2 font-weight-bold text-center">Alipay</span>
                                        </a>
                                    </li>
                                {/if}
                                {if $metron['pay_alipay_2'] != 'none' && $metron['pay_alipay_2'] != ''}
                                    <li class="nav-alipay nav-item d-flex col flex-grow-1 flex-shrink-0 mr-3 mb-3 mb-lg-0 cursor_onclick">
                                        <a class="nav-link border py-10 d-flex flex-grow-1 rounded flex-column align-items-center" data-toggle="pill" data-name="pay_alipay_2">
                                        <span class="nav-icon py-2 w-auto">
                                            <i class="fab fa-alipay icon-2x"></i>
                                        </span>
                                            <span class="nav-text font-size-lg py-2 font-weight-bold text-center">Alipay</span>
                                        </a>
                                    </li>
                                {/if}
                                {if $metron['pay_alipay_3'] != 'none' && $metron['pay_alipay_3'] != ''}
                                    <li class="nav-alipay nav-item d-flex col flex-grow-1 flex-shrink-0 mr-3 mb-3 mb-lg-0 cursor_onclick">
                                        <a class="nav-link border py-10 d-flex flex-grow-1 rounded flex-column align-items-center" data-toggle="pill" data-name="pay_alipay_3">
                                        <span class="nav-icon py-2 w-auto">
                                            <i class="fab fa-alipay icon-2x"></i>
                                        </span>
                                            <span class="nav-text font-size-lg py-2 font-weight-bold text-center">Alipay</span>
                                        </a>
                                    </li>
                                {/if}
                                {if $metron['pay_wxpay'] != 'none' && $metron['pay_wxpay'] != ''}
                                    <li class="nav-wxpay nav-item d-flex col flex-grow-1 flex-shrink-0 mr-3 mb-3 mb-lg-0 cursor_onclick">
                                        <a class="nav-link border py-10 d-flex flex-grow-1 rounded flex-column align-items-center" data-toggle="pill" data-name="pay_wxpay">
                                        <span class="nav-icon py-2 w-auto">
                                            <i class="fab fa-weixin icon-2x"></i>
                                        </span>
                                            <span class="nav-text font-size-lg py-2 font-weight-bold text-center">WeChat pay</span>
                                        </a>
                                    </li>
                                {/if}
                                {if $metron['pay_wxpay_2'] != 'none' && $metron['pay_wxpay_2'] != ''}
                                    <li class="nav-wxpay nav-item d-flex col flex-grow-1 flex-shrink-0 mr-3 mb-3 mb-lg-0 cursor_onclick">
                                        <a class="nav-link border py-10 d-flex flex-grow-1 rounded flex-column align-items-center" data-toggle="pill" data-name="pay_wxpay_2">
                                        <span class="nav-icon py-2 w-auto">
                                            <i class="fab fa-weixin icon-2x"></i>
                                        </span>
                                            <span class="nav-text font-size-lg py-2 font-weight-bold text-center">WeChat pay</span>
                                        </a>
                                    </li>
                                {/if}
                                {if $metron['pay_wxpay_3'] != 'none' && $metron['pay_wxpay_3'] != ''}
                                    <li class="nav-wxpay nav-item d-flex col flex-grow-1 flex-shrink-0 mr-3 mb-3 mb-lg-0 cursor_onclick">
                                        <a class="nav-link border py-10 d-flex flex-grow-1 rounded flex-column align-items-center" data-toggle="pill" data-name="pay_wxpay_3">
                                        <span class="nav-icon py-2 w-auto">
                                            <i class="fab fa-weixin icon-2x"></i>
                                        </span>
                                            <span class="nav-text font-size-lg py-2 font-weight-bold text-center">WeChat pay</span>
                                        </a>
                                    </li>
                                {/if}
                                {if $metron['pay_qqpay'] != 'none' && $metron['pay_qqpay'] != ''}
                                <li class="nav-qqpay nav-item d-flex col flex-grow-1 flex-shrink-0 mr-3 mb-3 mb-lg-0 cursor_onclick">
                                    <a class="nav-link border py-10 d-flex flex-grow-1 rounded flex-column align-items-center" data-toggle="pill" data-name="pay_qqpay">
                                        <span class="nav-icon py-2 w-auto">
                                            <i class="fab fa-qq icon-2x"></i>
                                        </span>
                                        <span class="nav-text font-size-lg py-2 font-weight-bold text-center">QQThe wallet</span>
                                    </a>
                                </li>
                                {/if}
                                {if $metron['pay_crypto'] != 'none' && $metron['pay_crypto'] != ''}
                                <li class="nav-crypto nav-item d-flex col flex-grow-1 flex-shrink-0 mr-3 mb-3 mb-lg-0 cursor_onclick">
                                    <a class="nav-link border py-10 d-flex flex-grow-1 rounded flex-column align-items-center" data-toggle="pill" data-name="pay_crypto" style="background: rgb(83, 174, 148);">
                                        <span class="nav-icon py-2 w-auto">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 2000 2000" width="50" height="50"><path d="M1123.42 866.76V718h340.18V491.34H537.28V718H877.5v148.64C601 879.34 393.1 934.1 393.1 999.7s208 120.36 484.4 133.14v476.5h246V1132.8c276-12.74 483.48-67.46 483.48-133s-207.48-120.26-483.48-133m0 225.64v-.12c-6.94.44-42.6 2.58-122 2.58-63.48 0-108.14-1.8-123.88-2.62v.2C633.34 1081.66 451 1039.12 451 988.22S633.36 894.84 877.62 884v166.1c16 1.1 61.76 3.8 124.92 3.8 75.86 0 114-3.16 121-3.8V884c243.8 10.86 425.72 53.44 425.72 104.16s-182 93.32-425.72 104.18" fill="#fff"/></svg>
                                        </span>
                                        <span class="nav-text font-size-lg py-2 font-weight-bold text-center">Digital currencies</span>
                                    </a>
                                </li>
                                {/if}
                            {/if}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal" id="metronPay_input" onclick="code.metronPay('{$config['payment_system']}', '', '0', '');">Ok</button>
                <button type="button" class="btn {$style[$theme_style]['modal']['btn_close']} font-weight-bold" data-dismiss="modal">cancel</button>
            </div>
        </div>
    </div>
</div>




<!-- Pay order to pay -->
<div class="modal fade" id="metronPay_restart_modal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content shadow-lg">
            <div class="modal-header">
                <h4 class="modal-title {$style[$theme_style]['modal']['text_title']}"><strong>Choose payment way</strong></h4>
            </div>
            <div class="modal-body pb-0">
                <div class="form-group row form-group-marginless">
                    <div class="col-lg-12">
                        <div class="card card-custom card-shadowless card-stretch gutter-b pb-0 pt-6">
                            <ul class="dashboard-tabs nav nav-pills row row-paddingless m-0 p-0" role="tablist" id="reset_pay_the">
                            {if $config['payment_system'] == 'metronpay'}
                                {if $metron['pay_alipay'] != 'none' && $metron['pay_alipay'] != ''}
                                    <li class="nav-alipay nav-item d-flex col flex-grow-1 flex-shrink-0 mr-3 mb-3 mb-lg-0 cursor_onclick">
                                        <a class="nav-link border py-10 d-flex flex-grow-1 rounded flex-column align-items-center active" data-toggle="pill" data-name="pay_alipay">
                                        <span class="nav-icon py-2 w-auto">
                                            <i class="fab fa-alipay icon-2x"></i>
                                        </span>
                                            <span class="nav-text font-size-lg py-2 font-weight-bold text-center">Alipay</span>
                                        </a>
                                    </li>
                                {/if}
                                {if $metron['pay_alipay_2'] != 'none' && $metron['pay_alipay_2'] != ''}
                                    <li class="nav-alipay nav-item d-flex col flex-grow-1 flex-shrink-0 mr-3 mb-3 mb-lg-0 cursor_onclick">
                                        <a class="nav-link border py-10 d-flex flex-grow-1 rounded flex-column align-items-center" data-toggle="pill" data-name="pay_alipay_2">
                                        <span class="nav-icon py-2 w-auto">
                                            <i class="fab fa-alipay icon-2x"></i>
                                        </span>
                                            <span class="nav-text font-size-lg py-2 font-weight-bold text-center">Alipay</span>
                                        </a>
                                    </li>
                                {/if}
                                {if $metron['pay_alipay_3'] != 'none' && $metron['pay_alipay_3'] != ''}
                                    <li class="nav-alipay nav-item d-flex col flex-grow-1 flex-shrink-0 mr-3 mb-3 mb-lg-0 cursor_onclick">
                                        <a class="nav-link border py-10 d-flex flex-grow-1 rounded flex-column align-items-center" data-toggle="pill" data-name="pay_alipay_3">
                                        <span class="nav-icon py-2 w-auto">
                                            <i class="fab fa-alipay icon-2x"></i>
                                        </span>
                                            <span class="nav-text font-size-lg py-2 font-weight-bold text-center">Alipay</span>
                                        </a>
                                    </li>
                                {/if}
                                {if $metron['pay_wxpay'] != 'none' && $metron['pay_wxpay'] != ''}
                                    <li class="nav-wxpay nav-item d-flex col flex-grow-1 flex-shrink-0 mr-3 mb-3 mb-lg-0 cursor_onclick">
                                        <a class="nav-link border py-10 d-flex flex-grow-1 rounded flex-column align-items-center" data-toggle="pill" data-name="pay_wxpay">
                                        <span class="nav-icon py-2 w-auto">
                                            <i class="fab fa-weixin icon-2x"></i>
                                        </span>
                                            <span class="nav-text font-size-lg py-2 font-weight-bold text-center">WeChat pay</span>
                                        </a>
                                    </li>
                                {/if}
                                {if $metron['pay_wxpay_2'] != 'none' && $metron['pay_wxpay_2'] != ''}
                                    <li class="nav-wxpay nav-item d-flex col flex-grow-1 flex-shrink-0 mr-3 mb-3 mb-lg-0 cursor_onclick">
                                        <a class="nav-link border py-10 d-flex flex-grow-1 rounded flex-column align-items-center" data-toggle="pill" data-name="pay_wxpay_2">
                                        <span class="nav-icon py-2 w-auto">
                                            <i class="fab fa-weixin icon-2x"></i>
                                        </span>
                                            <span class="nav-text font-size-lg py-2 font-weight-bold text-center">WeChat pay</span>
                                        </a>
                                    </li>
                                {/if}
                                {if $metron['pay_wxpay_3'] != 'none' && $metron['pay_wxpay_3'] != ''}
                                    <li class="nav-wxpay nav-item d-flex col flex-grow-1 flex-shrink-0 mr-3 mb-3 mb-lg-0 cursor_onclick">
                                        <a class="nav-link border py-10 d-flex flex-grow-1 rounded flex-column align-items-center" data-toggle="pill" data-name="pay_wxpay_3">
                                        <span class="nav-icon py-2 w-auto">
                                            <i class="fab fa-weixin icon-2x"></i>
                                        </span>
                                            <span class="nav-text font-size-lg py-2 font-weight-bold text-center">WeChat pay</span>
                                        </a>
                                    </li>
                                {/if}
                                {if $metron['pay_qqpay'] != 'none' && $metron['pay_qqpay'] != ''}
                                <li class="nav-qqpay nav-item d-flex col flex-grow-1 flex-shrink-0 mr-3 mb-3 mb-lg-0 cursor_onclick">
                                    <a class="nav-link border py-10 d-flex flex-grow-1 rounded flex-column align-items-center" data-toggle="pill" data-name="pay_qqpay">
                                        <span class="nav-icon py-2 w-auto">
                                            <i class="fab fa-qq icon-2x"></i>
                                        </span>
                                        <span class="nav-text font-size-lg py-2 font-weight-bold text-center">QQThe wallet</span>
                                    </a>
                                </li>
                                {/if}
                                {if $metron['pay_crypto'] != 'none' && $metron['pay_crypto'] != ''}
                                <li class="nav-crypto nav-item d-flex col flex-grow-1 flex-shrink-0 mr-3 mb-3 mb-lg-0 cursor_onclick">
                                    <a class="nav-link border py-10 d-flex flex-grow-1 rounded flex-column align-items-center" data-toggle="pill" data-name="pay_crypto">
                                        <span class="nav-icon py-2 w-auto">
                                            <i class="fab fa-bitcoin icon-2x"></i>
                                        </span>
                                        <span class="nav-text font-size-lg py-2 font-weight-bold text-center">Digital currencies</span>
                                    </a>
                                </li>
                                {/if}
                            {/if}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal" id="metronPay_restart_input" onclick="code.metronPay_restart('{$config['payment_system']}', '', '0', '');">Ok</button>
                <button type="button" class="btn {$style[$theme_style]['modal']['btn_close']} font-weight-bold" data-dismiss="modal">cancel</button>
            </div>
        </div>
    </div>
</div>

<!-- Package conversion -->
<div class="modal fade" id="PackageConversion-modal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content shadow-lg">
            <div class="modal-header">
                <h4 class="modal-title {$style[$theme_style]['modal']['text_title']}" id="exampleModalLongTitle"><strong>Convert to confirm</strong></h4>
            </div>
            <div class="modal-body">
                <label class="row col-12 col-form-label kt-font-boldest" id="zs_name"></label>
                <label class="row col-12 col-form-label kt-font-boldest" id="zs_type"></label>
                <label class="row col-12 col-form-label kt-font-boldest" id="zs_the"></label>
                <label class="row col-12 col-form-label kt-font-boldest" id="zs_ppt"></label>
                <label class="row col-12 col-form-label kt-font-boldest" id="zs_used"></label>
                <label class="row col-12 col-form-label kt-font-boldest" id="zs_money"></label>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal" id="Conversion_ok" onclick="code.Conversion_ok();">Ok</button>
                <button type="button" class="btn {$style[$theme_style]['modal']['btn_close']} font-weight-bold" data-dismiss="modal" onclick="">cancel</button>
            </div>
        </div>
    </div>
</div>

        {include file='include/global/scripts.tpl'}
    </body>
</html>
