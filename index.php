<?php
session_start();

if ($_SESSION['user']) {
    header('Location: profile.php');
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>autorisation</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>

<!-- Форма авторизации -->

    <form action="vendor/signin.php" method="post" class="">
        <div class="form-group">
        <label>Login</label>
        <input type="text" name="login" class="form-control" placeholder="Enter your login">
        </div>

        <div class="form-group">
        <label>Password</label>
        <input type="password" class="form-control" name="password" placeholder="Enter your password">
        </div>

        <button type="submit" class="btn btn-success">Login</button>

        <p>
            Don't have an account?  - <a href="/register.php">Signup</a>!
        </p>
        <?php
            if ($_SESSION['message']) {
                echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
            }
            unset($_SESSION['message']);
        ?>
    </form>

</body>
</html>