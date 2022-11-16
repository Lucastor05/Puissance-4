
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/header.css">
    <link rel="stylesheet" href="assets/css/footer.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <title>Scores</title>
</head>
<body>
    <?php
    require_once 'view/header.inc.php';
    include 'assets/includes/database.inc.php';
    include 'init_session.php';

    $id_user = $_SESSION['user']['Identifiant'];

    function PseudoExiste($conn, $pseudo){
        $functionPseudo = $conn -> prepare('SELECT Utilisateur.* FROM Utilisateur INNER JOIN Score ON Score.Identifiant_du_joueur = Utilisateur.Identifiant WHERE Utilisateur.Pseudo = ? AND Score.Identifiant_du_joueur = Utilisateur.Identifiant');
        $functionPseudo -> execute([$pseudo]);
        $functionPseudoExiste = $functionPseudo-> fetch();
        
        if(empty($functionPseudoExiste)){
            return false;
        }else{
            return true;
        }
    }
    function scoreExiste($conn, $id_user){
        $functionScore = $conn -> prepare('SELECT * FROM Score WHERE Score.Identifiant_du_joueur = ?');
        $functionScore -> execute([$id_user]);
        $functionScoreExiste = $functionScore-> fetch();
        
        if(empty($functionScoreExiste)){
            return false;
        }else{
            return true;
        }
    }

    $filterTrie = 'Identifiant_du_jeu';
    $filterOrdre = 'DESC'
    


    ?>

     <!--Titre de la pages avec sous titre et lien vers le jeu-->
     <header class="headScores">
        <h1 class="TitreAccueilScores">Les Scores !</h1> 
    </header>   

    <main class="corpPincipalScores">

        <div class="BarreOutilsUtilisateurScores">
            <form method="POST" action="" class="SearchBarScores">
                <label for="searchScores">
                <img src="assets/Images/SearchBar.svg" class="iconSearchBar">
                </label>
                <input type="text" id="searchScores" name="search" placeholder="Search for a player">
            </form>
                
            <div class="dropdownScore">
                <form action="" method="post" class="mb-3">
                <div class="select-block">
                    <select class="dropdownSelect" name="trie">
                        <option value="NomJeuScores">Nom de jeu</option>
                        <option value="pseudoScore">Pseudo</option>
                        <option value="DifficultyScore">Difficulté</option>
                        <option value="TempsScore">Temps</option>
                        <option value="dateScore">Date</option>
                    </select>
                    <select class="dropdownSelect" name="Ordre" class="triage" id="dropdown-contentScore">
                        <option name="CroissantScore">Croissant</option>
                        <option name="DecroissantScore">Decroissant</option>
                    </select>
                </div>
                <input class="inputSelectScore" type="submit" name="submit" vlaue="Choose options">
                </form>
            </div>
        </div>

        <h2 class="TitleScores">Vos Scores</h2>

        <div class="TableScore">
            <h3 class="tableTitleScores">Nom du jeu</h3>
            <h3 class="tableTitleScores">Pseudo</h3>
            <h3 class="tableTitleScores">Niveau de difficulté</h3>
            <h3 class="tableTitleScores">Scores</h3>
            <h3 class="tableTitleScores">Date et heure</h3>
        </div>

        <?php

        $requeteUserscore= 'SELECT Jeu.Nom_du_jeu, Utilisateur.Pseudo, Score.Difficulte_de_la_partie, Score.Score_de_la_partie, Score.Date_et_heure_de_la_partie
        FROM Score
        INNER JOIN Jeu ON Score.Identifiant_du_jeu = Jeu.Identifiant 
        INNER JOIN Utilisateur ON Utilisateur.Identifiant = Score.Identifiant_du_joueur
        WHERE Utilisateur.Identifiant = ?
        ORDER BY Jeu.Nom_du_jeu, Score.Difficulte_de_la_partie, Score.Score_de_la_partie';
        $userScore = $conn -> prepare($requeteUserscore);
        $userScore -> execute([$id_user]);
        $uScore = $userScore -> fetch();

        



        if(scoreExiste($conn, $id_user)){
        ?>

        <div class="table-resultUserScores">
            <div class="container-UseritemScore">
                <p><?= $uScore['Nom_du_jeu'] ?></p>
                <p><?= $uScore['Pseudo'] ?></p>
                <p><?= $uScore['Difficulte_de_la_partie']  ?></p>
                <p><?= $uScore['Score_de_la_partie']  ?></p>
                <p><?= date_create($uScore['Date_et_heure_de_la_partie'])->format('d/m/Y')  ?></p>
            </div>
        </div>

        <?php 
        
        }else{
        ?>
         <div class="table-resultUserScores">
            <div class="container-UseritemScore">
                <p> None </p>
                <p> None </p>
                <p> None </p>
                <p> None </p>
                <p> None </p>
            </div>
        </div>
        <?php
        }
        ?>

        <h2 class="TitleScores">Les Meilleurs Scores</h2>

        <div class="TableScore">
            <h3 class="tableTitleScores">Nom du jeu</h3>
            <h3 class="tableTitleScores">Pseudo</h3>
            <h3 class="tableTitleScores">Niveau de difficulté</h3>
            <h3 class="tableTitleScores">Scores</h3>
            <h3 class="tableTitleScores">Date et heure</h3>
        </div>
        <div class="table-resultScores">
            <div class="container-itemScore">
                <?php
                
                if(isset($_POST['search'])){
                    if(PseudoExiste($conn, $_POST['search'])){

                        $SearchUser= 'SELECT Jeu.Nom_du_jeu, Utilisateur.Pseudo, Score.Difficulte_de_la_partie, Score.Score_de_la_partie, Score.Date_et_heure_de_la_partie FROM Score INNER JOIN Jeu ON Score.Identifiant_du_jeu = Jeu.Identifiant  INNER JOIN Utilisateur ON Utilisateur.Identifiant = Score.Identifiant_du_joueur WHERE Utilisateur.Pseudo = ?';
                        $Search = $conn -> prepare($SearchUser);
                        $Search -> execute([$_POST['search']]);
                        $tabSearch = $Search -> fetch();
                        ?>
                            <p><?= $tabSearch['Nom_du_jeu'];  ?></p>
                            <p><?= $tabSearch['Pseudo'] ?></p>
                            <p><?= $tabSearch['Difficulte_de_la_partie']  ?></p>
                            <p><?= $tabSearch['Score_de_la_partie']  ?></p>
                            <p><?= date_create($tabSearch['Date_et_heure_de_la_partie'])->format('d/m/Y')  ?></p>
                        <?php
                    }else{

                        $requeteAllScore= 'SELECT Jeu.Nom_du_jeu, Utilisateur.Pseudo, Score.Difficulte_de_la_partie, Score.Score_de_la_partie, Score.Date_et_heure_de_la_partie
                        FROM Score
                        INNER JOIN Jeu ON Score.Identifiant_du_jeu = Jeu.Identifiant 
                        INNER JOIN Utilisateur ON Utilisateur.Identifiant = Score.Identifiant_du_joueur
                        ORDER BY '. $filterTrie . ' ' . $filterOrdre;
                        $Score = $conn -> prepare($requeteAllScore);
                        $Score -> execute();

                        while($AllScore = $Score -> fetch()){
                            ?>
                                <p><?= $AllScore['Nom_du_jeu'];  ?></p>
                                <p><?= $AllScore['Pseudo']; ?></p>
                                <p><?= $AllScore['Difficulte_de_la_partie'];  ?></p>
                                <p><?= $AllScore['Score_de_la_partie'];  ?></p>
                                <p><?= date_create($AllScore['Date_et_heure_de_la_partie'])->format('d/m/Y');  ?></p>
                            <?php
                        }
                    }

                }else{


                    if(isset($_POST["trie"])){

                        if($_POST["trie"] == "NomJeuScores"){
                            $filterTrie = "Identifiant_du_jeu";
                        }elseif($_POST["trie"] == "pseudoScore"){
                            $filterTrie = "Identifiant_du_joueur";
                        }elseif($_POST["trie"] == "DifficultyScore"){
                            $filterTrie = "Difficulte_de_la_partie";
                        }elseif($_POST["trie"] == "TempsScore"){
                            $filterTrie = "Score_de_la_partie";
                        }elseif($_POST["trie"] == "dateScore"){
                            $filterTrie = "Date_et_heure_de_la_partie";
                        }

                        if(isset($_POST["Ordre"])){
                            if($_POST["Ordre"] == "Croissant"){
                                $filterOrdre = "ASC";
                            }else{
                                $filterOrdre = "DESC";
                            }
                        }

                    }elseif(isset($_POST["Ordre"])){
                        if($_POST["Ordre"] == "Croissant"){
                            $filterOrdre = "ASC";
                        }else{
                            $filterOrdre = "DESC";
                        }
                    }

                    $requeteAllScore= 'SELECT Jeu.Nom_du_jeu, Utilisateur.Pseudo, Score.Difficulte_de_la_partie, Score.Score_de_la_partie, Score.Date_et_heure_de_la_partie
                    FROM Score
                    INNER JOIN Jeu ON Score.Identifiant_du_jeu = Jeu.Identifiant 
                    INNER JOIN Utilisateur ON Utilisateur.Identifiant = Score.Identifiant_du_joueur
                    ORDER BY '. $filterTrie . ' ' . $filterOrdre;

                    $Score = $conn -> prepare($requeteAllScore);
                    $Score -> execute();

                    while($AllScore = $Score -> fetch()){
                    ?>
                        <p><?= $AllScore['Nom_du_jeu'];  ?></p>
                        <p><?= $AllScore['Pseudo']; ?></p>
                        <p><?= $AllScore['Difficulte_de_la_partie'];  ?></p>
                        <p><?= $AllScore['Score_de_la_partie'];  ?></p>
                        <p><?= date_create($AllScore['Date_et_heure_de_la_partie'])->format('d/m/Y');  ?></p>
                    <?php
                    }
                }
            
                    
                    ?>
                
            </div>
        </div>



       

    </main>


    <?php
    require_once 'view/footer.inc.php';
    ?>

</body>
</html>