<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edition</title>
</head>
<body>
	<?php
	   session_start();
	   date_default_timezone_set("Africa/Lagos");
	   include('connection.php');
	   $datecurrent=date("Y-m-d h:i:s A");
			$zz = mysqli_real_escape_string($db,$_POST['id']);
			$query = sprintf('UPDATE docteurs set update_time ="'.$datecurrent.'" where docteur_id="'.$zz.'"');
            mysqli_query($db, $query) or die(mysqli_error($db));

			$nom = mysqli_real_escape_string($db,$_POST['nom']);
		    $specialite = mysqli_real_escape_string($db,$_POST['specialite']);
			$telephone = mysqli_real_escape_string($db,$_POST['telephone']);
			$email = mysqli_real_escape_string($db,$_POST['email']);
			$addressC = mysqli_real_escape_string($db,$_POST['addressC']);

			$Information = mysqli_real_escape_string($db,$_POST['Information']);
            $Regles = mysqli_real_escape_string($db,$_POST['Regles']);
            $comment = mysqli_real_escape_string($db,$_POST['comment']);
			
	
if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

		
	 			$query = 'UPDATE docteurs set nom ="'.$nom.'",
				 specialite ="'.$specialite.'", telephone="'.$telephone.'",
					email="'.$email.'",addressC="'.$addressC.'", 
					Information="'.$Information.'", Regles="'.$Regles.'", 
					comment="'.$comment.'" 
					WHERE docteur_id ="'.$zz.'" ';
					$result = mysqli_query($db, $query) or die(mysqli_error($db));

                                           $query1 = sprintf("INSERT INTO query_saver (user_name, date, query)
							VALUES ('".$_SESSION['user_name']."','".$datecurrent."','".mysqli_real_escape_string($db,$query)."')");
                                                mysqli_query($db,$query1)or die ('Error in updating Databasex1');

					$querycontinst = 'SELECT count(*) FROM instructions where docteur_id='.$zz;
					$resultcountinst = mysqli_query($db, $querycontinst) or die (mysqli_error($db));
					
					if($row=mysqli_fetch_array($resultcountinst)){
						for ($cpt=1;$cpt<$row['count(*)']+1;$cpt++){
								$queryinst =sprintf("UPDATE instructions set nomi ='".mysqli_real_escape_string($db,$_POST[$cpt])."' 
								WHERE instructions_id ='".mysqli_real_escape_string($db,$_POST['inst'.$cpt])."'
								"); 
								
                                           $query1 = sprintf('INSERT INTO query_saver (user_name, date, query)
							VALUES ("'.$_SESSION['user_name'].'","'.$datecurrent.'","'.$queryinst.'")');
                                               mysqli_query($db,$query1)or die ('Error in updating Databasex2');
									$resultinst = mysqli_query($db, $queryinst) or die(mysqli_error($db));

								$querycontdesc = sprintf("SELECT count(*) FROM descriptions 
								where instructions_id='".mysqli_real_escape_string($db,$_POST['inst'.$cpt])."'
								");
								$resultcountdesc = mysqli_query($db, $querycontdesc) or die (mysqli_error($db));
								
							if($rowdesc=mysqli_fetch_array($resultcountdesc)){
									for ($cpt1=1;$cpt1<$rowdesc['count(*)']+1;$cpt1++){
										$querydesc =sprintf("UPDATE descriptions set 
										question ='".mysqli_real_escape_string($db,$_POST['question'.$cpt.$cpt1])."' ,reponse ='".mysqli_real_escape_string($db,$_POST['reponse'.$cpt.$cpt1])."'
										WHERE description_id ='".mysqli_real_escape_string($db,$_POST['desc'.$cpt.$cpt1])."'
										");	
										
                                           $query1 = sprintf('INSERT INTO query_saver (user_name, date, query)
							VALUES ("'.$_SESSION['user_name'].'","'.$datecurrent.'","'.$querydesc.'")');
                                               mysqli_query($db,$query1)or die ('Error in updating Databasex3');
									 $resultdesc = mysqli_query($db, $querydesc) or die(mysqli_error($db));
										
									}
							}
						}
					}
?>	
	<script type="text/javascript">
			<?php echo 'window.location = "edit.php?action=edit & id='.$zz.'";'?>;
		</script>
 </body>
</html>
<?php 

}else{

     header("Location: index.php");

     exit();
}
?>