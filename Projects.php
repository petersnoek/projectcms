<?php $pagetitle = 'Projecten'; ?>
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
$query = "SELECT * FROM projects ";
$result = mysql_query($query, $link);
if (!$result) {
die('<br>Invalid query: ' . mysql_error());
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
	while($rows = mysql_fetch_array($result)){
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
mysql_close();
?>