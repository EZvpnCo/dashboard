{include file='admin/main.tpl'}


<main class="content">
    <div class="content-header ui-content-header">
        <div class="container">
            <h1 class="content-heading">Set up the pay treasure/WeChatCOOKIE</h1>
        </div>
    </div>
    <div class="container">
        <div class="col-lg-12 col-md-12">
            <section class="content-inner margin-top-no">


                <div class="card">
                    <div class="card-main">
                        <div class="card-inner">
                            <div class="form-group form-group-label">
                                <div class="checkbox switch">
                                    <label for="AliPay_Status">
                                        <input {if $payConfig['AliPay_Status']==1}checked{/if} class="access-hide"
                                               id="AliPay_Status" type="checkbox">
                                        <span class="switch-toggle"></span>Pay treasure to pay
                                    </label>
                                </div>
                            </div>

                            <div class="form-group form-group-label">
                                <div class="checkbox switch">
                                    <label for="WxPay_Status">
                                        <input {if $payConfig['WxPay_Status']==1}checked{/if} class="access-hide"
                                               id="WxPay_Status" type="checkbox">
                                        <span class="switch-toggle"></span>Open WeChat pay
                                    </label>
                                </div>
                            </div>

                            <div class="form-group form-group-label">
                                <label class="floating-label" for="number">Failure notification email</label>
                                <input class="form-control maxwidth-edit" id="Notice_EMail" type="text"
                                       value="{$payConfig['Notice_EMail']}">
                            </div>

                            <div class="form-group form-group-label">
                                <label class="floating-label" for="number">The amount set</label>
                                <input class="form-control maxwidth-edit" id="Pay_Price" type="text"
                                       value="{$payConfig['Pay_Price']}">
                                <p class="form-control-guide"><i class="material-icons">info</i>Don't set, you do not need to input in English"|"Break up, must be greater than2
                                </p>
                            </div>

                            <div class="form-group form-group-label">
                                <label class="floating-label" for="amount">Pay treasure to qr code</label>
                                <input class="form-control maxwidth-edit" id="AliPay_QRcode" type="text"
                                       value="{$payConfig['AliPay_QRcode']}">
                                <p class="form-control-guide"><i class="material-icons">info</i>Set the amount need English after"|"Segmentation</p>
                            </div>


                            <div class="form-group form-group-label">
                                <label class="floating-label" for="number">AlipayCOOKIE</label>
                                <input class="form-control maxwidth-edit" id="AliPay_Cookie" type="text"
                                       value='{$payConfig['AliPay_Cookie']}'>
                            </div>

                            <div class="form-group form-group-label">
                                <label class="floating-label" for="number">WeChat login address</label>
                                <input class="form-control maxwidth-edit" id="WxPay_Url" type="text"
                                       value="{$payConfig['WxPay_Url']}">
                            </div>
                            <div class="form-group form-group-label">
                                <label class="floating-label" for="number">WeChat qr code</label>
                                <input class="form-control maxwidth-edit" id="WxPay_QRcode" type="text"
                                       value="{$payConfig['WxPay_QRcode']}">
                                <p class="form-control-guide"><i class="material-icons">info</i>Set the amount need English after"|"Segmentation</p>
                            </div>

                            <div class="form-group form-group-label">
                                <label class="floating-label" for="number">WeChatCOOKIE</label>
                                <input class="form-control maxwidth-edit" id="WxPay_Cookie" type="text"
                                       value="{$payConfig['WxPay_Cookie']}">
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
                                                class="btn btn-block btn-brand waves-attach waves-light">determine
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {include file='dialog.tpl'}

        </div>


    </div>
</main>


{include file='admin/footer.tpl'}


<script>

    window.addEventListener('load', () => {
        function submit() {
            if ($$.getElementById('AliPay_Status').checked) {
                var AliPay_Status = 1;
            } else {
                var AliPay_Status = 0;
            }
            if ($$.getElementById('WxPay_Status').checked) {
                var WxPay_Status = 1
            } else {
                var WxPay_Status = 0
            }
            ;
            $.ajax({
                type: "POST",
                url: "/admin/saveConfig",
                dataType: "json",
                data: {
                    AliPay_Status,
                    WxPay_Status,
                    Notice_EMail: $$getValue('Notice_EMail'),
                    AliPay_QRcode: $$getValue('AliPay_QRcode'),
                    AliPay_Cookie: $$getValue('AliPay_Cookie'),
                    WxPay_Url: $$getValue('WxPay_Url'),
                    WxPay_QRcode: $$getValue('WxPay_QRcode'),
                    WxPay_Cookie: $$getValue('WxPay_Cookie'),
                    Pay_Price: $$getValue('Pay_Price'),
                },
                success: data => {
                    if (data.ret) {
                        $("#result").modal();
                        $$.getElementById('msg').innerHTML = data.msg;
                        window.setTimeout("location.reload()", {$config['jump_delay']});
                    } else {
                        $("#msg-error").hide(10);
                        $("#msg-error").show(100);
                        $$.getElementById('msg-error-p').innerHTML = data.msg;
                    }
                },
                error: jqXHR => {
                    $("#result").modal();
                    $$.getElementById('msg').innerHTML = `${ldelim}data.msg{rdelim} An error occurred. `;
                }
            });
        }

        $("html").keydown(event => {
            if (event.keyCode == 13) {
                submit();
            }
        });

        $$.getElementById('submit').addEventListener('click', submit);

    })
</script>
