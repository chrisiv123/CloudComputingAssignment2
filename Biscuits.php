<?php 
//  biscuit Instructions stored in local variables for demo purposes, I wanted to be able to show what is on the page from a single file
$biscuitInstructions = 'txt=Preheat oven to 350 degrees F. Mix together all the dry ingredients. Slowly add the wet ingredients one by one and mix. Drop large spoonfuls onto ungreased pans... Bake for 10 minutes in the oven.';
$biscuitsIngredients = array (  
    '1 cup butter, softened',
    '1 cup white sugar',
    '1 cup packed brown sugar',
    '2 eggs',
    '2 teaspoons vanilla extract',
    '1 teaspoon baking soda',
    '1/2 teaspoon salt',
    '3 cups all-purpose flour',
    '2 cups semisweet chocolate chips');

// Useing Post in the url in order to send email and ingredients for the email
if (isset($_POST['email']))
{
    $email = $_POST['email'];
    $biscuitsIngredientssend = implode(", ",$biscuitsIngredients);
    $url = "sendMail.php?email=".$email."&ingredients=".$biscuitsIngredientssend;
    header('Location: '.$url);
    exit();
}
?>
<!-- Begining of the HTML-->
<!DOCTYPE html>
<html>
    <head>
        <!-- unique stiles of this page-->
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
            form {
                margin-left: 220px; 
            }
        </style>
        <!-- Meta and overall syles-->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <!-- Sidebar -->
        <div id="Sidebar" class="sidebar">
            <a href="index.php">Home</a>
            <a href="gallery.php">Gallery</a>
            <a href="Biscuits.php">Biscuits</a>
            <a href="Salad.php">Salad</a>
            <a href="SendUsPics.php">Send us pictures</a>
        </div>
        <!-- First headder-->
        <h2>Biscuits recipe</h2>
        <!-- Explanation of a Biscuit-->
        <p>A cookie is a baked or cooked food that is typically small, flat and sweet. It usually contains flour, sugar and some type of oil or fat. It may include other ingredients such as raisins, oats, chocolate chips, nuts, etc.
        </p> 
        <p>In most English-speaking countries except for the United States and Canada, crisp cookies are called biscuits. Chewier biscuits are sometimes called cookies even in the United Kingdom.[3] Some cookies may also be named by their shape, such as date squares or bars.</p>
        <!-- ingredients headding-->
        <h2>Ingedients </h2>
        <ul>
            <?php 
            // listing the indredients from array  into table
            foreach ($biscuitsIngredients as $biscuitsIngredient){
                echo '<li>', $biscuitsIngredient, '</li>';
            }    
            ?>
        </ul>
        <!-- Form method to send to SendMail.php
        gets the mail given in the email box
        -->
        <form method="post" action="Biscuits.php">
            <input type="text" name="email" placeholder="Example@uoit.net">
            <input type="submit" value="Email me the ingrediants" />
        </form>
        <!-- Instructions headding-->
        <h2>Instructions </h2>
        <!-- Ordered list of the instructions-->
        <ol>
            <li>Preheat oven to 350 degrees F.</li>
            <li>Mix together all the dry ingredients. Slowly add the wet ingredients one by one and mix. Drop large spoonfuls onto ungreased pans.</li>
            <li>Bake for 10 minutes in the oven.</li>
        </ol> 
        <form method="post">
            <!-- Button to use the getAudio function-->
            <input type="button" name="submit" value="Convert instructions to speach" onclick="getAudio()"/>
        </form>
        <!-- Full function for using google API, sends needed information to get.php and recieves a player as a result-->
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
        <!-- The player for text to speach-->
        <div id="player"></div>
    </body>
</html> 
