<?php

use Aws\S3\S3Client;

define('AWS_KEY', 'place access key here');
define('AWS_SECRET_KEY', 'place secret key here');
$ENDPOINT = 'http://objects.dreamhost.com';

// require the amazon sdk from your composer vendor dir
require __DIR__.'/vendor/autoload.php';

// Instantiate the S3 class and point it at the desired host
$client = new S3Client([
    'region' => '',
    'version' => '2006-03-01',
    'endpoint' => $ENDPOINT,
    'credentials' => [
        'key' => AWS_KEY,
        'secret' => AWS_SECRET_KEY
    ],
    // Set the S3 class to use objects.dreamhost.com/bucket
    // instead of bucket.objects.dreamhost.com
    'use_path_style_endpoint' => true
]);

?>