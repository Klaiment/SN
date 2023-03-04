<link rel="icon" href="/assets/favicon2.PNG" type="image/png">
<?php
session_start();
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

<script src="/dist/toasteur.min.js"></script>
<link rel="stylesheet" href="/dist/themes/toasteur-default.min.css">
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