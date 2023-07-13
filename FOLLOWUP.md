# Follow-up Questions
## How long did you spend on the coding test?
Planning how I would do it: 1 hour. <br />
Searching and installing dev required packages: 1 hour. <br />
Coding Backend (creating migration files, controllers and testing with Postman): 2 hours. <br />
Coding Frontend in Vue 3 and styling: 3 hours. <br />

## Which parts were the most challenging?
Deciding which tech stack to use when planning and styling without the help of a designer.

## What would you add to your solution if you had time? What further improvements or features would you add?
- Input validations for security reasons.
- Better styling.
- Automatic update of the Todo List upon the completion of the subitems.
- Tests: unit test and integration tests.

## How would you track down a performance issue in production? 
Check the logs of application and database server.
Check if any process is hanging on the server because that can be an indication where the failure is.
Increase the debug level to be more verbose at least in one server.
Add security event logs.

## Have you ever had to do this?
Yes, I have been doing a "daily checks" routine to look for any Bugsnap error reports, check AWS dashboard to analyze if the volume of transactions are down or too high, check BigQuery dashboard looking for any disruption.
If any errors are identified, depending on its criticality, I open a Jira ticket to fix it immediately or to plan for future sprint.