<?php 
$biscuitInstructions = 'txt=Cut leafy greens into small ribbons...Add salad dressing and mix well in a large bowl. Pour and enjoy!';
?>
<!DOCTYPE html>
<html>
<head>
<style>
  ul{
  font-style: oblique;
  color: #808080;
  margin-left: 220px;
    text-transform: none;
}
ol{
  font-style: oblique;
  color: #808080;
  margin-left: 220px;
    text-transform: none;
}  
form , #player{
   margin-left: 220px; 
    
}
</style>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="styles.css">
</head>
<body>
<div id="Sidebar" class="sidebar">
    <a href="mainpage.php">Home</a>
  <a href="gallery.php">Gallery</a>
  <a href="Biscuits.php">Biscuits</a>
  <a href="Salad.php">Salad</a>
  <a href="SendUsPics.php">Send us pictures</a>
</div>

<h2>Salad recipe </h2>

<p>A salad is a dish consisting of a mixture of small pieces of food, usually vegetables or fruit. However, different varieties of salad may contain virtually any type of ready-to-eat food. Salads are typically served at room temperature or chilled, with notable exceptions such as south German potato salad which can be served warm.
    </p>
    
<h2>Ingedients </h2>
<ul>
  <li>200g Leafy greens</li>
  <li>1/2 cup salad dressing of your choice</li>
</ul>
<h2>Instructions </h2>
<ol>
  <li>Cut leafy greens into small ribbons.</li>
  <li>Add salad dressing and mix well in a large bowl.</li>
  
</ol> 
    <form method="post">
	<input type="button" name="submit" value="Convert instructions to speach" onclick="getAudio()"/>
</form>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script>
function getAudio(){
	var txt=jQuery('#txt').val()
	jQuery.ajax({
		url:'get.php',
		type:'post',
		data:'<?php echo $biscuitInstructions; ?>',
		success:function(result){
			jQuery('#player').html(result);
		}
	});
}
</script>
    <div id="player"></div>

   
</body>
</html> 
