<?php
/**
 *
 */
class BuildTable
{
  public $data;
  public $tableCss = '';
  public $tableID = '';
  public $tableBorder = 1;

  public $flagDoEdit = false;
  public $urlDoEdit = 'index.php?doEdit=';
  public $colDoEdit = 0;

  public $flagDoDel = false;


  /**
   * Создание класса
   * @param Массив, который нужно вывести в TBODY
   */
  function __construct( $data = false){
    if (is_array($data)){
      $this->setData ($data);
    }
  }

  /**
   * Передать данные для вывода
   * @param array $data Массив данных для вывода
   */
  function setData ($data){
    $this->$data = $data;
    // ДЗ - проверить массив на двумерность
  }



  /**
   * Построить тело таблицы
   * @return String подготовленная строка HTML с TBODY
   */
  function buildTBody (){
    $ret = '<tbody>';

    for ($i = 0; $i< count($this->data); $i++){
      $ret.= '<tr>';

      for ($j = 0; $j < count ($this->data[$i]); $j++){
        $ret.= '<td>';
        $ret.= $this->data[$i][$j];
        $ret.= '</td>';
      }

      if ($this->flagDoEdit) {
        $ret.= '<td> <a href="' . $this->urlDoEdit . $this->data[$i][$this->colDoEdit] . '"> Edit </a></td>';
      }
      if ($this->flagDoDel) {
        $ret.= '<td> Del </td>';
      }

      $ret.= '</tr>';
    }
    // ДЗ - переписать вывод массива так, что бы ключи не влияли на работу

    $ret.= '</tbody>';
    return $ret;
  }


  /**
   * Построить заголово таблицы
   * @return String подготовленная строка HTML с THEAD
   */
  function buildTHead (){
    // ДЗ - если ключи - не числа - создать THEAD
  }

  /**
   * Строит всю таблицу
   * @return String подготовленная строка HTML с TABLE
   */
  function generate (){
    $ret = '<table';
    if (strlen($this->tableBorder) > 0 ){
      $ret.= ' border="'.$this->tableBorder .'"';
    }
    if (strlen($this->tableCss) > 0 ){
      $ret.= ' class="'.$this->tableCss .'"';
    }
    if (strlen($this->tableID) > 0 ){
      $ret.= ' id="'.$this->tableID .'"';
    }
    $ret.= ' >';

    if (is_array($this->data)){
      $ret.= $this->buildTHead();
      $ret.= $this->buildTBody();
    }else {
      $ret.= ' No Data to Display ';
    }

    $ret.= '</table>';
    return $ret;
  }

  /**
   * Случайная таблица
   * @param  integer $ci  количество столбцов
   * @param  integer $cj  количество строк
   * @param  integer $cmin минимальное значение ячейки
   * @param  integer $cmax максимальное значение ячейки
   * @return Array  Созданный массив
   */
  function randTable ($ci = 10, $cj = 5, $cmin = 1, $cmax = 10){

    for ($i = 0; $i< $ci; $i++){
      for ($j = 0; $j < $cj; $j++){
          $ret [$i][$j] = rand($cmin, $cmax);
      }
    }

    $this->data = $ret;
  }




}
