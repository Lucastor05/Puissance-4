<?php
session_start();
include 'assets/includes/database.inc.php';



$idUserMyAccount = 4;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil du joueur</title>
    <link rel="stylesheet" href="assets/css/header.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/footer.css">
</head>
<body>
    <!--Barre de navigation avec les different lien vers les autres pages-->
    <nav class="topnav">
        <a href="#" class="nomSite">The Tower Of Mermory</a>

        <div class="topnav-right">
            <a href="index.php">ACCUEIL</a>
            <a href="memory.php">JEU</a>
            <a href="scores.php">SCORES</a>
            <a href="contact.php">NOUS CONTACTER</a>
            <a href ="myaccount.php" class="active">MON ESPACE</a>
        </div>
    </nav>
    <!--Le id sert pour le css et surtout pour mettre une ipmage de fond derriere le h1-->
    <header id="HeadMyAccount">
            <H1>MON ESPACE</H1>
    </header>

    <main class="main-myaccount">
        <!--Formulaire de changement de mail-->
        <form action="" method="post" align="center"> 
            <label for="ancienEmail"></label><br>
            <input type="text" id="ancienEmail" name="ancienEmail" placeholder="Ancien Email" required="ancienEmail" class="formulaire-myaccount">
            <label for="nouvelEmail"></label><br>
            <input type="text" id="nouvelEmail" name="nouvelEmail" placeholder ="Nouvel Email" required="nouvelEmail" class="formulaire-myaccount">
            <label for="password"></label><br>
            <input type="password" id="password" name="password" placeholder ="Mot de passe" required="password" class="formulaire-myaccount" maxlength="">
            <label for="Cpassword"></label><br>
            <input type="password" id="Cpassword" name="Cpassword" placeholder ="Confirmez le mot de passe" required="Cpassword" class="formulaire-myaccount"><br>
            <button name="MAJEmail" type="submit" value="HTML" class="MAJEmailButton-myaccount">Mise à jour</button>
        </form>		
        <?php

        $erreur = false;


		if (isset($_POST['MAJEmail'])) {
			if(filter_var($_POST['ancienEmail'], FILTER_VALIDATE_EMAIL)){
                $AncienEmail = $_POST['ancienEmail'];
            }else{
                $erreur = true;
                echo 'Ancien mail invalide';
            }


            if(filter_var($_POST['nouvelEmail'], FILTER_VALIDATE_EMAIL)){
                $NewEmail = $_POST['nouvelEmail'];
            }else{
                $erreur = true;
                echo 'nouvel Email invalide';
            }

            $mdplength = strlen($_POST['password']);
            if($mdplength >= 8){
                $password = $_POST['password'];
            }else{
                $erreur = true;
                $erreur = "Votre mot de passe doit contenir 8 caractères minimum.";
            }


            $Cmdplength = strlen($_POST['Cpassword']);
            if($Cmdplength >= 8){
                $confirmPassword = $_POST['Cpassword'];
            }else{
                $erreur = true;
                $erreur = "Votre mot de passe doit contenir 8 caractères minimum.";
            }

            if(!$erreur){
                $requeteChangeMail = 'UPDATE Utilisateur SET Email = ? WHERE Identifiant = ? AND  Mot_de_passe = ?';
                $requeteUpdateMail = $conn -> prepare($requeteChangeMail);
                $requeteUpdateMail -> execute([$NewEmail, $idUserMyAccount, $password]);
            }
        }

        ?>

        
        <!--Formulaire de changement de mot de passe-->
        <form action="" method="post" align="center">
            <label for="ancienPassword"></label><br>
            <input type="password" id="ancienPassword" name="ancienPassword" placeholder ="Ancien mot de passe" required="ancienPassword" class="formulaire-myaccount">
            <label for="nouveauPassword" class="formulaire"></label><br>
            <input type="password" id="nouveauPassword" name="nouveauPassword" placeholder ="Nouveau mot de passe" required="nouveauPassword" class="formulaire-myaccount">
            <label for="Cpassword" class="formulaire"></label><br>
            <input type="password" id="Cpassword" name="ConfirmationPassword" placeholder ="Confirmez le nouveau mot de passe" required="Cpassword" class="formulaire-myaccount"><br>
            <button name="MyAccount" type="submit" value="HTML" class="MyAccountSpaceButton-myaccount">Création de la page mon espace</button>
        </form>
        <?php
        $erreur = false;


		if (isset($_POST['MyAccount'])) {
            $Amdplength = strlen($_POST['ancienPassword']);
			if($Amdplength >= 8){
                $AncienPass = $_POST['ancienPassword'];
            }else{
                $erreur = true;
                $erreur='Mot de passe incorrect';
            }

            $Nmdplength = strlen($_POST['nouveauPassword']);
            if($Nmdplength >= 8){
                $NewPass = $_POST['nouveauPassword'];
            }else{
                $erreur = true;
                $erreur = "Votre mot de passe doit contenir 8 caractères minimum.";
            }

            $Cmdplength = strlen($_POST['ConfirmationPassword']);
            if($Cmdplength >= 8 AND $_POST['ConfirmationPassword'] == $_POST['nouveauPassword']){
                $confirmPassword = $_POST['ConfirmationPassword'];
            }else{
                $erreur = true;
                $erreur = "Votre mot de passe doit contenir 8 caractères minimum.";
            }

            if(!$erreur){
                $requeteChangePassword = 'UPDATE Utilisateur SET Mot_de_passe = ? WHERE Identifiant =?';
                $requeteUpdatePassword = $conn -> prepare($requeteChangePassword);
                $requeteUpdatePassword -> execute([$NewPass, $idUserMyAccount,]);
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