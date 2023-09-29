<?php

$somrRR = array();

//$data = json_decode(trim(file_get_contents("php://input")) ,true);

//$string_version = implode(',', $data);

 //array_push($somrRR , array($string_version ));


array_push($somrRR ,  array ('NR','Col2','Col3','Col4'));

for ($x = 1; $x <= 102; $x++) {
    
    array_push($somrRR ,   
    array ( strval($x) , 'someV' . strval($x)  , 'someV2' . strval($x*10) ,  '****'  ) );
  }



echo json_encode($somrRR);
?>