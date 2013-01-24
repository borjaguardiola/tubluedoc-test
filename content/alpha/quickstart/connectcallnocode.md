# Inbound Calls Quick Start Guide

## Connect a Call Without Any Code

This is the simplest demo possible, as it requires no development experience at all. In this demo you will connect two phones on a call - phone A and phone B. Phone A will be used to dial your BlueVia Voice Number and phone B will be added to the call, such that phone A and phone B can speak to each other.

You will need access to host a file on a web server accessible from the open internet. For this demo we have chosen to use [Amazon Web Services S3][Amazon S3] simply because it's easy! Other cloud based storage facilities are available :-). The static file has to be able to be served as JSON or XML though, which is why you **won't be able to host this** on services such as *Google Drive* or *DropBox* (unless you already have a Public folder in your Dropbox account. Note Public folders have been disabled for new accounts). The Public folders in, newer Dropbox accounts - since October 4th 2012, do not let you serve static XML and JSON files directly to the BlueVia Voice API. Instead they provide a link to a Dropbox hosted web page such that you can then download a static file. This is not usable by the BlueVia Voice API

If you wish to use Amazon Web Services, you will need to create an AWS account, if you do not have one. Once this is done head to your [Amazon AWS Console] [AWS Console].

* Select S3 from the list of services
* Create a bucket in the AWS S3 Console and open the bucket
* Then edit, where highlighted, the JSON below and add to a file with a ".JSON" extension e.g. *connect-call.json*. 
* upload this JSON file to your Amazon S3 bucket by selecting the 'Upload' button in the AWS console (once you have opened the bucket you have created).
* Once the JSON file is uploaded, right click on the file, in the AWS console, and select the 'Make Public' option.
* Select 'Yes' when asked if you are sure!
* Once the file has successfully been made public, right click on the file again and select the 'Properties' option - this will then show you the link to the JSON file.
* This file will now be accessible on the open web, and therefore by the BlueVia Voice APIs

So the JSON file that you need to create, i.e. the content of *connect-call.json*, that is uploaded into your AWS S3 bucket, is as follows:

	{
	    "commands": [
	        {
		  "dial": {
	                "number": {
	                    "callerId": "tel:+442012345678",
	                    "destination": "tel:+44712345678"
	                }
	            }
	        }
	    ]
	}


**NOTE:** 

* The callerId telephone number MUST be one of the BlueVia Voice Numbers. You can find a number to use by accessing your [BlueVia Dashboard][BlueVia Dashboard].
* The Number format is always in international dialing format *tel:+country code - BlueVia Voice Number*. 
* Remember to include the *tel:+* prefix
* The destination number is the number you wish to connect to, i.e. Phone B - the number that you will add to the call. Remembering phone A is used to call your BlueVia Voice Number.
* The Destination number has the same international format as the callerId attribute i.e. *tel:+country code - Phone number you wish to add to the call*


Once you have the web accessible link of the file *connect-call.json*, you then have to update you BlueVia Voice numbers configuration such that the callback URL refers to the URL to the JSON file in your AWS S3 bucket. 

Go to the [BlueVia Dashboard][BlueVia Dashboard] to and select the BlueVia Voice Number you wish to update. Copy and paste the URL to *connect-call.json*  into the callback URL for the number and save the updated configuration.

The call the BlueVia Voice Number. Your B Phone should start ringing.

Simple! 

The [Dial command documentation][Command Reference Dial Number] provides further detail about using this command. 

OK, in itself not an awe inspiring example of what you can do with the BlueVia Voice API, however this is simply intended to show you the basics, and show you how to configure your numbers to make them start singing ;-)

Lets try [creating conference calls][Quick Start Guide Create Conf No Code]   



[Forward - Create a Conference Call With No Code - Inbound] [Quick Start Guide Create Conf No Code] / [Quick Start Guide]

[Amazon S3]: http://aws.amazon.com
[AWS Console]: https://console.aws.amazon.com/console/home
[BlueVia Dashboard]: https://www.bluevia.com
[Command Reference Dial Number]: /alpha/commandref/dial#number
[Quick Start Guide Create Conf No Code]: /alpha/quickstart/createconfnocode
[Quick Start Guide]: /alpha/quickstart/introduction