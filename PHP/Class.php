<?php

// #########################  Connexion ##########################

function ConnectBDD()
{
    try {
        $bddconnect = new PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'root', '');
        return $bddconnect;
    } catch (PDOException $e) {
        echo $e->getMessage() . "\n";
        die;
    }
}



if (@$_POST['GetProfile'] == true && isset($_POST['name'])) {
    $bdd  = ConnectBDD();

    $Nom = $_POST['name'];
    $reqt = "SELECT * FROM user WHERE id_auth = (SELECT id_auth FROM authentification WHERE login =" . $bdd->quote($Nom) . ")";
    $result = $bdd->query($reqt);
    $ProfileResult = $result->fetchAll();

    foreach ($ProfileResult as $Profile) {
        echo ("<p>" . $Profile['prenom'] . " / " . $Profile['nom'] . " / " . $Profile['email'] . " / " . $Profile['centre'] . "</p>");
    }
}


class LoginRepository
{
    private $_connexion; //PDO

    private function connexion()
    {
        try {
            $this->_connexion = new PDO('mysql:host=localhost;dbname=projet;port=3306;', 'root', '');
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    public function login($identifiant, $mdp)
    {
        $this->connexion();
        $stmt = $this->_connexion->prepare("SELECT * FROM authentification INNER JOIN user ON authentification.id_auth = user.id_auth INNER JOIN role ON role.ID_Role = user.ID_Role WHERE login= ? and mdp= ?");
        $stmt->bindValue(1, $identifiant, PDO::PARAM_STR);
        $stmt->bindValue(2, $mdp, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function loginCookie($iduser)
    {
        $this->connexion();
        $stmt = $this->_connexion->prepare("SELECT * FROM user WHERE id_user= ?");
        $stmt->bindValue(1, $iduser, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}

// ######################### Offre de stage ##########################
class Offre
{
    private $_connexion; //PDO

    private function connexion()
    {
        try {
            $this->_connexion = new PDO('mysql:host=localhost;dbname=projet;port=3306;', 'root', '');
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    public function getOffre($offset = 0)
    {
        $this->connexion();
        $utilisateur = $this->_connexion->query("SELECT * FROM offre_de_stage LIMIT $offset,10");
        return $utilisateur->fetchAll();
    }

    public function getOffrebyEntreprise($name)
    {
        $this->connexion();
        $utilisateur = $this->_connexion->query("SELECT * FROM `offre_de_stage` JOIN `fiche_entreprise` WHERE offre_de_stage.id_fiche = fiche_entreprise.id_fiche AND fiche_entreprise.Nom = '$name'");
        return $utilisateur->fetchAll();
    }

    public function getOffrebyID($id)
    {
        $this->connexion();
        $utilisateur = $this->_connexion->query("SELECT * FROM offre_de_stage WHERE id_Offre = $id");
        return $utilisateur->fetch();
    }

    public function compterOffre()
    {
        $this->connexion();
        $utilisateur = $this->_connexion->query('SELECT COUNT(*) AS nombre FROM offre_de_stage');
        $nombre = $utilisateur->fetch();
        return $nombre['nombre'];
    }

    public function getOffreLocalite()
    {
        $this->connexion();
        $utilisateur = $this->_connexion->query("SELECT DISTINCT localite FROM offre_de_stage");
        return $utilisateur->fetchAll();
    }

    public function getOffreCompetence()
    {
        $this->connexion();
        $utilisateur = $this->_connexion->query("SELECT DISTINCT competences FROM offre_de_stage");
        return $utilisateur->fetchAll();
    }

    public function addOffre($competence, $localite, $duree, $remuneration, $date_offre, $id_fiche)
    {
        $this->connexion();
        $stmt = $this->_connexion->prepare("INSERT INTO projet.offre_de_stage 
        (competences, localite, entreprise, duree, remuneration, id_fiche, date_offre) 
        VALUES (
            " . $this->_connexion->quote($competence) . ", 
        " . $this->_connexion->quote($localite) . ", 
        (SELECT Nom FROM `fiche_entreprise` WHERE id_fiche = " . $this->_connexion->quote($id_fiche) . "), 
        " . $this->_connexion->quote($duree) . ", 
        " . $this->_connexion->quote($remuneration) . ", 
        " . $this->_connexion->quote($id_fiche) . "
        , " . $this->_connexion->quote($date_offre) . ")");
        return $stmt->execute();
    }

    public function delOffre($id_offre)
    {
        $this->connexion();
        $stmt = $this->_connexion->prepare("SET @idOffre = ?;
        DELETE FROM `wishlist` WHERE `id_offre` = @idOffre ;
        DELETE FROM `offre_de_stage` WHERE `id_offre` = @idOffre ;");
        $stmt->bindValue(1, $id_offre, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function UpOffre()
    {
        $this->connexion();
        $utilisateur = $this->_connexion->query("");
        return $utilisateur->fetch();
    }

    public function FiltrageNom($nom)
    {
        $this->connexion();
        $stmt = $this->_connexion->prepare("SELECT * FROM `offre_de_stage` WHERE entreprise = ?");
        $query = $nom . '%';
        $stmt->bindValue(1, $query, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}


// ######################### Entreprise ##########################
class Entreprise
{
    private $_connexion; //PDO

    private function connexion()
    {
        try {
            $this->_connexion = new PDO('mysql:host=localhost;dbname=projet;port=3306;', 'root', '');
            $this->_connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    public function getEntreprise($offset = 0)
    {
        $this->connexion();
        $utilisateur = $this->_connexion->query("SELECT * FROM fiche_entreprise LIMIT $offset,10");
        return $utilisateur->fetchAll();
    }

    public function getEntrepriseSansLimite()
    {
        $this->connexion();
        $utilisateur = $this->_connexion->query("SELECT * FROM fiche_entreprise");
        return $utilisateur->fetchAll();
    }


    public function getEntreprisebyID($id)
    {
        $this->connexion();
        $utilisateur = $this->_connexion->query("SELECT * FROM fiche_entreprise WHERE id_fiche = $id");
        return $utilisateur->fetch();
    }

    public function compterEntreprise()
    {
        $this->connexion();
        $utilisateur = $this->_connexion->query('SELECT COUNT(*) AS nombre FROM fiche_entreprise');
        $nombre = $utilisateur->fetch();
        return $nombre['nombre'];
    }

    public function addEntreprise($nom, $secteur, $localite, $nbr_stagiaire, $evaluation, $confiance)
    {
        $this->connexion();
        $stmt = $this->_connexion->prepare("INSERT INTO projet.fiche_entreprise (Nom, Secteur_activite, Localite, Nb_stagiaire_cesi, evaluation_stagiaire, confiance_pilote) VALUES (?, ?, ?, ?, ?, ?);");
        $stmt->bindValue(1, $nom, PDO::PARAM_STR); //Nom
        $stmt->bindValue(2, $secteur, PDO::PARAM_STR); //Secteur_activite
        $stmt->bindValue(3, $localite, PDO::PARAM_STR); //Localite
        $stmt->bindValue(4, $nbr_stagiaire, PDO::PARAM_INT); //Nb_stagiaire_cesi
        $stmt->bindValue(5, $evaluation, PDO::PARAM_INT); //evaluation_stagiaire
        $stmt->bindValue(6, $confiance, PDO::PARAM_INT); //confiance_pilote
        return $stmt->execute();
    }

    public function delEntreprise($id_entreprise)
    {
        $this->connexion();
        var_dump($id_entreprise);
        $stmt = $this->_connexion->prepare("
        SET @IdEntreprise = (SELECT id_fiche FROM fiche_entreprise WHERE id_fiche = " . $this->_connexion->quote($id_entreprise) . ");
        DELETE FROM wishlist WHERE id_offre IN (SELECT id_offre FROM offre_de_stage WHERE id_fiche = @IdEntreprise);
        DELETE FROM offre_de_stage WHERE id_fiche = @IdEntreprise;
        DELETE FROM fiche_entreprise WHERE id_fiche = @IdEntreprise;");
        return $stmt->execute();
    }

    public function UpEntreprise($idfiche, $NewNom, $secteur, $localite, $nbr_stagiaire, $evaluation, $confiance)
    {
        $this->connexion();
        if (empty($NewNom) && empty($secteur) && empty($localite) && empty($nbr_stagiaire) && empty($evaluation) && empty($confiance)) {
            header('Location: ../update/update_entreprise.php');
        }

        $reqtpromo = "";

        if (empty($NewNom)) {
            $U_Nom = "";
            $NewNom = "";
        } else {
            $U_Nom = 'Nom =';
            $NewNom = $this->_connexion->quote($NewNom) . ',';
        }

        if (empty($secteur)) {
            $U_Secteur_activite = "";
            $secteur = "";
        } else {
            $U_Secteur_activite = 'Secteur_activite =';
            $secteur = $this->_connexion->quote($secteur) . ',';
        }

        if (empty($localite)) {
            $U_Localite = "";
            $localite = "";
        } else {
            $U_Localite = 'Localite =';
            $localite = $this->_connexion->quote($localite) . ',';
        }

        if (empty($nbr_stagiaire)) {
            $U_Nb_stagiaire_cesi = "";
            $nbr_stagiaire = "";
        } else {
            $U_Nb_stagiaire_cesi = 'Nb_stagiaire_cesi =';
            $nbr_stagiaire = $this->_connexion->quote($nbr_stagiaire) . ',';
        }

        if (empty($evaluation)) {
            $U_evaluation_stagiaire = "";
            $evaluation = "";
        } else {
            $U_evaluation_stagiaire = 'evaluation_stagiaire =';
            $evaluation = $this->_connexion->quote($evaluation) . ',';
        }

        if (empty($confiance)) {
            $U_confiance_pilote = "";
            $confiance = "";
        } else {
            $U_confiance_pilote = 'confiance_pilote =';
            $confiance = $this->_connexion->quote($confiance) . ',';
        }

        $stmt = $this->_connexion->prepare("SET @IdFiche = " . $this->_connexion->quote($idfiche) . ";

        UPDATE fiche_entreprise SET " . $U_Nom . " " . $NewNom . " " . $U_Secteur_activite . " " . $secteur . " 
        " . $U_Localite . " " . $localite . " " . $U_Nb_stagiaire_cesi . " " . $nbr_stagiaire . "
        " . $U_evaluation_stagiaire . " " . $evaluation . " " . $U_confiance_pilote . " " . $confiance . " id_fiche = @IdFiche 
        WHERE id_fiche = @IdFiche;
        
        UPDATE offre_de_stage SET 
        localite = (SELECT localite FROM fiche_entreprise WHERE id_fiche = @IdFiche), 
        entreprise = (SELECT Nom FROM fiche_entreprise WHERE id_fiche = @IdFiche) 
        WHERE id_fiche = @IdFiche;");
        var_dump($stmt);
        return $stmt->execute();
    }
}

// ######################### Eleve ##########################
class Eleve
{
    private $_connexion; //PDO

    private function connexion()
    {
        try {
            $this->_connexion = new PDO('mysql:host=localhost;dbname=projet;port=3306;', 'root', '');
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    public function getEleve($offset = 0)
    {
        $this->connexion();
        $utilisateur = $this->_connexion->query("SELECT eleve.id_eleve, eleve.Promotion,eleve.id_user, user.nom, user.prenom, user.email, user.centre FROM eleve INNER JOIN user ON eleve.id_user = user.id_user LIMIT $offset,10");
        return $utilisateur->fetchAll();
    }

    public function getElevebyID($id)
    {
        $this->connexion();
        $utilisateur = $this->_connexion->query("SELECT * FROM user WHERE id_user = $id");
        return $utilisateur->fetch();
    }

    public function compterEleve()
    {
        $this->connexion();
        $utilisateur = $this->_connexion->query('SELECT COUNT(*) AS nombre FROM eleve');
        $nombre = $utilisateur->fetch();
        return $nombre['nombre'];
    }

    public function addEleve($identifiant, $mdp, $nom, $prenom, $email, $centre, $ID_Role, $promotion)
    {
        $this->connexion();
        $stmt = $this->_connexion->prepare('INSERT INTO projet.authentification (login, mdp) VALUES (
            ' . $this->_connexion->quote($identifiant) . ', 
            ' . $this->_connexion->quote($mdp) . '); 
            INSERT INTO projet.user (nom, prenom, email, centre, ID_Role, id_auth) VALUES (
                ' . $this->_connexion->quote($nom) . ', 
                ' . $this->_connexion->quote($prenom) . ', 
                ' . $this->_connexion->quote($email) . ', 
                ' . $this->_connexion->quote($centre) . ', 
                ' . $this->_connexion->quote($ID_Role) . ', 
                (SELECT id_auth FROM authentification WHERE login = 
                ' . $this->_connexion->quote($identifiant) . '
            )); INSERT INTO projet.eleve(promotion, id_user) VALUES (
                ' . $this->_connexion->quote($promotion) . '
                , (SELECT id_user FROM user WHERE email = 
                ' . $this->_connexion->quote($email) . '));');
        return $stmt->execute();
    }

    public function delEleve($identifiant)
    {
        $this->connexion();
        $stmt = $this->_connexion->prepare('SET @IdAuth = (SELECT id_auth FROM user 
        WHERE id_user = ' . $this->_connexion->quote($identifiant) . ');
        SET @IdUti = (SELECT id_user FROM user WHERE id_auth = @IdAuth);
        SET @idEtu =(SELECT id_eleve FROM eleve WHERE id_user = @IdUti);
        
        DELETE FROM wishlist  WHERE id_eleve = @idEtu;
        DELETE FROM cadidature WHERE id_eleve = @idEtu;
        
        DELETE FROM eleve WHERE id_eleve = @idEtu;
        DELETE FROM user WHERE id_user = @IdUti;
        DELETE FROM authentification WHERE id_auth = @IdAuth;');
        return $stmt->execute();
    }

    public function UpEleve($identifiant, $nom, $prenom, $email, $centre, $ID_Role, $promotion)
    {
        $this->connexion();
        if (empty($prenom) && empty($nom) && empty($Promotion) && empty($centre) && empty($email)) {
            header('Location: ../update/update_profil.php');
        }

        $reqtpromo = "";

        if (empty($prenom)) {
            $U_Prenom = "";
            $prenom = "";
        } else {
            $U_Prenom = 'prenom =';
            $prenom = $this->_connexion->quote($prenom) . ',';
        }

        if (empty($nom)) {
            $U_Nom = "";
            $nom = "";
        } else {
            $U_Nom = 'nom =';
            $nom = $this->_connexion->quote($nom) . ',';
        }

        if (empty($promotion)) {
            $reqtpromo = "";
            $U_Email = "";
            $promotion = "";
        } else {
            $promotion = $this->_connexion->quote($promotion);
            $reqtpromo = "UPDATE eleve SET Promotion = " . $promotion . " WHERE id_user = @idUser;";
        }

        if (empty($centre)) {
            $U_centre = "";
            $centre = "";
        } else {
            $U_centre = 'centre =';
            $centre = $this->_connexion->quote($centre) . ',';
        }

        if (empty($email)) {
            $U_Email = "";
            $email = "";
        } else {
            $U_Email = 'email =';
            $email = $this->_connexion->quote($email) . ',';
        }


        $utilisateur = $this->_connexion->query("
        SET @IdAuth = (SELECT id_auth FROM authentification 
        WHERE login = " . $this->_connexion->quote($identifiant) . ");
        SET @idUser = (SELECT id_user FROM user WHERE id_auth = @IdAuth);

        " . $reqtpromo . "

        UPDATE user SET " . $U_Nom . " " . $nom . " " . $U_Prenom . " " . $prenom . " 
        " . $U_Email . " " . $email . " " . $U_centre . " " . $centre . " id_user = @idUser
        WHERE id_user = @idUser and ID_Role = " . $ID_Role . ";");

        return $utilisateur->fetch();
    }

    public function InfoEleve()
    {
        $this->connexion();
        $utilisateur = $this->_connexion->query("");
        return $utilisateur->fetch();
    }
}

// ######################### Delegue ##########################
class Delegue
{
    private $_connexion; //PDO

    private function connexion()
    {
        try {
            $this->_connexion = new PDO('mysql:host=localhost;dbname=projet;port=3306;', 'root', '');
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    public function getDelegue($offset = 0)
    {
        $this->connexion();
        $utilisateur = $this->_connexion->query("SELECT * FROM user where id_ROLE = 3 LIMIT $offset,10");
        return $utilisateur->fetchAll();
    }

    public function getDeleguebyID($id)
    {
        $this->connexion();
        $utilisateur = $this->_connexion->query("SELECT * FROM user WHERE id_user = $id");
        return $utilisateur->fetch();
    }

    public function compterDelegue()
    {
        $this->connexion();
        $utilisateur = $this->_connexion->query('SELECT COUNT(*) AS nombre FROM eleve');
        $nombre = $utilisateur->fetch();
        return $nombre['nombre'];
    }

    public function addDelegue($identifiant, $mdp, $nom, $prenom, $email, $centre, $ID_Role)
    {
        $this->connexion();
        $stmt = $this->_connexion->prepare('INSERT INTO projet.authentification (login, mdp) VALUES (
            ' . $this->_connexion->quote($identifiant) . ', 
            ' . $this->_connexion->quote($mdp) . '); 
            INSERT INTO projet.user (nom, prenom, email, centre, ID_Role, id_auth) VALUES (
                ' . $this->_connexion->quote($nom) . ', 
                ' . $this->_connexion->quote($prenom) . ', 
                ' . $this->_connexion->quote($email) . ', 
                ' . $this->_connexion->quote($centre) . ', 
                ' . $this->_connexion->quote($ID_Role) . ', 
                (SELECT id_auth FROM authentification WHERE login = 
                ' . $this->_connexion->quote($identifiant) . '));');

        return $stmt->execute();
    }

    public function delDelegue($identifiant)
    {
        $this->connexion();
        $stmt = $this->_connexion->prepare('
        SET @IdAuth = (SELECT id_auth FROM user 
        WHERE id_user = ' . $this->_connexion->quote($identifiant) . ');
        SET @IdUti = (SELECT id_user FROM user WHERE id_auth = @IdAuth);
        
        DELETE FROM user WHERE id_user = @IdUti AND ID_Role = 3;
        DELETE FROM authentification WHERE id_auth = @IdAuth;');
        return $stmt->execute();
    }

    public function UpDelegue($identifiant, $nom, $prenom, $email, $centre, $ID_Role)
    {
        $this->connexion();
        if (empty($prenom) && empty($nom) && empty($centre) && empty($email)) {
            header('Location: ../update/update_profil.php');
        }

        if (empty($prenom)) {
            $U_Prenom = "";
            $prenom = "";
        } else {
            $U_Prenom = 'prenom =';
            $prenom = $this->_connexion->quote($prenom) . ',';
        }

        if (empty($nom)) {
            $U_Nom = "";
            $nom = "";
        } else {
            $U_Nom = 'nom =';
            $nom = $this->_connexion->quote($nom) . ',';
        }

        if (empty($centre)) {
            $U_centre = "";
            $centre = "";
        } else {
            $U_centre = 'centre =';
            $centre = $this->_connexion->quote($centre) . ',';
        }

        if (empty($email)) {
            $U_Email = "";
            $email = "";
        } else {
            $U_Email = 'email =';
            $email = $this->_connexion->quote($email) . ',';
        }


        $utilisateur = $this->_connexion->query("
        SET @IdAuth = (SELECT id_auth FROM authentification 
        WHERE login = " . $this->_connexion->quote($identifiant) . ");
        SET @idUser = (SELECT id_user FROM user WHERE id_auth = @IdAuth);

        UPDATE user SET " . $U_Nom . " " . $nom . " " . $U_Prenom . " " . $prenom . " 
        " . $U_Email . " " . $email . " " . $U_centre . " " . $centre . " id_user = @idUser
        WHERE id_user = @idUser and ID_Role = " . $ID_Role . ";");

        return $utilisateur->fetch();
    }
}

// ######################### Pilote ##########################
class Pilote
{
    private $_connexion; //PDO

    private function connexion()
    {
        try {
            $this->_connexion = new PDO('mysql:host=localhost;dbname=projet;port=3306;', 'root', '');
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    public function getPilote($offset = 0)
    {
        $this->connexion();
        $utilisateur = $this->_connexion->query("SELECT pilote.id_pilote, pilote.promotion_assignees,pilote.id_user, user.nom, user.prenom, user.email, user.centre FROM pilote INNER JOIN user ON pilote.id_user = user.id_user LIMIT $offset,10");
        return $utilisateur->fetchAll();
    }

    public function getPilotebyID($id)
    {
        $this->connexion();
        $utilisateur = $this->_connexion->query("SELECT * FROM user WHERE id_user = $id");
        return $utilisateur->fetch();
    }

    public function compterPilote()
    {
        $this->connexion();
        $utilisateur = $this->_connexion->query('SELECT COUNT(*) AS nombre FROM pilote');
        $nombre = $utilisateur->fetch();
        return $nombre['nombre'];
    }

    public function addPilote($identifiant, $mdp, $nom, $prenom, $email, $centre, $ID_Role, $promotion_assignees)
    {
        $this->connexion();
        $stmt = $this->_connexion->prepare('INSERT INTO projet.authentification (login, mdp) VALUES (
            ' . $this->_connexion->quote($identifiant) . ', 
            ' . $this->_connexion->quote($mdp) . '); 
            INSERT INTO projet.user (nom, prenom, email, centre, ID_Role, id_auth) VALUES (
                ' . $this->_connexion->quote($nom) . ', 
                ' . $this->_connexion->quote($prenom) . ', 
                ' . $this->_connexion->quote($email) . ', 
                ' . $this->_connexion->quote($centre) . ', 
                ' . $this->_connexion->quote($ID_Role) . ', 
                (SELECT id_auth FROM authentification WHERE login = 
                ' . $this->_connexion->quote($identifiant) . '
            )); INSERT INTO projet.pilote (promotion_assignees, id_user) VALUES (
                ' . $this->_connexion->quote($promotion_assignees) . '
                , (SELECT id_user FROM user WHERE email = 
                ' . $this->_connexion->quote($email) . '));');

        return $stmt->execute();
    }

    public function getOffrebyComp($competence)
    {
        $this->connexion();
        $stmt = $this->_connexion->prepare("SELECT * FROM offre_de_stage WHERE competences LIKE ?");
        $query = $competence . '%';
        $stmt->bindValue(1, $query, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function delPilote($identifiant)
    {
        $this->connexion();
        $stmt = $this->_connexion->prepare('SET @IdAuth = (SELECT id_auth FROM user 
        WHERE id_user = ' . $this->_connexion->quote($identifiant) . ');
        SET @IdUti = (SELECT id_user FROM user WHERE id_auth = @IdAuth);
        SET @idProf =(SELECT id_pilote FROM pilote WHERE id_user = @IdUti);
        
        DELETE FROM pilote WHERE id_pilote = @idProf;
        DELETE FROM user WHERE id_user = @IdUti;
        DELETE FROM authentification WHERE id_auth = @IdAuth;');
        return $stmt->execute();
    }

    public function UpPilote($identifiant, $nom, $prenom, $email, $centre, $ID_Role, $promotion)
    {
        $this->connexion();
        if (empty($prenom) && empty($nom) && empty($Promotion) && empty($centre) && empty($email)) {
            header('Location: ../update/update_profil.php');
        }

        $reqtpromo = "";

        if (empty($prenom)) {
            $U_Prenom = "";
            $prenom = "";
        } else {
            $U_Prenom = 'prenom =';
            $prenom = $this->_connexion->quote($prenom) . ',';
        }

        if (empty($nom)) {
            $U_Nom = "";
            $nom = "";
        } else {
            $U_Nom = 'nom =';
            $nom = $this->_connexion->quote($nom) . ',';
        }

        if (empty($promotion)) {
            $reqtpromo = "";
            $U_Email = "";
            $promotion = "";
        } else {
            $promotion = $this->_connexion->quote($promotion);
            $reqtpromo = "UPDATE pilote SET promotion_assignees = " . $promotion . " WHERE id_user = @idUser;";
        }

        if (empty($centre)) {
            $U_centre = "";
            $centre = "";
        } else {
            $U_centre = 'centre =';
            $centre = $this->_connexion->quote($centre) . ',';
        }

        if (empty($email)) {
            $U_Email = "";
            $email = "";
        } else {
            $U_Email = 'email =';
            $email = $this->_connexion->quote($email) . ',';
        }

        $utilisateur = $this->_connexion->query("
        SET @IdAuth = (SELECT id_auth FROM authentification 
        WHERE login = " . $this->_connexion->quote($identifiant) . ");
        SET @idUser = (SELECT id_user FROM user WHERE id_auth = @IdAuth);

        " . $reqtpromo . "

        UPDATE user SET " . $U_Nom . " " . $nom . " " . $U_Prenom . " " . $prenom . " 
        " . $U_Email . " " . $email . " " . $U_centre . " " . $centre . " id_user = @idUser
        WHERE id_user = @idUser and ID_Role = " . $ID_Role . ";");

        return $utilisateur->fetch();
    }
}

// ######################### Recherche ##########################
class Recherche
{
    private $_connexion; //PDO

    private function connexion()
    {
        try {
            $this->_connexion = new PDO('mysql:host=localhost;dbname=projet;port=3306;', 'root', '');
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    public function getElevebyName($name)
    {
        $this->connexion();
        $stmt = $this->_connexion->prepare("SELECT * FROM user WHERE prenom LIKE ? and id_role=4");
        $query = $name . '%';
        $stmt->bindValue(1, $query, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getDeleguebyName($name)
    {
        $this->connexion();
        $stmt = $this->_connexion->prepare("SELECT * FROM user WHERE prenom LIKE ? and id_role=3");
        $query = $name . '%';
        $stmt->bindValue(1, $query, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getPilotebyName($name)
    {
        $this->connexion();
        $stmt = $this->_connexion->prepare("SELECT * FROM user WHERE prenom LIKE ? and id_role=2");
        $query = $name . '%';
        $stmt->bindValue(1, $query, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getEntreprisebyName($name)
    {
        $this->connexion();
        $stmt = $this->_connexion->prepare("SELECT * FROM fiche_entreprise WHERE nom LIKE ?");
        $query = $name . '%';
        $stmt->bindValue(1, $query, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getOffrebyComp($competence)
    {
        $this->connexion();
        $stmt = $this->_connexion->prepare("SELECT * FROM offre_de_stage WHERE competences LIKE ?");
        $query = $competence . '%';
        $stmt->bindValue(1, $query, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}

// ######################### Wish liste ##########################
class WishListe
{
    private $_connexion; //PDO

    private function connexion()
    {
        try {
            $this->_connexion = new PDO('mysql:host=localhost;dbname=projet;port=3306;', 'root', '');
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    public function getWishListe($identifiant)
    {
        $this->connexion();

        // $utilisateur = $this->_connexion->query(
        //     "SELECT * FROM offre_de_stage 
        //     INNER JOIN wishlist 
        //     ON wishlist.id_offre = offre_de_stage.id_offre 
        //     WHERE id_eleve = (SELECT id_eleve FROM eleve WHERE id_user = $identifiant)"
        // );

        // return $utilisateur->fetchAll();

        $reqt = "SELECT * FROM offre_de_stage 
        INNER JOIN wishlist 
        ON wishlist.id_offre = offre_de_stage.id_offre 
        WHERE id_eleve = (SELECT id_eleve FROM eleve WHERE id_user = $identifiant)";

        $result = $this->_connexion->query($reqt);
        $VerifWish = $result->fetchall();

        if ($VerifWish != false) {
            return $VerifWish;
        } else if ($VerifWish == false) {
            return false;
        }
    }


    public function ifexist($identifiant, $idoffre)
    {
        $this->connexion();

        $reqt = "SELECT * FROM wishlist WHERE id_eleve = (SELECT id_eleve FROM eleve WHERE id_user = $identifiant) AND id_offre = $idoffre;";

        $result = $this->_connexion->query($reqt);
        $VerifWish = $result->fetch(PDO::FETCH_ASSOC);

        if ($VerifWish != false) {
            return true;
        } else if ($VerifWish == false) {
            return false;
        }
    }

    public function AddWishListe($identifiant, $idoffre)
    {
        $this->connexion();

        $ifexist = $this->ifexist($identifiant, $idoffre);

        if ($ifexist == false) {
            $stmt = $this->_connexion->prepare("INSERT INTO wishlist (id_eleve, id_offre) 
            VALUES ((SELECT id_eleve FROM eleve WHERE id_user = $identifiant), $idoffre);");

            echo ('Offre ajout??e ?? votre wishlist');
            return $stmt->execute();
        } else {
            echo ('Offre d??ja dans votre wishlist');
        }
    }

    public function delWishListe($identifiant, $idoffre)
    {
        $this->connexion();

        $ifexist = $this->ifexist($identifiant, $idoffre);

        if ($ifexist != false) {

            $stmt = $this->_connexion->prepare("DELETE FROM wishlist WHERE id_eleve = 
            (SELECT id_eleve FROM eleve WHERE id_user = $identifiant) AND id_offre = $idoffre;");

            echo ('Offre supprim??e de votre wishlist');
            return $stmt->execute();
        } else {
            echo ('Cette offre n\'est pas dans votre Wishlist');
        }
    }
}
