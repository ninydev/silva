<?php
namespace Core\Components\User;
use Core\Lib\BaseModel;
use Core\Lib\Request;


/**
 *
 */
class modelUser extends BaseModel
{
  public $data;

  function __construct()  {

    if (isset(Request::$data['_GET']['doLogin'])){
      $this->doLogin ();
    }
  }


  function doLogin (){
    //echo 'Происходит вход в систему';
    if (
      Request::$data['_GET']['login']=='admin' &&
      Request::$data['_GET']['password']=='admin'
    ){
      $_SESSION['user_id'] = 1;
      $_SESSION['user_name'] = "Admin Админович";
      $_SESSION['user_data'] = array ();
      echo 'Вход выполнен';
    }
  }



  function isLogin (){
    if (isset(Request::$data['_SESSION']['user_id'])){
      $this->data['user_id'] = Request::$data['_SESSION']['user_id'];
      $this->data['user_name'] = Request::$data['_SESSION']['user_name'];
      $this->data['user_data'] = Request::$data['_SESSION']['user_data'];
      return true;
    }else {
      $this->data['user_id'] = 0;
      $this->data['user_name'] = 'Гость';
      return false;
    }
  }


}
