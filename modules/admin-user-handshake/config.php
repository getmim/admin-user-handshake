<?php

return [
    '__name' => 'admin-user-handshake',
    '__version' => '0.0.1',
    '__git' => 'git@github.com:getmim/admin-user-handshake.git',
    '__license' => 'MIT',
    '__author' => [
        'name' => 'Iqbal Fauzi',
        'email' => 'iqbalfawz@gmail.com',
        'website' => 'https://iqbalfn.com/'
    ],
    '__files' => [
        'modules/admin-user-handshake' => ['install','update','remove']
    ],
    '__dependencies' => [
        'required' => [
            [
                'lib-user-auth-handshake' => NULL
            ],
            [
                'lib-user-auth-cookie' => NULL
            ]
        ],
        'optional' => []
    ],
    'autoload' => [
        'classes' => [
            'AdminUserHandshake\\Controller' => [
                'type' => 'file',
                'base' => 'modules/admin-user-handshake/controller'
            ]
        ],
        'files' => []
    ],
    'routes' => [
        'admin' => [
            'adminMeHandshakeDeliver' => [
                'path' => [
                    'value' => '/me/handshake/deliver'
                ],
                'handler' => 'AdminUserHandshake\\Controller\\Handshake::deliver',
                'method' => 'GET|POST'
            ],
            'adminMeHandshakeReceive' => [
                'path' => [
                    'value' => '/me/handshake/receive'
                ],
                'handler' => 'AdminUserHandshake\\Controller\\Handshake::receive',
                'method' => 'GET|POST'
            ]
        ]
    ],
    'admin' => [
        'middleware' => [
            'login' => [
                'ignore' => [
                    'adminMeHandshakeDeliver' => true,
                    'adminMeHandshakeReceive' => true
                ]
            ]
        ]
    ]
];