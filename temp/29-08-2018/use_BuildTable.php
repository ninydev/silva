<?php

include_once ('BuildTable.php');

$myTable = new BuildTable ();
$myTable->tableID = 'myID';
$myTable->tableCss = 'MyClass';
$myTable->randTable ();

//$food = array('fruits' => array('orange', 'banana', 'apple'), 'veggie' => array('carrot', 'collard', 'pea'));

//$myTable->setData ($food);

$myTable->flagDoEdit = true;
$myTable->colDoEdit = 2;

echo $myTable->generate ();
