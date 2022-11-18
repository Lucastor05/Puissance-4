<?php
include 'assets/includes/database.inc.php';

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
    <?php
    require_once 'view/header.inc.php';
    include 'init_session.php';

    $idUserMyAccount = $_SESSION['user']['Identifiant'];

    ?>


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
                $requeteUpdateMail -> execute([$NewEmail, $idUserMyAccount, hash("sha256", $password)]);
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
                $requeteUpdatePassword -> execute([hash('sha256',$NewPass), $idUserMyAccount,]);
            }
        }

        ?>
    </main>


    <?php
    require_once 'view/footer.inc.php';
    ?>

</body>
</html>