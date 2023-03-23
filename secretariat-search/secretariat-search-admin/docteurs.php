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
        <button class="btn" onclick="location.href='search.php';"  >Accueil</button>
        <button class="btn" onclick="location.href='ajoutdr.php';" > Ajouter Docteur</button>
    </div>
</header>
<body>
<div class="container">
<table class="table">
    <thead>
        <tr>
            <th>Nom et Prenom</th>
            <th>Sp&eacute;cialiste</th>
            <th>Numero Telephone</th>
            <th>Options</th>
        </tr>
    </thead>
    <tbody>
        <?php                  
        $query = 'SELECT * FROM docteurs';
        $result = mysqli_query($db, $query) or die (mysqli_error($db));
      
            while ($row = mysqli_fetch_assoc($result)) {
                                 
                echo '<tr>';
                echo '<td class="colnom">'. $row['nom'].'</td>';
                echo '<td class="colesp">'. $row['specialite'].'</td>';
                echo '<td class="coltel">'. $row['telephone'].'</td>';
                echo '<td> <div class="col">
                       <a type="button" class="abtn" style=" background-color:#36A9AE;" href="profile.php? id='.$row['docteur_id'] . '" > Profile </a> 
                       <a type="button" class="abtn" style=" background-color:#3C99DC;" href="ajoutmsg.php? id='.$row['docteur_id'] . '" > Message </a> ';
                echo ' <a  type="button" class="abtn" style=" background-color:#f4e603;" href="edit.php?action=edit & id='.$row['docteur_id'] . '"> Edit </a> ';
                echo ' <a  type="button" class="abtn" style=" background-color:#FF4742;" href="del.php?type=docteur&delete & id=' . $row['docteur_id'] . '& doc=0 ">Delete</a> 
                       </div>   
                     </td>';
                echo '</tr> '; 
        }
        ?>                               
    </tbody>
    
</table>
    </div> 
</body>
</html>

<?php 

}else{

     header("Location: index.php");

     exit();
}
?>