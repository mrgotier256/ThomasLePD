<?php
session_start();
include '../PHP/Class.php';
$delete = new Entreprise();
$delete_entreprise = $delete->delEntreprise($_GET['id_fiche']);
var_dump($delete);

if($delete_entreprise)
{
    header("Location:../listes/l-entreprise.php");
    exit;
}
else{
    echo "L'id de l'entreprise est invalide";
}

?>
