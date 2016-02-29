<?php $pagetitle = 'Nieuw Project'; ?>
<?php include 'inc/header.tpl'; ?>


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
	$titel = mysqli_real_escape_string($_POST['titel']);
	$opdrachtgever = mysqli_real_escape_string($_POST['opdrachtgever']);
	$bedrijf = mysqli_real_escape_string($_POST['bedrijf']);
	$telefoon = mysqli_real_escape_string($_POST['telefoon']);
	$email = mysqli_real_escape_string($_POST['email']);
	$adres = mysqli_real_escape_string($_POST['adres']);
	$pc = mysqli_real_escape_string($_POST['pc']);
	$plaats = mysqli_real_escape_string($_POST['plaats']);
	$omschrijving = mysqli_real_escape_string($_POST['omschrijving']);
	$error = false;

	if ( empty($titel) )
	{
	echo "<span style='color:red;'>Error: Add a title!</span><br>";
	$error = true;
	}

	if ( $error == false )
	{
	// create mysql connection or show error
	$link = mysqli_connect('localhost', 'cms', 'Studentje1');
	if (!$link) {
	die('<br>Could not connect: ' . mysqli_error());
	}

		  // connect to database
		  mysqli_select_db('ProjectCMS', $link);


		  $query = "INSERT INTO projects (titel, opdrachtgever, bedrijf, telefoon, email, adres, plaats, pc, omschrijving) VALUES ('$titel', '$opdrachtgever', '$bedrijf', '$telefoon', '$email', '$adres', '$plaats', '$pc', '$omschrijving')";
		  $result = mysqli_query($query, $link);
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
 ?> 
