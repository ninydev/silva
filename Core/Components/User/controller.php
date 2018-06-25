<?php
namespace Core\Components\User;

use Core\Lib\BaseController;
use Core\Helper\Form;


/**
 *
 */
class controllerUser extends BaseController
{
  public $dataForm; // HTML код нашей формы
  public $view; // Экземпляр view

  function __construct(){
    $this->view = new UserView();
  }

  function buildForm (){
    $this->dataForm = ' Тут когда то будет форма логина';
  }

  function putForm (){
    $view->put ($this->$dataForm, 'column_left');
  }


}
