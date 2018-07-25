<?php
/**
 *
 */
namespace Core\Lib;
use Core\Config\AppConfig;

class Request {
  static $data;
  static $user_id;

  public function __construct (){
    GLOBAL $_SESSION;
    session_start ();
    self::$data['_GET'] = $_GET;
    self::$data['_POST'] = $_POST;
    if (isset ($_SESSION))
      self::$data['_SESSION'] = $_SESSION;
    else
      self::$data['_SESSION'] = array ();
    self::$user_id = $_SESSION['user_id'];
  }

  public function get ($name){
//    echo $name . ' ' . self::$data['_GET'][$name];
    if (isset (self::$data['_GET'][$name]))
      return self::$data['_GET'][$name];
    elseif (isset (self::$data['_POST'][$name]))
      return self::$data['_POST'][$name];
      elseif (isset (self::$data['_SESSION'][$name]))
        return self::$data['_SESSION'][$name];
    else return null;
  }


}
