<?php

//Do not use English square brackets, semicolons, and single quotes in comments, otherwise errors will occur when migrating Config

//config migration note (the developer should fill in the points that need to be paid attention to after this config migration, and the webmaster should not move)
//If you need to change the line, just change the line directly without a line break
//[Add/Delete] config does not need to write migration notes
$_ENV['config_migrate_notice'] =
    'enable_geetest_* changed to enable_*_captcha
crisp has been replaced by mylivechat
telegrma_qrcode was renamed to qrcode
';
$_ENV['version'] = 2;


//basic settings--------------------------------------------------------------------------------------------
$_ENV['key'] = '1145141919810';                //!!! Blind jb modify this key to a random string to ensure website security !!!
$_ENV['debug'] = false;                          //Please make sure it is false in the official environment
$_ENV['appName'] = 'EZvpn Dashboard';                      //Site name
$_ENV['baseUrl'] = 'https://dashboard.ezvpn.co';               //site address
$_ENV['muKey'] = 'igU6fyUmkneTRbRgQ1Kw';               //It is used to verify the magic modification backend request, which can be modified at will, but please keep the front and back ends consistent, otherwise the node will not work!

//Add Theme Homepage
$_ENV['metron_index']    = 'index';  //index:metron native index_malio:Mario index_zhujike:main case index_cool:cool theme index_jdy:Wukong theme

//database settings--------------------------------------------------------------------------------------------
$_ENV['db_driver'] = 'mysql';
$_ENV['db_host'] = '';
$_ENV['db_socket'] = '';
$_ENV['db_database'] = 'ezvpn_panel';
$_ENV['db_username'] = 'ezvpn_panel';
$_ENV['db_password'] = 'BFadSaFNpefXh75b';

$_ENV['db_charset'] = 'utf8';
$_ENV['db_collation'] = 'utf8_general_ci';
$_ENV['db_prefix'] = '';


// E-Mail settings--------------------------------------------------------------------------------------------
$_ENV['mailDriver'] = 'smtp';      //none / mailgun / smtp / sendgrid / aliyunweb
$_ENV['sendPageLimit'] = 50;
$_ENV['email_queue']     = true;

# mailgun
$_ENV['mailgun_key'] = '';
$_ENV['mailgun_domain'] = '';
$_ENV['mailgun_sender'] = '';

# smtp
$_ENV['smtp_host'] = 'mail.ezvpn.co';
$_ENV['smtp_username'] = 'no-reply@ezvpn.co';
$_ENV['smtp_password'] = '12345678RaF';
$_ENV['smtp_port'] = 25;
$_ENV['smtp_name'] = 'EZvpn';
$_ENV['smtp_sender'] = 'no-reply@ezvpn.co';
$_ENV['smtp_ssl'] = true;
$_ENV['smtp_reply_to'] = $_ENV['smtp_username'];
$_ENV['smtp_reply_to_name'] = $_ENV['smtp_sender'];

# sendgrid
$_ENV['sendgrid_key'] = '';
$_ENV['sendgrid_sender'] = '';
$_ENV['sendgrid_name'] = '';

# Ali cloud mail push WEB API
# Aliyun api sending parameters and domain name viewing address https://help.aliyun.com/document_detail/96856.html
$_ENV['aliyun_accessKey'] = '';
$_ENV['aliyun_accessSecret'] = '';
$_ENV['aliyun_endpointName'] = '';
$_ENV['aliyun_RegionId'] = '';
$_ENV['aliyun_Host'] = '';
$_ENV['aliyun_Version'] = '';
$_ENV['aliyun_AccountName'] = '';
$_ENV['aliyun_FromAlias'] = '';
$_ENV['aliyun_TagName'] = '';
$_ENV['aliyun_ReplyToAddress'] = true;

// Backup settings--------------------------------------------------------------------------------------------
$_ENV['auto_backup_email'] = '';                               //Mailbox to receive backups
$_ENV['auto_backup_password'] = '';                               //Compression password for backup
$_ENV['backup_notify'] = false;                            //Backup notification to TG group


//User Registration Settings-----------------------------------------------------------------------------------------
$_ENV['reg_auto_reset_day'] = 0;                         //The traffic reset date when registering, 0 means no reset
$_ENV['reg_auto_reset_bandwidth'] = 0;                         //The traffic that needs to be reset, 0 means no reset
$_ENV['random_group'] = '0';                       //Random grouping during registration, groups randomly assigned during registration, please separate multiple groups with English half-width commas

$_ENV['reg_forbidden_ip'] = '127.0.0.0/8,::1/128';     //When registering, access to the IP list is prohibited by default, separated by half-width English commas
$_ENV['min_port'] = 10000;                     //The minimum value of the user port pool, if the value is 0, the user will not be assigned a multi-user port when registering, suitable for pure V2Ray/Trojan airports
$_ENV['max_port'] = 65535;                     //The maximum value of the user port pool, if the value is 0, the user will not be assigned a multi-user port when registering, suitable for pure V2Ray/Trojan airports
$_ENV['reg_forbidden_port'] = '';                        //When registering, access to the port list is prohibited by default, separated by half-width English commas, and port segments are supported

$_ENV['mu_suffix'] = 'microsoft.com';           //Single-port multi-user confusion parameter suffix, can be modified at will, but please keep the front and back end consistent
$_ENV['mu_regex'] = '%5m%id.%suffix';          //Single-port multi-user confusion parameter expression, %5m represents the first five digits of the user feature md5, %id represents the user id, and %suffix represents the above suffix.

#invite link
$_ENV['invite_price'] = -1;                        //The price required by the user to purchase the invitation code. When the price is less than 0, it is considered not open for purchase
$_ENV['custom_invite_price'] = -1;                        //The price required by the user to customize the invitation code. When the price is less than 0, it is considered not open for purchase


//Registered user settings--------------------------------------------- ------------------------------------------
#Base
$_ENV['checkinMin'] = 1; //User check-in minimum traffic unit MB
$_ENV['checkinMax'] = 50; //User check-in maximum traffic

$_ENV['auto_clean_uncheck_days'] = -1; //How many days of automatic cleaning of level 0 users who have not checked in, when less than or equal to 0, close
$_ENV['auto_clean_unused_days'] = -1; //How many days of unused level 0 users are automatically cleaned up, closed when less than or equal to 0
$_ENV['auto_clean_min_money'] = 1; //Level 0 users whose balance is lower than the amount can be cleaned

$_ENV['code_payback'] = 10; //Recharge rebate percentage
$_ENV['invite_gift'] = 0; // Invite new users to get traffic rewards, unit G

$_ENV['enable_bought_reset'] = true; //Whether to reset traffic when buying
$_ENV['enable_bought_extend'] = true; // Whether to extend the level period when purchasing (same level package)

$_ENV['port_price'] = -1; //The price required for the user to randomly reset the port, if the price is less than 0, it is considered not open for purchase
$_ENV['port_price_specify'] = -1; //The user specifies the price required by the designated port, and when the price is less than 0, it is considered not open for purchase

#advanced
$_ENV['class_expire_reset_traffic'] = 0; //Reset traffic value when class expires, unit GB, no reset when less than 0
$_ENV['account_expire_delete_days'] = -1; //The account will be deleted after a few days after the account expires, if it is less than 0, it will not be deleted

$_ENV['enable_kill'] = true; //Whether to allow users to log out of accounts

#Email reminder for insufficient user data allowance
$_ENV['notify_limit_mode'] = false; //false is closed, per is reminded by percentage, mb is reminded by fixed remaining traffic
$_ENV['notify_limit_value'] = 20; //When the previous item is per, fill in the percentage here; when the previous item is mb, fill in the traffic here


// Subscription settings ------------------------------------------- -----------------------------------------
$_ENV['Subscribe'] = true; //Whether this site provides subscription function
$_ENV['subUrl'] = 'https://subscription.ezvpn.co' . '/token/'; //Subscription address, if it needs to be the same as the site name, please do not modify
$_ENV['mergeSub'] = true; //merge subscription settings optional false / true
$_ENV['enable_sub_extend'] = true; // Whether to enable the default display of traffic remaining, account expiration time and information in sub_message in the subscription

// Marketing information in the subscription
// Using an array form, it will be added at the top of the subscription list
// It can be used to push information such as the latest address for the user, as short as possible and the number should not be too much
$_ENV['sub_message'] = [];
$_ENV['disable_sub_mu_port'] = true; // Remove the single port information in the subscription
$_ENV['subscribeLog'] = true; //Whether to record user subscription log
$_ENV['subscribeLog_show'] = true; //Whether to allow users to view subscription records
$_ENV['subscribeLog_keep_days'] = 7; //Subscribe log retention days
$_ENV['mu_port_migration'] = true; // Send the offset port directly for the backend
$_ENV['add_emoji_to_node_name'] = true; //Add emoji to some subscriptions by default
$_ENV['add_appName_to_ss_uri'] = true; //Add site name to SS node name
$_ENV['subscribe_client'] = true; //Download the protocol client with node and subscription information
$_ENV['subscribe_client_url'] = ''; //Use an independent server to provide protocol client download with node and subscription information, empty means not used
$_ENV['Clash_DefaultProfiles'] = 'default'; //Clash default profile
$_ENV['Surge_DefaultProfiles'] = 'default'; //Surge default profile
$_ENV['Surge2_DefaultProfiles'] = 'default'; //Surge2 default profile
$_ENV['Surfboard_DefaultProfiles'] = 'default'; //Surfboard default profile


//Audit automatic ban settings ------------------------------------------ ------------------------------------------------
$_ENV['enable_auto_detect_ban'] = false; // Audit auto-ban switch
$_ENV['auto_detect_ban_numProcess'] = 300; // The number of audit records processed in a single scheduled task
$_ENV['auto_detect_ban_allow_admin'] = true; // Admins are not subject to audit restrictions
$_ENV['auto_detect_ban_allow_users'] = []; // Audit ban exception user IDs

// Audit ban judgment type:
// - 1 = merciful mode, ban every touch
// - 2 = Crazy mode, the cumulative number of touches will be banned for different durations according to the ladder
$_ENV['auto_detect_ban_type'] = 1;
$_ENV['auto_detect_ban_number'] = 30; // The number of triggers required for each ban in benevolent mode
$_ENV['auto_detect_ban_time'] = 60; // The duration of each ban in mercy mode (minutes)

// crazy mode ladder
// key is the number of triggers
// - type: optional time delete numbers by time or kill
// - time: time in minutes
$_ENV['auto_detect_ban'] = [
    100 => [
        'type' => 'time',
        'time' => 120
    ],
    300 => [
        'type' => 'time',
        'time' => 720
    ],
    600 => [
        'type' => 'time',
        'time' => 4320
    ],
    1000 => [
        'type' => 'kill',
        'time' => 0
    ]
];


//Bot settings ---------------------------------------------- ----------------------------------------------
#Telegram BOT
$_ENV['enable_telegram'] = true; //Whether to enable Telegram bot
$_ENV['use_new_telegram_bot'] = true; //Whether to use the new Telegram Bot
$_ENV['telegram_token'] = '5536109489:AAH1UbJW3eNm-1ost5z8V48nz4OCyalPN2A'; //Telegram bot, bot token, apply with father bot
$_ENV['telegram_chatid'] = '-826815901'; //Telegram bot, group session ID, you can get it by pulling the robot into the group and /ping him
$_ENV['telegram_bot'] = 'EZvpn_co_bot'; //Telegram bot account
$_ENV['telegram_group_quiet'] = false; //Telegram bot does not respond in groups
$_ENV['telegram_request_token'] = ''; //The Telegram robot requests the Key, which can be set at will, consisting of uppercase and lowercase English and numbers. After updating this parameter, please use php xcat Tool setTelegram

# General
$_ENV['finance_public'] = true; //Whether the financial report is open to the group
$_ENV['enable_welcome_message'] = true; //The robot sends a welcome message

# Turing
$_ENV['enable_tuling'] = false; //Whether to enable Turing robot
$_ENV['tuling_apikey'] = ''; // Turing robot API Key
$_ENV['tuling_apisecert'] = ''; // Turing robot key

# Telegram BOT Other options
$_ENV['allow_to_join_new_groups'] = true; //Allow Bot to join groups other than the configuration below
$_ENV['group_id_allowed_to_join'] = []; //Allowed to join group ID, the format is PHP array
$_ENV['telegram_admins'] = [115025624]; //Additional Telegram admin IDs in PHP array format
$_ENV['enable_not_admin_reply'] = true; //Whether the non-administrator operation administrator function should reply
$_ENV['not_admin_reply_msg'] = '!'; //Reply content of non-administrator operation administrator function
$_ENV['no_user_found'] = '!'; // When the administrator operates, the user's reply cannot be found
$_ENV['no_search_value_provided'] = '!'; // When the administrator operates, there is no reply to the user's search value
$_ENV['data_method_not_found'] = '!'; // When the administrator operates, the field to modify the data is not found.
$_ENV['delete_message_time'] = 180; //Delete bot responses triggered by user commands after the following time, unit: second, the deletion time may vary due to scheduled tasks, 0 means this function is not enabled
$_ENV['delete_admin_message_time'] = 86400; //Delete the bot reply triggered by the management command after the following time, unit: second, the deletion time may be different due to the scheduled task, 0 means this function is not enabled
$_ENV['enable_delete_user_cmd'] = false; //Automatically delete commands sent by users in the group, use the time configured by delete_message_time, the deletion time may vary due to scheduled tasks
$_ENV['help_any_command'] = false; //Allow any unknown command to trigger /help reply

$_ENV['remark_user_search_email'] = ['email']; //The alias of the user search field email, can be multiple, the format is a PHP array
$_ENV['remark_user_search_port'] = ['port']; //The alias of the user search field port, can be multiple, the format is a PHP array

$_ENV['remark_user_option_is_admin'] = ['administrator']; //The alias of the user search field is_admin, can be multiple, the format is a PHP array
$_ENV['remark_user_option_enable'] = ['user enable']; //The alias of the user search field enable, can be multiple, the format is a PHP array
$_ENV['remark_user_option_money'] = ['money', 'balance']; //The alias of the user search field money, can be multiple, the format is a PHP array
$_ENV['remark_user_option_port'] = ['port']; //The alias of the user search field port, can be multiple, the format is a PHP array
$_ENV['remark_user_option_transfer_enable'] = ['traffic']; //The alias of the user search field transfer_enable, can be multiple, the format is a PHP array
$_ENV['remark_user_option_passwd'] = ['connection password']; //The alias of the user search field passwd, can be multiple, the format is a PHP array
$_ENV['remark_user_option_method'] = ['encryption']; //The alias of the user search field method can be multiple, the format is a PHP array
$_ENV['remark_user_option_protocol'] = ['protocol']; //The alias of the user search field protocol, can be multiple, the format is a PHP array
$_ENV['remark_user_option_protocol_param'] = ['co-parameter', 'protocol parameter']; //alias of the user search field protocol_param, can be multiple, the format is a PHP array
$_ENV['remark_user_option_obfs'] = ['confuse']; //The alias of the user search field obfs, can be multiple, the format is a PHP array
$_ENV['remark_user_option_obfs_param'] = ['mixed parameter', 'obfuscated parameter']; //The alias of the user search field obfs_param can be multiple, the format is a PHP array
$_ENV['remark_user_option_invite_num'] = ['Number of invites']; //The alias of the user search field invite_num, can be multiple, the format is a PHP array
$_ENV['remark_user_option_node_group'] = ['user group', 'user group']; //The alias of the user search field node_group can be multiple, the format is a PHP array
$_ENV['remark_user_option_class'] = ['level']; //The alias of the user search field class, can be multiple, the format is a PHP array
$_ENV['remark_user_option_class_expire'] = ['level expiration time']; //The alias of the user search field class_expire can be multiple, the format is a PHP array
$_ENV['remark_user_option_expire_in'] = ['account expiration time']; //The alias of the user search field expire_in, can be multiple, the format is a PHP array
$_ENV['remark_user_option_node_speedlimit'] = ['speed limit']; //The alias of the user search field node_speedlimit, can be multiple, the format is a PHP array
$_ENV['remark_user_option_node_connector'] = ['connections', 'client']; //The alias of the user search field node_connector can be multiple, the format is a PHP array

$_ENV['enable_user_email_group_show'] = false; //Open to display the user's full email address when searching for user information in the group, and turn it off to code the middle content of the email address, such as g****@gmail.com
$_ENV['user_not_bind_reply'] = 'You have not bound the account of this site, you can enter the **data editing** of the website and bind your account at the bottom right.'; //The reply of the unbound account
$_ENV['telegram_general_pricing'] = 'Product introduction.'; //Product introduction for tourists
$_ENV['telegram_general_terms'] = 'Terms of Service.'; // Terms of Service for Tourists



//Communication settings ---------------------------------------------- ----------------------------------------------
#Customer service system settings, registration address https://www.mylivechat.com
$_ENV['enable_mylivechat'] = false; //Whether to enable the customer service system
$_ENV['mylivechat_id'] = ''; //Customer service system ID

# PushBear is based on the WeChat template to push messages to users who follow the QR code https://pushbear.ftqq.com/, currently only users push new announcements
$_ENV['usePushBear'] = false;
$_ENV['PushBear_sendkey'] = ''; //Please fill in the sendkey you got from PushBear, please check carefully and do not paste it wrong

#Work order system settings
$_ENV['enable_ticket'] = true; //whether to enable ticket system
$_ENV['mail_ticket'] = true; //Whether to open ticket email reminder

# Server Sauce Use WeChat to remind the airport owner when a user submits a new work order or replies to a work order http://sc.ftqq.com/
$_ENV['useScFtqq'] = false; //Whether to enable work order Server sauce reminder
$_ENV['ScFtqq_SCKEY'] = ''; //Please fill in the SCKEY you got from the server, please check carefully and don't paste it wrong

# Admin contact settings
$_ENV['enable_admin_contact'] = false; //Whether to enable administrator contact
$_ENV['admin_contact1'] = 'QQ: 1233456'; //QQ, email, WeChat are just for example
$_ENV['admin_contact2'] = 'Email info@r707.ir'; //You can also write phone, tg and other contact information
$_ENV['admin_contact3'] = 'WeChat~123456'; //There is no format requirement, you can write whatever you want, you can leave it blank


//Verification code setting --------------------------------------------- ---------------------------------------------
$_ENV['captcha_provider'] = 'recaptcha'; //value recaptcha | geetest(extreme test)

$_ENV['recaptcha_sitekey'] = '';
$_ENV['recaptcha_secret'] = '';

$_ENV['geetest_id'] = '';
$_ENV['geetest_key'] = '';

$_ENV['enable_reg_captcha'] = false; //Enable registration verification code
$_ENV['enable_login_captcha'] = false; //Enable login verification code
$_ENV['enable_checkin_captcha'] = false; //Enable checkin verification code

//Payment system settings --------------------------------------------- -----------------------------------------------
#value none | codepay | f2fpay | paymentwall | spay | payjs | yftpay | flyfoxpay
# The payment methods supported by the Metron theme are all set in metron_setting.php, do not modify the payment methods here, only need to modify the parameters of the payment system
$_ENV['payment_system'] = 'metronpay'; # Don't move!!!

#V visa free
$_ENV['vmq_secret'] = ''; // communication key
$_ENV['vmq_url'] = ''; // server address
$_ENV['vmq_param'] = 'bob666'; // (optional) transfer parameters

#alipay, f2fpay
$_ENV['f2fpay_app_id'] = '';
$_ENV['f2fpay_p_id'] = '';
$_ENV['alipay_public_key'] = '';
$_ENV['merchant_private_key'] = '';
$_ENV['f2fNotifyUrl'] = null; //Custom face-to-face payment callback address

#THeadPay THeadPay
$_ENV['theadpay_url'] = 'https://jk.theadpay.com/v1/jk/orders';
$_ENV['theadpay_mchid'] = '';
$_ENV['theadpay_key'] = '';

#PaymentWall
$_ENV['pmw_publickey'] = '';
$_ENV['pmw_privatekey'] = '';
$_ENV['pmw_widget'] = 'm2_1';
$_ENV['pmw_height'] = '350px';

#PayJs
$_ENV['payjs_mchid'] = '';
$_ENV['payjs_key'] = '';

#paytaro http://v1.paytaro.com/#/dashboard
$_ENV['paytaro_app_id'] = '';
$_ENV['paytaro_app_secret'] = '';

#bobpay @bob_pay_bot https://faka.bob1.xyz/buy/13
$_ENV['tron_api_url'] = 'https://pay.bobu.me';
$_ENV['tron_app_id'] = '';
$_ENV['tron_app_secret'] = '';


#wolfpay
$_ENV['wolfpay'] = [
    'config' => [
        'hid' => '',
        'key' => '',
        'url' => ''
    ]
];

#umipay(mgate)
$_ENV['mgate_api_url'] = '';
$_ENV['mgate_app_id'] = '';
$_ENV['mgate_app_secret'] = '';

#epay
$_ENV['epay'] = [
    'epay_api_url' => '',
    'epay_pid' => '',
    'epay_key' => '',
    'transport' => 'https',
];

#stripe
$_ENV['stripe_currency'] = 'hkd'; // The default currency of the Stripe payment interface, you can write hkd usd aud, etc. Stripe restricts the receiving currency to the currency of the account registration area
$_ENV['stripe_limit'] = 5; // stripe limits the minimum recharge amount, 0 is the default value
$_ENV['stripe_key'] = '';
$_ENV['stripe_webhook'] = '';

#PcexPay Cellular Easy Payment https://forwe.co/user
$_ENV['pcexpay_id'] = '10211';
$_ENV['pcexpay_key'] = 'lyYlo66qY0lcQ2WA2dl2LNLYfoYlOoZO';

// Other panel display settings -------------------------------------------- ----------------------------------------------
$_ENV['old_index_DESC'] = '<p>Enough is enough, I can\'t stand your behavior, now you will be one of us</p>'; //Text message of old version home page

# User Documentation
$_ENV['use_this_doc'] = false; //use this document
$_ENV['enable_documents'] = false; //Whether to allow non-logged-in users to view the document center
$_ENV['documents_name'] = $_ENV['appName'] . 'Document Center'; //Document Center Name
$_ENV['remote_documents'] = true; //Whether to load the document center remotely, if not, please execute php xcat initdocuments
$_ENV['documents_source'] = 'https://raw.githubusercontent.com/GeekQu/PANEL_DOC/master/SSPanel'; //Remote document loading address

#background commodity list sales statistics
$_ENV['sales_period'] = 30; //Statistics of sales in the specified period, the value is [expire/any integer greater than 0]

#flag
$_ENV['enable_flag'] = true; //Be sure to read the tutorial carefully before enabling this item
$_ENV['flag_regex'] = '/(nl|de|tr|ir|us|az|us|fr)/'; //Match [country from the full name of the site /region] regular expression (php version)

#donate
$_ENV['enable_donate'] = false; // Whether to display user donations (all earnings will be public)

#iOS account display
$_ENV['display_ios_class'] = -1; //At least the level of users can see it, if it is less than 0, close this function
$_ENV['display_ios_topup'] = 0; //After satisfying the level requirements, the users whose accumulative recharge is higher than the number can see it
$_ENV['ios_account'] = ''; //iOS account
$_ENV['ios_password'] = ''; //iOS password




#User center homepage adds support for other clients, which can cooperate with subconverter and other APIs
$_ENV['userCenterClient'] = [
    'iOS' => [
        [
            'name' => 'Loon',
            'support' => 'SS/SSR/VMess',
            'download_urls' => [
                [
                    'name' => 'Download from this site',
                    'url' => 'https://google.com',
                ],
                [
                    'name' => 'official download',
                    'url' => 'https://baidu.com',
                ]
            ],
            'tutorial_url' => '/doc/#/iOS/Loon',
            'description' => 'Other instructions.',
            'subscribe_urls' => [
                [
                    'name' => 'SS subscription',
                    'type' => 'href',
                    'url' => '%userUrl%?sub=2',
                ],
                [
                    'name' => 'SSR subscription',
                    'type' => 'href',
                    'url' => '%userUrl%?sub=1',
                ],
                [
                    'name' => 'V2Ray subscription',
                    'type' => 'copy',
                    'url' => '%userUrl%?sub=3',
                ]
            ]
        ]
    ],
    'macOS' => [],
    'Linux' => [],
    'Router' => [],
    'Android' => [],
    'Windows' => [
        [
            'name' => 'Netch',
            'support' => 'SS/SSR/VMess',
            'download_urls' => [
                [
                    'name' => 'official download',
                    'url' => 'https://github.com/NetchX/Netch/releases',
                ]
            ],
            'tutorial_url' => '/doc/#/Windows/Netch',
            'description' => 'Other instructions.',
            'subscribe_urls' => [
                [
                    'name' => 'SS subscription',
                    'type' => 'href',
                    'url' => '%userUrl%?sub=2',
                ],
                [
                    'name' => 'SSR subscription',
                    'type' => 'href',
                    'url' => '%userUrl%?sub=1',
                ],
                [
                    'name' => 'V2Ray subscription',
                    'type' => 'copy',
                    'url' => '%userUrl%?sub=3',
                ]
            ]
        ]
    ]
];

// Node detection ---------------------------------------------- --------------------------------------------------
#GFW detection, please [enable/disable] through crontab
$_ENV['detect_gfw_interval'] = 3600; //Detection interval, unit: second, if it is lower than the recommended value, it will explode
$_ENV['detect_gfw_port'] = 22; //The TCP port opened by all node servers, commonly used is 22 (SSH port)
$_ENV['detect_gfw_url'] = 'https://cn-qz-tcping.torch.njs.app/{ip}/{port}'; //The URL of the API that detects whether the node is blocked by gfw
$_ENV['detect_gfw_judge'] = '$json_tcping[\'status\']=="true"'; //The basis for judging whether it is blocked, json_tcping is the json array returned by the above URL
$_ENV['detect_gfw_count'] = '3'; //Number of attempts

# Offline detection
$_ENV['enable_detect_offline'] = false;
#Offline detection whether to push to Server sauce Please configure the above Server configuration
$_ENV['enable_detect_offline_useScFtqq'] = false;


//V2Ray related settings --------------------------------------------- ---------------------------------------------
$_ENV['v2ray_port'] = 443; //V2Ray port
$_ENV['v2ray_protocol'] = 'HTTP/2 + TLS'; //V2Ray protocol
$_ENV['v2ray_alter_id'] = 32;
$_ENV['v2ray_level'] = 0;


//All of the following are advanced settings (generally not used, no need to change -------------------------------- -----------------------------------

// Whether the main site provides WebAPI
// - For security, it is recommended to use the WebAPI mode to connect to the node and close the public network database connection.
// - Can be set to false if all your nodes use database connections or have separate WebAPI sites or seeds.
$_ENV['WebAPI'] = true;

#miscellaneous
$_ENV['authDriver'] = 'cookie'; //This cannot be changed
$_ENV['pwdMethod'] = 'md5'; // password encryption optional md5, sha256, bcrypt, argon2i, argon2id (argon2i requires at least php7.2)
$_ENV['salt'] = ''; //It is recommended to cooperate with md5/sha256, bcrypt/argon2i/argon2id will ignore this item
$_ENV['sessionDriver'] = 'cookie'; //Optional: cookie, redis
$_ENV['cacheDriver'] = 'cookie'; //Optional: cookie, redis
$_ENV['tokenDriver'] = 'db'; //Optional: db, redis

$_ENV['enable_login_bind_ip'] = true; //Whether to bind the login thread and IP
$_ENV['rememberMeDuration'] = 7; //The number of days to remember the account when logging in
$_ENV['Speedtest_duration'] = 6; //how long the speed test record is displayed

$_ENV['login_warn'] = true; //Prompt for remote login
$_ENV['timeZone'] = 'PRC'; //PRC China time UTC Green time
$_ENV['theme'] = 'metron'; //default theme
$_ENV['jump_delay'] = 1200; //Jump delay, unit ms, not recommended to be too long

$_ENV['pacp_offset'] = -20000; //VPN port offset
$_ENV['pacpp_offset'] = -20000;

$_ENV['checkNodeIp'] = false; //Whether webapi verifies node ip
$_ENV['muKeyList'] = []; //Multiple key list
$_ENV['keep_connect'] = false; // Speed limit to 1Mbps for traffic exhausted users
$_ENV['money_from_admin'] = false; //Whether to enable the administrator to create a recharge record when modifying the user balance

#aws
$_ENV['aws_access_key_id'] = '';
$_ENV['aws_secret_access_key'] = '';

#redis
$_ENV['redis_scheme'] = 'tcp';
$_ENV['redis_host'] = '127.0.0.1';
$_ENV['redis_port'] = 6379;
$_ENV['redis_database'] = '';
$_ENV['redis_password'] = '';

#RadiusSettings
$_ENV['enable_radius'] = false; //Whether to enable Radius
$_ENV['radius_db_host'] = ''; //The following 4 items are set for the Radius database
$_ENV['radius_db_database'] = '';
$_ENV['radius_db_user'] = '';
$_ENV['radius_db_password'] = '';
$_ENV['radius_secret'] = ''; //Radius connection key

#Cloudflare
$_ENV['cloudflare_enable'] = false; // Whether to enable Cloudflare analysis
$_ENV['cloudflare_email'] = ''; //Cloudflare email address
$_ENV['cloudflare_key'] = ''; //Cloudflare API Key
$_ENV['cloudflare_name'] = ''; //domain name

#Insecure transit mode, users who use protocols other than auth_aes128_md5 or auth_aes128_sha1 can also set and use transit after this is enabled
$_ENV['relay_insecure_mode'] = false; //Strongly recommended not to open

#Whether to include statistical code, create an analytics.tpl under resources/views/{theme name}, use literal delimiter if necessary
$_ENV['enable_analytics_code'] = false;
$_ENV['sspanelAnalysis'] = true;

#Get the user's real ip after setting up the CDN, if you don't know what it is, please don't mess around
$_ENV['cdn_forwarded_ip'] = array('HTTP_X_FORWARDED_FOR', 'HTTP_ALI_CDN_REAL_IP', 'X-Real-IP', 'True-Client-Ip');
foreach ($_ENV['cdn_forwarded_ip'] as $cdn_forwarded_ip) {
    if (isset($_SERVER[$cdn_forwarded_ip])) {
        $list = explode(',', $_SERVER[$cdn_forwarded_ip]);
        $_SERVER['REMOTE_ADDR'] = $list[0];
        break;
    }
}
