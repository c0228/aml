<?php
require_once './../constants/codes.php';
require_once './../constants/helper.php';
require_once './../utils/util.manage.file.php';

$BASE_DIR = './../../data';

if(isset($_GET["action"]) && $_GET["action"]=='CREATE_FILE' && $_SERVER['REQUEST_METHOD'] === 'POST'){
  $htmlData = json_decode( file_get_contents('php://input'), true );
  $topic = ''; if( array_key_exists("topic", $htmlData) ){ $topic = $htmlData["topic"];   }
  $basePath = $BASE_DIR.'/'.$topic;
  $files = $htmlData["files"];
  $result = $fileManager->createFiles($basePath,$files);
  echo json_encode($result, JSON_PRETTY_PRINT);
}