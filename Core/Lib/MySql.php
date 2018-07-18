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
  private $errno = 0;
  private $error = '';

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


  function update ($table, $data, $where){
//UPDATE `user` SET `nikname` = 'Keeper', `pswd` = '1inRIO' WHERE `user`.`id` = 20
    $sql = "UPDATE " . $table ." SET ";

    // Строит строку для изменения данных
    foreach ($data as $key => $value) {
      $set [] = " `" . $key . "` = '" . $value . "' ";
    }
    $set = implode(" , " , $set);

    if (is_array($where) ){
        foreach ($where as $key => $value) {
          $where [] = " ( `" . $key . "` = '" . $value . "') ";
        }
        $where = implode("  AND " , $where);

    }else {
      $where = " WHERE `id` =  '" . $where . "' ";
    }

    $sql.= $set . $where;
    $res = $this->query ($sql);

    if (!$res){
      $ret ['error'] = $this->errno . ' ' . $this->error;
    } else {
      $ret ['error']  = 0;
      $ret ['msg'] = $this->errno . ' ' . $this->error;
    }

    return $ret;
  }

  /**
   * Добавить эелеемнт в табоицу
   * @param  [type] $table [description]
   * @param  [type] $data  [description]
   * @return [type]        [description]
   */
  function insert ($table, $data){
    $val = "('" . implode("', '" , $data) . "')";
    $key = " (`".implode("`, `", array_keys($data))."`)";

    $sql = "INSERT INTO " . $table ." " . $key . " VALUES  " . $val . ";";
    $res = $this->query ($sql);

    if (!$res){
      $ret ['error'] = $this->errno . ' ' . $this->error;
    } else {
      $ret ['msg'] = $this->errno . ' ' . $this->error;
      $ret ['msg'].= ' Create ID' . self::$objMySql->insert_id;
      $ret ['id'] = self::$objMySql->insert_id;
    }

    return $ret;

  }

  /**
   * Построение запроса на чтение с ограничением
   * @param  [type] $table [description]
   * @param  [type] $data  [description]
   * @return [type]        [description]
   */
  function selectWhere($table, $data){

    $sql = "SELECT * FROM ". $table;
    //SELECT * FROM `user` WHERE (`email` = 'keeper@ninydev.com') AND (`pswd` = '1inRIO')
    //var_dump ($data);
    foreach ($data as $key => $value) {
      $where [] = " (`" . $key . "` = '" . $value . "') ";
    }
    $w = implode(" AND " , $where);
    if (strlen($w) > 0){
      $sql.= " WHERE " . $w;
    }

    $res = $this->query ($sql);

    if (!$res){
      $ret ['error'] = $this->errno . ' ' . $this->error;
    }else {
      $ret ['data'] = $res->fetch_all(MYSQLI_ASSOC);
      $ret ['num_rows'] = $res->num_rows;
      $ret ['full'] = $res;
    }

    return $ret;
  }

  /**
   * Отправить SQL запрос в базу
   * @param  string $str [description]
   * @return [type]      [description]
   */
  function query ($str = ''){
    // echo $str;
    $res = self::$objMySql->query ($str);
//    if (!$res){
      $this->errno = self::$objMySql->errno;
      $this->error = self::$objMySql->error;
//    }
    return $res;
  }

}
