<?php
include 'Notification.php';
$Notif = new Notification();
class Like
{

    public function Liker($uid, $pid){
        global $conn;
        global $Notif;
        $request = "SELECT * FROM likes WHERE uid = :uid AND pid = :pid";
        $req = $conn->prepare($request);
        $req->bindParam(':uid',$uid);
        $req->bindParam(':pid',$pid);
        $req->execute();
        $count = $req->rowCount();
        if ($count != 0){
            $del_like = $conn->prepare("DELETE FROM likes WHERE uid = :uid AND pid = :pid");
            $del_like->bindParam(':uid',$uid);
            $del_like->bindParam(':pid',$pid);
            $del_like->execute();
            $refresh = "SELECT * FROM posts WHERE id = $pid";
            $refresh_req = $conn->prepare($refresh);
            $refresh_req->execute();
            $likes = $refresh_req->fetch()['likes'];
            $newlikes = $likes-1;
            $update = $conn->prepare("UPDATE posts SET likes = $newlikes WHERE id = $pid");
            $update->execute();
            echo 'success_remove';
        }else{
            $add_like_req = "INSERT INTO likes (uid,pid) VALUES (:uid,:pid)";
            $add_like = $conn->prepare($add_like_req);
            $add_like->bindParam(':uid',$uid);
            $add_like->bindParam(':pid',$pid);
            $add_like->execute();
            $refresh = "SELECT * FROM posts WHERE id = $pid";
            $refresh_req = $conn->prepare($refresh);
            $refresh_req->execute();
            $likes = $refresh_req->fetch()['likes'];
            $newlikes = $likes+1;
            $update = $conn->prepare("UPDATE posts SET likes = $newlikes WHERE id = $pid");
            $update->execute();
            $Notif->NewLike($_POST['uid'],$_POST['user_id']);
            echo 'success_add';
        }
    }


}