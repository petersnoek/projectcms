<?php
	
function insert_project_into_db($link) {
    if ( isset ($_POST['submit']))
	{
		$titel = mysqli_real_escape_string($link, $_POST['titel']);
		$opdrachtgever = mysqli_real_escape_string($link, $_POST['opdrachtgever']);
		$bedrijf = mysqli_real_escape_string($link, $_POST['bedrijf']);
		$telefoon = mysqli_real_escape_string($link, $_POST['telefoon']);
		$email = mysqli_real_escape_string($link, $_POST['email']);
		$adres = mysqli_real_escape_string($link, $_POST['adres']);
		$pc = mysqli_real_escape_string($link, $_POST['pc']);
		$plaats = mysqli_real_escape_string($link, $_POST['plaats']);
		$omschrijving = mysqli_real_escape_string($link, $_POST['omschrijving']);
		$error = false;

		if ( empty($titel) )
		{
		echo "<span style='color:red;'>Error: Add a title!</span><br>";
		$error = true;
		}

		if ( $error == false )
		{
			$query = "INSERT INTO projects (titel, opdrachtgever, bedrijf, telefoon, email, adres, plaats, pc, omschrijving) VALUES ('$titel', '$opdrachtgever', '$bedrijf', '$telefoon', '$email', '$adres', '$plaats', '$pc', '$omschrijving')";
			$result = mysqli_query($link, $query);
			if (!$result) {
			  die('<br>Invalid query: [' . $query . '] error: ' . mysqli_error());
			}
			// close link
			mysqli_close($link);
			// decide what to do
			if ( $result == true )
			{
			echo "<span style='color:green;'>Project aangemaakt.</span><br>";
			}
			else
			{
			echo "<span style='color:red;'>Whoops! Er is iets mis gegaan.</span><br>";
			}
		}
	}
}