# Call

### Call Collection 

    /comms/v1/calls{format}?QueryParams

<div class="apimethodgroup well" markdown="1">
POST
: Create a new call in the collection. So you establish a new outbound call. <i class="icon-chevron-down pull-right">&nbsp;</i>
{: .apimethod #postmethod data-toggle="collapse" data-target="#postdoc"}
<div class="apidoc collapse in tabable offset1" id="postdoc">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#tab1" data-toggle="tab">Request</a></li>
      <li><a href="#tab2" data-toggle="tab">Response</a></li>
  </ul>
  <div class="tab-content">
<div id="tab1" class="tab-pane active" markdown="1">
* Query Parameters
  : None
* Body
  : JSON or XML
  : Body parameters

    * callerId
      * MANDATORY
      * It has to be one of your BlueVia Voice numbers
    * destination
      * MANDATORY and has to be one of your BlueVia Voice numbers
    * callbackUrl
      * This is optional and can be used to provide a different callback URL, for this call only, compared to the one configured against your BlueVia number. If this is specified BlueVia will make a POST request to this URL, for this call only, for the [Answered in call event notification][URL_To_BlueVia_Voice_Call_Evcent_Notifications]
    * fallbackUrl
      * This is optional and can be used to provide a different fallback URL, for this call only, compared to the one configured against your BlueVia number. In the event that the callbackUrl used on this call is not reachable, BlueVia will make a POST request to this URL, for this call only, for the [CallbackUnavailable in call event notification][URL_To_BlueVia_Voice_Call_Evcent_Notifications]

    ~~~
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
    ~~~
{: .reqfields}
</div>
<div id="tab2" class="tab-pane" markdown="1">
* Successful response:
  : HTTP Response: 201 Created
  : Headers

    * Location (mandatory): Includes the URI pointing to the created resource (an Outbound Call)
    * https://{host}/comms/v1/calls/{callId} 

  : Body:

    * The response includes a JSON or an XML body:
    * JSON (example):

    ~~~
    {
      "callId": "23481-apdifjap-dpifje-18403"
    }

    * XML (example)
          @todo get one

    * CURL example:
      @todo get one
    ~~~

* Error response:
  : Consists of an HTTP Error response together with a code and an explanatory text. Possible errors are those applicable among the errors described in [BlueVia Voice Error Codes][URL_To_BlueVia_Voice_And_SMS_Error_Codes].
</div> <!-- tab2 -->
</div> <!-- tab-content -->
</div> <!-- apidoc -->
</div><!-- apimethodgroup -->

<div class="apimethodgroup well" markdown="1">
GET
: YES - NOTE: not available during the alpha period
{: .apimethod #getmethod data-toggle="collapse" data-target="#getdoc"}
</div>

<div class="apimethodgroup well" markdown="1">
PUT
: NOT ALLOWED
{: .apimethod #putmethod data-toggle="collapse" data-target="#putdoc"}
</div>

<div class="apimethodgroup well" markdown="1">
DELETE
: NOT ALLOWED
{: .apimethod #deletemethod data-toggle="collapse" data-target="#deletedoc"}
</div>

[URL_To_BlueVia_Voice_Call_Evcent_Notifications]: https:
[URL_To_BlueVia_Voice_Call_Evcent_Notifications]: https:
[URL_To_BlueVia_Voice_And_SMS_Error_Codes]: https: