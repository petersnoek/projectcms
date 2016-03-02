<?php $pagetitle = 'Projecten'; ?>
<?php include 'tpl/header.tpl.html'; ?>

<?php

// connect to database or show error
include 'inc/cnx.php';

// voer de query uit of toon een foutbericht
$query = "SELECT * FROM projects ";
$result = mysqli_query($query, $link);
if (!$result) {
die('<br>Invalid query: ' . mysqli_error());
}
?>

<table>
	<tr>
		<td width="1%" align="center" bgcolor="#CCCCCC"><strong>#</strong></td>
		<td width="2%" align="center" bgcolor="#CCCCCC"><strong>Titel:</strong></td>
		<td width="2%" align="center" bgcolor="#CCCCCC"><strong>Opdrachtgever:</strong></td>
		<td width="10%" align="center" bgcolor="#CCCCCC"><strong>Omschrijving:</strong></td>
	</tr>
		 
<?php 
	// Start looping table row
	while($rows = mysqli_fetch_array($result)){
?>
	<tr>
		<td align="center"><?php echo $rows['id']; ?></td>
		<td align="center"><?php echo $rows['titel']; ?></td>
		<td align="center"><?php echo $rows['opdrachtgever']; ?></td>
		<td align="center"><?php echo $rows['omschrijving']; ?></td>
	</tr>
	
		 
		 
<?php
// Exit looping and close connection 
}
mysqli_close();
?>