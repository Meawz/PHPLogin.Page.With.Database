<?php

$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $mysqli = require __DIR__ . "/database.php";

    $sql = sprintf( "SELECT * FROM users
            WHERE email = '%s'",
            $mysqli -> real_escape_string($_POST["email"]));

    $result = $mysqli -> query($sql);

    $users = $result -> fetch_assoc();

    

    if ($users && isset($users["Password_hash"])) {
        if (password_verify($_POST["password"], $users["Password_hash"])) {
            
            session_start();

            session_regenerate_id();

            $_SESSION["user_id"] = $users["ID"];

            header("Location: index.php");
            exit;

        }
    }

    $is_invalid = true;
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Log In</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>
<body>

    <h1>Log In</h1>

    <?php if($is_invalid): ?>
        <em>Invalid Log In</em>
    <?php endif; ?>    

    <form method="post">
        <label for="email">Email</label>
        <input type="email" name="email" id="email"
               value="<?= htmlspecialchars($_POST["email"] ?? "") ?>">

        <label for="password">Password</label>
        <input type="password" name="password" id="password">

        <button>Log In</button>
    </form>

</body>
</html>