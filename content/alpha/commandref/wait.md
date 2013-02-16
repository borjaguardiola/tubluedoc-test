# Wait

The wait command waits silently for the specified number of seconds. You can use this to add a wait state in between commands

Within the number element, the following supporting elements can be provided:

* *length* - integer value, default 0. Specify the time in seconds to wait


## JSON Examples

The following examples demonstrate how you can use the redirect command

* *wait*:

		{
			"commands": [
				{
					"speak": {
						"text": "Let’s wait for 5 seconds",
						"voice": "Female"
					}
				},
				{
					"wait": {
						"length": 5
					}
				},
				{
					"speak": {
						"text": "I hope you enjoyed waiting",
						"voice": "Female"
					}
				}
			]
		}

@todo test!

## XML Examples

The same wait JSON commands can be described in XML as follows 

@todo complete XML samples and validate

<%= render '/links'%>