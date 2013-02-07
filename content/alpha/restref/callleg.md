Call Leg


URI
	* /comms/v1/calls/{callId}/legs/{legId}{format}?QueryParams

POST
	* NOT ALLOWED

GET
	* YES
	* This allows you to request specific information about the call leg represented by the {legId}
	* REQUEST:
		* HTTP Method: GET
		* Supported Query Parameters:
			* Filter(optional): To apply a filter on the response, i.e.: to retrieve only some fields of the Call Leg. The name of query parameter is fields and it’s value is a list of comma separated values of the different fields that are requested. The filter can be applied at top level fields within an Call Leg
				* Example: ?fields=callerId,lastUpdated
				* Note: legId field is always returned, even if not included in the filter.
			* Body: The GET does not include a body.
			* CURL example:
				@todo get one

		* RESPONSE:
			* Successful response:
			* Error response
				*HTTP Response: 200 OK.
				*Body: The response includes a JSON or an XML body:
					* JSON (example): @todo validate this
					{
						"callLegId":
					"328482ac-e3a2-4152-8b67-18ba0c84ef33",
    						"callerId": "tel: +34666666669",
						"destination": "tel: +34666666666",
						"legStatus": "Answered",
					    	"direction": "Outbound",
						"duration": "110",
						"callLegCost": {
					   		"amount": 6.33,
   	 					},
						"createdAt": "2012-05-16T14:00:10",
						"lastUpdated": "2012-05-16T14:02:00",
 					}

				* XML:  (example)
		* Error response
			* Consists of an HTTP Error response together with a code and an explanatory text. Possible errors are those applicable among the errors described in [BlueVia Voice Error Codes][URL_To_BlueVia_Voice_And_SMS_Error_Codes].

PUT
	* NOT ALLOWED

DELETE
	* NOT ALLOWED

[URL_To_BlueVia_Voice_And_SMS_Error_Codes]: https: