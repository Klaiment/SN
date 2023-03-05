<!doctype html>
<html>
<head>
    <?php
    include './includes/dep.php';

    ?>
    <title>Mon Profil - FriendZ</title>
</head>
<body>
<?php

include_once './includes/sidebar.php'
?>

<div class="p-4 sm:ml-64">
    <div class="p-4 mt-14">
        <div class="relative">
            <!-- Bouton retour -->
            <button class="absolute top-4 left-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
            </button>
            <!-- Bannière -->
            <div class="relative">
            <div class="h-40 bg-cover bg-no-repeat bg-center" style="background-image: url(<?=$_SESSION['banniere']?>)"></div>
                <div class="absolute top-0 right-0 p-2">
                    <a href="/edit_photo.php">
                        <button class="bg-cyan-600 hover:bg-cyan-700 text-white font-bold py-2 px-4 rounded-full">
                            ⛰️ Modifier ma bannière
                        </button>
                    </a>
                </div>
            </div>
            <!-- Photo de profil -->
            <div class="relative">
            <img class="h-32 w-32 rounded-full object-cover absolute bottom-0 left-4 transform translate-y-1/2 border-2 border-white" src="<?=$_SESSION['avatar']?>" width="150">
                <div class="absolute top-0 right-0 p-2">
                    <a href="/edit_myprofil.php">
                        <button class="bg-cyan-600 hover:bg-cyan-700 text-white font-bold py-2 px-4 rounded-full">
                            ✏️ Modifier mon profil
                        </button>
                    </a>
                </div>
            </div>
            <!-- Nom d'utilisateur -->
            <h1 class="text-xl font-bold mt-4 ml-40 left-4"><?=$GetUsersInfos->GetUserName($_SESSION['id'])?> </h1>

        </div>

    </div>
</div>

</body>
</html>
