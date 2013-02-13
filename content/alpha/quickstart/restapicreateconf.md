# Creating Conference Calls using the BlueVia Voice RESTful API

Creating conference calls using the API couldn't be simpler. You can use the exact same code that you look at in the [creating a call] [Quick Start Guide Call With REST API] quick start demo.

The only change you have to make is to update the JSON (or XML if you are using XML) that your BlueVia Voice Number refers to with its callback URL. So if you update your [BlueVia Voice Number][BlueVia Dashboard] to the following JSON

	{
	"commands": [
			{
			"dial": {
				"conferenceName": "myConference"
				}
		}

		]
	}


When our A Phone is called, by the original *makeACall.php* script, instead of the B Phone being called, when BlueVia makes a HTTP POST request to retrieve your callback URL, it will place caller A into a conference call. So essentially you have called Phone A and placed them in a conference call. 

You could then update *makeACall.php* to call Phone B, and they too will be placed into the same conference call, as Phone A. Alternatively simply dial the BlueVia Voice Number that you are using as the *callerId*, in the scripts. If you call this number from, say, Phone C, when the BlueVia Voice Number receives the call, BlueVia will make a request to the callback URL configured on the number. In this case it is the same dial command, as used above, i.e. adding the caller to the conference named *myConference*. So mixing inbound and outbound calls in the same call lifetime is fine. They will all end up in the same conference!

You have just covered the basics with these quick start guides. They should be enough to get you up and running but for further details about the RESTful API see [the BlueVia RESTful API reference][API Reference]. For further details about the Call Control Commands see the [BlueVia Voice Call Control Comands Reference][Command Reference].




[Quick Start Guide Inbound]: /alpha/quickstart/connectcallnocode
[Quick Start Modify Call Rest API]: /alpha/quickstart/modifycall
[BlueVia Dashboard]: https://www.bluevia.com
[Quick Start Guide Call With REST API]: /alpha/quickstart/restapicreatecall
[API Reference]: /alpha/restref/
[Command Reference]: /alpha/commandref/