<link rel="icon" href="/assets/favicon2.PNG" type="image/png">
<?php
session_start();
$devmod = 1;
if ($devmod == 1){
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
}
include_once './app/GetUserPosts.php';
include_once './app/GetUsersInfos.php';
include_once './app/UpdateUsersinfos.php';
$GetUserPosts = new GetUserPosts();
$GetUsersInfos = new GetUsersInfos();
$UpdateUsersinfos = new UpdateUsersinfos();
if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
    //Compte connecté

/*    echo $_SESSION['id']."<br>";
    echo $_SESSION['pseudo']."<br>";
    echo $_SESSION['email']."<br>";
    echo $_SESSION['avatar']."<br>";*/

} else {
    //On renvoie vers la page de login
    if ($_SERVER['REQUEST_URI'] == "/login.php" || $_SERVER['REQUEST_URI'] == "/register.php") {
    }else{
        header('Location: login.php');
    }

}

?>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://cdn.tailwindcss.com"></script>
<script src="https://flowbite.com/docs/flowbite.min.js"></script>
<script src="https://flowbite.com/docs/datepicker.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.0/dist/alpine.min.js" defer></script>
<script src="https://cdn.jsdelivr.net/gh/alpine-collective/alpine-magic-helpers@0.3.x/dist/index.js"></script>
<script src="/dist/toasteur.min.js"></script>
<!--<script src="/src/caroussel.js"></script>-->
<link rel="stylesheet" href="/dist/themes/toasteur-default.min.css">
<link rel="stylesheet" href="/src/themes/carrousel.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    function createsuccess(txt) {
        new Toasteur().success(txt, 'Success!')
    }
    function createerror(txt) {
        new Toasteur().error(txt, 'Erreur !')
    }
</script>
<script>
    tailwind.config = {
        theme: {
            extend: {
                colors: {
                    clifford: '#da373d',
                    dev: '#245348'
                }
            }

        }
    }
</script>