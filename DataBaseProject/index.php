<?php

session_start();

if (isset($_SESSION["user_id"])) {

    $mysqli = require __DIR__ . "/database.php";

    $sql = "SELECT * FROM users
            WHERE ID = {$_SESSION["user_id"]}";

    $result = $mysqli -> query($sql);

    $users = $result -> fetch_assoc();
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>
<body>

    <h1>Home</h1>

    <?php if (isset($users)): ?>

        <p>Hello <?= htmlspecialchars($users["Name"]) ?></p>

        <p><a href="logout.php">Log Out</a></p>

    <?php else: ?>

        <p><a href="login.php">Log In</a> or <a href="signup.html">Sign Up</a></p>

    <?php endif; ?>

</body>
</html>