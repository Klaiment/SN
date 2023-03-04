<head>
    <?php

    include 'includes/dep.php';
    if (isset($_SESSION['id'])){
        header('Location: /');
    }
    echo "<title>Connexion - FriendZ</title>";
    ?>
</head>
<body class="bg-gray-100">
<div class="flex min-h-full items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="w-full max-w-md space-y-8">
        <div>
            <img class="mx-auto h-48 w-auto" src="/assets/logo2.PNG" alt="FriendZ">
            <h2 class="mt-6 text-center text-3xl font-bold tracking-tight text-gray-900"></h2>

        </div>
        <form class="mt-8 space-y-6" action="#" method="POST">
            <input type="hidden" name="remember" value="true">
            <div class="-space-y-px rounded-md shadow-sm">
                <div>
                    <label for="email-address" class="sr-only">Adresse email</label>
                    <input id="email-address" name="email" type="email" autocomplete="email" required class="relative block w-full appearance-none rounded-none rounded-t-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="Adresse email">
                </div>
                <div>
                    <label for="password" class="sr-only">Password</label>
                    <input id="password" name="password" type="password" autocomplete="current-password" required class="relative block w-full appearance-none rounded-none rounded-b-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="Mot de passe">
                </div>
            </div>

            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <input id="remember-me" name="remember-me" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                    <label for="remember-me" class="ml-2 block text-sm text-gray-900">Rester connecter</label>
                </div>

                <div class="text-sm">
                    <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">Mot de passe oublier?</a>
                </div>
            </div>

            <div>
                <button type="submit" name="submiter" class="group relative flex w-full justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
          <span class="absolute inset-y-0 left-0 flex items-center pl-3">
            <svg class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
              <path fill-rule="evenodd" d="M10 1a4.5 4.5 0 00-4.5 4.5V9H5a2 2 0 00-2 2v6a2 2 0 002 2h10a2 2 0 002-2v-6a2 2 0 00-2-2h-.5V5.5A4.5 4.5 0 0010 1zm3 8V5.5a3 3 0 10-6 0V9h6z" clip-rule="evenodd" />
            </svg>
          </span>
                    Se connecter
                </button>
            </div>
            <div>
            <a href="/register.php"><button type="button" class="group relative flex w-full justify-center rounded-md border border-transparent bg-cyan-600 py-2 px-4 text-sm font-medium text-white hover:bg-cyan-700 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:ring-offset-2">
          <span class="absolute inset-y-0 left-0 flex items-center pl-3">
            <svg class="h-5 w-5 text-cyan-500 group-hover:text-cyan-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z" />

            </svg>
          </span>
                    S'inscrire
                </button>
            </a>
            </div>
        </form>
    </div>
</div>
</body>

<?php
if (isset($_POST['submiter'])){
    //check si on envoie le formulaire
        //verification que email complet
        if (isset($_POST['email']) && !empty($_POST['email'])){
            //verification que password complet
            if (isset($_POST['password']) && !empty($_POST['password'])){
                include_once 'includes/mysql.php';
                $password = sha1($_POST['password']);
                $request = "SELECT * FROM users WHERE email = :email";
                $req = $conn->prepare($request);
                $req->bindParam(':email',$_POST['email']);
                $req->execute();
                if ($req->rowCount() > 0){

                    $data = $req->fetch();
                    if ($data['password'] == $password){
                        $_SESSION['id'] = $data['id'];
                        $GetUsersInfos->ReloadSession($_SESSION['id']);
                        echo "<script>createsuccess('Connexion en cours...')</script>";
                        echo '<meta http-equiv="refresh" content="1;URL=/">';
                    }else{
                        echo "<script>createerror('Mot de passe incorrect')</script>";
                    }
                }else{
                    echo "<script>createerror('Aucun compte n\'existe')</script>";
                }

            }else{
                // Erreur Pseudo => Notif
                echo "<script>createerror('Merci de remplir votre mot de passe !')</script>";
            }
        }else{
            // Erreur email => Notif
            echo "<script>createerror('Merci de remplir votre mail !')</script>";
        }



}
?>