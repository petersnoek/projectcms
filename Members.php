<?php 
include 'inc/functions.php'; 
require 'inc/cnx.php';

$member_array = get_member_from_db($link);
	

include("inc/class.TemplatePower.inc.php");
$tpl = new TemplatePower("tpl/members.tpl.html");
$tpl->assignInclude("header" ,"tpl/header.tpl.html"); 
$tpl->prepare();
$tpl->assign('pagetitle', 'Deelnemers');

foreach($member_array as $member )
{
   $tpl->newBlock( "member_row" );
 $tpl->assign( "id", $member['id'] );
 $tpl->assign( "voornaam", $member['voornaam'] );
 $tpl->assign( "prefix", $member['prefix'] );
 $tpl->assign( "achternaam", $member['achternaam'] );
 $tpl->assign( "opmerking", $member['opmerking'] );   
}

$tpl->gotoBlock( "_ROOT" );

$tpl->printToScreen();
 ?>




