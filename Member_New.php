<?php 
require 'inc/cnx.php';
include 'inc/functions.php';

insert_member_into_db($link);

include("inc/class.TemplatePower.inc.php");
$tpl = new TemplatePower("tpl/member_new.tpl.html");
$tpl->assignInclude("header", "tpl/header.tpl.html");
$tpl->prepare();
$tpl->assign('pagetitle', 'Nieuwe Deelnemer');
$tpl->printToScreen();
 ?> 

