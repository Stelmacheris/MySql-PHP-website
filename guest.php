<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="guest.css">
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
}
th{
	font-size: 18px;
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
</style>
<body>
	<table>
		
	</table>
   <header class="text-center mb-5 text-white">
      <div class="row">
        <div class="col-lg-7 mx-auto">
          <h1 style = "font-size:36px;">Mobiliojo ryšio planai</h1>
          <h2><br> 
         NORINT UŽSISAKYTI, <a href="login.php" class="text-reset active">PRISIJUNKITE</a></h2>
        </div>
      </div>
    </header>

	
	<?php
		include 'dbconnect.php';
		$result = mysqli_query($conn,"SELECT * FROM plans");
		
		echo "	
			<div class=\"container-lg\">
    		<div class=\"table-responsive\">
        	<div class=\"table-wrapper\">
            <table class=\"table table-bordered\">
                <thead>
                    <tr>
                        <th >Pavadinimas</th>
						<th >Minučių kiekis(min)</th>
						<th >Žinučių kiekis</th>	
						<th >Interneto kiekis(MB)</th>
                    </tr>
                </thead>";

	while($row = mysqli_fetch_array($result))
	{
	echo "<tbody>";	
	if($row['id'] != '100')
	{
		echo "<tr>";
	echo "<td>" . $row['name'] . "</td>";
	echo "<td>" . $row['minutes'] . "</td>";
	echo "<td>" . $row['messages'] . "</td>";
	echo "<td>" . $row['internet'] . "</td>";
	echo "</tr>";	
	}
	
	}
	echo "                </tbody>
            </table>
        </div>
    </div>
</div>";
	
	
?>
	
    
</body>
</html>