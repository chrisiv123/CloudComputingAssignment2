<?php 
$biscuitInstructions = 'txt=Preheat oven to 350 degrees F... Mix together all the dry ingredients. Slowly add the wet ingredients one by one and mix. Drop large spoonfuls onto ungreased pans... Bake for 10 minutes in the oven.';
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


<h2>Biscuits recipe</h2>

<p>A cookie is a baked or cooked food that is typically small, flat and sweet. It usually contains flour, sugar and some type of oil or fat. It may include other ingredients such as raisins, oats, chocolate chips, nuts, etc.
    </p> <p>
In most English-speaking countries except for the United States and Canada, crisp cookies are called biscuits. Chewier biscuits are sometimes called cookies even in the United Kingdom.[3] Some cookies may also be named by their shape, such as date squares or bars.</p>
    
<h2>Ingedients </h2>
<ul>
  <li>1 cup butter, softened</li>
  <li>1 cup white sugar</li>
  <li>1 cup packed brown sugar</li>
  <li>2 eggs</li>
  <li>2 teaspoons vanilla extract</li>
  <li>1 teaspoon baking soda</li>
  <li>1/2 teaspoon salt</li>
  <li>3 cups all-purpose flour</li>
  <li>2 cups semisweet chocolate chips</li>
</ul>
<h2>Instructions </h2>
<ol>
  <li>Preheat oven to 350 degrees F.</li>
  <li>Mix together all the dry ingredients. Slowly add the wet ingredients one by one and mix. Drop large spoonfuls onto ungreased pans.</li>
  <li>Bake for 10 minutes in the oven.</li>
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
