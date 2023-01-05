<?php	
	
	function loadExcelTemplate($filename, $tpl, $data) {
		include 'lib/excel/Worksheet.php';
		include 'lib/excel/Workbook.php';
		extract ( (array) $data );
		header("Content-type: application/vnd.ms-excel");
		header("Content-Disposition: attachment; filename=$filename".".xls");
		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
		header("Pragma: public");
		
		// Creating a workbook
		$workbook = new Workbook("-");
		
		$header =& $workbook->add_format();
		$header->set_size(10);
		$header->set_bold(true);
		$header->set_align('left');
		$header->set_color('white');
		$header->set_pattern();
		$header->set_fg_color('black');
		
		@include 'templates/excel/' . $tpl ;		
		
		$workbook->close();
		die();
	}
	
function uploadImage($target_dir = '', $patientFile)
{

	// var_dump($patientFile);
	// die();		
	$target_file = $target_dir . md5(uniqid(rand(), true)) . basename($patientFile["name"]);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));


	$check = getimagesize($patientFile["tmp_name"]);

	// if ($check !== false) {
		//echo "File is an image - " . $check["mime"] . ".";
		// $uploadOk = 1;
	// } else {
	// 	$uploadOk = 0;
	// 	$obj->uploadStatus = "uploadNotOk";
	// 	return $obj;
	// }
	// var_dump($check);
	// die();

	// Check if file already exists
	if (file_exists($target_file)) {

		$uploadOk = 0;
		$obj->uploadStatus = "fileAlreadyExist";
		return $obj;
	}

	// Check file size
	if ($_FILES["customerProfileImg"]["size"] > 300000) {

		$uploadOk = 0;
		$obj->uploadStatus = "fileTooLarge";
		return $obj;
	}

	// Allow certain file formats
	if (
		$imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" && $imageFileType != "pdf"
	) {

		$uploadOk = 0;
		$obj->uploadStatus = "fileNotSupported";
		return $obj;
	}

	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		$obj->uploadStatus = "failed";
		return $obj;
		// if everything is ok, try to upload file
	} else {
		if (move_uploaded_file($patientFile["tmp_name"], $target_file)) {
			// echo "The file ". htmlspecialchars( basename( $_FILES["customerProfileImg"]["name"])). " has been uploaded.";
			// A few settings
			$img_file = $target_file;
			// Read image path, convert to base64 encoding
			$imgData = base64_encode(file_get_contents($img_file));

			// Format the image SRC:  data:{mime};base64,{data};
			$src = 'data: ' . mime_content_type($img_file) . ';base64,' . $imgData;
			$obj->encodedFile = $src;
			$obj->imagePath = 	$target_file;
			$obj->uploadStatus = "success";
			return $obj;
		} else {
			$obj->uploadStatus = "error";
			return $obj;
		}
	}
}


	function loadTemplate($tpl, $data=array(), $filename="") {
		global $templateData;
		global $format;
		
		global $module;
		global $action;
		
		if ( $format == 'excel' and file_exists('views/excel/'.$tpl) ) {
			if ( empty($filename) ) $filename = 'excel_output';
			$filename .= '_' . date('dMy');
			loadExcelTemplate($filename,$tpl,$data);
			} else {
			
			if ( ! empty($data) ) {
				$data = array_merge((array)$data, (array)$templateData);
				$templateData = $data;
			}
			extract ( (array) $data );
			
			
			ob_start();
			@include 'views/' . $tpl ;
			
			// Remove when deploying on Client PC!
			if ( $format == 'excel' ) echo '<script>alert("Excel File Not Available for Download")</script>';
			
			$output = ob_get_contents();
			ob_end_clean();
			return $output;
		}
	}
	
	function cleanInput($str) {
		return trim($str);
	}
	
	function loadDir($dir) {
		global $config;
		if ( is_dir($dir) ) {
			$d = opendir($dir);
			while ($file = readdir($d)) {
				if ( substr($file,-4)=='.php' ) include $dir . $file;
			}
		}
	}
	
	function url($module, $action, $params="") {
		if ( is_array($params) ) {
			$str_params = '';
			foreach($params as $k=>$v) $str_params .= $k .'=' . urlencode($v) . '&';
			$params = $str_params;
			} else {
			if (!empty($params)) $params.='&';
		}
		return '?' . $params . 'module=' . $module . '&action=' . $action;
	}
	
	function base_url() {
		return '';
	}
	
	function getSession($key) {
		$keyParts = explode('.',$key);
		$output = '';
		foreach($keyParts as $keyPart) {
			if ( empty($output) )  $output = $_SESSION[$keyPart];
			else{
				if ( is_array($output) ) {
					$output = $output[$keyPart];
				}	
				if ( is_object($output) ) {
					$output = $output->$keyPart;
				}
			}
		}
		return $output;
	}
	
	function redirect($module, $action, $params="") {
		$url = url($module,$action,$params);
		header('Location: ' . $url);
		die();
	}
	function runInBackground($scriptName){
		
	    $options = array(
	        CURLOPT_RETURNTRANSFER => true,   // return web page
	        CURLOPT_HEADER         => false,  // don't return headers
	        CURLOPT_FOLLOWLOCATION => true,   // follow redirects
	        CURLOPT_MAXREDIRS      => 10,     // stop after 10 redirects
	        CURLOPT_ENCODING       => "",     // handle compressed
	        CURLOPT_USERAGENT      => "test", // name of client
	        CURLOPT_AUTOREFERER    => true,   // set referrer on redirect
	        CURLOPT_CONNECTTIMEOUT => 120,    // time-out on connect
	        CURLOPT_TIMEOUT        => 120,    // time-out on response
	    ); 

	    $ch = curl_init($scriptName);
	    curl_setopt_array($ch, $options);

	    $content  = curl_exec($ch);

	    curl_close($ch);

	    return $content;

}
	function redirectBack() {
		header('Location: ' . $_SERVER['HTTP_REFERER']);
		die();
	}
	
	function getAction() {
		global $action;
		return $action;
	}
	
	function formatN($no, $decimals=2) {
		return number_format($no, $decimals);
	}
	
	function getModule() {
		global $module;
		return $module;
	}
	
	function selected($a,$b,$val1='selected',$val2='') {
		return $a==$b?$val1:$val2;
	}
	
	function fDate($dt, $format='d F Y') {
		return date($format,strtotime($dt));
	}
	
	function resizeUploadImage($img,$refwidth=200,$refheight=0,$uploadloc,$format='jpg') {
		$size = getimagesize($img["tmp_name"]);
		
		if ($size) {
			$extension = strtolower(pathinfo($img['name'], PATHINFO_EXTENSION));
			
			$imgpath['name'] = strtolower($imgpath['name']);
			
			if($extension == "gif")	{ $imgconv = imagecreatefromgif($img["tmp_name"]);	}
			elseif($extension == "jpg" || $extension == "jpeg")	{ $imgconv = imagecreatefromjpeg($img["tmp_name"]);	}
			else if($extension=="png") { $imgconv = imagecreatefrompng($img["tmp_name"]); }
			
			list($imgwidth,$imgheight) = getimagesize($img["tmp_name"]); //current image dimensions
			
			$ctrl_imgwidth = $refwidth;
			
			if ($refheight == 0) { //new size
				$new_imgheight = ($imgheight/$imgwidth)*$ctrl_imgwidth;
				} else {
				$new_imgheight = $refheight;
			}
			
			$tmp_img = imagecreatetruecolor($ctrl_imgwidth,$new_imgheight);
			if ($format == 'png') { //transparency
				imagealphablending( $tmp_img, false );
				imagesavealpha( $tmp_img, true );
			}
			
			//Resize the image file
			imagecopyresampled($tmp_img,$imgconv,0,0,0,0,$ctrl_imgwidth,$new_imgheight,$imgwidth,$imgheight);
			
			//Upload the image
			$time = time();
			$imgname = $time.'-'.$img['name'];
			$uploadloc .= $imgname;
			if ($format == 'jpg') {
				imagejpeg($tmp_img,$uploadloc,100);
				} else if ($format == 'png') {
				imagepng($tmp_img,$uploadloc,9);
			}
			
			imagedestroy($imgconv);
			imagedestroy($tmp_img);	
			
			return $imgname;
		}
		
	}
	
	
	function tumaMail($host,$port,$authenticate,$username,$password,$sendername,$to,$toname,$subject,$message,$attachment){
		//Create a new PHPMailer instance
		$mail = new PHPMailer;
		
		//Tell PHPMailer to use SMTP
		$mail->isSMTP();
		
		//Enable SMTP debugging
		// 0 = off (for production use)
		// 1 = client messages
		// 2 = client and server messages
		$mail->SMTPDebug = 0;
		
		//Ask for HTML-friendly debug output
		$mail->Debugoutput = 'html';
		
		//Set the hostname of the mail server
		$mail->Host = $host;
		// use
		// $mail->Host = gethostbyname('smtp.gmail.com');
		// if your network does not support SMTP over IPv6
		
		//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
		$mail->Port = $port;
		
		//Set the encryption system to use - ssl (deprecated) or tls
		$mail->SMTPSecure = 'tls';
		
		//Whether to use SMTP authentication
		$mail->SMTPAuth = $authenticate;
		
		//Username to use for SMTP authentication - use full email address for gmail
		$mail->Username = $username;
		
		//Password to use for SMTP authentication
		$mail->Password = $password;
		
		//Set who the message is to be sent from
		$mail->setFrom($username, $sendername);
		
		//Set an alternative reply-to address
		// $mail->addReplyTo('replyto@example.com', 'First Last');
		
		//Set who the message is to be sent to
		$mail->addAddress($to, $toname);
		
		//Set the subject line
		$mail->Subject = $subject;
		
		//Read an HTML message body from an external file, convert referenced images to embedded,
		//convert HTML into a basic plain-text alternative body
		$mail->msgHTML($message, dirname(__FILE__));
		
		//Replace the plain text body with one created manually
		// $mail->AltBody = 'This is a plain-text message body';
		
		//Attach an image file
		// $mail->addAttachment('images/phpmailer_mini.png');
		if ($attachment) $mail->addAttachment($attachment);
		
		//send the message, check for errors
		if (!$mail->send()) {
			return "Mailer Error: " . $mail->ErrorInfo;
			} else {
			return "ok";
		}
		
	}
	
	
	
	function stripSpecial($string){
		
		$string = str_replace(",",'',$string);
		$string = str_replace("/",'',$string);
		$string = str_replace("(",'',$string);
		$string = str_replace(")",'',$string);
		$string = str_replace("'",'',$string);
		$string = str_replace('"','',$string);
		$string = str_replace('.','',$string);
		$string = str_replace('-','',$string);
		$string = str_replace(' ','',$string);
		$string = strtolower($string);
		
		return $string;
		
	}
	
	
	
	function sendSms($messageContent,$to){
		
		
		require_once 'lib/sms_api.php';
		
		$sender = CS_SMSNAME;
		$infobip = new Infobip_sms_api();
		$infobip->setUsername(CS_SMSUSER);
		$infobip->setPassword(CS_SMSPASS);
		
		// Send 1 SMS to 1 --------------------------------------------------------
		
		$infobip->setMethod(Infobip_sms_api::OUTPUT_XML); // With xml method
		$infobip->setMethod(Infobip_sms_api::OUTPUT_JSON); // OR With json method
		$infobip->setMethod(Infobip_sms_api::OUTPUT_PLAIN); // OR With plain method
		
		$message = new Infobip_sms_message();
		
		$message->setSender($sender); // Sender name
		$message->setText($messageContent); // Message
		$message->setRecipients($to);
		//$message->setRecipients('phone1', 'messageID'); // With custom message id
		
		$infobip->addMessages(array(
		$message
		));
		
		$results = $infobip->sendSMS();
		return $results[0]->messageid;
		
		// echo '<pre>';
		// print_r($results);
		// echo '</pre>';
		// die();
		
		
	}
	
	
	function getSmsBalance(){
		
		
		// Begin script
		require_once 'lib/sms_api.php';
		$infobip = new Infobip_sms_api();
		$infobip->setUsername(CS_SMSUSER);
		$infobip->setPassword(CS_SMSPASS);
		
		// Get balance -------------------------------------------------
		$balance = $infobip->getBalance();
		// echo '<pre>';
		// print_r($balance);
		// echo '</pre>';
		// echo $balance->value;
		// echo $balance->currency;
		// die();
		return $balance->value;
	}
	
	
	
	function is_connected($ipadd){
	
		$connected = @fsockopen($ipadd, 80); 
		//website, port  (try 80 or 443)
		if ($connected){
			$is_conn = true; //action when connected
			fclose($connected);
			}else{
			$is_conn = false; //action in connection failure
		}
		return $is_conn;
		
	}
	
	function folderName(){
		
		//get hms folder name
		if (strstr($_SERVER['PHP_SELF'], "/")) { 
			$location = array(); 
			$location = explode("/", $_SERVER['PHP_SELF']); 
			$folder = $location[count($location) - 2]; 
		} 
		else { 
			$folder = $_SERVER['PHP_SELF']; 
		}
		
		return $folder;
		
	}
	
	
?>