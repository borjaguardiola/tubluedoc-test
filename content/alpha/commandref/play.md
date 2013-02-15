# Play

The play command is interchangeable with the [speak command] [URL_To_Speak_Command]. The play command is for streaming audio files, so can be used in the situation where you have fixed dialogue (or even music) that you wish to play to the caller of your application. The speak command is typically used when you have dynamic content that you wish to present to your customer, whereas play is used for pre-recorded functionality, typically. However where-ever you see support for the speak command, as an example within the [getDigits command] [URL_To_GetDigits_Command], you can substitute a play command

This command will play an audio file, from a remote URL to a caller. It is possible to play the file on all legs, or selected legs of a call. @todo figure out how to do this and show an example of it. THis needs to work

NOTE: For the alpha launch of the BLueVia Voice API’s only MP3 and WAV audio formats are supported.

Within the play command, the following supporting elements can be provided
url - the URL to the audio file to stream
repeat - integer value, default of 1, which specifies the number of times the audio file is played

## JSON Examples

The following examples demonstrate how you can use the play command

~~~
  {
      "commands": [
          {
             "play": {
  	    	  "url": "http://developer.app.com/test.mp3",
                  "repeat": "2"
              }
          }
      ]
  }
~~~


This will stream the audio file referenced by  http://developer.app.com/test.mp3 twice.


## XML Examples

The same play JSON commands can be described in XML as follows 

~~~
  <tns:modifyCall xsi:schemaLocation="http://api.bluevia.com/schemas/comms/v1 api.bluevia.com_comms_v1_0.xsd " xmlns:tns="http://api.bluevia.com/schemas/comms/v1" xmlns:tns1="http://api.bluevia.com/schemas/common/v2" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
     <tns:commands>
        <tns:play>
        	<tns:url>http://developer.app.com/test.mp3</tns:url>
        	<tns:repeat>2</tns:repeat>
        </tns:play>
     </tns:commands>
  </tns:modifyCall>
~~~


@todo complete XML samples and validate

<%= render '/links'%>