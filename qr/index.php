<?php

include('libs/phpqrcode/qrlib.php');

if(isset($_GET['id']))
{
	$tempDir = 'temp/'; 
     
    // here our data 
    $id = $_GET['id']; 
     
    // we building raw data 
    $codeContents = $id; 
     
    // generating 
    QRcode::png($codeContents, $tempDir.$id.'.png', QR_ECLEVEL_L, 5); 
    
    // displaying 
    echo '<img src="'.$tempDir.$id.'.png" />'; 
}


?>