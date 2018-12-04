<?php

header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");

if (isset($_SERVER['PATH_INFO'])) {
    $root = explode('/', $_SERVER['PATH_INFO'])[1]; // [1] car explode retourne ['', 'etudiant', ...]
    $url = $_SERVER['PATH_INFO'];
} else {
    $root = 'default';
    $url = '/';
}

/*$d = dir("C:\wamp64\www\git\FormationBE\\valery\api\ressources\profs");
echo "Pointeur : " . $d->handle . "\n";
echo "Chemin : " . $d->path . "\n";
while (false !== ($entry = $d->read())) {
   echo $entry."\n";
}
$d->close();*/

$dataReq = [];
if(file_get_contents("php://input") != "") {
    $jsonData = file_get_contents("php://input");
    $dataPost = json_decode($jsonData, true);
}


if (!file_exists('./ressources/'.$root.'/router.php')) { 
    echo 'Ressource not found !'; 
} 
else {
  require('./ressources/'.$root.'/router.php');
}

?>