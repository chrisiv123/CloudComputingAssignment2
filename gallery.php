<?php
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
		die("Error: " . $e->getMessage());
	}
       $results = $s3->getPaginator('ListObjects', [
        'Bucket' => $bucketName
    ]);
?> 





<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="styles.css">
</head>
<body>

<div id="Sidebar" class="sidebar">
    <a href="index.php">Home</a>
  <a href="gallery.php">Gallery</a>
  <a href="Biscuits.php">Biscuits</a>
  <a href="Salad.php">Salad</a>
  <a href="SendUsPics.php">Send us pictures</a>
</div>
<h2>Gallery</h2>

<table border="2" aligh="center" >
<?php 
        foreach ($results as $result):
        foreach ($result['Contents'] as $object):
            $hello_url = $s3->getObjectUrl($bucketName,$object['Key']);
?>
 <tr>   
<td><img alt="<?php echo $hello_url; ?>" src="<?php echo $hello_url; ?>"
         width=200" height="200"> </td>
    
    <td> <a href="<?php echo $hello_url; ?>" download>View/download File </a> </td>
    
    <?php endforeach; ?>
    <?php endforeach; ?>
  </tr>  
    
</body>
</html> 
    
    
    
    