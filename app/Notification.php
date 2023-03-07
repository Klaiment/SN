<?php
class Notification
{
    public function NewLike($uid,$user_id){
        global $conn;
        $req = $conn->prepare("INSERT INTO notification (sid,rid,type) VALUES ($uid,$user_id,'like')");
        $req->execute();
    }
    public function NewMP($uid,$user_id){
        global $conn;
        $req = $conn->prepare("INSERT INTO notification (sid,rid,type) VALUES ($uid,$user_id,'msg')");
        $req->execute();
    }
    public function Viewed($notifid){
        global $conn;
        $req = $conn->prepare("UPDATE notification SET vu = 1 WHERE id = $notifid");
        $req->execute();
    }
    public function NotifCounter($uid){
        global $conn;
        $req = $conn->prepare("SELECT * FROM notification WHERE rid = $uid AND vu = 0 ");
        $req->execute();
        return $req->rowCount();
    }
}