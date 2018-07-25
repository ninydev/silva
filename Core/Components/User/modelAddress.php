<?php
namespace Core\Components\User;
use Core\Lib\BaseModel;
use Core\Lib\Request;
use Core\Lib\MySql;


/**
 *
 */
class modelAddress extends BaseModel
{
  public $data;
  public $address_id = 0;
  private $table = 'user_address';

  function __construct()  {
  }

  public function update ($data){
    $DB = MySql::getInstance();
    $ret = $DB->update ($this->table, $this->data, $this->address_id );
    return $ret;

  }

  public function getData(){
    return $this->data;
  }

  function create ($data){
    $DB = MySql::getInstance();
    $this->data ['street'] = Request::$data['_GET']['street'];
    $this->data ['house'] = Request::$data['_GET']['house'];
    $this->data ['flat'] = Request::$data['_GET']['flat'];
    $this->data ['city_id'] = Request::$data['_GET']['city_id'];
    $this->data ['user_id'] = Request::$user_id;
    $ret = $DB->insert ($this->table, $this->data);
    return $ret;

  }

  function all () {
    $DB = MySql::getInstance();
//    $this->data ['city_name'] = Request::$data['_GET']['city_name'];
//    $ret = $DB->insert ($this->table, $this->data);
    $ret = $DB->selectWhere($this->table);
    return $ret;
  }

}
