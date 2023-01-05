<?php

if ( $action == 'save' ) {
	
	$id = $_POST['username'];
	$oldPassword = $_POST['oldpword'];
	$helpStat = $_POST['helpStat'];
	if ($helpStat!=1) $helpStat=0;
	$tData['password'] = $_POST['newpword'];
	$tData['help'] = $helpStat;
	
	$user = $Users->get($id);
	if ( $user['password'] != $oldPassword ) {
		$_SESSION['error'] = 'Old password Mismatch';
		redirect('password','index');
	}
	else {
		$Users->update($id,$tData);
		$_SESSION['message'] = 'Password changed successfully';
		redirect('password','index');
	}
	
}

if ( $action == 'index' ) {
	
	$tData['users'] = $Users->getAll();
	$tData['userDa'] = $Users->get($_SESSION['member']['id']);
	
	$data['content'] = loadTemplate('password.tpl.php', $tData);
}


if ( $action == 'profile_index' ) {
	
	$userid['userid']=$_SESSION['member']['id'];
	$supp = $Suppliers->find($userid);
	$tData['supplier'] = $supp[0];
	$data['content'] = loadTemplate('profile.tpl.php', $tData);
}

if ( $action == 'profile_save' ) {
	
	$id = $_SESSION['member']['id'];
	$supplier = $_POST['supplier'];
	
	$Suppliers->update($id,$supplier);
	$_SESSION['message'] = 'Profile information updated';
	redirect('password','profile_index');
	
}

?>