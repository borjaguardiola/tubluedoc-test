# Account Management Resources

## Account

	URL /comms/v1/me{format}

<div class="apimethodgroup well well-small" markdown="1">

POST
: NOT ALLOWED

{: .apimethod #postmethod data-toggle="collapse" data-target="#postdoc"}
<!-- This HTML doesn't need changes -->
</div><!-- apimethodgroup -->


<div class="apimethodgroup well well-small" markdown="1">
GET
: YES - NOTE: not available during the alpha period <i class="icon-chevron-down pull-right">&nbsp;</i>
<!-- Remove the "i" block if this method is not available -->

	* Provides basic information about your account. A List of the BLueVia Voice Numbers  on your account are provided. Further detail on these numbers can then be retrieved using the GET operation for [Account Number Collections][URL_To_Account_Number_Collection] and [Account Numbers][URL_To_Account_Number]
	* Your account information will also contain of the balance left on your account.
	* NOTE: Further detail of this method will be provided when delivered. 

{: .apimethod #getmethod data-toggle="collapse" data-target="#getdoc"}
<!-- This HTML doesn't need changes -->
<div class="apidoc collapse tabable offset1" id="getdoc">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#tab1" data-toggle="tab">Request</a></li>
      <li><a href="#tab2" data-toggle="tab">Response</a></li>
  </ul>
  <div class="tab-content">

</div> <!-- tab-content -->
</div> <!-- apidoc -->
</div><!-- apimethodgroup -->

<div class="apimethodgroup well well-small" markdown="1">

PUT
: NOT ALLOWED 
{: .apimethod #putmethod data-toggle="collapse" data-target="#putdoc"}
<!-- This HTML doesn't need changes -->

</div><!-- apimethodgroup -->


<div class="apimethodgroup well" markdown="1">

DELETE
: NOT ALLOWED 

{: .apimethod #deletemethod data-toggle="collapse" data-target="#deletedoc"}
<!-- This HTML doesn't need changes -->

</div><!-- apimethodgroup -->

<%= render '/links'%>

