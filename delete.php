<?php  
    $dir = $_GET["dir"];
    
    if(!is_null($dir)){
      exec('rm -rf '.$dir)  ;
    }
     header("Location: /FinalSO/index.php");

?>