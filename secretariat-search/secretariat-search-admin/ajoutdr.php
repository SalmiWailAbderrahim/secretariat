<?php
       include('connection.php');
       session_set_cookie_params(0);
       session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

       ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Ajoute Docteur</title>
    <link rel="stylesheet" href="style1.css">
</head>
<header>
    <div class="buttons">
        <button class="btn" onclick="location.href='docteurs.php';"  >List Docteurs</button>
        <button class="btn" onclick="location.href='ajoutcb.php';" > Ajouter Cabinet</button>
    </div>
</header>
<body>
    <div class="cont">
    <form role="form" method="post" action="transac.php?action=add">
      <div class="form-left-decoration"></div>
      <div class="form-right-decoration"></div>
      <div class="circle"></div>
      <div class="form-inner">
        <h1>Ajouter un docteur</h1>
        <label for="cabinet"><p>Nom du Cabinet:</p></label>
                <select name="cabinet" id="cabinet">
            	
            	            <?php  $query = 'SELECT * FROM cabinet';
                                    $result = mysqli_query($db, $query) or die (mysqli_error($db)); 
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo '<option value="'.$row['cabinet_id'].'">'.$row['namec'].'</option>';
                                    }
                            ?>
                </select>
            <h3>Informations personnelles :</h3>
                
              <input required placeholder="Nom et Prenom" name="nom">
              <input required  placeholder="Spécialité" name="specialite">
              <input required type="number" placeholder="Telephone" name="telephone">
              <input required type="email" placeholder="Email" name="email">
              <textarea required placeholder="Address du Cabinet" rows="2" name="addressC"></textarea>
              <label><p>Date du Production:</p>
              <input required type="date" name="date">
            </label>
        <label><p>&nbsp;Informations &agrave; donner ou &agrave; prendre :</p>
        <textarea required placeholder="Type here..." rows="3" name="Information"></textarea>
        </label>
        <label><p> Règles de transfert d'appels :</p>
        <textarea required placeholder="Type here..." rows="3" name="Regles"></textarea>
        </label>
        <label><p>Messages et Notes :</p>
        <textarea required placeholder="Type here..." rows="5" name="comment"></textarea>
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