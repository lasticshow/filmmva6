<?php

include("functions.php");

//Récupérer le type des flms
$type = urldecode($_GET["type"]);

//trouver les films correspondant au type
$finder = new Finder($data);
$found = $finder->findByType($type);

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title><?php echo $title; ?></title>
        <link href="css/bootstrap.min.css" rel="stylesheet" />
        <script src="js/jquery-2.2.0.min.js"></script>
        <script src="js/bootstrap.min.js"></script>

    </head>
    <body>
        <nav class="navbar navbar-default" role="navigation">
           <div class="container">
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                       <li class="active"><a href="/">Films</a></li>
                       <li><a href="#">A Propos</a></li>
                       <li><a href="#">Contact</a></li>
                    </ul>
                </div>
          </div>
        </nav>
        <div class="container">
            <div class="jumbotron">
             <h1><?php echo $title; ?></h1>
            <p>Voici les films que j'aime et qui sont sortis récement au ciména. Ceci est la version déploiyée à partir de WebMatrix
                en utilisant le protocole Web Deploy pour la deuxiéme fois, celui-là est modifier à partir de webmatrix;
              </p>
            </div>      
                  
        <?php if(count($data) > 1): ?>
        <h2><?php printf("Il y a actuellement %s films disponibles:", count($data) - 1 ); ?></h2>

            <div class="form-group">
                <div class="dropdown">
                     <button class="btn btn-default dropdown-toggle" type="button" id="dropdowntypes" data-toggle="dropdown">
                           Types
                         <span class="caret"></span>                
                     </button>
                       <ul class="dropdown-menu" role="menu" aria-labelleby ="dropdowntypes" >
                          <?php show_select_types_items(); ?>
                       </ul>   
                </div>
            
            </div>

           
           <table class="table">
                <?php for($i = 0; $i < count($found); $i++): ?>                
                <?php show_row($found[$i]) ; ?>               
               <?php endfor;?>
          </table>
        <?php else: ?>
        <h2>Il n'y a pas actuellement de film disponible. </h2>
        <?php endif; ?>
              </div>
    </body>
</html>
