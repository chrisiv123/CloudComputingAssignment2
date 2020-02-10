<?php
	// This file demonstrates file upload to an S3 bucket. This is for using file upload via a
	// file compared to just having the link. If you are doing it via link, refer to this:
	// https://gist.github.com/keithweaver/08c1ab13b0cc47d0b8528f4bc318b49a
	//
	// You must setup your bucket to have the proper permissions. To learn how to do this
	// refer to:
	// https://github.com/keithweaver/python-aws-s3
	// https://www.youtube.com/watch?v=v33Kl-Kx30o
	
	// I will be using composer to install the needed AWS packages.
	// The PHP SDK:
	// https://github.com/aws/aws-sdk-php
	// https://packagist.org/packages/aws/aws-sdk-php 
	//
	// Run:$ composer require aws/aws-sdk-php
	require 'vendor/autoload.php';
	
	use Aws\S3\S3Client;
	use Aws\S3\Exception\S3Exception;

	// AWS Info
	$bucketName = 'for-cloud-assignment2-test1';
$bucketName2 = 'for-cloud-assignment2-test1/folder1';
	$IAM_KEY = 'AKIAVZPCA3FK34CP4RVX';
	$IAM_SECRET = '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';

	// Connect to AWS
	try {
		// You may need to change the region. It will say in the URL when the bucket is open
		// and on creation.
		$s3 = S3Client::factory(
			array(
				'credentials' => array(
					'key' => $IAM_KEY,
					'secret' => $IAM_SECRET
				),
				'version' => 'latest',
				'region'  => 'us-east-2'
			)
		);
	} catch (Exception $e) {
		// We use a die, so if this fails. It stops here. Typically this is a REST call so this would
		// return a json object.
		die("Error: " . $e->getMessage());
	}

       $results = $s3->getPaginator('ListObjects', [
        'Bucket' => $bucketName
    ]);

  //  foreach ($results as $result) {
  //      foreach ($result['Contents'] as $object) {
           // echo $object['Key'] . PHP_EOL;
           // echo $object['Key'] . "\t" . $object['Size'] . "\t" . $object['LastModified'] . "\n";
           // echo "new line"."\n";
           // $hello_url = $s3->getObjectUrl($bucketName, 'testimg1.PNG');
?> 
<table border="2" aligh="center">
    <?php 
        foreach ($results as $result):
        foreach ($result['Contents'] as $object):
           // echo $object['Key'] . PHP_EOL;
           // echo $object['Key'] . "\t" . $object['Size'] . "\t" . $object['LastModified'] . "\n";
           // echo "new line"."\n";
            $hello_url = $s3->getObjectUrl($bucketName, $object['Key']);

        
    
    ?>
    
<td><img alt="<?php echo $hello_url; ?>" src="<?php echo $hello_url; ?>"
         width=150" height="70"> </td>
    
    <?php endforeach; ?>
    <?php endforeach; ?>
</table> open immage <a href="<?php echo $hello_url; ?>">here</a> display here..<?php

 //       }
 //   }
?>
      
         
      
