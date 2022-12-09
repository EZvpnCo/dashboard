{include file='admin/main.tpl'}

<main class="content">
    <div class="content-header ui-content-header">
        <div class="container">
            <h1 class="content-heading">#{$user->id} [{$user->user_name}] Users to buy detail</h1>
        </div>
    </div>
    <div class="container">
        <div class="col-lg-12 col-sm-12">
            <section class="content-inner margin-top-no">

                <form id="main_form">
                    <div class="card">
                        <div class="card-main">
                            <div class="card-inner">

                                <div class="form-group form-group-label control-highlight-custom dropdown">
                                    <label class="floating-label" for="buy_shop">Choose package</label>
                                    <button id="buy_shop" class="form-control maxwidth-edit" name="buy_shop"
                                            data-toggle="dropdown">
                                        Please select a package
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="buy_shop">
                                        {foreach $shops as $shop}
                                            <li>
                                                <a href="#" class="dropdown-option" onclick="return false;"
                                                   val="{$shop->id}" data="buy_shop">{$shop->name}</a>
                                            </li>
                                        {/foreach}
                                    </ul>
                                </div>

                                <div class="form-group form-group-label control-highlight-custom dropdown">
                                    <label class="floating-label" for="buy_type">type</label>
                                    <button id="buy_type" class="form-control maxwidth-edit" name="buy_type"
                                            data-toggle="dropdown" value="0">
                                        add
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="buy_type">
                                        <li>
                                            <a href="#" class="dropdown-option" onclick="return false;" val="0"
                                               data="buy_type">add</a>
                                        </li>
                                        <li>
                                            <a href="#" class="dropdown-option" onclick="return false;" val="1"
                                               data="buy_type">buy</a>
                                        </li>
                                    </ul>
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
                                            <button id="submit" type="submit" class="btn btn-block btn-brand">add
                                            </button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </form>

                <div class="card">
                    <div class="card-main">
                        <div class="card-inner">
                            <p>Display list item: {include file='table/checkbox.tpl'}</p>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    {include file='table/table.tpl'}
                </div>

                <div aria-hidden="true" class="modal modal-va-middle fade" id="delete_modal" role="dialog"
                     tabindex="-1">
                    <div class="modal-dialog modal-xs">
                        <div class="modal-content">
                            <div class="modal-heading">
                                <a class="modal-close" data-dismiss="modal">×</a>
                                <h2 class="modal-title">Confirm buy want to delete this record?</h2>
                            </div>
                            <div class="modal-inner">
                                <p>Operation is not reversible. Please confirm.</p>
                            </div>
                            <div class="modal-footer">
                                <p class="text-right">
                                    <button class="btn btn-flat btn-brand-accent waves-attach waves-effect"
                                            data-dismiss="modal" type="button">cancel
                                    </button>
                                    <button class="btn btn-flat btn-brand-accent waves-attach" data-dismiss="modal"
                                            id="delete_input" type="button">determine
                                    </button>
                                </p>
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
    {include file='table/js_1.tpl'}

    window.addEventListener('load', () => {
        {include file='table/js_2.tpl'}
    });

    function delete_modal_show(id) {
        deleteid = id;
        $("#delete_modal").modal();
    }

    $$.getElementById('delete_input').addEventListener('click', delete_id);

    function delete_id() {
        $.ajax({
            type: "DELETE",
            url: "/admin/user/bought",
            dataType: "json",
            data: {
                id: deleteid
            },
            success: data => {
                if (data.ret) {
                    $("#result").modal();
                    $$.getElementById('msg').innerHTML = data.msg;
                    {include file='table/js_delete.tpl'}
                } else {
                    $("#result").modal();
                    $$.getElementById('msg').innerHTML = data.msg;
                }
            },
            error: jqXHR => {
                $("#result").modal();
                $$.getElementById('msg').innerHTML = `${ldelim}jqXHR{rdelim} An error has occurred。`;
            }
        });
    }
</script>

{literal}
<script>
    $('#main_form').validate({
        submitHandler: () => {
            $.ajax({
                type: "POST",
                url: "bought/buy",
                dataType: "json",
                {/literal}
                data: {
                    buy_shop: $$getValue('buy_shop'),
                    buy_type: $$getValue('buy_type'),
                    {literal}
                },
                success: (data) => {
                    if (data.ret) {
                        $("#result").modal();
                        $$.getElementById('msg').innerHTML = data.msg;
                        {/literal}
                        window.setTimeout("window.location.reload()", {$config['jump_delay']});
                        {literal}
                    } else {
                        $("#result").modal();
                        $$.getElementById('msg').innerHTML = data.msg;
                    }
                },
                error: (jqXHR) => {
                    $("#result").modal();
                    $$.getElementById('msg').innerHTML = `${
                            data.msg
                            } There was an error with`;
                }
            });
        }
    });
</script>

{/literal}
