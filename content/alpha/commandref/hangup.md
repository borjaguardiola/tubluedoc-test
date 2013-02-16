# Hangup

The hangup command can be used to terminate a call.

Within the hangup command, the following supporting element can be provided:

* *reason* - rejected/busy, default rejected. This value tells BlueVia what to play down the line to the caller. Busy responds with a standard busy time. Rejected will play a standard not in service response

## JSON Examples

The following examples demonstrate how you can use the hangup command

* *hangup* with a *reason*

        {"commands": [
                {
                    "hangup": {
                        "reason": "busy"
                    }
                }
            ]
        }


@todo test hangup cases and verify this works as it should

## XML Examples

The same hangup JSON commands can be described in XML as follows 

@todo complete XML samples and validate

<%= render '/links'%>