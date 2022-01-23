<?php
session_start();

if(!isset($_SESSION["username"]) || $_SESSION['user_type'] != "manager" ){
	header("location:login.php");
}
include 'dbconnect.php';
echo "<div class=\"float-right text-red h3\"><a href = \"manager.php\" style = \"color:white;\">Atgal</a></div>";
echo "<h1><center style = \"color:white;\">Planų ataskaitos sudarymas </center> </h1>";
$sql = "SELECT name from plans";
$result = mysqli_query($conn,$sql);

echo "<form action=\"#\" method=\"post\">";
echo "<label style = \"color: white;\" for=\"plan\">Pasirinkite planą:</label>";
echo"<select id = \"plan\" name=\"plans\">
		<option value=\"...\">...</option>
        <option value=\"Visi\">Visi</option>
		";
while($row = mysqli_fetch_array($result)){
		echo '<option value="' . $row['name'] . '">' . $row['name'] . '</option>';
}
echo "</select>";
echo "</center>";
echo "<input type=\"submit\" name=\"submit\" value=\"Sudaryti\" class = \" info btn btn-primary\">";
echo "</form>";

if(isset($_POST['submit'])){
if(!empty($_POST['plans'])){
	$selected = $_POST['plans'];
	$sql = "SELECT COUNT(plans.name) FROM `user` INNER JOIN `plans` ON user.plan_id=plans.id AND plans.name = '$selected'";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_array($result);
	
	if($selected == "Visi"){
		echo "<table class=\"table my-5\">
	 <thead>
		 <tr>
		 <th scope=\"col\">Pavadinimas</th>
		 <th scope=\"col\">Užsakytas kiekis</th>
		</tr>
		</thead>
		 <tbody>";
	
		$sql = "SELECT plans.name, (SELECT COUNT(*) FROM user WHERE plans.id = user.plan_id) AS count FROM plans";
		$result = mysqli_query($conn,$sql);
		while($row = mysqli_fetch_array($result))
		{
		echo "
		<tr>
      <th scope=\"row\">".$row['name']."</th>
      <td>".$row['count']."</td>
    </tr>
		";
		}
	
	
	
		echo "</tbody>
</table>";
	}
	
	
	
	else{
	
		echo "<table class=\"table my-5\">
	 <thead>
		 <tr>
		 <th scope=\"col\">Pavadinimas</th>
		 <th scope=\"col\">Užsakytas kiekis</th>
		</tr>
		</thead>
		 <tbody>";
	
	echo "
		<tr>
      <th scope=\"row\">".$selected."</th>
      <td>".$row['COUNT(plans.name)']."</td>
    </tr>
		";
	
	
		echo "</tbody>
</table>";
		
	}
	
	
}
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
		select{
			margin-top:100px;
			margin-left:100px;
		}
		input{
		margin-left:25px;
		}
		body{
		    color: #404E67;
    background: #00b4db;
    font-family: 'Open Sans', sans-serif;
		}
		table{
			background: white; !important
		}
		info{
			height: 50px; !important
			width: 50px; !important
		}
		
	</style>
</head>
<body>

   
</body>
</html>