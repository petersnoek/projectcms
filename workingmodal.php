<?php 
require 'inc/cnx.php';

?>

  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>


<div class="container">
  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Deelnemer toevoegen</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h2 class="modal-title">Selecteer een deelnemer:</h2>
        </div>
        <div class="modal-body">
          <p>    
			<select name="username">
				<?php
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
					
				?>
			</select> 
		 </p>
        </div>
        <div class="modal-footer">
          <input type="submit" name="pageaction" value="Select" class="btn btn-default" />
        </div>
      </div>
      
    </div>
  </div>
  
</div>

