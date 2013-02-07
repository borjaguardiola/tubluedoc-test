# BlueVia Voice Call Notification Events Reference

During a call BlueVia may send notifications for in-call events that occur during a calls lifetime. BlueVia will HTTP POST these in call event notifications to the callback URL assigned to your number, or alternatively, if you have overridden the callback URL via a HTTP POST made to the [calls resource][URL_To_REST_API_Reference_Calls_Resource], BlueVia will HTTP POST event notifications to the call specific URL.
 
For an inbound call to your [BlueVia Voice Number][URL_To_BlueVia_Dashboard] a CalledNumber event is always HTTP POSTed to the callback URL associated with your number. Every time your BlueVia Voice Number is called, you will always receive this as an event on your callback URL

For an outbound call, created by calling <a href=”URL_To_REST_API_Reference>BlueVia Voice RESTful API</a> the first Answered event is always sent to the callback URL associated with the BlueVia Voice Number you provided as the callerId in the API method call. The callback URL associated with your BlueVia Voice Number, can of course be overridden every time a HTTP POST request is made to the [calls resource][URL_To_REST_API_Calls_Resource]. As a result you can create a call specific callback URL should you wish to, that will receive call event notifications.

BlueVia Call Notifications are HTTP POSTed to your call back URL’s and the body of the request will contain the event detail. The body of the HTTP POST request contains the JSON formatted response e.g.:

{"timestamp":"<datetime value>","callerId":"tel:+4412345678","eventName":"<nameOfTheEvent>","callId":"<theIDOfTheCallResource>","legId":"<theIDOfTheLeg>","destination":"tel:+4423456789"}

Where

	* timestamp represents the time that the event occured
	* callerId is the ID of the calling party
	* destination represents the party being called
	* eventName is the name of the in call event - see below for further details on the types of events.
	* callId represents the ID of the call resource that the event has occurred on
	* legId represents the ID for the leg, within the call, that the event has occurred on

There are also additional attributes for some of the different in call events. These are discussed in further detail in each of the following descriptions.

As discussed previously the events that are sent to a callback URL associated with either a BlueVia Voice Number or a specific calls resource are limited, dependant on the direction of the call - inbound or outbound. However if you include a “notifications”=”true” element, as the first element in:

	* the body of a HTTP POST request to create a calls resource OR
	* the first command in a response to a BlueVia HTTP POST request to your callback URL

Then you will receive all of the notifications that are generated as a result of activity on your live calls. To do this, do the following,

For a HTTP POST to create a calls resource 

	@todo add example of “notifications”=”true”
 
For a JSON response to a HTTP POST request made by BlueVia to your callback URL

	@todo add example of “notifications”=”true”

For an XML response to a HTTP POST request made by BlueVia to your callback URL

	@todo add example of “notifications”=”true”


NOTE: This must be the first element in your comands, and will be ignored otherwise. You can only set  “notifications”=”true” as the first action of a call. You cannot change a calls behaviour, with respect to the in call event notifications mid call.


## In Call Event Notification Types


The following represent the different in call event types that can be provided to your callback URL. These are represented by the eventName attribute in the body of the HTTP POST request.

	* CalledNumber - occurs when your BlueVia Voice Number is called 
	* Answered - when a called party answers. an additional 
	* Ringing - when the destination is ringing
	* DigitsCollected - this provides detail of any digits collected via DTMF input as the 
	* result of a getDigits command. This notification will have an additional attribute - digits which represents the input collected from the DTMF handset of the caller. NOTE: If you ask the caller to finish their DTMF input with a specific key press e.g. ‘#’, then this character will also appear in the digits attribute within the event notification.
	* Busy - in the event that the destination of the call is busy
	* Failed - possible?
	* NotReachable - possible?
	* NoAnswer - possible?
	* HangUp - if a caller within a call hangs up. This event will have an additional attribute direction which represents how the call was Hung up. The direction attribute can have  one of two values - fromParticipant if someone on the call has Hung up, or fromApplication in the event that the event occured as a result of a HangUp command 
	* PlaybackStarted - occurs when either a speak command or play command starts on a call
	* PlaybackStopped - occurs when either a speak command or play command finishes on a call
	* RecordingStarted - occurs when a recording starts due to a record command
	* RecordingStopped - occurs when a recording stops on a cal
	* CallbackUnavailable - possible?
	* Redirected - when a redirect command is executed on a call


NOTE: That you will only receive the following notifications:

	* A CalledNumber event OR
	* The first Answered event 

on a call unless you set “notifications”=”true”. If you do this, then you will have access to all call notifications.

[URL_To_REST_API_Reference_Calls_Resource]: https:
[URL_To_BlueVia_Dashboard]: https: 
[URL_To_REST_API_Calls_Resource]: https:
