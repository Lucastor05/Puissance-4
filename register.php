<?php

 include 'assets/includes/database.inc.php';

 $error = false;


    //recuperer les donnees du formulaire dans des variables
    //faire le insert en bdd pdo

    if(isset($_POST['Inscription'])){   

        if(isset($_POST['email'])){
            if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
                $email = $_POST['email'];
            }else{
                $error = true;
                echo 'Email invalide';
            }
        }else{
            $error = true;
        }
        

        if(isset($_POST['Pseudo'])){
            if (strlen($_POST['Pseudo']) < 4)
            {$error=true;
            }else{
                $pseudo = $_POST['Pseudo'];
            }
        }else{
            $error = true;
        }


        if(isset($_POST['password'])){
            $password = $_POST['password'];

            $uppercase = preg_match('@[A-Z]@', $password);
            $lowercase = preg_match('@[a-z]@', $password);
            $number    = preg_match('@[0-9]@', $password);
            $specialChars = preg_match('@[^\w]@', $password);
            if(!$uppercase || !$lowercase || !$number || !$specialChars || mb_strlen($password) < 8) {
                $error = true;
                echo 'Le mot de passe doit contenir au moins une majuscule, une minuscule, un chiffre, un caractère spécial et doit contenir au moins 8 caractères';
            }
            
        }else{
            $error = true;
        }
    

        if(isset($_POST['password']) && isset($_POST['Cpassword'])){
            if($_POST['password'] != $_POST['Cpassword']){
                $error = true;
            }
        }else{
            $error = true;
        }


        if(!$error){
            $new_mdp= hash('sha256',$password);

            $statement = $conn->prepare('INSERT INTO utilisateur (Email, Pseudo, Mot_de_passe, Date_et_heure_inscription) VALUES (?, ?, ?, NOW())');
            $statement->execute([$email, $pseudo, $new_mdp]);

            header('Location: login.php');
            exit();
        }
    }
    

?>

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