# Call

## Call Collection


URI
	* /comms/v1/calls{format}?QueryParams

POST
	* YES
	* If you invoke a POST to the calls collection you create a new call in the collection. So you establish a new outbound call.
	* REQUEST:
		* HTTP Method: POST
		* Supported Query Parameters
			* None
		* Body: The POST includes a JSON or an XML body:
			* The following parameters can be provided in the HTTP Body
			* callerId - MANDATORY and has to be one of your BlueVia Voice numbers
			* destination - MANDATORY and has to be one of your BlueVia Voice numbers
			* callbackUrl - This is optional and can be used to provide a different callback URL, for this call only, compared to the one configured against your BlueVia number. If this is specified BlueVia will make a POST request to this URL, for this call only, for the [Answered in call event notification][URL_To_BlueVia_Voice_Call_Evcent_Notifications]
			* fallbackUrl - This is optional and can be used to provide a different fallback URL, for this call only, compared to the one configured against your BlueVia number. In the event that the callbackUrl used on this call is not reachable, BlueVia will make a POST request to this URL, for this call only, for the [CallbackUnavailable in call event notification][URL_To_BlueVia_Voice_Call_Evcent_Notifications] 
			*JSON (example): @todo validate this
			{
   				"callerId": "tel:+34666666666",
   				"destination": "tel:+34677777777",
 				"callbackUrl": "http://developer.app.com",
  				"fallbackUrl": "http://developer.app.com/fail"
			}

			XML example: 
				@todo get one

			CURL example:
				@todo get one


	* RESPONSE:
		* Successful response:
			* HTTP Response: 201 Created
			* Headers
				* Location (mandatory): Includes the URI pointing to the created resource (an Outbound Call)
				* https://{host}/comms/v1/calls/{callId}  
			* Body:
				* The response includes a JSON or an XML body:
				* JSON (example):
				{
					"callId": "23481-apdifjap-dpifje-18403"
				}

				* XML (example)
			      	@todo get one

		* CURL example:
			@todo get one

		* Error response:
			* Consists of an HTTP Error response together with a code and an explanatory text. Possible errors are those applicable among the errors described in [BlueVia Voice Error Codes][URL_To_BlueVia_Voice_And_SMS_Error_Codes].



GET
	* YES - NOTE: not available during the alpha period

PUT
	* NOT ALLOWED

DELETE
	* NOT ALLOWED


[URL_To_BlueVia_Voice_Call_Evcent_Notifications]: https:
[URL_To_BlueVia_Voice_Call_Evcent_Notifications]: https:
[URL_To_BlueVia_Voice_And_SMS_Error_Codes]: https: