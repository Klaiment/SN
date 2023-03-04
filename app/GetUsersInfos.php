<?php

class GetUsersInfos
{
    public function ReloadSession($id){
        //Fonction refresh $Session
        global $conn;
        global $_SESSION;
        $request = "SELECT * FROM users WHERE id = :id";
        $req = $conn->prepare($request);
        $req->bindParam(':id', $id);
        $req->execute();
        $data = $req->fetch();
        $_SESSION['pseudo'] = $data['pseudo'];
        $_SESSION['email'] = $data['email'];
        $_SESSION['avatar'] = $data['avatar'];
        $_SESSION['banniere'] = $data['banniere'];
        return 'updated';
//    var_dump($req->fetch());
    }
public function GetUserName($id){
    global $conn;
    $request = "SELECT * FROM users WHERE id = :id";
    $req = $conn->prepare($request);
    $req->bindParam(':id', $id);
    $req->execute();
    return $req->fetch()['pseudo'];
//    var_dump($req->fetch());
}
}