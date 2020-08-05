#!/usr/bin/env php
<?php

// Code from Márk Sági-Kazár (@sagikazarmark on GitHub) in:
// https://github.com/guzzle/guzzle/issues/2134#issuecomment-425488097

require_once __DIR__.'/vendor/autoload.php';

$curl_opt_array = [
    // CURLOPT_SSLVERSION => CURL_SSLVERSION_TLSv1_2
];

$client = new GuzzleHttp\Client;

if ($argc != 2 || empty($argv[1])) {
  print "You must pass an HTTPS URL to test as the only argument.\n";
  exit(1);
}
$url = $argv[1];
if (!preg_match('#https://.+#', $url)) {
  print "URLs must begin with https://\n";
  exit(2);
}

$response = $client->request(
  'GET',
  $url,
  [
    'curl' => $curl_opt_array,
    'debug' => true,
    'allow_redirects' => false,
  ]
);

exit;
