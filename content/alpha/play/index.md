# Play Time

We absolutely love seeing some of the creations that you are making using the BlueVia Voice APIs. If you would like us to feature details of what you have been doing with our APIs please send us your details so we can have a look. As always please connect through @BlueVia on twitter, or via email to <support@bluevia.com> or <murray@bluevia.com>.

Here are some of the examples of what folks have been doing with our APIs.

## News For The Visually Impaired

This is a very simple set of PHP scripts, that you can [download here][BBC News Reader], that will request the BBC news RSS feed and read the contents to a caller. The caller can then select the news story that interests them and request for more detail on it.

In this demo there are two files

* *BBC-RSS-Reader.php* which makes a request to retrieve the BBC RSS feed. It then formats the RSS response into a news summary which is added to a speak command which is 'read' to the caller as part of a *getDigits* command.
* When the caller selects a news story they are interested in the *actionHandler.php* script is called which then formats a *speak* command which is spoken to the caller. Once the news story is finished the caller is redirected back to the news summary again via the *redirect* command.

To run this demo, simply host the two PHP scripts on your server, configure you BlueVia Voice Number's callback URL to the URL for *BBC-RSS-Reader.php* and call your BlueVia Voice Number form any phone!


[Forward - Raspberry Pi Panic Button][Play Panic Button]


[BBC News Reader]: https:
[Play Panic Button]: /alpha/play/panicbutton