We got introduced to Delos, who over unique immersive experiences in their historical
theme parks, brought to live by their android hosts.

We learned about their unique challenge of managing the support crews, while maintaining
maximum immersion for their guests. Naturally, in such a dynamic, fast-evolving
environments, incidents are inevitable. Wile progress on the underground maintenance
tunnel network is pending, we are tasked with developing a web-based management
application for coordinating the cleanup crews out in the field.

The high-level goals of this platform are as follows:

-   Crews must be able to view pending incidents.
-   Crews must be able to claim an incident for themselves, to prevent double dispatch of
    cleanup crews.
-   Crews must be able to update the status of their claimed jobs, until eventually marking
    them as complete.
-   Upon job completion, crews need to submit a report, detailing any information of note
    regarding the incident and its resolution.

Upon consideration, we have decided to implement the web-platform, using PHP/Laravel for
application logic, and MariaDB as a database server, and Apache is a web server.
