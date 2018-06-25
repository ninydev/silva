<?php
/**
 *
 */
namespace Core\Lib;
use Core\Config\AppConfig;
use Core\Lib\Response;

class BaseView
{

  public function __construct (){
//    echo 'создана базовая вьюшка';
  }

  public function render ($tpl, $data){
    include (AppConfig::$tplDir . '/' . $tpl . '.tpl.php');
  }

  public function put ($data, $position){
    Response::$data[$position] = $data;
    //var_dump (  Response::$data);
  }

}
