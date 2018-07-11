<?php
namespace Core\Lib;
use Core\Config\AppConfig;
/**
 *
 */
class MySql
{
  private static $instance = null; // тут я сохраню сам себя

  private static $objMySql; // ссылка на соединение с базой данных
  private $sql;
  private $responce;


  /**
   * Запрещаю создавать себя и клонировать
   */
  private function __clone() {}
  private function __construct() {}


  /**
   * Отдает свой экземпляр для дальнейшей работы
   * @return MySql
   */
  public static function getInstance(){
    if (null === self::$instance){
            self::$instance = new self();
            self::connect();
          }
    return self::$instance;
  }

  /**
   * Соединяемся с базой данных
   */
  static function connect (){
    self::$objMySql = new \mysqli(
                              AppConfig::$DB_HOST . ':' . AppConfig::$DB_PORT,
                              AppConfig::$DB_USER,
                              AppConfig::$DB_PSWD,
                              AppConfig::$DB_NAME);
    if (self::$objMySql->connect_error) {
        die('Ошибка подключения (' . self::$objMySql->connect_errno . ') '. self::$objMySql->connect_error);
          }
  }


  function insert ($table, $data){
    $val = "('" . implode("', '" , $data) . "')";
    $key = " (`".implode("`, `", array_keys($data))."`)";

    $sql = "INSERT INTO " . $table ." " . $key . " VALUES  " . $val . ";";
    echo $sql;
    $this->query ($sql);

  }

  function query ($str = ''){
    self::$objMySql->query ($str);
  }

}
