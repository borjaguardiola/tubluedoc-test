# Call Statuses

The Status of a call is dependant on the state of the call legs contained within the call. The following call statuses are available:

* *connecting* - the call is being created. At this stage no calls legs have been connected 
* *established* - the call is ongoing. In this state at least one leg is connected to the call
* *terminated* - the call is terminated. A call that had been established is now finished
