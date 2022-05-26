<?php

include '../PHP/Class.php';


if ($_POST['Role'] == 2) {
    $co = new Pilote();
    $creater_pilote = $co->delPilote(
        $_POST['Login']
    );

    if ($creater_pilote) {
        header("Location:../listes/l-pilote.php");
        exit;
    } else {
        echo "La création d'offre à échouée";
    }
}

if ($_POST['Role'] == 4) {
    $co = new eleve();
    $creater_pilote = $co->delEleve(
        $_POST['Login']
    );

    if ($creater_pilote) {
        header("Location:../listes/l-eleve.php");
        exit;
    } else {
        echo "La création d'offre à échouée";
    }
}

if ($_POST['Role'] == 3) {
    $co = new delegue();
    $creater_pilote = $co->delDelegue(
        $_POST['Login']
    );

    if ($creater_pilote) {
        header("Location:../listes/l-delegue.php");
        exit;
    } else {
        echo "La création d'offre à échouée";
    }
}
