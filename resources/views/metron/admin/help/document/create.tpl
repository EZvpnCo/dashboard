{include file='admin/main.tpl'}

<main class="content">
    <div class="content-header ui-content-header">
        <div class="container">
            <h1 class="content-heading">Add the document</h1>
        </div>
    </div>
    <div class="container">
        <div class="col-lg-12 col-md-12">
            <section class="content-inner margin-top-no">

                <div class="card">
                    <div class="card-main">
                        <div class="card-inner">

                            <div class="form-group form-group-label">
                                <label class="floating-label" for="title">The title</label>
                                <input class="form-control maxwidth-edit" id="title" name="title" type="text" value="">
                            </div>

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
                                            <label for="class_1">
                                                <label class="floating-label" for="class_1">Classification of a</label>
                                                <select id="class_1" class="form-control maxwidth-edit" name="class_1">
                                                        <option value="0">Please select a level of classification</option>
                                                        {foreach $helpClass1 as $Class1}
                                                            <option value="{$Class1->id}">#{$Class1->id} - {$Class1->name}</option>
                                                        {/foreach}
                                                </select>
                                            </label>
                                        </div>

                                        <div class="form-group form-group-label">
                                            <label for="class_2">
                                                <label class="floating-label" for="class_2">Category 2</label>
                                                <select id="class_2" class="form-control maxwidth-edit" name="class_2">
                                                        <option value="0">Please select a secondary classification</option>
                                                </select>
                                            </label>
                                        </div>

                                        <div class="form-group form-group-label">
                                            <label>
                                                <label class="floating-label" for="sort">The sorting</label>
                                                <input class="form-control maxwidth-edit" id="sort" name="sort" type="text" value="0">
                                            </label>
                                        </div>
                                        <p class="form-control-guide"><i class="material-icons">info</i>The bigger the top of the array(most5digits)</p>

                                        <div class="form-group form-group-label">
                                            <div class="checkbox switch">
                                                <label for="isontop">
                                                    <input class="access-hide" id="isontop" type="checkbox"
                                                           name="isontop"><span class="switch-toggle"></span>Whether top on
                                                </label>
                                            </div>
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
<script>
    $(function(){
        $("select#class_1").change(function(){
            $("#class_2").empty();
            $("#class_2").append("<option value='0'>Is access to classified...</option>");
            $.ajax({
                type: 'GET',
                url: '/admin/help/document/gethelpclass',
                dataType: "json",
                data: {
                    id: $(this).val()
                },
                success: data => {
                    $("#class_2").empty();
                    if (data.ret === 0){
                        $("#class_2").append("<option value='0'>"+data.msg+"</option>");
                    } else {
                        $("#class_2").append("<option value='0'>Please select a secondary classification</option>");
                        var options = '';
                        for(var i=0; i<data.length; i++) {
                            $("#class_2").append('<option value='+data[i].id+'>#'+data[i].id + ' - '+data[i].name+'</option>');
                        }
                    }
                },
                error: jqXHR => {
                    $("#result").modal();
                    $$.getElementById('msg').innerHTML = `An error occurred：${ jqXHR.status }`;
                }
            });
        });
    });
</script>

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
        function submit() {

            if ($$.getElementById('isontop').checked) {
                var isontop = 1;
            } else {
                var isontop = 0;
            }

            $.ajax({
                type: "POST",
                url: "/admin/help/document",
                dataType: "json",
                data: {
                    title: $$getValue('title'),
                    content: editor.getHTML(),
                    class1: $$getValue('class_1'),
                    class2: $$getValue('class_2'),
                    markdown: $('.editormd-markdown-textarea').val(),
                    isontop: isontop,
                    sort: $$getValue('sort'),
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
    
    function getClass() {

    }

</script>
