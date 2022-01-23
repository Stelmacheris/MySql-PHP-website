<?php
session_start();
if(!isset($_SESSION["username"])){
	header("location:login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Vadybininkas</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
	<style>
		body{
		    color: #404E67;
    background: #00b4db;
    font-family: 'Open Sans', sans-serif;
		}
		table{
			background: white; !important
		}
	</style>
</head>
<body>
<h1><center style = "color:white;">Vartotojų užsakyti planai </center> </h1>	
<div class="float-right text-red h3"><a href = "logout.php" style = "color:red;">Atsijungti</a></div>
<button class = "btn btn-primary my-5"> <a href = "report.php" class = "text-light"> Kurti ataskaitas </a></button>
<form method = "post">
	<input type="hidden" name="form" value="A">
	<input name = "ieskoti"placeholder = "Ieškoti" type  = "text" style = "margin-top: 60px;">
	<button type="submit" class="btn btn-primary">Ieškoti</button>
</form>

<table class="table my-5">
	 <thead>
		 <tr>
		<th scope="col">Vardas</th>
		<th scope="col">Pavardė</th>
		 <th scope="col">Vartotojo vardas</th>
		 <th scope="col">Užsakytas planas</th>
		</tr>
		</thead>
		 <tbody>	
<?php
	include "dbconnect.php";
	$search = "s";
	$maketemp = "
    	CREATE TEMPORARY TABLE sel (
	   `id` int NOT NULL AUTO_INCREMENT,
      `n` varchar(50),
      `s` varchar(50),
      `u` varchar(50),
      `p` varchar(50),
      PRIMARY KEY(id)
    )
  "; 
	$r = mysqli_query($conn, $maketemp);		 
	if(isset($_POST['form'])){			
	$search = $_POST["ieskoti"];
	$sql = "SELECT user.name AS n , user.surname, user.username, plans.name FROM `user` INNER JOIN `plans` 
	ON user.plan_id=plans.id AND user.user_type = 'user' AND user.name LIKE '%$search%' UNION SELECT user.name 
	AS n , user.surname, user.username, plans.name FROM `user` INNER JOIN `plans` ON user.plan_id=plans.id 
	AND user.user_type = 'user' AND user.surname LIKE '%$search%'";
	$result = mysqli_query($conn,$sql);
	while($row = mysqli_fetch_array($result)){	
		$n =  $row['n'];
		$s =  $row['surname'];
		$u =  $row['username'];
		$p =  $row['name'];

			echo "
		<tr>
      <td scope=\"row\">".$row['n']."</td>
		<td>".$row['surname']."</td>
		<td>".$row['username']."</td>
		<td>".$row['name']."</td>
    </tr>
		";				
	}
	echo "</tbody>
</table>";
		
	}	 
	else{		
	$sql = "SELECT user.name AS n , user.surname, user.username, plans.name FROM `user` INNER JOIN `plans` ON user.plan_id=plans.id AND user.user_type = 'user'";
	$result = mysqli_query($conn,$sql);
	while($row = mysqli_fetch_array($result)){	
			echo "
		<tr>
      <td scope=\"row\">".$row['n']."</td>
		<td>".$row['surname']."</td>
		<td>".$row['username']."</td>
		<td>".$row['name']."</td>
    </tr>
		";				
	}
	echo "</tbody>
</table>";
	}			 	
	?>
   
</body>
</html>