<?php
//var_dump(password_hash("123456"));
//die;
//admin pass = 123456
require __DIR__ . '/vendor/System/Application.php';
require __DIR__ . '/vendor/System/File.php';

use System\Application;
use System\File;

// var_dump(__DIR__);
$file = new File(__DIR__);
// var_dump($file);  //object(System\File)[1]  >> private 'root' => string 'C:\wamp64\www\blog-zohdy' (length=24)
// die();
// __DIR__   -- C:\wamp64\www\blog-zohdy
// $app  = new Application($file); // instance from application

$app = Application::getInstance($file);
// echo '<pre>';
// var_dump($app);
// echo '</pre>';

// echo $file->to("public/images/imag.jpg");
// die;

// var_dump($file);

$app->run();
// echo '<pre>';
// var_dump($app);

// var_dump($app);
// echo '</pre>';
// use System\Test;
// new Test();
// use App\Controllers\Users\Users;
// new Users();

