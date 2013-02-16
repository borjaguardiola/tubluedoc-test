# Record
	
The record command allows you to record a call, or part of a call. The entire call can be recorded or selected call legs can also be recorded.

@todo figure out how to record a specific leg of a call and provide an example

Within the *record* command, the following supporting elements can be provided:

* *timeout* - positive integer, default of 15 seconds. If there is silence on the call for this time period then the recording is stopped. @todo verify this
* *playBeep* - true/false - play a beep before recording, default false	
* *finishOnKey* - any digit, * or #, there is no default. This must be specified if you use this element.
* *maximumLength* - integer value >= 1, number of seconds to record, default of 60
* *recordCall* - true/false record the entire call session, default false
* *recordAfterConnect* - true|false record the entire call after call has connected, default false
* a *speak* or *play* command can be added within the record command. This command is executed prior to the recording activity commencing. If recordCall, or recordAfterConnect are set to true then the speak  or play  command will be included within the recording. Otherwise the recording will commence after the speak or play  element has been completed 
* *export* - this element allows you to specify a location that BlueVia will make a HTTP PUT request to, in order to provide your recording to you. NOTE: for the alpha release of the BLueVia Voice API we don't offer hosting support for the recordings made via the API. See the [Known Alpha Limitations] [URL_To_Known_Limitations_Overview] for all BLueVia Voice API alpha limitations.
* As this element can refer to external services there are various integrations supported. To use the export function to:
	* @todo complete the detail of the export to AWS and PUT on own server. Validate the detail that is here.
	* POST or PUT the recording on your server specify:
		* *actionUrl* - the URL that will handle the HTTP PUT request
		* *fileName* - also in the PUT command?
	* PUT the recording in Amazon S3 buckets specify:
		* *aws-key* - your AWS Key 
		* *aws-secret* - your AWS secret 
		* *aws-bucket* - your AWS bucket name
		* *aws-host* - The host name or your AWS bucket e.g. s3.amazonaws.com
		* *filename* - The filename that you wish to save the recording as. If not specified a filename will be automatically allocated, by the TU Core platform

## JSON Examples

The following examples demonstrate how you can use the record command

* record the name of a conference participant and export to your server

		{
			"commands": [
				{
					"speak": {
						"text": "Please record your name, then press hash",
						"voice": "Female"
					}
				},
				{
					"record": {
						"finishOnKey": "#",
						"playBeep": "true",
						"export": {
							"url": "http://my.domain.com/myRecordingHandler"
						}
					}
				}
			]
		}

	* The caller will hear the speak command, followed by a beep, as specified by the playBeep attribute.
	* The caller will then be able to record their name and finish the recording by selecting the '#' key.
	* Once the caller has selected the '#' key the completed recording will be HTTP PUT by BlueVia to the your specified actionUrl 
	* **NOTE**: As highlighted in the [Known Alpha Limitations] [URL_To_Known_Limitations_Overview] discussion, there may be a time period from the completion of the recording made by BlueVia, to the time that it is finished being PUT by BlueVia on your actionUrl. This is network dependant and largely out of the control of BlueVia. This should not be a problem with smaller files, such as in this case with the recording of the callers name prior to entering a conference, however if you are recording an entire call, there may be a time delay, upon completing the recording, to when you can actually use the recording, for example, if you want to stream the resultant recording using a [play command] [URL_To_Play_Command] 


* recording an entire call and posting the recording to Amazon Web Services S3 Storage (AWS)

		@todo working AWS example

* recording a selected leg of a call and posting to AWS S3 Storage

		@todo working AWS example

## XML Examples

The same record JSON commands can be described in XML as follows 

	@todo complete XML samples and validate


<%= render '/links'%>