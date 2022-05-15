<?php
session_start();
include '../PHP/Class.php';
$delete = new Offre();
$delete_offre = $delete->delOffre($_GET['id_offre']);
var_dump($delete);

if($delete_offre)
{
    header("Location:../listes/l-offre.php");
    exit;
}
else{
    echo "L'id de l'offre est invalide";
}

?>
