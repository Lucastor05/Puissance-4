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

        $requeteSendMesage = 'INSERT INTO `Message` (`Identifiant_du_jeu`, `Identifiant_de_expediteur`, `Message`, `Date_et_heure_du_message`) VALUES (2, ?, ?, NOW());';
        $requeteSendMessageStatment = $conn->prepare($requeteSendMesage);
        $requeteSendMessageStatment->execute([$id_user, $message]);
    }


    function createTable($taille){
        for($i = 0; $i < $taille; $i++){
            echo "<tr>";
            for($j = 0; $j < $taille; $j++){
                echo '<td class="card"><img class="back" src="assets/Images/Theme_1/MemoryVerso.png"></td>';
            }
            echo "</tr>";
        }      
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
                    <a onclick="themeButton(1);">Capital</a>
                    <a onclick="themeButton(2);">Theme 2</a>
                    <a onclick="themeButton(3);">Theme 3</a>
                    </div>
                </div>

                <button onclick="StartGame();" class="startGame">Lancer la partie</button>

            </div>

            <p id="timerScore">Score</p>
            <script>

                


                

                const budapest = "Theme_1/budapest.jpg",
                Lisbon = "Theme_1/Lisbon.jpeg",
                Londres = "Theme_1/Londres.jpeg";
                MexicoCity = "Theme_1/Mexico_city.jpeg";
                Paris = "Theme_1/Paris.jpeg";
                Rome = "Theme_1/Rome.jpeg";
                Tokyo = "Theme_1/Tokyo.jpeg";
                Washington = "Theme_1/Washington.jpeg";
                Berlin = "Theme_1/berlin.jpeg";
                Camberra = "Theme_1/canberra.jpeg";
                Dublin = "Theme_1/dublin.jpg";
                Helsinki = "Theme_1/helsinki.jpg";
                Madrid = "Theme_1/madrid.jpeg";
                Oslo = "Theme_1/oslo.jpeg";
                Ottawa = "Theme_1/ottawa.jpeg";
                Prague = "Theme_1/prague.jpeg";

                const C_BACK = "Theme_1/MemoryVerso.png";


                const config_cards_Facile_Capital = [budapest, Lisbon, Londres, MexicoCity, Paris, Rome, Tokyo, Washington, budapest, Lisbon, Londres, MexicoCity, Paris, Rome, Tokyo, Washington];
                
                //manque 16 img pour intermediaire
                const config_cards_Intermediaire_Capital = [budapest, Lisbon, Londres, MexicoCity, Paris, Rome, Tokyo, Washington, Berlin, Camberra, Dublin, Helsinki, Madrid, Oslo, Ottawa, Prague, budapest, Lisbon, Londres, MexicoCity, Paris, Rome, Tokyo, Washington, Berlin, Camberra, Dublin, Helsinki, Madrid, Oslo, Ottawa, Prague];

                function StartGame(){
                    if(theme === 0 || difficulty === ""){
                        alert('Vous devez definir la difficulté ET le thème');
                    }else{
                        let millisecondes = 0;
                        let secondes = 0;
                        let minutes = 0;

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

                            if(millisecondes == 99){
                                secondes++;
                                millisecondes = 0;
                            }

                            if(secondes == 60){
                            minutes++;
                            secondes = 0;
                            }

                            millisecondes++;
                            }

                        let interval = setInterval(timer, 10);

                        function memory(arr_difficulte, maxCompteur){

                            console.log('lancer ?')
                            let previousCard = " ";
                            let previousIndex = null;
                            let previousCardElement;
                            let compteur = 0;

                            let finalScoreMilli;
                            let finalScoreSec;
                            let finalScoreMin;

                            const replayBtn = document.getElementById("replaybtn");
                            const cards = document.querySelectorAll(".card");
                            const imgUrl = (img) => `assets/Images/${img}`;


                            /**
                            * Randomize un tableau (renvoie un nouveau tableau)
                            * @param {string[]} arr
                            * @returns {string[]}
                            */
                            /**
                            * Fonction pour changer l'image d'un element HTML
                            * @param {Element} element - Element duquel on va changer l'image
                            * @param {string} imageUrl - Url de l'image
                            */


                            //fonctions 


                            function melanger(arr) {
                                //melanger le tableau avec les images
                                const copy = [...arr];
                                const result = [];
                                let i = copy.length;
                                while (i > 0) {
                                    const cardIndex = Math.floor(Math.random() * copy.length); // 0 et la longueur du tableau (non-comprise)
                                    const card = copy.splice(cardIndex, 1)[0];
                                    result.push(card);
                                    i--;
                                }
                                return result;
                            }

                            function changeImageSrc(element, imageUrl) {
                                element.src = imageUrl;
                            }

                            function replay() {
                                if (state.canPlay) {
                                return;
                                }
                                resetCards();
                                state.cards = melanger(arr_difficulte);
                                state.canPlay = true;
                                let interval = setInterval(timer, 10);
                            }

                            function resetCards() {
                                document
                                .querySelectorAll(".back")
                                .forEach((imgEl) => changeImageSrc(imgEl, imgUrl(C_BACK)));
                            }



                            const state = {
                            canPlay: true,
                            cards: melanger(arr_difficulte),
                            };



                            for (let i = 0; i < cards.length; i++) {
                                if (!state.canPlay) {
                                    return alert("REJOUEZ SVP");
                                    
                                }else{
                                    cards[i].addEventListener("click", function(event){
                                        if(compteur == maxCompteur){
                                            state.canPlay = false;
                                            compteur = 0;
                                            previousCard = " ";
                                            previousIndex = null;

                                            resetCards();

                                            let ScoreParti = counter.innerHTML;

                                            alert(ScoreParti);
                                                
                                            clearInterval(interval, 0);

                                            

                                        }else if(compteur <= maxCompteur){
                                            changeImageSrc(cards[i].querySelector("img"), imgUrl(state.cards[i]));
                                            
                                            if(previousCard === " "){

                                                previousCard = state.cards[i];
                                                previousCardElement = cards[i];
                                                previousIndex = i;
                                                
                                            }else{

                                                if(state.cards[i] === previousCard && i != previousIndex){
                                                    previousCard = " ";
                                                    previousIndex = null;
                                                    compteur += 2;
                                                    console.log(compteur)
                                                }else{
                                                    previousCard = " ";
                                                    previousIndex = null;
                                                    setTimeout(() => {
                                                        changeImageSrc(cards[i].querySelector("img"), imgUrl(C_BACK))
                                                        changeImageSrc(previousCardElement.querySelector("img"), imgUrl(C_BACK))
                                                    }, 800);
                                                }
                                            }
                                        }
                                    });
                                }
                            }


                            replayBtn.addEventListener("click", replay);
                        }

                        const Facile = document.querySelector('.TableauFacileMemory');
                        const Intermediaire = document.querySelector('.TableauIntermediaireMemory');
                        const Expert = document.querySelector('.TableauExpertMemory');
                        const Impossible = document.querySelector('.TableauImpossibleMemory');


                        //affiche la grille celon la difficulté
                        if(difficulty === 'Facile'){
                            Facile.style.display = "flex";
                            if(theme === 1){
                                memory(config_cards_Facile_Capital, 16);
                        
                            }else if(theme === 2){
                                
                                
                            }else if(theme === 3){
                                
                            }

                        }else if(difficulty === 'Intermediaire'){
                            Intermediaire.style.display = "flex";
                            if(theme === 1){
                                memory(config_cards_Intermediaire_Capital, 32)
                            
                            }else if(theme === 2){
                                
                            }else if(theme === 3){
                                
                            }

                        }else if(difficulty === 'Expert'){
                            Expert.style.display = "flex";
                            if(theme === 1){
                        
                            
                            }else if(theme === 2){
                                
                            }else if(theme === 3){
                                
                            }

                        }else if(difficulty === 'Impossible'){
                            Impossible.style.display = "flex";
                            if(theme === 1){
                        
                            
                            }else if(theme === 2){
                                
                            }else if(theme === 3){
                                
                            }
                            
                        }

                        //genere les images
                        
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
                    <?php createTable(4); ?>
                </table>
            </div>
            <div class="TableauIntermediaireMemory">
                <table>
                    <?php createTable(8); ?>
                </table>
            </div>
            <div class="TableauExpertMemory">
                <table>
                    <?php createTable(12); ?>
                </table>

            </div>
            <div class="TableauImpossibleMemory">
                <table>
                    <?php createTable(20); ?>
                </table>

            </div>



        </div>

        <button id="replaybtn">Replay</button>


    </main>





    <!--Footer de la page-->
    <?php
    require_once 'view/footer.inc.php';
    ?>
</body>
</html>