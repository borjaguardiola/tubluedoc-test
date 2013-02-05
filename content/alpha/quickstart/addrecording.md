# Adding The Recording Of Participants Names To Conferences

There are four files for the demo which you can find in the Quick Start demo code from github  **@todo: ADD LINK**. 

1. *pincodeConference.php*
2. *eventHandler.php* and
3. *startConfernece.php* and an additional file
4. *recordingHandler.php*

This builds on top of the last [pincode conference demo][Quick Start Guide Conf With Pin Code].

The significant change for this demo can be found in the *startConfernece.php* code. In this case we are using the [*record command*][Command Reference Record Conference] and the additional *conferenceProperies* element of *playOnEnter* this can be seen in either the moderator or participant code. Looking at the case for the moderator:

	case "moderator":
			$response = "{
				\"commands\": [
					{
						\"speak\": {
							\"text\": \"Please record your name, then press hash\",
							\"voice\": \"Female\"
						}
					},
					{
						\"record\": {
							\"finishOnKey\": \"#\",
							\"playBeep\": \"true\",
							\"export\": {
								\"url\": \"<your-hostname-and-path>/recordingHandler.php?msisdn=" . $callerId . "\"
							}
						}
					 },

The record command above specifies:

* to *playBeep* to start the recording
* to *finishOnKey* - #
* and then to export the recording to the PHP script specified. In this case you can see we are also passing in the MSISDN of the caller in the *$callerId* variable, which will be used by the script to save the recording of the participants name. The *$callerId* was retrieved prior to the code above on the line *$callerId = $obj->{'callerId'};* It is an attribute of the [BlueVia call notification][Notifications]. In the same way as you have previously retrieved the *$eventName* from the notification data, you can also retrieve the *$callerId*. In this case we are simply using this as an identifier to save the recording.
* within the export element you specify the location of the script that will handle your recording. In this case it is the script *recordingHandler.php* that you host in the same location as the other scripts in this example. As described above we are also passing in the *$callerId* of the caller as a URL parameter. The *recordingHandler.php* is discussed further below.

Once you have recorded the callers name, you can then add them to the conference call, and specify to play the callers name when they enter the conference. This is done using the addition *conferenceProperties* element as seen below:


	\"dial\": {
		\"conferenceName\": \"" . $digitsLessHash . "\",
		\"conferenceProperties\": {
			\"playOnEnter\": {
				\"url\": \"<your-hostname-and-path>/" . $callerId . ".wav\"
				}
			}
		}
	}

	@todo add moderater cases to code muteOnEnter etc... and test!
	@todo should be using the playOnEnter attribute in the conferenceProperties element, and not a play command prior to the conference. Do this and TEST!!

In the conferenceProperties element:

* *playOnEnter* is used to specify the URL of the recorded caller name when they enter the conference. 

Finally looking at the *recordingHandler.php* script. This simply takes a HTTP POST request and save it to a file using the caller ID passed in as a URL parameter and a .wav file extension.

	<?php

	$msisdn = $_GET['msisdn'];
	$myFile = $msisdn . ".wav";
	$fh = fopen($myFile, 'w+')  or die("can't open file");
	chmod($myFile,0777);

	if (($stream = fopen('php://input', "r")) !== FALSE)
	    fwrite($fh, (stream_get_contents($stream)));
	fclose($fh);

	?>

So that's the basics of inbound calling. Let's have a look at [using the BlueVia Voice API][Quick Start Guide Call With REST API] for outbound calls.



[Forward - Create A Call With The REST API] [Quick Start Guide Call With REST API] / [Back - A Conference With Pin Codes] [Quick Start Guide Conf With Pin Code]



[Command Reference Record Conference]: /alpha/commandref/record
[Notifications]: /alpha/notifications/

[Quick Start Guide Conf With Pin Code]: /alpha/quickstart/confwithpincode
[Quick Start Guide Call With REST API]: /alpha/quickstart/restapicreatecall
