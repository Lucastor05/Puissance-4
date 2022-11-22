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

        



        let difficulty;
        let theme;


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

        $requeteSendMesage = 'INSERT INTO `Message` (`Identifiant_du_jeu`, `Identifiant_de_expediteur`, `Message`, `Date_et_heure_du_message`) VALUES (2, ?, ?, NOW());';
        $requeteSendMessageStatment = $conn->prepare($requeteSendMesage);
        $requeteSendMessageStatment->execute([$id_user, $message]);

        header('Location: memory.php'); 
        exit();
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
                    <a onclick="difficultyButton('Facile')">Facile</a>
                    <a onclick="difficultyButton('Intermediaire')">Intermediaire</a>
                    <a onclick="difficultyButton('Expert')">Expert</a>
                    <a onclick="difficultyButton('Impossible')">Impossible</a>
                    </div>
                </div>

                <div class="dropdown">
                    <button onclick="myFunction2()" class="dropbtn">Choisir une difficulté</button>
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
                    let secondes = 0;
                    let minutes = 0;
                    let heure = 0;

                    const counter = document.getElementById('timerScore');

                    function timer() {
                        counter.innerText = minutes + ':' + secondes;
                        if(secondes == 60){
                        minutes++;
                        secondes = 0;
                        }

                        if(minutes == 60){
                        minutes = 0;
                        heure ++;
                        }

                    }

                    setInterval(timer(), 1000);
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
                    <?php

                    $requeteallMessages = 'SELECT Utilisateur.Pseudo, Utilisateur.Identifiant , Message.Message, Message.Date_et_heure_du_message
                    FROM Message 
                    INNER JOIN Utilisateur ON Utilisateur.Identifiant = Message.Identifiant_de_expediteur
                    WHERE Message.Date_et_heure_du_message >= NOW() - INTERVAL 1 DAY;';
                    $allMessages = $conn -> prepare($requeteallMessages);
                    $allMessages -> execute();


                    while($msg = $allMessages -> fetch()){
                        if($msg['Identifiant'] == $id_user){
                            
                    ?>
                        <div class="SendByMe">
                            <p class="sendBy"><?php echo $msg['Pseudo']?> </p>
                            <p class="meChat"><?php echo $msg['Message']?> </p>


                    <?php
                    if(date_create($msg['Date_et_heure_du_message'])->format('d') ==  date("d", time())){

                    
                    ?>
                            <p class="dateChat"><?php echo "Aujourd'hui à " . date_create($msg['Date_et_heure_du_message'])->format('H') . "h" ?></p>
                    <?php
                    }else{
                    ?>
                            <p class="dateChat"><?php echo "Hier à " . date_create($msg['Date_et_heure_du_message'])->format('H') . "h" ?></p>
                        
                    <?php
                    }
                    
                    ?>
                        </div>
                    <?php
                        }else{
                        ?>
                        <div class="photo-otherMessage">
                            <div class="containerImage">
                                <img src="assets/Images/PhotoProfilProv.jpg">
                            </div>
                            <div class="message">
                                <p class="sendBy"><?php echo $msg['Pseudo']?></p>
                                <p class="otherChat"><?php echo $msg['Message']?></p>
                                <?php
                        if(date_create($msg['Date_et_heure_du_message'])->format('d') ==  date("d", time())){

                        
                        ?>
                                <p class="dateChat"><?php echo "Aujourd'hui à " . date_create($msg['Date_et_heure_du_message'])->format('H') . "h" ?></p>
                        <?php
                        }else{
                        ?>
                                <p class="dateChat"><?php echo "Hier à " . date_create($msg['Date_et_heure_du_message'])->format('H') . "h" ?></p>
                        <?php
                        }
                        
                        ?>
                                </div>
                            </div>
                        <?php
                            }
                        }
                        ?>
                    
                </div>
    
                <div>
                    <form action="" class="form-container" method="POST">
                        <input placeholder="Votre Message..." name="messageInput" required class="MessageBarChat"></input>
                        <button type="submit" class="buttonSendChat" name="buttonChat">Envoyez</button>
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