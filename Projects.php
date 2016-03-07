<?php 
require 'inc/cnx.php';
include 'inc/functions.php';

$projects_array = get_projects_from_db($link);

include("inc/class.TemplatePower.inc.php");
$tpl = new TemplatePower("tpl/project.tpl.html");
$tpl->assignInclude("header", "tpl/header.tpl.html");
$tpl->prepare();
$tpl->assign('pagetitle', 'Projecten');


foreach($projects_array as $projects )
{
   $tpl->newBlock( "projects_row" );
 $tpl->assign( "id", $projects['id'] );
 $tpl->assign( "titel", $projects['titel'] );
 $tpl->assign( "opdrachtgever", $projects['opdrachtgever'] );
 $tpl->assign( "omschrijving", $projects['omschrijving'] );
}

$tpl->gotoBlock( "_ROOT" );
$tpl->printToScreen();
?>