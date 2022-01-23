<?php
session_start();

if(!isset($_SESSION["username"]) || $_SESSION['user_type'] != "admin" ){
	header("location:login.php");
}

include 'dbconnect.php';
echo "<div class=\"float-right text-red h3\"><a href = \"admin.php\" style = \"color:white;\">Atgal</a></div>";
$id = $_GET['id'];
$sql = "SELECT * FROM `plans` WHERE id = $id";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
$name = $row['name'];
$price= $row['price'];
$messages = $row['messages'];
$minutes = $row['minutes'];
$internet = $row['internet'];

if($_SERVER["REQUEST_METHOD"] == "POST"){
	
	$id = $_GET['id'];
	$name = $_POST['name'];
	$price= $_POST['price'];
	$messages = $_POST['messages'];
	$minutes = $_POST['minutes'];
	$internet = $_POST['internet'];
	$sql = "SELECT * FROM plans where name='$name'";
	$result = mysqli_query($conn,$sql);
	$num = mysqli_num_rows($result); 
	
	if(empty($name) || empty($price) ||empty($messages) ||empty($internet) ||empty($minutes)){
		echo "<center style = \"color: white; font-size:24px;\"> Blogai suvesti duomenys </center>";
	}
	 
	else{
		
	$sql = "UPDATE `plans`set name = '$name', price = '$price', messages = '$messages', minutes = '$minutes', internet = '$internet' WHERE id = $id";
	$result = mysqli_query($conn,$sql);
		echo "<center style = \"color: white;font-size:24px;\"> Planas įrašytas </center>";
	}
	
	

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
	<div class = "container my-5">
	<form method = "post">	
  <div class="form-group">
    <label >Pavadinimas</label>
    <input name = "name" type="text" class="form-control" placeholder="Pavadinimas"autocomplete="off" value = <?php echo $name; ?> >
  </div>
  <div class="form-group">
    <label >Kaina</label>
    <input name = "price" type="number" min = "0" class="form-control" id="exampleInputPassword1" placeholder="Kaina"autocomplete="off" value = <?php echo $price; ?>>
  </div>
	<div class="form-group">
    <label >Žinučių kiekis</label>
    <input name = "messages" type="number" min = "0" class="form-control" placeholder="Žinučių kiekis"autocomplete="off" value = <?php echo $messages; ?>>
  </div>
	<div class="form-group">
    <label >Minučių kiekis</label>
    <input name = "minutes" type="number" min = "0" class="form-control" placeholder="Minučių kiekis" autocomplete="off" value = <?php echo $minutes; ?>>
  </div>
		
<div class="form-group">
    <label >Interneto kiekis</label>
    <input name = "internet" type="number" min = "0" class="form-control" placeholder="Interneto kiekis"autocomplete="off" value = <?php echo $internet; ?>>
  </div>
		

  <button type="submit" class="btn btn-primary">Įrašyti</button>
	
</form>
</div>
    
</body>
</html>