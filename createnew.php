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
$conn = null;


?>

    <ul>
        <li><br>
		<form method="POST" id="signup" name="signup" action="addtask.php" >

		<b>Add Activity</b><br><br>
			Task: <br>
			<label for="task"></label> <input class="text" name="task" type="text" required/> <br/><br>
			Start Date: <br>
			<label for="start"></label> <input class="text" name="start" type="date" required/> <br/><br>
			Due Date: <br>
			<label for="due"></label> <input class="text" name="due" type="date" required/> <br/><br>
			<input class="btn" type="submit" value="Add New Task" />

		</form> 

        </li>
    </ul>


<?php 



 include 'view/footer.php'; ?>