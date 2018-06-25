<?php
/**
 *
 * Вспомогательные классы - определение
 * @link https://ru.wikipedia.org/wiki/%D0%92%D1%81%D0%BF%D0%BE%D0%BC%D0%BE%D0%B3%D0%B0%D1%82%D0%B5%D0%BB%D1%8C%D0%BD%D1%8B%D0%B9_%D0%BA%D0%BB%D0%B0%D1%81%D1%81_(%D0%B8%D0%BD%D1%84%D0%BE%D1%80%D0%BC%D0%B0%D1%82%D0%B8%D0%BA%D0%B0)
 *
 * Список полезных хелперов
 * @link https://habr.com/post/70808/
 *
 * HTML теги
 * @link http://htmlbook.ru/html/form
 * @link http://htmlbook.ru/html/input
 *
 */
namespace Core\Helper;

/**
 *
 */
class Form
{
  public $filds;
  public $method = 'GET';
  public $id;

  function __construct($id = '', $method = 'GET'){
    $this->method = $method;
    $this->id = $id;
  }

  /**
   * Создает запись о поле
   * @param [type] $type  [description]
   * @param [type] $name  [description]
   * @param [type] $id    [description]
   * @param [type] $label [description]
   * @param string $value [description]
   * @param string $class [description]
   */
  function addFild ($type, $name, $id, $label='', $value = '', $class=''){
    $fild['type'] = $type;
    $fild['name'] = $name;
    $fild['id'] = $id;
    $fild['label'] = $label;
    $fild['value'] = $value;
    $fild['class'] = $class;
    $this->filds[] = $fild;
  }

  /**
   * Строит форму
   * @return HTML код формы
   */
  function getForm (){
    $res = '<br/><div><form action="/index.php" method="' . $this->method . '" >';
    foreach ($this->filds as $fild) {
      //var_dump ($fild);
      switch ($fild['type']) {
        case 'text':
        case 'password':
        case 'radio':
        case 'submit':
        case 'reset':
          $res .= $this->buildLineFild ($fild);
          break;

        case 'hidden':
          $res .= $this->buildHiddenFild ($fild);
          break;


        default:
          $res.= ' Неверный формат поля ';
          break;
      }
    }
    $res.= '<br/><input type="reset" />' . PHP_EOL;
    $res.= '<br/><input type="submit" /></div>' . PHP_EOL;

    return $res;
  }

  /**
   * Строит поле на основе данных
   * @param  данные поля
   * @return HTML код поля
   */
  function buildLineFild ($fild){
    $res = '<br/><label for="'. $fild['id'] .'">'. $fild['label'] .'</label>';
    $res.= '<input ' .
    ' type="' . $fild['type'] . '" '.
    ' name="' . $fild['name'] . '" ' .
    ' id="' . $fild['id'] . '" ' .
    ' class="' . $fild['class'] . '" ' .
    ' />' . PHP_EOL;
    return $res;
  }


  function buildHiddenFild ($fild){
    $res = '';
    $res.= '<input ' .
    ' type="' . $fild['type'] . '" '.
    ' name="' . $fild['name'] . '" ' .
    ' id="' . $fild['id'] . '" ' .
    ' class="' . $fild['class'] . '" ' .
    ' />' . PHP_EOL;
    return $res;
  }

}
