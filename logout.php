<?php
    session_destroy();
    session_start();
    $_SESSION['login'] = '';
    $_SESSION['id'] = 0;

    header("location:index.php");
?>