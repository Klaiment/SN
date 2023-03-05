<!doctype html>
<html>
<head>
    <?php
    include './includes/dep.php';

    ?>
    <title>Edition du Profil - FriendZ</title>
</head>
<body>
<?php

include_once './includes/sidebar.php'
?>
<div class="p-4 sm:ml-64">
    <div class="p-4 mt-14">
        <h2 class="text-4xl font-extrabold dark:text-white">Edition du profil</h2><br>
        <hr>
        <br>
        <div class="flex items-center justify-center h-84 mb-4 rounded">


<form class="w-full max-w-lg" method="post">
    <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                Pseudo
            </label>
            <input name="pseudo" id="pseudo" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-indigo-500" id="grid-first-name" type="text" placeholder="Pseudo" value="<?=$_SESSION['pseudo']?>">
        </div>
        <div class="w-full md:w-1/2 px-3">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                Adresse eMail
            </label>
            <input name="email" id="email" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-indigo-500" id="grid-last-name" type="email" placeholder="eMail" value="<?=$_SESSION['email']?>">
        </div>
    </div>
    <div class="flex items-start mb-6">
        <div class="flex items-center h-5">
            <input id="changepassword" onclick="checkbox()" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800">
        </div>
        <label for="changepassword" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Modifier le mot de passe</label>
    </div>
    <div class="flex flex-wrap -mx-3 mb-6" id="passwordchanger">
        <div class="w-full px-3">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                Mot de passe
            </label>
            <input name="password1" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-indigo-500" id="grid-password" type="password" placeholder="******************">
        </div>
        <div class="w-full px-3">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                Re tapez le mot de passe
            </label>
            <input name="password2" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-indigo-500" id="grid-password" type="password" placeholder="******************">
        </div>
    </div>
    <div class="flex items-center justify-center">
        <button class="bg-cyan-600 hover:bg-cyan-700 text-white font-bold py-2 px-4 rounded-full " type="submit" name="submiter">
            💾 Sauvegarder les modifications
        </button>
    </div><br>
    <div class="flex items-center justify-center">
        <a href="<?=$_SERVER['HTTP_REFERER']?>">
            <button class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-full " type="button">
                ❌ Annuler
            </button>
        </a>
    </div>
</form>
    </div>
</div>
</div>

</body>
<script>
    function checkbox() {
        let statecheck = document.getElementById('changepassword').checked;
        let password = document.getElementById('passwordchanger');
        if (statecheck == true){
            password.style.display = 'block';
        }else{
            password.style.display = 'none';
        }
        console.log();
    }
    checkbox();
</script>
<?php
$uid = $_SESSION['id'];
if (isset($_POST['submiter'])){
    if (isset($_POST['pseudo']) && !empty($_POST['pseudo'])){
        if (isset($_POST['email']) && !empty($_POST['email'])){
            if ($_POST['pseudo'] != $_SESSION['pseudo']){
                $new_pseudo = $_POST['pseudo'];
                $UpdateUsersinfos->UpdatePseudo($uid, $new_pseudo);
                $GetUsersInfos->ReloadSession($_SESSION['id']);
                echo "<script>createsuccess('Pseudo changé !')</script>";
                echo "<script>
                        document.getElementById('pseudo').value = '$new_pseudo';
                      </script>";

            }
            if ($_POST['email'] != $_SESSION['email']){
                $new_email = $_POST['email'];
                $UpdateUsersinfos->UpdateEmail($uid, $new_email);
                $GetUsersInfos->ReloadSession($_SESSION['id']);
                echo "<script>createsuccess('eMail changé !')</script>";
            }
            if (isset($_POST['password1']) && !empty($_POST['password1'])){
                if (isset($_POST['password2']) && !empty($_POST['password2'])){
                    if ($_POST['password1'] == $_POST['password2']){
                        $new_password = $_POST['password1'];
                        $new_password = sha1($new_password);
                        $UpdateUsersinfos->UpdatePassword($uid, $new_password);
                        $GetUsersInfos->ReloadSession($_SESSION['id']);
                        echo "<script>createsuccess('Mot de passe changé !')</script>";
                    }else{
                        echo "<script>createerror('Merci d\'entrer de mots de passe identiques ')</script>";
                    }
                }
            }
        }else{
            echo "<script>createerror('Merci d\'entrer un email correct ')</script>";
        }
    }else{
        echo "<script>createerror('Merci d\'entrer un pseudo correct ')</script>";
    }
//    echo "<script>createsuccess('Connexion en cours...')</script>";
}
?>
</html>