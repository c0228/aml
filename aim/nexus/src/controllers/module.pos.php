<?php

// Set headers to allow CORS
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST");
header("Access-Control-Allow-Headers: Content-Type");
header('Content-Type: application/json; charset=utf-8');
//
require_once './../core/app.database.php';
require_once './../core/app.initiator.php';
require_once './../rules/en_tenses.php';
require_once './../repo/data.words.php';
require_once './../repo/data.verbs.php';

if($_GET["action"]=='VIEW_POS_WORD' && $_SERVER['REQUEST_METHOD']=='POST'){
    $htmlData = json_decode( file_get_contents('php://input'), true );	
    $sentence = ''; if( array_key_exists("sentence", $htmlData) ){ $sentence = $htmlData["sentence"]; }
    $associativeArray = tense($sentence);
    echo $wordModule->query_suggest_words($associativeArray);
    // $query = $verbModule->query_find_verbs($associativeArray);
    // $data = json_decode( $database->getJSONData($query) );
    // print_r($associativeArray);
    // echo json_encode( $data );
}