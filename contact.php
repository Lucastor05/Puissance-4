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


    <?php
    require_once 'view/header.inc.php';
    include 'init_session.php';
    ?>

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

    </main>


    <?php
    require_once 'view/footer.inc.php';
    ?>
</body>
</html>