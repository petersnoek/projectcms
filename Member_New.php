<?php 
require 'inc/cnx.php';
include 'inc/functions.php';

if(check($link)){
	insert_member_into_db($link);

	include("inc/class.TemplatePower.inc.php");
	$tpl = new TemplatePower("tpl/member_new.tpl.html");
	$tpl->assignInclude("header", "tpl/header.tpl.html");
	$tpl->prepare();
	$tpl->assign('pagetitle', 'Nieuwe Deelnemer');
	$tpl->printToScreen();
}
else{
	// Redirecting To Other Page and displaying an error message
	header("location: login.php?error=U bent niet ingelogd"); 
}

?> 