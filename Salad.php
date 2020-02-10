<?php
//  salad Instructions stored in local variables for demo purposes, I wanted to be able to show what is on the page from a single file
$saladInstructions = 'txt=Cut leafy greens into small ribbons...Add salad dressing and mix well in a large bowl. Pour and enjoy!';
$saladIngredients = array(
    '200g Leafy greens',
    '1/2 cup salad dressing of your choice'
);
// Useing Post in the url in order to send email and ingredients for the email
if (isset($_POST['email']))
{
    $email = $_POST['email'];
    $saladIngredientssend = implode(", ",$saladIngredients);
    $url = "sendMail.php?email=".$email."&ingredients=".$saladIngredientssend;
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
        <h2>Salad recipe </h2>
        <!-- Explanation of a Salad-->
        <p>A salad is a dish consisting of a mixture of small pieces of food, usually vegetables or fruit. However, different varieties of salad may contain virtually any type of ready-to-eat food. Salads are typically served at room temperature or chilled, with notable exceptions such as south German potato salad which can be served warm.
        </p>
        <!-- ingredients headding-->
        <h2>Ingedients </h2>
        <ul>
            <?php
            // listing the indredients from array  into table
            foreach ($saladIngredients as $saladIngredient){
                echo '<li>', $saladIngredient, '</li>';
            }
            ?>
        </ul>
        <!-- Form method to send to SendMail.php
        gets the mail given in the email box
        -->
        <form method="post" action="Salad.php">
            <input type="text" name="email" placeholder="Example@uoit.net">
            <input type="submit" value="Email me the ingrediants" />
        </form>
        <!-- Instructions headding-->
        <h2>Instructions </h2>
        <!-- Ordered list of the instructions-->
        <ol>
            <li>Cut leafy greens into small ribbons.</li>
            <li>Add salad dressing and mix well in a large bowl.</li>
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
                    data:'<?php echo $saladInstructions; ?>',
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