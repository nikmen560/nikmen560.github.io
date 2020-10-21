<?php

    $connect = mysqli_connect('localhost', 'mysql', 'mysql', 'pract');

    if (!$connect) {
        die('Error connect to DataBase');
    }