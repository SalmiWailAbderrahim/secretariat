<?php
include('connection.php');
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

session_unset();
session_destroy();
}

       ?>
<!DOCTYPE html>
<html>
<head>
    <title>LOGIN</title>
    <link rel="stylesheet" type="text/css" href="log.css">
</head>

<body>
     <form action="login.php" method="post">
        <h2>LOGIN</h2>
        <?php if (isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>
        <label>User Name</label>
        <input required type="text" name="uname" placeholder="User Name"><br>
        <label>Password</label>
        <input required type="password" name="password" placeholder="Password"><br> 
        <button type="submit">Login</button>
     </form>
</body>
</html>