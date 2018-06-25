<?php
/**
 *
 */
namespace Core\Lib;
use Core\Config\AppConfig;

class Request {
  static $data;

  public function __construct (){
    GLOBAL $_SESSION;
    session_start ();
    self::$data['_GET'] = $_GET;
    self::$data['_POST'] = $_POST;
    if (isset ($_SESSION))
      self::$data['_SESSION'] = $_SESSION;
    else
      self::$data['_SESSION'] = array ();
  }


}
