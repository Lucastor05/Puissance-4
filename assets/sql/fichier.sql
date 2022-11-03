
/*

mdpEntrezDansForm = mot de passe que l'utilisateur entrera dans le site (dans les inputs)
emailEntrez = email que l'utilisateur entrera dans le site (dans les inputs)

*/


/* Story 2 */

INSERT INTO `Utilisateur` (`Email`, `Mot_de_passe`, `Pseudo`, `Date_et_heure_inscription`) 
    VALUES ('mail@mail.fr', ';admin', 'admin', '2022-11-14');

/* Story 3 */

UPDATE Utilisateur
SET Mot_de_passe = 'nouveau mdp'
WHERE Identifiant =' id user'

UPDATE Utilisateur
SET Email = 'nv mail'
WHERE Identifiant = 'id user' AND Mot_de_passe = mdpEntrezDansForm

/* Story 4 */


SELECT *
FROM Utilisateur
WHERE emailEntrez = Email AND mdpEntrezDansForm = Mot_de_passe

/* Story 5 */

INSERT INTO `Jeu` (`Nom_du_jeu`)
    VALUES ('The Power Of Memory')

/* Story 6 */

SELECT Jeu.Nom_du_jeu, Utilisateur.Pseudo, Score.Difficulte_de_la_partie, Score.Score_de_la_partie
FROM Score
INNER JOIN Jeu ON Score.Identifiant_du_jeu = Jeu.Identifiant 
INNER JOIN Utilisateur ON Utilisateur.Identifiant = Score.Identifiant_du_joueur
ORDER BY Jeu.Nom_du_jeu ASC, Score.Difficulte_de_la_partie, Score.Score_de_la_partie


/* Story 7 */

SELECT Jeu.Nom_du_jeu, Utilisateur.Pseudo, Score.Difficulte_de_la_partie, Score.Score_de_la_partie
FROM Score
INNER JOIN Jeu ON Score.Identifiant_du_jeu = Jeu.Identifiant 
INNER JOIN Utilisateur ON Utilisateur.Identifiant = Score.Identifiant_du_joueur
WHERE Filtre = resultatVoulu
ORDER BY Jeu.Nom_du_jeu ASC, Score.Difficulte_de_la_partie, Score.Score_de_la_partie

/* Story 8 */

SELECT Score.Score_de_la_partie
FROM Score

/* Si existe */
UPDATE Score
SET Score_de_la_partie = 'nouveau score'
WHERE Identifiant =' id user'

/* Si existe pas */
INSERT INTO `Score` (`Score_de_la_partie`) 
    VALUES ('NouveauScore');

/* Story 9 */

INSERT INTO `Message` (`Identifiant`, `Identifiant_du_jeu`, `Identifiant_de_expéditeur`, `Message`, `Date_et_heure_du_message`) VALUES (NULL, '2', '3', 'Hello World', '2022-11-01');

/* Story 10 */