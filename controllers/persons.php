<?

if ( $action == 'index' ) {
	
	$cData['status']='active';
	if ($_GET['name']) $tData['name']=$_GET['name'];
	$tData['check'] = $Persons->searchResults($tData['name']);
	
	$data['content'] = loadTemplate('persons.tpl.php',$tData);
}


if ( $action == 'person_delete' ) {
	
	$Id = $_GET['id'];
	$pData['status']='inactive';

	$Persons->update($Id,$pData);
	
	$_SESSION['message'] = 'Person deleted';
	redirect('persons','index');
}




if ( $action == 'person_edit' ) {
	
	$id = $_GET['id'];
	$tData['person'] = $Persons->get($id);

	
	$tData['edit'] = 1;
	
	
	$action = 'person_add';
}

if ( $action == 'person_add') {
	
	
	$data['content'] = loadTemplate('persons_edit.tpl.php',$tData);
}

if ( $action == 'person_save' ) {
	
	$id = intval($_POST['id']);
	$person = $_POST['person'];
	if ( empty($id) )  {
		
		$person['createdby']=$_SESSION['member']['id'];
		$person['status']='active';

		$Persons->insert($person);
		
		
		$_SESSION['message'] = 'Person Added';
		redirect('persons','index');
		}
		else
		{
		$person['modifiedby']=$_SESSION['member']['id'];
		$Persons->update($id,$person);
		
		
		
		$_SESSION['message'] = 'Person Updated';
		redirect('persons','person_edit','id='.$id.'');
		
	}
}

if ( $action == 'inactive' ) {
	
	$pData['status']='inactive';
	$tData['check'] = $Persons->find($pData);
	$tData['inactive']='true';
	
	$data['content'] = loadTemplate('persons.tpl.php',$tData);
}

if ( $action == 'person_undelete' ) {
	
	$Id = $_GET['id'];
	$pData['status']='active';

	$Persons->update($Id,$pData);
	
	$_SESSION['message'] = 'Person restored';
	redirect('persons','index');
}


