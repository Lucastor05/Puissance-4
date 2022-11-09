
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page de  connexion</title>
    <link rel="stylesheet" href="assets/css/header.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/footer.css">
</head>
<body>

    <?php
    require_once 'view/header.inc.php';

    if($error === false && isset($email)){

    }
    ?>

    <!--Le id sert pour le css et surtout pour mettre une ipmage de fond derriere le h1-->
    <header id="HeadLogin">
            <H1>CONNEXION</H1>
    </header>

    <!--Formulaire de connexion-->
    <main class="main-login">
        <form action="login.php" method="POST" align="center"> 
            <label for="email"></label><br>
            <input type="text" id="email" name="email" placeholder="Email" required="Email" class="formulaire-login">
            <label for="password"></label><br>
            <input type="password" id="password" name="password" placeholder ="Mot de passe" required="password" class="formulaire-login"><br>
            <button name="Connexion" type="submit" value="HTML" class="LoginButton-login">Connexion</button>
        </form>
    </main>

    <?php
    require_once 'view/footer.inc.php';
    ?>

</body>
</html>