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

include_once './includes/sidebar.php';
if (isset($_GET['id']) && !empty($_GET['id'])){
    $id = $_GET['id'];
}else{
    echo '<meta http-equiv="refresh" content="0; URL=/">';
}
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
                <div class="h-40 bg-cover bg-no-repeat bg-center" style="background-image: url(<?=$GetUsersInfos->GetUserBanniere($id)?>)"></div>
            </div>
            <!-- Photo de profil -->
            <div class="relative">
                <img class="h-32 w-32 rounded-full object-cover absolute bottom-0 left-4 transform translate-y-1/2 border-2 border-white" src="<?=$GetUsersInfos->GetUserAvatar($id)?>" width="150">
            </div>
            <!-- Nom d'utilisateur -->
            <h1 class="text-xl font-bold mt-4 ml-40 left-4"><?=$GetUsersInfos->GetUserName($id)?> </h1>

        </div>

    </div>
</div>

<div class="p-4 sm:ml-64">
    <div class="p-4 mt-14">

<?php
$getAllPosts = $conn->prepare("SELECT * FROM posts WHERE user_id = $id ORDER BY id DESC");
$getAllPosts->execute();

while ($post = $getAllPosts->fetch()){
    ?>
    <div class="mx-auto max-w-xs md:max-w-lg lg:max-w-2xl bg-white shadow-md rounded-md p-4">
        <!-- Post header -->
        <a href="/profil.php?id=<?=$post['user_id']?>">
            <div class="flex items-center">
                <img src="<?=$GetUsersInfos->GetUserAvatar($post['user_id'])?>" alt="Profile Picture" class="rounded-full mr-2 w-12 h-12">
                <h2 class="font-semibold text-gray-800"><?=$GetUsersInfos->GetUserName($post['user_id'])?></h2>
                <p class="text-gray-500 text-sm ml-2">@<?=$GetUsersInfos->GetUserName($post['user_id'])?></p>
            </div>
        </a>
        <!-- Post content -->
        <p class="text-gray-800 mt-4">
            <?=$post['message']?>
        </p>
        <!-- Post photos -->
        <div class="mt-4">

            <?php


            if ($post['images'] != "[]"){
                $images_post = json_decode($post['images'], true);
                ?>
                <div class="carousel-container">
                    <div class="carousel-wrapper">
                        <div class="carousel">
                            <?php
                            for ($i = 0; $i < count($images_post); $i++){
                                $url_image_post = $images_post[$i]['location'];
                                echo "<img src='$url_image_post' alt='image $i'>";
                            }
                            ?>
                        </div>
                        <button class="arrow-btn-prev prev">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M13.293 3.293a1 1 0 0 0-1.414 0L6.707 8.586a1 1 0 0 0 0 1.414L11.88 15.88a1 1 0 1 0 1.414-1.414L9.914 10l4.586-4.586a1 1 0 0 0 0-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                        <button class="arrow-btn-next next">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M6.707 16.707a1 1 0 0 0 1.414 0L13.293 11.42a1 1 0 0 0 0-1.414L8.12 3.12a1 1 0 1 0-1.414 1.414L10.086 10l-4.586 4.586a1 1 0 0 0 0 1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                </div>
                <?php
            }
            ?>


        </div>
        <!-- Post actions -->
        <div class="flex justify-between items-center mt-4">
            <!-- Like button -->
            <button class="flex items-center text-gray-500 hover:text-blue-500">
                <span class="mr-2" role="img" aria-label="Like">❤️</span>
                <span><?=$post['likes']?></span>
            </button>
            <!-- Comment button -->
            <button class="flex items-center text-gray-500 hover:text-blue-500">
                <span class="mr-2" role="img" aria-label="Comment">💬</span>
                <span><?=$post['comment']?></span>
            </button>
            <!-- Share button -->
            <button class="flex items-center text-gray-500 hover:text-blue-500">
                <span class="mr-2" role="img" aria-label="Share">🔗</span>
                <span><?=$post['share']?></span>
            </button>
            <!-- Favorite button -->
            <button class="flex items-center text-gray-500 hover:text-blue-500">
                <span class="mr-2" role="img" aria-label="Favorite">⭐️</span>
            </button>
        </div>
    </div>
    <br>
    <?php
}
?>
    </div>
</div>
<script src="/src/caroussel.js"></script>
<script src="/src/addphoto.js"></script>
<script src="/src/emoji.js"></script>
</body>
</html>
