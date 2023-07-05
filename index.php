<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DB - MYSQLI</title>
    <?php

        require_once("./DB/dbManager.php");

        $username = $_POST['username'];
        $users = getUsersByUsername($username);
    ?>
</head>
<body>
    <h1>Student search engine</h1>
    <form method="post">
        <label for="username">Username:</label>
        <input type="text" name="username">
        <input type="submit" value="FIND">
    </form>
    <ul>
        <?php foreach ($users as $user) { ?>

            <li><?php echo '[' . $user['id'] . '] ' . $user['name'] . ' ' . $user['surname']; ?></li>

        <?php } ?>
    </ul>
</body>
</html>