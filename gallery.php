<?php
    // requirements
	require 'vendor/autoload.php';
	use Aws\S3\S3Client;
	use Aws\S3\Exception\S3Exception;
	// AWS S3 Info, Name of bucket, key and secret for IAM user
	$bucketName = 'for-cloud-assignment2-test1';
    $IAM_KEY = 'AKIAVZPCA3FK34CP4RVX';
	$IAM_SECRET = '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';
	// Connect to AWS via try catch loop
    // catch will result in given error
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
    <!-- Begining of HTML portion -->
<!DOCTYPE html>
<html>
<head>
    <!-- Meta and stylesheet-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="styles.css">
</head>
<body>
    <!-- Side bar -->
<div id="Sidebar" class="sidebar">
    <a href="index.php">Home</a>
  <a href="gallery.php">Gallery</a>
  <a href="Biscuits.php">Biscuits</a>
  <a href="Salad.php">Salad</a>
  <a href="SendUsPics.php">Send us pictures</a>
</div>
    <!-- Header/title-->
<h2>Gallery</h2>
<!-- filling up contents of the table--> 
<!-- Start a table for the gallery-->    
<table border="2" aligh="center" >
<?php 
        // results of the array are further narrowed down to each item
        foreach ($results as $result):
        foreach ($result['Contents'] as $object):
            $object_url = $s3->getObjectUrl($bucketName,$object['Key']);
?>
 <!-- Starting with a new table row-->   
 <tr>   
     <!-- Input the image and the link to the image as table data-->
<td><img alt="<?php echo $object_url; ?>" src="<?php echo $object_url; ?>"width=200" height="200"> </td>
    
    <td> <a href="<?php echo $object_url; ?>" download>View/download File </a> </td>
    <!-- end of for each loops-->
    <?php endforeach; ?>
    <?php endforeach; ?>
</tr>  
</table> 
</body>
</html> 
    
    
    
    