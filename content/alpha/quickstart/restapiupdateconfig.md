# Update Your BlueVia Voice Number Configuration Via the REST API

You can update your BlueVia Voice Number configuration via a POST to the [Numbers resource][API Reference Numbers Resource]. In the download for the [Quick Start examples][Quickstart Source Download] the source for this example can be found in the *update number config via the REST API* directory

The Numbers resource location is shown in the following URL

	$url = "https://<blue via API domain>/comms/v1/me/numbers/tel:%2B<country code><number to update>";

As with all calls you will need to set your access credentials and *Accept* and *Content* Headers

	$headers = array(
	    'Content-Type: application/json',
	    'Accept: application/json'
	    );

The POST body specifies the configuration you wish to update your number to:

	$bodyContent = "{
	    \"notificationFormat\": \"JSON\",
	    \"voiceCallbackUrl\":\"<your callback URL>\"
	}";
	
Then make the call!

	// CREATE CURL RESOURCE AND SET OPTIONS
	// CREATE FIRST LEG OF THE CALL
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_USERPWD, $accessCredentials);
	curl_setopt($ch, CURLOPT_POST, 1);
	// set the body content
	curl_setopt($ch, CURLOPT_POSTFIELDS, $bodyContent);
	// return the transfer as a string
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	// turn off SSL cert validation
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	// get header detail
	curl_setopt($ch, CURLOPT_HEADER, 1);

	// $output contains the output string
	$output = curl_exec($ch);

	echo($testCase . "RESPONSE: " . $output . "\n");

	// close curl resource to free up system resources
	curl_close($ch);



[Quickstart Source Download]: http://
[BlueVia Dashboard]: https://www.bluevia.com
[API Reference Numbers Resource]: /alpha/restref/accountnumberscollection
