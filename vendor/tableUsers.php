<?php session_start();
require_once 'connect.php';
$checkbox = $_POST['checkbox'];

if (count($checkbox) > 1) {
    unset($checkbox[0]);
}
if (is_array($checkbox)) {

    foreach ($checkbox as $elem) {

        mysqli_query($connect, "DELETE FROM `users` WHERE `users`.`id`='$elem'");
    }

} else {
    mysqli_query($connect, "DELETE FROM `users` WHERE `users`.`id`='$checkbox'");
}

        if (in_array($_SESSION['user']['id'], $checkbox)) {
            header('Location: logout.php');
        } else {
            header('Location: ../profile.php');

    }

?>