{include file='admin/main.tpl'}

<main class="content">
    <div class="content-header ui-content-header">
        <div class="container">
            <h1 class="content-heading">Transit link search</h1>
        </div>
    </div>
    <div class="container">
        <div class="col-lg-12 col-md-12">
            <section class="content-inner margin-top-no">

                <div class="card">
                    <div class="card-main">
                        <div class="card-inner">
                            <p>The user's link in the system.</p>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-main">
                        <div class="card-inner">
                            <div class="form-group form-group-label">
                                <label class="floating-label" for="search"> Enter thSearch link searchD Search link search </label>
                                <input class="form-control maxwidth-edit" id="search" type="text">
                            </div>
                        </div>
                        <div class="card-action">
                            <div class="card-action-btn pull-left">
                                <a class="btn btn-flat waves-attach waves-light" id="search_button"><span class="icon">search</span>&nbsp;search</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="mdl-data-table" id="table_1" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>port</th>
                            <th>Originating node</th>
                            <th>Destination node</th>
                            <th>Way to node</th>
                            <th>state</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>port</th>
                            <th>Originating node</th>
                            <th>Destination node</th>
                            <th>Way to node</th>
                            <th>state</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        {foreach $pathset as $path}
                            <tr>
                                <td>{$path->port}</td>
                                <td>{$path->begin_node->name}</td>
                                <td>{$path->end_node->name}</td>
                                <td>{$path->path}</td>
                                <td>{$path->status}</td>
                            </tr>
                        {/foreach}
                        </tbody>
                    </table>
                </div>


        </div>


    </div>
</main>


{include file='admin/footer.tpl'}


<script>

    window.addEventListener('load', () => {
        table = $('#table_1').DataTable({
            "columnDefs": [{
                targets: ['_all'],
                className: 'mdl-data-table__cell--non-numeric'
            }],
            {include file='table/lang_chinese.tpl'}
        });

        let search = () => {
            window.location = `/admin/relay/path_search/${ldelim}$$.getElementById('search').value{rdelim}`
        };

        $$.getElementById('search_button').addEventListener('click', () => {
            if ($$.getElementById('search').value !== "") {
                search();
            }
        })
    })

</script>
