<?php
	$data['layout'] = 'layout_changepassword.tpl.php';

	if ( $action == 'index' ) {	
		
		$data['content'] = loadTemplate('changepassword.tpl.php');
	}
	
	if ( $action == 'changeDefault' ) {
		
			$nData['password'] = $_POST['newpassword'];
			$nData['changepass'] = '0';
			$nData['modifiedby'] = $_SESSION['member']['id'];
			
			$Users->update($_SESSION['member']['id'],$nData);
			$_SESSION['message'] = "Password changed, please re-login";
			redirect('authenticate','login');
		
	}