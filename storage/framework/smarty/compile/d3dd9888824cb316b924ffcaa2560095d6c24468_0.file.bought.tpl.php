<?php
/* Smarty version 3.1.47, created on 2022-10-17 23:13:49
  from '/www/wwwroot/subscribe/resources/views/metron/admin/user/bought.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.47',
  'unifunc' => 'content_634d712d11dad0_10567743',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd3dd9888824cb316b924ffcaa2560095d6c24468' => 
    array (
      0 => '/www/wwwroot/subscribe/resources/views/metron/admin/user/bought.tpl',
      1 => 1665876375,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:admin/main.tpl' => 1,
    'file:table/checkbox.tpl' => 1,
    'file:table/table.tpl' => 1,
    'file:dialog.tpl' => 1,
    'file:admin/footer.tpl' => 1,
    'file:table/js_1.tpl' => 1,
    'file:table/js_2.tpl' => 1,
    'file:table/js_delete.tpl' => 1,
  ),
),false)) {
function content_634d712d11dad0_10567743 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:admin/main.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<main class="content">
    <div class="content-header ui-content-header">
        <div class="container">
            <h1 class="content-heading">#<?php echo $_smarty_tpl->tpl_vars['user']->value->id;?>
 [<?php echo $_smarty_tpl->tpl_vars['user']->value->user_name;?>
] 用户购买明细</h1>
        </div>
    </div>
    <div class="container">
        <div class="col-lg-12 col-sm-12">
            <section class="content-inner margin-top-no">

                <form id="main_form">
                    <div class="card">
                        <div class="card-main">
                            <div class="card-inner">

                                <div class="form-group form-group-label control-highlight-custom dropdown">
                                    <label class="floating-label" for="buy_shop">选择套餐</label>
                                    <button id="buy_shop" class="form-control maxwidth-edit" name="buy_shop"
                                            data-toggle="dropdown">
                                        请选择套餐
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="buy_shop">
                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['shops']->value, 'shop');
$_smarty_tpl->tpl_vars['shop']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['shop']->value) {
$_smarty_tpl->tpl_vars['shop']->do_else = false;
?>
                                            <li>
                                                <a href="#" class="dropdown-option" onclick="return false;"
                                                   val="<?php echo $_smarty_tpl->tpl_vars['shop']->value->id;?>
" data="buy_shop"><?php echo $_smarty_tpl->tpl_vars['shop']->value->name;?>
</a>
                                            </li>
                                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                    </ul>
                                </div>

                                <div class="form-group form-group-label control-highlight-custom dropdown">
                                    <label class="floating-label" for="buy_type">类型</label>
                                    <button id="buy_type" class="form-control maxwidth-edit" name="buy_type"
                                            data-toggle="dropdown" value="0">
                                        添加
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="buy_type">
                                        <li>
                                            <a href="#" class="dropdown-option" onclick="return false;" val="0"
                                               data="buy_type">添加</a>
                                        </li>
                                        <li>
                                            <a href="#" class="dropdown-option" onclick="return false;" val="1"
                                               data="buy_type">购买</a>
                                        </li>
                                    </ul>
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
                                            <button id="submit" type="submit" class="btn btn-block btn-brand">添加
                                            </button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </form>

                <div class="card">
                    <div class="card-main">
                        <div class="card-inner">
                            <p>显示表项: <?php $_smarty_tpl->_subTemplateRender('file:table/checkbox.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?></p>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <?php $_smarty_tpl->_subTemplateRender('file:table/table.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
                </div>

                <div aria-hidden="true" class="modal modal-va-middle fade" id="delete_modal" role="dialog"
                     tabindex="-1">
                    <div class="modal-dialog modal-xs">
                        <div class="modal-content">
                            <div class="modal-heading">
                                <a class="modal-close" data-dismiss="modal">×</a>
                                <h2 class="modal-title">确认要删除该条购买记录？</h2>
                            </div>
                            <div class="modal-inner">
                                <p>操作不可逆，请您确认。</p>
                            </div>
                            <div class="modal-footer">
                                <p class="text-right">
                                    <button class="btn btn-flat btn-brand-accent waves-attach waves-effect"
                                            data-dismiss="modal" type="button">取消
                                    </button>
                                    <button class="btn btn-flat btn-brand-accent waves-attach" data-dismiss="modal"
                                            id="delete_input" type="button">确定
                                    </button>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <?php $_smarty_tpl->_subTemplateRender('file:dialog.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

        </div>


    </div>
</main>

<?php $_smarty_tpl->_subTemplateRender('file:admin/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php echo '<script'; ?>
>
    <?php $_smarty_tpl->_subTemplateRender('file:table/js_1.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    window.addEventListener('load', () => {
        <?php $_smarty_tpl->_subTemplateRender('file:table/js_2.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    });

    function delete_modal_show(id) {
        deleteid = id;
        $("#delete_modal").modal();
    }

    $$.getElementById('delete_input').addEventListener('click', delete_id);

    function delete_id() {
        $.ajax({
            type: "DELETE",
            url: "/admin/user/bought",
            dataType: "json",
            data: {
                id: deleteid
            },
            success: data => {
                if (data.ret) {
                    $("#result").modal();
                    $$.getElementById('msg').innerHTML = data.msg;
                    <?php $_smarty_tpl->_subTemplateRender('file:table/js_delete.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
                } else {
                    $("#result").modal();
                    $$.getElementById('msg').innerHTML = data.msg;
                }
            },
            error: jqXHR => {
                $("#result").modal();
                $$.getElementById('msg').innerHTML = `${jqXHR} 发生了错误。`;
            }
        });
    }
<?php echo '</script'; ?>
>


<?php echo '<script'; ?>
>
    $('#main_form').validate({
        submitHandler: () => {
            $.ajax({
                type: "POST",
                url: "bought/buy",
                dataType: "json",
                
                data: {
                    buy_shop: $$getValue('buy_shop'),
                    buy_type: $$getValue('buy_type'),
                    
                },
                success: (data) => {
                    if (data.ret) {
                        $("#result").modal();
                        $$.getElementById('msg').innerHTML = data.msg;
                        
                        window.setTimeout("window.location.reload()", <?php echo $_smarty_tpl->tpl_vars['config']->value['jump_delay'];?>
);
                        
                    } else {
                        $("#result").modal();
                        $$.getElementById('msg').innerHTML = data.msg;
                    }
                },
                error: (jqXHR) => {
                    $("#result").modal();
                    $$.getElementById('msg').innerHTML = `${
                            data.msg
                            } 发生错误了`;
                }
            });
        }
    });
<?php echo '</script'; ?>
>


<?php }
}
