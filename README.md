This repository includes some PHP test scripts for testing TLS 1.2 support.

While testing could be done directly via CURL, there is always the possibility
that the libraries PHP is built with are using a different version that those in
the shell.

As a reference, OpenSSL added TLS 1.2 support in 1.0.1. ([details](https://stackoverflow.com/a/50863133/15872)).

Installation
===============
1. Git clone this repository
2. `cd test_tls`
3. `composer install`

Usage
======

Testing TLS support in the PHP/CURL/OpenSSL stack
-------------------------------------------------
Run the `test_tls.php` script to force GuzzleHttp to communicate with
www.howsmyssl.com using TLS v1.2 and examine the JSON response from that service
to identify the protocol used.

```
./test_tls.php
```

Testing TLS support connecting to services
------------------------------------------
Use the `test_url_with_TLSv1_2.php` script to attempt to force GuzzleHttp to
communicate with an arbitrary host using TLS v1.2. Look at the `SSL connection using ...`
line to determine the protocol and ciphers used. Example:

```
./test_url_with_TLSv1_2.php https://www.middlebury.edu/
```

There is also a `test_url_with_curl_defaults.php` script that does the same requests
without setting the `CURLOPT_SSLVERSION => CURL_SSLVERSION_TLSv1_2` to use the
default connection negotiation. Example:

```
./test_url_with_curl_defaults.php https://www.middlebury.edu/
```
