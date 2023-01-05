<?php
	
	$data['layout'] = 'layout_login.tpl.php';
	
	if ( $action == 'login' ) {	
		//print_R($_SESSION);
		//die();
		$data['content'] = loadTemplate('layout_login.tpl.php',array('username'=>$_GET['username']));
	}
	
	if ( $action == 'dologin' ) {
		$d['username'] = cleanInput($_POST['username']);
		$d['password'] = cleanInput($_POST['password']);
		
		
		if ( empty($d['username']) or empty($d['password']) ) {
			$_SESSION['error'] = 'Please enter both Username and Password';
			$data['content'] = loadTemplate('layout_login.tpl.php', $d);
			redirect('authenticate','login');
			} else {
			
			
			$userInfo = $Users->find($d);
			
			if ( empty($userInfo) or $userInfo[0]['password'] != $d['password'] ) {
				$_SESSION['error'] = 'Invalid Username/Password';
				$data['content'] = loadTemplate('admin/login.tpl.php', $d);
				
				redirect('authenticate','login','username='.$d['username']);
			} 
			elseif($userInfo[0]['changepass']==1){
				$_SESSION['member'] = $userInfo[0];
				$_SESSION['message'] = 'Enter a new password';
				$data['content'] = loadTemplate('layout_changepassword.tpl.php');
				redirect('changepassword','index');
				
			}
			elseif($userInfo[0]['status'] == 'inactive') {  
				$_SESSION['error'] = 'You are not authorized to access this application';
				$data['content'] = loadTemplate('login.tpl.php', $d);
				redirect('authenticate','login','username='.$d['username']);
			}
			else {
				$_SESSION['member'] = $userInfo[0];
				$_SESSION['message'] = 'Successfully Logged In';
				if ($userInfo[0]['role']!='admin') redirect('home','index');
				else redirect('upload','index');
				
			}
		}
	}
	
	
	if ( $action == 'logout' ) {
		session_destroy();
		redirect('authenticate','login');
	}
?>