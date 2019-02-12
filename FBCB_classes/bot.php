<?php

    include 'FbBot.php';

    $tokken = $_REQUEST['hub_verify_token'];
    $hubVerifyToken = 'MyCVBot';
    $challange = $_REQUEST['hub_challenge'];
    //var_dump($_GET);
    $accessToken = 'EAAIDB7kFR8YBALeoGdDTZA3PUZBr8W1O7LJ64Av2uAcWbkvxNrdWgGZBEmDolwPdEUE0rZAdpik5e6ZC9kJN8GuQ85ZCPftwM8ZBqSZBDI2HTktLEnAAZAXW3mvIA35WHQDmAs7p59QtHVdwh0dx9Q3YXZCKDh3ZBJHLbVKrgjoivW2gQZDZD';
    $bot = new FbBot();

    //var_dump($bot);
    $bot->setHubVerifyToken($hubVerifyToken);
    $bot->setaccessToken($accessToken);
    echo $bot->verifyTokken($tokken,$challange);
    
    $bot = new FbBot();

    $input = json_decode(file_get_contents("php://input"), true);
    
    

    
    $message = $bot->readMessage($input);
   // var_dump($message)."<br>";
    
    $textmessage = $bot->sendMessage($message);
   //var_dump($textmessage);
