<?php
require 'inc/cnx.php';
include 'inc/functions.php';
login($link);

include("inc/class.TemplatePower.inc.php");
$tpl = new TemplatePower("tpl/login.tpl.html");
$tpl->assignInclude("header", "tpl/header.tpl.html");
$tpl->assignInclude("footer", "tpl/footer.tpl.html");
$tpl->prepare();
$tpl->assign('pagetitle', 'Login');
if(isset($_GET['error'])){
$tpl->assign('errormsg', callout("alert", $_GET['error']));
}
$tpl->printToScreen();

?>