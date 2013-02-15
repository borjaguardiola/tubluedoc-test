# Speak


The speak command provides text to speech functionality. This provides a means to provide speech for content that you cannot pre-record. also it provides a very simple way for you to define small pieces of what ultimately could become complex IVR solutions. There is no need to pre-record any audio content for your service, unless you really want to.

Within the speak command, the following supporting elements can be provided:
text - the text to be spoken
voice - male or female, default is female
repeat - integer value, default of 1, which specifies the number of times the text is spoken

## JSON Examples


The following examples demonstrate how you can use the speak command

~~~
	{
	    "commands": [
	        {
			"speak": {
				"text": "Hello, how are you?",
				"voice": "female",
				"repeat": 2
			 }
		}
	    ]
	}
~~~

When this command is executed a female voice will speak the test “Hello, how are you?” twice 

## XML Examples

The same speak JSON commands can be described in XML as follows 

~~~
	<tns:modifyCall xsi:schemaLocation="http://api.bluevia.com/schemas/comms/v1 api.bluevia.com_comms_v1_0.xsd " xmlns:tns="http://api.bluevia.com/schemas/comms/v1" xmlns:tns1="http://api.bluevia.com/schemas/common/v2" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
	   <tns:commands>
	      <tns:speak>
	         <tns:text>Hello, how are you?</tns:text>
	         <tns:voice>female</tns:voice>
	         <tns:repeat>2</tns:repeat>         
	      </tns:speak>
	   </tns:commands>
	</tns:modifyCall>
~~~
	

@todo complete XML samples and validate