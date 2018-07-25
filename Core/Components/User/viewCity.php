<?php
namespace Core\Components\User;
use Core\Lib\BaseView;
use Core\Lib\Request;
use Core\Helper\Form;



class viewCity extends BaseView
{
  /**
   * Строит форму ввода города
   */

  function buildCityForm ($data){
  //    var_dump($data);
    $cityForm = new Form ('userCity');
    $cityForm->addFild('hidden', 'controller', '1' , '', 'City');
    $cityForm->addFild('hidden', 'do',  '2' , '', 'createCity');
    $cityForm->addFild('text', 'city_name','city_name' , 'Ваш город', $data['city_name']);
    $dataForm = $cityForm->getForm();
    $dataForm.= '<a href="' . $_SERVER['PHP_SELF'] . '?controller=City&do=doUpdateCity"> Изменить </a>';
    $this->put ($dataForm, 'content');
  }

  /**
   * Вывести список городов
   * @param  [type] $data [description]
   * @return [type]       [description]
   */
  function echoAll ($data){
    $res = '';

    $res.= 'Найдено '. $data['num_rows'] . ' городов в базе <br />';

    $res.= '<table class="table-dark table-striped table-hover">';

    for ($i=0; $i < count ($data['data']) ; $i++) {
      $res.= '<tr>';
      $res.= '<td>' . $i .  ' </td>';
      $res.= '<td>' . $data['data'][$i]['city_name'] .  ' </td>';
//      $res.= '<td> Редактировать ' . $data['data'][$i]['id'] .  ' </td>';
      $res.= '<td> <a href="/?controller=City&do=doDel&id=' . $data['data'][$i]['id']  .  '" > Удалить </td>';
      $res.= '</tr>';
    }

    $res.= '</table>';
    $res.= '<a href="/?controller=City&do=echoCityForm" > Добавить </a>';
    $this->put ($res, 'content');
  }



}
