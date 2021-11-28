<?php
//including the database connection file
include_once("config.php");

//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "SELECT l.id_Lekarz, w.Gabinet, w.Data_wizyty, w.Godzina, l.Imie, l.Nazwisko, l.Telefon FROM przychodnia.wizyta w INNER JOIN przychodnia.lekarz l ON l.id_Lekarz = w.id_Lekarz WHERE w.czyRezerwowana='0'"); // using mysqli_query instead
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
	<th colspan=7>WOLNE TERMINY NA ZAPISY DO LEKARZY<th>
	<tr class="header">
		<td>Gabinet</td>
		<td>Data_wizyty</td>
		<td>Godzina</td>
		<td>Imię</td>
		<td>Nazwisko</td>
		<td>Telefon</td>
		<td>Zapisz się na wizytę</td>
	</tr>
	<?php 
	//while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
	while($res = mysqli_fetch_array($result)) { 		
		echo "<tr>";
		
		

		echo "<td>".$res['Gabinet']."</td>";
		echo "<td>".$res['Data_wizyty']."</td>";
		echo "<td>".$res['Godzina']."</td>";
		echo "<td>".$res['Imie']."</td>";
		echo "<td>".$res['Nazwisko']."</td>";
		echo "<td>".$res['Telefon']."</td>";
		echo "<td><a href=\"addw.php?id=$res[id_Lekarz]\" onClick=\"return confirm('Czy jesteś pewny, że chcesz zapisać się na wizytę?')\">Zapisz się na termin</a></td>";		
	}
	?>
	<a href="indexp.php">Pacjenci</a><br/><br/>
	</table>
</body>
</html>
