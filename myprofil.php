<!doctype html>
<html>
<head>
    <?php
    include './includes/dep.php';
    include_once './app/GetUserPosts.php';
    $GetUserPosts = new GetUserPosts();
    ?>
</head>
<body>
<?php
echo "<title>Accueil - FriendZ</title>";
include_once './includes/sidebar.php'
?>

<div class="p-4 sm:ml-64">
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">
        <div class="relative">
            <!-- Bouton retour -->
            <button class="absolute top-4 left-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
            </button>
            <!-- Bannière -->
            <div class="h-40 bg-gray-400"></div>
            <!-- Photo de profil -->
            <img class="h-34 w-34 rounded-full object-cover absolute bottom-0 left-4 transform translate-y-1/2 border-4 border-white" src="<?=$_SESSION['avatar']?>" width="150">
            <!-- Nom d'utilisateur -->
            <h1 class="text-xl font-bold mt-4 ml-28">John Doe</h1>
        </div>

    </div>
</div>

</body>
</html>
