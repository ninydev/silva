<?php

$objMySql = new mysqli(
                          'localhost',
                          'c25db',
                          'Yua0205Yua',
                          'c25db');

if ($objMySql->connect_error) {
      die('Ошибка подключения (' . $objMySql->connect_errno . ') '. $objMySql->connect_error);
    }
    else {
      echo 'DB Connect' . '<br /><br />';
    }

/*
$strSql = "INSERT INTO `city` (`id`, `city_name`) VALUES (NULL, 'Kacapetovka')";

echo 'Create Send ' . $strSql . '<br />';
$res = $objMySql->query ($strSql);
var_dump ($res);
echo '<hr />';


$strSql = "SELECT * FROM `city` ";
echo 'Read Send ' . $strSql . '<br />';
$res = $objMySql->query ($strSql);
var_dump ($res);
echo '<hr />data from table: ';
var_dump ($res->fetch_all(MYSQLI_ASSOC));
echo '<hr />';

$strSql = "UPDATE `city` SET `city_name` = 'Kacapetovka1' ";
echo 'Update Send ' . $strSql . '<br />';
$res = $objMySql->query ($strSql);
var_dump ($res);
echo '<hr />';
*/

$strSql = "DELETE FROM `city` WHERE `city`.`id` != 1 ";
echo 'Delete Send ' . $strSql . '<br />';
$res = $objMySql->query ($strSql);
var_dump ($res);
echo '<hr />';


// Вывод ошибки, что случилось
echo '<br /><br /> Error return ( ' . $objMySql->errno . ') ' . $objMySql->error . '<br  />';
