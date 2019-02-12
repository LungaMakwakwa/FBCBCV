<?php

    $access_token = "EAAIDB7kFR8YBAKcSFIHGAemXVzAwmeyvy3vSen3WrNGoFdSiQWg88Ak766jPvuXPNtELMVSIGR1lsiDRN9BgZAkYv7quRxNzbgPCadJJtXlakrqMg9BwaIYsj6cdGiYrAs4nI8xGr7OvZBIZCbsrftlcZAJwkZBdvB2gZCMga7gwZDZD";
    $verify_token = "MyCVBot";
    $hub_verify_token = null;

    //var_dump($_REQUEST);

        if(isset($_REQUEST['hub_challenge']))
        {
            $challenge = $_REQUEST['hub_challenge'];
            $hub_verify_token = $_REQUEST['hub_verify_token'];

            if ($hub_verify_token === $verify_token) 
            {
                echo $challenge;
            }
        }



    //run this comand on terminal
    //curl -X POST "https://graph.facebook.com/v3.2/me/subscribed_apps?access_token=EAAIDB7kFR8YBAKcSFIHGAemXVzAwmeyvy3vSen3WrNGoFdSiQWg88Ak766jPvuXPNtELMVSIGR1lsiDRN9BgZAkYv7quRxNzbgPCadJJtXlakrqMg9BwaIYsj6cdGiYrAs4nI8xGr7OvZBIZCbsrftlcZAJwkZBdvB2gZCMga7gwZDZD";

    $input = json_decode(file_get_contents('php://input'), true);
    $sender = $input['entry'][0]['messaging'][0]['sender']['id'];
    $message = $input['entry'][0]['messaging'][0]['message']['text'];


    /////////////////////////////////////////////////////////////////////////////////////
    //              MESSAGES TO SEND 
    /////////////////////////////////////////////////////////////////////////////////////

    $msg = strtolower($message);

    if ((strpos($msg, 'hello') !== false) || (strpos($msg, 'hi') !== false) || (strpos($msg, 'goodmorning') !== false) || (strpos($msg, 'goodafternoon') !== false))
    {
        $message_to_reply = "Hello Welcome to my CV";
    }

    else if ((strpos($msg, 'name') !== false))
    {
        $message_to_reply = "My name is Lunga Makwakwa";
    }

    else if ((strpos($msg, 'github') !== false) || (strpos($msg, 'repository') !== false))
    {
        $message_to_reply = "My github link is https://github.com/The-only-blue";
    }

    else if ((strpos($msg, 'from') !== false) || (strpos($msg, 'live') !== false))
    {
        $message_to_reply = "Commissioner St & Rissik St, Johannesburg, 2001";
    }

    else if ((strpos($msg, 'about yourself') !== false) || (strpos($msg, 'school') !== false))
    {
        $message_to_reply = "I am a very strong, reliable and ambi3ous person. I strive and thrive on new challenges and intend to see challenges that bring posi3ve result in all aspects. I adapt well to new situa3ons, follow instruc3ons accurately and also develop confidence to handle day to day problems appropriately.";
    }

    else if ((strpos($msg, 'study') !== false) || (strpos($msg, 'education') !== false) || (strpos($msg, 'qualification') !== false))
    {
        $message_to_reply = "MICT SETA NQF LEVEL 5 (May 2018 – Present) WeThinkCode_, Tech Support NQF Level 4 (Jan 2017 – Dec 2017) ICollege, National Senior Certificate (Jan 2010 – Dec 2015), Edenglen High School";
    }

    else if ((strpos($msg, 'languages') !== false))
    {
        $message_to_reply = "PHP, Node.js, C, JS, SQL, C++, HTML/5, CSS/3, bootstrap, UNIX/POSIX and willing to learn more";
    }

    else if ((strpos($msg, 'intrests') !== false) || (strpos($msg, 'hobby') !== false))
    {
        $message_to_reply = "Gaming: Conceptual gammer. Graphic Design: Logo and Album Art design. Music Production: I produces, write and mix music. Tech news: Reading up on the latest Tech.";
    }

    else
    {
        $message_to_reply = "huh";
    }

    //API Url
    $url = 'https://graph.facebook.com/v3.2/me/messages?access_token='.$access_token;

    //Initiate cURL.
    $ch = curl_init($url);

    //The JSON data.
    $jsonData = '{"recipient":{"id":"'.$sender.'"},"message":{"text":"'.$message_to_reply.'"}}';

    //Encode the array into JSON.
    $jsonDataEncoded = $jsonData;

    //Tell cURL that we want to send a POST request.
    curl_setopt($ch, CURLOPT_POST, 1);

    //Attach our encoded JSON string to the POST fields.
    curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);

    //Set the content type to application/json
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

    //curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));

    //Execute the request
    if(!empty($input['entry'][0]['messaging'][0]['message'])){
        $result = curl_exec($ch);
    }

?>