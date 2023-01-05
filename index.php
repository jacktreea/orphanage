<?php
	/* Ya Aba Salehul Mahdi Adrikni */
	/* BUL BAL BUL */


	ob_start();
	session_start();
	include 'cfg/database.php';
	include 'functions.php';
	include 'db.php';

	ERROR_REPORTING(0);
	//ERROR_REPORTING(E_ALL);


	date_default_timezone_set('Africa/Dar_es_Salaam');
	include 'lib/PHPMailer/PHPMailerAutoload.php';

	$controllers = 'controllers/';
	$models = 'models/';
	$default_module = 'home';
	$default_action = 'index';
	$layout = 'layout.tpl.php';
	// $pagetitle = "PowerWeb's - Estate Management System";


	$module = $_GET['module'];
	$action = $_GET['action'];
	$action = str_replace ( '.html', '', $action );
	$format = $_GET['format'];

	$currentTime =  mktime(date("H"),   date("i"),   date("s"));
		$currentTime = date('H:i:s', $currentTime);
		define('NOW',$currentTime);
		define('TODAY', date('Y-m-d'));


	if ( empty($module) ) $module = $default_module;
	if ( empty($action) ) $action = $default_action;

	// validate login of user
	$member = $_SESSION['member'];
	if ( (empty($member)) and $module != 'authenticate' ) {
		$module = 'authenticate';
		$action = 'login';
	}

	/* Include all models */
	loadDir($models);

	//Instantiate the classes;
	include 'instantiate.php';



	$roleIds = $Roles->getAll();
		foreach ( $roleIds as $r ) {

			define(strtoupper('R_'.$r['name']),$r['id']);

		}



	$cs = $Settings->get(1);
	define(strtoupper('CS_COMPANY'),$cs['name']);
	define(strtoupper('CS_LOGO'),$cs['logo']);
	define(strtoupper('CS_ADDRESS'),$cs['address']);
	define(strtoupper('CS_STREET'),$cs['street']);
	define(strtoupper('CS_TEL'),$cs['tel']);
	define(strtoupper('CS_EMAIL'),$cs['email']);
	define(strtoupper('CS_ALERT'),$cs['alert']);
	define(strtoupper('CS_REDLIST'),$cs['redlist']);
	define(strtoupper('CS_EMAILPASS'),$cs['emailpass']);
	define(strtoupper('CS_EMAILHOST'),$cs['emailhost']);
	define(strtoupper('CS_EMAILPORT'),$cs['emailport']);
	define(strtoupper('CS_SMSUSER'),$cs['smsuser']);
	define(strtoupper('CS_SMSPASS'),$cs['smspass']);
	define(strtoupper('CS_SMSNAME'),$cs['smsname']);
	define(strtoupper('CS_AUTHENTICATE'),'true');
	define(strtoupper('CS_SMSSTAT'),$cs['smsstat']);
	define(strtoupper('CS_EMAILSTAT'),$cs['emailstat']);
	define(strtoupper('CS_STARTDATE'),$cs['startdate']);
	define(strtoupper('RMS_VERSION'),$cs['version']);
	define(strtoupper('CS_CCODE'),'255');

	//lic settings
	define(strtoupper('LIC_UNITS'),$tr['tennantid']);
	define(strtoupper('LIC_MONTHLY'),base64_decode($tr['amount']));
	$bal = 0;

	define(strtoupper('LIC_BALANCE'),$bal);
	// echo LIC_BALANCE;

	if (LIC_BALANCE < 0) {
		echo 'Balance Insufficient, please recharge';
		die();
	}

	// --------------------------------
	$user = $_SESSION['user'];
	if ( !empty($user) ) {
		// Define some global constants
		define('MEMBER_LOGGEDIN',true);
		define('USER_ID',$_SESSION['member']['id']);

	}
	else {
		define('USER_ID','');
	}
	if ( $format == 'json' ) $action = 'ajax_' . $action;

	$data['userProfile'] = $Users->get($_SESSION['member']['id']);

	if(empty($data['message'])) $data['message'] = $_SESSION['message'];
	if(empty($data['error'])) $data['error'] = $_SESSION['error'];

	if ( file_exists ( $controllers . $module . '.php' ) ) {
		include $controllers . $module . '.php';
	}

	$data['name']=$Users->get($_SESSION['member']['id']);
	$data['module'] = $module;
	$data['action'] = $action;

		//_______________________________________________
	if ($_SESSION['member']['roleid']==R_ADMIN) {
		$menus = $Menus->getAllMenus();

		foreach ($menus as $m) {
			$data['realmenus'][$m['mlabel']]['module'] = $m['mmod'];
			$data['realmenus'][$m['mlabel']]['action'] = $m['mact'];
			$data['realmenus'][$m['mlabel']]['icon'] = $m['micon'];
			$data['realmenus'][$m['mlabel']]['subs'][] = $m;
		}

	} else if ($_SESSION['member']) {
		$menus = $UserRights->getUserMenus($_SESSION['member']['id']);

		foreach ($menus as $m) {
			$data['realmenus'][$m['mlabel']]['module'] = $m['mmod'];
			$data['realmenus'][$m['mlabel']]['action'] = $m['mact'];
			$data['realmenus'][$m['mlabel']]['icon'] = $m['micon'];
			if ($m['slabel']) $data['realmenus'][$m['mlabel']]['subs'][] = $m;
		}

	}



	//get folder name
	if (strstr($_SERVER['PHP_SELF'], "/")) {
		$location = array();
		$location = explode("/", $_SERVER['PHP_SELF']);
		$folder = $location[count($location) - 2];
	}
	else {
		$folder = $_SERVER['PHP_SELF'];
	}



	$data['staffs']=$Users->getAllActive();

	$data['menu'] = loadTemplate('menu.tpl.php', $data);
	$data['control_panel'] = loadTemplate('control_panel.tpl.php', $data);


	$lab = $Submenus->find(array('module'=>$module,'action'=>$action));
	// print_r($lab);die();
	$pagetitle = $lab[0]['label'] . ' PowerWeb Orphanage Management System' ;

	if ( empty($data['pagetitle']) ) 	$data['pagetitle'] = $pagetitle;
	if ( empty($data['layout']) ) 	$data['layout'] = $layout;

	if ( $format == 'none' ) {
		$data['layout'] = 'layout_print_blank.tpl.php';

		global $templateData;
		$data['content'] .= '<script>window.print();</script>';
		$templateData['content'] = $data['content'];
	}

	define('APACHEPORT', $_SERVER['SERVER_PORT']);
	define('HOSTSERVER', 'localhost');
	define('HOSTFOLDER', $folder);

	//runInBackground('http://'.HOSTSERVER.':'.APACHEPORT.'/'.HOSTFOLDER.'/controllers/background/invoice.php');
	if ( $format == 'json' ) echo json_encode($data['content']);
	else echo loadTemplate($data['layout'], $data);

	if ( $_SESSION['message'] ) $_SESSION['message'] = '';
	if ( $_SESSION['error'] ) $_SESSION['error'] = '';

	//AL HAMDU LILLAH;;
	ob_end_flush();
