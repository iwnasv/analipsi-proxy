# analipsi-proxy
 A reverse proxy for my private locally hosted services with web authentication. It also looks cool and personal.

A public facing webpage greets visitors (mostly malicious bots). Authentication is initiated by a GET request on the index page.
A secret correct GET request sets a cookie on the client, which the HTTP server expects. The GET request test and cookie setting are done in PHP.
A request with the secret cookie in its header is safely reverse proxied to the endpoint, another HTTP server in a super secret physical location.
In return, the endpoint HTTP server is authenticating the connection in two steps; IP based authentication, and another secret cookie.
Oh the reverse proxy also returns HTTP 418 "I'm a teapot" to clients filtered by GeoIP and only allows connections from Greece to be served.
I like this because my logs are cleaner, I filter 418 out and there are suddenly no scripted attacks from China.
Hypothetical vulnerable points would be: guessing the GET request function and the secret word, or the reverse proxy's cookie (high entropy),
or managing to spot and then trick the end server that the request comes from the proxy and somehow figuring the second secret cookie that is hard coded in both machines.
So it's probably easiest to guess the GET request, but it's obscured from the general public, if not a real security measure, and it's not that easy to guess. I'm considering adding a blacklist function like fail2ban.

If you're wondering what the secret server is doing, it's running a self destruction countdown that is postponed with a cron job on my laptop among other things.