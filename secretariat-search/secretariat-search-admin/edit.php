<!DOCTYPE html>
<html lang="en">
<head>
    <title>List Docteurs</title>
    <link rel="stylesheet" href="style2.css">
</head>
<?php
       include('connection.php');
       session_set_cookie_params(0);
       session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

        ?>  

<?php 
$query = 'SELECT * FROM docteurs
              WHERE
              docteur_id ='.$_GET['id'];
            $result = mysqli_query($db, $query) or die(mysqli_error($db));
              if($row = mysqli_fetch_array($result))
              {   
                $i= $row['nom'];
                $a=$row['specialite'];
                $b=$row['telephone'];
                $c=$row['email'];
                $d=$row['addressC'];
                $f=$row['Information'];
                $g=$row['Regles'];
                $e=$row['comment'];
             
              }
              
              $id = $_GET['id'];
         
?>
<body>
<header>
    <div class="buttons">
        <button class="btn" onclick="location.href='docteurs.php';"  >List Docteurs</button>
    </div>
</header>
<body>

<h1 style="margin-left:5%;">Edit Records:</h1>
    <form role="form" method="post" action="edit1.php">
    <input type="hidden" name="id" value="<?php echo $id; ?>" >
    <table w>
        <tbody>
            <tr>
                <td colspan="2" class="thatcolor">
                    <p>&nbsp;Informations et identifications</p>
                </td>
            </tr>
           <tr>
                <td class="smallcolmn">
                    <p>&nbsp;Nom &amp; Pr&eacute;nom du praticien</p>
                </td>
                <td class="smallcolmn">
                <input class="ajoutinput" required placeholder="Nom et Prenom" name="nom"  value="<?php echo $i; ?>">
                </td>
            </tr>
            <tr>
                <td class="smallcolmn">
                    <p>&nbsp;Sp&eacute;cialiste</p>
                </td>
                <td class="smallcolmn">
                <input class="ajoutinput" required  placeholder="Specialite" name="specialite" value="<?php echo $a; ?>">
                </td>
            </tr>
            <tr>
                <td class="smallcolmn">
                    <p>&nbsp;Num&eacute;ros de Tel</p>
                </td>
                <td class="smallcolmn">
                <input class="ajoutinput" required type="number" placeholder="Telephone" name="telephone" value="<?php echo $b; ?>">
                </td>
            </tr>
            <tr>
                <td class="smallcolmn">
                    <p>&nbsp;Adresse Email</p>
                </td>
                <td class="smallcolmn">
                <input class="ajoutinput" required type="email" placeholder="Email" name="email" value="<?php echo $c; ?>">
                </td>
            </tr>
            <tr>
                <td class="smallcolmn">Adresse du cabinet</td>
                <td class="smallcolmn">
                <input class="ajoutinput" required  placeholder="Adresse du cabinet" name="addressC" value="<?php echo $d; ?>">
                </td>
            </tr>
            <tr>
                <td colspan="2" class="thatcolor">
                    <p>&nbsp;Informations &agrave; donner ou &agrave; prendre</p>
                </td>
            </tr>
            <tr>
                <td colspan="2" class="td1">
                <input class="ajoutinput" required  placeholder="Informations à donner ou à prendre" name="Information" value="<?php echo $d; ?>">
                </td>
            </tr>

            <tr>
                <td colspan="2" class="thatcolor">
                    <p>&nbsp;R&egrave;gles de transfert d'appels&nbsp;</p>
                </td>
            </tr>
            <tr>
                <td colspan="2" class="td1">
                <input class="ajoutinput" required  placeholder="Règles de transfert d'appels" name="Regles" value="<?php echo $g; ?>">
                </td>
            </tr>
            <tr>
                <td colspan="2" class="thatcolor">
                    <p>&nbsp;Messages et Notes&nbsp;</p>
                </td>
            </tr>
            <tr>
                <td colspan="2" class="td1">
                <input class="ajoutinput" required  placeholder="Règles de transfert d'appels" name="comment" value="<?php echo $e; ?>">
                </td>
            </tr>
            <tr>
                <td colspan="2" class="thatcolor">
                    &nbsp;Les Instructions:
                </td>
            </tr>
            <?php
             $queryinst = 'SELECT * FROM instructions WHERE docteur_id ='.$id;
             $resultinst = mysqli_query($db, $queryinst) or die(mysqli_error($db)); 
             $cpt=0;
            while($rowinst = mysqli_fetch_array($resultinst))
                    {     
                        $cpt++;
                        echo'<tr>';
                        echo ' <td colspan="2" class="td1">

                <input class="ajoutinput" required  placeholder="nom instruction" name="'.$cpt.'" value="'.$rowinst['nomi'].'">
                <input hidden name="inst'.$cpt.'" value="'.$rowinst['instructions_id'].'">


                        </td>';

                        echo '</tr>  ';                 
                        
                        $querydesc = 'SELECT * FROM descriptions WHERE instructions_id ='.$rowinst['instructions_id']  ;
                        $resultdesc = mysqli_query($db, $querydesc) or die(mysqli_error($db));  
                        $cpt2=0;      
                        while($rowdesc = mysqli_fetch_array($resultdesc))
                                {   
                                    $cpt2++;
                                    echo '<tr>';
                                    
                                    echo '<input hidden name="desc'.$cpt.$cpt2.'" value="'.$rowdesc['description_id'].'">';
                                    echo '<td class="smallcolmn">
                                        <input class="ajoutinput" required  placeholder="Question" name="question'.$cpt.$cpt2.'" value="'.  $rowdesc['question'].'">
                                    </td>';
                                    echo '<td class="smallcolmn">
                                        <input class="ajoutinput" required  placeholder="Reponse" name="reponse'.$cpt.$cpt2.'" value="'.  $rowdesc['reponse'].'">
                                    </td>';
                                    echo '</tr> '; 
                                }      
                    }        
                $cpt++; 
              ?>
        </tbody>
    </table> 
    <button type="Submit"class="edit" >Update</button>
    </form>


</body>

</html>

<?php 

}else{

     header("Location: index.php");

     exit();
}
?>