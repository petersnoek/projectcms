<?php 
require 'inc/cnx.php';
include 'inc/functions.php';

/* ==================================================
*
*  FUNCTIONS
*
*  ==================================================
*/

// template should have a month_row block for every month row,
// template should have a month_cell block which will be repeated 24 times
// array should have 24 values.
// if you want to make 1 cell pink, then pass the number of that cell as $redindex (first cell = 0)
function AddMonthrowToTemplate($tpl, $array, $redindex = -1) {

    $tpl->newBlock('month_row');

    for ($i=0; $i<=23; $i++) {
        $tpl->newBlock('month_cell');

        if ( $i == $redindex )
            $tpl->assign('class', 'monthday red');
        else
            $tpl->assign('class', 'monthday');

        $tpl->assign('cell', $array[$i] );
    }
}

/* ==================================================
*
*  MAIN PROCEDURAL CODE
*
*  ==================================================
*/
if(check($link)){
	/*
	// oude zooi die weg kan nadat de voorbeeld code is geimplementeerd
	$which_day = which_day();
	*/
	$projects_array = get_projects_from_db($link);

	include("inc/class.TemplatePower.inc.php");
	$tpl = new TemplatePower("tpl/project.tpl.html");
	$tpl->assignInclude("header", "tpl/header.tpl.html");
	$tpl->assignInclude("footer", "tpl/footer.tpl.html");
	$tpl->prepare();
	$tpl->assign('pagetitle', 'Projecten');
	$tpl->assign('name', 'Naam');

	$i = 0;
	foreach($projects_array as $projects )
	{
		$tpl->newBlock( "projects_row" );
		$tpl->assign( "id", $projects['id'] );
		$tpl->assign( "titel", $projects['titel'] );
		$tpl->assign( "opdrachtgever", $projects['opdrachtgever'] );
		$tpl->assign( "omschrijving", $projects['omschrijving'] );
		$tpl->assign( "deelnemers", $projects['deelnemers'] );
		$tpl->assign( "open_modal", '
									<p><a data-open="myModal'.$i.'">Deelnemer toevoegen</a></p>' );
		$tpl->newBlock( "modal_row" );
		$tpl->assign( "modal", $i  );
		$i++;

		$days = CreateArrayWith24Dates();
		$today = new DateTime();
		$which_element_must_be_red = array_search($today->format('d/m'), $days );
		AddMonthrowToTemplate($tpl, $days, $which_element_must_be_red);
		
		/*
		// oude zooi die weg kan nadat de voorbeeld code is geimplementeerd
		for ($numweek = 0; $numweek <= 3; $numweek++) {
			$tpl->newBlock( "week_row" );
			for ($numday = 0; $numday <= 6; $numday++) {
				$tpl->newBlock( "day_row" );
				$tpl->assign( "date_N", return_day($numday));
				if($numday == 6){
					$tpl->assign( "end", "end" );
				}
				$tpl->gotoBlock( "_ROOT" );
			}
			$tpl->gotoBlock( "_ROOT" );
		} 
		$tpl->gotoBlock( "_ROOT" );
		*/
	}
	$tpl->newBlock( "logged_in" );
	$tpl->gotoBlock( "_ROOT" );
	
	if(isset($_GET['welcome'])){
	$tpl->assign('loginmsg', callout("success", $_GET['welcome']));
	}
	$tpl->printToScreen();
}
else{
	// Redirecting To Other Page and displaying an error message
	header("location: login.php?error=U bent niet ingelogd"); 
}

?>