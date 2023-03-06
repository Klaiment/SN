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
include_once './includes/sidebar.php'
?>
<style>
    #add-image-button:hover {
        color: #1da1f2;
    }

</style>
<div class="p-4 sm:ml-64">
    <div class="p-4 mt-14">

        <div class="mx-auto max-w-xs md:max-w-lg lg:max-w-2xl p-4 bg-white shadow-md rounded-lg overflow-hidden">
            <div class="flex items-center">
                <img src="<?=$_SESSION['avatar']?>" alt="Profile Picture" class="rounded-full mr-2 h-12 w-12">
                <h2 class="font-semibold text-gray-800"><?=$_SESSION['pseudo']?></h2>
                <p class="text-gray-500 text-sm ml-2">@<?=$_SESSION['pseudo']?></p>
            </div>
            <textarea class="w-full p-4 text-gray-700 border-b-2 border-gray-200 focus:outline-none focus:border-blue-500 resize-none" rows="4" placeholder="Quoi de neuf ?"></textarea>
            <div class="flex justify-between items-center p-4">
                <div>
                    <button class="bg-blue-500 text-white font-bold py-2 px-4 rounded-full focus:outline-none hover:bg-blue-600">Poster</button>
                </div>
                <div class="flex items-center">
                    <button class="text-gray-500 cursor-pointer mr-4" id="add-image-button">
                        📷
                    </button>
                    <div id="image-preview-container"></div>
                    <button class="text-gray-500 cursor-pointer" id="add-emoji-button">
                        😀
                    </button>
                </div>
            </div>
        </div>
<br>

        <div class="mx-auto max-w-xs md:max-w-lg lg:max-w-2xl bg-white shadow-md rounded-md p-4">
            <!-- Post header -->
            <div class="flex items-center">
                <img src="https://via.placeholder.com/48" alt="Profile Picture" class="rounded-full mr-2">
                <h2 class="font-semibold text-gray-800">John Doe</h2>
                <p class="text-gray-500 text-sm ml-2">@johndoe</p>
            </div>
            <!-- Post content -->
            <p class="text-gray-800 mt-4">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed quis semper lorem, euismod laoreet lorem.
            </p>
            <!-- Post photos -->
            <div class="mt-4">

                <div class="carousel-container">
                    <div class="carousel-wrapper">
                        <div class="carousel">
                            <img src="https://picsum.photos/590/350?random=1" alt="image 1">
                            <img src="https://picsum.photos/590/350?random=2" alt="image 2">
                            <img src="https://picsum.photos/590/350?random=3" alt="image 3">
                            <img src="https://picsum.photos/590/350?random=4" alt="image 4">
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


            </div>
            <!-- Post actions -->
            <div class="flex justify-between items-center mt-4">
                <!-- Like button -->
                <button class="flex items-center text-gray-500 hover:text-blue-500">
                    <span class="mr-2" role="img" aria-label="Like">❤️</span>
                    <span>20</span>
                </button>
                <!-- Comment button -->
                <button class="flex items-center text-gray-500 hover:text-blue-500">
                    <span class="mr-2" role="img" aria-label="Comment">💬</span>
                    <span>10</span>
                </button>
                <!-- Share button -->
                <button class="flex items-center text-gray-500 hover:text-blue-500">
                    <span class="mr-2" role="img" aria-label="Share">🔗</span>
                    <span>5</span>
                </button>
                <!-- Favorite button -->
                <button class="flex items-center text-gray-500 hover:text-blue-500">
                    <span class="mr-2" role="img" aria-label="Favorite">⭐️</span>
                    <span>3</span>
                </button>
            </div>
        </div>




    </div>
</div>
<script src="/src/caroussel.js"></script>
<script src="/src/addphoto.js"></script>
<script src="/src/emoji.js"></script>
</body>
</html>
