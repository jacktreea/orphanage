<?php 
	
	/**
	 * summary
	 */
	class Class_subject extends model
	{
	    /**
	     * summary
	     */
		var $table = "class_subjects";




		function deleteClassSubject($class_id=""){

	        $sql = "update class_subjects set status = 'inactive' where class_id = $class_id";

	        return executeQuery($sql);
	    }

	}

 ?>