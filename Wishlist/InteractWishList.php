<?php
session_start();
include '../PHP/Class.php';

$id_user = $_SESSION['user']['id_user'];

if (!$id_user)
{
    header('Location: ../connexion/connexion.php');
}


if (@$_POST['ToWishList'] == true) {
    $co = new WishListe();
    $addWish = $co->AddWishListe(
        $id_user,
        $_POST['id_offre']
    );

}

if (@$_POST['DelFromWishList'] == True) {
    $co = new WishListe();
    $deleteWish = $co->delWishListe(
        $id_user,
        $_POST['id_offre']
    );

}