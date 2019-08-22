<?php
if(session_id() == '' || !isset($_SESSION)) {
    session_start();
}

if(!isset($_SESSION["username"])){
header("Location: login.php");
exit(); }
?>