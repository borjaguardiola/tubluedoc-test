# Dial Number


The dial number command allows you to add another call leg by means of specifying the number you wish to dial in order to add to a call.

You can specify multiple number commands within the dial command. When one of the numbers is connected the rest are hung up. 

**NOTE**: If one of the numbers dialed is a mobile that is diverted to voicemail this will result in a call connection. This will mean that other numbers dialed may not ring at all. It is not possible for BlueVia to determine a call connection is a voice mail connection or not.

Within the number command, the following supporting elements can be provided:

* *destination* - the phone number to be called. 
* *callerId* - this has to be one of your BlueVia Voice Numbers. By default when someone calls one of your numbers, the CLI displayed to the called party will be the inbound number, i.e. the calling party. You can override this, by specifying a number that you have purchased. This provides a mechanism to support anonymous calling between two parties. **NOTE**: Although not supported for the alpha, BlueVia will be providing support to allow you to verify your own numbers to be able to use as the callerId. This will allow you to, for example, specify a company PABX number that can be used as the callerId, allowing return calls to be handled by your own number as opposed to a BlueVia Voice Number. 
* *behaviorOnAnswer* - you can also specify commands that will be executed when the call is answered by the destination phone by specifying a [play] [URL_To_Play_Command] or [speak] [URL_To_Speak_Command] command
* *sendDigits* - when the call is connected these digits DTMF tones will be played. This allows for support for the dialing of extensions or other DTMF input to be supported programmatically @todo verify that this is available - think not

**NOTE**: The Number format for the destination and callerId elements is always in international dialing format *"tel:+<country code><phone number>"*. Remember to include the *"tel:+"* as the prefix

The following examples describe the element:

## JSON Examples


The following examples demonstrate how you can use the dial number command

* Using the callerId

~~~
    {
        "commands": [
            {
          "dial": {
                    "number": {
                        "callerId": "tel:+442012345678",
                        "destination": "tel:+4471234567"
                    }
                }
            }
        ]
    }
~~~

This will result in the destination number of +441234567 ringing.
If the destination handset supports the display of the caller ID, in this case the number the callerId of +442012345678 is displayed on the destination terminal.

* Using the behaviourOnAnswer element

    @todo validate that this is correct and test

~~~
    {
        "commands": [
            {
                "dial": {
                    "number": {
                        "callerId": "tel:+442012345678",
                        "destination": "tel:+4471234567"
                    },
                    "behaviorOnAnswer": {
                        "speak": {
                            "text": "Have a nice day.",
                            "voice": "Female"
                        }
                    }
                }
            }
        ]
    }
~~~


This will result in the destination number of +441234567 ringing.
If the destination handset supports the display of the caller ID, in this case the number the callerId of +442012345678 is displayed on the destination terminal.
Additionally, in this case, when the destination answers the call the [speak command] [URL_To_Speak_Command] will be executed.


* Calling multiple destinations

~~~
    @todo validate that this is correct and test

    {
        "commands": [
            {
                "dial": {
                    "number": {
                        "callerId": "tel:+442012345678",
                        "destination": [
                            "tel:+4471234567",
                            "tel:+4472345678",
                            "tel:+4473456789"
                        ]
                    }
                }
            }
        ]
    }
~~~

This will result in the destination number of +441234567, +442345678 and +443456789 ringing.
If the destination handset supports the display of the caller ID, in this case the number the callerId of +442012345678 is displayed on the destination terminal.
In the case of one of the destinations answering the others will stop ringing


## XML Examples


The same dial number JSON commands can be described in XML as follows 

@todo update correctly and test these!

* Using the callerId

~~~
    <?xml version="1.0" encoding="UTF-8"?>
    <tns:modifyCall xmlns:tns="http://api.bluevia.com/schemas/comms/v1" xmlns:tns1="http://api.bluevia.com/schemas/common/v2" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://api.bluevia.com/schemas/comms/v1 api.bluevia.com_comms_v1_0.xsd ">
      <tns:commands>
        <tns:dial>
            <tns:number>
                <tns:destination>tel:+4471234567</tns:destination> 
                <tns:callerId>tel:+442012345678</tns:callerId>          
            </tns:number>
        </tns:dial>
      </tns:commands>
    </tns:modifyCall>
~~~

* Using behaviorOnAnswer element

~~~
    <?xml version="1.0" encoding="UTF-8"?>
    <tns:modifyCall xmlns:tns="http://api.bluevia.com/schemas/comms/v1" xmlns:tns1="http://api.bluevia.com/schemas/common/v2" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://api.bluevia.com/schemas/comms/v1 api.bluevia.com_comms_v1_0.xsd ">
      <tns:commands>
        <tns:dial>
            <tns:number>
                <tns:destination>tel:+4471234567</tns:destination> 
    <tns:callerId>tel:+442012345678</tns:callerId>  
                <tns:behaviorOnAnswer>
                    <tns:speak>
                        <tns:text>Hope you have a nice day </tns:text>
                        <tns:voice>Female</tns:voice>
                    </tns:speak>
                </tns:behaviorOnAnswer>             
            </tns:number>
        </tns:dial>
      </tns:commands>
    </tns:modifyCall>
~~~

* Calling multiple destinations

~~~
    <?xml version="1.0" encoding="UTF-8"?>
    <tns:modifyCall xmlns:tns="http://api.bluevia.com/schemas/comms/v1" xmlns:tns1="http://api.bluevia.com/schemas/common/v2" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://api.bluevia.com/schemas/comms/v1 api.bluevia.com_comms_v1_0.xsd ">
      <tns:commands>
        <tns:dial>
            <tns:number>
                <tns:destination>tel:+4471234567</tns:destination> 
                <tns:destination>tel:+4472345678</tns:destination> 
                <tns:destination>tel:+4473456789</tns:destination>      
                <tns:callerId>tel:+442012345678</tns:callerId>
            </tns:number>
        </tns:dial>
      </tns:commands>
    </tns:modifyCall>
~~~

<%= render '/links'%>