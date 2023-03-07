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
        <table class="table-fixed">
            <thead>
            <tr>
                <th>Type</th>
                <th>Notification</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
        <?php
        $myid = $_SESSION['id'];
        $getAllNotifs = $conn->prepare("SELECT * FROM notification WHERE rid = $myid ORDER BY id DESC");
        $getAllNotifs->execute();
        while ($notifs = $getAllNotifs->fetch()){
            ?>

            <tr id="<?=$notifs['id']?>">
                <td>
                    <?php
                    if ($notifs['type'] == 'msg'){
                        echo '💬';
                    }elseif ($notifs['type'] == 'like'){
                        echo '❤️';
                    }
                    ?>
                </td>
                <td>
                    <?php
                    if ($notifs['type'] == 'msg'){
                        echo "Vous avez recu un message de ";
                    }elseif ($notifs['type'] == 'like'){
                        echo '❤️';
                    }
                    ?>
                </td>
                <td><button type="button" onclick="suppnotif(<?=$notifs['id']?>)" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                        Vue
                    </button></td>
            </tr>

        <?php
        }
        ?>
        </tbody>
        </table>


    </div>
</div>
</body>
<script>
    function suppnotif(id) {
        const xhr = new XMLHttpRequest();
        xhr.open('POST', '/includes/function.php');
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onload = function() {
            console.log(xhr.responseText)
        };
        xhr.send('action=notifviewed&notifid='+id);

    }
</script>

</html>
