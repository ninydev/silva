<?php

// начали процесс
define('SILVA_START', microtime(true));



// Настройка автозагрузки,
// В том числе и psr-4
include_once ('vendor/autoload.php');

// Загрузка нашего проекта
// Загрузка и иннициализация всех систем
include_once ('Core/boot.php');

// Вывод результатов работы приложения на экран
// - Касса
$responce->getFull ();

//var_dump($_SESSION);
?>
