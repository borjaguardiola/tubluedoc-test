# GetDigits

The *getDigits* command allows for the collection of DTMF feedback from the callers handset.

Within the *getDigits* command, the following supporting elements can be provided:

* *actionUrl* - the URL that the [DigitsCollected notification event] [URL_To_BlueVia_Voice_Call_Event_Notification_Reference] is sent to.
* *timeout* - positive integer value, default 5 seconds. If the caller doesn't respond within this time period, a retry is attempted (if specified), or the command completes and you can fall through to a failure (no caller response) case.
* *finishOnKey* - any digit, * or #, default #. The key, that if used by the caller will complete the dialpad input from the caller.
* *numberOfDigits* - integer value, default of 0. This represents the number of digits to be collected, if set to 0 then there is no limit and the caller must complete DTMF entry via the finishOnKey value. If the caller enters this amount of digits on the dialpad, then the input is completed.
* *retries* - integer value >= 1, default of 1. If the caller doesn't enter any DTMF input, or they stop entering input before completing the getDigits command then the speak/play command defined within getDigits will be re-executed, and restart the collection of DTMF input from the caller. Any DTMF input entered by the caller during the previous attempt is discarded,  
* *validDigits* - any digit, * or #, default 1234567890*#, which specifies the valid digits that can be used by the caller when providing dialpad input.
a speak or play command is embeded within the getDigits command. This allows you to let the caller know what to do in order to submit dialpad input.
following a getDigits command you can specify either a speak or play command that is only used in the event that the caller doesn't successfully get digits. E.g. if there was a timeout and all the retry attempts have been completed.

## JSON Examples

The following examples demonstrate how you can use the getDigits command

* Using *getDigits* to retrieve a single digit from a caller

        
        {
        	"commands": [
        		{
          		"getDigits": {
          			"timeout": 5,
          			"numberOfDigits": 1,
          			"retries": 2,
          			"actionUrl": "http://your.domain.com/yourActionHandler",
          			"speak": {
          				"text": "Press 1 to create a new conference. Press 2 to join an existing conference call.",
          				"voice": "Female"
          			}
          		}
        		},
        		{
        			"speak": {
        				"text": "Sorry, you didn't enter a selection in time. Please call and try again.",
        				"voice": "Female"
        			}
        		},
        		{		
        		            "hangup": {
        				     }
                	}
        	]
        }
        

    * If the caller doesn't enter any data within the 5 second timeout the speak command will be executed again
    * In this case the number of retries attempted will be 2. In the event the caller has not entered any data for second timeout period the second speak command will be executed. 
    * *NOTE*: If the caller enters valid input this second speak command will never be executed. The second speak command and the hangup command will only ever be executed if the getDigits command doesn't result in a HTTP POST request to the actionUrl
    * In the case of no input from the caller the call will be terminated via the [hangup command] [URL_To_Hangup_command]
    * In the event the caller enters a single digit, as specified by the numberOfDigits attribute, then a [DigitsCollected notification event] [URL_To_BlueVia_Voice_Call_Event_Notification_Reference] is sent, via a HTTP POST request to the specified actionUrl


* Using getDigits to retrieve an unspecified number of characters for a callers dialpad, allowing the caller to terminate their input by selecting the '#' key
 
		{
			"getDigits": {
				"finishOnKey": "#",
				"actionUrl": "http://your.domain.com/yourActionHandler",
				"speak": {
					"text": "Please enter some dialpad input. when you are finished press the hash key.",
					"voice": "Female"
				}
			}
		}

    * In this case the actionUrl will be called, with the dialpad keys the caller has pressed, only once the caller selects the ‘#' key. This data will be HTTP POSTed to the actionUrl in a [DigitsCollected notification event] [URL_To_BlueVia_Voice_Call_Event_Notification_Reference].
    * *NOTE*: the "digits" attribute of the [DigitsCollected notification event] [URL_To_BlueVia_Voice_Call_Event_Notification_Reference] will also contain the ‘#' key that was submitted by the caller on the dialpad. If your business logic doesn't require this finishOnKey remember to remove it prior to processing the caller's input  
    * *NOTE*: In the above case the possible supporting commands are omitted for brevity.


* Using getDigits to retrieve a filtered set of digits from a caller's dialpad.
 
		{
			"getDigits": {
				"numberOfDigits" : 4,
				"validDigits" : "1357",
				"actionUrl": "http://your.domain.com/yourActionHandler",
				"speak": {
					"text": "Please enter 4 prime numbers.",
					"voice": "Female"
				}
			}
		}


    * In this case the actionUrl will be called, with the dialpad keys the caller has pressed, only once the caller has entered 4 prime numbers, i.e. those numbers specified in the filter validDigits attribute - 1357. This data will be HTTP POSTed to the actionUrl in a [DigitsCollected notification event] [URL_To_BlueVia_Voice_Call_Event_Notification_Reference].
    * *NOTE*: In the above case the possible supporting commands are omitted for brevity.

## XML Examples

The same getDigits JSON commands can be described in XML as follows 

* Using getDigits to retrieve a single digit from a caller

        <tns:modifyCall xsi:schemaLocation="http://api.bluevia.com/schemas/comms/v1 api.bluevia.com_comms_v1_0.xsd " xmlns:tns="http://api.bluevia.com/schemas/comms/v1" xmlns:tns1="http://api.bluevia.com/schemas/common/v2" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
           <tns:commands>
              <tns:getDigits>
              	<tns:timeout>5</tns:timeout>
              	<tns:numberOfDigits>1</tns:numberOfDigits>
              	<tns:retries>2</tns:retries>
              	<tns:actionUrl>http://your.domain.com/yourActionHandler</tns:actionUrl>
              	<tns:speak>
              		<tns:text>Press 1 to create a new conference. Press 2 to join an existing conference call.</tns:text>
              		<tns:voice>Female</tns:voice>
              	</tns:speak>
              </tns:getDigits>
              <tns:speak>
              	<tns:text>Sorry, you didn't enter a selection in time. Please call and try again.</tns:text>
              	<tns:voice>Female</tns:voice>      	
              </tns:speak>
              <tns:hangup/>
           </tns:commands>
        </tns:modifyCall>


* Using getDigits to retrieve an unspecified number of characters for a callers dialpad, allowing the caller to terminate their input by selecting the '#' key

        <tns:modifyCall xsi:schemaLocation="http://api.bluevia.com/schemas/comms/v1 api.bluevia.com_comms_v1_0.xsd " xmlns:tns="http://api.bluevia.com/schemas/comms/v1" xmlns:tns1="http://api.bluevia.com/schemas/common/v2" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
           <tns:commands>
              <tns:getDigits>
              	<tns:finishOnKey>#</tns:finishOnKey>
              	<tns:actionUrl>http://your.domain.com/yourActionHandler</tns:actionUrl>
              	<tns:speak>
              		<tns:text>Please enter some dialpad input. when you are finished press the hash key.</tns:text>
              		<tns:voice>Female</tns:voice>
              	</tns:speak>
              </tns:getDigits>     
           </tns:commands>
        </tns:modifyCall>


* Using getDigits to retrieve a filtered set of digits from a caller's dialpad.

        <tns:modifyCall xsi:schemaLocation="http://api.bluevia.com/schemas/comms/v1 api.bluevia.com_comms_v1_0.xsd " xmlns:tns="http://api.bluevia.com/schemas/comms/v1" xmlns:tns1="http://api.bluevia.com/schemas/common/v2" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
           <tns:commands>
              <tns:getDigits>
              	<tns:numberOfDigits>4</tns:numberOfDigits>
              	<tns:validDigits>1357</tns:validDigits>
              	<tns:actionUrl>http://your.domain.com/yourActionHandler</tns:actionUrl>
              	<tns:speak>
              		<tns:text>Please enter 4 prime numbers.</tns:text>
              		<tns:voice>Female</tns:voice>
              	</tns:speak>
              </tns:getDigits>     
           </tns:commands>
        </tns:modifyCall>

@todo complete XML samples and validate

<%= render '/links'%>