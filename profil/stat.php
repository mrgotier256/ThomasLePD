<?php
include '../base/head.php';
echo '<link rel="stylesheet" href="offres.css">';
include '../base/header.php';
?>

<main>
    <div class="container">
        <div class="row">
            <a class="btn btn-secondary col-1 bout fixed-top" style="margin:56px 0; width: 53px; height:53px;" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
                +
            </a>
            <div class="text-center col-11">
                <article class="prof"> Statistiques
                    <div style="width: 65%; margin:auto;">
                        <br>
                        <div class="row" style="margin-top:50px;">
                            <div class="col-sm-1">Nom</div>
                            <div class="col-sm-11"><input type="Nom" class="col-sm-6" placeholder="Nom" id="nom" required /></div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-1">Nombre d\'offres crées</div>
                            <div class="col-sm-11"><input type="Nombre" class="col-sm-6" placeholder="Nombre d\'offre crée" id="nombre offre-cree" required /></div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-1">Nombre de stagiaire acceptés</div>
                            <div class="col-sm-11"><input type="Nombre" class="col-sm-6" placeholder="Nombre de stagiaire" id="nbr_stagiaire" required /></div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-1">Nombre d\'employés</div>
                            <div class="col-sm-11"><input type="Nombre" class="col-sm-6" placeholder="Nombre d\'employés" id="nbr_employes" required /></div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-1">Code SIRET</div>
                            <div class="col-sm-11"><input type="Code" class="col-sm-6" placeholder="Code SIRET" id="code-siret" required /></div>
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
            <a href="entreprise.php">Profil</a>
            <br></br>
            <a href="stat.php">Statistiques</a>
            <br></br>
            <a href="offre-cree.php">Offres de stage</a>
            <br></br>
            <div>
                <a class="deco" href="../deco/deconnexion.php">Deconnexion</a>
            </div>
        </div>
    </div>
</main>

<?php include '../base/footer.php'; ?>