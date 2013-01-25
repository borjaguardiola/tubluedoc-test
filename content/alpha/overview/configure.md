# Configuring Your BlueVia Numbers

From the [BlueVia dashboard][BlueVia Dashboard] you will be able to configure any of the numbers on your account. The numbers that will be provided to you for the alpha will have a default configuration that you are able to modify through the dashboard. Also any number that you purchase, post alpha, will be able to be managed through the dashboard. 

It is also possible to configure your numbers using the [BlueVia Voice REST API] [API Reference].

Initially there are two URLs to configure for each number. They are:
 
**Firstly** the *Voice Callback URL* - This URL is used by BlueVia to make HTTP POST requests for any notifications made to your application server. When BlueVia makes a request to this URL, that should point to your application server, if you choose to you can specify call control commands in the response. You should always respond with a HTTP 200 Success response, otherwise BlueVia may call our fallback URL unnecessarily. All [BlueVia Voice API Notifications][Notifications] will be sent to this URL. 

The URL can either be HTTP endpoint or a HTTPS endpoint. BlueVia will automatically trust a HTTPS endpoint covered by a certificate from a trusted certificate authority,  Currently you cannot use a self signed certificate for your HTTPS endpoints. Only trusted certificates can be used.

**Secondly** the *Voice Fallback URL* - BlueVia will make a HTTP POST request to this URL in the event of any HTTP error that is generated while attempting to make a request to the callback URL associated with the Bluevia Voice Number. Should BlueVia make receive a HTTP 4xx or HTTP 5xx response as a result of a request to your callback URL then a HTTP POST request will be made to your fallback URL. 

Although it is not compulsory, it is a good idea, to host your fallback URL on a separate domain, or server, to your callback URL. This is as if BlueVia receives an error response from a HTTP request made to your callback URL, if the fallback URL is hosted on the same server, then there is a chance that this will fail as well. 

If you receive a request to your fallback URL you are able to gracefully manage a call in the event of a failure in your application server. You can specify call control commands in the response to a BlueVia request to your fallback URL, and you should always provide a HTTP 200 Success response to a request made to your fallback URL.

If there is any error received by BlueVia as the result of a request to your fallback URL, BlueVia will not retry the request. Consequently any call functionality, in this case, will fail.

During the alpha period there will not be any call failure reporting available on the BlueVia portal. Please refer to the [BlueVia Voice API roadmap][RoadMap] to see when error and debugging reporting will be available for the APIs   

When we add SMS support, for BlueVia Voice Numbers that have access to SMS, you will also be able to specify the SMS callback URL - the URL used by BlueVia to notify of an inbound SMS, and the SMS fallback URL - the URL used by BlueVia to notify of any HTTP errors encountered by BlueVia when trying to make a POST request to the SMS callback URL. These will also have a default configuration, that you can override, once SMS functionality is available, post the BlueVia Voice alpha release. 

In the same manner as you can override, voice callback and fallback URLs, you will be able to modify SMS callback and fallback URLs via the RESTful API that will be made available, post alpha release, that will provide access to a SMS resource. Please refer to the [BlueVia Voice API roadmap][RoadMap] to see when SMS functionality will be available.    



[Forward - Using Your BlueVia Voice Numbers] [Overview Using Numbers] /  [Back - Buying Numbers] [Overview Numbers]

[BlueVia Dashboard]: http://www.bluevia.com
[API Reference]: /alpha/restref/
[Notifications]: /alpha/notifications/
[RoadMap]: /alpha/roadmap/
[Overview Numbers]: /alpha/overview/numbers
[Overview Using Numbers]: /alpha/overview/usingnumbers