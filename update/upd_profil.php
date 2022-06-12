<?php
session_start();
include '../PHP/Class.php';


if ($_POST['Role'] == 2) {
    $co = new Pilote();
    $update_pilote = $co->upPilote(
        $_POST['Login'],
        $_POST['Nom'],
        $_POST['Prenom'],
        $_POST['Email'],
        $_POST['Centre'],
        $_POST['Role'],
        $_POST['Promotion']
    );

    header("Location:../listes/l-pilote.php");
    exit;
}

if ($_POST['Role'] == 4) {
    $co = new eleve();
    $update_eleve = $co->upEleve(
        $_POST['Login'],
        $_POST['Nom'],
        $_POST['Prenom'],
        $_POST['Email'],
        $_POST['Centre'],
        $_POST['Role'],
        $_POST['Promotion']
    );

    header("Location:../listes/l-eleve.php");
    exit;
}

if ($_POST['Role'] == 3) {
    $co = new delegue();
    $update_delegue = $co->upDelegue(
        $_POST['Login'],
        $_POST['Nom'],
        $_POST['Prenom'],
        $_POST['Email'],
        $_POST['Centre'],
        $_POST['Role'],
    );

    header("Location:../listes/l-delegue.php");
    exit;
}
