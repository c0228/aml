<?php
require_once './../constants/codes.php';
require_once './../constants/helper.php';
require_once './../utils/util.manage.folder.php';
require_once './../utils/util.manage.file.php';

$BASE_DIR = './../../data';

/** TOPICS AND FILES VIEW MANAGEMENT */
if(isset($_GET["action"]) && $_GET["action"]=='LIST_VIEW' && $_SERVER['REQUEST_METHOD'] === 'GET'){
    $result = $folderManager->viewDirectoryContents($BASE_DIR);
    echo json_encode($result, JSON_PRETTY_PRINT);
}
/** TOPICS MANAGEMENT */
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
/** FILES MANAGEMENT */
else if(isset($_GET["action"]) && $_GET["action"]=='CREATE_FILE' && $_SERVER['REQUEST_METHOD'] === 'POST'){
 $htmlData = json_decode( file_get_contents('php://input'), true );
 $topic = ''; if( array_key_exists("topic", $htmlData) ){ $topic = $htmlData["topic"];   }
 $basePath = $BASE_DIR.'/'.$topic;
 $files = $htmlData["files"];
 $result = $fileManager->createFiles($basePath,$files);
 echo json_encode($result, JSON_PRETTY_PRINT);
}
else if(isset($_GET["action"]) && $_GET["action"]=='UPDATE_FILE' && $_SERVER['REQUEST_METHOD'] === 'POST'){
 $htmlData = json_decode( file_get_contents('php://input'), true );
 $topic = ''; if( array_key_exists("topic", $htmlData) ){ $topic = $htmlData["topic"];   }
 $basePath = $BASE_DIR.'/'.$topic;
 $files = $htmlData["files"];
 $result = $fileManager->updateFiles($basePath,$files);
 echo json_encode($result, JSON_PRETTY_PRINT);
}
else if(isset($_GET["action"]) && $_GET["action"]=='DELETE_FILE' && $_SERVER['REQUEST_METHOD'] === 'POST'){
 $htmlData = json_decode( file_get_contents('php://input'), true );
 $topic = ''; if( array_key_exists("topic", $htmlData) ){ $topic = $htmlData["topic"];   }
 $basePath = $BASE_DIR.'/'.$topic;
 $files = $htmlData["files"];
 $result = $fileManager->deleteFiles($basePath,$files);
 echo json_encode($result, JSON_PRETTY_PRINT);
}
else {
 echo 'NO_ACTION';
}
?>