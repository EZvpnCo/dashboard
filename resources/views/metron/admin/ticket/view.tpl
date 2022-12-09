{include file='admin/main.tpl'}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/editor.md@1.5.0/css/editormd.min.css"/>

<main class="content">
    <div class="content-header ui-content-header">
        <div class="container">
            <h1 class="content-heading">Check the work order</h1>
        </div>
    </div>
    <div class="container">
        <div class="col-lg-12 col-sm-12">
            <section class="content-inner margin-top-no">

                <div class="card">
                    <div class="card-main">
                        <div class="card-inner">
                            <div class="form-group form-group-label">
                                <label class="floating-label" for="content">content</label>
                                <div id="editormd">
                                    <textarea style="display:none;" id="content"></textarea>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div aria-hidden="true" class="modal modal-va-middle fade" id="changetouser_modal" role="dialog"
                     tabindex="-1">
                    <div class="modal-dialog modal-xs">
                        <div class="modal-content">
                            <div class="modal-heading">
                                <a class="modal-close" data-dismiss="modal">×</a>
                                <h2 class="modal-title">Confirm to switch to the user?</h2>
                            </div>
                            <div class="modal-inner">
                                <p>After switching to the user, you can at any time through the menu at the bottom of the "return an administrator" button to return to this work order.</p>
                            </div>
                            <div class="modal-footer">
                                <p class="text-right">
                                    <button class="btn btn-flat btn-brand-accent waves-attach waves-effect" data-dismiss="modal" type="button">cancel</button>
                                    <button class="btn btn-flat btn-brand-accent waves-attach" data-dismiss="modal" id="changetouser_input" type="button">determine</button>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-main">
                        <div class="card-inner">

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-10">
                                        <button id="submit" type="submit" class="btn btn-brand waves-attach waves-light">add</button>
                                        <button id="close" type="submit" class="btn btn-brand-accent waves-attach waves-light">Add and close</button>
                                        <button id="close_directly" type="submit" class="btn btn-brand-accent waves-attach waves-light">Directly closed</button>
                                        <button  id="changetouser" class="btn btn-brand waves-attach waves-light" onClick="changetouser_modal_show()">Switch to the user</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {$ticketset->render()}
                {foreach $ticketset as $ticket}
                    <div class="card">
                        <aside class="card-side pull-left" style="padding: 16px; text-align: center">
                            <img style="border-radius: 100%; width: 100%" src="{$ticket->User()->gravatar}">
                            <br>
                            {$ticket->User()->user_name}
                        </aside>
                        <div class="card-main">
                            <div class="card-inner">
                                {$ticket->content}
                            </div>
                            <div class="card-action" style="padding: 12px"> {$ticket->datetime()}</div>
                        </div>
                    </div>
                {/foreach}
                {$ticketset->render()}


                {include file='dialog.tpl'}

        </div>

    </div>
</main>

{include file='admin/footer.tpl'}

<script src="https://cdn.jsdelivr.net/npm/editor.md@1.5.0/editormd.min.js"></script>
<script>
    function changetouser_modal_show() {
        $("#changetouser_modal").modal();
    }

    window.addEventListener('load', () => {
        function submit() {
            $("#result").modal();
            $$.getElementById('msg').innerHTML = `Is submitted。`;
            $.ajax({
                type: "PUT",
                url: "/admin/ticket/{$id}",
                dataType: "json",
                data: {
                    content: editor.getHTML(),
                    status
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

        $$.getElementById('submit').addEventListener('click', () => {
            status = 1;
            submit();
        });

        $$.getElementById('close').addEventListener('click', () => {
            status = 0;
            submit();
        });

        $$.getElementById('close_directly').addEventListener('click', () => {
            status = 0;
            $("#result").modal();
            $$.getElementById('msg').innerHTML = `Is submitted。`;
            $.ajax({
                type: "PUT",
                url: "/admin/ticket/{$id}",
                dataType: "json",
                data: {
                    content: 'The work order has been closed',
                    status
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
        });

        function changetouser_id() {
            $.ajax({
                type: "POST",
                url: "/admin/user/changetouser",
                dataType: "json",
                data: {
                    userid: {$ticket->User()->id},
                    adminid: {$user->id},
                    local: '/admin/ticket/' + {$ticket->id} +'/view'
                },
                success: data => {
                    if (data.ret) {
                        $("#result").modal();
                        $$.getElementById('msg').innerHTML = data.msg;
                        window.setTimeout("location.href='/user'", {$config['jump_delay']});
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

        $$.getElementById('changetouser_input').addEventListener('click', () => {
            changetouser_id();
        });

    });

    (() => {
        editor = editormd("editormd", {
            path: "https://cdn.jsdelivr.net/npm/editor.md@1.5.0/lib/", // Autoload modules mode, codemirror, marked... dependents libs path
            height: 450,
            saveHTMLToTextarea: true,
            emoji: true
        });

        /*
        // or
        var editor = editormd({
            id   : "editormd",
            path : "../lib/"
        });
        */
    })();

</script>
