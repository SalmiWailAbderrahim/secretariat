
<?php  
       include('connection.php');
	   session_set_cookie_params(0);
	   session_start();
	   date_default_timezone_set("Africa/Lagos");
if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

        ?>  

<body>
<?php
			if (!isset($_GET['do']) || $_GET['do'] != 1) {
			switch ($_GET['type']) {
				case 'docteur':
							$query = 'DELETE FROM docteurs WHERE docteur_id = ' . $_GET['id'];
							$queryinst = 'DELETE FROM instructions WHERE docteur_id = ' . $_GET['id'];
							$querydesc = 'DELETE FROM descriptions WHERE docteur_id = ' . $_GET['id'];
							$querymsg = 'DELETE FROM messages WHERE docteur_id = ' . $_GET['id'];
							mysqli_query($db, $query) or die(mysqli_error($db));
							mysqli_query($db, $queryinst) or die(mysqli_error($db));
							mysqli_query($db, $querydesc) or die(mysqli_error($db));
							mysqli_query($db, $querymsg) or die(mysqli_error($db));


							$datecurrent=date("Y-m-d h:i:s A");
                                           $query1 = sprintf('INSERT INTO query_saver (user_name, date, query)
							VALUES ("'.$_SESSION['user_name'].'","'.$datecurrent.'","'.$query.' '.$queryinst.' '.$querydesc.' '.$querymsg.'")');
                                               mysqli_query($db,$query1)or die ('Error in updating Databasex');

							$z=sprintf('window.location = "docteurs.php";');
						break;
				case 'instruction':
							$querydesc = 'DELETE FROM descriptions WHERE instructions_id =' . $_GET['id'];
							mysqli_query($db, $querydesc) or die(mysqli_error($db));
							$queryinst = 'DELETE FROM instructions WHERE instructions_id =' . $_GET['id'];
							mysqli_query($db, $queryinst) or die(mysqli_error($db));
							$datecurrent=date("Y-m-d h:i:s A");
                                           $query1 = sprintf('INSERT INTO query_saver (user_name, date, query)
							VALUES ("'.$_SESSION['user_name'].'","'.$datecurrent.'","'.$queryinst.' '.$querydesc.'")');
                                               mysqli_query($db,$query1)or die ('Error in updating Databasex');
							$z=sprintf('window.location = "profile.php?action=edit & id='.$_GET['doc'].'";');
							
						break;
				case 'description':
							$query = 'DELETE FROM descriptions WHERE description_id = ' . $_GET['id'];
							$result = mysqli_query($db, $query) or die(mysqli_error($db));
							$z=sprintf('window.location = "profile.php?action=edit & id='.$_GET['doc'].'";');
							$datecurrent=date("Y-m-d h:i:s A");
                                           $query1 = sprintf('INSERT INTO query_saver (user_name, date, query)
							VALUES ("'.$_SESSION['user_name'].'","'.$datecurrent.'","'.$query.'")');
                                               mysqli_query($db,$query1)or die ('Error in updating Databasex');
						break;
				case 'msg':
							$query = 'DELETE FROM messages WHERE message_id = ' . $_GET['id'];
							$result = mysqli_query($db, $query) or die(mysqli_error($db));
							$z=sprintf('window.location = "messages.php";');
							$datecurrent=date("Y-m-d h:i:s A");
                                           $query1 = sprintf('INSERT INTO query_saver (user_name, date, query)
							VALUES ("'.$_SESSION['user_name'].'","'.$datecurrent.'","'.$query.'")');
                                               mysqli_query($db,$query1)or die ('Error in updating Databasex');
						break;
				case 'cabinet':
							$query = 'DELETE FROM cabinet WHERE cabinet_id = ' . $_GET['id'];
							$result = mysqli_query($db, $query) or die(mysqli_error($db));
							$z=sprintf('window.location = "ajoutcb.php";');
							$datecurrent=date("Y-m-d h:i:s A");
                                           $query1 = sprintf('INSERT INTO query_saver (user_name, date, query)
							VALUES ("'.$_SESSION['user_name'].'","'.$datecurrent.'","'.$query.'")');
                                               mysqli_query($db,$query1)or die ('Error in updating Databasex');
						break;
			}
?>
			<script type="text/javascript">
				<?php echo $z;?>
			</script>				
				
			<?php
				
			}
			?>

</body>
</html>
<?php 

}else{

     header("Location: index.php");

     exit();
}
?>