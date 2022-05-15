<?php
include '../Base/head.php';
echo '<link rel="stylesheet" href="connexion.css">';
include '../Base/header.php';
?>

<main>
    <form method="post" action="../PHP/connexion.php">
        <fieldset>
            <legend>Connexion</legend>
            <div class="container">
                <div class="row"><label class="col-6">Email</label>
                    <input type="text" class="col-6" placeholder="Entrez votre Login" id="login" name="login" required />
                </div>
                <div class="row"><label class="col-6">Mot de passe</label>
                    <input type="password" class="col-6" placeholder="Entrez votre Mot de Passe" id="mdp" name="mdp" minlength="8" required />
                </div>
            </div>
            </br>
            <input type="submit" value="Envoyer" id="envoyer" />
        </fieldset>
    </form>
    <a href="../connexion/mdp_oub.php">Mot de passe oublié ?</a>
</main>

<?php include '../Base/footer.php'; ?>