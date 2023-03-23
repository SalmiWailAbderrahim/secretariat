<?php
       include('connection.php');
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
        <button class="btn" onclick="location.href='listcabinet.php';" > List Cabinet</button>
    </div>
</header>
<body>
<div class="container">
<table class="table">
    <thead>
        <tr>
            <th>Nom et Prenom</th>
            <th>Sp&eacute;cialiste</th>
            <th>Adress Email</th>
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
                echo '<td class="colemail">'. $row['email'].'</td>';
                echo '<td class="coltel">'. $row['telephone'].'</td>';
                echo '<td> <div class="col">
                       <a type="button" class="abtn" style=" background-color:#36A9AE;" href="profile.php? id='.$row['docteur_id'] . '" > Profile </a>';
                echo ' </div></td>';
                echo '</tr> '; 
        }
        ?>                               
    </tbody>
    
</table>
    </div> 
</body>
</html>

