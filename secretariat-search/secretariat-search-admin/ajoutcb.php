<?php
       include('connection.php');
       session_set_cookie_params(0);
       session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

       ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Cabinet</title>
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="style.css">

</head>
<header>
    <div class="buttons">
    <button class="btn" onclick="location.href='ajoutdr.php';" > Ajouter Docteur</button>
    </div>
</header>
<body>
<div style="margin-top:5%;margin-bottom:0;" class="cont">
    <form role="form"  method="post" action="transac.php?action=addcb">
        
      <div class="form-left-decoration"></div>
      <div class="form-right-decoration"></div>
      <div class="circle"></div>
      <div class="form-inner">
        <h1>Ajouter Une Cabinet</h1>
        <label><p>Cabinet nom:</p>
              <input required type="text" placeholder="Cabinet nom" name="namec">
            </label>
        <button class="btn1" style="width: 100%; " type="submit">Submit</button>
        </div>
        </div>
    </form>

<div style="margin-bottom:5%;margin-top:5%;" class="container">
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
                    <a  type="button" class="abtn"style=" background-color:#FF4742;" href="del.php?type=cabinet&delete & id=' . $row['cabinet_id'] . '">Delete</a> 
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