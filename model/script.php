<?php
session_start();
require_once 'TableChat.php';
require_once 'TableDao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $table = new TableChat();
    $insertion = new TableDao();
    $connexion = $table->getConnection();
    $User = $_POST["User"];
    $Message = $_POST["Message"];
    $insertion->insertChat($connexion,"conversation",$Message,$User);
    $idMessage = $insertion->selectId($connexion,$Message,"conversation");
    $table->closeConnection();
    $_SESSION["idMessage"] = $idMessage;
}

?>