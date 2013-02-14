# BlueVia Voice Call Notification Events Reference

During a call BlueVia may send notifications for in-call events that occur during a calls. BlueVia will HTTP POST these in call event notifications to the callback URL assigned to your number, or alternatively, if you have over-ridden the callback URL via a HTTP POST made to the [Calls resource][URL_To_REST_API_Reference_Calls_Resource]. 

For an inbound call to your [BlueVia Voice Number][URL_To_BlueVia_Dashboard] a CalledNumber event is always HTTP POSTed to the callback URL associated with your number. Every time your BlueVia Voice Number is called, you will always receive a notification of this, via a *CalledNumber* event on your callback URL.

For an outbound call, created by a HTTP POST to the [Calls resource] [URL_To_REST_API_Reference_Calls_Resource] the first *Answered* event is always sent to the callback URL associated with the BlueVia Voice Number. The callback URL associated with your BlueVia Voice Number, can of course be over-ridden every time a HTTP POST request is made to the [Calls resource][URL_To_REST_API_Calls_Resource]. As a result you can create a call specific callback URL should you wish to, that will receive call event notifications.

BlueVia Call Notifications are HTTP POSTed to your callback URL’s and the body of the request will contain the event detail. The body of the HTTP POST request contains the JSON formatted response e.g.:

	{"timestamp":"<datetime value>","callerId":"tel:+4412345678","eventName":"<nameOfTheEvent>","callId":"<theIDOfTheCallResource>","legId":"<theIDOfTheLeg>","destination":"tel:+4423456789"}

Where

* *timestamp* represents the time that the event occured
* *callerId* is the ID of the calling party
* *destination* represents the party being called
* *eventName* is the name of the in call event - see below for further details on the types of events.
* *callId* represents the ID of the call resource that the event has occurred on
* *legId* represents the ID for the leg, within the call, that the event has occurred on

There are also additional attributes for some of the different in call events. These are discussed in further detail in each of the following descriptions.


## In Call Event Notification Types


The following represent the different in call event types that can be provided to your callback URL. These are represented by the eventName attribute in the body of the HTTP POST request.

**NOTE:** During the alpha period the only notifications provided will be

* the first Answered notification on an outbound call AND
* CalledNumber on an inbound call.

**The discussion below relates to a feature that we are working on in whihc you will be able to receive these further in call events**

* *CalledNumber* - occurs when your BlueVia Voice Number is called 
* *Answered* - when a called party answers. 
* *Ringing* - when the destination is ringing
* *DigitsCollected* - this provides detail of any digits collected via DTMF input as the result of a *getDigits* command. This notification will have an additional attribute - *digits* which represents the input collected from the DTMF handset of the caller. **NOTE:** If you ask the caller to finish their DTMF input with a specific key press e.g. '#', then this character will also appear in the digits attribute within the event notification.
* *Busy* - in the event that the destination of the call is busy
* *Failed*
* *NotReachable*
* *NoAnswer*
* *HangUp* - if a caller within a call hangs up. This event will have an additional attribute direction which represents how the call was Hung up. The direction attribute can have  one of two values - fromParticipant if someone on the call has Hung up, or fromApplication in the event that the event occured as a result of a HangUp command 
* *PlaybackStarted* - occurs when either a *speak* command or *play* command starts on a call
* *PlaybackStopped* - occurs when either a *speak* command or *play* command finishes on a call
* *RecordingStarted* - occurs when a recording starts due to a *record* command
* *RecordingStopped* - occurs when a *recording* stops on a call
* *Redirected* - when a redirect command is executed on a call


**AGAIN NOTE:** That you will only receive the following notifications during the alpha period:

* A *CalledNumber* event on an inbound call OR
* The first *Answered* event on an outbound call 


[URL_To_REST_API_Reference_Calls_Resource]: /alpha/restref/callcollection/
[URL_To_BlueVia_Dashboard]: https://bluevia.com 
[URL_To_REST_API_Calls_Resource]: /alpha/restref/callcollection/
