<?php $pagetitle = 'Nieuwe Deelnemer'; ?>
<?php include 'Include/header.php'; ?>


<form method="POST" >
	<strong> Voornaam:</strong><br>
		<input type="text" name="voornaam" value="">
		<br>
	<strong> Prefix:</strong><br>
		<input type="text" name="prefix" value="">
		<br>
	<strong> Achternaam:</strong><br>
		<input type="text" name="achternaam" value="">
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
	<strong> Postcode:</strong><br>
		<input type="text" name="postcode" value="">
		<br>
	<strong> Plaats:</strong><br>
		<input type="text" name="plaats" value="">
		<br>
		<strong><p>Opmerking:</p></strong>
		<textarea name="opmerking" cols="50" rows="3" id="detail"></textarea>
		<br>
     <input type="submit" name="submit" value="Submit">
</form>

<?php
	if ( isset ($_POST['submit']))
	{
	$voornaam = mysql_real_escape_string($_POST['voornaam']);
	$prefix = mysql_real_escape_string($_POST['prefix']);
	$achternaam = mysql_real_escape_string($_POST['achternaam']);
	$telefoon = mysql_real_escape_string($_POST['telefoon']);
	$email = mysql_real_escape_string($_POST['email']);
	$adres = mysql_real_escape_string($_POST['adres']);
	$postcode = mysql_real_escape_string($_POST['postcode']);
	$plaats = mysql_real_escape_string($_POST['plaats']);
	$opmerking = mysql_real_escape_string($_POST['opmerking']);
	$error = false;

	if ( empty($voornaam) )
	{
	echo "<span style='color:red;'>Error: Voeg een voornaam toe!!</span><br>";
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


		  $query = "INSERT INTO members (voornaam, prefix, achternaam, telefoon, email, adres, postcode, plaats, opmerking) VALUES ('$voornaam', '$prefix', '$achternaam', '$telefoon', '$email', '$adres', '$postcode', '$plaats', '$opmerking')";
		  $result = mysql_query($query, $link);
		  if (!$result) {
			  die('<br>Invalid query: [' . $query . '] error: ' . mysql_error());
		  }

		  // close link
		  mysql_close($link);

		  // decide what to do
		  if ( $result == true )
		  {
			echo "<span style='color:green;'>Gebruiker aangemaakt.</span><br>";
		  }
		  else
		  {
			echo "<span style='color:red;'>Whoops! Er is iets mis gegaan.</span><br>";
		  }
		}
	  }
 ?> 