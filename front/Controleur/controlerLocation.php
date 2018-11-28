<?php
if(isset($_GET['action']))
{
    switch ($_GET['action'])
    {
        case 'listLocation':
            require_once('modele/location.crud.php');
            $locations = getAllLocations();
            include 'vue/locations.php';
            
            break;                    

        default:

            include 'vue/include/error.inc.php';

        break;
    }
}
else
{
    header('Location:index.php');
}

?>
