<?php $pagetitle = 'Nieuw Project'; ?>
<?php include 'Include/header.php'; ?>


<form method="POST" >
	<strong> Titel:</strong><br>
		<input type="text" name="titel" value="">
		<br><br>
	<strong> Naam Opdrachtgever:</strong><br>
		<input type="text" name="opdrachtgever" value="">
		<br>
	<strong> Bedrijf:</strong><br>
		<input type="text" name="bedrijf" value="">
		<br>
	<strong> Telefoon:</strong><br>
		<input type="text" name="telefoon" value="">
		<br>
	<strong> Email:</strong><br>
		<input type="text" name="email" value="">
		<br>
	<strong> Adres:</strong><br>
		<input type="text" name="adres" value="">
		<br>
	<strong> Plaats:</strong><br>
		<input type="text" name="plaats" value="">
		<br>
	<strong> PC:</strong><br>
		<input type="text" name="pc" value="">
		<br>
		<strong><p>Omschrijving:</p></strong>
		<textarea name="omschrijving" cols="50" rows="3" id="detail"></textarea>
		<br>
     <input type="submit" name="submit" value="Submit">
</form>

<?php
	if ( isset ($_POST['submit']))
	{
	$titel = mysql_real_escape_string($_POST['titel']);
	$opdrachtgever = mysql_real_escape_string($_POST['opdrachtgever']);
	$bedrijf = mysql_real_escape_string($_POST['bedrijf']);
	$telefoon = mysql_real_escape_string($_POST['telefoon']);
	$email = mysql_real_escape_string($_POST['email']);
	$adres = mysql_real_escape_string($_POST['adres']);
	$pc = mysql_real_escape_string($_POST['pc']);
	$plaats = mysql_real_escape_string($_POST['plaats']);
	$omschrijving = mysql_real_escape_string($_POST['omschrijving']);
	$error = false;

	if ( empty($titel) )
	{
	echo "<span style='color:red;'>Error: Add a title!</span><br>";
	$error = true;
	}

	if ( $error == false )
	{
	// create mysql connection or show error
	$link = mysql_connect('localhost', 'root', 'usbw');
	if (!$link) {
	die('<br>Could not connect: ' . mysql_error());
	}

		  // connect to database
		  mysql_select_db('ProjectCMS', $link);


		  $query = "INSERT INTO projects (titel, opdrachtgever, bedrijf, telefoon, email, adres, plaats, pc, omschrijving) VALUES ('$titel', '$opdrachtgever', '$bedrijf', '$telefoon', '$email', '$adres', '$plaats', '$pc', '$omschrijving')";
		  $result = mysql_query($query, $link);
		  if (!$result) {
			  die('<br>Invalid query: [' . $query . '] error: ' . mysql_error());
		  }

		  // close link
		  mysql_close($link);

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
 ?> 
