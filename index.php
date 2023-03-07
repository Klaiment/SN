<!doctype html>
<html>
<head>
    <?php
    include 'includes/dep.php';
    ?>
</head>
<body>
<?php
echo "<title>Accueil - FriendZ</title>";
include_once './includes/sidebar.php';
include_once 'includes/mysql.php';
?>
<style>
    #add-image-button:hover {
        color: #1da1f2;
    }

</style>
<div class="p-4 sm:ml-64">
    <div class="p-4 mt-14">
        <div class="">

            <form class="mx-auto max-w-xs md:max-w-lg lg:max-w-2xl p-4 rounded-lg overflow-hidden bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" method="POST" enctype="multipart/form-data">
                <div class="mb-4">
                    <!-- Post header -->
                    <div class="flex items-center">
                        <img src="<?=$_SESSION['avatar']?>" alt="Profile Picture" class="rounded-full mr-2 w-12 h-12">
                        <h2 class="font-semibold text-gray-800"><?=$_SESSION['pseudo']?></h2>
                        <p class="text-gray-500 text-sm ml-2">@<?=$_SESSION['pseudo']?></p>
                    </div><br>
                    <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="message" placeholder="Comment allez-vous ?" name="message" rows="3" required></textarea>
                </div>
                <div id="image-preview-container" class="flex flex-wrap mt-2"></div>

                <div class="flex items-center justify-between">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" name="newpostsub">
                        Publier
                    </button>
                    <div class="relative mb-4">
                        <button class=" text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline inline-flex items-center" type="button" id="emoji-button">
                            <span class="text-2xl mr-2">😀</span>
                            <span class="mr-1">Emoji</span>
                        </button>
                        <div class="absolute z-10 hidden" id="emoji-dropdown">
                            <div class="bg-white border border-gray-300 rounded-lg py-2 px-4">
                                <div class="grid grid-cols-5 gap-2">
                                    <button class="emoji" type="button" value="😀">😀</button>
                                    <button class="emoji" type="button" value="😁">😁</button>
                                    <button class="emoji" type="button" value="😂">😂</button>
                                    <button class="emoji" type="button" value="🤣">🤣</button>
                                    <button class="emoji" type="button" value="😃">😃</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="relative mb-4">
                        <button class="bg-gray-200 text-gray-700 font-bold py-2 px-4 rounded inline-flex items-center" type="button" id="image-button">
                            <span class="text-lg mr-2">Ajouter une image 🖼 </span>
                        </button>
                        <input type="file" accept="image/*" class="hidden" name="images[]" id="image-input" multiple>
                    </div>


                </div>

            </form>
        </div>

<br>
<?php
    $getAllPosts = $conn->prepare("SELECT * FROM posts ORDER BY id DESC");
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
<?php
    if (isset($_POST['newpostsub'])){
        if (isset($_POST['message']) && !empty($_POST['message'])){

            $message = $_POST['message'];
            if(isset($_FILES['images'])){
                $errors = array();
                $path = 'C:\xampp\htdocs\posts\\';
                $random = mt_rand(1111111, 9999999);
                $timestamp = time();
                $images_data = array();
                foreach($_FILES['images']['tmp_name'] as $key => $tmp_name){
                    $file_name = $_FILES['images']['name'][$key];
                    $file_tmp = $_FILES['images']['tmp_name'][$key];
                    if(!empty($file_name)){
                        $file_extension = pathinfo($file_name, PATHINFO_EXTENSION);
                        $new_file_name = hash('sha256', $file_name.$timestamp.$random).'.'.$file_extension;
                        move_uploaded_file($file_tmp, $path.$new_file_name);
                        $image_data = array(
                            'location' => '/posts/'.$new_file_name
                        );
                        $images_data[] = $image_data;
                    }
                }
                $json = json_encode($images_data);

                // Ajouter les données dans la base de données
                $ajoutmessage = "INSERT INTO posts (user_id, message, images) VALUES (:uid, :message, :images)";
                $request_ajmsg = $conn->prepare($ajoutmessage);
                $request_ajmsg->bindParam(':uid', $_SESSION['id']);
                $request_ajmsg->bindParam(':message', $message);
                $request_ajmsg->bindParam(':images', $json);
                $request_ajmsg->execute();
            }else{
                $ajoutmessage = "INSERT INTO posts (user_id,message) VALUES (':uid',':message')";
                $request_ajmsg = $conn->prepare($ajoutmessage);
                $request_ajmsg->bindParam(':uid',$_SESSION['id']);
                $request_ajmsg->bindParam(':message',$message);
            }

        }else{
            echo "<script>createerror('Merci de remplir correctement votre message')</script>";
        }
    }

?>
</html>
