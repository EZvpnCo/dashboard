<?php
/* Smarty version 3.1.47, created on 2022-10-16 21:38:28
  from '/www/wwwroot/subscribe/resources/views/metron/admin/relay/add.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.47',
  'unifunc' => 'content_634c09548bfea6_63221685',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd9d3848969ff4aa2e050e539c3ca839096313f4a' => 
    array (
      0 => '/www/wwwroot/subscribe/resources/views/metron/admin/relay/add.tpl',
      1 => 1665876375,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:admin/main.tpl' => 1,
    'file:dialog.tpl' => 1,
    'file:admin/footer.tpl' => 1,
  ),
),false)) {
function content_634c09548bfea6_63221685 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:admin/main.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<main class="content">
    <div class="content-header ui-content-header">
        <div class="container">
            <h1 class="content-heading"> 添加中转规则</h1>
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
                                    <label class="floating-label" for="source_node">起源节点</label>
                                    <select id="source_node" class="form-control maxwidth-edit" name="source_node">
                                        <option value="0">请选择起源节点</option>
                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['source_nodes']->value, 'source_node');
$_smarty_tpl->tpl_vars['source_node']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['source_node']->value) {
$_smarty_tpl->tpl_vars['source_node']->do_else = false;
?>
                                            <option value="<?php echo $_smarty_tpl->tpl_vars['source_node']->value->id;?>
"><?php echo $_smarty_tpl->tpl_vars['source_node']->value->name;?>
</option>
                                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                    </select>
                                </div>


                                <div class="form-group form-group-label">
                                    <label class="floating-label" for="dist_node">目标节点</label>
                                    <select id="dist_node" class="form-control maxwidth-edit" name="dist_node">
                                        <option value="-1">不进行中转</option>
                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['dist_nodes']->value, 'dist_node');
$_smarty_tpl->tpl_vars['dist_node']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['dist_node']->value) {
$_smarty_tpl->tpl_vars['dist_node']->do_else = false;
?>
                                            <option value="<?php echo $_smarty_tpl->tpl_vars['dist_node']->value->id;?>
"><?php echo $_smarty_tpl->tpl_vars['dist_node']->value->name;?>
</option>
                                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                    </select>
                                </div>

                                <div class="form-group form-group-label">
                                    <label class="floating-label" for="port">端口</label>
                                    <input class="form-control maxwidth-edit" id="port" name="port" type="text"
                                           value="0">
                                </div>

                                <div class="form-group form-group-label">
                                    <label class="floating-label" for="priority">优先级</label>
                                    <input class="form-control maxwidth-edit" id="priority" name="priority" type="text"
                                           value="0">
                                </div>

                                <div class="form-group form-group-label">
                                    <label class="floating-label" for="user_id">用户ID</label>
                                    <input class="form-control maxwidth-edit" id="user_id" name="user_id" type="text"
                                           value="0">
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
                                                    class="btn btn-block btn-brand waves-attach waves-light">添加
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <?php $_smarty_tpl->_subTemplateRender('file:dialog.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
                <section>

        </div>


    </div>
</main>

<?php $_smarty_tpl->_subTemplateRender('file:admin/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<?php echo '<script'; ?>
>
    
    $('#main_form').validate({
        rules: {
            priority: {required: true},
            port: {required: true},
            user_id: {required: true}
        },
        
        submitHandler: () => {

            $.ajax({
                type: "POST",
                url: "/admin/relay",
                dataType: "json",
                data: {
                    source_node: $$getValue('source_node'),
                    dist_node: $$getValue('dist_node'),
                    port: $$getValue('port'),
                    user_id: $$getValue('user_id'),
                    priority: $$getValue('priority')
                },
                success: data => {
                    if (data.ret) {
                        $("#result").modal();
                        $$.getElementById('msg').innerHTML = data.msg;
                        window.setTimeout("location.href=top.document.referrer", <?php echo $_smarty_tpl->tpl_vars['config']->value['jump_delay'];?>
);
                    } else {
                        $("#result").modal();
                        $$.getElementById('msg').innerHTML = data.msg;
                    }
                },
                error: jqXHR => {
                    $("#result").modal();
                    $$.getElementById('msg').innerHTML = `${data.msg} 发生错误了。`;
                }
            });
        }
    });

<?php echo '</script'; ?>
>


<?php }
}
