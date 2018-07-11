<?php
namespace Core\Components\User;

use Core\Lib\BaseController;
use Core\Lib\Request;
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

    /**
     * Перехватываю передачу данных в контроллер
     */
    //var_dump (Request::$data);
    if(
      isset(Request::$data['_GET']['controller']) &&
      Request::$data['_GET']['controller'] == 'User'  ){
        switch (Request::$data['_GET']['do']) {
          case 'echoFromReg':
              $this->buildRegisterForm ();
            break;
            case 'createUser':
                $this->create();
              break;

          default:
            // code...
            break;
        }

    }

    if ($this->model->isLogin() )
      $this->buildWelcome ();
    else
      $this->buildForm ();
      $this->view->put ($this->dataForm, 'column_left');
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


  /**
   * Строит форму ввода логина и пароля
   */
  function buildForm (){
    //$this->dataForm = '<h3> Тут когда то будет форма логина </h3>';
    $loginForm = new Form ('userLogin');
    $loginForm->addFild('hidden', 'controller', 1 , '', 'User');
    $loginForm->addFild('hidden', 'do',  2 , '', 'loginUser');
    $loginForm->addFild('text', 'email', 'email', 'E-mail');
    $loginForm->addFild('password', 'pswd', 'pswd', 'Пароль');
    $this->dataForm = $loginForm->getForm();
    $this->dataForm.= '<a href="' . $_SERVER['PHP_SELF'] . '?controller=User&do=echoFromReg"> Регистрация </a>';
  }


  /**
   * Строит форму ввода логина и пароля
   */
  function buildRegisterForm (){
    //$this->dataForm = '<h3> Тут когда то будет форма логина </h3>';
    $regForm = new Form ('userReg');
    $regForm->addFild('hidden', 'controller', 1 , '', 'User');
    $regForm->addFild('hidden', 'do',  2 , '', 'createUser');
    $regForm->addFild('text', 'email', 'email', 'E-mail');
    $regForm->addFild('text', 'nikname', 'Ваш ник', 'Ваш ник');
    $regForm->addFild('password', 'pswd', 'pswd', 'Пароль');
    $this->view->put ($regForm->getForm(), 'content');
  }



  /**
   * Строит для зарегистрированного пользователя меню
   */
  function buildWelcome (){
    $this->dataForm = 'Welcome';
    $this->dataForm = '<a href="/?doLogout=true" >Выйти </a>';
  }





}
