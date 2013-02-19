### Call Leg


	 /comms/v1/calls/{callId}/legs/{legId}{format}?QueryParams

<div class="apimethodgroup well well-small" markdown="1">
POST
: NOT ALLOWED
</div><!-- apimethodgroup -->

<div class="apimethodgroup well well-small" markdown="1">
GET
: YES
	* This allows you to request specific information about the call leg represented by the {legId}

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
* HTTP Method 
	:GET
* Supported Query Parameters:
	: Filter(optional)
		: To apply a filter on the response, i.e.: to retrieve only some fields of the Call Leg. The name of query parameter is fields and it’s value is a list of comma separated values of the different fields that are requested. The filter can be applied at top level fields within an Call Leg
		: Example
			: ?fields=callerId,lastUpdated
		: Note
			: legId field is always returned, even if not included in the filter.

* Body
	: The GET does not include a body.
	: CURL example
				@todo get one

{: .reqfields}
</div>
<div id="tab2" class="tab-pane" markdown="1">
* Successful response


* Error response
	: HTTP Response : 200 OK.
	: Body
		: The response includes a JSON or an XML body
			: JSON (example
				: @todo validate this

				~~~
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

 				~~~

			: XML  (example)

* Error response
	: Consists of an HTTP Error response together with a code and an explanatory text. Possible errors are those applicable among the errors described in [BlueVia Voice Error Codes][URL_To_BlueVia_Voice_And_SMS_Error_Codes].

</div> <!-- tab2 -->
</div> <!-- tab-content -->
</div> <!-- apidoc -->
</div><!-- apimethodgroup -->

<div class="apimethodgroup well well-small" markdown="1">
PUT
: NOT ALLOWED
</div><!-- apimethodgroup -->

<div class="apimethodgroup well well-small" markdown="1">
DELETE
: NOT ALLOWED
</div><!-- apimethodgroup -->


<%= render '/links'%>