<?php
include './includes/dep.php';
include_once './includes/mysql.php';
$fid = $_GET['rid'];
$id = $_SESSION['id'];
$get_messages = $conn->prepare("SELECT * FROM messages WHERE sid = $id || rid = $id ORDER BY id ASC");
$get_messages->execute();
while ($get_messages_fetch = $get_messages->fetch()){
    if ($get_messages_fetch['sid'] == $_SESSION['id']){
        ?>
        <div class="flex items-end justify-end mb-4">
            <div class="bg-indigo-100 text-indigo-800 rounded-lg p-3">
                <p><?=$get_messages_fetch['message']?></p>
            </div>
            <img class="h-8 w-8 rounded-full ml-2" src="<?=$_SESSION['avatar']?>" alt="Photo de profil de <?=$_SESSION['pseudo']?>">
        </div>
        <?php
    }else{
        ?>
        <div class="flex items-start mb-4">
            <img class="h-8 w-8 rounded-full mr-2" src="<?=$GetUsersInfos->GetUserAvatar($get_messages_fetch['rid'])?>" alt="Photo de profil de <?=$GetUsersInfos->GetUserName($fid)?>">
            <div class="bg-cyan-100 text-cyan-800 rounded-lg p-3">
                <p><?=$get_messages_fetch['message']?></p>
            </div>
        </div>
        <?php
    }
}
?>