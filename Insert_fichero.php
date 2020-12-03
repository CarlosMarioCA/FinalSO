<?php
  
$tipo = $_POST["tipo"];
$name = $_POST["name"];
$currentDirectory = $_POST["currentDirectory"];

echo $name;
if(tipo == "FOLDER"){
    exec("mkdir -p ".$currentDirectory . $name );
}else{
    exec("touch ". $currentDirectory . $name);
}

header("Location: ../index.php?msgs=" . "Creado " . $tipo .  " (" . $name . ")");
?>