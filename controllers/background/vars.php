<?

//load all index requirements
include '../../cfg/database.php';
include '../../db.php';
include '../../functions.php';

date_default_timezone_set('Africa/Dar_es_Salaam');
include '../../lib/PHPMailer/PHPMailerAutoload.php';
	

	
	$models = '../../models/';	
	loadDir($models);
	include '../../instantiate.php';
	
	$currentTime =  mktime(date("H"),   date("i"),   date("s"));
	$currentTime = date('H:i:s', $currentTime);
	define('NOW',$currentTime);
	define('TODAY', date('Y-m-d'));
	$data['currencyRates'] = $Rates->getCP();
	$data['baseCurrency'] = $Currencies->find(array('base'=>1));
	define('BASE_CURRENCYID',$data['baseCurrency'][0]['id']);
	define('BASE_CURRENCY',$data['baseCurrency'][0]['name']);
	define('BASE_SYMBOL',$data['baseCurrency'][0]['symbol']);
		
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
	define(strtoupper('CS_CCODE'),'255');
		
		//lic settings
	$tr = $TennantRents->get(1);
	define(strtoupper('LIC_UNITS'),$tr['tennantid']);
	define(strtoupper('LIC_MONTHLY'),base64_decode($tr['amount']));
ignore_user_abort(true);
set_time_limit(0);


	
?>