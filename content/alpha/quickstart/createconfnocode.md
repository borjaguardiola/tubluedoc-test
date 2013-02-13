
# Create a Conference Call Without Any Code

Next - let's modify the call connecting a call example above slightly. Either modify the JSON created in the [connect a call quick start][Quick Start Guide Inbound] or create a new file with the following JSON:

	{
		"commands": [
			{
		  		"dial": {
					"conferenceName": "myConference"
					}
			}

    		]
	}

If you simply modified the original file you created in [connect a call quick start][Quick Start Guide Inbound] then there is no need to update your BlueVia Voice Number configuration. Simply call your BlueVia Voice Number again.

If you did create a new JSON file then update your [BlueVia Voice number configuration][BlueVia Dashboard] and then call your number.

You are the first caller into the conference service that you have just created without having to code a single line of code! Sure there was some configuration, but that wasn't hard! ;-)
Call your BlueVia Number again from a couple of other phones and have a conference call - hopefully about important things ;-) 

The [Dial command documentation][Command Reference Dial Conference] provides further detail about using this command for conference purposes, including detail about additional conference attributes.

OK static calls and conferences are OK, but lets explore a little more and see what you can do. Have a look at the next quick start guide to [create a a Conference with pin codes] [Quick Start Guide Conf With Pin Code].



[BlueVia Dashboard]: https://www.bluevia.com
[Command Reference Dial Conference]: /alpha/commandref/dial#conference
[Quick Start Guide Conf With Pin Code]: /alpha/quickstart/confwithpincode
[Quick Start Guide Inbound]: /alpha/quickstart/connectcallnocode