# Redirect

The *redirect* command allows you to specify a URL that will provide subsequent call control functionality. This is typically used within call control command chains. Upon completing a specific call control command you may wish to provide subsequent commands to be performed on the call. This provides a powerful tool to add additional commands to a call based on current call state

Within the redirect element there is only a single parameter:

* *actionUrl* - specifies the URL that you wish to retrieve the next set of commands from.

## JSON Examples

The following examples demonstrate how you can use the redirect command

* *redirect* with a *actionUrl*:

        {
            "commands": [
                {
                    "speak": {
                        "text": "Let's redirect this call",
                        "voice": "Female"
                    }
                },
                {
                    "redirect": {
                        "actionUrl":"<your domain>/<your commands>”
                    }
                }

            ]
        }

## XML Examples

The same redirect JSON commands can be described in XML as follows:

@todo complete XML samples and validate

<%= render '/links'%>