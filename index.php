<?php

require 'assets/include/database.inc.php';

/*number of rows utilisateur/pseudo
who's connected? last connection
time record, scores ???
games played ????*/

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/header.css">
    <link rel="stylesheet" href="assets/css/footer.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <title>Accueil</title>
</head>
<body>

<<<<<<< HEAD
    <!--Barre de navigation avec les different lien vers les autres pages-->
    <nav class="topnavAbsolute">
        <a href="memory.php" class="nomSite">The Tower Of Mermory</a>
        <div>
            <!--Different lien vers les pages-->
            <a href="index.php" class="active">ACCUEIL</a><!--Class active represente la page sur laquelle on est dans la barre de navigation donc si dans autre page que main a change de plavce@-->
            <a href="memory.php">JEU</a>
            <a href="scores.php">SCORES</a>
            <a href="contact.php">NOUS CONTACTER</a>
            <a href="myaccount.php">MON ESPACE</a>
        </div>
    </nav>
=======
    <?php
    require 'view/header.inc.php';
    include 'init_session.php';
    include 'assets/includes/database.inc.php'


    ?>


    

    
>>>>>>> Lucas
        
    <!--Titre de la pages avec sous titre et lien vers le jeu-->
    <header class="headIndex">
        <h1 class="TitreAccueilIndex">BIENVENUE DANS <br>NOTRE STUDIO !</h1> 
        <h2 class="TitreSecondaireAccueilIndex">Venez challenger les cerveaux les plus agiles !</h2>
        <button class="boutonPlayIndex" type="button" onclick="window.location.href='memory.php'">JOUEZ !</button>
    </header>    

    <!--Début du main de la page-->
    <main class="corpPincipalIndex">
        <!--Corp du site, Zone principal de la page Accueil-->
        <table align="center" class="tableauImgIndex">
            <!--Tableau Avec les trois images comme sur la maquettes-->
            <tr>
                <td colspan="2"><img src="assets/Images/computer.jpg" class="computerIndex"></td>
                <td class="spaceBetweenImageIndex"></td>
                <td><img src="assets/Images/1667419498616.jpg" class="bycicleIndex"></td>
                <td class="spaceBetweenImageIndex"></td>
                <td><img src="assets/Images/poker.jpg" class="pokerIndex"></td>
                <td class="spaceBetweenImageIndex"></td>
            </tr>
        </table>


        <table class="tableauPIndex" align="center">
            <!--Tableau avec les differents paragraphes a complété-->
            <tr>
                <td class="NumeroTabIndex">01</td>
                <td class="AlignLeftTitreIndex">Sur quel appareil ?</td>
                <td class="NumeroTabIndex">02</td>
                <td class="AlignLeftTitreIndex">C'est quoi ?</td>
                <td class="NumeroTabIndex">03</td>
                <td class="AlignLeftTitreIndex">Quels sont les règles ?</td>
            </tr>
            <tr class="AlignLeftIndex">
                <td></td>
                <td>Bien que le jeu Memory soit initialement un jeu de société, ici, vous pouvez y jouez gratuitement sur tout vos appareil !</td>
                <td></td>
                <td>The Power Of Memory est un jeu qui mélange hasard et déduction, idéal pour faire travailler la mémoire tout en s’amusant !</td>
                <td></td>
                <td>Le joueur retourne deux cartes. Si les images sont identiques, il gagne la paire constituée et rejoue. Si les images sont différentes, elles reprennent leur place initial face cachée. La partie est terminée lorsque toutes les cartes ont été assemblées par paires.</td>
            </tr>
        </table>


        <!--Informations serveur et joueurs-->
        <div class="contentPictureIndex">
            <div class="flex-parentPictureIndex">
                <div>
                    <div>
                        <p><img src="assets/Images/WatchDogs2.jpeg" class="Watchdogs2Index"></p>
                    </div>
                </div>
                <div class="Parti2Index">
                    <div class="SousParti1Index">
                        <div class="cellule2Index">
                            <p><strong class="nombreTableauIndex">360</strong><br>Parties jouées</p>
                        </div>
                        <div class="cellule3Index">
                            <p><strong class="nombreTableauIndex">1020</strong><br>Joueurs connéctés</p>
                        </div>
                    </div>
                    <div class="SousParti2Index">
                        <div class="cellule4Index">
                            <p><strong class="nombreTableauIndex">10 sec</strong><br>Temps Record</p>
                        </div>
                        <div class="cellule5Index">
                            <p><strong class="nombreTableauIndex">21 300</strong><br>Joueurs Inscrits</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <!--Debut de la section dedier a la presentation de l'equipe-->
        <h2 class="notreEquipeh2Index">Notre equipe</h2>
        <h3>Lorem ipsum dolor sit amet consectetur adipisicing elit.</h3>
            
        <div class="contentIndex">
            <div class="flex-parentIndex">
                <div class="profilIndex">
                    <p><img src="assets/Images/profil-Matheo.jpg" class="photoProfilIndex"></p>
                    <p class="profilGrasIndex">Mathéo</p>
                    <p>Developer</p>
                </div>
                <div class="profilIndex">
                    <p><img src="assets/Images/profil-zineb.jpg" class="photoProfilIndex"></p>
                    <p class="profilGrasIndex">Zineb</p>
                    <p>Developer</p>
                </div>
                <div class="profilIndex">
                    <p><img src="assets/Images/photo_Lucas.jpg" class="photoProfilIndex"></p>
                    <p class="profilGrasIndex">Lucas</p>
                    <p>Developer</p>
                </div>
            </div>
        </div>
    </main>

    <?php
    require_once 'view/footer.inc.php';
    ?>
</body>
</html>