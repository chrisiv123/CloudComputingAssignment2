<?php
// player getter
if(isset($_POST['txt'])){
    $txt=$_POST['txt'];
    $txt=htmlspecialchars($txt);
    $txt=rawurlencode($txt);
    // using google translate API
    $html=file_get_contents('https://translate.google.com/translate_tts?ie=UTF-8&client=gtx&q='.$txt.'&tl=en-IN');
    // set player ulr
    $player="<audio controls='controls' autoplay><source src='data:audio/mpeg;base64,".base64_encode($html)."'></audio>";
    // return player url
    echo $player;
}
?>