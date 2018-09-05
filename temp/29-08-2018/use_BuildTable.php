<?php

include_once ('BuildTable.php');

$myTable = new BuildTable ();
$myTable->tableID = 'myID';
$myTable->tableCss = 'MyClass';
$myTable->randTable ();
//$myTable->is_Colspan[1][1] = 3;
//$myTable->is_Rowspan[2][0] = 3;
//$myTable->is_Separator[2] = true;


//$food = array('fruits' => array('orange', 'banana', 'apple'), 'veggie' => array('carrot', 'collard', 'pea'));

//$myTable->setData ($food);

//$myTable->flagDoEdit = true;
//$myTable->colDoEdit = 2;

$myArr = array(
  '0' => array ('Country, Code', 'City, Phone'),
  '1' => array ('Ukraine', '+38', 'Mikolaev', '0512'),
  '2' => array ('Odessa', '048')

);
//$myTable->flagShowCounter = true;
$myTable->data = $myArr;
$myTable->is_Colspan[0][0] = 2;
$myTable->is_Colspan[0][1] = 2;
$myTable->is_Rowspan[1][0] = 2;
$myTable->is_Rowspan[1][1] = 2;

echo $myTable->generate ();
