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
    <button class="btn" onclick="location.href='Docteurs.php';"> List Docteurs</button>
    </div>
</header>
<body>
<div class="container">
<table class="table">
    <thead>
        <tr>
            <th>Nom du Cabinet</th>
            <th>Option</th>
        </tr>
    </thead>
    <tbody>
        <?php                  
        $query = 'SELECT * FROM cabinet';
        $result = mysqli_query($db, $query) or die (mysqli_error($db));
      
            while ($row = mysqli_fetch_assoc($result)) {
                
                echo '<tr>';
                echo '<td style="width:80%;text-align: center;">
                 '. $row['namec'].'</a></td>';
                echo '<td> <div class="col">';
                echo ' <a type="button" class="abtn" style=" background-color:#36A9AE;" href="cabinet.php? id='.$row['cabinet_id'] . '" >View</a> 
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
