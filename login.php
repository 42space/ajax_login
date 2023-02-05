<?php
 $reloadCache = time();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css?v=<? echo $reloadCache; ?>">
    <title>Simple Login</title>
</head>
<body>
    <main class="container">
        <h2>Login</h2>
        <form name="formLogin" method="post">
            <div class="input-field">
                <i class="fa-solid fa-user"></i>
                <input type="text" name="username" id="username" placeholder="Enter Your Username">
                <div class="underline"></div>
            </div>
            <div class="input-field">
                <i class="fa-solid fa-lock"></i>
                <input type="password" name="password" id="password" placeholder="Enter Your Password">
                <div class="underline"></div>
            </div>
            <input type="submit" value="Login">
        </form>
    </main>
    <script src="https://kit.fontawesome.com/3a089faff2.js" crossorigin="anonymous"></script>
    <script src="ajax.js?v=<? echo $reloadCache; ?>"></script>
</body>
</html>