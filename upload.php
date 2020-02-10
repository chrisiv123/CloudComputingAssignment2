<?php
    // Uploading code for s3 from amazon
	require 'vendor/autoload.php';  
	use Aws\S3\S3Client;
	use Aws\S3\Exception\S3Exception;
	// AWS Info
	$bucketName = 'for-cloud-assignment2-test1';
	$IAM_KEY = 'AKIAVZPCA3FK34CP4RVX';
	$IAM_SECRET = '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';
	// Connect to AWS
	try {
		// on creation of S3 connection
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
		// Use of die function to return message
		die("Error: " . $e->getMessage());
	}
	//generate string for the key name
	$keyName = basename($_FILES["fileToUpload"]['name']);
	$pathInS3 = 'https://s3.us-east-2.amazonaws.com/' . $bucketName . '/' . $keyName;
	// Add it to object with name to S3
	try {
		// Uploading 
		$file = $_FILES["fileToUpload"]['tmp_name'];
        // use putObject function from AWS
		$s3->putObject(
			array(
				'Bucket'=>$bucketName,
				'Key' =>  $keyName,
				'SourceFile' => $file,
				)
		);
        // die with error messages
	} catch (S3Exception $e) {
		die('Error:' . $e->getMessage());
	} catch (Exception $e) {
		die('Error:' . $e->getMessage());
	}
// message for the user and redirection after 5 seconds
echo 'Image sent , please wait while we redirect you';
header('Refresh: 5; url=SendUsPics.php');
?>