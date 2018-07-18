<?php
namespace Core\Components\User;
use Core\Lib\BaseModel;
use Core\Lib\Request;
use Core\Lib\MySql;


/**
 *
 */
class modelCity extends BaseModel
{
  public $data;
  public $user_id = 0;
  private $table = 'city';

  function __construct()  {
  }

  public function update ($data){
    $DB = MySql::getInstance();
    $ret = $DB->update ($this->table, $data, $this->user_id );
    return $ret;

  }

  public function getData(){
    return $this->data;
  }

  function create ($data){
    $DB = MySql::getInstance();
    $ret = $DB->insert ($this->table, $data);
    return $ret;
  }

}
