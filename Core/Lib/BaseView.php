<?php
/**
 *
 */
namespace Core\Lib;
use AppConfig;

class BaseView
{

  public function __construct (){
    echo 'создана базовая вьюшка';
  }

  public function render ($tpl, $data){
    include (AppConfig::$tplDir . '/' . $tpl . '.tpl.php');
  }

}
