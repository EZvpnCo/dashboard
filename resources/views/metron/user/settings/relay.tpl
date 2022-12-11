<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Node transit &mdash; {$config["appName"]}</title>
        {include file='include/global/head.tpl'}
        <div class="d-flex flex-column flex-root">
            <div class="d-flex flex-row flex-column-fluid page">
                <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
                    {include file='include/global/menu.tpl'}
                    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                        <div class="subheader min-h-lg-175px pt-5 pb-7 subheader-transparent" id="kt_subheader">
                            <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                                <div class="d-flex align-items-center flex-wrap mr-2">
                                    <div class="d-flex flex-column">
                                        <h2 class="text-white font-weight-bold my-2 mr-5">Node transit</h2>
                                    </div>
                                </div>
                                {include file='include/settings/menu.tpl'}
                                    
                                    <div class="flex-row-fluid ml-lg-8">

                                        <div class="alert alert-custom {$style[$theme_style]['alert']} alert-shadow fade show gutter-b {$metron['style_shadow']}" role="alert">
                                            <div class="alert-icon">
                                                <span class="svg-icon svg-icon-primary svg-icon-xl">
                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24" height="24"></rect>
                                                            <path d="M7.07744993,12.3040451 C7.72444571,13.0716094 8.54044565,13.6920474 9.46808594,14.1079953 L5,23 L4.5,18 L7.07744993,12.3040451 Z M14.5865511,14.2597864 C15.5319561,13.9019016 16.375416,13.3366121 17.0614026,12.6194459 L19.5,18 L19,23 L14.5865511,14.2597864 Z M12,3.55271368e-14 C12.8284271,3.53749572e-14 13.5,0.671572875 13.5,1.5 L13.5,4 L10.5,4 L10.5,1.5 C10.5,0.671572875 11.1715729,3.56793164e-14 12,3.55271368e-14 Z" fill="#000000" opacity="0.3"></path>
                                                            <path d="M12,10 C13.1045695,10 14,9.1045695 14,8 C14,6.8954305 13.1045695,6 12,6 C10.8954305,6 10,6.8954305 10,8 C10,9.1045695 10.8954305,10 12,10 Z M12,13 C9.23857625,13 7,10.7614237 7,8 C7,5.23857625 9.23857625,3 12,3 C14.7614237,3 17,5.23857625 17,8 C17,10.7614237 14.7614237,13 12,13 Z" fill="#000000" fill-rule="nonzero"></path>
                                                        </g>
                                                    </svg>
                                                </span>
                                            </div>
                                            <div class="alert-text">
                                                Generally transfer rules made by other foreign node transfer to China<br />
                                                Please set the port number for your own port<br />
                                                Priority is larger, on behalf of its would be preferred in a number of eligible rules coexist with, when the same priority, first add the rule will be adopted.<br />
                                                Node does not set the transfer, the node can be used as an ordinary node to do agent.
                                            </div>
                                        </div>

                                        <div class="card card-custom gutter-b {$metron['style_shadow']}" id="relay-card">
                                            <div class="card-header flex-wrap border-0 pt-6">
                                                <div class="card-title">
                                                    <h3 class="card-label text-primary"><strong>Rule table</strong>
                                                    <span class="d-block text-muted pt-2 font-size-sm">Your account of all the nodes transfer rules</span></h3>
                                                </div>
                                                <div class="card-toolbar">
                                                    <a href="JavaScript:;" class="btn btn-primary font-weight-bolder" data-toggle="modal" data-target="#add-relay-modal">The new rules</a>
                                                </div>
                                            </div>
                                            <div class="card-body pt-0">
                                                <div class="datatable datatable-bordered datatable-head-custom" id="ajax_relay_rule_data"></div>
                                            </div>
                                        </div>

                                        <div class="card card-custom gutter-b {$metron['style_shadow']}" id="relay-card">
                                            <div class="card-header flex-wrap border-0 pt-6">
                                                <div class="card-title">
                                                    <h3 class="card-label text-primary"><strong>Link table</strong>
                                                    <span class="d-block text-muted pt-2 font-size-sm">According to the rules of your node transfer simulation link test</span></h3>
                                                </div>
                                            </div>
                                            <div class="card-body pt-0">
                                                <div class="datatable datatable-bordered datatable-head-custom" id="ajax_relay_link_data"></div>
                                            </div>
                                        </div>

                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                    {include file='include/global/footer.tpl'}
                </div>
            </div>
        </div>
        {include file='include/global/scripts.tpl'}

<!-- The new rules modal -->
<div class="modal fade" id="add-relay-modal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title {$style[$theme_style]['modal']['text_title']}"><strong>The new node transfer rules</strong></h5>
            </div>
            <div class="modal-body">
                <div class="form-group mb-2">
                    <label class="col-form-label text-lg-right text-left">The origin of nodes:</label>
                    <select class="form-control" id="source_node">
                        {foreach $source_nodes as $source_node}
                        <option value="{$source_node->id}" >{$source_node->name}</option>
                        {/foreach}
                    </select>
                </div>
                <div class="form-group mb-2">
                    <label class="col-form-label text-lg-right text-left">The target node:</label>
                    <select class="form-control" id="dist_node">
                        <option value="-1" >Not to transfer</option>
                        {foreach $dist_nodes as $dist_node}
                        <option value="{$dist_node->id}" >{$dist_node->name}</option>
                        {/foreach}
                    </select>
                </div>
                <div class="form-group mb-2">
                    <label class="col-form-label text-lg-right text-left">The target node:</label>
                    <select class="form-control" id="port">
                        {foreach $ports as $port}
                        <option value="{$port}" >{$port}</option>
                        {/foreach}
                    </select>
                </div>
                <div class="form-group mb-2">
                    <label>priority</label>
                    <input type="number" class="form-control" name="priority" value="0" />
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="add_relay" onclick="setting.add_relay();">save</button>
                <button type="button" class="btn {$style[$theme_style]['modal']['btn_close']} font-weight-bold" data-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- Edit the rules modal -->
<div class="modal fade" id="edit-relay-modal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title {$style[$theme_style]['modal']['text_title']}"><strong>Edit interim rules</strong></h5>
            </div>
            <div class="modal-body">
                <div class="form-group mb-2">
                    <label class="col-form-label text-lg-right text-left">The origin of nodes:</label>
                    <select class="form-control" id="edit_source_node">
                        {foreach $source_nodes as $source_node}
                        <option value="{$source_node->id}" >{$source_node->name}</option>
                        {/foreach}
                    </select>
                </div>
                <div class="form-group mb-2">
                    <label class="col-form-label text-lg-right text-left">The target node:</label>
                    <select class="form-control" id="edit_dist_node">
                        <option value="-1" >Not to transfer</option>
                        {foreach $dist_nodes as $dist_node}
                        <option value="{$dist_node->id}" >{$dist_node->name}</option>
                        {/foreach}
                    </select>
                </div>
                <div class="form-group mb-2">
                    <label class="col-form-label text-lg-right text-left">The target node:</label>
                    <select class="form-control" id="edit_port">
                        {foreach $ports as $port}
                        <option value="{$port}" >{$port}</option>
                        {/foreach}
                    </select>
                </div>
                <div class="form-group mb-2">
                    <label>priority</label>
                    <input type="number" class="form-control" name="edit_priority" value="" />
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="edit_relay" onclick="setting.edit_relay();">save</button>
                <button type="button" class="btn {$style[$theme_style]['modal']['btn_close']} font-weight-bold" data-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>

    </body>
</html>