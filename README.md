# analipsi-proxy
 A reverse proxy for my private locally hosted services with web authentication

A public facing webpage greets visitors (mostly malicious bots). Authentication is initiated by a GET request on the index page.
A secret correct GET request sets a cookie on the client, which the HTTP server expects. The GET request test and cookie setting are done in PHP.
A request with the secret cookie in its header is safely reverse proxied to the endpoint, another HTTP server in a super secret physical location.
In return, the endpoint HTTP server is authenticating the connection in two steps; IP based authentication, and the secret cookie.
So hypothetically the vulnerable point could be a DNS level attack but it would need the secret cookie as well.

If you're wondering what the secret server is doing, it's running a self destruction countdown that is postponed with a cron job on my laptop among other things.