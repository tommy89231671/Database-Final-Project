<?php session_start(); ?>
<?php
    //將session清空
    unset($_SESSION['username']);
    unset($_SESSION['Admin']);
    echo '登出中......';
    header('Location: ' . '/db_final_example/home.php');
?>