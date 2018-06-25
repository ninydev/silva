<?php
namespace Core\Components\User;

use Core\Lib\BaseController;
use Core\Helper\Form;


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

    if ($this->model->isLogin() )
      $this->buildWelcome ();
    else
      $this->buildForm ();

    $this->putForm ();
  }





  function buildForm (){
    //$this->dataForm = '<h3> Тут когда то будет форма логина </h3>';
    $loginForm = new Form ('userLogin');
    $loginForm->addFild('hidden', 'doLogin', 'doLogin');
    $loginForm->addFild('text', 'login', 'login', 'Логин');
    $loginForm->addFild('password', 'password', 'password', 'Пароль');
    $this->dataForm = $loginForm->getForm();
  }

  function buildWelcome (){
    $this->dataForm = 'Welcome';
  }



  function putForm (){
    $this->view->put ($this->dataForm, 'column_left');
  }


}
