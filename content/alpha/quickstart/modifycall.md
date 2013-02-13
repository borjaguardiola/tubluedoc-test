# Modifying An Existing Call Using The BlueVia Voice RESTful API

If we update *makeACall.php* we can modify the existing call created in the [previous quick start demo][Quick Start Guide Call With REST API]. Looking back at that demo, the last section of code retrieved the CallID created from the HTTP POST request to the [Calls Resource][API Reference Calls Resource] That code again:

	// Retrieve the call ID created for this call resource.
	// Not required for the demo, but shows how you can access it.
	$obj = json_decode($body);
	$callId = $obj->{'callId'};

Using this call ID you can format the URL to mage a HTTP GET request to the [Calls Resource][API Reference Calls Resource], in order to get the current state of the state of the call. As an example simply append add the call ID to the end of the calls resource URL and paste into a browser. This will retrieve the current state of a call i.e. HTTP GET https://**update BlueVia API Host Here**/comms/v1/calls/**callID**

You can also use this callID in order to modify the call, by using */setcommands* i.e. a HTTP POST request to  https://**update BlueVia API Host Here**/comms/v1/calls/**callID**/setcommands, on the calls resource. This can be seen following in the updated *makeACall.php* script which you can you can find in the Quick Start demo code from github. 

Looking at the updated additional code, that is simply added after the [original call has been created][Quick Start Guide Call With REST API]:

	//
	// Use setCommands to modify the call created Above
	// Speak To The Participants On The Call
	//

	// PRESS KEY TO START NEXT TEST
	readline ("Press Enter To Continue");

	Here you simply wait for the call to be created. Once you are ready, press the Enter key.

	$bodyContent = "{
	    \"commands\": [
		{
		  \"speak\": {
			\"text\": \"Hello. Welcome to the call. Why not have a chat\",
			\"voice\": \"female\"

		    }
		}
	    ]
	}";

Here you are formatting the commands to be provided to the existing call. In this case a simple speak command, that actually does nothing but interrupt the current call! ;-)

	// in this case the url represents the call URL
	$url = $url . "/" . $callId . "/" . $setcommands;

This is the formatted URL as discussed above - https://**update BlueVia API Host Here**/comms/v1/calls/**callID**/setcommands


	// CREATE CURL RESOURCE AND SET OPTIONS
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_USERPWD, $accessCredentials);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $bodyContent);
	// return the transfer as a string
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	// turn off SSL cert validation
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	// get header detail
	curl_setopt($ch, CURLOPT_HEADER, 1);

	//// $output contains the output string
	$output = curl_exec($ch);
	?>

	@todo: Once we have access to production we need to remove and retest
	// turn off SSL cert validation
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

Then finally you simply format the HTTP POST request and make the request passing in the commands. Simple. couldn't be easier right? ;-)

**NOTE:** There is also the option of passing in the callback URL into the setcommands HTTP POST request. In this case you would not pass in the commands in the body of the HTTP POST request, but instead a callback URL to a location that specifies the commands. This is discussed further in the [Calls Resource][API Reference Calls Resource]  documentation

So you have seen how to create a call using the BlueVia RESTful API. Have a look at the next quick start guide to see how you can [create conference calls][Quick Start Guide Conf With REST API] using the API.



[API Reference Calls Resource]: /alpha/restref/calls
[Quick Start Guide Call With REST API]: /alpha/quickstart/restapicreatecall
[Quick Start Guide Conf With REST API]: /alpha/quickstart/restapicreateconf