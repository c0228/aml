<?php
require_once './../constants/codes.php';
require_once './../constants/helper.php';
require_once './../utils/util.manage.folder.php';

$BASE_DIR = './../../data';

if(isset($_GET["action"]) && $_GET["action"]=='LIST_VIEW' && $_SERVER['REQUEST_METHOD'] === 'GET'){
    $result = $folderManager->viewDirectoryContents($BASE_DIR);
    echo json_encode($result, JSON_PRETTY_PRINT);
}
else if(isset($_GET["action"]) && $_GET["action"]=='TOPICS_ADD' && $_SERVER['REQUEST_METHOD'] === 'POST'){
 $topicsList = json_decode( file_get_contents('php://input'), true );	
 if(count($topicsList)>0){
  $result = $folderManager->createDirectories($BASE_DIR,$topicsList["topics"]);
  echo json_encode($result, JSON_PRETTY_PRINT);
 }
} 
else if(isset($_GET["action"]) && $_GET["action"]=='TOPICS_UPDATE' && $_SERVER['REQUEST_METHOD'] === 'POST'){
 $topicsList = json_decode( file_get_contents('php://input'), true );
 $result = $folderManager->updateDirectoriesName($BASE_DIR, $topicsList["topics"]);
 echo json_encode($result, JSON_PRETTY_PRINT);
}
else if(isset($_GET["action"]) && $_GET["action"]=='TOPICS_DELETE' && $_SERVER['REQUEST_METHOD'] === 'POST'){
 $topicsList = json_decode( file_get_contents('php://input'), true );
 $result = $folderManager->deleteDirectories($BASE_DIR,$topicsList["topics"]);
 echo json_encode($result, JSON_PRETTY_PRINT);
}
else {
 echo 'NO_ACTION';
}
?>