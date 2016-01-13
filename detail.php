<?php

include("functions.php");

//Récupérer le paramétre de l'identifiant passé dans l'URL de la page
$id = $_GET["film"];

//Trouver le bon film
$finder = new Finder($data);
 $film = $finder->find($id);
 


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title><?php echo "MVA - " . $film->title; ?></title>
        <link href="css/bootstrap.min.css" rel="stylesheet" />
        <script src="js/jquery-2.2.0.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </head>
    <body>
       <nav class="navbar navbar-default" role="navigation">
           <div class="container">
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                       <li><a href="/">Films</a></li>
                       <li><a href="#">A Propos</a></li>
                       <li><a href="#">Contact</a></li>
                    </ul>
                </div>
          </div>
        </nav>
        <div class="container">
        <h1><?php echo $film->title; ?></h1>
            <div class="pull-left">
               <img src="images/<?php echo $film->image; ?>" class="img-thumbnail" />
            </div>
            <div class="pull-left" style="margin-top: 10px;">
                <dl>
                   <dt>Type</dt>
                   <dd><?php echo $film->type; ?></dd>
                    <dt>Année</dt>
                   <dd><?php echo $film->year; ?></dd>
                    <dt>Pays/dt>
                   <dd><?php echo $film->contry; ?></dd>
                    <dt>Réalisateur</dt>
                   <dd><?php echo $film->director; ?></dd>
                    <dt>Durée</dt>
                   <dd><?php echo $film->length; ?></dd>
                    <dt>Résumé</dt>
                   <dd><?php echo $film->abstract; ?></dd>
                    
                </dl>

            </div>
            <div class="pull-right">
               <a href="/" class="btn btn-primary btn lg active" role="button">Retour à la liste </a>
            </div> 
        </div> 
    </body>
</html>
