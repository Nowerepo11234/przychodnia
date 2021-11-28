<?php
//including the database connection file
include_once("config.php");

//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "SELECT * FROM lekarz"); // using mysqli_query instead
?>
<!DOCTYPE html>
<html>
<head>	
	<title>PRZYCHODNIA</title>
	<link rel="stylesheet" href="styl.css">
</head>

<body>
	<h1> PRZYCHODNIA </h1>
<a href="add.html">Dodaj lekarza</a><br/><br/>
<a href="addp.html">Dodaj pacjenta</a><br/><br/>


	<table width='80%' border=0>
	<th colspan=4>LEKARZE<th>
	<tr class="header">
		<td>Imie</td>
		<td>Nazwisko</td>
		<td>Telefon</td>
		<td>Modyfikacja danych</td>
	</tr>
	<?php 
	//while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
	while($res = mysqli_fetch_array($result)) { 		
		echo "<tr>";
		
		

		echo "<td>".$res['Imie']."</td>";
		echo "<td>".$res['Nazwisko']."</td>";
		echo "<td>".$res['Telefon']."</td>";	
		echo "<td><a href=\"edit.php?id=$res[id_Lekarz]\">Edytuj</a> | <a href=\"delete.php?id=$res[id_Lekarz]\" onClick=\"return confirm('Czy jesteś pewny, że chcesz usunąć dane lekarza?')\">Skasuj</a>   
		
		
		
		</td>";		
	}
	?>
	<a href="indexp.php">Pacjenci</a><br/><br/>
	<a href="wizyta.php">Zobacz wolne terminy</a>
	</table>
</body>
</html>
