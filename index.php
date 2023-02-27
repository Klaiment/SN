<!doctype html>
<html>
<head>
    <?php
    include 'includes/dep.php';
    ?>
</head>
<?php
if (isset($_SESSION['id']) && !empty($_SESSION['id'])){
    //Compte connecté
}else{
    //On renvoie vers la page de login
//    include 'login.php';
header('Location: login.php');
}
?>
</html>
