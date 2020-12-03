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
     $currentDirectory = "/" ;
     $currentDirectory = "/Users/andres/phpA/";
     ?>
    <ul class="nav">
        
   
    <!--Barra de navegación-->
    
        <li class="nav-pills" >
            <a class="nav-link border rounded bg-dark active" href="index.php"> <?php echo $currentDirectory ?> </a>
        </li>
     
    </ul>

    <div class="col-6 px-1">
        <br>
        <p>Listado de archivos y carpetas
       </p>


       
       <ul>

        <?php
        #$currentDirectory = "/Applications/Ampps/www/Ficheros";
        
      #system("ls /Users/andres -ltr");
     
    $items = explode("<BR>" , str_replace("\n", "<BR>", shell_exec("ls ".$currentDirectory)));
    
    if ($items){

        foreach ($items as $fila){
           
    ?>

       <li class="nav-pills" >
            <a class="nav-link border rounded bg-dark active" href="Index.html"> <?php echo explode(" ",$fila)[0] ?><?php echo explode(" ",$fila)[2] ?> </a>
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

                                <!--Tipo de identificación-->
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
                                <input type="hidden" id="currentDirectory" name="currentDirectory" value="<?php echo (isset($currentDirectory)) ?  $currentDirectory : '' ?>">
                           

                                <!--Botones-->
                                <div class="form-group">
                                    <input type="submit" class="btn btn-success" value="Crear">
                                   
                                </div>
                            </form>
                        </div>
    </div>
</body>
</html>