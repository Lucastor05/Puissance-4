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
            <input type="password" id="password" name="password" placeholder ="Mot de passe" required="password" class="formulaire-myaccount">
            <label for="Cpassword"></label><br>
            <input type="password" id="Cpassword" name="Cpassword" placeholder ="Confirmez le mot de passe" required="Cpassword" class="formulaire-myaccount"><br>
            <button name="MAJEmail" type="submit" value="HTML" class="MAJEmailButton-myaccount">Mise à jour</button>
        </form>

        <!--Formulaire de changement de mot de passe-->
        <form action="" method="post" align="center">
            <label for="ancienPassword"></label><br>
            <input type="ancienPassword" id="ancienPassword" name="ancienPassword" placeholder ="Ancien mot de passe" required="ancienPassword" class="formulaire-myaccount">
            <label for="nouveauPassword" class="formulaire"></label><br>
            <input type="nouveauPassword" id="nouveauPassword" name="nouveauPassword" placeholder ="Nouveau mot de passe" required="nouveauPassword" class="formulaire-myaccount">
            <label for="Cpassword" class="formulaire"></label><br>
            <input type="password" id="Cpassword" name="Cpassword" placeholder ="Confirmez le nouveau mot de passe" required="Cpassword" class="formulaire-myaccount"><br>
            <button name="MyAccount" type="submit" value="HTML" class="MyAccountSpaceButton-myaccount">Création de la page mon espace</button>
        </form>
    </main>

    <?php
    require_once 'view/footer.inc.php';
    ?>

</body>
</html>