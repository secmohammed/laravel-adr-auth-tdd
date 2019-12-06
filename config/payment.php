<?php
return [
    'status' => 'prod',
    'providers' => [
        'hyperPay',
        'stripe',
    ],
    'provider' => '',
    'hyperPay' => [
        'prod' => [
            'url' => 'https://oppwa.com/v1/checkouts',
            'UserId' => '8acda4ca6ade5ae0016b0819e2e33e1e',
            'Password' => 'kn95y3ayXc',
            'EntityId' => '8acda4ca6ade5ae0016b081a38503e26',
            'AccessToken' => 'OGFjZGE0Y2E2YWRlNWFlMDAxNmIwODE5ZTJlMzNlMWV8a245NXkzYXlYYw==',
            'formUrl' => 'https://oppwa.com/v1/paymentWidgets.js?checkoutId',
            'successResponseCode' => '000.000.000',
        ],
        'dev' => [
            'url' => 'https://test.oppwa.com/v1/checkouts',
            'UserId' => '8ac7a4c86a7c58d0016a880c31490be3',
            'Password' => 'kn95y3ayXc',
            'EntityId' => '8ac7a4c86a7c58d0016a880c31490be3',
            'AccessToken' => 'OGFjN2E0Yzg2YTdjNThkMDAxNmE4ODBiZjZjODBiZGZ8cUprNEtrMzR6OA==',
            'formUrl' => 'https://test.oppwa.com/v1/paymentWidgets.js?checkoutId',
            'successResponseCode' => '000.100.110',
        ],

    ],
];
