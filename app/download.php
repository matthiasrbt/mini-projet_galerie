<?php

if(isset($_GET['path']))
{
    $nom = $_GET['path'];

    if (file_exists($nom)){

        //Define header information
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header("Cache-Control: no-cache, must-revalidate");
        header("Expires: 0");
        header('Content-Disposition: attachment; filename="'.basename($nom).'"');
        header('Content-Length: ' . filesize($nom));
        header('Pragma: public');

        flush();
        readfile($nom);
        die();
    }else{
        echo "Le fichier n'existe pas.";
    }

}else{
    echo "Le nom du fichier n'est pas défini.";
}

?>