<?php include 'view/header.php';


$username = 'jk488';
$password = 'gT5w6kPO';
$hostname = 'sql2.njit.edu';
$dsn = "mysql:host=$hostname;dbname=$username";
try {
    $conn = new PDO($dsn, $username, $password);
   /* echo "Connected successfully<br>"; */
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

echo 'the activity id is: ' . $_POST['activityID'];
			$query = 'SELECT * FROM activities WHERE activityID = '. $_POST['activityID'];
			$statement = $conn->query($query);
			$statement->execute();   
			$activity = $statement->fetch();

    $query = "DELETE FROM activities WHERE activityID = " . $_POST['activityID']; 

	try {     
		$statement = $conn->prepare($query);
		    $statement->bindValue(':name', $task);
			$statement->bindValue(':start', $start);
			$statement->bindValue(':due', $due);
			$statement->bindValue(':status', FALSE);
	}
	catch (PDOException $e){
		echo $e->getMessage();
	}


    $statement->execute();
    $statement->closeCursor();
	




 include 'view/footer.php'; ?>
 
 <script>
  window.location.href = "submit.php";
</script>