{include file='admin/main.tpl'}

<main class="content">
    <div class="content-header ui-content-header">
        <div class="container">
            <h1 class="content-heading"> Add rules</h1>
        </div>
    </div>
    <div class="container">
        <div class="col-lg-12 col-sm-12">
            <section class="content-inner margin-top-no">
                <form id="main_form">
                    <div class="card">
                        <div class="card-main">
                            <div class="card-inner">
                                <div class="form-group form-group-label">
                                    <label class="floating-label" for="name">Rule name</label>
                                    <input class="form-control maxwidth-edit" id="name" name="name" type="text">
                                </div>

                                <div class="form-group form-group-label">
                                    <label class="floating-label" for="text">Rule description</label>
                                    <input class="form-control maxwidth-edit" id="text" name="text" type="text">
                                </div>

                                <div class="form-group form-group-label">
                                    <label class="floating-label" for="regex">The regular expression rules</label>
                                    <input class="form-control maxwidth-edit" id="regex" name="regex" type="text">
                                </div>

                                <div class="form-group form-group-label">
                                    <div class="form-group form-group-label">
                                        <label class="floating-label" for="type">Rule type</label>
                                        <select id="type" class="form-control maxwidth-edit" name="type">
                                            <option value="1">Packet plaintext matches</option>
                                            <option value="2">The packet hex matching</option>
                                        </select>
                                    </div>
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
                                                    class="btn btn-block btn-brand waves-attach waves-light">add
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                {include file='dialog.tpl'}

        </div>

    </div>
</main>

{include file='admin/footer.tpl'}


<script>

    {literal}
    $('#main_form').validate({
        rules: {
            name: {required: true},
            text: {required: true},
            regex: {required: true}
        },
        {/literal}
        submitHandler: function () {
            {literal}
            $.ajax({
                type: "POST",
                url: "/admin/detect",
                dataType: "json",
                data: {
                    name: $$getValue("name"),
                    text: $$getValue("text"),
                    regex: $$getValue("regex"),
                    type: $$getValue("type")
                },
                {/literal}
                success: data => {
                    if (data.ret) {
                        $("#result").modal();
                        $$.getElementById('msg').innerHTML = data.msg;
                        window.setTimeout("location.href=top.document.referrer", {$config['jump_delay']});
                    } else {
                        $("#result").modal();
                        $$.getElementById('msg').innerHTML = data.msg;
                    }
                },
                error: data => {
                    $("#result").modal();
                    $$.getElementById('msg').innerHTML = `${ldelim}data.msg{rdelim} There was an error with。`;
                }
            });
        }
    });

</script>

