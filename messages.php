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

include_once './includes/sidebar.php'
?>
<div class="p-4 sm:ml-64">
    <div class="p-4 mt-14">
        <div class="flex h-screen">
            <!-- Sidebar -->
            <div class="flex-none w-64 bg-gray-100 border-r">
                <h2 class="text-lg font-medium px-4 py-2 bg-white border-b">Contacts récents</h2>
                <ul class="divide-y">
                    <li class="flex items-center px-4 py-2 hover:bg-gray-200 cursor-pointer">
                        <img class="h-8 w-8 rounded-full mr-2" src="https://randomuser.me/api/portraits/women/68.jpg" alt="Photo de profil de Jane Doe">
                        <span>Jane Doe</span>
                    </li>
                    <li class="flex items-center px-4 py-2 hover:bg-gray-200 cursor-pointer">
                        <img class="h-8 w-8 rounded-full mr-2" src="https://randomuser.me/api/portraits/men/42.jpg" alt="Photo de profil de John Doe">
                        <span>John Doe</span>
                    </li>
                    <li class="flex items-center px-4 py-2 hover:bg-gray-200 cursor-pointer">
                        <img class="h-8 w-8 rounded-full mr-2" src="https://randomuser.me/api/portraits/women/31.jpg" alt="Photo de profil de Bob Smith">
                        <span>Bob Smith</span>
                    </li>
                </ul>
            </div>

            <!-- Chat -->
            <div class="flex-1">
                <div class="h-16 bg-gray-100 border-b flex items-center justify-between px-4">
                    <img class="h-8 w-8 rounded-full mr-2" src="https://randomuser.me/api/portraits/men/42.jpg" alt="Photo de profil de John Doe">
                    <h2 class="text-lg font-medium">Conversation avec John Doe</h2>
                    <button class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Nouveau message</button>
                </div>
                <div class="h-full p-4">
                    <div class="flex flex-col">
                        <div class="flex items-start mb-4">
                            <img class="h-8 w-8 rounded-full mr-2" src="https://randomuser.me/api/portraits/men/42.jpg" alt="Photo de profil de John Doe">
                            <div class="bg-cyan-100 text-cyan-800 rounded-lg p-3">
                                <p>Salut, comment ça va ?</p>
                            </div>
                        </div>
                        <div class="flex items-end justify-end mb-4">
                            <div class="bg-indigo-100 text-indigo-800 rounded-lg p-3">
                                <p>Ça va bien, merci ! Et toi ?</p>
                            </div>
                            <img class="h-8 w-8 rounded-full ml-2" src="https://randomuser.me/api/portraits/women/68.jpg" alt="Photo de profil de Jane Doe">
                        </div>
                        <div class="flex items-start mb-4">
                            <img class="h-8 w-8 rounded-full mr-2" src="https://randomuser.me/api/portraits/men/42.jpg" alt="Photo de profil de John Doe">
                            <div class="bg-cyan-100 text-cyan-800 rounded-lg p-3">
                                <p>Je suis content de l'entendre !</p>
                                <p>Est-ce que tu veux sortir ce soir ?</p>
                            </div>
                        </div>
                        <div class="flex items-end justify-end mb-4">
                            <div class="bg-indigo-100 text-indigo-800 rounded-lg p-3">
                                <p>Désolé, je ne peux pas ce soir. Peut-être demain ?</p>
                            </div>
                            <img class="h-8 w-8 rounded-full ml-2" src="https://randomuser.me/api/portraits/women/68.jpg" alt="Photo de profil de Jane Doe">
                        </div>
                        <div class="flex items-center mt-4">
                            <textarea class="flex-1 resize-none border rounded-lg p-2 mr-2" placeholder="Votre message..."></textarea>
<!--                            <button class="border border-indigo-600 rounded-lg px-4 py-2 text-indigo-600 hover:bg-indigo-600 hover:text-white">Envoyer</button>-->
                            <button class="border border-indigo-600 rounded-lg px-4 py-2 text-indigo-600 hover:bg-indigo-600 hover:text-white transition duration-200">Envoyer</button>

                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>

</body>
</html>