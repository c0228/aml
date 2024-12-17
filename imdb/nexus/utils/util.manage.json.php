<?php

class JSONManager {

}

$data =[
    ["key1" =>"value1","key2" => "value2"],
    ["key1" =>"value01","key2" => "value02"]
 ];

 $data1 =[
    "I-0" => ["key1" =>"value1","key2" => "value2"],
    "I-1" => ["key1" =>"value01","key2" => "value02"]
 ];

echo json_encode($data1);
echo count($data1);


// echo json_encode(array_values($data));

?>