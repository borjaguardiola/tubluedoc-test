# Dial callId

Every call created by the BlueVia Voice API has its own callId. For further detail about the callId attribute of the calls resource see the [calls resource REST API documentation] [URL_To_REST_API_Calls_Resource]. The callId value can be used to add further participants to a call.

## JSON Examples

The following examples demonstrate how you can use the dial callId command

~~~
{
    "commands": [
        {
	  "dial": {
                "callId": "1enI29fLneTY29rbytqTyd7b_fc75f106-d439-4ae7-b77a-0e1ea1ae3c65" 
            }
        }
    ]
}
~~~

When the command is executed the caller will be added to the call with the call ID 1enI29fLneTY29rbytqTyd7b_fc75f106-d439-4ae7-b77a-0e1ea1ae3c65

## XML Examples

The same dial callId JSON commands can be described in XML as follows 

~~~
<tns:modifyCall xsi:schemaLocation="http://api.bluevia.com/schemas/comms/v1 api.bluevia.com_comms_v1_0.xsd " xmlns:tns="http://api.bluevia.com/schemas/comms/v1" xmlns:tns1="http://api.bluevia.com/schemas/common/v2" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
   <tns:commands>
      <tns:dial>
         <tns:callId>1enI29fLneTY29rbytqTyd7b_fc75f106-d439-4ae7-b77a-0e1ea1ae3c65</tns:callId>
      </tns:dial>
   </tns:commands>
</tns:modifyCall>
~~~
	
@todo complete XML samples and validate

<%= render '/links'%>