# Providing Call Control Commands To BlueVia

There are two format that you can specify call control commands to BlueVia - JSON or XML

##JSON

JSON commands are provided to BlueVia within a commands array. This is necessary as the order of commands is important to BlueVia. Consequently it is not possible to simply directly translate a set of XML Commands into a set of JSON commands. This is as order is not guaranteed in this translation.

An example of JSON commands provided to BlueVia, within a commands array follows:

	{
		"commands": [
			{
				"getDigits": {
					"timeout": 5,
					"numberOfDigits": 1,
					"retries": 2,
					"actionUrl": "http://a.domain.com/handlegetDigitsrequest",
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
			}
		]
	}
 
## XML


XML  responses require you to provide the correct namespacing such that you canvalidate your XML against the <a href="http://api.bluevia.com/schemas/comms/v1 api.bluevia.com_comms_v1_0.xsd">BlueVia Voice API XSD</a>. The same JSON example above can be seen in XML below. 

	<?xml version="1.0" encoding="UTF-8"?>
	<tns:modifyCall xmlns:tns="http://api.bluevia.com/schemas/comms/v1" xmlns:tns1="http://api.bluevia.com/schemas/common/v2" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://api.bluevia.com/schemas/comms/v1 api.bluevia.com_comms_v1_0.xsd ">
	  <tns:commands>
	    <tns:getDigits>
	    	<tns:timeout>5</tns:timeout>
	    	<tns:numberOfDigits>1</tns:numberOfDigits>
	    	<tns:retries>2</tns:retries>
	    	<tns:actionUrl>http://a.domain.com/handlegetDigitsrequest</tns:actionUrl>
	    	<tns:speak>
	    		<tns:text>Press 1 to create a new conference call. Press 2 to join an existing conference call</tns:text>
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

**NOTE**: As you can see from the above examples, you can specify more than a single command at once to BlueVia. Refer to [BlueVia Voice Command Chains][URL_To_BlueVia_Voice_Command_Chains] for further detail

<%= render '/links'%>