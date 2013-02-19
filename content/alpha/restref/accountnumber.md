## Account Number

URI
	* /comms/v1/me/numbers/{number}{format}

<div class="apimethodgroup well well-small" markdown="1">
POST
: YES - supported in alpha 

	* You can invoke a POST request to update the detail associated with the specified number on your account. This will allow you to update the configuration associated with your BlueVia Voice Number. This information can also be managed on your [BlueVia Dashboard][URL_To_BlueVia_Dashboard]. This allows you to specify the set of URL’s that will handle Voice callback and fallback functionality. You can also specify the format you wish to receive in call notification - either JSON or XML
	
<i class="icon-chevron-down pull-right">&nbsp;</i>

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
  : POST

* Supported Query Parameters
    : None

* Body
    : The POST includes a JSON or an XML body.
	* The following parameters can be provided in the HTTP Body
				
		: callbackUrl 
		  : this is the callback URL you wish to assign to your number. This can also be set in the [BlueVia Dashboard][URL_To_BlueVia_Dashboard]
		: fallbackUrl 
		  : this is the fallback URL you wish to assign to the your number. Again this can also be done in the [BlueVia Dashboard][URL_To_BlueVia_Dashboard]


* Examples
  
* JSON example  @todo validate this
			
	 {
		"callbackUrl": "http://newurl1.com",
		"fallbackUrl": "http://newurl2.com",
	 }
 			

* XML example
	@todo get one 

* CURL example
	@todo get one


{: .reqfields}
</div>

<div id="tab2" class="tab-pane" markdown="1">

* Successful response
	: HTTP Response 
		: 200 OK.
	: Body
		: The response does not include a body
		
* Error response
  : Consists of an HTTP Error response together with a code and an explanatory text. Possible errors are those applicable among the errors described in [BlueVia Voice Error Codes][URL_To_BlueVia_Voice_And_SMS_Error_Codes].
</div> <!-- tab2 -->
</div> <!-- tab-content -->
</div> <!-- apidoc -->
</div><!-- apimethodgroup -->







<div class="apimethodgroup well well-small" markdown="1">
GET
: YES 
- NOTE: not available during the alpha period
	* You can invoke a GET to this resource to request the configuration detail for the specified {number} on your account
	* NOTE: Further detail of this method will be provided when delivered. 

</div><!-- apimethodgroup -->


<div class="apimethodgroup well well-small" markdown="1">
PUT
: YES 
- NOTE: not available during the alpha period
	* You can invoke a PUT to this resource which in effect purchases a BlueVia Voice Number and adds this to your account. Using this method also allows you to specify the configuration or the number you are purchasing.  Available numbers can be retrieved using the GET operation for the [Available Numbers Collections][URL_To_Available_Numbers_Collection]
	* NOTE: Further detail of this method will be provided when delivered. 


</div><!-- apimethodgroup -->


<div class="apimethodgroup well well-small" markdown="1">
DELETE
: YES 
- NOTE: not available during the alpha period
	* Using DELETE on this resource releases the specified BlueVia Voice Number ({number}) from your account.
	* NOTE: Further detail of this method will be provided when delivered.
</div><!-- apimethodgroup -->

[URL_To_BlueVia_Dashboard]: https:
[URL_To_BlueVia_Dashboard]: https:
[URL_To_BlueVia_Dashboard]: https:
[URL_To_BlueVia_Voice_And_SMS_Error_Codes]: https:
[URL_To_Available_Numbers_Collection]: https: