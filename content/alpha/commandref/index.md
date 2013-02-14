# BlueVia Voice Call Control Commands Reference


@TODO NOTE: I STILL NEED TO ADD DESCRIPTIONS FOR COMMANDS BEING DIRECTED AT ALL CALL LEGS OR TARGETED AT SPECIFIC CALL LEGS

You have access to a rich set of call control functionality via either XML and JSON call control commands. When you call one of your[BlueVia Voice Numbers][URL_To_BlueVia_Dashboard], or make a [BlueVia REST API request][URL_To_BlueVia_Voice_RESTful_API_Reference] to create a new call, or modify an existing call, you can specify how to manage the calls behaviour by specifying XML or JSON commands. Calls can be managed by commands via the following mechanisms:

When your BlueVia Voice Number is called, BlueVia will make a HTTP POST request to the callback URL associated with your number. You can provide Call Control Commands in the HTTP Response body to BlueVia
When you make a REST API request to either create a call, when the phone that is being called is answered BlueVia will make a HTTP POST request to the callback URL associated with with the callerId that was provided in the REST API request. NOTE: In the API request you can override the callback URL for your BlueVia Voice Number that you use as the callerId. This will override the callback URL for the present call only. For further detail on this see the [BlueVia REST API request][URL_To_BlueVia_Voice_RESTful_API_Reference] @todo update link to actual API section. 
When you use the [/setcommands shortcut][URL_To_BlueVia_Voice_RESTful_API_Reference] @todo update link to actual API section. you can provide either JSON or XML commands in the REST API request body. You can also provide a URL to the XML or JSON commands. BlueVia will then make a HTTP request to the URL to get those commands.
Various call events will also result in BlueVia making requests to the callback URL’s you have configured. BlueVia will make a HTTP POST request to your callback URL providing all event data in the POST request body. You can respond to these notifications with JSON or XML Call Control Commands. To Understand how BlueVia can provide you detail of call notifications to your BlueVia Voice Numbers refer to the [BlueVia Voice Call Event Notification Reference][URL_To_BlueVia_Voice_Call_Event_Notification_Reference]


The following Call Control Commands can be specified by you

[dial][URL_To_Dial_Command]
[speak][URL_To_Speak_Command]
[play][URL_To_Play_Command]
[getDigits][URL_To_GetDigits_Command]
[record][URL_To_Record_Command]
[hangup][URL_To_Hangup_Command]
[redirect][URL_To_Redirect_Command]
[wait][URL_To_Wait_Command]
[sms][URL_To_SMS_Command] sms

[URL_To_BlueVia_Dashboard] http://
[URL_To_BlueVia_Voice_RESTful_API_Reference] http://
[URL_To_BlueVia_Voice_RESTful_API_Reference] http://
[URL_To_BlueVia_Voice_Call_Event_Notification_Reference] http://
[URL_To_Dial_Command] http://
[URL_To_Speak_Command] http://
[URL_To_Play_Command] http://
[URL_To_GetDigits_Command] http://
[URL_To_Record_Command] http://
[URL_To_Hangup_Command] http://
[URL_To_Redirect_Command] http://
[URL_To_Wait_Command] http://
[URL_To_SMS_Command] http://