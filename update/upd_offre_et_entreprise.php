<?php
session_start();
include '../PHP/Class.php';

if (@$_POST['updateEntreprise'] == 1) {
    $co = new Entreprise();
    $update_pilote = $co->UpEntreprise(
        $_POST['id_fiche'],
        $_POST['NewNom'],
        $_POST['SecteurAct'],
        $_POST['localite'],
        $_POST['NbrStagiaire'],
        $_POST['EvalStagiaire'],
        $_POST['EvalStagiaire']
    );
    var_dump($_POST['updateEntreprise']);
    header("Location:../listes/l-entreprise.php");
    exit;
}
