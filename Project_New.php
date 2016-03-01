<?php 
require 'inc/cnx.php';
include 'inc/functions.php';

insert_project_into_db($link);

include("inc/class.TemplatePower.inc.php");
$tpl = new TemplatePower("tpl/project_new.tpl.html");
$tpl->assignInclude("header", "tpl/header.tpl.html");
$tpl->prepare();
$tpl->assign('pagetitle', 'Nieuw Project');
$tpl->printToScreen();
 ?> 
