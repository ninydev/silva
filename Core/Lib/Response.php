<?php
/**
 *
 */
namespace Core\Lib;
use Core\Config\AppConfig;

class Response
{
  public static $data; // Соберу всю конструкцию страницы

  public function __construct (){
    self::$data['tplPath'] = AppConfig::$tplDir  . AppConfig::$tplLayoutWeb;
    $this->buildDataHead ();
    $this->buildDataHeader ();
    $this->buildDataFooter ();
  }

  /**
   * Формирует данные для нашего заголовка
   *
   */
  public function buildDataHead(){
    self::$data['head']['title'] = 'Мои ДЗ';

    $css [] = 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css';
    $css [] = 'css/mymenu.css';
      self::$data['head']['css'] = $css;

    $js[] = 'https://code.jquery.com/jquery-3.3.1.slim.min.js';
    $js[] = 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js';
    $js[] = 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js';
      self::$data['head']['js'] = $js;

    $meta [0]['name'] = 'autor';
    $meta [0]['val'] = 'Roman Tarasenko';
      self::$data['head']['meta']  = $meta;
  }


  public function buildDataHeader(){
    self::$data['header']['siteName'] = AppConfig::$AppName;
  }

  public function buildDataFooter(){
    self::$data['footer']['copy'] = AppConfig::$AppCopy;
  }


  public function getFull (){
    $data = self::$data;
    include ($data['tplPath'] . '/index.tpl.php');
  }

}
