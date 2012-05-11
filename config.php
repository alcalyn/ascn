<?php
session_start();


// database
define('DB_host', 'localhost');
define('DB_port', '3306');
define('DB_name', 'games');
define('DB_user', 'root');
define('DB_pass', '');

// roots
define('DIR_ROOT', 'C:/wamp/www/ascn/');
define('WWW_ROOT', 'http://'.$_SERVER['HTTP_HOST'].'/ascn/www/');



// dirnames
define('DIRNAME_MODULES', 'modules');
define('DIRNAME_GAMES', 'games');

// dirs
define('DIR_MODEL', DIR_ROOT.'model/');
define('DIR_CTRL', DIR_ROOT.'controllers/');
define('DIR_WWW', DIR_ROOT.'www/');
define('DIR_TPL', DIR_ROOT.'tpl/');
define('DIR_GAMES', DIR_ROOT.'www/'.DIRNAME_GAMES.'/');
define('DIR_MODULES', DIR_ROOT.'www/'.DIRNAME_MODULES.'/');

define('WWW_CSS', WWW_ROOT.'css/');
define('WWW_JS', WWW_ROOT.'js/');
define('WWW_IMG', WWW_ROOT.'img/');
define('WWW_GAMES', WWW_ROOT.DIRNAME_GAMES.'/');
define('WWW_MODULES', WWW_ROOT.DIRNAME_MODULES.'/');



// chargement mod�les
require_once DIR_MODEL.'fx.php';
require_once DIR_MODEL.'DB.php';



// autoload model et controllers
function __autoload($class_name) {
	
	if(file_exists(DIR_MODEL.$class_name.'.php')) {
		require_once DIR_MODEL.$class_name.'.php';
	} else if(file_exists(DIR_CTRL.$class_name.'.php')) {
		require_once DIR_CTRL.$class_name.'.php';
	} else {
		throw new Exception('Classe '.$class_name.' non trouv�e');
	}
}

// fucking autoload :
require_once DIR_MODEL.'Joueur.php';
require_once DIR_MODEL.'Partie.php';
require_once DIR_MODEL.'Slot.php';
require_once DIR_MODEL.'Opt.php';
require_once DIR_MODEL.'Invite.php';
require_once DIR_MODEL.'Coords.php';




// Alias 
$env=new Env();
function env() {
	global $env;
	return $env;
}

function smarty()	{ return env()->smarty;	}
function page()		{ return env()->page;	}

function joueur()	{ return env()->joueur;	}
function partie()	{ return env()->partie;	}
function slot()		{ return env()->slot;	}

function module()	{ return env()->module;	}
function jeu()		{ return env()->jeu;	}


// site prefs
define('SITE_NAME', 'Asynchronous Games');

