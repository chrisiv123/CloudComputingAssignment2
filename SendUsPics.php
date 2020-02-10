<?php 
$biscuitInstructions = 'txt=Cut leafy greens into small ribbons...Add salad dressing and mix well in a large bowl. Pour and enjoy!';
?>
<!DOCTYPE html>
<html>
<head>
<style>

form {
   margin-left: 220px; 
    
}
</style>
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

<h2>Send us your pictures</h2>
    <form action="upload.php" method="post" enctype="multipart/form-data" >
    Select the image to upload
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Upload Image" name="Submit">
        
    </form>

</body>
</html> 
