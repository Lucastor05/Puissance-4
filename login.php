<?php
include 'assets/includes/database.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page de connexion</title>
    <link rel="stylesheet" href="assets/css/header.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/footer.css">
</head>
<body>
    <!--Barre de navigation avec les different lien vers les autres pages-->
    <nav class="topnav">
        <a href="#" class="nomSite">The Tower Of Mermory</a>

        <div class="topnav-right">
            <a href="index.php" class="active">ACCUEIL</a>
            <a href="memory.php">JEU</a>
            <a href="scores.php">SCORES</a>
            <a href="contact.php">NOUS CONTACTER</a>
        </div>
    </nav>
    <!--Le id sert pour le css et surtout pour mettre une ipmage de fond derriere le h1-->
    <header id="HeadLogin">
            <H1>CONNEXION</H1>
    </header>

    <!--Formulaire de connexion-->
    <main class="main-login">
        <form action="" method="post" align="center"> 
            <label for="email"></label><br>
            <input type="text" id="email" name="email" placeholder="Email" required="Email" class="formulaire-login">
            <label for="password"></label><br>
            <input type="password" id="password" name="password" placeholder ="Mot de passe" required="password" class="formulaire-login"><br>
            <button name="Connexion" type="submit" value="HTML" class="LoginButton-login">Connexion</button>
        </form>
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