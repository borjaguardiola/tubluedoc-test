# Known Alpha Limitations


The alpha release of the BlueVia voice API’s, as the name suggests, is an alpha! Although there are no usage limitations of the service, there are some functional limitations, that we are addressing and rolling out soon. Please see the [BlueVia Voice roadmap][RoadMap] for an overview of when our release 1.0 will be available and detail of the further functionality we will be offering soon!

The following provides an overview of immediate limitations that you should be aware of. It's probably a good idea to give these an initial skim read so you can refer back to them when you start playing with the functionality.

If there is something further, not listed here that is causing you issues, please contact us immediately, so we can see if there is an immediate solution for you, or alternatively so we can turn around a solution for you. As always please send any issues to <support@bluevia.com>, or alternatively <murray@bluevia.com>. Also follow, and contact us at twitter [@BlueVia] [BlueVia Twitter].

## Exporting Recordings   

Currently you can only use the *export functionality* for the [record command][Command Reference Record]. Initially during the alpha we will not be hosting any recordings you make on our servers. For our release 1.0 we will be supporting the hosting of recordings. There are a few things that you should be aware of:

* You can only play back the recording you have made when it is available on your server. BlueVia will have to have completed the HTTP POST of your recording to either your server (or as you can see in the [record command][Command Reference Record] description, initially we will also allow you to export your recording to Amazon Web Services S3 storage). This is not a major issue for small recordings, for example the recording of a conference participants name, but immediate playback of longer recordings may be an issue. BlueVia will only POST to the recording to your chosen export location once the recording has been completed. 
* We are going to add a post complete notification to allow developers to know exactly when a recording export has been completed. 

## Purchasing Numbers

For the alpha release of the platform it is not possible to purchase numbers. For the alpha we are giving you numbers in each of our launch countries: 

* The USA and Canada
* The UK and
* Germany.

These numbers are free for your use during the alpha period. Once the alpha has completed these numbers will be charged for, against the balance in your account. Please see the [BlueVia Voice API Costs][Overview Pricing] to see the monthly fees for keeping BlueVia Voice Numbers

## SMS Support

SMS from your BlueVia Numbers is coming soon. To see when this will be available, and in which countries, please see the [BlueVia Voice Roadmap][Roadmap]

## Service Usage Reporting

Currently there is no service usage reporting. We are working on it! This is coming soon. 

This also includes error notifications. This poses an issue for inbound calls to your numbers as it is not possible to see errors generated as a result of inbound calls. We are working on providing error reporting on the portal, for debugging purposes. This will greatly aid in the analysis of issues. In the meantime, in the event that an error is due to the JSON or XML being incorrectly defined there is a way to test this:

If you create a call using the [/calls resource][API Reference Call Collection], you can then modify that call and pass in either XML or JSON commands. See the [Modifying an existing call quick start guide][Quick Start Modify Call]. If there is an issue with your XML or JSON then this will be seen when you make an API call to the calls resource and pass in commands using the setcommands feature, allowing you to modify a call.

We are working to expose a report on the BlueVia portal that will highlight all errors that occur on your numbers
 
We are also working to expose an error notification event, [see call notifications][Notifications] such that it is possible to be notified to your callback URL when an error occurs on your numbers

## RESTful API

Full resource access within the [BlueVia RESTful API][API Reference] is not available in the alpha release. The limitations within the API are highlighted within the RESTful API reference.


[Forward - BlueVia Voice API Quick Start Guide] [Quick Start Guide] / [Back - BlueVia Voice API Costs] [Overview Pricing]


[RoadMap]: /alpha/roadmap/
[BlueVia Twitter]: http://www.twitter.com/bluevia
[Command Reference Record]: /alpha/commandref/record
[API Reference Call Collection]: /alpha/restref/callcollection
[Quick Start Modify Call]: /alpha/quickstart/modifycall
[Notifications]: /alpha/notifications/
[API Reference]: /alpha/restref/
[Overview Pricing]: /alpha/overview/pricing
[Quick Start Guide]: /alpha/quickstart/