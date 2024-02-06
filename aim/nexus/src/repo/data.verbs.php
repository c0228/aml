<?php
class VerbModule {
 function query_add_verb($verbArry){
   $sql = "INSERT INTO verbs (".implode(", ",array_keys($verbArry[0])).") VALUES";
   foreach($verbArry as $row) {
    $sql.=" ('".implode("', '", $row)."'),";
   }
   return chop($sql,",");
 }
 function query_update_verb($v1,$v2, $v3, $v4){
   $sql="UPDATE verbs SET";
   if(strlen($v1)>0){ $sql.=" v1='".$v1."',"; }
   if(strlen($v2)>0){ $sql.=" v2='".$v2."',"; }
   if(strlen($v3)>0){ $sql.=" v3='".$v3."',"; }
   if(strlen($v4)>0){ $sql.=" v4='".$v4."',"; }
   return $sql;
 }
 function query_list_verbs(){
  return "SELECT * FROM verbs;";
 }
 function query_get_verbInfo($verb){
  return "SELECT * FROM verbs WHERE verb='".$verb."';";
 }
 function query_find_verbs($associativeArray){ // Build a dynamic SQL query
  $query = "SELECT * FROM verbs WHERE (";
  $placeholders = array();
  foreach ($associativeArray as $key => $word) {
    $placeholders[] = " '$word'  LIKE CONCAT('%', v1, '%') OR ".
      " '$word'  LIKE CONCAT('%', v2, '%') OR ".
      " '$word'  LIKE CONCAT('%', v3, '%') OR ".
      " '$word'  LIKE CONCAT('%', v4, '%') ";
  }
  $query .= implode(' OR', $placeholders);
  $query .= " )";
  return $query;
 }
}

$verbModule = new VerbModule();