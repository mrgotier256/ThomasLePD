<?php
session_start();
if (@$_SESSION['auth'] == true) {
    include '../base/head.php';
    echo '<link rel="stylesheet" href="profils.css">';
    include '../base/header.php';
    require '../PHP/Class.php';
?>

    <main>
        <div class="container case">
            <div class="row case">
                <a class="btn btn-secondary col-1 bout fixed-top" style="margin:56px 0; width: 53px; height:53px;" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
                    +
                </a>
                <div class="text-center col-11">
                    <article class="prof">
                        <div style="width: 45%; margin:auto;">
                            <img src="../assets/images/delegue.jpg"></img>
                            <br>
                            <div class="row" style="margin-top:50px;">
                                <div class="col-sm-1">Prénom</div>
                                <div class="col-sm-11"><input type="text" class="col-sm-6" disabled="disabled" id="prenom" required value="<?= $_SESSION['user']['prenom'] ?>" /></div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-sm-1">Nom</div>
                                <div class="col-sm-11"><input type="text" class="col-sm-6" disabled="disabled" placeholder="Nom" id="nom" required value="<?= $_SESSION['user']['nom'] ?>" /></div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-sm-1">Email</div>
                                <div class="col-sm-11"><input type="email" class="col-sm-6" disabled="disabled" placeholder="Email" id="email" required value="<?= $_SESSION['user']['email'] ?>" /></div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-sm-1">Centre</div>
                                <div class="col-sm-11"><input type="text" class="col-sm-6" disabled="disabled" placeholder="Centre" id="centre" required value="<?= $_SESSION['user']['centre'] ?>" /></div>
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