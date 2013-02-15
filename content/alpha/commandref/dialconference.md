# Dial conferenceName

The dial *conferenceName* command can be used for starting a named conference call. Any name can be used for a conference. The name of a conference must be unique across all conference calls that you are currently running.

There are default conference properties, however all of these can be overridden should you choose to. Conference properties can be specified within a *conferenceProperites* element. Within the *conferenceProperties* element, the following can be specified:

@todo: veryify all of these are possible

* *mute* - true/false, default false, if set to true the caller can only listen to others on the conference  
* *beepsOnEnter* - "0", "1", "2", default "0". Allows one or two beeps to be played when someone enters the conference
* *speakOnEnter* - allows a [speak command] [URL_To_Speak_Command] command to be specified, with the text spoken when a caller enters the conference @todo: possible? If not why not (if a play command can be supported)
* *playOnEnter* - allows a [play command] [URL_To_Play_Command] to be specified, with the URL requested, i.e. audio played, when a caller enters the conference.
* *beepsOnExit* - "0", "1", "2", default "0". Allows the one or two beeps to be played when someone exits the conference
* *speakOnExit* - allows a [speak command] [URL_To_Speak_Command] command to be specified, with the text spoken when the caller exits the conference. @todo: possible? If not why not (if a play command can be supported)
* *playOnExit* - allows a [play command] [URL_To_Play_Command] command to be specified, with the URL requested, i.e. audio played, when a caller exits the conference.
* *startOnEnter* - true/false, default true. The conference starts immediately when this value is set to true. If set to false background music is played to all participants until a caller enters the conference with this value set to true.
* *endOnExit* - true/false, default false. If any member of the conference enters with this set to true, once they leave all other members of the conference are kicked out, and the conference ends.
* *maxMembers* - integer value, default 41. Allows for the maximum number of participants in a conference to be specified. The maximum allowed is 41.
* *timeLimit* - integer value, default 0. Time in seconds for the maximum time allowed for the conference. If set to 0 there is no maximum.

@todo in the initial spec there were playOnWait and speakOnWait commands. These are not in the API spec. Is it possible to specify the hold music for a call? Could this be done via the playOnEnter command? Don't think so.


## JSON Examples

The following examples demonstrate how you can use the dial conferenceName command

* Starting a conference with default conference properties, i.e. specifying no overridden values using the conferenceProperties element:

~~~
	{
	"commands": [
		{
	  	"dial": {
				"conferenceName": "myConference"
			}
		}
	    ]
	}
~~~

This will place the caller in the named conference call *myConference*. If the caller is the first person in the conference call they will hear music until a second person enters the conference
If subsequent callers are added to *myConference* then all callers are added to the call and can participate when added.
In this case all defaults are used for the conference properties as there has been no *conferenceProperties* element included


* Starting a moderated conference call

~~~
{
"commands": [
	{
  	"dial": {
			"conferenceName": "myConference",
			"conferenceProperties": {
				"startOnEnter":false
			    }
	    }
	}
    ]
}
~~~

In this case the caller joining the conference will not be able to hear any other participants until the moderator joins the conference. When the moderator joins the conference the startOnEnter element must be set to true.


@todo add further examples - want to be able to specify the hold music of the conference. How? Possible?


## XML Examples


The same dial conferenceName JSON commands can be described in XML as follows 

@todo complete XML samples and validate

* Starting a conference with default conference properties

~~~
	<?xml version="1.0" encoding="UTF-8"?>
	<tns:modifyCall xmlns:tns="http://api.bluevia.com/schemas/comms/v1" xmlns:tns1="http://api.bluevia.com/schemas/common/v2" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://api.bluevia.com/schemas/comms/v1 api.bluevia.com_comms_v1_0.xsd ">
	  <tns:commands>
	    <tns:dial>
	    	<tns:conferenceName>myConference</tns:conferenceName>
	    </tns:dial>
	  </tns:commands>
	</tns:modifyCall>
~~~


* Starting a moderated conference call

~~~
	<?xml version="1.0" encoding="UTF-8"?>
	<tns:modifyCall xmlns:tns="http://api.bluevia.com/schemas/comms/v1" xmlns:tns1="http://api.bluevia.com/schemas/common/v2" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://api.bluevia.com/schemas/comms/v1 api.bluevia.com_comms_v1_0.xsd ">
	  <tns:commands>
	    <tns:dial>
	    	<tns:conferenceName>myConference</tns:conferenceName>
	    	<tns:conferenceProperties>
	    		<tns:startOnEnter>false</tns:startOnEnter>
	    	</tns:conferenceProperties>
	    </tns:dial>
	  </tns:commands>
	</tns:modifyCall>
~~~

<%= render '/links'%>