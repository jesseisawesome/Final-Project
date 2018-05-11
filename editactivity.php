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

?>

    <ul>
        <li><br>
		<form method="POST" id="signup" name="signup" action="updatetask.php" >

		<b>Edit Activity</b><br><br>
			Task: <br>
			<label for="task"></label> <input class="text" name="task" type="text" value='<?php echo $activity['activityName'];?>' required/> <br/><br>
			Start Date: <br>
			<label for="start"></label> <input class="text" name="start" type="date" value='<?php echo $activity['activityStart'];?>' required/> <br/><br>
			Due Date: <br>
			<label for="due"></label> <input class="text" name="due" type="date" value='<?php echo $activity['activityDue'];?>' required/> <br/><br>
			<input class="btn" type="submit" value="Edit Task" />
			<input type='hidden' name='activityID' value='<?php echo $activity['activityID'];?>'/>   
		</form> 

        </li>
    </ul>


<?php 



 include 'view/footer.php'; ?>
 
