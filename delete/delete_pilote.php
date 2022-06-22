<?php
session_start();
include '../PHP/Class.php';
$delete = new Pilote();
$delete_pilote = $delete->delPilote($_GET['login']);
var_dump($delete);

if($delete_pilote)
{
    header("Location:../listes/l-pilote.php");
    exit;
}
else{
    echo "L'id du pilote est invalide";
}

?>
