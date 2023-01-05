<?

	if ( $action == 'index' ) {
		// echo ROLE_ADMIN;die();
		$cData['status']='active';
		if ($_GET['name']) $tData['name']=$_GET['name'];
		$tData['check'] = $Users->searchResults($tData['name']);
		$tData['roles'] = $Roles->getAll();

		$data['help'] ='The user will be the one to access the system and make changes. To create a new user Click <b>Add User</b> and give the name and details. Beside each existing user created in the list below, you will find: <br/><i class="fa fa-trash-o"></i> - To delete the user <br/><i class="fa fa-pencil"></i> - To edit a user and update the information. <br/><i class="fa fa-user"></i> - To edit the user rights and restrict what a user can see. <br/><i class="fa fa-home"></i> - To manage what properties the user can access <br/> You can search for existing users by writing in the search bar and pressing Enter';


		$data['content'] = loadTemplate('users.tpl.php',$tData);
	}

	if ( $action == 'inactive' ) {

		$uData['status']='inactive';
		$tData['check'] = $Users->find($uData);
		$tData['inactive']='true';

		$data['content'] = loadTemplate('users.tpl.php',$tData);
	}

	if ( $action == 'users_undelete' ) {

		$Id = $_GET['id'];
		$uData['status']='active';

		$Users->update($Id,$uData);

		$_SESSION['message'] = 'User activated';
		redirect('users','index');
	}

	if ( $action == 'users_delete' ) {

		$Id = $_GET['id'];
		$uData['status']='inactive';

		$Users->update($Id,$uData);

		$_SESSION['message'] = 'User deleted';
		redirect('users','index');
	}

	if ( $action == 'users_rights' ) {

		$data['help'] ='On this screen, the rights for non-admin users is managed. Whatever is checked will be what this user can access.';

		$userid = $_GET['id'];
		$tData['user'] = $Users->get($userid);

		$menus = $Menus->getAllMenus();

		foreach ($menus as $m) {
			$tData['menus'][$m['mlabel']]['mid'] = $m['mid'];
			$tData['menus'][$m['mlabel']]['subs'][] = $m;
		}

		$umenus = $UserRights->getUserMenus($userid);
		foreach ($umenus as $um) {
			$tData['umenus'][$um['mid']][$um['sid']] = 1;
		}

		$data['content'] = loadTemplate('userrights.tpl.php',$tData);
	}



	if ($action == 'user_rights_save') {

		$userid = $_POST['userid'];
		$rights = $_POST['ur'];
		$urData['userid'] = $userid;
		$UserRights->deleteWhere($urData);
		foreach ((array)$rights as $menuid=>$s) {
			foreach ($s as $sid) {
				$urData['menuid'] = $menuid;
				$urData['submenuid'] = $sid;
				$urData['createdby']=$_SESSION['member']['id'];
				$UserRights->insert($urData);
			}
		}

		$_SESSION['message'] = 'Rights Allocated';

		redirectBack();
	}


	if ( $action == 'users_edit' ) {

		$id = $_GET['id'];
		$tData['users'] = $Users->get($id);


		$tData['edit'] = 1;


		$action = 'users_add';
	}

	if ( $action == 'users_add') {

		$data['help'] ='There are two kinds of users; Admin and User. The admin has access to everything in the system. The user has limited rights based on what the admin assigns';


		$tData['roles'] = $Roles->getAll();
		$data['content'] = loadTemplate('users_edit.tpl.php',$tData);
	}

	if ( $action == 'users_save' ) {

		$id = intval($_POST['id']);
		$user = $_POST['users'];
		if ( empty($id) )  {

			$user['createdby']=$_SESSION['member']['id'];
			$user['password']='123';
			$user['status']='active';

			$Users->insert($user);
			$id = $Users->lastId();

			$_SESSION['message'] = 'User Added';
			redirect('users','index');
		}
		else
		{
			$user['modifiedby']=$_SESSION['member']['id'];
			$Users->update($id,$user);



			$_SESSION['message'] = 'User Updated';
			redirect('users','users_edit','id='.$id.'');

		}
	}


	if ($action=='users_proprights'){

		$data['help'] ='Each user can be mapped to 0,1 or more properties to manage. Only users who are mapped to a property can access that property information. Select the poperties for this user and click save';

		$id = $_GET['id'];
		$props = $Properties->getAll();
		$user = $UserProperties->find(array('userid'=>$id));


		foreach ($props as $cnt=>$p){
			$tData['properties'][$cnt]['id'] = $p['id'];
			$tData['properties'][$cnt]['name'] = $p['name'];

			foreach ($user as $u){
				if ($p['id'] == $u['propertyid']) $tData['properties'][$cnt]['allowed'] = 'yes';
			}
		}

		$tData['user'] = $Users->get($id);


		$data['content'] = loadTemplate('userprops.tpl.php',$tData);
	}

	if ($action =='user_props_save'){

		$userid = $_POST['userid'];
		$props = $_POST['allowedProps'];

		$UserProperties->deleteWhere(array('userid'=>$userid));

		$propData['userid'] = $userid;

		foreach ($props as $p){
			$propData['propertyid'] = $p['id'];
			$UserProperties->insert($propData);
		}
		$_SESSION['message'] = 'Rights Allocated';
		redirect('users','index');

	}


	if ($action == 'ajax_saveUser'){

		$pData['username']=$_GET['username'];
		$checkExist=$Users->find($pData);
		$obj = null;
		if ($checkExist) $obj->msg = 'exists';

		else {

			$pData['name']= $_GET['fullname'];
			$pData['roleid']= $_GET['role'];
			$pData['createdby']=$_SESSION['member']['id'];
			$pData['status']='active';
			$pData['changepass']=1;
			$Users->insert($pData);
			$id=$Users->lastid();
			$obj->msg = 'added';
			$obj->id = $id;
			$obj->username = $pData['username'];
			$obj->roleid = $pData['roleid'];

		}
		$response[] = $obj;
		$data['content'] = $response;

	}



	
