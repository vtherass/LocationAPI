<?php 

include('modeles/location.class.php');
include('modeles/location.crud.php');

switch($url) {
    case '/'.$root:
        getLocations();
        break;
    case '/'.$root.'/departments':
        getLocations("byDept", $dataPost);
        break;
    case '/'.$root.'/zones':
        getLocations("byZone", $dataPost);
        break;
    case '/'.$root.'/size':
        getLocations("bySize", $dataPost);
        break;
    case '/'.$root.'/ressources':
        getLocations("bySuit", $dataPost);
        break;
    default:
        echo "Error Location : no match root !";
        break;
}

?>