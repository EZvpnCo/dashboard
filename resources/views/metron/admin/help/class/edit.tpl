{include file='admin/main.tpl'}

<main class="content">
    <div class="content-header ui-content-header">
        <div class="container">
            <h1 class="content-heading">Edit category</h1>
        </div>
    </div>
    <div class="container">
        <div class="col-lg-12 col-md-12">
            <section class="content-inner margin-top-no">

                <div class="card">
                    <div class="card-main">
                        <div class="card-inner">

                            <div class="form-group form-group-label">
                                <label class="floating-label" for="title">Category name</label>
                                <input class="form-control maxwidth-edit" id="title" name="title" type="text" value="{$helpc->name}">
                            </div>

                            <div class="form-group form-group-label">
                                <label class="floating-label" for="ico">icoicon</label>
                                <input class="form-control maxwidth-edit" id="ico" name="ico" type="text" value="{$helpc->li}">
                            </div>

                            <div class="form-group form-group-label">
                                <label class="floating-label" for="sort">The sorting</label>
                                <input class="form-control maxwidth-edit" id="sort" name="sort" type="text" value="{$helpc->sort}">
                            </div>
                            <p class="form-control-guide"><i class="material-icons">info</i>The bigger the top of the array(most5digits)</p>

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
                                            <div class="checkbox switch">
                                                <label for="is_1ji">
                                                    <input class="access-hide" id="is_1ji" type="radio" {if $helpc->upid == 0}checked='checked'{/if} name="is_dji" value="1"><span class="switch-toggle"></span>Set to the level of classification
                                                </label>
                                            </div>
                                        </div>

                                        <div class="form-group form-group-label">
                                            <div class="checkbox switch">
                                                <label for="is_2ji">
                                                    <input class="access-hide" id="is_2ji" type="radio" {if $helpc->upid > 0}checked='checked'{/if} name="is_dji" value="2"><span class="switch-toggle"></span>Set to the secondary classification
                                                </label>
                                            </div>
                                        </div>

                                        <div class="form-group form-group-label" id="get1jiclass" {if $helpc->upid == 0}style="display:none"{else}style="display:block"{/if}>
                                            <label for="class_1">
                                                <label class="floating-label" for="class_1">Belongs to which level classification</label>
                                                <select id="class_1" class="form-control maxwidth-edit" name="class_1">
                                                        <option value="0">Please select a level of classification</option>
                                                </select>
                                            </label>
                                            <p class="form-control-guide"><i class="material-icons">info</i>Added as a secondary classification,Need to specify the associated level classification for it</p>
                                        </div>

                                        <div class="form-group form-group-label">
                                            <div class="checkbox switch">
                                                <label for="pageshow">
                                                    <input class="access-hide" id="pageshow" type="checkbox" {if $helpc->pageshow == 1}checked='checked'{/if} name="pageshow"><span class="switch-toggle"></span>The classification and page is shown
                                                </label>
                                                <p class="form-control-guide"><i class="material-icons">info</i>open: User interface documentation center according to the classification and the classification of documents</p>
                                                <p class="form-control-guide"><i class="material-icons">info</i>Shut down: User interface of the document center to hide this classification,Including the classification of documents</p>
                                            </div>
                                        </div>

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
{if $helpc->upid > 0} getclass();{/if}
$('input:radio[name="is_dji"]').click(function(){
	var checkValue = $('input:radio[name="is_dji"]:checked').val(); 
    var get1ji = document.getElementById("get1jiclass");
	if (checkValue == 2) {
        get1ji.style.display="block";
        getclass();
    } else {
        get1ji.style.display="none";
    }
});

function getclass() {
    $("#class_1").empty();
    $("#class_1").append("<option value='0'>Is access to classified...</option>");
    $.ajax({
        type: 'GET',
        url: '/admin/help/document/gethelpclass',
        dataType: "json",
        data: { },
        success: data => {
            $("#class_1").empty();
            if (data.ret === 0){
                $("#class_1").append("<option value='0'>"+data.msg+"</option>");
            } else {
                $("#class_1").append("<option value='0'>Please select a level of classification</option>");
                for(var i=0; i<data.length; i++) {
                    if ({$helpc->upid} == data[i].id) {
                        $("#class_1").append('<option value='+data[i].id+' selected="selected">#'+data[i].id + ' - '+data[i].name+'</option>');
                    } else {
                        $("#class_1").append('<option value='+data[i].id+'>#'+data[i].id + ' - '+data[i].name+'</option>');
                    }
                }
            }
        },
        error: jqXHR => {
            $("#result").modal();
            $$.getElementById('msg').innerHTML = `An error occurred：${ jqXHR.status }`;
        }
    });
}
</script>
<script>
    window.addEventListener('load', () => {
        function submit() {

            if ($$.getElementById('pageshow').checked) {
                var pageshow = 1;
            } else {
                var pageshow = 0;
            }

            $.ajax({
                type: "PUT",
                url: "/admin/help/class/{$helpc->id}",
                dataType: "json",
                data: {
                    name: $$getValue('title'),
                    classji: $('input:radio[name="is_dji"]:checked').val(),
                    class1ji: $$getValue('class_1'),
                    pageshow: pageshow,
                    ico: $$getValue('ico'),
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
