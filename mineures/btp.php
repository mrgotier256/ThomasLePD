<?php
include '../base/head.php';
echo '<link rel="stylesheet" href="info.css">';
include '../base/header.php';
require '../PHP/Class.php';
?>

<main>
    <div class="container" >
        <div class="row">
            <article class="col-2" style="text-align:left;">Filtrage
                <form method="post" action="../recherche/RechercheStage.php">
                        <tr>
                            <div class="col-2">Entreprise</div>
                        </tr>
                        <select id="EntrepriseNom" name="EntrepriseNom" style="width:100px;">
                            <option value="">Entreprise</option>
                            <?php
                            $NomEntreprises = new Entreprise;
                            foreach ($NomEntreprises->getEntrepriseSansLimite() as $NomEntreprise) {
                            ?>
                                <option value="<?= $NomEntreprise['Nom'] ?>"><?= $NomEntreprise['Nom'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                        <tr>
                            <div class="col-2">Compétences</label></div>
                        </tr>
                        <select id="StageCompetence" name="StageCompetence" style="width:100px;">
                            <option value="">Competence</option>
                            <?php
                            $OffreCompetences = new Offre;
                            foreach ($OffreCompetences->getOffreCompetence() as $OffreCompetence) {
                            ?>
                                <option value="<?= $OffreCompetence['competences'] ?>"><?= $OffreCompetence['competences'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                        <tr>
                            <div class="col-2">Localité</label></div>
                        </tr>
                        <select id="StageLocalite" name="StageLocalite" style="width:100px;">
                            <option value="">Localité</option>
                            <?php
                            $OffreLocali = new Offre;
                            foreach ($OffreLocali->getOffreLocalite() as $OffreLocal) {
                            ?>
                                <option value="<?= $OffreLocal['localite'] ?>"><?= $OffreLocal['localite'] ?></option>
                            <?php
                            }
                            ?>
                        </select>

                        <tr>
                            <div class="col-2">Durée (semaines)</label></div>
                        </tr>
                        <div class="col-6"><input type="number" name="StageDuree" placeholder="Durée de stage" style="width:90px;" /></div>
                        <br>
                        <button class="btn btn-outline-light" type="submit">Search</button>
                </form>
            </article>
            <article class="col-9" style="text-align:center;width:80%;">
               
            </article>
        </div>
    </div>
</main>

<?php include '../base/footer.php'; ?>