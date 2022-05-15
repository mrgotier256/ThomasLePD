<?php
include '../Base/head.php';
echo '<link rel="stylesheet" href="connexion.css">';
include '../Base/header.php';
?>

<main>
    <div>
        <form method="post" action="">
            <fieldset>
                <legend>Mot de passe oublié</legend>
                <div class="container">
                    <div class="row"><label class="col-6">Email</label>
                        <input type="email" class="col-6" placeholder="Entrez votre Email" id="Email" required />
                    </div>
                    <div class="row"><label class="col-6">Confirmation Email</label>
                        <input type="email" class="col-6" placeholder="Confirmez votre Email" id="confEmail" required />
                    </div>
                </div>
                </br>
                <input type="submit" value="Envoyer" id="envoyer" />
            </fieldset>
        </form>
        <a href="../connexion/connexion.php">Se connecter</a>
</main>

<?php include '../Base/footer.php'; ?>