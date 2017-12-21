<?php
return [
'driver' => env('MAIL_DRIVER','smtp'),
'host'=> env('MAIL_HOST','smtp.zoho.com'),
'port' => env('MAIL_PORT',''),
"from"=>array(
"address" =>"sbmdkl@gmail.com",
"name" =>"Soulmate"
 ),
'encryption' => env('MAIL_ENCRYPTION','tls'),
"username"=>"sbmdkl@gmail.com",
"password"=>"shubham@zoho",
'sendmail' => '/usr/sbin/sendmail -bs',
'pretend' => false,
];