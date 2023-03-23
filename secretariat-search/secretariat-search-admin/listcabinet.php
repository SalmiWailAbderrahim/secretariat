<?php
       include('connection.php');
       session_set_cookie_params(0);
       session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

       ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>List Docteurs</title>
    <link rel="stylesheet" href="style.css">
</head>
<header>
    <div class="buttons">
    <button class="btn" onclick="location.href='ajoutcb.php';" > Ajouter Cabinet</button>
    </div>
</header>
<body>

</body>
</html>

<?php 

}else{

     header("Location: index.php");

     exit();
}
?>