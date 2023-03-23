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
    <link rel="stylesheet" href="style2.css">

</head> 
<div class="buttons">
        <button class="btn" onclick="location.href='docteurs.php';"  >List Docteurs</button>
    </div>
<body>
<?php 


      $query = 'SELECT * FROM docteurs WHERE docteur_id ='.$_GET['id'];
                  $result = mysqli_query($db, $query) or die(mysqli_error($db)); 
                  $id = $_GET['id'];

              if($row = mysqli_fetch_array($result))
              {   
                $zz= $row['docteur_id'];
                $i= $row['nom'];
                $a=$row['specialite'];
                $b=$row['telephone'];
                $c=$row['email'];
                $d=$row['addressC'];
                $f=$row['Information'];
                $g=$row['Regles'];
                $e=$row['comment'];
                $h=$row['cabinet_id'];
                $k=$row['update_time'];
              }
                        
?>                         
    <table w>
        <tbody>
            <tr>
                <td colspan="2" class="thatcolor">
                    <p>&nbsp;Informations et identifications</p>
                </td>
            </tr>
            <tr>
                <td class="smallcolmn">
                    
                    <p>&nbsp;Nom du Cabinet</p>
                </td>
                <td class="smallcolmn">
                <p>&nbsp;<?php
                    $query = sprintf('SELECT * FROM cabinet where cabinet_id="'.$h.'"');
                    $result = mysqli_query($db, $query) or die (mysqli_error($db));
                    if ($row = mysqli_fetch_assoc($result)) {
                     echo $row['namec'];
                    }
                     ?></p>
                </td>
            </tr>
           <tr>
                <td class="smallcolmn">
                    
                    <p>&nbsp;Nom &amp; Pr&eacute;nom du praticien</p>
                    
                </td>
                <td class="smallcolmn">
                    
                    <p>&nbsp;Dr <?php echo $i; ?></p>
              
                </td>
            </tr>
            <tr>
                <td class="smallcolmn">
                    <p>&nbsp;Sp&eacute;cialiste</p>
                </td>
                <td class="smallcolmn">
                    <p>&nbsp;<?php echo $a; ?></p>
                </td>
            </tr>
            <tr>
                <td class="smallcolmn">
                    <p>&nbsp;Num&eacute;ros de Tel</p>
                </td>
                <td class="smallcolmn">
                    <p>&nbsp;<?php echo $b; ?></p>
                </td>
            </tr>
            <tr>
                <td class="smallcolmn">
                    <p>&nbsp;Adresse Email</p>
                </td>
                <td class="smallcolmn">
                    <p>&nbsp;<?php echo $c; ?></p>
                </td>
            </tr>
            <tr>
                <td class="smallcolmn">Adresse du cabinet</td>
                <td class="smallcolmn">
                    <p>&nbsp;<?php echo $d; ?></p>
                </td>
            </tr>
            <tr>
                <td colspan="2" class="thatcolor">
                    <p>&nbsp;Informations &agrave; donner ou &agrave; prendre</p>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <p>&nbsp;<?php echo $f; ?></p>
                </td>
            </tr>

            <tr>
                <td colspan="2" class="thatcolor">
                    <p>&nbsp;R&egrave;gles de transfert d'appels&nbsp;</p>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                <p>&nbsp;<?php echo $g; ?></p>
                </td>
            </tr>
            <tr>
                <td colspan="2" class="thatcolor">
                    <p>&nbsp;Messages et Notes&nbsp;</p>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <p>&nbsp;<?php echo $e; ?></p>
                </td>
            </tr>
            <tr>
                <td colspan="2" id="instructions" class="thatcolor">
                    &nbsp;Les Instructions:
                </td>
            </tr>
            <?php
             $queryinst = 'SELECT * FROM instructions WHERE docteur_id ='.$zz;
             $resultinst = mysqli_query($db, $queryinst) or die(mysqli_error($db)); 
             $cpt=0;
            while($rowinst = mysqli_fetch_array($resultinst))
                    {     
                        $cpt++;
                        echo'<tr>';
                        echo ' <td colspan="2" class="thatcolor"><p>&nbsp;Consignes I'.$cpt.' :'.  $rowinst['nomi'].'&nbsp; 
                        <a class="abtn" style=" background-color:#FF4742;" type="button" href="del.php?type=instruction&delete & id='.$rowinst['instructions_id'].'&doc='.$zz.'">-</a>
                        </p></td>';
                        echo '</tr>  ';                 
                        
                        $querydesc = 'SELECT * FROM descriptions WHERE instructions_id ='.$rowinst['instructions_id']  ;
                        $resultdesc = mysqli_query($db, $querydesc) or die(mysqli_error($db));          
                        while($rowdesc = mysqli_fetch_array($resultdesc))
                                {
                                    echo '<tr>';
                                    echo '<td class="smallcolmn"><p>'.  $rowdesc['question'].'</p></td>';
                                    echo '<td class="smallcolmn"><p>'.  $rowdesc['reponse'].
                                    '<a  class="abtn" style=" background-color:#FF4742;" href="del.php?type=description&delete & id='.$rowdesc['description_id'].'&doc='.$zz.'">-</a>'.
                                    '</p></td>';
                                    echo '</tr> '; 
                                }   

                        echo '<tr >';
                        echo '<form role="form" method="post" action="transac.php?action=add3">';
                        echo '<td class="smallcolmn"><input class="ajoutinput" required placeholder="Qustion" name="question"></td>';
                        echo '<td class="smallcolmn"><input class="ajoutinput" required placeholder="Reponse" name="reponse">';
                        echo '<input class="ajoutinput" value="'.$rowinst['instructions_id'].'" hidden name="instructions_id">';
                        echo '<input hidden value="'.$zz.'" name="docteur_id">';
                        echo '<button hidden type="submit" class="ajoutbtn" >+</button></td>';

                        echo '</form>';
                        echo '</tr> ';     
                    }        
                $cpt++; 
              ?>
              <tr>
                <td colspan="2" class="thatcolor">
                    <p>&nbsp;Date de mise à jour : <?php echo $k; ?></p>
                </td>
            </tr>
        </tbody>
    </table>        
                    <form role="form" method="post" action="transac.php?action=add2">
                        <div class="ajout">
                    <label>
                        <input class="in" required placeholder="Ajouter une instruction" name="nomi">
                        <input hidden <?php echo 'value="'.$zz.'"'?> name="docteur_id">
                        <button class="abtn" style="margin-left: 0;" type="submit" class="ajoutb" >+</button>
                        </label>
                    </div>
                    </form>

            <script>
               <?php 
               if(isset($_GET['action'])){
                echo 'document.getElementById("instructions").scrollIntoView();';
               }
               
               ?>
            </script>
</body>

</html>

<?php 

}else{

     header("Location: index.php");

     exit();
}
?>