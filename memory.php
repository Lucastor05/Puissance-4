<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/header.css">
    <link rel="stylesheet" href="assets/css/footer.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <title>Memory</title>
</head>
<body>

    <?php
    require_once 'view/header.inc.php';
    ?>
        
    <!--Titre de la pages avec sous titre et lien vers le jeu-->
    <header class="headMemory">
        <h1 class="TitreAccueilMemory">THE TOWER OF <br>MEMORY !</h1> 
    </header>    


    <main class="corpPincipalMemory">

        <div class="BarreOutilsUtilisateurMemory">
            <div class="DifficultyButtonMemory">
                <button type="button" onclick="">Facile</button><!--Affiche grille 5x5-->
                <button type="button" onclick="">Intermédiaire</button><!--Affiche grille 8x8-->
                <button type="button" onclick="">Expert</button><!--Affiche grille 12x12-->
                <button type="button" onclick="">Impossible</button><!--Affiche grille 20x20-->
            </div>
            <div class="AffichageScoresMemory">
                <p>TIMER SCORES</p>
            </div>
        </div>
    

        <div class="chatcontainer">
            <div class="contentChat">
                <div class="bandeauChat">
                    <img src="assets/Images/chat-118.svg">
                    <h1 class="titreChat">Chat Général</h1>
                </div>
    
    
                <div class="messageChat">
                    <div class="Mymessage">
                        <p class="sendBy">Moi</p>
                        <p class="meChat">Hello</p>
                        <p class="dateChat">Aujourd'hui à 18h</p>
                    </div>
                    <div class="sentByOthers">
                        <div class="containerImage">
                            <img src="assets/Images/PhotoProfilProv.jpg">
                        </div>
                        <div class="message">
                            <p class="sendBy">Arthur</p>
                            <p class="otherChat">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Necessitatibus, nulla quo? Neque a facere sunt? Aspernatur in aut totam, quaerat laudantium dolorem cum earum sed, id quia illo ducimus odio.</p>
                            <p class="dateChat">Aujourd'hui à 18h</p>
                        </div>   
                    </div>
                    <div class="sentByOthers">
                        <div class="containerImage">
                            <img src="assets/Images/PhotoProfilProv.jpg">
                        </div>
                        <div class="message">
                            <p class="sendBy">Arthur</p>
                            <p class="otherChat">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Necessitatibus, nulla quo? Neque a facere sunt? Aspernatur in aut totam, quaerat laudantium dolorem cum earum sed, id quia illo ducimus odio.</p>
                            <p class="dateChat">Aujourd'hui à 18h</p>
                        </div>   
                    </div>
                    
                </div>
    
                <div>
                    <form action="/action_page.php" class="form-container">
                        <input placeholder="Votre Message..." name="msg" required class="MessageBarChat"></input>
                        <button type="submit" class="buttonSendChat">Envoyez</button>
                      </form>
                </div>
                
            </div>
            <div class="buttonOpen">
                <img src="assets/Images/chat-118.svg" class="LogoOpenChat">
            </div>
        </div>

        <div class="TableauDeJeuMemory">
            <div class="TableauFacileMemory">
                <table>
                    <tr>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                    </tr>
                    <tr>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                    </tr>
                    <tr>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                    </tr>
                    <tr>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                    </tr>
                </table>
            </div>
            <div class="TableauIntermediaireMemory">
                <table>
                    <tr>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                    </tr>
                    <tr>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                    </tr>
                    <tr>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                    </tr>
                    <tr>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                    </tr>
                    <tr>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                    </tr>
                    <tr>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                    </tr>
                    <tr>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                    </tr>
                    <tr>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                    </tr>
                </table>
            </div>
            <div class="TableauExpertMemory">
                <table>
                    <tr>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                    </tr>
                    <tr>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                    </tr>
                    <tr>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                    </tr>
                    <tr>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                    </tr>
                    <tr>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                    </tr>
                    <tr>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                    </tr>
                    <tr>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                    </tr>
                    <tr>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                    </tr>
                    <tr>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                    </tr>
                    <tr>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                    </tr>
                    <tr>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                    </tr>
                    <tr>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                    </tr>
                </table>

            </div>
            <div class="TableauImpossibleMemory">
                <table>
                    <tr>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                    </tr>
                    <tr>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                    </tr>
                    <tr>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                    </tr>
                    <tr>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                    </tr>
                    <tr>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                    </tr>
                    <tr>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                    </tr>
                    <tr>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                    </tr>
                    <tr>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                    </tr>
                    <tr>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                    </tr>
                    <tr>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                    </tr>
                    <tr>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                    </tr>
                    <tr>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                    </tr>
                    <tr>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                    </tr>
                    <tr>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                    </tr>
                    <tr>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                    </tr>
                    <tr>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                    </tr>
                    <tr>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                    </tr>
                    <tr>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                    </tr>
                    <tr>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                    </tr>
                    <tr>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                        <td><img src="assets/Images/MemoryVerso.png"></td>
                    </tr>
                </table>

            </div>



        </div>

        
    </main>





    <!--Footer de la page-->
    <?php
    require_once 'view/footer.inc.php';
    ?>
</body>
</html>