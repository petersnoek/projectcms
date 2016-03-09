<?php
require 'inc/cnx.php';
include 'inc/functions.php';
login($link);
if(isset($_GET['error'])){
	echo $_GET['error'];
}
include("inc/class.TemplatePower.inc.php");
$tpl = new TemplatePower("tpl/login.tpl.html");
$tpl->assignInclude("header", "tpl/header.tpl.html");
$tpl->prepare();
$tpl->assign('pagetitle', 'Login');
$tpl->printToScreen();

?>