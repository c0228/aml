<?php
class WordModule {
  function query_suggest_words($wordArray) {
    $queryParts = array(); // Create an array to hold the query parts
    foreach ($wordArray as $inputWord) {
        $input = strtolower($inputWord);
        $queryParts[] = "(SELECT '$input' AS input_word, word FROM words WHERE SOUNDEX('$input') = SOUNDEX(word))";
    }
    // Combine the query parts using UNION
    $finalQuery = "SELECT input_word, word FROM (" . implode(' UNION ', $queryParts).") As subQuery;";
    return $finalQuery;
  }
 function query_add_word($wordArry){
   $sql = "INSERT INTO words (".implode(", ",array_keys($wordArry[0])).") VALUES";
   foreach($wordArry as $row) {
    $sql.=" ('".implode("', '", $row)."'),";
   }
   return chop($sql,",");
 }
 function query_update_word($word,$pos){
   $sql="UPDATE words SET";
   if(strlen($word)>0){ $sql.=" word='".$word."',"; }
   if(strlen($pos)>0){ $sql.=" pos='".$pos."',"; }
   return $sql;
 }
 function query_list_words(){
  return "SELECT * FROM words;";
 }
 function query_get_wordInfo($word){
  return "SELECT * FROM words WHERE word='".$word."';";
 }
}

$wordModule = new WordModule();