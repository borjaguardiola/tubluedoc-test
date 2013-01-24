# BlueVia Voice RESTful API

The [BlueVia Voice RESTful API] [API Reference] provides two simple methods to manage calls made from your BlueVia Voice Numbers. The API allows you to:

1. Create a call and
2. Modify an existing call

## Create a call
A call comprises one to many call legs, where a call leg is a connection between your BlueVia Voice Number and your Customer. Creating a call creates the first call leg and allows you to engage with the connected customer. 



**TODO Would be good to have a diagram explaining the call legs etc?**



## Modify an existing call
Modifying an existing call allows you to send commands to a call or to specific legs within a call. When you modify a call you do so by specifying a URL to the [BlueVia Voice Call Control Commands] [Overview Call Control] or alternatively by providing the call control commands within the modify call RESTful API request. Modifying a call allows you to add further call participants, specify specific call legs to record, request DTMF input from a Customer on a call etc... Further details of how you can manage your calls can be seen in the [BlueVia RESTful API Reference][API Reference]</a> documentation.

[Forward - Call Control Commands][Overview Call Control]  /  [Back - The BlueVia Voice API][index]  

[index]: index
[Overview Call Control]: /alpha/overview/callcontrol