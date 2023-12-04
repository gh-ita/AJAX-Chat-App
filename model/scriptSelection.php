<?php
session_start();
require_once 'TableChat.php';
require_once 'TableDao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $selection = new TableDao();
    $table = new TableChat();
    $connexion = $table->getConnection();
    $result = $selection->selectMessage($connexion,$_SESSION['idMessage'],"conversation");
    $user = $result['User'];
    $message = $result['Message'];
    echo $user . '||' . $message;; 
    
}
?>