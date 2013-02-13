# Using Your BlueVia Voice Numbers

## Inbound Calls

The easiest way to experiment with your BlueVia Numbers is to call them. See what happens. If you then look at your [BlueVia Dashboard][BlueVia Dashboard] to see the configuration of your number you can see what happens. Initially associated with all BlueVia Numbers is a default configuration of:


	{
	    "commands": [
	        {
	            "speak": {
	                "text": "Welcome to TuBlue, please configure your Application to change this default behavior",
	                "voice": "Male"
	            }
	        },
	        {
	            "wait": {
	                "length": 5
	            }
	        },
	        {
	            "speak": {
	                "text": "Bye bye",
	                "voice": "Male"
	            }
	        },
	        {
	            "hangup": {}
	        }
	    ]
	}


When you call your number, you will hear the Text To Speech engine speaking in a male voice the text listed within the [Speak Command][Command Reference Speak]. As you can then see the call will hangup due to the [Hangup command][Command Reference Hangup] 

The easiest way to modify this configuration is to have a look at our [BlueVia Voice quick start guide][Quick Start Guide]. If you have your own server to play with, you can host your own [BlueVia Voice Control Commands][Command Reference] to alter the behaviour of an inbound call. IF you don't have immediate access to a server, simply try hosting some static XML of JSON call control commands in a file hosted in a cloud file sharing service. Have a look at the first Quick Start Guide to [connect an inbound call without any code][Quick Start Guide Connect Call No Code]. This uses a static file hosted on Amazon S3 to manage a call connection.
  
## Outbound Calls

To make outbound calls via the the [BlueVia VOICE RESTful API][API Reference] you will need access to your application server to be able to make HTTP REST API requests. The easiest way to get up and running is to have a look at the quick start guide to [create conference calls using the BlueVia Voice RESTful API][Quick Start Guide REST API Create Call]  



[BlueVia Dashboard]: https://www.bluevia.com
[Command Reference Speak]: /alpha/commandref/speak
[Command Reference Hangup]: /alpha/commandref/hangup
[Quick Start Guide]: /alpha/quickstart/
[Command Reference]: /alpha/commandref/
[Quick Start Guide Connect Call No Code]: /alpha/quickstart/connectcallnocode
[Quick Start Guide REST API Create Call]: /alpha/quickstart/restapicreatecall
[API Reference]: /alpha/restref/
[Overview Configure]: /alpha/overview/configure
[Overview Pricing]: /alpha/overview/pricing
