{include file='admin/main.tpl'}

<main class="content">
    <div class="content-header ui-content-header">
        <div class="container">
            <h1 class="content-heading">Promo code</h1>
        </div>
    </div>
    <div class="container">
        <section class="content-inner margin-top-no">


            <div class="card">
                <div class="card-main">
                    <div class="card-inner">
                        <div class="form-group form-group-label">
                            <label class="floating-label" for="prefix">Promo code</label>
                            <input class="form-control maxwidth-edit" id="prefix" type="text">
                            <p class="form-control-guide"><i class="material-icons">info</i>Generate random coupon codes don't fill in</p>
                        </div>

                        <div class="form-group form-group-label">
                            <label class="floating-label" for="credit">Promo code lines</label>
                            <input class="form-control maxwidth-edit" id="credit" type="text">
                            <p class="form-control-guide"><i class="material-icons">info</i>Percentage, ninety percent completed 10</p>
                        </div>

                        <div class="form-group form-group-label">
                            <label class="floating-label" for="expire">Coupon code is valid(h)</label>
                            <input class="form-control maxwidth-edit" id="expire" type="number" value="1">
                        </div>

                        <div class="form-group form-group-label">
                            <label class="floating-label" for="shop">Coupon code available goodsID</label>
                            <input class="form-control maxwidth-edit" id="shop" type="text">
                            <p class="form-control-guide"><i class="material-icons">info</i>Don't fill in for all the goods are available, namely multiple words in English half Angle comma split</p>
                        </div>

                        <div class="form-group form-group-label">
                            <label class="floating-label" for="shop">Each user can use promo code number,-1For unlimited time</label>
                            <input class="form-control maxwidth-edit" id="count" type="number" value="1">
                        </div>

                        <div class="form-group form-group-label">
                            <label for="generate-type">
                                <label class="floating-label" for="sort">Choose the way to generate</label>
                                <select id="generate-type" class="form-control maxwidth-edit">
                                    <option value="1">The specified character</option>
                                    <option value="2">Random characters</option>
                                    <option value="3">The specified character+Random characters</option>
                                </select>
                            </label>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-10 col-md-push-1">
                                    <button id="coupon" type="submit"
                                            class="btn btn-block btn-brand waves-attach waves-light">Generate promo code
                                    </button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="card margin-bottom-no">
                <div class="card-main">
                    <div class="card-inner">
                        <p class="card-heading">Promo code</p>
                        <p>Display list item:
                            {include file='table/checkbox.tpl'}
                        </p>
                        <div class="card-table">
                            <div class="table-responsive">
                                {include file='table/table.tpl'}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {include file='dialog.tpl'}


    </div>


</main>


{include file='admin/footer.tpl'}


<script>

    {include file='table/js_1.tpl'}


    window.addEventListener('load', () => {
        {include file='table/js_2.tpl'}

        $$.getElementById('coupon').addEventListener('click', () => {
            let couponCode = $$getValue('prefix');

            $.ajax({
                type: "POST",
                url: "/admin/coupon",
                dataType: "json",
                data: {
                    prefix: $$getValue('prefix'),
                    credit: $$getValue('credit'),
                    shop: $$getValue('shop'),
                    onetime: $$getValue('count'),
                    expire: $$getValue('expire'),
                    generate_type: $$getValue('generate-type'),
                },
                success: data => {
                    $("#result").modal();
                    $$.getElementById('msg').innerHTML = data.msg;
                    if (data.ret) {
                        window.setTimeout("location.href='/admin/coupon'", {$config['jump_delay']});
                    }
                },
                error: jqXHR => {
                    alert(`An error occurred：${
                            jqXHR.status
                            }`);
                }
            })
        })
    })
</script>
