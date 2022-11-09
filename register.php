<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'inscription</title>
    <link rel="stylesheet" href="assets/css/header.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/footer.css">
</head>
<body>
    <?php   
    require_once 'view/header.inc.php';
    ?>
    <!--Le id sert pour le css et surtout pour mettre une ipmage de fond derriere le h1-->
    <header id="HeadRegister">
            <H1>INSCRIPTION</H1>
    </header>

    <!--Formulaire d'inscription-->
    <main class="main-register">
        <form action="" method="post" align="center"> 
            <label for="email"></label><br>
            <input type="text" id="email" name="email" placeholder="Email" required="Email" class="formulaire-register">
            <label for="Pseudo"></label><br>
            <input type="text" id="Pseudo" name="Pseudo" placeholder ="Pseudo" required="Pseudo" class="formulaire-register">
            <label for="password"></label><br>
            <input type="password" id="password" name="password" placeholder ="Mot de passe" required="password" class="formulaire-register">
            <label for="Cpassword"></label><br>
            <input type="password" id="Cpassword" name="Cpassword" placeholder ="Confirmez le mot de passe" required="Cpassword" class="formulaire-register"><br>
            <button name="Inscription" type="submit" value="HTML" class="InscriptionButton-register">Inscription</button>
        </form>
    </main>

    <?php
    require_once 'view/footer.inc.php';
    ?>

</body>
</html>