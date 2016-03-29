<?php 
require 'inc/cnx.php';
include 'inc/functions.php';

	include("inc/class.TemplatePower.inc.php");
	$tpl = new TemplatePower("tpl/index.tpl.html");
	$tpl->assignInclude("header", "tpl/header.tpl.html");
	$tpl->assignInclude("footer", "tpl/footer.tpl.html");
	$tpl->prepare();
	$tpl->assign('pagetitle', 'Welkom');
	$tpl->newBlock( "logged_out" );
	$tpl->gotoBlock( "_ROOT" );
	$tpl->printToScreen();


?> 