<?php
return[
  'hotels'=>[
      'safra'=>[
          'env' => 'production',
          'hotel_id'=>'safra_hotel_id',
          'hotel_city_id'=>'safra_city_id',
          'production' => [
              'url'=>'http://prod.safra-connect.safra.me',
              'token'=>'REWEfffgecNnYZ4X1tjoS8Me1Anyf8rP6w1ex4b4EH0tXCW2KnaNXAeL1BqyeerTMrraJOBYoJSc84LNBF5WP',
          ],
          'development' => [
              'url'=>'http://34.246.175.100',
              'token'=>'QxG15j1mis46b3IaLUkWexOmoOhQOAjP',
          ]
      ],

      'hotelsPro' => [
          'env' => 'development',
          'hotel_id'=>'hotels_pro_hotel_id',
          'hotel_city_id'=>'hotels_pro_city_id',
          'production' => [
              'url' => 'https://api-test.hotelspro.com',
              'username' => 'MacQueen',
              'password' => 'gess94zpSk5AYJXp'
          ],
          'development' => [
              'url' => 'https://api-test.hotelspro.com',
              'username' => 'MacQueen',
              'password' => 'gess94zpSk5AYJXp'
          ]
      ]
  ]
];
