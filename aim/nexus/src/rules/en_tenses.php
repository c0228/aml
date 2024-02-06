<?php
function createTokens($sentence){
 // Split the sentence into words and store them in an associative array
 $words = explode(' ', $sentence);
 // Create an associative array
 $associativeArray = array();
 foreach ($words as $key => $word) {
  $associativeArray[$key] = $word;
 }
 return $associativeArray;
}
/* PRESENT TENSE */
function tense($sentence){
  $associativeArray = createTokens($sentence);
  // print_r( $associativeArray );
  return  $associativeArray;
}