<?php
session_start();
include '../PHP/Class.php';
$delete = new Eleve();
$delete_eleve = $delete->delEleve($_POST['id_user']);
var_dump($delete);

if ($delete_eleve) {
    header("Location:../listes/l-eleve.php");
    exit;
} else {
    echo "L'id de l'eleve est invalide";
}
