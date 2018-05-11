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


$task=$_POST['task'];
$start=$_POST['start'];
$due=$_POST['due'];
/*echo 'task is this  ' . $task=$_POST['task'] . '   start is this  ' . $start=$_POST['start'] . '   due is this   ' . $due=$_POST['due']; */


    $query = 'INSERT INTO activities
                 (activityName, activityStart, activityDue, activityStatus)
              VALUES
                 ( :name, :start, :due, :status)';

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