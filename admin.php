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
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
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
<body>
	<div class="float-right text-red h3"><a href = "logout.php" style = "color:red;">Atsijungti</a></div>	
	<button class = "btn btn-primary my-5"> <a href = "addplan.php" class = "text-light"> Pridėti planą </a></button>
	<table class="table my-5">
	 <thead>
		 <tr>
		 <th scope="col">Pavadinimas</th>
		 <th scope="col">Kaina</th>
		 <th scope="col">Minučių kiekis</th>
		 <th scope="col">Žinučių kiekis</th>
		 <th scope="col">Interneto kiekis</th>
		<th scope="col">Operacijos</th>
		</tr>
		</thead>
		 <tbody>
	<?php
	include "dbconnect.php";
	$sql = "SELECT id, name,price,messages,minutes,internet FROM `plans`";
	$result = mysqli_query($conn,$sql);
	
	//<button type=\"button\" class=\"btn btn-danger\"> <a href =\"delete.php\" class = \"text-light\" >Pašalinti</a></button>
	while($row = mysqli_fetch_array($result)){
		
		if($row['id'] != '100'){
		$id = $row['id'];
			echo "
		<tr>
      <th scope=\"row\">".$row['name']."</th>
      <td>".$row['price']."</td>
      <td>".$row['minutes']."</td>
	  <td>".$row['messages']."</td>
	  <td>".$row['internet']."</td>
	  <td>
	  <button type=\"button\" class=\"btn btn-primary\"> <a href =\"update.php?id=$id \" class = \"text-light\">Atnaujinti</a></button>
	  </td>
    </tr>
		";
		}
		
	}
	echo "</tbody>
</table>";
	?>
    
  
 

	
    
</body>
</html>