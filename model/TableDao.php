<?php

class TableDao{
    public function insertChat($connexion,$table,$message,$user){
        $query = "INSERT INTO $table (Message, User) VALUES (:message, :user)";
        $stmt = $connexion->prepare($query);
        $stmt->bindParam(':message', $message);
        $stmt->bindParam(':user', $user);
        $stmt->execute();
    }
    public function selectId($connexion,$message,$table){
        $query = "SELECT idMessage FROM $table WHERE Message = :message";
        $stmt = $connexion->prepare($query);
        $stmt->bindParam(':message', $message);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return ($result !== false) ? $result['idMessage'] : false;

    }  
    public function selectMessage($connexion,$idMessage,$table){
        $query = "SELECT User,Message FROM $table WHERE idMessage = :idMessage";
        $stmt = $connexion->prepare($query);
        $stmt->bindParam(':idMessage', $idMessage);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return ($result !== false) ? $result : false;
    }
}
?>