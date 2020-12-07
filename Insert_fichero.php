<?php
  
    $tipo = $_POST["tipo"];
    $name = $_POST["name"];
    $currentDirectory = $_COOKIE["currentDirectory"];
 
    createDirFile($currentDirectory, $name,$tipo);

    function createDir($currentDirectory, $name ) {
        exec("mkdir -p ".$currentDirectory .'/'. $name );
    }


    function createFile($currentDirectory, $name ) {
        exec("touch ". $currentDirectory ."/". $name);
    }

    function createDirFile($currentDirectory, $name,$tipo){
        if($tipo == "FOLDER"){
            createDir($currentDirectory , $name);
        }else{
            createFile($currentDirectory , $name);
        }
        #header("Location: ../go_to.php?dir=".$_COOKIE["currentDirectory"]);
        header("Location: /FinalSO/index.php");
    }

function console_log( $data ){
  echo '<script>';
  echo 'console.log('. json_encode( $data ) .')';
  echo '</script>';
}

?>
