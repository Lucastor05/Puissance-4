<?php
include 'init_session.php';

include 'assets/includes/database.inc.php';

/**
 * On doit analyser la demande faite via l'URL (GET) afin de déterminer si on souhaite récupérer les messages ou en écrire un
 */
$task = "list";

if(array_key_exists("task", $_GET)){
  $task = $_GET['task'];
}

if($task == "write"){
  postMessage();
} else {
  getMessages();
}

/**
 * Si on veut récupérer, il faut envoyer du JSON
 */
function getMessages(){
  global $conn;

  // 1. On requête la base de données pour sortir les 20 derniers messages
  $requeteallMessages = 'SELECT Utilisateur.Pseudo, Utilisateur.Identifiant , Messages.Message_content, Messages.Date_et_heure_du_message
                    FROM Messages
                    INNER JOIN Utilisateur ON Utilisateur.Identifiant = Messages.Identifiant_de_expediteur
                    WHERE Messages.Date_et_heure_du_message >= NOW() - INTERVAL 1 DAY;';
    $allMessages = $conn -> prepare($requeteallMessages);
    $allMessages -> execute();

  // 3. On affiche les données sous forme de JSON
  echo json_encode($allMessages->fetchAll());
}

/**
 * Si on veut écrire au contraire, il faut analyser les paramètres envoyés en POST et les sauver dans la base de données
 */

function postMessage(){
  global $conn;
  // 1. Analyser les paramètres passés en POST (author, content)
  
  if(!array_key_exists('content', $_POST)){

    echo json_encode(["status" => "error", "message" => "One field have not been sent"]);
    return;

  }

  $Message_content = $_POST['content'];

  // 2. Créer une requête qui permettra d'insérer ces données
  $query = $conn->prepare('INSERT INTO Messages SET Identifiant_de_expediteur = :author, Message_content = :content, Identifiant_du_jeu = :Identifiant_du_jeu, Date_et_heure_du_message = NOW()');
  $query->execute([
    "author" => $_SESSION['user']['Identifiant'],
    "content" => $Message_content,
    "Identifiant_du_jeu" => 2
  ]);

  // 3. Donner un statut de succes ou d'erreur au format JSON
  echo json_encode(["status" => "success"]);
}
/**
 * Voilà c'est tout en gros.
 */