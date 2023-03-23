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
    </div>
</header>
<body>
<div class="container">
<table class="table">
    <thead>
        <tr>
            <th>Nom et Prenom du docteur</th>
            <th>Date debut</th>
            <th>Date fin</th>
            <th>Message</th>
            <th>Option</th>
        </tr>
    </thead>
    <tbody>
        <?php                  
        $query = 'SELECT * FROM messages';
        $result = mysqli_query($db, $query) or die (mysqli_error($db));
      
            while ($row = mysqli_fetch_assoc($result)) {
                $querydoc = 'SELECT * FROM docteurs where docteur_id='.$row['docteur_id'];
                $resultdoc = mysqli_query($db, $querydoc) or die (mysqli_error($db));
                if($rowdoc = mysqli_fetch_assoc($resultdoc)) {
                
                echo '<tr>';
                echo '<td class="colnom">'. $rowdoc['nom'].'</td>';
                echo '<td class="coldate">'. $row['date_debut'].'</td>';
                echo '<td class="coldate">'. $row['date_fin'].'</td>';
                echo '<td class="colmsg">'. $row['messages'].'</td>';
                echo '<td> <div class="col">';
                echo ' <a  type="button" class="abtn" style=" background-color:#FF4742;" href="del.php?type=msg&delete & id=' . $row['message_id'] . '">Delete</a> 
                       </div>   
                     </td>';
                echo '</tr> '; 
            }
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