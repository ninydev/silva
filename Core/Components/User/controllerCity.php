<?php
namespace Core\Components\User;

use Core\Lib\BaseController;
use Core\Lib\Request;


/**
 * Управляет текущим пользователем и его возможностями
 *
 * - Блюдо
 */
class controllerUser extends BaseController
{

  public $dataForm; // HTML код нашей формы
  public $view; // Экземпляр view
  public $model; // Экземпляр view

  function __construct(){
    $this->view = new viewUser();
    $this->model = new modelUser();
  }

  /**
   * Создаем пользователя
   */
   function create(){
     $data = Request::$data['_GET'];
     // Проверки полученных данных с формы
     $res = $this->model->create($data);
     $this->view->put ($res, 'content');
   }


    function echoEditForm (){
    }

    function update (){
      // тут меняется
      $data ['city_name'] = Request::get('nikname');
      $data ['pswd'] = Request::get('pswd');

      $res =  $this->model->update ($data);
      if ($res['error'] == 0) {
        $this->model->saveUserToSession ($this->model->user_id, $data);
        $out['msg'] = 'Данные обновлены';
        $this->view->put ($out, 'content');
      }else {
        $out['error'] = 'Ошибка';
        $this->view->put ($out, 'content');

      }
      $data['id'] =$this->model->user_id;
      $this->view->buildEditForm($data);


    }


}
