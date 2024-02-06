<?php
class POSModule {
 function query_add_pos($posArry){
   $sql = "INSERT INTO pos (".implode(", ",array_keys($posArry[0])).") VALUES";
   foreach($posArry as $row) {
    $sql.=" ('".implode("', '", $row)."'),";
   }
   return chop($sql,",");
 }
 function query_update_pos($pos, $help){
   $sql="UPDATE pos SET";
   if(strlen($pos)>0){ $sql.=" pos='".$pos."',"; }
   if(strlen($help)>0){ $sql.=" help='".$help."',"; }
   return $sql;
 }
 function query_list_pos(){
  return "SELECT * FROM pos;";
 }
}

$posModule = new POSModule();