<!DOCTYPE html>
<html lang="en">

<head>
    <!--configuraciones básicas-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!--Librería de boostraps-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!--Título de la pestaña-->
    <title> Inicio </title>

    <!--Título de la página-->
    <header class="alert alert-info"> <h1> Sistema de Archivos </h1></header>
</head>

<body>
     <?php 
        
     #setcookie("currentDirectory", "/Users/andres/phpA",time() + (86400 * 30), "/");
     if(is_null($_COOKIE["currentDirectory"])){
         setcookie("currentDirectory", "/Users/andres/phpA",time() + (86400 * 30), "/");
     }

     ?>
    <ul class="nav">
        
   
    <!--Barra de navegación-->
    <?php 
    $currentDirectory = $_COOKIE["currentDirectory"];
    $currentDirectoryModified = ltrim($currentDirectory, $currentDirectory[0]);
    $items = explode("/", $currentDirectoryModified );
    $breadcrumb = '';
     foreach ($items as $folder_name){
         $breadcrumb = $breadcrumb.'/'.$folder_name;
        echo '<li class="nav-pills" >
            <a class="nav-link border rounded bg-dark active" href="go_to.php?dir='.$breadcrumb.'">'.$folder_name.'  </a>
        </li>';
     }
    ?>
       
     
    </ul>

    <div class="col-6 px-1">
        <br>
        <p>Listado de archivos y carpetas
       </p>


    
       <ul>

    <?php
        
      #system("ls /Users/andres -ltr");
     
    $items = explode("<BR>" , str_replace("\n", "<BR>", shell_exec("ls -l ".$_COOKIE["currentDirectory"])));

    if ($items){

        foreach ($items as $fila){
          
    ?>

       <li class="nav-pills" >
           
            <a class="nav-link border rounded bg-dark active" href="#"> <?php echo explode(" ",$fila)[0]; ?> </a>
            <?php if(explode(" ",$fila)[0][0] == "d"){
                #echo "hola";
                echo "<a class='nav-link border rounded bg-dark active' href='go_to.php?dir=".$_COOKIE["currentDirectory"].'/'.end(explode(" ",$fila))."'>".end(explode(" ",$fila))." </a>";
            } else {
                ?>
                 <a class="nav-link border rounded bg-dark active" href="#"> <?php echo end(explode(" ",$fila)); ?> </a>
                <?php
            }
             ?>
        </li>

    <?php
          
                                }
                            }
                        ?>
</ul>


<div class="card-header bg-dark text-white">
                            Crear Carpeta/Fichero
                        </div>
                        <div class="card-body">
                            <form action="Ficheros/Insert_fichero.php" class="form-group" method="post">

                                <!--Tipo recurso-->
                                <div class="form-group">
                                    <label> Tipo: </label><br>

                                    <select style="width: 250px;" name="tipo" id="tipo">
                                        <option value="FOLDER"> Carpeta </option>
                                        <option value="FILE"> Fichero </option>
                                       
                                    </select>
                                </div>

                                <!--Nombre-->
                                <div class="form-group">
                                    <label> Nombre: </label>
                                    <input style="width: 250px;" type="text" name="name" id="name" class="form-control">
                                </div>
                                <input type="hidden" id="currentDirectory" name="currentDirectory" value="<?php echo (isset($_COOKIE["currentDirectory"])) ?  $_COOKIE["currentDirectory"] : '' ?>">
                           

                                <!--Botones-->
                                <div class="form-group">
                                    <input type="submit" class="btn btn-success" value="Crear">
                                   
                                </div>
                            </form>
                        </div>
    </div>
</body>
</html>