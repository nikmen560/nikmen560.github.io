<?php
session_start();
require_once 'connect.php';
$login = $_SESSION['login'];
mysqli_query($connect, "UPDATE `users` SET `active` = '0' WHERE `users`.`login` ='$login'");
unset($_SESSION['user']);
header('Location: ../index.php');