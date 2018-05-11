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


	if (($_POST["email"] != "jesse@gmail.com") || ($_POST["password"] != "jesse")) {
		view();
	} else { 	
		process();
	}
?>
<main>
<?php
function view() {
	?>

<form method="POST" id="signup" name="signup" action="submit.php" >

<h1>Sign In</h1>

<label for="name"><b>Name</b></label>  <input class="text" name="nameuser" type="text" required/> <br><br>

<label for="email"><b>E-Mail Address</b></label>  <input class="text" name="email" type="text" required/>  <br><br>

<label for="password"><b>Password</b></label>  <input class="text" name="password" type="text" required/> <br><br>

<input class="btn" type="submit" value="Sign In" /></form><br>

</form>
<?php

}

function process() {
	
	
?>

</main>

<?php 
}
?>

<?php include 'view/footer.php'; ?>