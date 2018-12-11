<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        <title>
            Gestion Locations
        </title>
        <link rel="stylesheet" href="style/css/style.css">
    </head>
    <body>
    <?php
        include 'Vue/Include/header.inc.php';

        if(!isset($_GET['page']))
        {
            include 'Vue/Include/index.inc.php';
        }
        else
        {
            $page = $_GET['page'];

            if(file_exists("Controleur/$page.php"))
            {
                include "Controleur/$page.php";
            }
            else
            {
                include "Vue/Include/error.inc.php";
            }
        }
        include "Vue/Include/footer.inc.php";
     ?>

    </body>
</html>