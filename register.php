<?php
require 'assets/include/database.inc.php';

$email = 'Email';
$pseudo = 'Pseudo';
$mdp = 'Mot_de_passe';
$mdp2 = '';
$error = '';

if( isset($_POST['submit']))
{
    //recuperer les donnees du formulaire dans des variables
    //faire le insert en bdd pdo

    if (empty ($email))
    {$error[]="Entrez un Email";
    }
    else
    {$email = test_input($_POST['Email']);
        if (!filter_var (FILTER_VALIDATE_EMAIL($email)))
        {$error[] = "Email invalide";
        }
    }

    else
    if (empty($pseudo))
    {$error[]="Veuillez entrer un pseudo";
    }
    else if (strlen($pseudo) > 4)
    {$error[]="Pseudo doit contenir au moins 4 caractères";
    }

    else
    if (empty($mdp))
    {$error[]="veuillez entrer un mot de passe";
    }

    $password = 'user-input-pass';

    // Validate password strength
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number    = preg_match('@[0-9]@', $password);
    $specialChars = preg_match('@[^\w]@', $password);

    if(!$uppercase || !$lowercase || !$number || !$specialChars || mb_strlen($password) < 8) {
        echo 'Le mot de passe doit contenir au moins une majuscule, une minuscule, un chiffre, un caractère spécial et doit contenir au moins 8 caractères';
    }else{
        echo 'Strong password.'
    }

    if (empty($mdp2))
    {$error[]="veuillez entrer la confirmation du mot de passe";
    }
    else
    function validatepassword($mdp2, $mdp2)
    {if ($mdp2 === $mdp)
        {return true;
        }
        else
        {$error[]="Les mots de passes ne sont pas pareils"
        }
    }

    else 
    {try
        $statement=$db->prepare("SELECT Pseudo, Email FROM utilisateur WHERE Pseudo=:Pseudo OR Email=:Email");
        $statement->execute(array(':Pseudo'=>$pseudo, ':Email'=>$email, ':Mot_de_passe'=$mdp));
        $row=$statement->FETCH_ASSOC;
        if($row['Pseudo']==$pseudo)
        {$error[]= "Ce pseudo existe déja";
        }

        else
        if ($row['Email']==$email)
        {$error[]= "Cet email est déja utilisé";
        }

        else
        if (!isset($error))
        {
            $new_mdp= password_hash($mdp, PASSWORD_DEFAULT);

            $statement = $db->prepare('INSERT INTO utilisateur (Email, Pseudo, Mot_de_passe)
            VALUES (:Email, :Pseudo, :Mot_de_passe)');

            if($statement->execute(array(':Email'=>$email,
                                         ':Pseudo'=>$pseudo,
                                         ':Mot_de_passe'=>$mdp)));
            {$register="Vous êtes connecté";
             ini_set("display_errors", 1);
             error_reporting(E_all);
             $from= "addressmail@gmail.com";
             $to= 'Email';
             $subject = "The tower of memory";
             $message = "You are now connected. Welcome to The tower of memory";
             $headers = "From:" .$from;
             mail($to, $subject, $message, $headers);
             echo "Un email a été envoyé sur votre boite mail";
            }
            else
            {echo 'imposible d\'envoyer un email'}
        }
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
    <!--Barre de navigation avec les different lien vers les autres pages-->
    <nav class="topnav">
        <a href="#" class="nomSite">The Tower Of Mermory</a>

        <div class="topnav-right">
            <a href="index.html">ACCUEIL</a>
            <a href="memory.html">JEU</a>
            <a href="scores.html">SCORES</a>
            <a href="contact.html">NOUS CONTACTER</a>
        </div>
    </nav>
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
                        <li class="listeFooter"><a href="memory.html">Jouez !</a></li>
                        <li class="listeFooter"><a href="scores.html">Les scores</a></li>
                        <li class="listeFooter"><a href="contact.html">Nous contacter</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <p class="copyright">Copyright © 2022 Tous droits réservés</p>
    </footer>

</body>
</html>