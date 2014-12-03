<?php

$num1 = (int)$_POST[pid];
$num2 = (int)$_POST[qid];
$valuesAray= array();
$valuesArray[]=array("c"=>array(array("v"=>"Mushrooms","f"=>null),array("v"=>$num1,"f"=>null)));
$valuesArray[]=array("c"=>array(array("v"=>"Tomato","f"=>null),array("v"=>$num2,"f"=>null)));
$valuesArray[]=array("c"=>array(array("v"=>"Pepino","f"=>null),array("v"=>7,"f"=>null)));

$ar = array (
		"cols" => array (
				array (
						"id" => "",
						"label" => "Topping",
						"pattern" => "",
						"type" => "string" 
				),
				array (
						"id" => "",
						"label" => "Slices",
						"pattern" => "",
						"type" => "number" 
				) 
		),
		"rows"=>$valuesArray

);
echo json_encode ( $ar );

?>