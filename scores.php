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
    include 'view/header.inc.php';
    ?>

     <!--Titre de la pages avec sous titre et lien vers le jeu-->
     <header class="headScores">
        <h1 class="TitreAccueilScores">Les Scores !</h1> 
    </header>   

    <main class="corpPincipalScores">

        <div class="BarreOutilsUtilisateurScores">
            <div class="SearchBarScores">
                <label for="searchScores">
                    <img src="assets/Images/SearchBar.svg" class="iconSearchBar">
                </label>
                <input type="text" id="searchScores" placeholder="Search for a player">
            </div>

            <div class="dropdownScore">
                <div class="dropdown-contentScore">
                    <select name="Trier par" class="triage">
                        <option value="NomJeuScores">Nom de jeu</option>
                        <option value="psuedoScore">Pseudo</option>
                        <option value="DifficultyScore">Difficulté</option>
                        <option value="TempsScore">Temps</option>
                        <option value="dateScore">Date</option>
                    </select>
                </div>
                <div class="dropdown-contentScore">
                    <select name="Ordre" class="triage">
                        <option value="CroissantScore">Croissant</option>
                        <option value="DecroissantScore">Décroissant</option>
                    </select>
                </div>
                
            </div>
        </div>

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
                <p class="GameNameScore">test</p>
                <p class="pseudoitemScore">test</p>
                <p class="DifficultyitemScore">test</p>
                <p class="GameScores">test</p>
                <p class="DateScore">test</p>
            </div>
        </div>



        <div class="table-resultUserScores">
            <div class="container-UseritemScore">
                <p class="GameNameScoreUser">User</p>
                <p class="pseudoScoreUser">User</p>
                <p class="DifficultyScoreUser">User</p>
                <p class="GameScoresUser">User</p>
                <p class="DateScoreUser">User</p>
            </div>
        </div>

    </main>


    <?php
    require_once 'view/footer.inc.php';
    ?>

</body>
</html>