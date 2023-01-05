<?php


	if ($action == "ajax_delete_phonenumber") {
		$id = $_GET['id'];

		$Phonenumber->update($id, array('status'=>'inactive', 'deleted_at'=>date('Y-m-d H:i:s'), 'deleted_by'=>$_SESSION['member']['id']));


		$obj = new \stdClass();
		$obj->message = "Deleted Successfull";
		$obj->status = "success";

		die(json_encode($obj));


	}