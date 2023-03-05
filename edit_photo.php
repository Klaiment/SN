<!doctype html>
<html>
<head>
    <?php
    include './includes/dep.php';

    ?>
    <title>Edition photos - FriendZ</title>
</head>
<body>
<?php

include_once './includes/sidebar.php'
?>
<style>
    .w-1200{
        width: 1200px;
    }
    .h-400{
        height: 400px;
    }
</style>
<div class="p-4 sm:ml-64">

        <h2 class="text-4xl font-extrabold dark:text-white">Edition des images</h2><br>
        <hr>
        <br>
        <form action="" method="post" enctype="multipart/form-data">
        <div class="flex items-center justify-center h-84 mb-4 rounded">
            <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 ml-2 sm:col-span-4 md:mr-3">
                <!-- Photo File Input -->
                <input type="file" name="newavatar" class="hidden" x-ref="photo" x-on:change="
                        photoName = $refs.photo.files[0].name;
                        const reader = new FileReader();
                        reader.onload = (e) => {
                            photoPreview = e.target.result;
                        };
                        reader.readAsDataURL($refs.photo.files[0]);
    ">

                <label class="block text-gray-700 text-sm font-bold mb-2 text-center" for="photo">
                    Photo de profil <span class="text-red-600"> </span>
                </label>

                <div class="text-center">
                    <!-- Current Profile Photo -->
                    <div class="mt-2" x-show="! photoPreview">
                        <img src="<?=$_SESSION['avatar']?>" class="w-40 h-40 m-auto rounded-full shadow">
                    </div>
                    <!-- New Profile Photo Preview -->
                    <div class="mt-2" x-show="photoPreview" style="display: none;">
            <span class="block w-40 h-40 rounded-full m-auto shadow" x-bind:style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + photoPreview + '\');'" style="background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url('null');">
            </span>
                    </div>
                    <button type="button" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-400 focus:shadow-outline-blue active:text-gray-800 active:bg-gray-50 transition ease-in-out duration-150 mt-2 ml-3" x-on:click.prevent="$refs.photo.click()">
                        Choisir une photo
                    </button>
                    <button type="submit" name="submitavatar" class="inline-flex items-center px-4 py-2 bg-cyan-700 border border-gray-300 rounded-md font-semibold text-xs text-white uppercase tracking-widest shadow-sm hover:text-cyan-300 focus:outline-none focus:border-blue-400 focus:shadow-outline-blue active:text-gray-800 active:bg-gray-50 transition ease-in-out duration-150 mt-2 ml-3">
                        Sauvegarder
                    </button>
                </div>
            </div>
        </div>
    </form>
        <hr>

        <form action="" method="post" enctype="multipart/form-data">
            <div class="flex items-center justify-center h-84 mb-4 rounded">
                <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 ml-2 sm:col-span-4 md:mr-3">
                    <!-- Photo File Input -->
                    <input type="file" name="newbanner" class="hidden" x-ref="photo" x-on:change="
                        photoName = $refs.photo.files[0].name;
                        const reader = new FileReader();
                        reader.onload = (e) => {
                            photoPreview = e.target.result;
                        };
                        reader.readAsDataURL($refs.photo.files[0]);
    ">

                    <label class="block text-gray-700 text-sm font-bold mb-2 text-center" for="photo">
                        Bannière <span class="text-red-600"> </span>
                    </label>

                    <div class="text-center">
                        <!-- Current Profile Photo -->
                        <div class="mt-2" x-show="! photoPreview">
                        <span class="block w-1200 h-400 m-auto shadow" x-bind:style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(<?=$_SESSION['banniere']?>);'" style="background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url('null');">

                        </div>
                        <!-- New Profile Photo Preview -->
                        <div class="mt-2" x-show="photoPreview" style="display: none;">
            <span class="block w-1200 h-400 m-auto shadow" x-bind:style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + photoPreview + '\');'" style="background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url('null');">
            </span>
                        </div>
                        <button type="button" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-400 focus:shadow-outline-blue active:text-gray-800 active:bg-gray-50 transition ease-in-out duration-150 mt-2 ml-3" x-on:click.prevent="$refs.photo.click()">
                            Choisir une bannière
                        </button>
                        <button type="submit" name="submitbanniere" class="inline-flex items-center px-4 py-2 bg-cyan-700 border border-gray-300 rounded-md font-semibold text-xs text-white uppercase tracking-widest shadow-sm hover:text-cyan-300 focus:outline-none focus:border-blue-400 focus:shadow-outline-blue active:text-gray-800 active:bg-gray-50 transition ease-in-out duration-150 mt-2 ml-3">
                            Sauvegarder
                        </button>
                    </div>
                </div>
            </div>
        </form>


    </div>
</div>
<?php
if(isset($_POST['submitbanniere'])){
    if(isset($_FILES['newbanner'])){
        $newbanner = $_FILES['newbanner'];

        // Vérifie si un fichier a été sélectionné
        if(!empty($newbanner['name'])){
            $filename = basename($newbanner['name']);
            $target_dir = "C:\\xampp\htdocs\users\banniere\\";
            $target_file = $target_dir . $filename;

            // Vérifie si le fichier est une image valide
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            $valid_extensions = array("jpg", "jpeg", "png", "gif");
            if(in_array($imageFileType, $valid_extensions)){

                // Vérifie si le fichier a été téléchargé avec succès
                if(move_uploaded_file($newbanner['tmp_name'], $target_file)){
                    $UpdateUsersinfos->UpdateBanneer($_SESSION['id'],$filename);
                    $GetUsersInfos->ReloadSession($_SESSION['id']);
                    echo "Le fichier a été téléchargé avec succès.";
                }else{
                    echo "Une erreur s'est produite lors du téléchargement du fichier.";
                }
            }else{
                echo "Seuls les fichiers JPG, JPEG, PNG et GIF sont autorisés.";
            }
        }else{
            echo "Veuillez sélectionner un fichier à télécharger.";
        }
    }else{
        echo "Une erreur s'est produite lors de l'envoi du formulaire.";
    }
}
if(isset($_POST['submitavatar'])){
    if(isset($_FILES['newavatar'])){
        $newavatar = $_FILES['newavatar'];

        // Vérifie si un fichier a été sélectionné
        if(!empty($newavatar['name'])){
            $filename = basename($newavatar['name']);
            $target_dir = "C:\\xampp\htdocs\users\avatar\\";
            $target_file = $target_dir . $filename;

            // Vérifie si le fichier est une image valide
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            $valid_extensions = array("jpg", "jpeg", "png", "gif");
            if(in_array($imageFileType, $valid_extensions)){

                // Vérifie si le fichier a été téléchargé avec succès
                if(move_uploaded_file($newavatar['tmp_name'], $target_file)){
                    $UpdateUsersinfos->UpdateAvatar($_SESSION['id'],$filename);
                    $GetUsersInfos->ReloadSession($_SESSION['id']);
                    echo "Le fichier a été téléchargé avec succès.";
                    echo "<script>createsuccess('Avatar !')</script>";
                    echo '<meta http-equiv="refresh" content="0">';
                }else{
                    echo "Une erreur s'est produite lors du téléchargement du fichier.";
                }
            }else{
                echo "Seuls les fichiers JPG, JPEG, PNG et GIF sont autorisés.";
            }
        }else{
            echo "Veuillez sélectionner un fichier à télécharger.";
        }
    }else{
        echo "Une erreur s'est produite lors de l'envoi du formulaire.";
    }
}
?>


</body>
</html>