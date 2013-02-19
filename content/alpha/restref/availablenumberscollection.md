## Available Numbers Collection


URI
	* /comms/v1/availablenumbers{format}

	* As highlighted in the [Known Limitations][URL_To_Known_Limitations] during the alpha period it will not be possible to purchase numbers. Instead we are giving you numbers in each of the supported alpha territories. When numbers are available to purchase the Available Numbers Collection will provide a mechanism for you to access the details of numbers that are available to purchase. You will then be able to purchase these numbers, and add them to your account using the [Account Number Collections][URL_To_Account_Number_Collection] and [Account Numbers][URL_To_Account_Number]


<div class="apimethodgroup well well-small" markdown="1">
POST
: NOT ALLOWED

</div><!-- apimethodgroup -->

<div class="apimethodgroup well well-small" markdown="1">
GET
: YES - NOTE: not available during the alpha period
	* Using GET on this resource will provide a list of numbers, that match the specified query parameters you provide - country, area code etc..., that are available to purchase and add to your account.
	* NOTE: Further detail of this method will be provided when delivered.


</div><!-- apimethodgroup -->

<div class="apimethodgroup well well-small" markdown="1">
PUT
: NO 
</div><!-- apimethodgroup -->



<div class="apimethodgroup well well-small" markdown="1">
DELETE
: NOT ALLOWED
</div><!-- apimethodgroup -->


<%= render '/links'%>