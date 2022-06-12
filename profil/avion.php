<?php
session_start();
if (@$_SESSION['auth'] == true) {
    include '../base/head.php';
    echo '<link rel="stylesheet" href="profils.css">';
    include '../base/header.php';

    $id_User = $_GET['idUser'];
    require '../PHP/Class.php';
    $pilotes = new Pilote();
    $detail = $pilotes->getPilotebyID($id_User);
?>

    <main>
        <div class="container case">
            <div class="row case">
                <div class="text-center col-11">
                    <article class="prof">
                        <div style="width: 65%; margin:auto;">
                            <img src="../assets/images/pilote.jpg"></img>
                            <br>
                            <div class="row" style="margin-top:50px;">
                                <div class="col-sm-3">Prénom</div>
                                <div class="col-sm-8"><input type="text" class="col-sm-6" disabled="disabled" id="prenom" required value="<?= $detail['prenom'] ?>" /></div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-sm-3">Nom</div>
                                <div class="col-sm-8"><input type="text" class="col-sm-6" disabled="disabled" placeholder="Nom" id="nom" required value="<?= $detail['nom'] ?>" /></div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-sm-3">Centre</div>
                                <div class="col-sm-11"><input type="email" class="col-sm-6" disabled="disabled" placeholder="Email" id="email" required value="<?= $detail['email'] ?>" /></div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-sm-3">Email</div>
                                <div class="col-sm-11"><input type="text" class="col-sm-6" disabled="disabled" placeholder="Centre" id="centre" required value="<?= $detail['centre'] ?>" /></div>
                            </div>
                            <br>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </main>

<?php include '../base/footer.php';
} else {
    header("Location:../connexion/connexion.php");
    exit;
}
?>