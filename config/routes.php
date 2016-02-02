<?php
return array(
//    'login/(\w+)/(\w+)' => 'user/login/$1/$2',
    '(?m)^login$' => 'user/login', //actionAuthentication() in UserController
    '(?m)^reg$' => 'user/registration',
    '(?m)^projects$' => 'projects/index',
    '(?m)^template/(\w+)$' => 'index/template/$1',
    '(?m)^start$' => 'index/start',   //chooses template for start application
    '(?m)^index$' => 'index/index',   //loads HTML index page
    '' => 'index/index'
);