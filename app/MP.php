<?php
class MP
{
public function newMP($sid,$rid,$msg){
    global $conn;
    global $Notif;
    $heure = time();
    $req = "INSERT INTO messages (sid,rid,message,heure) VALUES (:sid,:rid,:message,:heure)";
    $request = $conn->prepare($req);
    $request->bindParam(':sid',$sid);
    $request->bindParam(':rid',$rid);
    $request->bindParam(':message',$msg);
    $request->bindParam(':heure',$heure);
    $request->execute();
    $Notif->NewMP($sid, $rid);
}
}