<?php
// ┌─────────────────────────────────────────────── ──────────────────────────────────────────────────────────────────────────────────────────────────── ───────┐ \\
// │ Metron - SSPanle Theme │ \\
// ├─────────────────────────────────────────────────────────────────────────────────────────────────── ──────────────────────────────────────────────────────────────────────────────────────────────────── ───────┤ \\
// │ Copyright © 2020 (https://t.me/WeChatTeam) │ \\
// └──────────────────────────────────────────────── ──────────────────────────────────────────────────────────────────────────────────────────────────── ───────┘ \\

##### Theme Settings -------------------------------------------- --------------------------------------------------
$_MT['assets_true'] = true; // don't move yet, keep true
$_MT['assets_bb'] = '3.0.2'; // version
$_MT['assets_url']  = $_MT['assets_true'] ? 'https://cdn.jsdelivr.net/gh/mt-theme/metron-assets@' . $_MT['assets_bb'] . '/metron' : '/theme/metron';

$_MT['style_shadow'] = 'rounded-lg shadow'; // card rounded corners: rounded / rounded-lg / rounded-xl ; card shadow: shadow / shadow-lg

##### Landing page settings ------------------------------------------ --------------------------------------------------
$_MT['index_enable'] = false; // true: enable the landing page false: close the landing page and automatically jump to the user center

##### Background image settings ------------------------------------------ --------------------------------------------------
// login/registration page background image
$_MT['index_background_image'] = "/theme/metron/images/bg-2.jpg";
// login/register page LOGO
$_MT['index_background_logo'] = "/assets/public/img/ez-logo-w.png";
// User center top background image
$_MT['user_background_top'] = "/theme/metron/images/bg-01-450.jpg";


##### Important notification pop-up window ----------------------------------------- -------------------------------------------------- -
$_MT['domain_info'] = true; // When the address of the user accessing the website is not set by config, prompt the user to go to the config address
$_MT['domain_time'] = 15; // How long will it take to prompt after the pop-up (unit: minute)

$_MT['enable_pop'] = false; // Enable the important notification pop-up window in the lower right corner
$_MT['pop_time'] = 1440; // How long is the interval between each pop-up (unit: minute)

/** popup window content
 * [ bold font-weight-bold gray text-muted purple text-primary blue text-info green text-success orange text-warning red text-danger ]
 * [ left : text-left middle : text-center right : text-right ];
 **/
$_MT['pop_text'] = '
<p class="text-danger font-weight-bold">How to prevent the website from being polluted and unable to open? </p>
<p class="text-muted font-weight-bold">
Favorite URL <a href="https://url.com" target="_blank">https://url.com</a> (If you are stuck on the English interface and cannot enter, please turn off the webpage translation function and try again ), click the first icon to enter the latest website, and if there is a change of domain name in the future, the link here will be updated first<br>
</p>
';

##### Sign in Settings ------------------------------------------- --------------------------------------------------
$_MT['daily_bonus_mode'] = 'level'; // sign-in mode, sspanel: the original mode, level: different levels for different sign-in traffic
$_MT['daily_bonus_settings'] = [ // Give different sign-in traffic for different levels, only take effect when daily_bonus_mode is level
    0 => [ // user level
        'min' => 0, // minimum flow rate in MB
        'max' => 999 // the maximum flow rate in MB
    ],
    1 => [
        'min' => 100,
        'max' => 999
    ],
    2 => [
        'min' => 100,
        'max' => 1024
    ],
    3 => [
        'min' => 100,
        'max' => 1024
    ],
];
##### Rebate Settings ------------------------------------------- --------------------------------------------------
$_MT['c_rebate'] = false; // true: By default, all users are rebate rebates, false: Except for individual users who are set to rebate, other users will only get the first recharge amount of the invited user
$_MT['invite_user'] = false; // user can view all the users he invited
$_MT['invite_user_for'] = false; // Only users who are set as rebate rebates can view all the users they invite (only when the above option is enabled)

$_MT['take_back_total'] = 1; // The amount to apply for transfer and withdrawal must be greater than the amount, 0 means no limit
$_MT['agent_menu_enable'] = true; // The menu displays the agent center (the agent center requires additional Agent authorization, which cannot be used without purchase);
$_MT['take_cash_enable'] = false; // Non-agents (invitation registration page) are allowed to apply for cash withdrawal, the subject needs to have Agent authorization, if there is no authorization, keep it closed, and the default is to withdraw cash to the wallet balance
$_MT['take_account_type'] = ['Alipay', 'USDT-ERC20', 'USDT-TRC20']; // Allow the user to set the account type when setting the withdrawal account, which can be added in an array, just for the convenience of management and identification Withdrawal account type has no other function

##### Membership level name ------------------------------------------ --------------------------------------------------
$_MT['user_level'] = [ // level => corresponding name display
    -1 => 'NotActive',
    0 => 'Free membership',
    1 => 'Bronze',
    2 => 'Silver',
    3 => 'Diamond',
];
##### User Registration ------------------------------------------- --------------------------------------------------
$_MT['register_code'] = false; // true: the invitation code is required for registration, false: the invitation code is optional (admin panel - user registration - change the registration mode to invite)
$_MT['register_restricted_email'] = true; // When set to true, you must use the specified email suffix when registering;
$_MT['list_of_available_mailboxes'] = ['@ezvpn.co', '@gmail.com', '@outlook.com', '@yahoo.com',]; // The mailbox suffix that can be used for registered mailboxes, only takes effect when the above is set to true;
$_MT['disable_mailbox_list'] = [
    '@bcaoo.com', '@chacuo.net', '@tmpmail.net', '@tmail.ws', '@tmpmail.org', '@moimoi.re', '@bccto.me', ' @027168.com', '@disbox.org', '@linshiyouxiang.net', '@t.odmail.cn', '@tmails.net', '@moakt.co', '@moakt.ws', '@disbox.net', '@bareed.ws',
]; // Email suffixes that are prohibited from being used in registered email addresses;

# ┌────────────────────────────────────────────────────────────────────────────────────────── ──────────────────────────────────────────────────────────────────────────────────────────────────── ─────────┐
# │ Customer Service System Settings │
# └──────────────────────────────────────────────── ──────────────────────────────────────────────────────────────────────────────────────────────────── ─────────┘
$_MT['enable_cust'] = 'crisp'; // which customer service system to use none: off Currently supported: crisp | chatra
$_MT['enable_cust_auth'] = true; // Display customer service on the login and registration page

#crisp | https://crisp.chat
$_MT['crisp_id'] = 'bd98e62f-4c1b-45fb-9507-a900d0382a6b'; // Crisp's website ID, format like '18b46e92-eb21-76d3-bfb7-8f2ae9adba64'

#chatra | https://chatra.io
$_MT['chatra_id'] = ''; // Chatra's ChatraID can be found in the website code provided by Chatra


# ┌────────────────────────────────────────────────────────────────────────────────────────── ──────────────────────────────────────────────────────────────────────────────────────────────────── ─────────┐
# │ Page Content Settings │
# └──────────────────────────────────────────────── ──────────────────────────────────────────────────────────────────────────────────────────────────── ─────────┘
# Node transit rules
$_MT['node_relay_enable'] = false; // Navigation menu display node relay setting
# Restricted region access
$_MT['Restricted_access'] = false; // Enable access to websites in restricted areas
$_MT['Restricted_area'] = [ // array, restricted areas
    'Beijing', 'Tianjin', 'Hebei', 'Shanxi', 'Inner Mongolia', 'Liaoning', 'Jilin', 'Heilongjiang', 'Shanghai', 'Jiangsu', 'Zhejiang', 'Anhui', 'Fujian\'', 'Jiangxi', 'Shandong', 'Henan',
    'Hubei', 'Hunan', 'Guangdong', 'Guangxi', 'Hainan', 'Chongqing', 'Sichuan', 'Guizhou', 'Yunnan', 'Tibet', 'Shaanxi', 'Gansu', 'Qinghai\'', 'Ningxia', 'Xinjiang',
];
$_MT['Restricted_parm'] = ['/mod_mu', '/payment', '/link', '/api', '/getClient', '/appApi']; // Array, exclude the specified path without restriction
# User profile page ---------------------------------------------- --------------------------------------------------
$_MT['change_username'] = true; // Allow user to modify nickname
$_MT['change_usermail'] = true; // Allow the user to modify the mailbox (enable the registration verification code, the verification code is also required when modifying, otherwise the verification code is not required for modification)
# help documentation page
$_MT['help_Keywords'] = ['Download', 'Package', 'SSR',]; // The document center recommends the default keywords for users to search
# Node subscription filter
$_MT['nodes_filter'] = false; // enable subscription node filtering
$_MT['nodes_miniName'] = false; // Allow users to enable node regular matching to simplify node names, enabling this option requires familiarity with regular expressions
$_MT['nodes_regex'] = '/\[(.*?)\]/'; // Regular expression for node name shortening in node filter settings, characters in [ ] will be removed by default
# Which subscriptions are displayed in the subscription box on the home page Optional: ssr, v2ray, surge, clash, surfboard, kitsunebi, shadowrocket, quantumult, quantumultx,
$_MT['index_sub'] = [
    'ssr',
    'v2ray',
    'surge',
    'clash',
    'surfboard',
    'kitsunebi',
    'quantumult',
    'quantumultx',
    'shadowrocket',
    'stash'
];
# share account
$_MT['shared_account_enable'] = false; // show shared account navigation menu
$_MT['shared_account'] = [
    'AppleID' => [ // The type of shared account, do not change this character
        'show' => true, // Whether to display this type of shared account
        # Start:: an account An array(), for an account, can be copied and added
        array(
            'name' => 'Apple ID 1', // name
            'account' => 'test', // account
            'passwd' => '123456', // password
            'class' => 1, // users greater than or equal to this class are visible
            'check' => true, // enable checking account status
            'hidepawd' => false, // hide the password only for the user to copy, to prevent the user from manually entering the wrong password and causing the account to be frequently locked
        ),
        # end:: an account
    ],
    'Netflix' => [
        'show' => false,
        array(
            'name' => 'Netflix 1',
            'account' => '111111@qq.com',
            'passwd' => '123456',
            'class' => 1
        ),
    ],
    'HBO' => [
        'show' => false,
        array(
            'name' => 'HBO 1',
            'account' => '111111@qq.com',
            'passwd' => '123456',
            'class' => 2
        ),
    ],
    'Hulu' => [
        'show' => false,
        array(
            'name' => 'HBO 1',
            'account' => '111111@qq.com',
            'passwd' => '123456',
            'class' => 1
        ),
    ],
];
# ┌────────────────────────────────────────────────────────────────────────────────────────── ──────────────────────────────────────────────────────────────────────────────────────────────────── ─────────┐
# │ Payment System Settings │
# └──────────────────────────────────────────────── ──────────────────────────────────────────────────────────────────────────────────────────────────── ─────────┘
# Which payment method to use needs to set parameters in Config
# Currently supported payment methods: please set to none if not used
#Payment method followed by _qr means to use the QR code method in the site, you can pay without leaving the website, _url means to jump to the payment link for payment, and if you don’t include it, the original payment method will be used by default
# Alipay: codepay |stripe | paytaro | wolfpay_ur | wolfpay_qr | yftpay | epay | f2fpay | pcexpay
# WeChat : codepay | stripe | paytaro | wolfpay_ur | payjs
# QQ wallet: codepay |

$_MT['pay_alipay'] = 'none'; // Alipay default
$_MT['pay_alipay_2'] = 'none'; // Alipay 2
$_MT['pay_alipay_3'] = 'none'; // Alipay 3
$_MT['max_alipay_num'] = 0; // When using Alipay to pay, the amount is greater than or equal to the set value, use the payment method below (set 0 to not use)
$_MT['max_alipay_pay'] = 'none'; // When the payment amount is greater than the value set above, use this payment method

$_MT['pay_wxpay'] = 'none'; // WeChat default
$_MT['pay_wxpay_2'] = 'none'; // WeChat 2
$_MT['pay_wxpay_3'] = 'none'; // WeChat 3
$_MT['max_wxpay_num'] = 0; // When using WeChat payment, the amount is greater than or equal to the set value, use the payment method below (set 0 to not use)
$_MT['max_wxpay_pay'] = 'none'; // When the payment amount is greater than the value set above, use this payment method

$_MT['pay_qqpay'] = 'none'; // QQ wallet default
$_MT['max_qqpay_num'] = 0; // When using WeChat payment, the amount is greater than or equal to the set value, use the payment method below
$_MT['max_qqpay_pay'] = 'none'; // When the payment amount is greater than the value set above, use this payment method

$_MT['pay_crypto'] = 'bobpay'; // digital currency payment

$_MT['mix_amount'] = 0; // Limit the minimum recharge each time, store purchase packages are not subject to this limit. (Because a very low amount may appear after the store deducts the balance)

# ┌────────────────────────────────────────────────────────────────────────────────────────── ──────────────────────────────────────────────────────────────────────────────────────────────────── ─────────┐
# │ Shop Package Settings │
# └──────────────────────────────────────────────── ──────────────────────────────────────────────────────────────────────────────────────────────────── ─────────┘
# Calculation method of conversion amount time : Calculated according to how long the package has been used, flow : Calculated according to the comparison between the user's current traffic and the package traffic, auto : Automatically calculate the package usage time and traffic, and calculate according to the percentage of the largest usage of the two
# Flow package is only calculated according to flow and can only be refunded on the day of purchase
$_MT['shop_conversion_mode'] = 'auto';
$_MT['shop_conversion'] = false; // Allow package conversion to return the balance
$_MT['shop_formalities'] = 2; // The handling fee is deducted when the package is converted (unit: percentage, 0 means no handling fee) It is not recommended to be too high to avoid being scolded

$_MT['advanceResetFlow'] = false; // advance reset flow
$_MT['resetFlow_maxValue'] = 5; // When the user flow is lower than the number (GB), the reset is allowed, -1 means no limit

$_MT['shop_pop_enable'] = true; // Display information on the top of the store package, which can be used to display promotions, offers, etc. to users
$_MT['shop_pop_info'] = '
<p>Available packages </p>
'; // The content displayed at the top of the package is written in html

$_MT['shop_activity_true'] = false; //Whether to display activity packages
$_MT['shop_activity_name'] = 'Limited Activity'; //Activity package product name
$_MT['shop_activity_text'] = 'Purchase package for a limited time, no waiting after expiration'; //Activity package product description
$_MT['shop_activity_id'] = 1; //activity package product id
$_MT['shop_activity_buy_time'] = '2020/03/15 00:00:00'; //The activity ends at the purchase time, and the package will be automatically hidden after the time

$_MT['shop_Experience_true'] = true; // Whether to display trial packages
$_MT['shop_Experience_pos'] = 'top'; // trial package card position top : put in front of the regular package, bottom : put behind the regular package
$_MT['shop_Experience_plan'] = [
    'Trial A' => 1, // One trial package ID per line, can be added or deleted, recommended between 1-4
    'Trial B' => 2,
    'Try C' => 3,
];

/**
 * Only need to fill in the name of the product, the product ID corresponding to the duration,
 * The support features of the product are directly edited in the [Service Support] of the package, and the format is true-global node distribution; false-fast customer service response minus sign on the left true: means support false: means not supported The right side is text, with English semicolons; separated
 */
$_MT['shop_plan'] = array(
    'Bronze' => array(
        'Description' => array(
            '1 Month' => 1,
            '3 Month' => 2,
            '6 Month' => 3,
        ),
    ),
    'Silver' => array(
        'Description' => array(
            '1 Month' => 4,
            '3 Month' => 5,
            '6 Month' => 6,
        ),
    ),
    'Golden' => array(
        'Description' => array(
            '1 Month' => 7,
            '3 Month' => 8,
            '6 Month' => 9,
        ),
    ),
    'Diamond' => array(
        'Description' => array(
            '1 Month' => 7,
            '3 Month' => 8,
            '6 Month' => 9,
        ),
    ),
);


# ┌────────────────────────────────────────────────────────────────────────────────────────── ──────────────────────────────────────────────────────────────────────────────────────────────────── ─────────┐
# │ Node related settings │
# └──────────────────────────────────────────────── ──────────────────────────────────────────────────────────────────────────────────────────────────── ─────────┘
$_MT['enable_webapi_email_hash'] = true; // When the node webapi is connected, the email address is md5 encrypted
$_MT['enable_node_traffic_rate'] = true; // Whether to display the traffic rate of the node
$_MT['enable_online_user'] = true; // Whether to display the online number of nodes
$_MT['enable_node_load'] = true; // Whether to display the load of the node
$_MT['node_flag_mode'] = 'name'; // name: regular matching region of the slave node name (the regular method is in the flag option of . A node with a status of us displays the American flag. us This is the national ISO 3166 code, Google it if you don’t understand it.
$_MT['node_class_name'] = [ // The name corresponding to the class of the node
    0 => 'Public',
    1 => 'Bronze',
    2 => 'Silver',
    3 => 'Golden',
    4 => 'Diamond',
];
# ┌────────────────────────────────────────────────────────────────────────────────────────── ──────────────────────────────────────────────────────────────────────────────────────────────────── ─────────┐
# │ TG robot settings │
# └──────────────────────────────────────────────── ──────────────────────────────────────────────────────────────────────────────────────────────────── ─────────┘
# Telegram private message to admin
$_MT['Telegram_Admin'] = [115025624]; // administrator ID (only these administrators can receive TG notifications)
$_MT['Telegram_Ticket'] = true; // Turn on the TG notification of the ticket
$_MT['Telegram_Payment'] = true; // User recharge reminder

# ┌────────────────────────────────────────────────────────────────────────────────────────── ──────────────────────────────────────────────────────────────────────────────────────────────────── ─────────┐
# │ Tutorial Settings │
# └──────────────────────────────────────────────── ──────────────────────────────────────────────────────────────────────────────────────────────────── ─────────┘
# Explanation: The file of the installation tutorial is under the theme directory user/tutorial, and the folders in this directory correspond to the first-level classification of the document center (remove spaces, and are case-sensitive)
# The name of the tpl file under each folder corresponds to the secondary classification of the document center (remove spaces, and is case-sensitive).
# If the directory name or file name is incorrect, the download tutorial link will not be displayed in the document center, and the download tutorial link on the home page will also 404
# The options set here control the display of the home page, and the client download link controls the client download of the tutorial page

/**
 * Windows Client ---------------------------------------------- ----------------------------------------------
 */
$_MT['client_windows'] = [
    // 'clash' => array( // An array is a client, which can be added or deleted by itself
    // 'name' => 'Bob Accelerator', // client name
    // 'img' => 'https://img-youpai.weixiaoi.com/tu/2021/0406/1617693954210406.png', // icon, use png transparent file
    // 'url' => '/user/tutorial?os=Windows&client=Clash', // URL address of the installation tutorial
    // 'down' => 'https://www.google.com', // client download address in the tutorial page
    // 'vs' => 'v3.2.4', // version number
    // ),
];

/**
 * Android client ----------------------------------------------- ----------------------------------------------
 */
$_MT['client_android'] = [
    // 'clash' => array(
    // 'name' => 'Bob Accelerator',
    // 'img' => 'https://img-youpai.weixiaoi.com/tu/2021/0406/1617693954210406.png',
    // 'url' => '/user/tutorial?os=Android&client=Clash',
    // 'down' => 'https://www.google.com',
    // 'vs' => 'v2.0.0',
    // ),
];


/**
 * Apple Mac client --------------------------------------------- -----------------------------------------------
 */
$_MT['client_macos'] = [
    // 'clash' => array(
    // 'name' => 'Bob Accelerator',
    // 'img' => 'https://img-youpai.weixiaoi.com/tu/2021/0406/1617693954210406.png',
    // 'url' => '/user/tutorial?os=MacOS&client=Clash',
    // 'down' => 'https://www.google.com',
    // 'vs' => 'v3.2.4',
    // ),
];

/**
 * Apple iOS client --------------------------------------------- -----------------------------------------------
 */
$_MT['client_ios'] = [
    // 'Shadowrocket' => array(
    // 'name' => 'Shadowrocket',
    // 'img' => $_MT['assets_url'].'/media/client-logos/shadowrocket-ico.png',
    // 'url' => '/user/tutorial?os=iOS&client=Shadowrocket',
    // 'vs' => 'v0.10.0',
    // ),
    // 'Quantumult' => array(
    // 'name' => 'Quantumult',
    // 'img' => $_MT['assets_url'].'/media/client-logos/quantumult-ico.png',
    // 'url' => '/user/tutorial?os=iOS&client=Quantumult',
    // 'vs' => 'v1.1.0.1',
    // ),
];
# Tutorial page sharing account
$_MT['ios_class'] = 2; //How many levels of iOS accounts are visible (included)
$_MT['ios_account'] = ''; //iOS account
$_MT['ios_password'] = ''; //iOS password

# ┌────────────────────────────────────────────────────────────────────────────────────────── ──────────────────────────────────────────────────────────────────────────────────────────────────── ─────────┐
# │ Task Scheduler Settings │
# └──────────────────────────────────────────────── ──────────────────────────────────────────────────────────────────────────────────────────────────── ─────────┘
# User package traffic reset mode sspanel: original mode metron: user level has not expired (greater than 0), reset traffic according to the effective package of the user
# Note when using 'metron' mode:
# 1. Pagoda panel - website - PHP command line version needs to be modified to a version that loads the metron.so extension
# 2. You need to execute php xcat MetronTask changebought in the website directory to set the user's last package as a valid package (only need to be executed once)
# Because the last package purchased by the user is set to be valid, if the last purchase of the user may be a traffic package, it will cause subsequent users not to reset the traffic
# After execution, a change log will be generated under the website directory/storage. Please check the log to see if there is a user whose effective package is a traffic package. If so, please manually modify the usedd field of the bought table to be effective for the package to 1
$_MT['auto_reset_mode'] = 'sspanel';

# Automatically close tickets
$_MT['auto_close_ticket'] = true; // Automatically close tickets that the user has not responded to
$_MT['close_ticket_time'] = 3; // How long (days) the user has not responded to the ticket to automatically close
$_MT['del_user_ticket'] = true; // Clean up the ticket that the user does not exist

# Node displays streaming media detection results
$_MT['show_stream_media'] = true;
// Streaming media unlocking The following settings will enable nodes 397 and 297 to reuse the detection results of node 4 and remove the comment when using //
$_MT['streaming_media_unlock_multiplexing'] = [
    //'397' => '4',
    //'297' => '4',
];
