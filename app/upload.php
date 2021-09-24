<html>
<head>
    <meta charset="utf-8">
</head>
<body>

<?php
$fichier = $_FILES['fichier']['name'];
$fichierChemin = pathinfo($fichier);
$fichierExtension = $fichierChemin['extension'];
$extensionsAutorisees = array("pdf", "mp4", "png");


if (!(in_array($fichierExtension, $extensionsAutorisees))) {
    echo "Le fichier n'a pas l'extension attendue";
} else {
    $dossierDest = dirname('C:\xampp\htdocs\projet-gallery\tmp\ '). '\ ' ;
    $fichierNom = $fichier;

    if (move_uploaded_file($_FILES["fichier"]["tmp_name"],
        $dossierDest.$fichierNom)) {
        echo "Le fichier temporaire ".$_FILES["fichier"]["tmp_name"].
            " a été déplacé vers ". $dossierDest.$fichierNom ;
    } else {
        echo "Le fichier n'a pas été uploadé (trop gros ?) ou ".
            "Le déplacement du fichier temporaire a échoué".
            " vérifiez l'existence du répertoire ".$dossierDest;
    }
}
?>
</body>
</html>