<?php
session_start();
if (@$_SESSION['auth'] == true) {
    include '../base/head.php';
    echo '<link rel="stylesheet" href="profils.css">';
    include '../base/header.php';

    $id_User = $_GET['idUser'];
    require '../PHP/Class.php';
    $eleves = new Eleve();
    $detail = $eleves->getElevebyID($id_User);
?>

    <main>
        <div class="container case">
            <div class="row case">
                <div class="text-center col-12">
                    <article class="prof">
                        <div style="width: 45%; margin:auto;">
                            <img src="../assets/images/profil.jpg"></img>
                            <br>
                            <!-- <div class="row" style="margin-top:50px;">
                                <div class="col-sm-3">ID_user</div>
                                <?php echo'<div class="col-sm-8"><input type="id" class="col-sm-6" placeholder="id_user" disabled="disabled" style="font-weight:bold;" id="id_user" value="'.$detail['id_user'].'" required /></div>'; ?>
                            </div> -->
                            <div class="row" style="margin-top:50px;">
                                <div class="col-sm-3">Prénom</div>
                                <?php echo'<div class="col-sm-8"><input type="id" class="col-sm-6" placeholder="Prénom" disabled="disabled" style="font-weight:bold;" id="nom" value="'.$detail['nom'].'" required /></div>'; ?>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-sm-3">Nom</div>
                                <?php echo'<div class="col-sm-8"><input type="id" class="col-sm-6" placeholder="Nom" disabled="disabled" style="font-weight:bold;" id="prenom" value="'.$detail['prenom'].'" required /></div>'; ?>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-sm-3">Centre</div>
                                <?php echo'<div class="col-sm-8"><input type="id" class="col-sm-6" placeholder="Centre" disabled="disabled" style="font-weight:bold;" id="centre" value="'.$detail['centre'].'" required /></div>'; ?>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-sm-3">Email</div>
                                <?php echo'<div class="col-sm-8"><input type="id" class="col-sm-6" placeholder="Email" disabled="disabled" style="font-weight:bold;" id="email" value="'.$detail['email'].'" required /></div>'; ?>
                            </div>
                            <br>
                        </div>
                    </article>
                </div>
            </div>
        </div>
        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel" style="width:200px;background-color:black;">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasExampleLabel" style="color:white;">Menu</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body" style="color:white;">
            <?php
                    include'../link_bar/link_bar.php'; 
                ?>
                <div>
                    <a class="deco" href="../deco/deconnexion.php">Deconnexion</a>
                </div>
            </div>
        </div>
    </main>

<?php
    include '../base/footer.php';
} else {
    header("Location:../connexion/connexion.php");
    exit;
}
?>