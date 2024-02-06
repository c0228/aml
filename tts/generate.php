<?php
if(isset($_GET["tts"]) && isset($_GET["lang"])){
$tts = $_GET["tts"];
$lang = $_GET["lang"];
$words = explode(' ', $tts);
print_r($words);
$filePath = 'audio/en/uk_brian/';
if($lang=='te'){
 $filePath = 'audio/te/rk/';
}
$outputPath = 'out/output.mp3';
$fileContents='';
foreach ($words as $word) {
 $audioFilePath =  $filePath.$word.'.mp3';
 // Check if the audio file exists before attempting to read it
 if(file_exists($audioFilePath)) {
  $fileContents .= @file_get_contents($audioFilePath);
  if($fileContents === false) {
	echo "Error reading file: $audioFilePath";
  }
 } else {
	echo "File not found: $audioFilePath";
 }
}
// Write the concatenated contents to the output file
file_put_contents($outputPath, $fileContents);
}
?>
