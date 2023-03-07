<!doctype html>
<html>
<head>
    <?php
    include './includes/dep.php';

    ?>
    <title>Messages - FriendZ</title>
</head>
<body>
<?php

include_once './includes/sidebar.php';
include_once './includes/mysql.php';
?>
<div class="p-4 sm:ml-64">
    <div class="p-4 mt-14">
        <!-- Modal -->
        <div id="newmsgbox" class="fixed z-10 inset-0 overflow-y-auto hidden">
            <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                    <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                </div>
                <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="mb-4">
                            <label for="search-input" class="block text-gray-700 font-bold mb-2">Rechercher un utilisateur:</label>
                            <input type="text" id="search-input" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Entrez un nom d'utilisateur">
                        </div>
                        <div id="search-results" class="hidden">
                            <!-- Résultats de la recherche seront ajoutés ici -->
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <button id="btn-close-modal" class="w-full sm:w-auto bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue ml-3">
                            Fermer
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex h-screen">
            <!-- Sidebar -->
            <div class="flex-none w-64 bg-gray-100 border-r">
                <h2 class="text-lg font-medium px-4 py-2 bg-white border-b">Contacts récents</h2>
                <ul class="divide-y">
                    <?php
                    $id = $_SESSION['id'];
                    $get_recent = $conn->prepare("SELECT DISTINCT sid, rid FROM messages WHERE sid = $id || rid = $id ORDER BY id DESC");
                    $get_recent->execute();

                    while ($convs = $get_recent->fetch()){
                        if ($convs['rid'] == $id){
                            $otheruser = $convs['sid'];
                        }else{
                            $otheruser = $convs['rid'];
                        }
                        $sid = $convs['sid'];
                        $fid = $convs['rid'];
                    ?>
                    <li class="flex items-center px-4 py-2 hover:bg-gray-200 cursor-pointer">
                        <img class="h-8 w-8 rounded-full mr-2" src="<?=$GetUsersInfos->GetUserAvatar($otheruser)?>" alt="Photo de profil de <?=$GetUsersInfos->GetUserName($otheruser)?>">
                        <span><?=$GetUsersInfos->GetUserName($otheruser)?></span>
                    </li>
                    <?php
                    }
                    ?>
                </ul>
            </div>

            <!-- Chat -->
            <div class="flex-1">
                <div class="h-16 bg-gray-100 border-b flex items-center justify-between px-4">
                    <img class="h-8 w-8 rounded-full mr-2" src="<?=$GetUsersInfos->GetUserAvatar($otheruser)?>" alt="Photo de profil de John Doe">
                    <h2 class="text-lg font-medium">Conversation avec <?=$GetUsersInfos->GetUserName($otheruser)?></h2>
                    <button class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600" id="btn-open-modal" type="button">Nouveau message</button>
                </div>

                <div class="h-full p-4">
                    <div class="flex flex-col">
                        <div id="refresher">

                        </div>
                        <form action="" id="message" method="post">
                        <div class="flex items-center mt-4">
                                <textarea class="flex-1 resize-none border rounded-lg p-2 mr-2" name="message_envoie" id="message_envoie" placeholder="Votre message..."></textarea>
                                <button class="border border-indigo-600 rounded-lg px-4 py-2 text-indigo-600 hover:bg-indigo-600 hover:text-white transition duration-200" type="submit">Envoyer</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
<script>
    function rafraichir() {
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                document.getElementById("refresher").innerHTML = xhr.responseText;
            }
        };
        xhr.open("GET", "app_message.php?rid=<?=$fid?>", true);
        xhr.send();
    }
    setInterval(rafraichir, 1000); // Rafraîchir toutes les 5 secondes

    document.getElementById("message").addEventListener("submit", function(event) {
        // Empêcher le rechargement de la page par défaut
        event.preventDefault();
        var message = document.getElementById('message_envoie').value;
        const xhr = new XMLHttpRequest();
        xhr.open('POST', '/includes/function.php');
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onload = function() {
            console.log(xhr.responseText)

        };
        xhr.send('action=newmp&sid='+<?=$_SESSION['id']?>+'&rid='+<?=$otheruser?>+'&message='+message);
        document.getElementById("message_envoie").value="";
    });

    // Écouteur d'événements pour ouvrir le modal
    document.getElementById("btn-open-modal").addEventListener("click", function() {
        // Charger le fichier JSON à chaque fois que le bouton est cliqué
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                document.getElementById("refresher").innerHTML = xhr.responseText;
            }
        };
        xhr.open("GET", "/includes/function.php?action=refreshjson", true);
        xhr.send();
        fetch("/includes/users.json")
            .then(response => response.json())
            .then(users => {
                // Afficher le modal
                document.getElementById("newmsgbox").classList.remove("hidden");

                // Récupérer la barre de recherche
                const searchInput = document.getElementById("search-input");

                // Ajouter un écouteur d'événements pour actualiser les résultats de recherche à chaque fois que l'utilisateur tape dans la barre de recherche
                searchInput.addEventListener("input", function() {
                    // Récupérer la valeur de la barre de recherche
                    const searchTerm = searchInput.value.toLowerCase().trim();

                    // Filtrer les utilisateurs dont le pseudo correspond à la valeur de la barre de recherche
                    const filteredUsers = users.filter(user => user.pseudo.toLowerCase().includes(searchTerm));

                    // Afficher les résultats de la recherche
                    const searchResults = document.getElementById("search-results");
                    searchResults.innerHTML = "";

                    if (filteredUsers.length > 0) {
                        filteredUsers.forEach(user => {
                            const resultItem = document.createElement("div");
                            resultItem.classList.add("px-4", "py-3", "text-gray-700", "hover:bg-gray-100", "cursor-pointer");
                            resultItem.textContent = user.pseudo;
                            resultItem.addEventListener("click", function() {
                                searchInput.value = "";
                                searchInput.placeholder = "";
                                searchInput.style.display = "none";
                                const textarea = document.createElement("textarea");
                                textarea.classList.add("shadow", "appearance-none", "border", "rounded", "w-full", "py-2", "px-3", "text-gray-700", "leading-tight", "focus:outline-none", "focus:shadow-outline");
                                textarea.placeholder = "Votre message à " + user.pseudo + "...";
                                const searchBox = document.getElementById("search-box");
                                searchBox.innerHTML = "";
                                searchBox.appendChild(textarea);
                            });
                            searchResults.appendChild(resultItem);
                        });
                        searchResults.classList.remove("hidden");
                    } else {
                        searchResults.classList.add("hidden");
                    }
                });

                // Ajouter un écouteur d'événements pour fermer le modal
                document.getElementById("btn-close-modal").addEventListener("click", function() {
                    document.getElementById("newmsgbox").classList.add("hidden");
                    searchInput.value = "";
                    searchInput.placeholder = "Entrez un nom d'utilisateur";
                    searchInput.style.display = "block";
                    const searchBox = document.getElementById("search-box");
                    searchBox.innerHTML = "Rechercher un utilisateur:";
                    document.getElementById("search-results").classList.add("hidden");
                });
            });
    });



</script>
</body>
</html>