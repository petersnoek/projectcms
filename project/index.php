<?php
// see: http://www.smarty.net/crash_course 

// put full path to Smarty.class.php
require('Smarty/Smarty.class.php');
$smarty = new Smarty();

// configure some folders for smarty
date_default_timezone_set('Europe/Amsterdam');
$smarty->setTemplateDir('tpl');
$smarty->setCompileDir('Smarty/templates_c');   // compiled templates. we don't use them yet.
$smarty->setCacheDir('Smarty/cache');           // cached templates. not necessary yet.
$smarty->setConfigDir('Smarty/configs');

// set data
$smarty->assign('name', 'Peter');

// show the template
$smarty->display('project.smarty.tpl');

// TODO: create smarty object

// TODO: assign some values

// TODO: display smarty template 'tpl/project.smarty.tpl'

