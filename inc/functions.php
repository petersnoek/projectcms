<?php
function insert_project_into_db($link) {
    if ( isset ($_POST['submit'])){
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
			  die('<br>Invalid query: [' . $query . '] error: ' . mysqli_error($link));
			}
			// close link
			mysqli_close($link);
			
			// decide what to do
			if ( $result == true ){
				echo "<span style='color:green;'>Project aangemaakt.</span><br>";
			}
			else
			{
				echo "<span style='color:red;'>Whoops! Er is iets mis gegaan.</span><br>";
			}
		}
	}
}

function insert_member_into_db($link) {
    if ( isset ($_POST['submit'])){
		$voornaam = mysqli_real_escape_string($link, $_POST['voornaam']);
		$prefix = mysqli_real_escape_string($link, $_POST['prefix']);
		$achternaam = mysqli_real_escape_string($link, $_POST['achternaam']);
		$telefoon = mysqli_real_escape_string($link, $_POST['telefoon']);
		$email = mysqli_real_escape_string($link, $_POST['email']);
		$adres = mysqli_real_escape_string($link, $_POST['adres']);
		$postcode = mysqli_real_escape_string($link, $_POST['postcode']);
		$plaats = mysqli_real_escape_string($link, $_POST['plaats']);
		$wachtwoord = mysqli_real_escape_string($link, $_POST['wachtwoord']);
		$wachtwoord2 = mysqli_real_escape_string($link, $_POST['wachtwoord2']);
		$opmerking = mysqli_real_escape_string($link, $_POST['opmerking']);
		$error = false;

		if ( empty($voornaam) )
		{
		echo "<span style='color:red;'>Voeg een voornaam toe!</span><br>";
		$error = true;
		}

		if ( empty($wachtwoord) )
		{
		  echo "<span style='color:red;'>Vul een wachtwoord in!</span><br>";
		  $error = true;
		}
		if ( empty($wachtwoord2) )
		{
		  echo "<span style='color:red;'>Herhaal je wachtwoord!</span><br>";
		  $error = true;
		}
		if ( $wachtwoord != $wachtwoord2 )
		{
		  echo "<span style='color:red;'>Wachtwoorden zijn niet gelijk!</span><br>";
		  $error = true;
		}
		
		if ( $error == false )
		{
		$query = "INSERT INTO members (voornaam, prefix, achternaam, telefoon, email, adres, postcode, plaats, wachtwoord, opmerking) VALUES ('$voornaam', '$prefix', '$achternaam', '$telefoon', '$email', '$adres', '$postcode', '$plaats', '$wachtwoord', '$opmerking')";
		$result = mysqli_query($link, $query);
			if (!$result) {
			  die('<br>Invalid query: [' . $query . '] error: ' . mysqli_error($link));
			}
			// close link
			mysqli_close($link);
			
			// decide what to do
			if ( $result == true ){
				echo "<span style='color:green;'>Gebruiker aangemaakt.</span><br>";
			}
			else{
				echo "<span style='color:red;'>Whoops! Er is iets mis gegaan.</span><br>";
			}
		}
	}
}


function get_member_from_db($link) {
    // voer de query uit of toon een foutbericht
    $query = "SELECT * FROM members";
    $result = mysqli_query($link, $query);
    if (!$result) {
        die('<br>Invalid query: ' . mysqli_error($link));
    }
	
    // Start looping table row
    while ($rows = mysqli_fetch_array($result)) {
		$members_array[] = $rows;
	// Exit looping and close connection 
    }
    mysqli_close($link);
	return $members_array;
}

function printr($data) {
   echo "<pre>";
      print_r($data);
   echo "</pre>";
}

function get_projects_from_db($link) {
    // voer de query uit of toon een foutbericht
    $query = "SELECT * FROM projects";
    $result = mysqli_query($link, $query);
    if (!$result) {
        die('<br>Invalid query: ' . mysqli_error($link));
    }
	
    // Start looping table row
    while ($rows = mysqli_fetch_array($result)) {
		$projects_array[] = $rows;
	// Exit looping and close connection 
    }
    mysqli_close($link);
	return $projects_array;
}

