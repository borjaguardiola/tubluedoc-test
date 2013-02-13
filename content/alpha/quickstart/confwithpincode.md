# A Simple Conference Service With Pin-codes

The following quick start guide is written in PHP. Of course modify to suit your needs!

In this demo, when you dial your BlueVia Voice Number:

* You will be asked if you wish to create a conference as a moderator
	* you will be asked which pin-code you wish to use for your conference.
	* if you 'create' the conference as a moderator, all other callers will be muted until you enter the conference.
* If you wish to join a conference as a participant, then you would be entering the conference with a pin-code previously supplied to you.

This demo will require you to have access to a web server, running PHP. 

There are three files for the demo which you can find in the Quick Start demo code from github  **@todo: ADD LINK** 

1. *PincodeConference.php*
2. *eventHandler.php* and
3. *startConfernece.php*

Update the configuration of the [BlueVia Voice Number][BlueVia Dashboard] to point to the location where you host *PincodeConference.php*. This is the starting location for this demo. After you have configured your BlueVia Voice Number and you dial it, BlueVia will make a HTTP POST request to the URL pointing to *PincodeConference.php*.The HTTP POST will contain notification information in the body of the request. Detail of the [BlueVia Voice Call Notifications][Notifications] at this stage is not important, other than we are expecting to receive a *CalledNumber* notification type. In fact in this case it is the only notification we will retrieve.

So in the following case the first thing you do is get the notification detail from the HTTP POST Request from BlueVia. So in *PincodeConference.php*:

	<?php

	// Get the POST request body
	if (($stream = fopen('php://input', "r")) !== FALSE){
	    $bodyContent = stream_get_contents($stream);
	}

	// get event data from the POST request body
	$obj = json_decode($bodyContent);
	$eventName = $obj->{'eventName'};

Then based on the notification type - again in this example the notification type will always be *CalledNumber* (A full list of notification types can be found in the [BlueVia Voice Call Notifications section][Notifications], you respond with a [getDigits command][Command Reference GetDigits].   

	// only provide a response if this is an CalledNumber event
	if ($eventName == "CalledNumber") {
		$response = "{
			\"commands\": [
				{
					\"getDigits\": {
						\"timeout\": 5,
						\"numberOfDigits\": 1,
						\"retries\": 2,
						\"actionUrl\": \"<your-hostname-and-path>/eventHandler.php\",
						\"speak\": {
							\"text\": \"Press 1 to create a new conference. Press 2 to join an existing conference call.\",
							\"voice\": \"Female\"
						}
					}
				},
				{
					\"speak\": {
						\"text\": \"Sorry, you didn't enter a selection in time. Please call and try again.\",
						\"voice\": \"Female\"
					}
				}

	@todo re-add the hangup command here and test
	@todo test the timeout in the getDigits command

			]
		}";
		echo ($response);
	}
	?>

In this case the getDigits command:

* Asks the caller to enter either 1 or 2, via the embedded *speak* command
* There is a 5 second *timeout*, and if the caller doesn't enter a digit in time the *speak* command will be executed again. 
* If after 2 *retries* the user has still not entered a selection, then the *getDigits* command exits and the second *speak* command is executed before the call is then terminated via the *hangup* command.
* Assuming success though(!) - if the user enters a single digit on their keypad, specified by the *numberOfDigits* element then this data is sent to the second PHP script included in the provided Quick Start Code Samples **ADD GITHUB LINK** - *eventHandler.php*

Looking at the *eventHandler.php* code. Again you retrieve the eventName from the HTTP POST request body, and in this case there is a switch based on the *eventName*, which in the case of request generate by BlueVia for a getDigits command will be a *DigitsCollected* notification. So the first case covered is the event that the called has selected 1, i.e. is a moderator on the conference

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
							}					]
					}";
					echo ($response);
			break;

In this case we ask the *'moderator'* for further input - to key in the pincode they wish to assign for the conference. The only significant difference in the *getDigits* command is:

* In the *speak* command we ask the caller to end their keypad input by selecting the hash (#) key on their keypad. This can be accomplished by using the *finishOnKey* attribute.
* The URL for the *getDigits* result is the third PHP script in the Quick Start sample code *startConfernece.php* and you are passing in a URL parameter specifying that the response is for a conference moderator.

Similarly, in the event that the *getDigits* response from *PincodeConference.php* is '2', i.e a conference participant, the only change that is made is that the *startConfernece.php* is called specifying the response is from a conference participant

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
						\"actionUrl\": \"<your-hostname-and-path>/startConference.php?state=participant\"
					}
				},
				{
					\"speak\": {
						\"text\": \"Sorry, you didn't enter the number in time. We can't help you\",
						\"voice\": \"Female\"
					}
				}					]
		}";
		echo ($response);
    
Finally in *eventHandler.php* you validate that the caller has entered a correct value. You can limit the input options that are actually available to callers - see the [getDigits documentation][Command Reference GetDigits], however in this case we are allowing any single digit to be entered. As a result if the keypad numebr pressed is not 1, or 2:

	$response = "{
			\"commands\": [
				{
					\"speak\": {
						\"text\": \"Sorry you entered an incorrect value. Please try again\",
						\"voice\": \"Female\"
					}
				},
				{
					\"redirect\": {
						\"callbackUrl\": \"<your-hostname-and-path>PincodeConference.php\"
						}
				}
			]
		}";
		echo ($response);

In this case we specify, via a *speak* command, that the user has entered an invalid value and then use the *redirect* command to return the user to the start of the call flow, so they can try again.
 
Finally based on the caller input you can add them to a conference based on the pincode they have entered. Looking at the final file in Quick Start Guide demo code - *startConfernece.php*

	switch ($eventName) {
	    case "DigitsCollected":
		$digitsCollected = $obj->{'digits'};

		// if there is a hash in the $digitsCollected then strip it
			$digitsLessHash = str_replace("#", "", $digitsCollected);

			// switch based on state = moderator/participant
		switch ($state) {
			case "moderator":
					$response = "{
						\"commands\": [
							{
						  \"dial\": {
										\"conferenceName\": \"" . $digitsLessHash . "\"
								}
							}

						]
					}";
					echo ($response);
			break;
			case "participant";
					$response = "{
						\"commands\": [
							{
						  \"dial\": {
										\"conferenceName\": \"" . $digitsLessHash . "\"
								}
							}

						]
					}";


	**@todo add moderater cases to code muteOnEnter etc... and test!**

In this case:

* If the URL attribute for *'state'*, specified in *eventHandler.php* is equal to moderator, then the caller is placed into a conference name that equals the pincode that the caller entered.
* The moderator is added to the conference with the additional *conferenceProperties* - *muteOnEnter=false* **@todo add this and retest**  When the moderator enters the conference any previous participants who may have been muted, will be able to hear each other
* **NOTE:** that as the caller entered a hash (#) to complete their keypad input this has to be removed, prior to using the input as a conferenceName. This is done here:  
	* *$digitsLessHash = str_replace("#", "", $digitsCollected)*
* Any participant is added to the conference with the additional *conferenceProperties - muteOnEnter=true* **@todo add this and retest**  When a participant enters the conference they will be muted until the moderator joins.


That's it. With a few lines of code you have created a dial in conference service on your BlueVia Voice Number that supports multiple conferences, based on a pin-code access. This demo will allow you to have multiple conferences hosted from the same BlueVia voice Number.

Now let’s have a look at allowing conference participants to [record their name and play their name][Quick Start Conference Record Participants], prior to entering the conference.



[BlueVia Dashboard]: http://www.bluevia.com
[Notifications]: /alpha/notifications/
[Command Reference GetDigits]: /alpha/commandref/getdigits
[Quick Start Conference No Code]: /alpha/quickstart/createconfnocode
[Quick Start Conference Record Participants]: /alpha/quickstart/addrecording