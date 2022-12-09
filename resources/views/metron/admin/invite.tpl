{include file='admin/main.tpl'}

<main class="content">
    <div class="content-header ui-content-header">
        <div class="container">
            <h1 class="content-heading">The invitation</h1>
        </div>
    </div>
    <div class="container">
        <section class="content-inner margin-top-no">

            <div class="card">
                <div class="card-main">
                    <div class="card-inner">
                        <p>Public invitation code function has been abandoned, if you want to open registration in, please .config.php Lt. register_mode The project is set to open </p>
                    </div>
                </div>
            </div>

            <div class="card">
				<div class="card-main">
					<div class="card-inner">

						<div class="form-group form-group-label">
							<label class="floating-label" for="userid">Users need to modify the inviter</label>
							<input class="form-control maxwidth-edit" id="userid" type="text">
							<p class="form-control-guide"><i class="material-icons">info</i>Fill in the userID</p>
						</div>

						<div class="form-group form-group-label">
							<label class="floating-label" for="refid">Inviter'sID</label>
							<input class="form-control maxwidth-edit" id="refid" type="number">
						</div>


					</div>

					<div class="card-action">
						<div class="card-action-btn pull-left">
							<a class="btn btn-flat waves-attach" id="confirm"><span class="icon">check</span>&nbsp;To change the</a>
						</div>
					</div>
				</div>
			</div>

            <div class="card">
                <div class="card-main">
                    <div class="card-inner">

                        <div class="form-group form-group-label">
                            <label class="floating-label" for="uid">The number of users need to increase the invitation link</label>
                            <input class="form-control maxwidth-edit" id="uid" type="text">
                            <p class="form-control-guide"><i class="material-icons">info</i>Fill in the userIDA complete mailbox, or the user</p>
                        </div>

                        <div class="form-group form-group-label">
                            <label class="floating-label" for="prefix">Invite link number</label>
                            <input class="form-control maxwidth-edit" id="num" type="number">
                        </div>


                    </div>

                    <div class="card-action">
                        <div class="card-action-btn pull-left">
                            <a class="btn btn-flat waves-attach" id="invite"><span class="icon">check</span>&nbsp;increase</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card margin-bottom-no">
                <div class="card-main">
                    <div class="card-inner">
                        <p class="card-heading">Rebate record</p>
                        <p>Display list item: {include file='table/checkbox.tpl'}
                        </p>
                        <div class="card-table">
                            <div class="table-responsive">
                                {include file='table/table.tpl'}
                            </div>
                        </div>


                    </div>
                </div>
            </div>

            {include file='dialog.tpl'}


    </div>


</main>


{include file='admin/footer.tpl'}

<script>
    {include file='table/js_1.tpl'}


    $$.getElementById('invite').addEventListener('click', () => {
        $.ajax({
            type: "POST",
            url: "/admin/invite",
            dataType: "json",
            data: {
                prefix: $$getValue('invite'),
                uid: $$getValue('uid'),
                num: $$getValue('num'),
            },
            success: data => {
                if (data.ret) {
                    $("#result").modal();
                    $$.getElementById('msg').innerHTML = data.msg;
                    window.setTimeout("location.href='/admin/invite'", {$config['jump_delay']} );
                } else {
                    $("#result").modal();
                    $$.getElementById('msg').innerHTML = data.msg;
                }
                // window.location.reload();
            },
            error: jqXHR => {
                alert(`An error occurred：${
                        jqXHR.status
                        }`);
            }
        })
    })

    $$.getElementById('confirm').addEventListener('click', () => {
        $.ajax({
            type: "POST",
            url: "/admin/chginvite",
            dataType: "json",
            data: {
                prefix: $$.getElementById('confirm').value,
                userid: $$.getElementById('userid').value,
                refid: $$.getElementById('refid').value,
            },
            success: data => {
                if (data.ret) {
                    $("#result").modal();
                    $$.getElementById('msg').innerHTML = data.msg;
                    window.setTimeout("location.href='/admin/invite'", {$config['jump_delay']} );
                } else {
                    $("#result").modal();
                    $$.getElementById('msg').innerHTML = data.msg;
                }
                // window.location.reload();
            },
            error: jqXHR => {
                alert(`An error occurred：${ldelim}jqXHR.status{rdelim}`);
            }
        })
    })

    window.addEventListener('load', () => {
        {include file='table/js_2.tpl'}
    });
</script>
