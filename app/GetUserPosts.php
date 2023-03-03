<?php
include_once './includes/dep.php';
//namespace app;

class GetUserPosts
{
public function CountPost($user_id){
    global $conn;
    $request = "SELECT * FROM posts WHERE user_id = :user_id";
    $req = $conn->prepare($request);
    $req->bindParam(':user_id', $user_id);
    $req->execute();
    return $req->rowCount();
}
}