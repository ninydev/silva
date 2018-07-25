<?php
namespace Core\Components\User;
use Core\Lib\BaseModel;
use Core\Lib\Request;
use Core\Lib\MySql;


/**
 *
 */
class modelUser extends BaseModel
{
  public $data;
  public $user_id = 0;
  private $table = 'user';

  function __construct()  {
//    $this->data = Request::$data['_SESSION']['user_data'];
//    $this->user_id = Request::$data['_SESSION']['user_id'];
    $this->data = Request::get ('user_data');
    $this->user_id = Request::get ('user_id');
  }

  public function update ($data){
    $DB = MySql::getInstance();
    $ret = $DB->update ($this->table, $data, $this->user_id );
    return $ret;

  }

  public function getData(){
    return $this->data;
  }

  function create (){
    $DB = MySql::getInstance();
    $data ['email'] = Request::$data['_GET']['email'];
    $data ['nikname'] = Request::$data['_GET']['nikname'];
    $data ['pswd'] = Request::$data['_GET']['pswd'];
    $ret = $DB->insert ($this->table, $data);
    return $ret;
  }

  /**
   * Проверяет и забирает данные о пользователе
   * @param  [type] $email [description]
   * @param  [type] $pswd  [description]
   * @return [type]        [description]
   */
  public function checkUser($email, $pswd)
  {
    $DB = MySql::getInstance();
    $data ['email'] = $email;
    $data ['pswd'] = $pswd;
    $res = $DB->selectWhere ($this->table, $data);

//    var_dump ($res);
  }


  /**
   * [doLogin description]
   * @param  [type] $email [description]
   * @param  [type] $pswd  [description]
   * @return [type]        [description]
   */
  function doLogin ($email, $pswd){
    $DB = MySql::getInstance();
    $data ['email'] = $email;
    $data ['pswd'] = $pswd;
    $res = $DB->selectWhere ($this->table, $data);

//    echo '<pre>';
//    var_dump ($res);
//    echo '</pre>';

    if ($res['num_rows'] != 1) {
      return false;
    }else {
      $_SESSION ['user_id'] = $res['data'][0]['id'];
      $_SESSION ['user_data'] = $res['data'][0];
      $this->data = $res ['data'][0];
      return true;
    }



  }

  function saveUserToSession ($id, $data){
    $_SESSION ['user_id'] = $id;
    $_SESSION ['user_data'] = $data;
    $this->data = $data;
    $this->user_id = $id;

  }

  function doLogout (){
    // происходит выход из системы
    session_destroy ();
    header ('Location: /');
  }



  function isLogin (){
//    if ($this->user_id != 0){
//      return true;
//    }
/*    if (isset(Request::$data['_SESSION']['user_id'])){
      $this->user_id = Request::$data['_SESSION']['user_id'];
      $this->data = Request::$data['_SESSION']['user_data'];
      return true;
*/
    if (isset($_SESSION ['user_id'])){
      $this->user_id = $_SESSION ['user_id'];
      $this->data = $_SESSION ['user_data'];
      return true;

    }else {
      $this->data['user_id'] = 0;
      $this->data['user_name'] = 'Гость';
      return false;
    }
  }


}
