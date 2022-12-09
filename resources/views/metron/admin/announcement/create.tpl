{include file='admin/main.tpl'}

<main class="content">
    <div class="content-header ui-content-header">
        <div class="container">
            <h1 class="content-heading">Add the announcement</h1>
        </div>
    </div>
    <div class="container">
        <div class="col-lg-12 col-md-12">
            <section class="content-inner margin-top-no">

                <div class="card">
                    <div class="card-main">
                        <div class="card-inner">
                            <div class="form-group form-group-label">
                                <label class="floating-label" for="content">content</label>
                                <link rel="stylesheet"
                                      href="https://cdn.jsdelivr.net/npm/editor.md@1.5.0/css/editormd.min.css"/>
                                <div id="editormd">
                                    <textarea style="display:none;" id="content"></textarea>
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
                                        <div class="form-group form-group-label">
                                            <label class="floating-label" for="vip">VIPlevel</label>
                                            <input class="form-control maxwidth-edit" id="vip" type="text" name="vip">
                                            <p class="form-control-guide"><i class="material-icons">info</i>Send to equal to or higher than the level of the user
                                                0To be graded</p>
                                            <div class="checkbox switch">
                                                <label for="issend">
                                                    <input class="access-hide" id="issend" type="checkbox"
                                                           name="issend"><span class="switch-toggle"></span>Whether to send the mail
                                                </label>
                                            </div>

                                            <div class="checkbox switch">
                                                <label for="isaliyunapisend">
                                                    <input class="access-hide" id="isaliyunapisend" type="checkbox"
                                                           name="isaliyunapisend"><span class="switch-toggle"></span>Whether through ali cloud mail delivery WEB API Send E-mail
                                                </label>
                                            </div>

                                            <div class="checkbox switch">
                                                <label for="PushBear">
                                                    <input class="access-hide" id="PushBear" type="checkbox"
                                                           name="PushBear"><span class="switch-toggle"></span>Whether to usePushBear
                                                </label>
                                            </div>
                                            <p class="form-control-guide"><i class="material-icons">info</i>To focus on the user to push WeChat way qr code messages
                                            </p>
                                        </div>

                                        <button id="submit" type="submit"
                                                class="btn btn-block btn-brand waves-attach waves-light">add
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

<script src="https://cdn.jsdelivr.net/npm/editor.md@1.5.0/editormd.min.js"></script>
<script>
    (() => {
        editor = editormd("editormd", {
            path: "https://cdn.jsdelivr.net/npm/editor.md@1.5.0/lib/", // Autoload modules mode, codemirror, marked... dependents libs path
            height: 720,
            saveHTMLToTextarea: true
        });

        /*
        // or
        var editor = editormd({
            id   : "editormd",
            path : "../lib/"
        });
        */
    })();

    window.addEventListener('load', () => {
        function submit(page = -1) {

            if ($$.getElementById('issend').checked) {
                var issend = 1;
            } else {
                var issend = 0;
            }
            if ($$.getElementById('isaliyunapisend').checked) {
                var isaliyunapisend = 1;
            } else {
                var isaliyunapisend = 0;
            }
            if ($$.getElementById('PushBear').checked) {
                var PushBear = 1;
            } else {
                var PushBear = 0;
            }
            if (page === -1) {
                sedPage = 1;
            } else {
                sedPage = page;
                var PushBear = 0;

            }
            $.ajax({
                type: "POST",
                url: "/admin/announcement",
                dataType: "json",
                data: {
                    content: editor.getHTML(),
                    markdown: $('.editormd-markdown-textarea').val(),
                    vip: $$getValue('vip'),
                    issend,
                    isaliyunapisend,
                    PushBear,
                    page: sedPage
                },
                success: data => {
                    if (data.ret === 1) {
                        $("#result").modal();
                        $$.getElementById('msg').innerHTML = data.msg;
                        window.setTimeout("location.href=top.document.referrer", {$config['jump_delay']});
                    } else if (data.ret === 2) {
                        submit(data.msg);
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
            submit();
        });
    });


</script>
