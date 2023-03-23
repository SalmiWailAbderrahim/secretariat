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
        <button class="btn" onclick="location.href='docteurs.php';"  >List Docteurs</button>
    </div>
</header>
<body>
    <div class="cont">
    <form role="form" method="post" action="transac.php?action=addmsg">
        
      <div class="form-left-decoration"></div>
      <div class="form-right-decoration"></div>
      <div class="circle"></div>
      <div class="form-inner">
        <h1>Ajouter un Message</h1>
        <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>" >
        <label><p>Date debut:</p>
              <input required type="date" name="date_debut">
            </label>
        <label><p>Date fin:</p>
              <input required type="date" name="date_fin">
            </label>
        <label><p>Le Message:</p>
        <textarea required placeholder="Type here..." rows="7" name="message"></textarea>
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