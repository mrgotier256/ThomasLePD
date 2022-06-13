<?php
session_start();
include '../PHP/Class.php';


if ($_POST['ToWishList'] == true) {
    $co = new WishListe();
    $addWish = $co->AddWishListe(
        $_POST['id_user'],
        $_POST['id_offre ']
    );

}

if ($_POST['DelFromWishList'] == True) {
    $co = new WishListe();
    $deleteWish = $co->delWishListe(
        $_POST['id_user'],
        $_POST['id_offre']
    );

}