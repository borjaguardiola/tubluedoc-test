## Call


	/comms/v1/calls/{callId}{format}



<div class="apimethodgroup well well-small" markdown="1">
POST
: NOT ALLOWED
	* NOTE: A call is a REST resource, but the resource itself is not modified. Instead it is possible to modify an existing call, by passing in call control commands, using the [setcommands shortcut][URL_To_Setcommands]


</div><!-- apimethodgroup -->

<div class="apimethodgroup well well-small" markdown="1">

GET
: YES 
	* If you invoke a GET to the calls collection you will retrieve the current state of the call specified by the {callId}


<i class="icon-chevron-down pull-right">&nbsp;</i><!-- Remove the "i" block if this method is not available -->
{: .apimethod #postmethod data-toggle="collapse" data-target="#postdoc"}
<!-- This HTML doesn't need changes -->
<div class="apidoc collapse in tabable offset1" id="postdoc">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#tab1" data-toggle="tab">Request</a></li>
      <li><a href="#tab2" data-toggle="tab">Response</a></li>
  </ul>
  <div class="tab-content">
<div id="tab1" class="tab-pane active" markdown="1">

	
*HTTP Method :GET
* Supported Query Parameters
	: fields (optional)
		:You can apply a filter on the response, i.e.: to retrieve only some fields of the Call. fields value is a list of comma separated values of the different fields that are requested. 
	: Example 
		: ?fields=duration,callCost
	* NOTE: callId is always returned, even if not included in the fields attribute.

* Body :The GET does not include a Body

* CURL example:
	: @todo get one

{: .reqfields}
</div>
<div id="tab2" class="tab-pane" markdown="1">
* Successful response:
	: HTTP Response: 200 OK
	: Body
		: The response includes a JSON or an XML body

	: Example
		: JSON
				{
					"callId":
				"057627ac-e6e1-4152-8b67-18ba0c84ef11",
					"createdAt": "2012-05-16T14:00:00",
    					"lastUpdated": "2012-05-16T14:02:00",
    					"callStatus": "Established",
    					"startTime": "2012-05-16T14: 00: 06",
    					"duration": "120",
    					"callCost": {
     						"amount": 12.33,
      					},
					"numberOfLegs": 2,
    					"callLegs": [
      						{
           						"callLegId":
				"328482ac-e3a2-4152-8b67-18ba0c84ef11",
        						"callerId": "tel: +34666666666",
            						"destination": "tel: +34666666669",
					            	"legStatus": "Answered",
						       	"direction": "Inbound",
					           	"duration": "120",
           						"callLegCost": {
   	        						"amount": 6.33,
				   	        		"currency": "EUR"
	             					},
						        "createdAt": "2012-05-16T14:00:00",
							"lastUpdated": "2012-05-16T14:02:00",
    						},
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
   	        						"currency": "EUR"
	             					},
					             	"createdAt": "2012-05-16T14:00:10",
					        	"lastUpdated": "2012-05-16T14:02:00",
        				}
				]
			}

		: XML (example):
			@todo get one

		: CURL example:
			@todo get one

* Error response
	: Consists of an HTTP Error response together with a code and an explanatory text. 
	Possible errors are those applicable among the errors described in [BlueVia Voice Error Codes][URL_To_BlueVia_Voice_And_SMS_Error_Codes].

</div> <!-- tab2 -->
</div> <!-- tab-content -->
</div> <!-- apidoc -->
</div><!-- apimethodgroup -->

<div class="apimethodgroup well well-small" markdown="1">
PUT
: NOT ALLOWED

* NOTE: A call is a REST resource, but the resource itself is not modified. Instead it is possible to modify an existing call, by passing in call control commands, using the [setcommands shortcut][URL_To_Setcommands]


</div><!-- apimethodgroup -->

<div class="apimethodgroup well well-small" markdown="1">
DELETE
: NOT ALLOWED


</div><!-- apimethodgroup -->



<%= render '/links'%>