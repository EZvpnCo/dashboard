{include file='admin/main.tpl'}


<main class="content">
    <div class="content-header ui-content-header">
        <div class="container">
            <h1 class="content-heading">Top-up code{if $config['enable_donate']===true}With the donation{/if}management</h1>
        </div>
    </div>
    <div class="container">
        <div class="col-lg-12 col-md-12">
            <section class="content-inner margin-top-no">

                <div class="card">
                    <div class="card-main">
                        <div class="card-inner">
                            <p>Amount transfer record in the system.</p>
                            <p>
                                Today's water：￥{$user->calIncome("today")}<br/>
                                Yesterday the water：￥{$user->calIncome("yesterday")}<br/>
                                This month the water：￥{$user->calIncome("this month")}<br/>
                                Last month the water：￥{$user->calIncome("last month")}<br/>
                                A total of running water：￥{$user->calIncome("total")}
                            </p>
                            <p>Display list item:
                                {include file='table/checkbox.tpl'}
                            </p>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    {include file='table/table.tpl'}
                </div>


                <div class="fbtn-container">
                    <div class="fbtn-inner">
                        <a class="fbtn fbtn-lg fbtn-brand-accent waves-attach waves-circle waves-light"
                           href="/admin/code/create">+</a>

                    </div>
                </div>


                <div class="fbtn-container">
                    <div class="fbtn-inner">
                        <a class="fbtn fbtn-lg fbtn-brand-accent waves-attach waves-circle waves-light"
                           data-toggle="dropdown"><span class="fbtn-ori icon">add</span><span class="fbtn-sub icon">close</span></a>
                        <div class="fbtn-dropup">
                            <a class="fbtn fbtn-brand waves-attach waves-circle waves-light"
                               href="/admin/code/create"><span class="fbtn-text fbtn-text-left">Top-up code</span><span
                                        class="icon">code</span></a> {if $config['enable_donate']===true}
                                <a class="fbtn fbtn-green waves-attach waves-circle waves-light"
                                   href="/admin/donate/create"><span class="fbtn-text fbtn-text-left">Donations and spending</span><span
                                            class="icon">attach_money</span></a>
                            {/if}
                        </div>
                    </div>
                </div>


        </div>


    </div>
</main>


{include file='admin/footer.tpl'}

<script>
    {include file='table/js_1.tpl'}

    $(document).ready(function () {
        {include file='table/js_2.tpl'}
    });
</script>
