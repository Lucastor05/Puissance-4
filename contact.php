<?php
include 'assets/includes/database.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Des Contactes</title>
    <link rel="stylesheet" href="assets/css/header.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/footer.css">
</head>
<body>
    <nav class="topnavAbsolute">
        <a href="memory.php" class="nomSite">The Tower Of Mermory</a>
        <div>
            <!--Different lien vers les pages-->
            <a href="index.php">ACCUEIL</a>
            <a href="memory.php">JEU</a>
            <a href="scores.php">SCORES</a>
            <a href="contact.php" class="active">NOUS CONTACTER</a>
            <a href ="myaccount.php">MON ESPACE</a>
        </div>
    </nav>
    <!--Le id sert pour le css et surtout pour mettre une ipmage de fond derriere le h1-->
    <header id="HeadContact-contact">
        <H1>NOUS CONTACTER</H1>
    </header>
    <main class="main-contact">
        <!--Différents Moyens de contact pour téhoriquement nous contacter-->
            <div class="flex-parentIndex-contact">
                <div class="ContactIndex-contact">
                    <p align="center"><img src="assets/Images/telephone.svg" class="LogoContacterIndex-contact"></p><br>
                    <p align="center">08 95 90 09 50</p>
                    <p align="center">ma reconnaissance éternel au mec qui appel mdr</p> 
                </div>
                <div class="ContactIndex-contact">
                    <p align="center"><img src="assets/Images/email.svg" class="LogoContacterIndex-contact"></p><br>
                    <p align="center">donnemoiunebonnenotejemerite@gmail.com</p>
                    <p align="center">(cette adresse mail existe vraiment mdr)</p>
                </div>
                <div class="ContactIndex-contact">
                    <p align="center"><img src="assets/Images/map.svg" class="LogoContacterIndex-contact"></p><br>
                    <p align="center">8 Rue la Chèvre Qui Danse45000 Orléans</p>
                </div>
            </div>

            <!--Formulaire d'envoye de message de la page de contact-->
        <form action="" method="post" align="center" class="formulaire-contact"> 
            <label for="nom"></label>
            <input type="text" id="Nom" name="Nom" placeholder ="Nom" required class="NomContact-contact">
            <label for="Email"></label>
            <input type="text" id="email" name="email" placeholder="Email" required  class="EmailContact-contact">
            <label for="Sujet"></label><br>
            <input type="text" id="Sujet" name="Sujet" placeholder ="Sujet" required>
            <label for="Message"></label><br>
            <input type="text" id="Message" name="Message" placeholder ="Message" required class="MessageContact-contact"><br>
            <button name="EnvoieDeFormulaireDeContactButton" type="submit" value="HTML" class="EnvoieDeFormulaireDeContactButton-contact">Envoyer</button>
        </form>
        <?php

        $erreur = false;


		if (isset($_POST['EnvoieDeFormulaireDeContactButton'])) {
            //filtre de mail pour qu'il soit correct
			if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
                $Email = $_POST['email'];
            }else{
                $erreur = true;
                $erreur='Email invalide';

            }
            //filtre de nom pour que le champ 'nom' ne soit pas vides pendant l'envoie de formulaire
            if (empty($_POST['Nom'])){
                $erreur = true;
                $erreur="le champ Nom n'est pas rempli";
            }else{
                $Nom = $_POST['Nom'];
            }
            //filtre de sujet pour que le champ 'sujet' ne soit pas vides pendant l'envoie de formulaire
            if (empty($_POST['Sujet'])){
                $Sujet = $_POST['Sujet'];
            }else{
                $erreur = true;
                $erreur="le champ Sujet n'est pas rempli";
            }
            //filtre de message pour que le champ 'message' fasse + de 15 caracteres pendant l'envoie de formulaire

            $Cmdplength = strlen($_POST['Message']);
            if($Cmdplength >= 15){
                $Message = $_POST['Message'];
            }else{
                $erreur = true;
                $erreur = "Votre Message doit contenir 15 caractères minimum.";
            }

            if(!$erreur){
                $retour=mail('donnemoiunebonnenotejemerite@gmail.com', $Sujet, $Message, $Email);
                if($retour){
                    echo'Votre message a bien ete envoyer';
                }
                header('Location: login.php');
                exit;   
            }
        }

        ?>

    </main>


    <footer> 
        <div class="contentFooter">
            <div class="flex-parentFooter">
                <div class="informationFooter">
                    <h2 class="TitreFooter">Information</h2>
                    <p>Quisque commodo facilisis purus, interdum voluptat arcu viverra sed.</p>
                    <p><strong class="OrangeCharacter">Tèl</strong> : 06 00 00 00 00</p>
                    <p><strong class="OrangeCharacter">Email</strong> : addressmail@gmail.com</p>
                    <p><strong class="OrangeCharacter">Location</strong> : Paris</p>


                    <!--Images Reseaux sociaux-->
                    <div class="reseauSociauxLogo">
                        <a href="https://fr-fr.facebook.com/"><img src="assets/Images/facebook.svg" class="Lfacebook"></a>
                        <a href="https://twitter.com/?lang=fr"><img src="assets/Images/twitter.svg" class="Ltwitter"></a>
                        <a href="https://www.google.fr/"><img src="assets/Images/google.svg" class="Lgoogle"></a>
                        <a href="https://www.pinterest.fr/"><img src="assets/Images/pinterest.svg" class="Lpinterest"></a>
                        <a href="https://www.instagram.com/?hl=fr"><img src="assets/Images/instagram.svg" class="Linstagram"></a>
                    </div>
                </div>
                <div class="TowerMemoryFooter">
                    <h2 class="TitreFooter">Power Of Memory</h2>
                    <ul class="ListeGeneralFooter">
                        <li class="listeFooter"><a href="memory.php">Jouez !</a></li>
                        <li class="listeFooter"><a href="scores.php">Les scores</a></li>
                        <li class="listeFooter"><a href="contact.php">Nous contacter</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <p class="copyright">Copyright © 2022 Tous droits réservés</p>
    </footer>
</body>
</html>