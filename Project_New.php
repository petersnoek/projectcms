<?php 
require 'inc/cnx.php';
include 'inc/functions.php';

if(check($link)){
	insert_project_into_db($link);

	include("inc/class.TemplatePower.inc.php");
	$tpl = new TemplatePower("tpl/project_new.tpl.html");
	$tpl->assignInclude("header", "tpl/header.tpl.html");
	$tpl->prepare();
	$tpl->assign('pagetitle', 'Nieuw Project');
	$tpl->newBlock( "logged_in" );
	$tpl->gotoBlock( "_ROOT" );
	$tpl->printToScreen();
}
else{
	// Redirecting To Other Page and displaying an error message
	header("location: login.php?error=U bent niet ingelogd"); 
}



 ?> 
