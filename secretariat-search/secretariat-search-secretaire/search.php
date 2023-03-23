<?php
       include('connection.php');
       ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>    

           table{
            border-collapse:unset;
           }
           .btn{
            border: black 2px solid;
           }
    </style>
    <title>Search Instruction</title>
</head>
<header>
   
    <div class="buttons">
        <button class="btn" onclick="location.href='#'"><img style=" width:97%" src="datagix.png" alt="Datagix"></button>
        
        <button class="btn" onclick="location.href='Docteurs.php';"> List Docteurs</button>
    </div>
</header>
<body>
        <div id = "leftbox">
            <div style="min-height:450px;background-color:white;padding:2px;">
                <table class='msg' style="width:98%;  margin:1%; ">
                    <tr style="border:none;">
                        <td class="thatcolor" colspan="2" style=" height: auto;"><h3 style='display:inline;'>les messages:</h3></td>
                    </tr>   
                    <?php
                    $datecurrent=date("Y-m-d");
                    $query = sprintf("SELECT * FROM messages 
                    where date_debut 
                    BETWEEN
                    '".date('Y-m-d', strtotime('-2 day', strtotime($datecurrent)))."'
                    ANd
                    '".$datecurrent."'
                    ") ;
                    $result = mysqli_query($db, $query) or die (mysqli_error($db));
                    while($rowmsg = mysqli_fetch_array($result)){
                    $querydoc = 'SELECT * FROM docteurs where docteur_id='.$rowmsg['docteur_id'];
                    $resultdoc = mysqli_query($db, $querydoc) or die (mysqli_error($db));
                    if($rowdoc = mysqli_fetch_assoc($resultdoc)) {
                    echo'<tr >';
                    echo '<td style="width:30%;">'.$rowdoc['nom'].'</td>';
                    echo '<td >'.$rowmsg['messages'].'</td>';
                    echo '</tr>  ';
                    }}
                            ?>

                </table>
            </div>
        </div>
    <form role="form" action="#" method="post">
        <div class="search-box">
            <input type="text" class="input-search" placeholder="Nom du docteur" name="docteur" required>
            <input type="text" id="small" class="input-search" placeholder="Instruction" name="instruction">
            <button class="btn-search" type="submit" name="Submit1" ><i class="fa fa-search"></i></button>
        </div>
    </form>
    <?php 
        if(isset($_POST["Submit1"])){
            $nomd = $_POST['docteur'];
            $query = sprintf("SELECT * FROM docteurs WHERE docteur_id in (select docteur_id from docteurs where nom like '%%".$nomd."%%')");
            $result = mysqli_query($db, $query) or die(mysqli_error($db)); 

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
          echo '<div style="margin-bottom:5%">';
          echo '<table class="tab" w><tbody>';  
          echo'<tr class="tr1">';
          echo '<td colspan="2" class="thatcolor"><p>Informations et identifications:</p></td>';
          echo '</tr>  ';
            echo' <tr>
            <td class="smallcolmn">
                
                <p>&nbsp;Nom du Cabinet</p>
            </td>
            <td class="smallcolmn">
            <p>&nbsp;
            ';
            $queryc = sprintf('SELECT * FROM cabinet where cabinet_id="'.$h.'"');
                    $resultc = mysqli_query($db, $queryc) or die (mysqli_error($db));
                    if ($rowc = mysqli_fetch_assoc($resultc)) {
                     echo $rowc['namec'];
                    }
                echo '
                </p>
                </td>
            </tr>
           <tr>
                <td class="smallcolmn">
                    
                    <p>&nbsp;Nom &amp; Pr&eacute;nom du praticien</p>
                    
                </td>
                <td class="smallcolmn">
                    
                    <p>&nbsp;Dr '.$i.'</p>
              
                </td>
            </tr>
                ';
                
          echo '</tbody></table>'; 

          $querymsg = sprintf("SELECT * FROM messages WHERE docteur_id='".$row['docteur_id']."'
                                            and date_fin >= '".$datecurrent."' and date_debut <= '".$datecurrent."'
                        "); 
                        $resultmsg = mysqli_query($db, $querymsg) or die(mysqli_error($db));
                        $resultmsg1= mysqli_query($db, $querymsg) or die(mysqli_error($db));
                        if(mysqli_fetch_array($resultmsg1)){
                            echo '<div style="margin-bottom:5%">';
                            echo '<table class="tab" w><tbody>';  
                            echo'<tr class="tr1">';
                            echo '<td colspan="2" class="thatcolor"><p>Message! :</p></td>';
                            echo '</tr>  ';
                            while($rowmsg = mysqli_fetch_array($resultmsg)){
                                echo'<tr class="tr1">';
                                echo '<td colspan="2"><p>'.$rowmsg['messages'].'</p></td>';
                                echo '</tr>  ';
                            }
                        echo '</tbody></table>';    
                        }
        }



            $nomi = $_POST['instruction'];

        $queryinst = sprintf("SELECT * FROM instructions WHERE 
        docteur_id in (select docteur_id from docteurs where nom like '%%".$nomd."%%')
        and 
        (instructions_id in (select instructions_id from instructions where nomi like '%%".$nomi."%%')
        or
        instructions_id in (select instructions_id from descriptions where question like '%%".$nomi."%%'))"); 
            $resultinst = mysqli_query($db, $queryinst) or die(mysqli_error($db));
            $cpt=0;
            while($rowinst = mysqli_fetch_array($resultinst))
                   {   
                        $cpt++;
                        echo '<table class="tab" w><tbody>';  
                       echo'<tr class="tr1">';
                       echo '<td colspan="2" class="thatcolor"><p>&nbsp;Consignes I'.$cpt.' :'.$rowinst['nomi'].'</p></td>';
                       echo '</tr>  ';                 
                        
                        $querydesc = 'SELECT * FROM descriptions WHERE instructions_id ='.$rowinst['instructions_id']  ;
                        $resultdesc = mysqli_query($db, $querydesc) or die(mysqli_error($db));          
                        while($rowdesc = mysqli_fetch_array($resultdesc))
                                {
                                    echo '<tr class="tr1">';
                                    echo '<td class="smallcolmn"><p>'.  $rowdesc['question'].'</p></td>';
                                    echo '<td class="smallcolmn"><p>'.  $rowdesc['reponse'].'</p></td>';
                                    echo '</tr> '; 
                                }      
                    echo'</tbody></table>';      
                } 
                   echo '</div>';
         }
    ?>
    <footer>
        <p>
		Created by Salmi Wail Abderrahim
        </p>
    </footer>
</body>
</html>