<?php
session_start();
$showAlert = false; 
$showError = false; 
$exists=false;

if($_SERVER["REQUEST_METHOD"] == "POST"){
	include 'dbconnect.php';
	 $username = $_POST["username"]; 
    $password = $_POST["password"]; 
    $md5 = MD5($password);
    $sql = "SELECT * FROM user where username='$username' AND password='$md5'";  
    $result = mysqli_query($conn, $sql);  
    $num = mysqli_num_rows($result); 
	
	if($num == 0){
		$showError = true;
	}
	else{
		$row = mysqli_fetch_array($result);
		if($row['user_type'] == "user")
		{
			$_SESSION['username'] = $username;
			$_SESSION['user_type'] = "user";
			header("location:plans.php");
		}
		elseif($row['user_type'] == "admin")
		{
			$_SESSION['username'] = $username;
			$_SESSION['user_type'] = "admin";
			header("location:admin.php");
		}
		elseif($row['user_type'] == "manager")
		{
			$_SESSION['username'] = $username;
			$_SESSION['user_type'] = "manager";
			header("location:manager.php");
		}
	}
	
	
	
}

?>
<?php
    if($showError) {
    
        echo ' Neteisingai nuordytas vartotojo vardas ar slaptažodis '; 
   }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Prisijungimas</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='//fonts.googleapis.com/css?family=Open+Sans:700,600' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="absoluteCenteredDiv">
        <form method="post">
            <div class="box">
                <h1>Prisijungimas</h1>
                <input class="username" name="username" type="text" placeholder="Vartotojo vardas">
                <input class="username" name="password" type="password" placeholder="Slaptažodis">
                <button type="submit" class="button">
					Prisijungti
				</button>
            </div>
        </form>
        <p>Neturi paskyros? <a class="fpwd" href="register.php">Registruotis</a></p>
        <p>Apsilankyti kaip <a class="fpwd" href="guest.php">Svečias</a></p>
    </div>        
</body>
</html>