<?php

require 'vendor/autoload.php';

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Request;

class FbBot
{
    private $hubVerifyToken = null;
    // private $challange = null;
    private $accessToken = null;
    private $tokken = false;
    protected $client = null;
    function __construct()
    {

    }

    ///Set The bots Token
    public function setHubVerifyToken($value)
    {
        $this->hubVerifyToken = $value;
        //return $value;
    }

    ///Set The bots Token
    public function setAccessToken($value)
    {
        $this->accessToken = $value;
        //return $value;
    }

    ///Verify The bots Token
    public function verifyTokken($hub_verify_token, $challange)
    {
        try 
        {
            if ($hub_verify_token === $this->hubVerifyToken) 
            {
               // echo "balls";
                //echo $challange;
                return $challange;
            }
            else 
            {
                throw new Exception("Tokken not verified");
            }
        }

        catch(Exception $ex) 
        {
            return $ex->getMessage();
        }
    }

    // will receive the incoming message and return it to sendMessage
    public function readMessage($input)
    {
        try
        {
            $payloads = null;

            //Senders id
            $senderId = $input['entry'][0]['messaging'][0]['sender']['id'];

            //return $senderId;
        
            //The message
            $messageText = $input['entry'][0]['messaging'][0]['message']['text'];
            //return $messageText;

            //The message
            //$postback = $input['entry'][0]['messaging'][0]['postback'];
            //return $postback;

            //any attachments
           // $loctitle = $input['entry'][0]['messaging'][0]['message']['attachments'][0]['title'];
            //return $loctitle;

            
            if (!empty($postback)) 
            {
                $payloads = $input['entry'][0]['messaging'][0]['postback']['payload'];
                return ['senderid' => $senderId, 'message' => $payloads];
            }
            
            if (!empty($loctitle))
            {
                $payloads = $input['entry'][0]['messaging'][0]['postback']       ['payload'];
                return ['senderid' => $senderId, 'message' => $messageText, 'location' => $loctitle];
            }

            //var_dump($senderId,$messageText,$payload);
            //   $payload_txt = $input['entry'][0]['messaging'][0]['message']['quick_reply']‌​['payload'];
            return ['senderid' => $senderId, 'message' => $messageText];
        }
        
        catch(Exception $ex) 
        {
            return $ex->getMessage();
        }
    }

    //which then match the message (using if statements) and return the answer to the Messenger.
    public function sendMessage($input)
    {
        try
        {

            $client = new Client();
           
            $url = "https://graph.facebook.com/v3.2/me/message?access_token=".$this->accessToken;

            $messageText = strtolower($input['message']);
           
            $senderId = $input['senderid'];
            $msgarray = explode(' ', $messageText);

            
            $response = null;
            $header = array(
                'content-type' => 'application/json'

            );

            if (in_array('hi', $msgarray))
            {
                $answer = "Hello! how may I help you today?";
                $response = ['recipient' => ['id' => $senderId], 'message' => ['text' => $answer], 'access_token' => $this->accessToken];
                return($response);
            }

        }

        catch(RequestException $e) 
        {
            $response = json_decode($e->getResponse()->getBody(true)->getContents());
            file_put_contents("test.json", json_encode($response));
            return $response;
        }
    }
}

?>