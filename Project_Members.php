<?php 
require 'inc/cnx.php';
include 'inc/functions.php';

if(check($link)){ 
	$project_members_array = get_project_members_from_db($link);

	include("inc/class.TemplatePower.inc.php");
	$tpl = new TemplatePower("tpl/project_members.tpl.html");
	$tpl->assignInclude("header", "tpl/header.tpl.html");
	$tpl->assignInclude("footer", "tpl/footer.tpl.html");
	$tpl->prepare();
	$tpl->assign('pagetitle', 'Project_Members');


	foreach($project_members_array as $project_members )
	{
		$tpl->newBlock( "project_members_row" );
		$tpl->assign( "id", $project_members['id'] );
		$tpl->assign( "project_id", $project_members['titel'] );
		$tpl->assign( "member_id", $project_members['username'] );
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