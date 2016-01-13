<?php

   //Contient la date courante
$current_date = date("d/m/Y");
//Contient le titre de la page
$title = "Mes FILMS 6-MVA du " . $current_date;

//Contient les données des films
$data = array();

if (($handle = fopen("films.csv", "r")) !== FALSE) {
    while(($row = fgetcsv($handle, 1000, ",")) !== FALSE ) {
       // array_push(&$data,$row);
       $data[] = $row;        
    }
    fclose($handle);
  } 

//var_dump($data);
//Fonction personnalisée destinée à afficher un élément de la liste

 function show_row($film) {    
    echo "<tr><td><a href='detail.php?film=" . $film->id ."'>" . $film->title . "</a></td><td> " . $film->type  . " </td></tr>";
 }
 //Fonction destinée à afficher un select de types de films
 function show_select_types_items() {
     global $data;
     $types = array();
     foreach($data as $row){
           if(!in_array($row[3], $types) && $row[3] != "Type"){
              $types[] = $row[3];
              echo "<li role='type'><a role='menuitem' href='/?type=" . urlencode($row[3]) . "'>" . $row[3] . '</a></li>';
           }
        }
 }

 /**
 *Classe destinée àcontenir les propriétés
 *d'un film
 */

 class Film {
     public $id;
     public $title;
     public $image;
     public $type;
     public $year;
     public $country;
     public $director;
     public $length;
     public $abstract;

   public function __construct($row) {
         $this->id = $row[0];
         $this->title = $row[1];
         $this->image = $row[2];
         $this->type = $row[3];
         $this->year= $row[4];
         $this->country = $row[5];
         $this->director = $row[6];
         $this->length = $row[7];
         $this->abstract = $row[8];        
        
        }

        public function __toString(){
            return $this->title . "," . $this->type;
        }
     }

     /**
     *Classe qui est en charge de trouver
     *un film.
     */
     class Finder {
         private $_data;

         public function __construct($data){
             $this->_data = $data;
         }

         //Méthode qui permet de trouver un film à partir de son identifiant
         public function find($id) {
             foreach($this->_data as $row){
                 if($row[0] == $id){
                     return new Film($row);
                 }
             }

             return NULL;
         }

         //Méthode qui permet de trouver un ensemble de films à partir de son type
         public function findByType($type){
             $found = array();
             if(!empty($type)){
                 foreach($this->_data as $row){
                     if($row[3] == $type){
                         $found[] = new Film($row);
                     }
                 }
             }
             else{//On renvoie tous les films quand le type est non renseigné.
                 foreach($this->_data as $row){
                     if($row[1] != "Type"){
                        $found[] = new Film($row); 
                     }                      
                 }
             }
              return $found;
         }
        
     }



?>

