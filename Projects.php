<?php 
require 'inc/cnx.php';
include 'inc/functions.php';

if(check($link)){
	$projects_array = get_projects_from_db($link);

	include("inc/class.TemplatePower.inc.php");
	$tpl = new TemplatePower("tpl/project.tpl.html");
	$tpl->assignInclude("header", "tpl/header.tpl.html");
	$tpl->assignInclude("footer", "tpl/footer.tpl.html");
	$tpl->prepare();
	$tpl->assign('pagetitle', 'Projecten');
	$tpl->assign('name', 'Naam');


	foreach($projects_array as $projects )
	{
		$tpl->newBlock( "projects_row" );
		$tpl->assign( "id", $projects['id'] );
		$tpl->assign( "titel", $projects['titel'] );
		$tpl->assign( "opdrachtgever", $projects['opdrachtgever'] );
		$tpl->assign( "omschrijving", $projects['omschrijving'] );
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