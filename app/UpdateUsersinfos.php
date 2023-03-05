<?php

class UpdateUsersinfos
{
public function UpdatePseudo($uid, $newpseudo){
    global $conn;
    $request = "UPDATE users SET pseudo = :pseudo WHERE id = :id";
    $req = $conn->prepare($request);
    $req->bindParam(':pseudo', $newpseudo);
    $req->bindParam(':id', $uid);
    $req->execute();
    return true;
}
    public function UpdateEmail($uid, $newemail){
        global $conn;
        $request = "UPDATE users SET email = :email WHERE id = :id";
        $req = $conn->prepare($request);
        $req->bindParam(':email', $newemail);
        $req->bindParam(':id', $uid);
        $req->execute();
        return true;
    }
    public function UpdatePassword($uid, $newpassword){
        global $conn;
        $request = "UPDATE users SET password = :password WHERE id = :id";
        $req = $conn->prepare($request);
        $req->bindParam(':password', $newpassword);
        $req->bindParam(':id', $uid);
        $req->execute();
        return true;
    }
    public function UpdateAvatar($uid, $newavatar){
        $folder = "/users/avatar/$newavatar";
        global $conn;
        $request = "UPDATE users SET avatar = :avatar WHERE id = :id";
        $req = $conn->prepare($request);
        $req->bindParam(':avatar', $folder);
        $req->bindParam(':id', $uid);
        $req->execute();
        return true;
    }
    public function UpdateBanneer($uid, $newbanneer){
        $folder = "/users/banniere/$newbanneer";
        global $conn;
        $request = "UPDATE users SET banniere = :banniere WHERE id = :id";
        $req = $conn->prepare($request);
        $req->bindParam(':banniere', $folder);
        $req->bindParam(':id', $uid);
        $req->execute();
        return true;
    }
}