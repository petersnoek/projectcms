<?php
require 'inc/cnx.php';
include 'inc/functions.php';
		
		// lees de tabel, haal ook namen op voor de klus, de corveeer, en de controleur  
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

		
		// start een tabel met dikgedrukte kop
		echo '<table>'; 
?>
		
<colgroup>
	<col style="width: 5%">
	<col style="width: 20%">
	<col style="width: 20%">
</colgroup> 

<?php
		echo '<tr>
				<th>#</th>
				<th>Project</th>
				<th>Project deelnemers</th>
			</tr>';

		// print de rijen
		while($row = $result->fetch_assoc()){
			
			echo '<tr>';
			echo '<td>' . $row['id'] . '</td>';
			echo '<td>' . $row['titel'] . '</td>';
			echo '<td>' . $row['username'] . '</td>';
			echo '<td>' ;
			echo '</td>';
			echo '</tr>';	
		}		
		
		// sluit de tabel
		echo '</table>';
		
?>

<colgroup>
	<col style="width: 5%">
	<col style="width: 20%">
	<col style="width: 20%">
</colgroup> 

</div>

<table>

</table>

</body>

</html>