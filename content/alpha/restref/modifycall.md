## Modify Call - set commands


This shortcut command allows you to provide additional commands to an in progress call represented by the {callId}. To do this you can make a POST request to setcommands


URI
	* /comms/v1/calls/{callId}/setcommands{format}

POST
	* YES
	* You can make a POST request and provide a set of [BlueVia Voice Commands][URL_To_BlueVia_Voice_Commands] that will be executed by BlueVia on the call represented by the {callId}
	* REQUEST:
		* HTTP Method: POST
		* Supported Query Parameters:
			* None
		* Body: The POST request includes a JSON or an XML body containing the [BlueVia Voice Commands][URL_To_BlueVia_Voice_Commands] to be executed 
			* JSON (example)
				{
					"commands": [
						{
							"wait": {
								"lenght": "10"
							}						
						},
        					{
							"speak": {
								"text": "Hello"
							}
						}
					]
				}
			* XML example
				* @todo get one
		* CURL example:
			@todo get one

	* RESPONSE:
		* Successful response:
			* HTTP Response: 202 Accepted.
			* The request is Accepted. This doesn’t mean that any of the commands has been executed yet.
			* Body: The response does not include a body.
		* Error response:
			* Consists of an HTTP Error response together with a code and an explanatory text. Possible errors are those applicable among the errors described in [BlueVia Voice Error Codes][URL_To_BlueVia_Voice_And_SMS_Error_Codes].         

GET
	* N/A

PUT
	* N/A

DELETE
	* N/A


[URL_To_BlueVia_Voice_Commands]: https:
[URL_To_BlueVia_Voice_Commands]: https:
[URL_To_BlueVia_Voice_And_SMS_Error_Codes]: https: