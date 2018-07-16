<?php
namespace Core\Components\User;
use Core\Lib\BaseView;
use Core\Lib\Request;
use Core\Helper\Form;



class viewUser extends BaseView
{
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
    $this->put ($regForm->getForm(), 'content');
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
    $dataForm = $loginForm->getForm();
    $dataForm.= '<a href="' . $_SERVER['PHP_SELF'] . '?controller=User&do=echoFromReg"> Регистрация </a>';
    $this->put ($dataForm, 'column_left');
  }


  /**
   * Строит для зарегистрированного пользователя меню
   */
  function buildWelcome (){
    $dataForm = 'Welcome';
    $dataForm.= '<a href="/?controller=User&do=logout" >Выйти </a>';
    $this->put ($dataForm, 'column_left');
  }

}
