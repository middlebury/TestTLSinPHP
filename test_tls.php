<?php

// Code from Márk Sági-Kazár (@sagikazarmark on GitHub) in:
// https://github.com/guzzle/guzzle/issues/2134#issuecomment-425488097

require_once __DIR__.'/vendor/autoload.php';

$curl_opt_array = [
    CURLOPT_SSLVERSION => CURL_SSLVERSION_TLSv1_2
];

$client = new GuzzleHttp\Client;

$response = $client->request(
    'GET',
    'https://www.howsmyssl.com/a/check',
    [
        'curl' => $curl_opt_array,
	'debug' => true,
    ]
);

die(json_decode($response->getBody())->tls_version);
