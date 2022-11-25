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

    <script>
        let difficulty = "";
        let theme = 0;


        function themeButton(valeur){
            theme = valeur;
        }

        function difficultyButton(valeur){
            difficulty = valeur;
        }


        /* When the user clicks on the button,
        toggle between hiding and showing the dropdown content */
        function myFunction() {
            document.getElementById("myDropdownDifficulty").classList.toggle("show");
        }

        function myFunction2() {
            document.getElementById("myDropdownTheme").classList.toggle("show");
        }
        
        // Close the dropdown menu if the user clicks outside of it
        window.onclick = function(event) {
            if (!event.target.matches('.dropbtn')) {
            var dropdowns = document.getElementsByClassName("dropdown-content");
            var i;
            for (i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
                }
            }
            }
        }
    </script>

    <?php
    require_once 'view/header.inc.php';
    include 'assets/includes/database.inc.php';
    include 'init_session.php';

    $id_user = $_SESSION['user']['Identifiant'];

    if(isset($_POST['buttonChat'])){

        $message = $_POST['messageInput'];

        $requeteSendMesage = 'INSERT INTO `Messages` (`Identifiant_du_jeu`, `Identifiant_de_expediteur`, `Message_content`, `Date_et_heure_du_message`) VALUES (2, ?, ?, NOW());';
        $requeteSendMessageStatment = $conn->prepare($requeteSendMesage);
        $requeteSendMessageStatment->execute([$id_user, $message]);

        
    }


    ?>
        
    <!--Titre de la pages avec sous titre et lien vers le jeu-->
    <header class="headMemory">
        <h1 class="TitreAccueilMemory">THE POWER OF <br>MEMORY !</h1> 
    </header>    


    <main class="corpPincipalMemory">

        <div class="BarGame">
            <div class="dropDown-buttonStart">

                <div class="dropdown">
                    <button onclick="myFunction()" class="dropbtn">Choisir une difficulté</button>
                    <div id="myDropdownDifficulty" class="dropdown-content">
                    <a class="Facile" onclick="difficultyButton('Facile')">Facile</a>
                    <a class="Intermediaire" onclick="difficultyButton('Intermediaire')">Intermediaire</a>
                    <a class="Expert" onclick="difficultyButton('Expert')">Expert</a>
                    <a class="Impossible" onclick="difficultyButton('Impossible')">Impossible</a>
                    </div>
                </div>

                <div class="dropdown">
                    <button onclick="myFunction2()" class="dropbtn">Choisir un thème</button>
                    <div id="myDropdownTheme" class="dropdown-content">
                    <a onclick="themeButton(1);">Theme 1</a>
                    <a onclick="themeButton(2);">Theme 2</a>
                    <a onclick="themeButton(3);">Theme 3</a>
                    </div>
                </div>

                <button onclick="StartGame();" class="startGame">Lancer la partie</button>

            </div>

            <p id="timerScore">Score</p>
            <script>
                function StartGame(){
                    if(theme === 0 || difficulty === ""){
                        alert('Vous devez definir la difficulté ET le thème');
                    }else{
                        let millisecondes = 0;
                        let secondes = 0;
                        let minutes = 0;
                        let heure = 0;

                        const counter = document.getElementById('timerScore');

                        function timer() {

                            if(secondes < 10){
                                if(minutes < 10){
                                    if(millisecondes < 10){
                                        counter.innerText = "0"+minutes + ':0' + secondes + ":0" + millisecondes;
                                    }else{
                                        counter.innerText = "0"+minutes + ':0' + secondes + ":" + millisecondes;
                                    }
                                    
                                }else{
                                    if(millisecondes < 10){
                                        counter.innerText = minutes + ':0' + secondes + ":0" + millisecondes;
                                    }else{
                                        counter.innerText = minutes + ':0' + secondes + ":" + millisecondes;
                                    }
                                }
                            }else{
                                if(minutes < 10){
                                    if(millisecondes < 10){
                                        counter.innerText = "0"+minutes + ':' + secondes + ":0" + millisecondes;
                                    }else{
                                        counter.innerText = "0"+minutes + ':' + secondes + ":" + millisecondes;
                                    }
                                }else{
                                    if(millisecondes < 10){
                                        counter.innerText = minutes + ':' + secondes + ":0" + millisecondes;
                                    }else{
                                        counter.innerText = minutes + ':' + secondes + ":" + millisecondes;
                                    }
                                }
                            }
                            
                            if(millisecondes > 99){
                                secondes++;
                                millisecondes = 0;
                            }

                            if(secondes == 60){
                            minutes++;
                            secondes = 0;
                            }

                            if(minutes == 60){
                            minutes = 0;
                            heure ++;
                            }

                            millisecondes++;
                        }
                        setInterval(timer, 10);

                        const Facile = document.querySelector('.TableauFacileMemory');
                        const Intermediaire = document.querySelector('.TableauIntermediaireMemory');
                        const Expert = document.querySelector('.TableauExpertMemory');
                        const Impossible = document.querySelector('.TableauImpossibleMemory');


                        //affiche la grille celon la difficulté
                        if(difficulty === 'Facile'){
                            Facile.style.display = "flex";

                        }else if(difficulty === 'Intermediaire'){
                            Intermediaire.style.display = "flex";

                        }else if(difficulty === 'Expert'){
                            Expert.style.display = "flex";

                        }else if(difficulty === 'Impossible'){
                            Impossible.style.display = "flex";
                            
                        }

                        //genere les images
                        if(theme === 1){

                        }else if(theme === 2){
                            
                        }else if(theme === 3){
                            
                        }
                    }
                }
                

            </script>

        </div>
    
        <div class="chatcontainer">
            <div class="contentChat">
                <div class="bandeauChat">
                    <img src="assets/Images/chat-118.svg">
                    <h1 class="titreChat">Chat Général</h1>
                </div>
    
    
                <div id="messageChat">
                    
                    
                </div>
                        
                <div>
                    <form action="" class="form-container" method="POST">
                        <input placeholder="Votre Message..." name="messageInput" id="messageInput" required class="MessageBarChat"></input>
                        <input type="hidden" id="id_user" value=<?= $_SESSION['user']['Identifiant']?>>
                        <button type="submit" class="buttonSendChat" name="buttonChat" onClick="postMessage">Envoyez</button>
                      </form>
                </div>
                <script src="js/memory.js"></script>

                
                    
                    
                
                <div class="buttonOpen">
                    <img src="assets/Images/chat-118.svg" class="LogoOpenChat">
                </div>
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