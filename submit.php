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

$cookie_name = 'Username';
$cookie_value = $_POST['nameuser'];
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day;

?>
<main>
    <ul>
        <li><br>


		<b>My Tasks</b><br>
		
		<table style="width:100%">
			<tr>
				<th>Task</th><th>Due Date</th><th>Edit</th><th>Delete</th><th>Status</th>
			</tr>
			
<?php

			$query = 'SELECT * FROM activities WHERE activityStatus = 0
					  ORDER BY activityDue';
			$statement = $conn->query($query);
			$statement->execute();   
			$activities = $statement->fetchAll();
			foreach ($activities as $activity) {
				echo '<tr>';
				echo '<td>' . $activity['activityName'] . '</td>';
				echo '<td>' . $activity['activityDue'] . '</td>';
				
?>
				<form method="POST" id="signup" name="signup" action="editactivity.php" >
					<td><input class="btn" type="submit" value="Edit" /></td>
					<input type='hidden' name='activityID' value='<?php echo $activity['activityID'];?>'/>   
				</form>
				
				
				<form method="POST" id="signup" name="signup" action="deleteactivity.php" >
					<td><input class="btn" type="submit" value="Delete" /></td>
					<input type='hidden' name='activityID' value='<?php echo $activity['activityID'];?>'/>   
				</form>
				
				
				<form method="POST" id="signup" name="signup" action="completeactivity.php" >
					<td><input class="btn" type="submit" value="Complete" /></td>
					<input type='hidden' name='activityID' value='<?php echo $activity['activityID'];?>'/>   
				</form>
				
				
<?php
				
				echo '</tr>';
			}

			
?>	
			
		
		</table>
		<form method="POST" id="signup" name="signup" action="createnew.php" >
			<input class="btn" type="submit" value="Add New Task" /><br><br>
		</form>

			<b>Completed Tasks</b> <br>
				<table style="width:100%">
			<tr>
				<th>Task</th><th>Due Date</th><th>Delete</th><th>Status</th>
			</tr>
<?php

			$query = 'SELECT * FROM activities WHERE activityStatus = 1
					  ORDER BY activityDue';
			$statement = $conn->query($query);
			$statement->execute();   
			$activities = $statement->fetchAll();
			foreach ($activities as $activity) {
				echo '<tr>';
				echo '<td>' . $activity['activityName'] . '</td>';
				echo '<td>' . $activity['activityDue'] . '</td>';  
?>				

				<form method="POST" id="signup" name="signup" action="deleteactivity.php" >
					<td><input class="btn" type="submit" value="Delete" /></td>
					<input type='hidden' name='activityID' value='<?php echo $activity['activityID'];?>'/>   
				</form>

				<form method="POST" id="signup" name="signup" action="uncompleteactivity.php" >
					<td><input class="btn" type="submit" value="Uncomplete" /></td>
					<input type='hidden' name='activityID' value='<?php echo $activity['activityID'];?>'/>   
				</form>
				
<?php
				echo '</tr>';
			}


?>	
	
		
		</table>





        </li>
    </ul>
</main>
<script>
function editActivity($activityID){
	print 'meehhhhhh' . $activityID;
}
</script>
<?php 

 include 'view/footer.php'; ?>