<?php

include '../PHP/Class.php';
$co = new Offre();
$creater_offre=$co->addOffre($_POST['comp'], $_POST['loca'], $_POST['ent'], $_POST['dur'], $_POST['em'], $_POST['remu'], $_POST['ID_ent']);

if($creater_offre)
{
    header("Location:../listes/l-offre.php");
    exit;
}
else{
    echo "La création d'offre à échouée";
}

?>