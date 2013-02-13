<?php

if (($stream = fopen('php://input', "r")) !== FALSE){
    $bodyContent = stream_get_contents($stream);
}

// get event data
$obj = json_decode($bodyContent);
$eventName = $obj->{'eventName'};

switch ($eventName) {
    case "DigitsCollected":
    	$digitsCollected = $obj->{'digits'};
    	switch ($digitsCollected) {
    		case "1":
    			$response = "{
					\"commands\": [
						{
							\"getDigits\": {
								\"speak\": {
									\"text\": \"Please enter the pin you wish to use for your conference, followed by the hash key\",
									\"voice\": \"Female\"
								},
								\"finishOnKey\": \"#\",
								\"timeout\": \"15\",
								\"retries\": \"2\",
								\"actionUrl\": \"<your-hostname-and-path>/startConference.php?state=moderator\"
							}
						},
						{
							\"speak\": {
								\"text\": \"Sorry, you didn't enter the number in time. We can't help you\",
								\"voice\": \"Female\"
							}
						},
						{
							\"hangup\": \"\"
						}
					]
				}";
				echo ($response);
    		break;
    		case "2";
				$response = "{
									\"commands\": [
										{
											\"getDigits\": {
												\"speak\": {
													\"text\": \"Please enter the pin for your conference, followed by the hash key\",
													\"voice\": \"Female\"
												},
												\"finishOnKey\": \"#\",
												\"timeout\": \"15\",
												\"retries\": \"2\",
												\"actionUrl\": \"<your-hostname-and-path>/startConference.php?state=participant\"
											}
										},
										{
											\"speak\": {
												\"text\": \"Sorry, you didn't enter the number in time. We can't help you\",
												\"voice\": \"Female\"
											}
										},
										{
											\"hangup\": \"\"
										}
									]
				}";
				echo ($response);
    		break;
    		default:
    			$response = "{
					\"commands\": [
						{
							\"speak\": {
								\"text\": \"Sorry you entered an incorrect command. Please try again\",
								\"voice\": \"Female\"
							}
						},
						{
							\"redirect\": {
								\"callbackUrl\": \"<your-hostname-and-path>/pincodeConfernece.php?state=eventHandler\"
							}
						}
					]
				}";
    			echo ($response);
    	}
        break;
    case "Answered":
        break;
    default:
        // match all other events - simply exit with nothing
        break;
}

?>


