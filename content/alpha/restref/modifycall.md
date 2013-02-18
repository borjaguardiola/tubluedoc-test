## Modify Call - set commands

This shortcut command allows you to provide additional commands to an in progress call represented by the *{callId}*. To do this you can make a POST request to setcommands

	/comms/v1/calls/{callId}/setcommands{format}

<div class="apimethodgroup well well-small" markdown="1">
POST
: YES - You can make a POST request and provide a set of [BlueVia Voice Commands][URL_To_Commands] that will be executed by BlueVia on the call represented by the *{callId}* <i class="icon-chevron-down pull-right">&nbsp;</i><!-- Remove the "i" block if this method is not available -->
{: .apimethod #postmethod data-toggle="collapse" data-target="#postdoc"}
<!-- This HTML doesn't need changes -->
<div class="apidoc collapse in tabable offset1" id="postdoc">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#tab1" data-toggle="tab">Request</a></li>
      <li><a href="#tab2" data-toggle="tab">Response</a></li>
  </ul>
  <div class="tab-content">
<div id="tab1" class="tab-pane active" markdown="1">
* Query Parameters
  : None
* Body *JSON or XML*
  : Body containing the [BlueVia Voice Commands][URL_To_Commands] to be executed
* Example
  : **JSON**

    ~~~
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
    ~~~
  : **XML**

    ~~~
		@TODO
    ~~~
  : **CURL**

    ~~~
		@TODO
    ~~~
{: .reqfields}
</div>
<div id="tab2" class="tab-pane" markdown="1">
* Successful response
  : HTTP Response: 202 Accepted.
	: The request is Accepted. This doesn’t mean that any of the commands has been executed yet.
  : Body: 
  	: The response does not include a body.

* Error response
  : Consists of an HTTP Error response together with a code and an explanatory text. Possible errors are those applicable among the errors described in [BlueVia Voice Error Codes][URL_To_Voice_And_SMS_Error_Codes]. 
</div> <!-- tab2 -->
</div> <!-- tab-content -->
</div> <!-- apidoc -->
</div><!-- apimethodgroup -->

<div class="apimethodgroup well well-small" markdown="1">
GET
: N/A. 
{: .apimethod #getmethod data-toggle="collapse" data-target="#getdoc"}
<!-- This HTML doesn't need changes -->
</div><!-- apimethodgroup -->

<div class="apimethodgroup well well-small" markdown="1">
PUT
: N/A 
{: .apimethod #putmethod data-toggle="collapse" data-target="#putdoc"}
<!-- This HTML doesn't need changes -->
</div><!-- apimethodgroup -->

<div class="apimethodgroup well well-small" markdown="1">
DELETE
: N/A 
{: .apimethod #deletemethod data-toggle="collapse" data-target="#deletedoc"}
<!-- This HTML doesn't need changes -->
</div><!-- apimethodgroup -->

<%= render '/links'%>