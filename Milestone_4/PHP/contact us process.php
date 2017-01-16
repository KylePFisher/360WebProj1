<?php
    session_start();
    
    $_SESSION['userName'] = $_POST['userName'];
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['telephone'] = $_POST['telephone'];
    $_SESSION['comments'] = $_POST['comments'];
    
    header('Location: contact us view.php');
?>