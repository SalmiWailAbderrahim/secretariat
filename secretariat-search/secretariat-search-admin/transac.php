
<?php
       
       include('connection.php');
        session_start();
        date_default_timezone_set("Africa/Lagos");
 if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
        ?>   
<body>
        <div class="col-lg-12">
        <?php		
		switch($_GET['action']){
			case 'add':	
                                        $cabinet = mysqli_real_escape_string($db,$_POST['cabinet']);	
                                        $nom = mysqli_real_escape_string($db,$_POST['nom']);
                                        $specialite = mysqli_real_escape_string($db,$_POST['specialite']);
                                        $telephone = mysqli_real_escape_string($db,$_POST['telephone']);
                                        $email = mysqli_real_escape_string($db,$_POST['email']);
                                        $addressC = mysqli_real_escape_string($db,$_POST['addressC']);

                                        $date = mysqli_real_escape_string($db,$_POST['date']);
                                        $comment = mysqli_real_escape_string($db,$_POST['comment']);	
                                        $Information = mysqli_real_escape_string($db,$_POST['Information']);
                                        $Regles = mysqli_real_escape_string($db,$_POST['Regles']);
                                        $comment = mysqli_real_escape_string($db,$_POST['comment']);	
                                        	
                                        $datecurrent=date("Y-m-d h:i:s A ");
					$query = "INSERT INTO docteurs
					(nom, specialite, telephone, email,addressC,Information,Regles, comment,date_roduction,cabinet_id,update_time)
					VALUES ('".$nom."','".$specialite."','".$telephone."','".$email."','$addressC','".$Information."','".$Regles."','".$comment."','".$date."','".$cabinet."','".$datecurrent."')";
                                        echo $query;
					mysqli_query($db,$query)or die ('Error in updating Database1');
                                        
                                           $query1 = sprintf('INSERT INTO query_saver (user_name, date, query)
							VALUES ("'.$_SESSION['user_name'].'","'.$datecurrent.'","'.$query.'")');
                                               mysqli_query($db,$query1)or die ('Error in updating Databasex');

                                        $query = 'SELECT * FROM docteurs WHERE docteur_id in(select MAX(docteur_id) from docteurs )';

                                        $result = mysqli_query($db, $query) or die(mysqli_error($db)); 
                                        if($row = mysqli_fetch_array($result)) 
                                                $id = $row['docteur_id'];
                                        $zz=sprintf('window.location = "profile.php?action=edit&id='.$id.'";');
			        break;
                        case 'add2':
                                        $datecurrent=date("Y-m-d h:i:s A");
                                        $id = mysqli_real_escape_string($db,$_POST['docteur_id']);
                                        $query = sprintf('UPDATE docteurs set update_time ="'.$datecurrent.'" where docteur_id="'.$id.'"');
                                        mysqli_query($db, $query) or die(mysqli_error($db));

                                        $nomi = mysqli_real_escape_string($db,$_POST['nomi']);
                                        $query = "INSERT INTO instructions (nomi,docteur_id)
                                        VALUES ('".$nomi."','".$id."')";
                                        mysqli_query($db,$query)or die ('Error in updating Database2');
                                        $zz=sprintf('window.location = "profile.php?action=edit&id='.$id.'";');
                                           $query1 = sprintf('INSERT INTO query_saver (user_name, date, query)
							VALUES ("'.$_SESSION['user_name'].'","'.$datecurrent.'","'.$query.'")');
                                               mysqli_query($db,$query1)or die ('Error in updating Databasex');
                                break;
                        case 'add3':
                                        $id = mysqli_real_escape_string($db,$_POST['docteur_id']);
                                        $datecurrent=date("Y-m-d h:i:s A");
                                        $query = sprintf('UPDATE docteurs set update_time ="'.$datecurrent.'" where docteur_id="'.$id.'"');
                                        mysqli_query($db, $query) or die(mysqli_error($db));
                                        
                                        $instructions = mysqli_real_escape_string($db,$_POST['instructions_id']);
                                        $question = mysqli_real_escape_string($db,$_POST['question']);
                                        $reponse = mysqli_real_escape_string($db,$_POST['reponse']);
                                        $query = "INSERT INTO descriptions (question,reponse,instructions_id)
                                        VALUES ('".$question."','".$reponse."','".$instructions."')";
                                        mysqli_query($db,$query)or die ('Error in updating Database3');
                                        $zz=sprintf('window.location = "profile.php?action=edit&id='.$id.'";');
                                           $query1 = sprintf('INSERT INTO query_saver (user_name, date, query)
							VALUES ("'.$_SESSION['user_name'].'","'.$datecurrent.'","'.$query.'")');
                                               mysqli_query($db,$query1)or die ('Error in updating Databasex');
                        break;
                        case 'addmsg':
                                        $id = mysqli_real_escape_string($db,$_POST['id']);
                                        $date_debut = mysqli_real_escape_string($db,$_POST['date_debut']);
                                        $date_fin = mysqli_real_escape_string($db,$_POST['date_fin']);
                                        $message = mysqli_real_escape_string($db,$_POST['message']);
                                        $query = "INSERT INTO messages (date_debut,date_fin,messages,docteur_id)
                                        VALUES ('".$date_debut."','".$date_fin."','".$message."','".$id."')";
                                        mysqli_query($db,$query)or die ('Error in updating Database4');
                                        $zz=sprintf('window.location = "search.php";');
                                        $datecurrent=date("Y-m-d h:i:s A");
                                           $query1 = sprintf('INSERT INTO query_saver (user_name, date, query)
							VALUES ("'.$_SESSION['user_name'].'","'.$datecurrent.'","'.$query.'")');
                                               mysqli_query($db,$query1)or die ('Error in updating Databasex');
                                break;
                        case 'adduser':
                                        $user_name = mysqli_real_escape_string($db,$_POST['user_name']);
                                        $password = mysqli_real_escape_string($db,$_POST['password']);
                                        $query = "INSERT INTO log (user_name,password)
                                        VALUES ('".$user_name."','".md5($password)."')";
                                        mysqli_query($db,$query)or die ('Error in updating Database5');
                                        $zz=sprintf('window.location = "search.php";');
                                        $datecurrent=date("Y-m-d h:i:s A");
                                           $query1 = sprintf('INSERT INTO query_saver (user_name, date, query)
							VALUES ("'.$_SESSION['user_name'].'","'.$datecurrent.'","'.$query.'")');
                                               mysqli_query($db,$query1)or die ('Error in updating Databasex');
                                break;
                        case 'addcb':
                                        $namec = mysqli_real_escape_string($db,$_POST['namec']);
                                        $query = "INSERT INTO cabinet (namec)
                                        VALUES ('".$namec."')";
                                        mysqli_query($db,$query)or die ('Error in updating Database5');
                                        $zz=sprintf('window.location = "ajoutcb";');
                                        $datecurrent=date("Y-m-d h:i:s A");
                                           $query1 = sprintf('INSERT INTO query_saver (user_name, date, query)
							VALUES ("'.$_SESSION['user_name'].'","'.$datecurrent.'","'.$query.'")');
                                               mysqli_query($db,$query1)or die ('Error in updating Databasex');
                                break;
			}

	?>
    	    <script type="text/javascript">
		<?php echo $zz; ?>
		    </script>
 
        </div>

</body>
</html>
<?php 

}else{

     header("Location: log.php");

     exit();
}
?>

