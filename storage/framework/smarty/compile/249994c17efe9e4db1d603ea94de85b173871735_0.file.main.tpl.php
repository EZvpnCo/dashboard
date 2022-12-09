<?php
/* Smarty version 3.1.47, created on 2022-12-03 20:10:24
  from '/www/wwwroot/EZvpn/main-panel/resources/views/metron/admin/main.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.47',
  'unifunc' => 'content_638b3cb055eae8_25130114',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '249994c17efe9e4db1d603ea94de85b173871735' => 
    array (
      0 => '/www/wwwroot/EZvpn/main-panel/resources/views/metron/admin/main.tpl',
      1 => 1670053676,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_638b3cb055eae8_25130114 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="zh-cn">

<head>
    <meta charset="UTF-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no, width=device-width" name="viewport">
    <meta name="theme-color" content="#4285f4">
    <title><?php echo $_smarty_tpl->tpl_vars['config']->value['appName'];?>
</title>


    <!-- css -->
    <link href="/theme/material/css/base.min.css" rel="stylesheet">
    <link href="/theme/material/css/project.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/material-design-lite@1.1.0/dist/material.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/gh/DataTables/DataTables@1.10.19/media/css/dataTables.material.min.css"
          rel="stylesheet">

    <!-- js -->
    <?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/jquery@3.2.1"><?php echo '</script'; ?>
>
    <!-- favicon -->
    <!-- ... -->
    <style>
        body {
            position: relative;
        }

        .table-responsive {
            background: white;
        }

        .dropdown-menu.dropdown-menu-right a {
            color: #212121;
        }

        a[href='#ui_menu'] {
            color: #212121;
        }
    </style>
</head>

<body class="page-brand">
<header class="header header-red header-transparent header-waterfall ui-header">
    <ul class="nav nav-list pull-left">
        <div>
            <a data-toggle="menu" href="#ui_menu">
                <span class="icon icon-lg">menu</span>
            </a>
        </div>
    </ul>

    <ul class="nav nav-list pull-right">
        <div class="dropdown margin-right">
            <a class="dropdown-toggle padding-left-no padding-right-no" data-toggle="dropdown">
                <?php if ($_smarty_tpl->tpl_vars['user']->value->isLogin) {?>
                <span class="access-hide"><?php echo $_smarty_tpl->tpl_vars['user']->value->user_name;?>
</span>
                <span class="avatar avatar-sm"><img src="<?php echo $_smarty_tpl->tpl_vars['user']->value->gravatar;?>
"></span>
            </a>
            <ul class="dropdown-menu dropdown-menu-right">
                <li>
                    <a class="waves-attach" href="/user/"><span class="icon icon-lg margin-right">account_box</span>The user center</a>
                </li>
                <li>
                    <a class="waves-attach" href="/user/logout"><span
                                class="icon icon-lg margin-right">exit_to_app</span>logout</a>
                </li>
            </ul>
            <?php } else { ?>
            <span class="access-hide">Not logged in</span>
            <span class="avatar avatar-sm"><img src="/theme/material/images/users/avatar-001.jpg"></span>
            </a>
            <ul class="dropdown-menu dropdown-menu-right">
                <li>
                    <a class="waves-attach" href="/auth/login"><span
                                class="icon icon-lg margin-right">account_box</span>The login</a>
                </li>
                <li>
                    <a class="waves-attach" href="/auth/register"><span
                                class="icon icon-lg margin-right">pregnant_woman</span>registered</a>
                </li>
            </ul>
            <?php }?>

        </div>
    </ul>
</header>
<nav aria-hidden="true" class="menu menu-left nav-drawer nav-drawer-md" id="ui_menu" tabindex="-1">
    <div class="menu-scroll">
        <div class="menu-content">
            <a class="menu-logo" href="/"><i class="icon icon-lg">person_pin</i>&nbsp;Administration panel</a>
            <ul class="nav">
                <li>
                    <a class="waves-attach" data-toggle="collapse" href="#ui_menu_me">my</a>
                    <ul class="menu-collapse collapse in" id="ui_menu_me">
                        <li><a href="/admin"><i class="icon icon-lg">business_center</i>&nbsp;An overview of the system</a></li>
                        <li><a href="/admin/announcement"><i class="icon icon-lg">announcement</i>&nbsp;Announcement of the management</a></li>
                        <li><a href="/admin/ticket"><i class="icon icon-lg">question_answer</i>&nbsp;Work order management</a></li>
                        <li><a href="/admin/auto"><i class="icon icon-lg">flash_auto</i>&nbsp;Issued an order</a></li>
                    </ul>

                    <a class="waves-attach" data-toggle="collapse" href="#ui_menu_node">node</a>
                    <ul class="menu-collapse collapse in" id="ui_menu_node">
                        <li><a href="/admin/node"><i class="icon icon-lg">router</i>&nbsp;The node list</a></li>
                        <li><a href="/admin/trafficlog"><i class="icon icon-lg">traffic</i>&nbsp;Traffic records</a></li>
                        <li><a href="/admin/block"><i class="icon icon-lg">dialer_sip</i>&nbsp;Has been bannedIP</a></li>
                        <li><a href="/admin/unblock"><i class="icon icon-lg">dialer_sip</i>&nbsp;Has been unsealedIP</a></li>
                    </ul>

                    <a class="waves-attach" data-toggle="collapse" href="#ui_menu_user">The user</a>
                    <ul class="menu-collapse collapse in" id="ui_menu_user">
                        <li><a href="/admin/user"><i class="icon icon-lg">supervisor_account</i>&nbsp;List of users</a></li>
                        <li><a href="/admin/relay"><i class="icon icon-lg">compare_arrows</i>&nbsp;Interim rules</a></li>
                        <li><a href="/admin/invite"><i class="icon icon-lg">loyalty</i>&nbsp;Invitation and rebate</a></li>
                        <li><a href="/admin/subscribe"><i class="icon icon-lg">dialer_sip</i>&nbsp;Subscribe to the record</a></li>
                        <li><a href="/admin/login"><i class="icon icon-lg">text_fields</i>&nbsp;Login record</a></li>
                        <li><a href="/admin/alive"><i class="icon icon-lg">important_devices</i>&nbsp;onlineIP</a></li>
                    </ul>

                    <a class="waves-attach" data-toggle="collapse" href="#ui_menu_agent">The agent</a>
                    <ul class="menu-collapse collapse in" id="ui_menu_agent">
                        <li><a href="/admin/agent/take_log"><i class="icon icon-lg">library_books</i>&nbsp;Withdrawal processing</a></li>
                    </ul>

                    <a class="waves-attach" data-toggle="collapse" href="#ui_menu_document">The document</a>
                    <ul class="menu-collapse collapse in" id="ui_menu_document">
                        <li><a href="/admin/help/document"><i class="icon icon-lg">book</i>&nbsp;Document management</a></li>
                        <li><a href="/admin/help/class"><i class="icon icon-lg">bookmark</i>&nbsp;Classification management</a></li>
                    </ul>

                    <a class="waves-attach" data-toggle="collapse" href="#ui_menu_config">configuration</a>
                    <ul class="menu-collapse collapse in" id="ui_menu_config">
                        <li><a href="/admin/config/telegram"><i class="icon icon-lg">supervisor_account</i>&nbsp;Telegram</a></li>
                        <li><a href="/admin/config/register"><i class="icon icon-lg">supervisor_account</i>&nbsp;User registration</a></li>
                    </ul>

                    <a class="waves-attach" data-toggle="collapse" href="#ui_menu_detect">The audit</a>
                    <ul class="menu-collapse collapse in" id="ui_menu_detect">
                        <li><a href="/admin/detect"><i class="icon icon-lg">account_balance</i>&nbsp;Auditing rules</a></li>
                        <li><a href="/admin/detect/log"><i class="icon icon-lg">assignment_late</i>&nbsp;Audit records</a></li>
                        <li><a href="/admin/detect/ban"><i class="icon icon-lg">text_fields</i>&nbsp;Audit banned</a></li>
                    </ul>


                    <a class="waves-attach" data-toggle="collapse" href="#ui_menu_trade">trading</a>
                    <ul class="menu-collapse collapse in" id="ui_menu_trade">
                        <li><a href="/admin/code">
                                <i class="icon icon-lg">code</i>
                                &nbsp;<?php if ($_smarty_tpl->tpl_vars['config']->value['enable_donate'] === true) {?>Top-up and donation record<?php } else { ?>Prepaid phone records<?php }?></a>
                        </li>
                        <li><a href="/admin/shop"><i class="icon icon-lg">shop</i>&nbsp;goods</a></li>
                        <li><a href="/admin/coupon"><i class="icon icon-lg">card_giftcard</i>&nbsp;Promo code</a></li>
                        <li><a href="/admin/bought"><i class="icon icon-lg">shopping_cart</i>&nbsp;Purchase records</a></li>
                    </ul>
                <li><a href="/user"><i class="icon icon-lg">person</i>&nbsp;The user center</a></li>
            </ul>
        </div>
    </div>
</nav>
<?php }
}
