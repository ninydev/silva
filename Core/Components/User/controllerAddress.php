<?php
namespace Core\Components\User;

use Core\Lib\BaseController;
use Core\Lib\Request;


/**
 * Управляет текущим пользователем и его возможностями
 *
 * - Блюдо
 */
class controllerAddress extends BaseController
{

  public $dataForm; // HTML код нашей формы
  public $view; // Экземпляр view
  public $model; // Экземпляр view

  function __construct(){
    $this->view = new viewAddress();
    $this->model = new modelAddress();
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


    function echoAddressForm (){
      $city = new modelCity();
      $data ['city'] = $city->all();
      $data ['address'] = $this->model->getData();
      $this->view->buildAddressForm($data);
    }

    /**
     * Вывести список городов
     * @return
     */
    function echoAll (){
      $res = $this->model->all();
      $city = new modelCity();
      $tmp = $city->all();
//      $res['city'] = $tmp['data'];
      for ($i=0; $i <count($tmp['data']) ; $i++) {
        $res['city'][$tmp['data'][$i]['id']] = $tmp['data'][$i]['city_name'];
      }

      $this->view->echoAll ($res );
      //$this->view->put ($res, 'content');
    }

    function doDel ($id){
      $res = $this->model->delete($id);
      $this->view->put ($res, 'content');
    }

    /*function update (){
      // тут меняется
      $data ['city_name'] = Request::get('city_name');
      $res =  $this->model->update ($data);
      if ($res['error'] == 0) {
        $this->model->saveUserToSession ($this->model->city_id, $data);
        $out['msg'] = 'Данные обновлены';
        $this->view->put ($out, 'content');
      }else {
        $out['error'] = 'Ошибка';
        $this->view->put ($out, 'content');

      }
      $data['id'] =$this->model->city_id;
      $this->view->buildCityForm($data);


    }*/


}
