{include file='admin/main.tpl'}


<main class="content">
    <div class="content-header ui-content-header">
        <div class="container">
            <h1 class="content-heading">Configuration editor #{$edit_config->id}</h1>
        </div>
    </div>
    <div class="container">
        <div class="col-lg-12 col-sm-12">
            <section class="content-inner margin-top-no">

                <div class="card">
                    <div class="card-main">
                        <div class="card-inner">

                            <div class="form-group form-group-label">
                                <label class="floating-label" for="key">The configuration of</label>
                                <input class="form-control maxwidth-edit" id="key" type="text" value="{$edit_config->key}" readonly>
                            </div>

                            <div class="form-group form-group-label">
                                <label class="floating-label" for="name">The name of the configuration</label>
                                <input class="form-control maxwidth-edit" id="name" type="text" value="{$edit_config->name}" readonly>
                            </div>

                        {if $edit_config->comment!=''}
                            <div class="form-group form-group-label">
                                <label class="floating-label" for="comment">Configuration description</label>
                                <textarea class="form-control maxwidth-edit" id="comment" rows="4" readonly>{$edit_config->comment}</textarea>
                            </div>
                        {/if}

                        {if strpos($edit_config->key,'.bool.') === false}
                            <div class="form-group form-group-label">
                                <label class="floating-label" for="value">Configuration values</label>
                                <textarea class="form-control maxwidth-edit" id="value" rows="5">{$edit_config->getValue()}</textarea>
                            </div>
                        {else}
                            <div class="form-group form-group-label">
                                <label for="value">
                                    <label class="floating-label" for="value">Configure the switch</label>
                                    <select id="value" class="form-control maxwidth-edit" name="value">
                                        <option value="0" {if !$edit_config->getValue()}selected{/if}>Shut down</option>
                                        <option value="1" {if $edit_config->getValue()}selected{/if}>open</option>
                                    </select>
                                </label>
                            </div>
                        {/if}

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
                                                class="btn btn-block btn-brand waves-attach waves-light">Modify the
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
            $.ajax({
                type: "PUT",
                url: "/admin/config/update/{$edit_config->key}",
                dataType: "json",
                data: {
                    value: $$getValue('value')
                },
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
                error: jqXHR => {
                    $("#result").modal();
                    $$.getElementById('msg').innerHTML = `An error occurred：${
                            jqXHR.status
                            }`;
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
