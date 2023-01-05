<?
	
	ini_set('max_execution_time',60);
	//Check For An Update from Power Website
	$base = 'http://powerwebtz.com/rms_updater/'; 
	$_ENV['site']['files']['includes-dir'] = $_SERVER['DOCUMENT_ROOT'] .'/'. folderName();
	$_ENV['site']['files']['server-root'] =  $_SERVER['DOCUMENT_ROOT'] .'/'. folderName();
	
	if ($action == 'index'){
		
		$data['content'] = loadTemplate('update.tpl.php',$tData);
		
	}	
	
	
	if ( $action == 'ajax_checkUpdates' ) {
		
		$getVersions = file_get_contents($base.'current-release-versions.php') or $server = 'down';
		if ($getVersions != '')
		{
			$versionList = explode("\n", $getVersions);	
			foreach ($versionList as $aV)
			{	
				//remove white spaces
				$aV = preg_replace('/\s+/', '', $aV);
				if ( $aV > RMS_VERSION) {
					$updateVersion = $aV;
					$found = true;
					break;
				}
			}
		}
		
		$response = array();
		$obj=null;
		$obj->found=$found;
		$obj->server=$server;
		$obj->updateVersion=$updateVersion;
		$response[]=$obj;
		
		$data['content'] = $response;
	}
	
	
	if ($action == 'ajax_downloadUpdate'){
		
		//Download The File If We Do Not Have It Is Possible
		//But I am forcing download each time in case previous file was not downloaded correctly
		$aV = $_GET['version'];
		
		$newUpdate = file_get_contents($base.'RMS-UPDATE-PACKAGES/POWERRMS-'.$aV.'.zip');
		if ( !is_dir( $_ENV['site']['files']['includes-dir'].'/UPDATES/' ) ) mkdir ( $_ENV['site']['files']['includes-dir'].'/UPDATES/' );
		$dlHandler = fopen($_ENV['site']['files']['includes-dir'].'/UPDATES/POWERRMS-'.$aV.'.zip', 'w');
		if ( !fwrite($dlHandler, $newUpdate) ) { $tData['msg'] .= '<p>Could not save new update. Operation aborted.</p>'; exit(); }
		fclose($dlHandler);
		$downloaded = true;
		// } 
		// else $tData['msg'] .= '<p>Update already downloaded.</p>';	
		
		
		$response = array();
		$obj=null;
		$obj->downloaded=$downloaded;
		$obj->version=$aV;
		$response[]=$obj;
		
		$data['content'] = $response;
	}
	
	if ($action == 'ajax_installUpdate'){
		
		$aV = $_GET['version'];
		
			//Open The File And Do Stuff
			$zipHandle = zip_open($_ENV['site']['files']['includes-dir'].'/UPDATES/POWERRMS-'.$aV.'.zip');
			while ($aF = zip_read($zipHandle) ) 
			{
				$thisFileName = zip_entry_name($aF);
				$thisFileDir = dirname($thisFileName);
				
				//Continue if its not a file
				if ( substr($thisFileName,-1,1) == '/') continue;
				
				
				//Make the directory if we need to...
				if ( !is_dir ( $_ENV['site']['files']['server-root'].'/'.$thisFileDir ) )
				{
					mkdir ( $_ENV['site']['files']['server-root'].'/'.$thisFileDir );
					$msg .= '<li>Created Directory '.$thisFileDir.'</li>';
				}
				
				//Overwrite the file
				if ( !is_dir($_ENV['site']['files']['server-root'].'/'.$thisFileName) ) {
					$msg .= '<li>'.$thisFileName.'...........';
					$contents = zip_entry_read($aF, zip_entry_filesize($aF));
					$contents = str_replace("\r\n", "\n", $contents);
					$updateThis = '';
					
					//If we need to run commands, then do it.
					if ( $thisFileName == 'upgrade.php' )
					{
						$upgradeExec = fopen ('upgrade.php','w');
						fwrite($upgradeExec, $contents);
						fclose($upgradeExec);
						include ('upgrade.php');
						unlink('upgrade.php');
						$msg .=' EXECUTED</li>';
					}
					else
					{
						$updateThis = fopen($_ENV['site']['files']['server-root'].'/'.$thisFileName, 'w');
						fwrite($updateThis, $contents);
						fclose($updateThis);
						unset($contents);
						$msg .= ' UPDATED</li>';
					}
				}
			}
			$updated = TRUE;
		
		
		
		if ($updated == true)
		{
			
			$Settings->update(1,array('version'=>$aV));
			
		}
		
		
		$response = array();
		$obj=null;
		$obj->updated=$updated;
		$obj->version=$aV;
		$obj->msg=$msg;
		$response[]=$obj;
		
		$data['content'] = $response;
		
	}		