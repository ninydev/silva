<?php


/**
 * Создание массива и наполнение его случайными значениями
 * @param  integer $ci  количество столбцов
 * @param  integer $cj  количество строк
 * @param  integer $cmin минимальное значение ячейки
 * @param  integer $cmax максимальное значение ячейки
 * @return Array  Созданный массив
 */
function createArray ($ci, $cj, $cmin = 1, $cmax = 10){

  for ($i = 0; $i< $ci; $i++){
    for ($j = 0; $j < $cj; $j++){
        $ret [$i][$j] = rand($cmin, $cmax);
    }
  }

  return $ret;
}


$myArr = createArray (4, 40);


/**
 * Вывод таблицы по существующему двумерному массиву
 * @param  array $inArr Массив
 * @return String погготовленная строка HTML с таблицей
 */
function getTable ($inArr){
  $ret = '<table border="1">';

  for ($i = 0; $i< count($inArr); $i++){
    $ret.= '<tr>';

    for ($j = 0; $j < count ($inArr[$i]); $j++){
      $ret.= '<td>';
      $ret.= $inArr[$i][$j];
      $ret.= '</td>';
    }

    $ret.= '</tr>';
  }

  $ret.= '</table>';
  return $ret;
}


echo getTable ($myArr);



/**
 * Вывод таблицы по существующему двумерному массиву инверсия
 * @param  array $inArr Массив
 * @return String погготовленная строка HTML с таблицей
 */
 function getTableInvercive ($inArr){
   $ret = '<table border="1">';
   $sto = count($inArr);         //столбцы
   //echo 'Столбцы будущей таблицы:' . $sto . '<br>';
   $str = count ($inArr[0]);            //строки
   //echo 'Строки будущей таблицы:' . $str . '<br>';

   for ($i = 0; $i< $str; $i++){
     $ret.= '<tr>';

     for ($j=0; $j < $sto; $j++){
       $ret.= '<td>';
       $ret.= $inArr[$j][$i];
       $ret.= '</td>';
     }

     $ret.= '</tr>';
   }

   $ret.= '</table>';
   return $ret;
 }



echo getTableInvercive ($myArr);





echo '<hr>';
echo 'Sorce Array';
echo '<pre>';
var_dump ($myArr);
echo '</pre>';





?>
