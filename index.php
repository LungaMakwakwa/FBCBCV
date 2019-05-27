<?php

	include("Messenger.php");
    $apiKey = "" //facebook webhook api key;
    

	// Instances the Facebook class
    $facebook = new Messenger($apiKey);

    echo $_REQUEST['hub_challenge'];
    

    // Take text and chat_id from the message
    $text = $facebook->Text();
    $msg = strtolower($text);
	$chat_id = $facebook->ChatID();
	//$message_id = $facebook->EntryID();
	$message = "";
    $result = "";


	if(!is_null($msg) && !is_null($chat_id))
	{
        //$facebook->sendChatAction($chat_id, 'typing_on');
		if ((strpos($msg, 'hello') !== false) || (strpos($msg, 'hi') !== false) || (strpos($msg, 'goodmorning') !== false) || (strpos($msg, 'goodafternoon') !== false)) // simple text message
		{
			$facebook->sendChatAction($chat_id, 'mark_seen');
            $facebook->sendChatAction($chat_id, 'typing_on');
			$message = "Hello, How are you?";
            $result = $facebook->sendMessage($chat_id, $message);
            $facebook->sendChatAction($chat_id, 'typing_off');
		}

		else if ((strpos($msg, 'good') !== false) || (strpos($msg, 'great') !== false) || (strpos($msg, 'fine') !== false) || (strpos($msg, 'ok') !== false)) // quick replies
		{
			$facebook->sendChatAction($chat_id, 'mark_seen');
			$facebook->sendChatAction($chat_id, 'typing_on');
			$message = "I am good thanks, Here are some questions you can ask me?";
			$replies = array(
				array(
					'content_type' => 'text',
					'title' => 'Whats your Name?',
					'payload' => 'PAYLOAD_ONE'
				),
				array(
					'content_type' => 'text',
					'title' => 'qualifications?',
					'payload' => 'PAYLOAD_TWO'
				),
				array(
					'content_type' => 'text',
					'title' => 'Where do you live?',
					'payload' => 'PAYLOAD_THREE'
				)
			);
			$result = $facebook->sendQuickReply($chat_id, $message, $replies);
			$facebook->sendChatAction($chat_id, 'typing_off');
		}

		else if ((strpos($msg, 'name') !== false) || (strpos($msg, 'old') !== false)) // quick replies
		{
			$facebook->sendChatAction($chat_id, 'mark_seen');
			$facebook->sendChatAction($chat_id, 'typing_on');
			$message = "My name is Lunga Makwakwa and i am 21 years old.";
			$replies = array(
				array(
					'content_type' => 'text',
					'title' => 'about yourself?',
					'payload' => 'PAYLOAD_ONE'
				),
				array(
					'content_type' => 'text',
					'title' => 'Where do you live?',
					'payload' => 'PAYLOAD_TWO'
				),
				array(
					'content_type' => 'text',
					'title' => 'qualifications?',
					'payload' => 'PAYLOAD_THREE'
				)
			);
			$result = $facebook->sendQuickReply($chat_id, $message, $replies);
			$facebook->sendChatAction($chat_id, 'typing_off');
		}

		else if ((strpos($msg, 'from') !== false) || (strpos($msg, 'live') !== false)) // quick replies
		{
			$facebook->sendChatAction($chat_id, 'mark_seen');
			$facebook->sendChatAction($chat_id, 'typing_on');
			$message = "Commissioner St & Rissik St, Johannesburg, 2001";
			$replies = array(
				array(
					'content_type' => 'text',
					'title' => 'qualifications?',
					'payload' => 'PAYLOAD_ONE'
				),
				array(
					'content_type' => 'text',
					'title' => 'about yourself?',
					'payload' => 'PAYLOAD_TWO'
				),
				array(
					'content_type' => 'text',
					'title' => 'languages?',
					'payload' => 'PAYLOAD_THREE'
				)
			);
			$result = $facebook->sendQuickReply($chat_id, $message, $replies);
			$facebook->sendChatAction($chat_id, 'typing_off');
		}

		else if ((strpos($msg, 'about yourself') !== false)) // quick replies
		{
			$facebook->sendChatAction($chat_id, 'mark_seen');
			$facebook->sendChatAction($chat_id, 'typing_on');
			$message = "I am a very strong, reliable and ambitious person. I strive and thrive on new challenges and intend to see challenges that bring posi3ve result in all aspects. I adapt well to new situa3ons, follow instruc3ons accurately and also develop confidence to handle day to day problems appropriately.";
			$replies = array(
				array(
					'content_type' => 'text',
					'title' => 'languages?',
					'payload' => 'PAYLOAD_ONE'
				),
				array(
					'content_type' => 'text',
					'title' => 'qualifications',
					'payload' => 'PAYLOAD_TWO'
				),
				array(
					'content_type' => 'text',
					'title' => 'intrests or hobbies?',
					'payload' => 'PAYLOAD_THREE'
				)
			);
			$result = $facebook->sendQuickReply($chat_id, $message, $replies);
			$facebook->sendChatAction($chat_id, 'typing_off');
		}

		else if ((strpos($msg, 'study') !== false) || (strpos($msg, 'education') !== false) || (strpos($msg, 'qualifications') !== false)) // quick replies
		{
			$facebook->sendChatAction($chat_id, 'mark_seen');
			$facebook->sendChatAction($chat_id, 'typing_on');
			$message = "MICT SETA NQF LEVEL 5 (May 2018 – Present)".chr(10)."WeThinkCode_,".chr(10)."".chr(10)."Tech Support NQF Level 4 (Jan 2017 – Dec 2017)".chr(10)."ICollege,".chr(10)."".chr(10)."National Senior Certificate (Jan 2010 – Dec 2015),".chr(10)."Edenglen High School";
			$replies = array(
				array(
					'content_type' => 'text',
					'title' => 'intrests or hobbies?',
					'payload' => 'PAYLOAD_ONE'
				),
				array(
					'content_type' => 'text',
					'title' => 'languages?',
					'payload' => 'PAYLOAD_TWO'
				),
				array(
					'content_type' => 'text',
					'title' => 'github repo?',
					'payload' => 'PAYLOAD_THREE'
				)
			);
			$result = $facebook->sendQuickReply($chat_id, $message, $replies);
			$facebook->sendChatAction($chat_id, 'typing_off');
		}

		else if ((strpos($msg, 'languages') !== false)) // quick replies
		{
			$facebook->sendChatAction($chat_id, 'mark_seen');
			$facebook->sendChatAction($chat_id, 'typing_on');
			$message = "PHP".chr(10)."Node.js".chr(10)."C".chr(10)."JS".chr(10)."SQL".chr(10)."C++".chr(10)."HTML/5".chr(10)."CSS/3".chr(10)."bootstrap".chr(10)."UNIX/POSIX".chr(10)."willing to learn more";
			$replies = array(
				array(
					'content_type' => 'text',
					'title' => 'intrests or hobbies?',
					'payload' => 'PAYLOAD_ONE'
				),
				array(
					'content_type' => 'text',
					'title' => 'github repo?',
					'payload' => 'PAYLOAD_TWO'
				),
				array(
					'content_type' => 'text',
					'title' => 'Where do you live?',
					'payload' => 'PAYLOAD_THREE'
				)
			);
			$result = $facebook->sendQuickReply($chat_id, $message, $replies);
			$facebook->sendChatAction($chat_id, 'typing_off');
		}

		else if ((strpos($msg, 'intrests') !== false) || (strpos($msg, 'hobby') !== false)) // quick replies
		{
			$facebook->sendChatAction($chat_id, 'mark_seen');
			$facebook->sendChatAction($chat_id, 'typing_on');
			$message = "Gaming: Conceptual gammer.".chr(10)."Graphic Design: Logo and Album Art design.".chr(10)."Music Production: I produces, write and mix music.".chr(10)."Tech news: Reading up on the latest Tech.";
			$replies = array(
				array(
					'content_type' => 'text',
					'title' => 'languages?',
					'payload' => 'PAYLOAD_ONE'
				),
				array(
					'content_type' => 'text',
					'title' => 'Whats your name?',
					'payload' => 'PAYLOAD_TWO'
				),
				array(
					'content_type' => 'text',
					'title' => 'Where do you live?',
					'payload' => 'PAYLOAD_THREE'
				)
			);
			$result = $facebook->sendQuickReply($chat_id, $message, $replies);
			$facebook->sendChatAction($chat_id, 'typing_off');
		}

		// else if ((strpos($msg, 'github') !== false) || (strpos($msg, 'repository') !== false)) // buttons
		// {
		// 	$message = "My github link is:";
		// 	$button = array(
		// 		array(
		// 			'type' => 'web_url',
		// 			'url' => 'https://github.com/The-only-blue',
		// 			'title' => 'Github Link'
		// 		),
		// 		array(
		// 			'type' => 'web_url',
		// 			'url' => 'https://google.com',
		// 			'title' => 'Button 2'
		// 		),
		// 		array(
		// 			'type' => 'web_url',
		// 			'url' => 'https://google.com',
		// 			'title' => 'Button 3'
		// 		)
		// 	);
		// 	$result = $facebook->sendButtonTemplate($chat_id, $message, $button);
		// }
		else if ($text == "replies") // quick replies
		{
			$message = "Pick one";
			$replies = array(
				array(
					'content_type' => 'text',
					'title' => 'Option One',
					'payload' => 'PAYLOAD_ONE'
				),
				array(
					'content_type' => 'text',
					'title' => 'Option Two',
					'payload' => 'PAYLOAD_TWO'
				),
				array(
					'content_type' => 'text',
					'title' => 'Option Three',
					'payload' => 'PAYLOAD_THREE'
				)
			);
			$result = $facebook->sendQuickReply($chat_id, $message, $replies);
		}
		else if ((strpos($msg, 'github') !== false) || (strpos($msg, 'repository') !== false)) // generic template
		{
			$facebook->sendChatAction($chat_id, 'mark_seen');
			$facebook->sendChatAction($chat_id, 'typing_on');
			$button = array(
				array(
					'type' => 'web_url',
					'url' => 'https://github.com/The-only-blue',
					'title' => 'Github: The-only-blue.'
				),
				array(
					
					"type" => "postback",
  					"title" => "Coding languages?",
  					"payload" => 'PAYLOAD_ONE'
				)
			);
			$elements = array(
				array(
					'title' => 'Github',
					'item_url' => 'https://github.com/The-only-blue',
					'image_url' => 'https://www.uruit.com/blog/wp-content/uploads/2017/08/github.png',
					'subtitle' => 'Life of code.',
					'buttons' => $button
				));
			$result = $facebook->sendGenericTemplate($chat_id, $elements);
			$facebook->sendChatAction($chat_id, 'typing_off');
		}
		
		// else if ((strpos($msg, 'github') !== false) || (strpos($msg, 'repository') !== false)) // generic template
		// {
		// 	$button = array(
		// 		array(
		// 			'type' => 'web_url',
		// 			'url' => 'https://github.com/The-only-blue',
		// 			'title' => 'Github: The-only-blue.'
		// 		),
		// 		array(
		// 			'type' => 'web_url',
		// 			'url' => 'https://google.com',
		// 			'title' => 'Button Two'
		// 		)
		// 	);
		// 	$elements = array(
		// 		array(
		// 			'title' => 'Github',
		// 			'item_url' => 'https://github.com/The-only-blue',
		// 			'image_url' => 'https://www.uruit.com/blog/wp-content/uploads/2017/08/github.png',
		// 			'subtitle' => 'Life of code.',
		// 			'buttons' => $button
		// 		),
		// 		array(
		// 			'title' => 'Title Two',
		// 			'item_url' => 'https://google.com',
		// 			'image_url' => 'http://placehold.it/350x350',
		// 			'subtitle' => 'Item Description Here',
		// 			'buttons' => $button
		// 		),
		// 		array(
		// 			'title' => 'Title Three',
		// 			'item_url' => 'https://google.com',
		// 			'image_url' => 'http://placehold.it/350x350',
		// 			'subtitle' => 'Item Description Here',
		// 			'buttons' => $button
		// 		),
		// 		array(
		// 			'title' => 'Title Four',
		// 			'item_url' => 'https://google.com',
		// 			'image_url' => 'http://placehold.it/350x350',
		// 			'subtitle' => 'Item Description Here',
		// 			'buttons' => $button
		// 		),
		// 		array(
		// 			'title' => 'Title Five',
		// 			'item_url' => 'https://google.com',
		// 			'image_url' => 'http://placehold.it/350x350',
		// 			'subtitle' => 'Item Description Here',
		// 			'buttons' => $button
		// 		)
		// 	);
		// 	$result = $facebook->sendGenericTemplate($chat_id, $elements);
        // }
        // else
        // {
        //     $facebook->sendChatAction($chat_id, 'typing_on');
        //     $message = "Here are some questions you can ask me.";
		// 	$replies = array(
		// 		array(
		// 			'content_type' => 'text',
		// 			'title' => 'How old are you?',
		// 			'payload' => 'PAYLOAD_ONE'
		// 		),
		// 		array(
		// 			'content_type' => 'text',
		// 			'title' => 'Where do you live?',
		// 			'payload' => 'PAYLOAD_TWO'
		// 		),
		// 		array(
		// 			'content_type' => 'text',
		// 			'title' => 'OpWhat are your qualifications?',
		// 			'payload' => 'PAYLOAD_THREE'
		// 		)
		// 	);
        //     $result = $facebook->sendQuickReply($chat_id, $message, $replies);
        //     $facebook->sendChatAction($chat_id, 'typing_off');

        // }
	}
?>
