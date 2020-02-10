<!DOCTYPE html>
<html>
<head>
    <!-- unique styles-->
<style>
form {
   margin-left: 220px;  
}
</style>
    <!-- meta and overall style-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="styles.css">
</head>
<body>
    <!-- sidebar-->
<div id="Sidebar" class="sidebar">
    <a href="index.php">Home</a>
  <a href="gallery.php">Gallery</a>
  <a href="Biscuits.php">Biscuits</a>
  <a href="Salad.php">Salad</a>
  <a href="SendUsPics.php">Send us pictures</a>
</div>
<!-- Title of the page-->
<h2>Send us your pictures</h2>
    <!-- Form to pick a Picture, Sends to upload.php after submit is clicked-->
    <form action="upload.php" method="post" enctype="multipart/form-data" >
    Select the image to upload
        <input type="file" name="fileToUpload" id="fileToUpload">
        <br>
        <input type="submit" value="Upload Image" name="Submit">    
    </form>
</body>
</html> 
