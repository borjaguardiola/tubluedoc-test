# BlueVia Voice RESTful API Quick Start Guide

For further details about the RESTful API see [the BlueVia RESTful API reference][API Reference]. 

The following PHP examples will show you the basics. Again if PHP is not your bag then modify the code as needed! :-)

## Creating a Call Using The BlueVia Voice RESTful API

This quick start guide mimics the [the connect a call without any code][Quick Start Guide Inbound] quick start guide. The difference is that in this case, instead of dialing your BlueVia Voice Number to start a call, you will instead use the API to instantiate a call. 

So configure your BlueVia Voice Number in the [BlueVia Dashboard][BlueVia Dashboard] to point to same JSON (or XML if you have used XML) that you used in the [the connect a call without any code][Quick Start Guide Inbound] quick start guide. As a reminder, this was the JSON you used

	{
	    "commands": [
		{
		  "dial": {
			"number": {
			    "callerId": "tel:+442012345678",
			    "destination": "tel:+44712345678"
			}
		    }
		}
	    ]
	}

**Remember:**

* *callerId* must be a BlueVia Number that you own
* *destination* is the B number that you will call. 
In this example the A number will be the number you use to start a call using the API.

Once you have configured your number's callback URL to point to this JSON file, BlueVia will make a HTTP POST request to retrieve these commands, once Phone A, that you will call via an API call, answers. When Phone A answers, This JSON will result in Phone B being called and when Phone B answers, both Phone A and Phone B will be on the same call.

The simplest way to create a call via the RESTful API is *curl* from the command line

	curl -k -H "Accept: application/json" -H "Content-type: application/json" --user <your API key>:<your API secret> -X POST -d '{"callerId":"tel:+<country code><your BlueVia Voice Number>","destination":"tel:+<country code><the number you wish to call>"}' https://<BlueVia API Host>/comms/v1/calls 

When the destination phone rings, and answers the destination phone, specified in the *dial* command in the JSON referred to by the callback URL, will be called and the two phones will be connected on a call.  

The same of course can be managed through php and this demo uses the *makeACall.php* script that you can find in the Quick Start demo code from github  **@todo: ADD LINK**. 

Stepping through *makeACall.php*

	<?php
	$url = "https://**update BlueVia API Host Here**/comms/v1/calls";
	$accessCredentials = "<your API key>" . ":" . "<your secret>";
	$headers = array(
	    'Content-Type: application/json',
	    'Accept: application/json'
	    );

The above are simply variables used in the script:

* *https://<update BlueVia API Host Here>/comms/v1/calls* is the URL for the calls resource. You will make a POST request to this in order to create a call leg.
* *$accessCredentials = 'your API key' . ':' . 'your secret';* Here you have to add your API key and secret. These can be found on the [BlueVia Dashboard][BlueVia Dashboard]
* As you are providing a JSON body in our request and require a JSON response you have to set the appropriate *Content-Type* and *Accept* headers in your POST request

Then you have to specify the body of the HTTP request to POST to the [Calls Resource][API Reference Calls Resource]
 
	// Create the First Call Leg i.e. add Phone A to the call
	// this is the body content passed in with the API request
	$bodyContent = "{\"callerId\":\"tel:+<your BlueVia Phone Number\",\"destination\":\"tel:+<Phone A Number>\"}";

In this case, as with the [the connect a call without any code][Quick Start Guide Inbound] quick start guide:

* The callerId telephone number MUST be one of the BlueVia Voice Numbers. You can find a number to use by accessing your [BlueVia Dashboard][BlueVia Dashboard].
* The Number format is always in international dialing format *tel:+<country code><BlueVia Voice Number>*. 
	* Remember to include the *tel:+* prefix
* the destination is the Phone A phone number. This is the first number you will add to the call

Then you can use [PHP cURL][PHP cURL] to format your HTTP POST request to the [Calls Resource][API Reference Calls Resource].  

	// PHP stuff for making the RESTful API request
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

	// $output contains the HTTP Response to the POST request
	$output = curl_exec($ch);

Calling *curl_exec($ch)* executes the HTTP POST request to the BlueVia Voice API. 

At this stage your Phone A will start ringing:

When you answer the phone, BlueVia will make a HTTP POST request to your BlueVia Voice Number’s callback URL (configured previously) 

The commands set in the response, the dial command discussed above, will be executed and Phone B will start ringing.

Once you answer phone B, you will have a connected call between two phones. Chat away! ;-)

The following code, in the *makeACall.php* script is not actually used in this demo, however if you would like to modify the created call you need to have access to the call ID that is contained in the HTTP Response returned from the POST request to the */calls* resource

	// get the HTTP response body body
	$header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
	$header = substr($output, 0, $header_size);
	$body = substr($output, $header_size);


	// Retrieve the call ID created for this call resource.
	// Not required for the demo, but shows how you can access it.
	$obj = json_decode($body);
	$callId = $obj->{'callId'};

	// close curl resource to free up system resources
	curl_close($ch);
	?>


The above code retrieves the *callID*. We will use this to [modify an existing call with the REST API] [Quick Start Modify Call Rest API].

To execute *makeACall.php* host the script on your Web Server, with PHP running and from the command line call *php makeACall.php* 


[API Reference]: /alpha/restref/
[Quick Start Guide Inbound]: /alpha/quickstart/connectcallnocode
[BlueVia Dashboard]: http://www.bluevia.com
[API Reference Calls Resource]: /alpha/restref/calls
[PHP cURL]: http://php.net/manual/en/book.curl.php

[Notifications]: /alpha/notifications/

[Quick Start Modify Call Rest API]: /alpha/quickstart/modifycall
[Quick Start Conference Record Participants]: /alpha/quickstart/addrecording