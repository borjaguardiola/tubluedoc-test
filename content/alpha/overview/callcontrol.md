# BlueVia Voice Call Control Commands


The [BlueVia Voice Call Control Commands] [Command Reference] provide a rich tool set allowing you to manipulate calls. You can specify your call control commands in either JSON or XML, and these commands provide a mechanism to tell BlueVia how you wish to manage a call. Call control commands can be provided to BlueVia at any time prior to, during or even after a call, to enable you to engage with your Customer. 

Using call control commands you can:

* [Dial numbers and conferences][Command Reference Dial]. This command allows you to add a participant into a call, i.e. add a call leg. It also allows you to create a named conference call that you can add further participants into. To manage these different call scenarios there are Dial subcommands:
	* You can add a new participant to a call by [Dialing their Number] [Command Reference Dial Number]
	* You can create a conference or add a new participant into a conference by [Dialing specifying a conference name][Command Reference Dial Conference]
	* You can merge calls by [Dialing using an existing callId][Command Reference Dial Callid]
* [Specify content to be spoken on a call] [Command Reference Speak]. Using this command you can specify text that will be spoken on a specific leg or legs of a call.
* [Specify content to be streamed on a call][Command Reference Play]. This allows you to stream MP3 or WAV file content to a specific leg or legs of a call.
* [Request to get DTMF input from a caller][Command Reference GetDigits]. With this you can request to retrieve DTMF input, i.e. input from your Customers keypad. 
* [Record a call] [Command Reference Record]. If you want to record a specific leg or legs of a call you can do so using the Record command
* [End a call][Command Reference Hangup]. With this command you can terminate in progress calls or terminate specific in progress call legs.
* [Put a call in a wait state] [Command Reference Wait]. Using the Wait command you can put a delay between commands executed on a call.
* [Redirect a call to accept new commands] [Command Reference Redirect]. Using the Redirect command you can provide additional commands to an inprogress call.

**and coming soon** 
* [Send an SMS from your BlueVia Voice Numbers] [Command Reference SMS]. Although not supported during the alpha period, after commercial launch, you will be able to send and receive SMS to certain BlueVia Voice Numbers. Functionality for inbound SMS will be limited to certain countries, however you will be able to send SMS, using the SMS command, globally. 


[Forward - Call Flows] [Overview Call Flows]  /  [Back - The BlueVia RESTful API][Overview REST API]  


[Command Reference]: /alpha/commandref/introduction
[Command Reference Dial]: /alpha/commandref/dial
[Command Reference Dial Number]: /alpha/commandref/dial#number
[Command Reference Dial Conference]: /alpha/commandref/dial#conference
[Command Reference Dial CallId]: /alpha/commandref/dial#callid
[Command Reference Speak]: /alpha/commandref/speak
[Command Reference Play]: /alpha/commandref/play
[Command Reference GetDigits]: /alpha/commandref/getdigits
[Command Reference Record]: /alpha/commandref/record
[Command Reference Hangup]: /alpha/commandref/hangup
[Command Reference Wait]: /alpha/commandref/wait
[Command Reference Redirect]: /alpha/commandref/redirect
[Command Reference SMS]: /alpha/commandref/sms
[Overview REST API]: /alpha/overview/restapi
[Overview Call Flows]: /alpha/overview/callflows
