<?php
namespace Core\Components\User;
use Core\Lib\BaseView;
use Core\Lib\Request;
use Core\Helper\Form;



class viewAddress extends BaseView
{
  /**
   * Строит форму ввода города
   */

  function buildAddressForm ($data){
  //    var_dump($data);
    $addressForm = new Form ('userAddress');
    $addressForm->addFild('hidden', 'controller', '1' , '', 'Address');
    $addressForm->addFild('hidden', 'do',  '2' , '', 'createAddress');
    //$a['array'] = $data['city']['data'];
    $addressForm->addFild('select', 'city_id','city_id' , 'Город', $data['city']['data']);
    $addressForm->addFild('text', 'street','street' , 'Улица', $data['address']['street']);
    $addressForm->addFild('text', 'house','house' , 'Дом', $data['address']['house']);
    $addressForm->addFild('text', 'flat','flat' , 'Квартира', $data['address']['flat']);
    $dataForm = $addressForm->getForm();
    $dataForm.= '<a href="' . $_SERVER['PHP_SELF'] . '?controller=Address&do=doUpdateAddress"> Изменить </a>';
    $this->put ($dataForm, 'content');
  }

  function echoAll ($data){
//    var_dump ($data['city']);
    $res = '';

    $res.= 'Найдено '. $data['num_rows'] . ' адресов в базе <br />';

    $res.= '<table class="table-dark table-striped table-hover">';

    for ($i=0; $i < count ($data['data']) ; $i++) {
      $res.= '<tr>';
      $res.= '<td>' . $i .  ' </td>';
      $res.= '<td>' . $data['city'][$data['data'][$i]['city_id']] .  ' </td>';
      $res.= '<td>' . $data['data'][$i]['street'] .  ' </td>';
      $res.= '<td>' . $data['data'][$i]['house'] .  ' </td>';
      $res.= '<td>' . $data['data'][$i]['flat'] .  ' </td>';
      //$res.= '<td> Редактировать ' . $data['data'][$i]['id'] .  ' </td>';
      $res.= '<td> <a href="/?controller=Address&do=doDel&id=' . $data['data'][$i]['id']  .  '" > Удалить </td>';
      $res.= '</tr>';
    }

    $res.= '</table>';
    $res.= '<a href="/?controller=Address&do=echoAddressForm" > Добавить </a>';
    $this->put ($res, 'content');
  }


}
