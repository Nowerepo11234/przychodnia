<!DOCTYPE html>
<html>
<head>
	<title>Add Data</title>
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
			echo "<font color='red'>Brak imienia lekarza</font><br/>";
		}
		
		if(empty($nazwisko)) {
			echo "<font color='red'>Brak nazwiska lekarza</font><br/>";
		}
		
		if(empty($telefon)) {
			echo "<font color='red'>Brak telefonu lekarza</font><br/>";
		}
		
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Powróć</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		$result = mysqli_query($mysqli, "INSERT INTO lekarz  VALUES('$imie','$nazwisko','$telefon')");
        
        
        
		
		//display success message
		echo "<font color='green'>Lekarz został dodany.";
		echo "<br/><a href='index.php'>Lekarze</a>";
	}
}
?>
</body>
</html>
