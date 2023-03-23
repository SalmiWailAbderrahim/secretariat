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
    <link rel="stylesheet" href="style1.css">
</head>
<header>
    <div class="buttons">
    <button class="btn" onclick="location.href='search.php';"  >Accueil</button>
    </div>
</header>
<body>
    <div class="cont">
    <form role="form" method="post" action="transac.php?action=adduser">
        
      <div class="form-left-decoration"></div>
      <div class="form-right-decoration"></div>
      <div class="circle"></div>
      <div class="form-inner">
        <h1>Ajouter un admin</h1>
        <label><p>User name:</p>
              <input required type="text" name="user_name">
            </label>
        <label><p>Password:</p>
              <input required type="password" name="password">
            </label>
        <button class="btn1" type="submit">Submit</button>
        <button class="btn1" type="reset" >Rest</button>
        </div>
        </div>
    </form>
</body>
</html>
<?php 

}else{

     header("Location: index.php");

     exit();
}
?>