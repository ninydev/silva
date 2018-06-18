<?php
/**
 *
 */
namespace Core\Lib;

class Response extends BaseView
{
  public $head;
  public $header;
  public $content;
  public $footer;

  public function __construct (){
    $this->head = $this->render ('main/head', '');
  }

}
