<?php
    
$showAlert = false; 
$showError = false; 
$exists=false;
    
if($_SERVER["REQUEST_METHOD"] == "POST") {
      
    // Include file which makes the
    // Database Connection.
    include 'dbconnect.php';   
    
    $username = $_POST["username"]; 
    $password = $_POST["password"]; 
    $repassword = $_POST["repassword"];
    $name = $_POST["name"];
	$surname = $_POST["surname"];
    $sql = "SELECT * FROM user where username='$username'";
    
    $result = mysqli_query($conn, $sql);
    
    $num = mysqli_num_rows($result); 
	
	if($num == 0) {
        if(($password == $repassword) && $exists==false && (empty($username) || empty($name) || empty($surname) || empty($password) || empty($repassword))) {
    		
		$showError = "Netesingi registracijos duomenys"; 
		} 
		else{
		$hash = MD5($password);
            // Password Hashing is used here. 
            $sql = "INSERT INTO `user` ( `name`,`surname`,`username`, 
                `password`,`plan_id`) VALUES ('$name','$surname','$username', 
                '$hash','100')";
    
            $result = mysqli_query($conn, $sql);
            if ($result) {
				$showAlert = true;
            }
		
		}    
    }// end if 
    
   if($num>0) 
   {
      $exists="Vartotojo vardas užimtas"; 
   } 
    
}

    
?>


<!DOCTYPE html>
<html>
<head>
    <title>Registracija</title>
    <meta charset="utf-8">
	
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='//fonts.googleapis.com/css?family=Open+Sans:700,600' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href=
"https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity=
"sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk"
        crossorigin="anonymous"> 
	<link rel="stylesheet" href="style.css">
</head>
<body>
	
	<?php
    
    if($showAlert) {
    
        echo ' <center style = \"color:red;\">Registracija sėkminga. Galie prisijungti </center>'; 
    }
    
    if($showError) {
    
        echo ' <center style = \"color:red;\">Netesingi registracijos duomenys </center>'; 
   }
        
    if($exists) {
        echo ' <center style = \"color:red;\"> Vartotojo vardas užimtas </center> '; 
     }
   
?>

	
    <div id="absoluteCenteredDiv">
        <form action="register.php" method="post">
            <div class="box">
                <h1>Registracija</h1>
				<input class="username" name="name" type="text" placeholder="Vardas">
				<input class="username" name="surname" type="text" placeholder="Pavarde">
                <input class="username" name="username" type="text" placeholder="Vartotojo vardas">
                <input class="username" name="password" type="password" placeholder="Slaptažodis">
                <input class="username" name="repassword" type="password" placeholder="Pakartoti slaptažodį">
				<button type="submit" class="button">
					Registruoti
				</button>
            </div>
        </form>
        <p>Turite paskyrą? <a class="fpwd" href="login.php">Prisijungti</a></p>
    </div>        
</body>
</html>