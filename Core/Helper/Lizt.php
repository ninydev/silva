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
class Lizt
{
  public $lists;
  public $method = 'GET';
  public $id;
  public $typeUl = array ('disc', 'circle', 'square');

  function __construct($id = '', $method = 'GET'){
    $this->method = $method;
    $this->id = $id;
  }

  /**
   * Создает запись о поле
   * @param [type] $type  [N - numeric, M - markered, T - list of terms]
   * @param [type] $internalType [description]
   * @param string $class [description]
   */

   function addList ($view, $content, $type = '', $start = '', $reversed = '', $name = ''){
     $list['view'] = $view;
     $list['content'] = $content;
     $list['type'] = $type;
     $list['start'] = $start;
     $list['reversed'] = $reversed;
     $list['name'] = $name;

     $this->lists[] = $list;
   }


     /**
      * Строит форму
      * @return HTML код формы
      */
     function getList (){
       $res = '<div class="list-group">';
//       $res.= $this->buildName ($list['name']);
       foreach ($this->lists as $list) {
         switch ($list['view']) {
           case 'N':
           case 'numeric':
             $res.= $this->buildName ($list['name']);
             $res.= $this->buildListNumeric ($list);
             break;
           case 'M':
           case 'markered':
             $res.= $this->buildName ($list['name']);
             $typeKey = array_search ($list['type'], $this->typeUl);
             $res.= $this->buildListMarkeredNested ($list, $list['content'], $typeKey);
             break;
           case 'T':
           case 'terms':
             $res.= $this->buildName ($list['name']);
             $res.= $this->buildListOgTerms($list);
             break;

           default:
             $res.= ' Неверный формат поля ';
             break;
         }
       }
       $res.= '</div>';
       return $res;
     }


       /**
        * Строит поле на основе данных
        * @param  данные поля
        * @return HTML код поля
        */

        function buildName ($name) {
          if (strlen($name) > 0)
             $res = '<h3>' . $name . ':</h3>';
           return $res;
        }

       function buildListNumeric ($list){
         $res = '<ol
         type="' . $list['type'] . '"
         start="' . $list['start'] . '"
         ' . $list['reversed'] . '>';
         foreach ($list['content'] as $value) {
           $res.= '    <li>' . $value . '</li>';
         }
         $res.= '</ol>' . PHP_EOL;
         return $res;
       }

       function buildListMarkeredNested ($list, $Nested, $typeKey) {
         //var_dump ($typeKey);
         $keyList = array_search ($Nested, $list);              // находим ключ подуровня списка
         if ($typeKey > 2) $typeKey = $typeKey - 3;             // меняем тип маркировки списка для этого подуровня
         $res = '<ul type="' . $this->typeUl[$typeKey] . '" >'; //устанавливаем новый (вложеный) список
         foreach ($list[$keyList] as $value) {                  // перебираем элементы вложенного списка
             if (!is_array($value)) {                           // проверяем их на отсутствие вложенных списков
               $res.= '<li>' . $value . '</li>';                // стоим обычный список если вложенных элементов нет
             }
             else {                                             // если вложенные списки в данном списке есть:
               $typeKey++;                                      // меняем тип маркировки списка на следующий в массиве типов $typeUl
               $res.= $this->buildListMarkeredNested ($list[$keyList], $value, $typeKey); // рекурсия
               $typeKey--;                                      // меняем тип маркировки списка на предидущий в массиве типов $typeUl
             }
         }
         $res.= '</ul>' . PHP_EOL;                               // закрываем текущий подуровень списка
         return $res;                                            // возвращаем результат
       }

       function buildListNumericNested ($list, $nested){
         $res.= '<ol
         type="' . $list['type'] . '"
         start="' . $list['start'] . '"
         ' . $list['reversed'] . '>';
         $i = 0;
         foreach ($list['content'] as $value) {
           if (!is_array($value)){
             $res.= '    <li>' . $value . '</li><!-' . $nested . $i++ . '.->';
           }

         }
         $res.= '</ol>' . PHP_EOL;
         return $res;
       }

}
