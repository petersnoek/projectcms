<?php
session_start();

function which_day() {	
	date_default_timezone_set('Europe/Amsterdam');
	$today = date ("N");

	echo $today;

	if ($today == 1)
	{
		echo "Vandaag is het maandag";
	}
	elseif ($today == 2)
	{
		echo "vandaag is dinsdag";
	}
	elseif ($today == 3)
	{
		echo "vandaag is woensdag";
	}
	elseif ($today == 4)
	{
		echo "vandaag is donderdag";
	}
	elseif ($today == 5)
	{
		echo "vandaag is vrijdag";
	}
	elseif ($today == 6)
	{
		echo "vandaag is zaterdag";
	}
	elseif ($today == 7)
	{
		echo "vandaag is zondag";
	}
	
	/* Oude functie met een afkorting dag als result
		$today = date ("D");
	echo $today;

	if (strpos($today, 'Mon') !== false)
	{
		echo "Vandaag is het maandag";
	}
	elseif (strpos($today, 'Tues') !== false)
	{
		echo "vandaag is dinsdag";
	}
	elseif (strpos($today, 'Wed') !== false)
	{
		echo "vandaag is woensdag";
	}
	elseif (strpos($today, 'Thurs') !== false)
	{
		echo "vandaag is donderdag";
	}
	elseif (strpos($today, 'Fri') !== false)
	{
		echo "vandaag is vrijdag";
	}
	elseif (strpos($today, 'Sat') !== false)
	{
		echo "vandaag is zaterdag";
	}
	elseif (strpos($today, 'Sun') !== false)
	{
		echo "vandaag is zondag";
	}
	*/
}

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
			
			/* create a prepared statement */
			if ($stmt = mysqli_prepare($link, "SELECT username FROM members WHERE username=? and password=?")) {

				/* bind parameters for markers */
				mysqli_stmt_bind_param($stmt, "ss", $username, $password);

				/* execute query */
				mysqli_stmt_execute($stmt);

				/* bind result variables */
				mysqli_stmt_bind_result($stmt, $username2);
				
				/*If username and password exist in our database then create a session.
				Otherwise echo error.*/
				
				if (mysqli_stmt_fetch($stmt)){
				$_SESSION['username'] = $username2; // Initializing Session
				}
				else
				{
					$error = "Incorrect username or password.";
					Echo $error;
				}

				echo $username2;

				/* close statement */
				mysqli_stmt_close($stmt);
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
			if (mysqli_stmt_execute($stmt)){
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

function get_project_members_from_db ($link) {
		$sql = "SELECT 
					project_members.id, 
					projects.titel, 
					members.username
				FROM 
					project_members
				LEFT OUTER JOIN 
					projects
				ON 
					project_members.project_id = projects.id
				LEFT OUTER JOIN 
					members
				ON 
					project_members.member_id = members.id
					";
		
		// voer de query uit
		$result = $link->query($sql);		
		
		// als er iets fout ging met de query, dan heeft $result de waarde false. Geef dan een foutmelding weer.
		if( $result == false ){
			die('There was an error running the query [' . $link->error . ']');
		}

		
    // Start looping table row
    while ($rows = mysqli_fetch_array($result)) {
		$project_members_array[] = $rows;
	// Exit looping and close connection 
    }
    mysqli_close($link);
	return $project_members_array;
}

function get_select ($link) {
$query = "SELECT username FROM members";
$result = mysqli_query($link, $query);
if (!$result) {
	die('<br>Invalid query: ' . mysqli_error($link));
}
					
// Start looping table row
while ($row = mysqli_fetch_array($result)) {	
echo '<option value="'.$row['username'].'">'.$row['username'].'</option>';

// Exit looping and close connection 
}
mysqli_close($link);
}