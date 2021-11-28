<!DOCTYPE html>
<html>
<head>
	<title>Dodaj pacjenta</title>
	<link rel="stylesheet" href="styl.css">
</head>

<body>
<?php
//including the database connection file
include_once("config.php");

if(isset($_POST['Submit'])) {	
	$imie = mysqli_real_escape_string($mysqli, $_POST['imie']);
	$nazwisko = mysqli_real_escape_string($mysqli, $_POST['nazwisko']);
	$telefon = mysqli_real_escape_string($mysqli, $_POST['telefon']);
		
	// checking empty fields
	if(empty($imie) || empty($nazwisko) || empty($telefon)) {
				
		if(empty($imie)) {
			echo "<font color='red'>Brak imienia pacjenta</font><br/>";
		}
		
		if(empty($nazwisko)) {
			echo "<font color='red'>Brak nazwiska pacjenta</font><br/>";
		}
		
		if(empty($telefon)) {
			echo "<font color='red'>Brak numeru telefonu</font><br/>";
		}
		
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Powróć</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		$result = mysqli_query($mysqli, "INSERT INTO pacjent(Imie,Nazwisko,Telefon) VALUES('$imie','$nazwisko','$telefon')");
		
		//display success message
		echo "<font color='green'>Dane pacjenta zostały dodane";
		echo "<br/><a href='indexp.php'>Pacjenci</a>";
	}
}
?>
</body>
</html>
