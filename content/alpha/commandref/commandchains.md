# BlueVia Voice Command Chains


The following highlights the chains of commands that can be provided within a single response from a request that BlueVia makes to your configured callback URL’s. These lists of commands can also be provided in the body of REST API calls made to BlueVia, should the API method support call commands, e.g. when modifying an existing call using the setcommands feature on a specific [calls resource] [URL_To_REST_API_Calls_Resource]. 

Within the descriptions below The *speak* and *play* commands are interchangeable at any level, this is as dynamic speech or pre-recorded audio can always be interchanged should the developer wish to. 

## Dial

You can chain the following:

* *dial number* - should support multiple numbers OR
* *dial conference* - OR
* *dial callID* followed by
* *speak* and then
* *redirect*

##GetDigits

You can chain the following:

* *speak*
* Within the *getDigits* command
	* *speak* e.g. push 1 or 2
* After *getDigits* it is possible to specify another speak command e.g. we didn’t get input in time. This is only executed in the event that the *getDigits* command does not result in digits being POSTed to the developers specified *callback* URL.
* *redirect* - Again, this will only be reached if the *getDigits* command does not POST digit data to the developer specified *actionUrl*

## Play

You can chain the following:

* *speak*
* *play*
* *speak*
* *redirect*

## Record

You can chain the following:

* *speak*
* *record* including the embedded *speak* command
* *speak*
* *redirect*

## Redirect

You can chain the following:

* *speak*
* *redirect*

## Wait

Can be used in between any commands

<%= render '/links'%>