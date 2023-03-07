<?php
include 'mysql.php';
include_once '../app/Like.php';
include_once '../app/MP.php';
include_once '../app/Notification.php';
$Like = new Like();
$MP = new MP();
$Notif = new Notification();
if (isset($_POST['action']) && $_POST['action'] == 'like') {
    $Like->Liker($_POST['uid'],$_POST['pid']);
}

if (isset($_POST['action']) && $_POST['action'] == 'notifviewed') {
    $Notif->Viewed($_POST['notifid']);
}

if (isset($_POST['action']) && $_POST['action'] == 'newmp') {
    $MP->newMP($_POST['sid'],$_POST['rid'],$_POST['message']);
}

if (isset($_GET['action']) && $_GET['action'] == 'refreshjson') {
// Requête pour récupérer les données des utilisateurs
    $refreshjson = $conn->prepare("SELECT id, avatar, pseudo FROM users");
    $refreshjson->execute();

// Récupérer les résultats de la requête
    $users = $refreshjson->fetchAll(PDO::FETCH_ASSOC);

// Convertir les résultats en format JSON
    $jsonData = json_encode($users);

// Stocker les données dans un fichier JSON
    file_put_contents("users.json", $jsonData);

}