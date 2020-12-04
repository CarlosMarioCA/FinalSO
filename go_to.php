<?php
  
    $dir = $_GET["dir"];
    console_log($dir);
    if(!is_null($dir)){
        console_log($_COOKIE["currentDirectory"]);
        setcookie("currentDirectory", $dir,time() + (86400 * 30), "/");
        console_log($_COOKIE["currentDirectory"]);

    }
     header("Location: /index.php");

     function console_log( $data ){
  echo '<script>';
  echo 'console.log('. json_encode( $data ) .')';
  echo '</script>';
}
?>