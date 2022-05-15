#################### Offre de stage ######################

-- Update : 
UPDATE offre_de_stage SET competences = '?', localite = '?', entreprise = '?', duree = '?', remuneration = '?', date_offre = '?', id_fiche = '?' WHERE id_offre = $id

#################### Entreprise ######################

-- Update : 
UPDATE fiche_entreprise SET Nom = '?', Secteur_activite = '?', Localite = '?', Nb_stagiaire_cesi = '?', evaluation_stagiaire = '?', confiance_pilote = '?' WHERE id_fiche = $id

#################### Eleve ######################

-- Create :

-- Delete : 
DELETE FROM eleve WHERE id_eleve = ?; DELETE FROM user WHERE id_user = ?; DELETE FROM authentification WHERE id_auth = ?

-- Update : 
UPDATE eleve SET nom = '?', prenom = '?', email = '?', centre = '?' WHERE id_user = $id

#################### Pilote ######################

-- Create : 
INSERT INTO authentification (login, mdp) VALUES (?, ?); INSERT INTO user (nom, prenom, email, centre, ID_Role, id_auth) VALUES (?, ?, ?, ?, ?, ?); INSERT INTO pilote (promotion_assignees, id_user) VALUES (?, ?);

-- Delete : 
DELETE FROM pilote WHERE id_user = ?; DELETE FROM user WHERE id_user = ?; DELETE FROM authentification WHERE id_auth = ?

-- Update : 
UPDATE pilote SET nom = '?', prenom = '?', email = '?', centre = '?' WHERE id_user = $id

#################### Barre de filtrage ######################

-- Update Nom : 

-- Update compétence : 

-- Update localité : 

-- Update durée : 

-- Update rémunération : 

#################### Wish Liste ######################

-- Create :

-- Read :

-- Delete :

#################### Offre crée par l_entreprise ######################

-- Read : 
SELECT * FROM `offre_de_stage` JOIN `fiche_entreprise` WHERE offre_de_stage.id_fiche = fiche_entreprise.id_fiche AND fiche_entreprise.Nom = '$name'

#################### Offre postulé par l_eleve ######################

-- Read : 

#################### Avancement eleve ######################

-- Read ou Update : 

-- Read ou Update : 

-- Read ou Update : 

-- Read ou Update : 

-- Read ou Update : 

-- Read ou Update : 