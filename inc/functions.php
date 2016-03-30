<?php
session_start();

function login($link) {
	$error = ""; //Variable for storing our errors.
	if(isset($_POST["submit"]))
	{
		if(empty($_POST["username"]) || empty($_POST["password"]))
		{
		$error = "Both fields are required.";
		echo $error;
		}
		else
		{
			// Define $username and $password
			$username= $_POST['username'];
			$password= $_POST['password'];
			 
			// To protect from MySQL injection
			$username = stripslashes($username);
			$password = stripslashes($password);
			$username = mysqli_real_escape_string($link, $username);
			$password = mysqli_real_escape_string($link, $password);
			$password = md5($password);
			 
			//Check username and password from database
			$sql="SELECT id,username FROM members WHERE username='$username' and password='$password'";
			$result=mysqli_query($link, $sql);
			$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
			 
			//If username and password exist in our database then create a session.
			//Otherwise echo error.
			 
			if(mysqli_num_rows($result) == 1)
			{
				$_SESSION['username'] = $row['username']; // Initializing Session
			}
			else
			{	
				$error = "Incorrect username or password.";
				Echo $error;
			}
		}
	}
}

function check($link) {
	
	if (isset($_SESSION['username'])) {
	
	$user_check=$_SESSION['username'];
	$query = "SELECT username FROM members WHERE username='".$user_check."'";
	if ($sql = mysqli_query($link, $query))
	{
	  // Return the number of rows in result set
		$rowcount=mysqli_num_rows($sql);
		if ($rowcount == 0) {
			return false;
		}
		else {
			return true;
		}
	}
	}
}

function callout($type, $message) {
	$callout = "<div class='".$type." callout' data-closable>
				<h5>".$message."</h5>
				<button class='close-button' aria-label='Dismiss alert' type='button' data-close>
				<span aria-hidden='true'>&times;</span>
				</button>
				</div>";
	return $callout;
}

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
			$stmt = mysqli_prepare($link, "INSERT INTO projects (titel, opdrachtgever, bedrijf, telefoon, email, adres, plaats, pc, omschrijving) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
			mysqli_stmt_bind_param($stmt, "sssssssss", $titel, $opdrachtgever, $bedrijf, $telefoon, $email, $adres, $plaats, $pc, $omschrijving);
			// decide what to do
			if ( mysqli_stmt_execute($stmt)){
				echo "<span style='color:green;'>Project aangemaakt.</span><br>";
			}
			else
			{
				echo "<span style='color:red;'>Whoops! Er is iets mis gegaan.</span><br>";
			}
			mysqli_stmt_close($stmt);
			
			
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
		$username = mysqli_real_escape_string($link, $_POST['username']);
		$wachtwoord = mysqli_real_escape_string($link, md5($_POST['wachtwoord']));
		$wachtwoord2 = mysqli_real_escape_string($link,  md5($_POST['wachtwoord2']));
		$opmerking = mysqli_real_escape_string($link, $_POST['opmerking']);
		$error = false;

		if ( empty($voornaam) )
		{
		echo "<span style='color:red;'>Voeg een voornaam toe!</span><br>";
		$error = true;
		}
		
		if ( empty($username) )
		{
		echo "<span style='color:red;'>Voeg een gebruikersnaam toe!</span><br>";
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
			$stmt = mysqli_prepare($link, "INSERT INTO members (voornaam, prefix, achternaam, username, telefoon, email, adres, postcode, plaats, password, opmerking) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
			
			mysqli_stmt_bind_param($stmt, "sssssssssss", $voornaam, $prefix, $achternaam, $username, $telefoon, $email, $adres, $postcode, $plaats, $wachtwoord, $opmerking);

			// decide what to do
			if ( mysqli_stmt_execute($stmt)){
				echo "<span style='color:green;'>Gebruiker aangemaakt.</span><br>";
			}
			else{
				echo "<span style='color:red;'>Whoops! Er is iets mis gegaan.</span><br>";
			}
			// close link
			
			mysqli_stmt_close($stmt);
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

function printr($data) {
   echo "<pre>";
      print_r($data);
   echo "</pre>";
}

