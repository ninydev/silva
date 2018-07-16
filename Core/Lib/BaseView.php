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
    if (isset($data['error'])){
      Response::$data['error'] = $data['error'];
      unset($data['error']);
    }
    if (isset($data['msg'])){
      Response::$data['msg'] = $data['msg'];
      unset($data['msg']);
    }
    Response::$data[$position] = $data;
    //var_dump (  Response::$data);
  }

}
