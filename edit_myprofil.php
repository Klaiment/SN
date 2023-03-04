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


<form class="w-full max-w-lg">
    <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                Pseudo
            </label>
            <input name="pseudo" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-indigo-500" id="grid-first-name" type="text" placeholder="Pseudo" value="<?=$_SESSION['pseudo']?>">
        </div>
        <div class="w-full md:w-1/2 px-3">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                Adresse eMail
            </label>
            <input name="email" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-indigo-500" id="grid-last-name" type="email" placeholder="eMail" value="<?=$_SESSION['email']?>">
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
if (isset($_POST['submiter'])){

}
?>
</html>