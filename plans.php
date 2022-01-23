<?php
session_start();
if(!isset($_SESSION["username"])){
	header("location:login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.css">
	
    <title>Planai</title>
</head>
<style>
body {
    color: #404E67;
    background: #00b4db;
    font-family: 'Open Sans', sans-serif;
}
.table-wrapper {
    width: 700px;
    margin: 30px auto;
    background: #fff;
    padding: 20px;	
    box-shadow: 0 1px 1px rgba(0,0,0,.05);
}
.table-title {
    padding-bottom: 10px;
    margin: 0 0 10px;
}
.table-title h2 {
    margin: 6px 0 0;
    font-size: 22px;
}
.table-title .add-new {
    float: right;
    height: 30px;
    font-weight: bold;
    font-size: 12px;
    text-shadow: none;
    min-width: 100px;
    border-radius: 50px;
    line-height: 13px;
}
.table-title .add-new i {
    margin-right: 4px;
}
table.table {
    table-layout: fixed;
}
table.table tr th, table.table tr td {
    border-color: #e9e9e9;
}
table.table th i {
    font-size: 13px;
    margin: 0 5px;
    cursor: pointer;
}
table.table th:last-child {
    width: 100px;
}
table.table td a {
    cursor: pointer;
    display: inline-block;
    margin: 0 5px;
    min-width: 24px;
}    
table.table td a.add {
    color: #27C46B;
}
table.table td a.edit {
    color: #FFC107;
}
table.table td a.delete {
    color: #E34724;
}
table.table td i {
    font-size: 19px;
}
table.table td a.add i {
    font-size: 24px;
    margin-right: -1px;
    position: relative;
    top: 3px;
}    
table.table .form-control {
    height: 32px;
    line-height: 32px;
    box-shadow: none;
    border-radius: 2px;
}
table.table .form-control.error {
    border-color: #f50000;
}
table.table td .add {
    display: none;
}
	
td{
		font-size: 14px;
	text-align: center;
}
th{
	font-size: 16px;
	text-align: center;
	}
	
h1{
	padding-top:60px;
	}
	
h2{
	padding-top:45px;
	}
	
table{
	padding-top:50px;
	}
	
.info{
  margin: auto;
  width: 50%;
  padding: 10px;
padding-left: 180px;
	}
</style>
<body>
<div class="float-right text-red h3"><a href = "logout.php" style = "color:red;">Atsijungti</a></div>	
   <header class="text-center mb-5 text-white">
      <div class="row">
        <div class="col-lg-7 mx-auto">
          <h1>Mobiliojo ryšio planai (naudotojas:<?php echo $_SESSION['username'] ?>) </h1><br> 
        </div>
      </div>
    </header>
	
	<header class="text-center mb-5 text-white">
      <div class="row">
        <div class="col-lg-7 mx-auto">
          <h1>Įveskite savo minučių, žinučių ir interneto kiekį per mėnesį </h1><br> 
        </div>
      </div>
    </header>
	<form method = "post" >
	<div class = "info">
	<label for="min">Minutės:</label>
	<input type="number" min = "0" name="min">
	<label for="min">Žinutės:</label>
	<input type="number" min = "0" name="msg">
	<label for="min">Interneto kiekis:</label>
	<input type="number" min = "0" name="mb">
	<button type="submit" class="button btn btn-primary">
	Pateikti
	</button>
	</div>
	</form>
	
	<?php
	$showAlert = false; 
		include 'dbconnect.php';
		
	
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$min = $_POST['min'];
		$msg = $_POST['msg'];
		$mb = $_POST['mb'];
	$sql = "SELECT * FROM `plans` WHERE
			minutes >=$min AND messages >=$msg AND internet >=$mb
			ORDER BY price ASC
			LIMIT 1";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_array($result);
	$order = "order";
	$num = mysqli_num_rows($result); 
	if($num != 0)
	{
		
		echo "
			<div class=\"container-lg\">
    		<div class=\"table-responsive\">
        	<div class=\"table-wrapper\">
            <table class=\"table table-bordered\">
                <thead>
                    <tr>
                        <th >Pavadinimas</th>
						<th >Kaina</th>
						<th >Minučių kiekis(min)</th>
						<th >Žinučių kiekis</th>	
						<th >Interneto kiekis(MB)</th>
                    </tr>
                </thead>";
			echo "<tr>";
	echo "<td>" . $row['name'] . "</td>";
	echo "<td>" . $row['price'] . "</td>";
	echo "<td>" . $row['minutes'] . "</td>";
	echo "<td>" . $row['messages'] . "</td>";
	echo "<td>" . $row['internet'] . "</td>";
	//echo "<td>" . "<input type='submit' name='order' value='Užsakyti'>"  . "</td>";
	$id = $row['id'];
	echo "<td>". "<a href='plans.php?id=$id&action=$order'>". "<input type='submit' onclick=\"return confirm('Ar norite užsisakyti šią paslaugą?');\"  name='order' value = \"Užsakyti\"></input>". "</a>". "</td>";
	echo "</tr>";
	echo "     </tbody>           
            </table>
        </div>
    </div>
</div>";
	
	}
		else{
		echo "<center style = \"font-size:24px; color: white;\">Planas pagal jūsų reikalavimus nerastas</center>";
		
		}
			
	}
	
		$result = mysqli_query($conn,"SELECT * FROM plans");
		
		echo "	
			<div class=\"container-lg\">
    		<div class=\"table-responsive\">
        	<div class=\"table-wrapper\">
            <table class=\"table table-bordered\">
                <thead>
                    <tr>
                        <th >Pavadinimas</th>
						<th >Kaina</th>
						<th >Minučių kiekis(min)</th>
						<th >Žinučių kiekis</th>	
						<th >Interneto kiekis(MB)</th>
                    </tr>
                </thead>";

	while($row = mysqli_fetch_array($result))
	{
	$order = "order";
	echo "<tbody>";	
	if($row['id'] != '100')
	{
	echo "<tr>";
	echo "<td>" . $row['name'] . "</td>";
	echo "<td>" . $row['price'] . "</td>";
	echo "<td>" . $row['minutes'] . "</td>";
	echo "<td>" . $row['messages'] . "</td>";
	echo "<td>" . $row['internet'] . "</td>";
	//echo "<td>" . "<input type='submit' name='order' value='Užsakyti'>"  . "</td>";
	$id = $row['id'];
	echo "<td>". "<a href='plans.php?id=$id&action=$order'>". "<input onclick=\"return confirm('Ar norite užsisakyti šią paslaugą?');\" type='submit' name='order' value='Užsakyti'></input>". "</a>". "</td>";
	echo "</tr>";
	}
		
	}
	echo "     </tbody>           
            </table>
        </div>
    </div>
</div>";
	if(isset($_GET['id'])){
		echo "<center style = \"font-size:24px; color: white;\">Užsakymas įvykdytas</center>";
		$id =  $_GET['id'];
		include 'dbconnect.php';
		$sql = "UPDATE user SET plan_id = '$id' WHERE username = '" . $_SESSION['username']. "'";
		$result = mysqli_query($conn, $sql);			
		}
		$sql = "SELECT plans.id,plans.name,plans.minutes,plans.messages,plans.internet,plans.price FROM `user` INNER JOIN `plans` ON user.plan_id=plans.id AND user.username = '" . $_SESSION['username']. "'";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_array($result);
		if($row['id'] != '100')
		{
			
			echo "<div class=\"text-center mb-5 text-white\">
				<div class=\"row\">
				<div class=\"col-lg-7 mx-auto\">
				<h2 style = \"font-size:32px;\">Mano planas</h2><br>
				</div>
      			</div>
    			</div>
				<div class=\"d-flex justify-content-center align-items-center\" id = \"outer\">
				<div class=\"bg-white p-5 rounded-lg shadow\">
				<h1 class=\"h6 display-1 text-uppercase d-flex justify-content-center font-weight-bold mb-4\">" . $row['name'] . "</h1>" . 
			    "<h2 class=\"h1 display-3  font-weight-bold\">". $row['price'] ."€/mėn"."<span class=\"text-small font-weight-normal ml-2\"></span></h2>".
				"<div class=\"custom-separator display-4  my-4 mx-auto bg-primary \"></div>".
				"<ul class=\"list-unstyled my-5 text-small text-left font-weight-normal\">".
				"<li class=\"mb-3\">".
				"<p style = \"font-size: 36px;\">". $row['minutes'] . " minučių"."</p>"."</li>".
				"<li class=\"mb-3\">".
				"<p style = \"font-size: 36px;\">". $row['messages'] . " žinučių"."</p>"."</li>".
				"<li class=\"mb-3\">".
				"<p style = \"font-size: 36px;\">". $row['internet'] . " MB"."</p>"."</li>";
		}	
			
?>
	

    
</body>
</html>