# Call Flows

An outbound call scenario, using the [BlueVia Voice RESTful API][REST Ref] can be described as follows:


**TODO add sequence diagram for outbound API call flow**


1. The 1st leg of a call can be created by a [HTTP POST to the BlueVia Calls resource][REST Ref Call Collection]
2. This will result in the destination address, provided in the POST HTTP request body, to start ringing.
3. When the destination phone is answered, Bluevia makes a HTTP POST request to the URL configured by you on you BlueVia Voice Number. See [Configuring your BlueVia number][Overview Configure]. Although you have a callback URL configured on your number you can override this by specifying an alternative URL in the body of the POST HTTP request used to create the call.
4. Upon receiving the HTTP POST notification from BlueVia (Further detail about [BlueVia Voice API notifications][Notifications]), which lets you know the destination address has answered the call, you are then able to manage the call control functionality. At this stage you could provide a HTTP response to the BlueVia Voice Call Notification to specify what functionality you wish to enact on the call. Within the response you can specify the Call Control commands you wish to execute on the call. 
5. Alternatively you may wish to continue engaging with the call via a POST to the calls resource specifying the callID returned to you in you original POST request to create the call. The choice is yours.
  
An inbound call scenario, using the [BlueVia Voice Call Control Commands][Command Reference] can be described as follows: 


**TODO add sequence diagram for inbound call flow**


1. When your BlueVia Voice Number is called BlueVia makes a HTTP POST request to the URL that you have configured on your BlueVia Voice Number. See [Configuring your BlueVia number][Overview Configure]. 
2. This POST request will contain the data you need to engage with your Customer. Such as the number of the person who has called etc... See [BlueVia Voice API notifications][Notifications] for the complete set of data that is available or each notification that can be sent by BlueVia to your application server. 
3. When you receive the notification from BlueVia you can decide how you wish to engage with the inbound call. At this stage, you may wish to respond to the HTTP POST request made by BlueVia to your application server, or alternatively, as with the outbound call scenario you may wish to modify the call via an API request.  

These flows are simply examples though. You can choose to use any combination of Call Control Commands and API calls that you wish to. These flows are based on the standard notifications that are received for in progress calls. If you wish to, you can specify to receive notifications for all in call events that are received by BlueVia. By [managing BlueVia Voice Call Notifications][Notifications] you can create feature rich call flows by having access to notifications for every facet of an existing call. 

[Forward - Existing BlueVia APIs] [Overview Existing APIs]  /  [Back - Call Control Commands][Overview Call Control]  


[REST Ref]: /alpha/restref/
[Overview Call Control]: /alpha/overview/callcontrol
[Overview Existing APIs]: /alpha/overview/existing
[REST Ref Call Collection]: /alpha/restref/callcollection
[Overview Configure]: /alpha/overview/configure
[Notifications]: /alpha/notifications/
[Command Reference]: /alpha/commandref/
[Overview Configure]: /alpha/overview/configure