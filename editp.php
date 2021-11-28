<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update']))
{	

	$id = mysqli_real_escape_string($mysqli, $_POST['id']);
	
	$imie = mysqli_real_escape_string($mysqli, $_POST['imie']);
	$nazwisko = mysqli_real_escape_string($mysqli, $_POST['nazwisko']);
	$telefon = mysqli_real_escape_string($mysqli, $_POST['telefon']);	
	
	// checking empty fields
	if(empty($imie) || empty($nazwisko) || empty($telefon)) {	
			
		if(empty($imie)) {
			echo "<font color='red'>imie field is empty.</font><br/>";
		}
		
		if(empty($nazwisko)) {
			echo "<font color='red'>nazwisko field is empty.</font><br/>";
		}
		
		if(empty($telefon)) {
			echo "<font color='red'>telefon field is empty.</font><br/>";
		}		
	} else {	
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE pacjent SET Imie='$imie',Nazwisko='$nazwisko',telefon='$telefon' WHERE id_Pacjent=$id");
		
		//redirectig to the display page. In our case, it is index.php
		header("Location: index.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM pacjent WHERE id_Pacjent=$id");

while($res = mysqli_fetch_array($result))
{
	$imie = $res['Imie'];
	$nazwisko = $res['Nazwisko'];
	$telefon = $res['Telefon'];
}
?>
<!DOCTYPE html>
<html>
<head>	
	<title>Edytuj</title>
	<link rel="stylesheet" href="styl.css">
</head>

<body>
	<a href="indexp.php">Pacjenci</a>
	<br/><br/>
	
	<form name="form1" method="post" action="editp.php">
		<table border="0">
			<tr> 
				<td>Imie</td>
				<td><input type="text" name="imie" value="<?php echo $imie;?>"></td>
			</tr>
			<tr> 
				<td>Nazwisko</td>
				<td><input type="text" name="nazwisko" value="<?php echo $nazwisko;?>"></td>
			</tr>
			<tr> 
				<td>Telefon</td>
				<td><input type="text" name="telefon" value="<?php echo $telefon;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Popraw"></td>
			</tr>
		</table>
	</form>
</body>
</html>
