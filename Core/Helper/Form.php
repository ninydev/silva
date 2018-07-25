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

/**  function __destruct (){
    echo 'Форма уничтожена';
  }
**/

  /**
   * Создает запись о поле
   * @param [type] $type  [description]
   * @param [type] $name  [description]
   * @param [type] $id    [description]
   * @param [type] $label [description]
   * @param string $value [description]
   * @param string $class [description]
   */
  function addFild ($type, $name, $id, $label, $value = '', $class = '', $array = ''){
    $fild['type'] = $type;
    $fild['name'] = $name;
    $fild['id'] = $id;
    $fild['label'] = $label;
    $fild['value'] = $value;
    $fild['class'] = $class;
    $fild['array'] = $array;
    $this->filds[] = $fild;

  }

  /**
   * Строит форму
   * @return HTML код формы
   */
  function getForm (){
    $res = '<div class="form-group"><form action="index.php" method="' . $this->method . '" >';
    foreach ($this->filds as $fild) {
      switch ($fild['type']) {
        case 'text':
        case 'password':
        case 'submit':
        case 'reset':
        case 'email':
          $res .= $this->buildLineFild ($fild);
          break;
        case 'select':
          $res .= $this->buildSelectFild ($fild);
          break;
        case 'radio':
        case 'checkbox':
          $res .= $this->buildLineFildRadioChekbox($fild);
          break;
          case 'hidden':
            $res .= $this->buildHiddenFild ($fild);
            break;

        default:
          $res.= ' Неверный формат поля ';
          break;
      }
    }
    $res.= '<br /><input type="reset" class="btn btn-danger"/>' . PHP_EOL;
    $res.= '<input type="submit" class="btn btn-success"/></div>' . PHP_EOL;

    return $res;
  }

  /**
   * Строит поле на основе данных
   * @param  данные поля
   * @return HTML код поля
   */
  function buildLineFild ($fild){
    $res = '<br /><label for="'. $fild['id'] .'">'. $fild['label'] .'</label>';
    $res.= '<input ' .
    ' type="' . $fild['type'] . '" '.
    ' name="' . $fild['name'] . '" ' .
    ' id="' . $fild['id'] . '" ' .
    ' class="' . $fild['class'] . '" ' .
    ' />' . PHP_EOL;
    return $res;
  }

  /*function buildLineFildRadioChekbox ($fild){

    for ($i = 0; $i < count($fild['name']); $i++) {
      <input type="checkbox" class="checkbox" id="checkbox" />
      <label for="checkbox">Я переключаю чекбокс</label>
    }

    return $res;
  }
*/
  function buildSelectFild ($fild){
//    var_dump ($fild['value']);
    $res = '<br /><label for="'. $fild['id'] .'">'. $fild['label'] .'</label>';
    $res.= '<select ' .
    ' name="' . $fild['name'] . '" ' .
    ' id="' . $fild['id'] . '" ' .
    ' class="' . $fild['class'] . '" ' .
    ' />' . PHP_EOL;
    foreach ($fild['value'] as $value) {
        $res.= '<option value ="' . $value['id'] . '">'. $value['city_name'] .'</option>'. PHP_EOL;
    }
    $res.= '</select>' . PHP_EOL;
    return $res;
  }

  function buildHiddenFild ($fild){
    $res = '';
    $res.= '<input ' .
    ' type="' . $fild['type'] . '" '.
    ' name="' . $fild['name'] . '" ' .
    ' id="' . $fild['id'] . '" ' .
    ' class="' . $fild['class'] . '" ' .
    ' value="' . $fild['value'] . '" ' .
    ' />' . PHP_EOL;
    return $res;
  }

}
