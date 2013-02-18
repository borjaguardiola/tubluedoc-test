# Account Management Resources

##### Account

	URI   /comms/v1/me{format}

<div class="apimethodgroup well well-small" markdown="1">
POST
*: NOT ALLOWED


GET{: .apimethod #postmethod data-toggle="collapse" data-target="#postdoc"}
<!-- This HTML doesn't need changes -->
<div class="apidoc collapse in tabable offset1" id="postdoc">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#tab1" data-toggle="tab">Request</a></li>
      <li><a href="#tab2" data-toggle="tab">Response</a></li>
  </ul>
  <div class="tab-content">
<div id="tab1" class="tab-pane active" markdown="1">
* Description
  : Detailed description of the API call if required. Can be multiline. (or can be removed)
* Query Parameters
  : Parameter 1
    : Descripction of parameter 1
  : Parameter 2
    : Description of parameter 2
* Body *JSON or XML*
  : Parameter 1
    : MANDATORY or OPTIONAL
    : Description of parameter 1
* Example
  : **JSON**

    ~~~
    {some: json here}
    ~~~
{: .reqfields}
</div>
<div id="tab2" class="tab-pane" markdown="1">
* Successful response
  : HTTP Response: 201 Created
  : Headers

    : Location (mandatory): Includes the URI pointing to the created resource (an Outbound Call)
    : https://{host}/comms/v1/calls/{callId} 

  : Body

    : The response includes a JSON or an XML body
  : Example
    : JSON

    ~~~
    {some: json here}
    ~~~

* Error response
  : Description of error response, error codes or whatever
</div> <!-- tab2 -->
</div> <!-- tab-content -->
</div> <!-- apidoc -->
</div><!-- apimethodgroup -->

<div class="apimethodgroup well well-small" markdown="1">



GET
: YES - NOTE: not available during the alpha period <i class="icon-chevron-down pull-right">&nbsp;</i>
<!-- Remove the "i" block if this method is not available -->
{: .apimethod #getmethod data-toggle="collapse" data-target="#getdoc"}
<!-- This HTML doesn't need changes -->
<div class="apidoc collapse tabable offset1" id="getdoc">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#tab1" data-toggle="tab">Request</a></li>
      <li><a href="#tab2" data-toggle="tab">Response</a></li>
  </ul>
  <div class="tab-content">

	* Provides basic information about your account. A List of the BLueVia Voice Numbers  on your account are provided. Further detail on these numbers can then be retrieved using the GET operation for [Account Number Collections][URL_To_Account_Number_Collection] and [Account Numbers][URL_To_Account_Number]
	* Your account information will also contain of the balance left on your account.
	* NOTE: Further detail of this method will be provided when delivered. 



<div id="tab1" class="tab-pane active" markdown="1">
  <!-- Request content here if any -->

</div>
<div id="tab2" class="tab-pane" markdown="1">
  <!-- Response content here if any -->
</div> <!-- tab2 -->
</div> <!-- tab-content -->
</div> <!-- apidoc -->
</div><!-- apimethodgroup -->

<div class="apimethodgroup well well-small" markdown="1">




PUT
*: NOT ALLOWED 
{: .apimethod #putmethod data-toggle="collapse" data-target="#putdoc"}
<!-- This HTML doesn't need changes -->
<div class="apidoc collapse tabable offset1" id="putdoc">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#tab1" data-toggle="tab">Request</a></li>
      <li><a href="#tab2" data-toggle="tab">Response</a></li>
  </ul>
  <div class="tab-content">
<div id="tab1" class="tab-pane active" markdown="1">
  <!-- Request content here if any -->

</div>
<div id="tab2" class="tab-pane" markdown="1">
  <!-- Response content here if any -->
</div> <!-- tab2 -->
</div> <!-- tab-content -->
</div> <!-- apidoc -->
</div><!-- apimethodgroup -->

<div class="apimethodgroup well" markdown="1">


DELETE
*: NOT ALLOWED 

[URL_To_Account_Number_Collection]: https:
[Account Numbers][URL_To_Account_Number]: https:{: .apimethod #deletemethod data-toggle="collapse" data-target="#deletedoc"}
<!-- This HTML doesn't need changes -->
<div class="apidoc collapse tabable offset1" id="deletedoc">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#tab1" data-toggle="tab">Request</a></li>
      <li><a href="#tab2" data-toggle="tab">Response</a></li>
  </ul>
  <div class="tab-content">
<div id="tab1" class="tab-pane active" markdown="1">
  <!-- Request content here if any -->

</div>
<div id="tab2" class="tab-pane" markdown="1">
  <!-- Response content here if any -->
</div> <!-- tab2 -->
</div> <!-- tab-content -->
</div> <!-- apidoc -->
</div><!-- apimethodgroup -->