<?php $pagetitle = 'Deelnemers'; ?>
<?php include 'Include/header.php'; ?>

<?php
// create mysql connection or show error
 $link = mysql_connect('localhost', 'root', 'usbw');
if (!$link) {
die('<br>Could not connect: ' . mysql_error());
}

// connect to database
mysql_select_db('projectcms', $link);

// voer de query uit of toon een foutbericht
$query = "SELECT * FROM members ";
$result = mysql_query($query, $link);
if (!$result) {
die('<br>Invalid query: ' . mysql_error());
}
?>

<table>
	<tr>
		<td width="1%" align="center" bgcolor="#CCCCCC"><strong>#</strong></td>
		<td width="2%" align="center" bgcolor="#CCCCCC"><strong>Voornaam:</strong></td>
		<td width="1%" align="center" bgcolor="#CCCCCC"><strong>Prefix:</strong></td>
		<td width="2%" align="center" bgcolor="#CCCCCC"><strong>Achternaam:</strong></td>
		<td width="10%" align="center" bgcolor="#CCCCCC"><strong>Opmerking:</strong></td>
	</tr>
	
<?php 
	// Start looping table row
	while($rows = mysql_fetch_array($result)){
?>
	<tr>
		<td align="center"><?php echo $rows['id']; ?></td>
		<td align="center"><?php echo $rows['voornaam']; ?></td>
		<td align="center"><?php echo $rows['prefix']; ?></td>
		<td align="center"><?php echo $rows['achternaam']; ?></td>
		<td align="center"><?php echo $rows['opmerking']; ?></td>
	</tr>
	
<?php
// Exit looping and close connection 
}
mysql_close();
?>
