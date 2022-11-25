<?php/* essaye de realiser la story3 partie4 mais echecs par manque de temps. je met l'avancer quand meme pour montrer les essayes realiser 


include 'init_session.php';

include 'assets/includes/database.inc.php';

/**
 * On doit analyser la demande faite via l'URL (GET) afin de déterminer si on souhaite récupérer les messages ou en écrire un
 
$task2 = "list2";

if(array_key_exists("task", $_GET)){
  $task2 = $_GET['task'];
}

if($task2 == "write"){
    postscore();
} else {
  getScore();
}

/**
 * Si on veut récupérer, il faut envoyer du JSON
 
function getScore(){
  global $conn;

  // 1. On requête la base de données pour sortir les 20 derniers messages
  $requetescore = 'SELECT Utilisateur.Pseudo, Utilisateur.Identifiant , Score.Score_de_la_partie, Score.Date_et_heure_de_la_partie
                    FROM Score
                    INNER JOIN Utilisateur ON Utilisateur.Identifiant = Score.Identifiant_du_joueur';
    $thescore = $conn -> prepare($requetescore);
    $thescore -> execute();

  // 3. On affiche les données sous forme de JSON
  echo json_encode($thescore->fetchAll());
}

/**
 * Si on veut écrire au contraire, il faut analyser les paramètres envoyés en POST et les sauver dans la base de données
 

function postscore(){
  global $conn;
  // 1. Analyser les paramètres passés en POST (author, content)
  
  if(!array_key_exists('contentscore', $_POST)){

    echo json_encode(["status" => "error", "score" => "One field have not been sent"]);
    return;

  }

  $contentscore = $_POST['contentscore'];

  // 2. Créer une requête qui permettra d'insérer ces données
  $query2 = $conn->prepare('INSERT INTO Score SET Identifiant_du_joueur = :joueur, Difficulte_de_la_partie = :difficulte, Score_de_la_partie=:score_Partie, Identifiant_du_jeu = :Identifiant_du_jeu, Date_et_heure_de_la_partie = NOW()');
  $query2->execute([
    "joueur" => $_SESSION['user']['Identifiant'],
    "score_Partie" => $contentscore,
    "Identifiant_du_jeu" => 2,
    "difficulte" => $$difficulter
  ]);

  // 3. Donner un statut de succes ou d'erreur au format JSON
  echo json_encode(["status" => "success"]);
}*/
?>