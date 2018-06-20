<?php

define('SILVA_START', microtime(true));
include_once ('config.php');
include_once ('vendor/autoload.php');
include_once ('Core/boot.php');


$myForm = new Core\Helper\Form ();
$myForm->addFild('text', 'login', 'login', 'Login');
$myForm->addFild('text', 'email', 'email', 'E-Mail');
$myForm->addFild('password', 'pswd', 'pswd', 'Pswd:');

echo $myForm->getForm ();



$myForm1 = new Core\Helper\Form ();
$myForm1->addFild('text', 'login', 'login', 'Логин');
$myForm1->addFild('text', 'email', 'email', 'Пароль');
$myForm1->addFild('password', 'pswd', 'pswd', 'Pswd:');

echo $myForm1->getForm ();

?>
