<?php

/**
 * Подготовили класс для работы с ответом приложения
 *
 * - Взяли поднос
 */
$request = new Core\Lib\Request();
$responce = new Core\Lib\Response();

// Соединение
// $DB = Core\Lib\MySql::getInstance();


/**
 * Взяли один из компанентов, и включили его в наш проект
 * Он сам расставил нужное в нашем проекте
 *
 * - Положили блюдо в поднос
 */
$curUser = new Core\Components\User\controllerUser();

require ('route/web.php');
