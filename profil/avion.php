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
                                <div class="col-sm-3">ID_user</div>
                                <?php echo ' <div class="col-sm-8"><input type="id" class="col-sm-6" placeholder="id_user" disabled="disabled" style="font-weight:bold;" id="id_user" value="' . $detail['id_user'] . '" required /></div>'; ?>
                            </div>
                            <div class="row" style="margin-top:50px;">
                                <div class="col-sm-3">Prénom</div>
                                <?php echo ' <div class="col-sm-8"><input type="text" class="col-sm-6" placeholder="Prénom" disabled="disabled" style="font-weight:bold;" id="prenom" value="' . $detail['nom'] . '" required /></div>'; ?>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-sm-3">Nom</div>
                                <?php echo ' <div class="col-sm-8"><input type="text" class="col-sm-6" placeholder="Nom" disabled="disabled" style="font-weight:bold;" id="nom" value="' . $detail['prenom'] . '" required /></div>'; ?>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-sm-3">Centre</div>
                                <?php echo ' <div class="col-sm-8"><input type="text" class="col-sm-6" placeholder="Centre" disabled="disabled" style="font-weight:bold;" id="centre" value="' . $detail['centre'] . '" required /></div>'; ?>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-sm-3">Email</div>
                                <?php echo ' <div class="col-sm-8"><input type="email" class="col-sm-6" placeholder="Email" disabled="disabled" style="font-weight:bold;" id="email" value="' . $detail['email'] . '" required /></div>'; ?>
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