<?php

/**
 * default is the default configuration, you can add other configurations, but you must ensure that the default configuration exists
 *
 * Checks is filled in as the policy group name that is not directly used in the rule file and uses filtering rules and may have no nodes in the group
 * - For example, use regex to classify country groups. If there is no match, there is no node in the group. This type needs to be filled in Checks to ensure that the configuration file is correct
 *
 * In the General of Surge and Surfboard, please fill in the Boolean value as a string
 *
 * In the Proxy of Surge and Surfboard, please fill in the format of the application
 * In the Proxy of Clash, please fill in as an array
 */

/**
 * Surge profile definition
 */
$_ENV['Surge_Profiles'] = [
    'default' => [
        'Checks' => [],
        'General' => [
            'loglevel' => 'notify',
            'dns-server' => 'system, 117.50.10.10, 119.29.29.29, 223.6.6.6',
            'skip-proxy' => '127.0.0.1, 192.168.0.0/16, 10.0.0.0/8, 172.16.0.0/12, 100.64.0.0/10, 17.0.0.0/8, localhost, *.local, *. crashlytics.com',
            'external-controller-access' => 'China@0.0.0.0:8233',
            'allow-wifi-access' => 'true',
            'enhanced-mode-by-rule' => 'false',
            'exclude-simple-hostnames' => 'true',
            'show-error-page-for-reject' => 'true',
            'ipv6' => 'true',
            'replica' => 'false',
            'http-listen' => '0.0.0.0:8234',
            'socks5-listen' => '0.0.0.0:8235',
            'wifi-access-http-port' => 6152,
            'wifi-access-socks5-port' => 6153,
            'internet-test-url' => 'http://baidu.com',
            'proxy-test-url' => 'http://www.qualcomm.cn/generate_204',
            'test-timeout' => 3
        ],
        'Proxy' => [
            '🚀 direct connection = direct'
        ],
        'ProxyGroup' => [
            //[
            // 'name' => '4🔰Foreign traffic',
            // 'type' => 'select',
            // 'content' => [
            // 'regex' => '(.*)',
            // 'right-proxies' => [
            // '🚀 direct connection'
            // ],
            // ]
            // ],
            //[
            // 'name' => '⚓️Other Traffic'
            // 'type' => 'select',
            // 'content' => [
            // 'left-proxies' => [
            // '🔰Foreign traffic',
            // '🚀 direct connection'
            // ]
            // ]
            // ],
            //[
            // 'name' => '✈️Telegram',
            // 'type' => 'select',
            // 'content' => [
            // 'left-proxies' => [
            // '🔰Foreign traffic'
            // ],
            // 'regex' => '(.*)',
            // ]
            // ],
            //[
            // 'name' => '🎬Youtube',
            // 'type' => 'select',
            // 'content' => [
            // 'left-proxies' => [
            // '🔰Foreign traffic'
            // ],
            // 'regex' => '(.*)',
            // ]
            // ],
            //[
            // 'name' => '🎬Netflix',
            // 'type' => 'select',
            // 'content' => [
            // 'left-proxies' => [
            // '🔰Foreign traffic'
            // ],
            // 'regex' => '(.*)',
            // ]
            // ],
            //[
            // 'name' => '🎬哔哩哔哩',
            // 'type' => 'select',
            // 'content' => [
            // 'left-proxies' => [
            // '🚀 direct connection'
            // ],
            // 'regex' => '(.*)',
            // ]
            // ],
            //[
            // 'name' => '🎬foreign media',
            // 'type' => 'select',
            // 'content' => [
            // 'left-proxies' => [
            // '🔰Foreign traffic'
            // ],
            // 'regex' => '(.*)',
            // ]
            // ],
            //[
            // 'name' => '🍎Apple Services',
            // 'type' => 'select',
            // 'content' => [
            // 'left-proxies' => [
            // '🚀 direct connection',
            // '🔰Foreign traffic'
            // ]
            // ]
            // ]
        ],
        'Rule' => [
            'source' => 'surge/default.tpl'
        ]
    ]
];
/**
 * Configuration file definitions for Surge 2.x versions
 */
$_ENV['Surge2_Profiles'] = [
    'default' => [
        'Checks' => [],
        'General' => [
            'loglevel' => 'notify',
            'ipv6' => 'true',
            'replica' => 'false',
            'dns-server' => 'system, 119.29.29.29, 223.5.5.5',
            'skip-proxy' => '127.0.0.1, 192.168.0.0/16, 10.0.0.0/8, 172.16.0.0/12, 100.64.0.0/10, 17.0.0.0/8, localhost, *.local, *. crashlytics.com',
            'bypass-system' => 'true',
            'allow-wifi-access' => 'true',
            'external-controller-access' => 'ChinaX@0.0.0.0:8233'
        ],
        'Proxy' => [
            '🚀 direct connection = direct'
        ],
        'ProxyGroup' => [
            [
                'name' => '🔰Foreign traffic',
                'type' => 'select',
                'content' => [
                    'regex' => '(.*)',
                    'right-proxies' => [
                        '🚀 direct connection'
                    ],
                ]
            ],
            [
                'name' => '⚓️Other Traffic',
                'type' => 'select',
                'content' => [
                    'left-proxies' => [
                        '🔰Foreign traffic',
                        '🚀 direct connection'
                    ]
                ]
            ],
            [
                'name' => '✈️Telegram',
                'type' => 'select',
                'content' => [
                    'left-proxies' => [
                        '🔰Foreign traffic'
                    ],
                    'regex' => '(.*)',
                ]
            ],
            [
                'name' => '🎬Youtube',
                'type' => 'select',
                'content' => [
                    'left-proxies' => [
                        '🔰Foreign traffic'
                    ],
                    'regex' => '(.*)',
                ]
            ],
            [
                'name' => '🎬Netflix',
                'type' => 'select',
                'content' => [
                    'left-proxies' => [
                        '🔰Foreign traffic'
                    ],
                    'regex' => '(.*)',
                ]
            ],
            [
                'name' => '🎬哔哩哔哩',
                'type' => 'select',
                'content' => [
                    'left-proxies' => [
                        '🚀 direct connection'
                    ],
                    'regex' => '(.*)',
                ]
            ],
            [
                'name' => '🎬foreign media',
                'type' => 'select',
                'content' => [
                    'left-proxies' => [
                        '🔰Foreign traffic'
                    ],
                    'regex' => '(.*)',
                ]
            ],
            [
                'name' => '🍎Apple Services',
                'type' => 'select',
                'content' => [
                    'left-proxies' => [
                        '🚀 direct connection',
                        '🔰Foreign traffic'
                    ]
                ]
            ]
        ],
        'Rule' => [
            'source' => 'surge2/default.tpl'
        ]
    ]
];

/**
 * Clash
 */
$_ENV['Clash_Profiles'] = [
    'default' => [
        'Checks' => [],
        'General' => [
            'port' => 7890,
            'socks-port' => 7891,
            'redir-port' => 7892,
            'allow-lan' => false,
            'mode' => 'Rule',
            'log-level' => 'silent',
            'external-controller' => '0.0.0.0:9090',
            'secret' => ''
        ],
        'Proxy' => [],
        'ProxyGroup' => [
            [
                'name' => '🔰Foreign traffic',
                'type' => 'select',
                'content' => [
                    'regex' => '(.*)',
                    'right-proxies' => [
                        '🚀 direct connection'
                    ],
                ]
            ],
            [
                'name' => '⚓️Other Traffic',
                'type' => 'select',
                'content' => [
                    'left-proxies' => [
                        '🔰Foreign traffic',
                        '🚀 direct connection'
                    ]
                ]
            ],
            [
                'name' => '✈️Telegram',
                'type' => 'select',
                'content' => [
                    'left-proxies' => [
                        '🔰Foreign traffic'
                    ],
                    'regex' => '(.*)',
                ]
            ],
            [
                'name' => '🎬Youtube',
                'type' => 'select',
                'content' => [
                    'left-proxies' => [
                        '🔰Foreign traffic'
                    ],
                    'regex' => '(.*)',
                ]
            ],
            [
                'name' => '🎬Netflix',
                'type' => 'select',
                'content' => [
                    'left-proxies' => [
                        '🔰Foreign traffic'
                    ],
                    'regex' => '(.*)',
                ]
            ],
            [
                'name' => '🎬哔哩哔哩',
                'type' => 'select',
                'content' => [
                    'left-proxies' => [
                        '🚀 direct connection'
                    ],
                    'regex' => '(.*)',
                ]
            ],
            [
                'name' => '🎬foreign media',
                'type' => 'select',
                'content' => [
                    'left-proxies' => [
                        '🔰Foreign traffic'
                    ],
                    'regex' => '(.*)',
                ]
            ],
            [
                'name' => '🍎Apple Services',
                'type' => 'select',
                'content' => [
                    'left-proxies' => [
                        '🚀 direct connection',
                        '🔰Foreign traffic'
                    ]
                ]
            ],
            [
                'name' => '🚀 direct connection',
                'type' => 'select',
                'content' => [
                    'left-proxies' => [
                        'DIRECT'
                    ]
                ]
            ]
        ],
        'Rule' => [
            'source' => 'clash/default.tpl'
        ]
    ]
];

/**
 * Surfboard
 */
$_ENV['Surfboard_Profiles'] = [
    'default' => [
        'Checks' => [],
        'General' => [
            'loglevel' => 'notify',
            'dns-server' => 'system, 8.8.8.8, 8.8.4.4',
            'skip-proxy' => '127.0.0.1, 192.168.0.0/16, 10.0.0.0/8, 172.16.0.0/12, 100.64.0.0/10, 17.0.0.0/8, localhost, *.local, *. crashlytics.com',
            'internet-test-url' => 'http://bing.com',
            'proxy-test-url' => 'http://bing.com',
        ],
        'Proxy' => [
            '🎃 Nothing = direct',
        ],
        'ProxyGroup' => [
            [
                'name' => 'Type',
                'type' => 'select',
                'content' => [
                    'left-proxies' => ['Best', 'General', 'Anti-Sianat',],
                ]
            ],
            [
                'name' => 'General',
                'type' => 'select',
                'content' => [
                    'regex' => '\b(\w*-GE-\w*)\b',
                    'right-proxies' => ['🎃 Nothing'],
                ]
            ],
            [
                'name' => 'Anti-Sianat',
                'type' => 'select',
                'content' => [
                    'regex' => '\b(\w*-AS-\w*)\b',
                    'right-proxies' => ['🎃 Nothing'],
                ]
            ],
            [
                'name' => 'Best',
                'type' => 'url-test',
                'content' => [
                    'regex' => '(.*)',
                    'right-proxies' => ['🎃 Nothing'],
                ],
                'url' => 'http://www.google.com/',
                'interval' => 43200,

            ],
        ],
        'Rule' => [
            'source' => 'surfboard/default.tpl'
        ]
    ]
];


/**
 * Surfboard
 */
$_ENV['Surfboard_Profiles'] = [
    'default' => [
        'Checks' => [],
        'General' => [
            'loglevel' => 'notify',
            'dns-server' => 'system, 8.8.8.8, 8.8.4.4',
            'skip-proxy' => '127.0.0.1, 192.168.0.0/16, 10.0.0.0/8, 172.16.0.0/12, 100.64.0.0/10, 17.0.0.0/8, localhost, *.local, *. crashlytics.com',
            'internet-test-url' => 'http://bing.com',
            'proxy-test-url' => 'http://bing.com',
        ],
        'Proxy' => [
            '🎃 Nothing = direct',
        ],
        'ProxyGroup' => [
            [
                'name' => 'Type',
                'type' => 'select',
                'content' => [
                    'left-proxies' => ['Best', 'General', 'Anti-Sianat',],
                ]
            ],
            [
                'name' => 'General',
                'type' => 'select',
                'content' => [
                    'regex' => '\b(\w*-GE-\w*)\b',
                    'right-proxies' => ['🎃 Nothing'],
                ]
            ],
            [
                'name' => 'Anti-Sianat',
                'type' => 'select',
                'content' => [
                    'regex' => '\b(\w*-AS-\w*)\b',
                    'right-proxies' => ['🎃 Nothing'],
                ]
            ],
            [
                'name' => 'Best',
                'type' => 'url-test',
                'content' => [
                    'regex' => '(.*)',
                    'right-proxies' => ['🎃 Nothing'],
                ],
                'url' => 'http://www.google.com/',
                'interval' => 43200,

            ],
        ],
        'Rule' => [
            'source' => 'surfboard/default.tpl'
        ]
    ]
];
