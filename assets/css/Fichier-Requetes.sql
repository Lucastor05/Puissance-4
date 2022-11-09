Requete1:
CREATE DATABASE ma_base

CREATE TABLE 'Utilisateur'
(
    'Identifiant'int(11)NOT NULL,
    'Email'varchar(255)NOT NULL,
    'Mot_de_passe'varchar(255)NOT NULL,
    'Pseudo'varchar(255)NOT NULL,
    'Date_et_heure_d_inscription'date NOT NULL,
    'Date_et_heure_de_la_dernière_connexion'date NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE 'Score'
(
    'Identifiant'int(11)NOT NULL,
    'Identifiant_du_joueur'int(11)NOT NULL,
    'Identifiant_du_jeu'int(11)NOT NULL,
    'Difficulte_de_la_partie'varchar(255)NOT NULL,
    'Score_de_la_partie'int(11)NOT NULL,
    'Date_et_heure_de_la_partie'date NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE 'Jeu'
(
    'Email'varchar(255)NOT NULL,
    'Mot_de_passe'int(11)NOT NULL,
    'Pseudo'varchar(255)NOT NULL,
    'Date_et_heure_d_inscription'date NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE 'Message'
(
    'Identifiant'int(11)NOT NULL,
    'Identifiant_du_jeu'int(11)NOT NULL,
    'Identifiant_de_expéditeur'int(11)NOT NULL,
    'Message'text NOT NULL,
    'Date_et_heure_du_message'date NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8;
-----------------------------------------------------------------------------------------------------------
ALTER TABLE 'Jeu'
    ADD PRIMARY KEY ('Identifiant');

ALTER TABLE 'Utilisateur'
    ADD PRIMARY KEY ('Identifiant');

ALTER TABLE 'Message'
    ADD PRIMARY KEY ('Identifiant')
    ADD KEY 'Message_id_jeu' ('Identifiant_du_jeu')
    ADD KEY `Identifiant_de_expéditeur` (`Identifiant_de_expéditeur`);

ALTER TABLE 'Score'
    ADD PRIMARY KEY (`Identifiant`),
    ADD KEY `Jeu_id` (`Identifiant_du_jeu`),
    ADD KEY `User_id` (`Identifiant_du_joueur`);

  ---------------------------------------------------------------------------------------------------------------

  ALTER TABLE 'Jeu'
    MODIFY 'Identifiant' int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE 'Message'
    MODIFY 'Identifiant' int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE 'Score'
    MODIFY 'Identifiant' int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE 'Utilisateur'
    MODIFY 'Identifiant' int(11) NOT NULL AUTO_INCREMENT;

----------------------------------------------------------------------------------------------------------------------
ALTER TABLE 'Message'
    ADD CONSTRAINT `Message_id_jeu1` FOREIGN KEY (`Identifiant_du_jeu`) REFERENCES `Jeu` (`Identifiant`),
    ADD CONSTRAINT `Message_id_jeu2` FOREIGN KEY (`Identifiant_de_expéditeur`) REFERENCES `Jeu` (`Identifiant`);

ALTER TABLE `Score`
  ADD CONSTRAINT `Score1` FOREIGN KEY (`Identifiant_du_jeu`) REFERENCES `Jeu` (`Identifiant`),
  ADD CONSTRAINT `Score2` FOREIGN KEY (`Identifiant_du_joueur`) REFERENCES `Utilisateur` (`Identifiant`);
COMMIT;

Requete2:
INSERT INTO `Utilisateur` (`Identifiant`, `Email`, `Mot_de_passe`, `Pseudo`, `Date_et_heure_inscription`, `Date_et_heure_de_la_derniere_connexion`) 
VALUES (NULL, 'Requete2@gmail.com', 'Requeterisation2.0', 'Requeteur2', '2022-11-23', '2022-11-30');

Requete3:

--1-- 
UPDATE `Utilisateur` SET `Mot_de_passe` = 'RcsfsegtTDGRgrDGVBSR5765GTR' WHERE `Utilisateur`.`Identifiant` = 1;

--2--

UPDATE `Utilisateur` SET `Email` = 'Requete3@gmail.com' WHERE `Identifiant` = 1 AND 'Mot_de_passe' = 'RcsfsegtTDGRgrDGVBSR5765GTR';

Requete4:

SELECT * FROM `Utilisateur` WHERE email = Email AND mot_de_passe = Mot_de_passe;

Requete5:

INSERT INTO `Jeu` (`Identifiant`, `Nom_du_jeu`) VALUES (NULL, 'The Power Of Memory');

Requete6:

SELECT Jeu.Nom_du_jeu, Utilisateur.Pseudo, Score.Difficulte_de_la_partie, Score.Score_de_la_partie
FROM Score
INNER JOIN Jeu 
ON Score.Identifiant_du_jeu = Jeu.Identifiant JOIN Utilisateur
ON Utilisateur.Pseudo = Score.Identifiant_du_joueur
ORDER BY Jeu.Nom_du_jeu, Score.Difficulte_de_la_partie, Score.Score_de_la_partie

Requete7:

SELECT Jeu.Nom_du_jeu, Utilisateur.Pseudo, Score.Difficulte_de_la_partie, Score.Score_de_la_partie
FROM Score
INNER JOIN Jeu ON Score.Identifiant_du_jeu = Jeu.Identifiant 
INNER JOIN Utilisateur ON Utilisateur.Identifiant = Score.Identifiant_du_joueur
WHERE Jeu.Nom_du_jeu=jeuSelectionner, Utilisateur.Pseudo=joueurSelectionner, Score.Difficulte_de_la_partie=difficulterSelectionner
ORDER BY Jeu.Nom_du_jeu ASC, Score.Difficulte_de_la_partie, Score.Score_de_la_partie;

Requete8:

UPDATE `Score` 
SET Score.Score_de_la_partie = Score.Score_de_la_partie 
WHERE ancienScoreDuJeu = Score.Score_de_la_partie AND ancienneDifficulté = Score.Difficulte_de_la_partie;

Requete 9:

INSERT INTO `Message` (`Identifiant`, `Identifiant_du_jeu`, `Identifiant_de_expéditeur`, `Message`, `Date_et_heure_du_message`) 
VALUES ('1', '1', '1', 'dbcksdfvbsdbvesfuvbseuvbue', '2022-11-30');

Requete10:




