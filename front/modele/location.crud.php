<?php

require_once('config.php');
//require_once('location.class.php');


/* Listing Locations */
function getAllLocations(){
    $path = Api::getPath()."/locations/zones";
    //Envoie une requte de type GET

    $postdata = ["send_datetime" => date("l, d/m/Y, H:i"),
                "data" => ["Plaine", "Solbosch"]
                ];
    $opts = array('http' =>
        array(
            'method'  => 'POST',
            'header'  => 'Content-Type: application/json',
            'content' => json_encode($postdata)
        )
    );
    $context  = stream_context_create($opts);
    
    $data = json_decode(file_get_contents($path, false, $context), true);

    /*$locations = [];    
    foreach($data["data"] as $req) {
        $locations[] = new Prof($req["nom"], $req["prenom"], $req["email"], $req["id"]);
    }*/

    return $data;
}



?>