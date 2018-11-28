<?php

require_once('config.php');
//require_once('location.class.php');

function getAllLocations(){
    $path = Api::getPath()."/locations";
    //Envoie une requte de type GET
    $data = json_decode(file_get_contents($path), true);

    $locations = [];    
    foreach($data["data"] as $req) {
        $locations[] = new Prof($req["nom"], $req["prenom"], $req["email"], $req["id"]);
    }

    return $locations;
}


?>