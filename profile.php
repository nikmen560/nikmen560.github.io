<?php
session_start();
if (!$_SESSION['user']) {
    header('Location: /');
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Авторизация и регистрация</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/profile.css">
</head>
<body>
<?php
$current_user = $_SESSION['user']['login'];
$connect = mysqli_connect('localhost', 'mysql', 'mysql', 'pract');
$getAll = mysqli_query($connect, "SELECT `id`, `login`, `email`, `registration_date`, `last_visit`, `active` FROM `users`");
$arrOfInfo = mysqli_fetch_all($getAll);


?>

    <form action="/vendor/tableUsers.php" method="post">
        <input type="submit" class="btn-user_delete" value="delete">
        <?php


        echo '<table class="table">';

        echo "<thead class='thead-dark'>
                <tr>
                    <th class='col'><input type='checkbox' id='main' name='checkbox[]' value=''></th>
                    <th class='col'>id</th>
                    <th class='col'>username</th>
                    <th class='col'>email</th>
                    <th class='col'>reg_date</th>
                    <th class='col'>last_visit</th>
                    <th class='col'>active</th>
                </tr>
              </thead>";


            foreach ($arrOfInfo as $row) {
                    $id = $row[0];
                    echo "<tr><td><input type='checkbox' class='checkbox' name='checkbox[]' value='$id'></td><td>
                                        " . implode('</td><td>', $row) . '</td></tr>';

            }

            echo '</table>';

        ?>

        <a href="vendor/logout.php" class="logout">Logout</a>
    </form>

<script>
    let main = document.getElementById('main');
    console.log(main)

    let all = document.querySelectorAll('input.checkbox');
    console.log(all)

    for(let i=0; i<all.length; i++) {  // 1 и 2 пункт задачи
        all[i].onclick = function() {
            let allChecked = document.querySelectorAll('input.checkbox:checked').length;
            main.checked = allChecked > 0;
            main.indeterminate = allChecked > 0 && allChecked < all.length;
        }
    }

    main.onclick = function() {  // 3
        for(let i=0; i<all.length; i++) {
            all[i].checked = this.checked;
        }
    }
</script>

</body>
</html>