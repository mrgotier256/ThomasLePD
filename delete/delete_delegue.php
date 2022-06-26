<?php
session_start();
include '../PHP/Class.php';
$delete = new Delegue();

$delete_delegue = $delete->delDelegue($_POST['id_user']);
var_dump($delete);

if ($delete_delegue) {
    header("Location:../listes/l-delegue.php");
    exit;
} else {
    echo "L'id du délégué est invalide";
}
