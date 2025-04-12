<?php 
    try{
        $connexion  = new PDO("mysql:host=localhost;dbname=product_manager","root", "");

        $sql = "select * from categories;";
        $lignes = $connexion->query($sql);
        
    }
   catch(Exception $e){
    echo "".$e->getMessage()."";
   }

?>