<?
	ERROR_REPORTING(0);
	//ERROR_REPORTING(E_ALL);
	include 'vars.php';

	// var_dump(json_decode($_GET['contracts']));
	// die();

	//First Generate Invoices
	//RUN DAILY AUTOMATICALLY BUT ONLY ONCE TO REDUCE LOAD
	//GENERATES ONLY FOR INVOICES PER invoiceraise DATE IN CONTRACTS
	//for charges with variable prices such as eletctricity, the invoice will be generated but incomplete. 
	//User has to enter units at the end of the month and activate that invoice.
	//Amount in inoivces is deprecated, using invoicedetails amts only
	//Generate two invoices. 
	//1. For rent - pending
	//2. For other - incomplete till units
	//Extra provision - For charges with different billing types, generate different invoices
		
	//monthly charge reduced from same table
	$thisMonthCharged = $InvoiceGeneratorLogs->find(array('month'=>date('Y-m-01')));
	if (!$thisMonthCharged){
		$genLicData['month'] = date('Y-m-01');
		$InvoiceGeneratorLogs->insert($genLicData);
		$trD = $TennantRentDetails->getAll();
					
		$deducted = false;			
		foreach ($trD as $trDe){
		if (base64_decode($trDe['balance']) >= LIC_MONTHLY){
					$balance = base64_decode($trDe['balance']) - LIC_MONTHLY;
					$TennantRentDetails->update($trDe['id'],array('balance'=>base64_encode($balance)));
					$deducted = true;
					break;
			}
		if (!$deducted) $TennantRentDetails->update(1,array('balance'=>base64_encode(-LIC_MONTHLY))); //force deduction if no balance to go less than 0 and block app
		}
	}
		
	
		
	//has query been run today
	$isRun = $InvoiceGeneratorLogs->find(array('date'=>TODAY));
		
	if (!$isRun){
		
		//mark as run before query runs to avoid duplicates in multi user situation
		
		$genData['date'] = TODAY;
		$InvoiceGeneratorLogs->insert($genData);
		
		//COLOR CODE 
		$outstanding = $Invoices->topOutstandingAge('',' t.id, invoicedate desc');	
		foreach ($outstanding as $o){
			
			if ($o['balance'] > 0 && $o['tenColor'] != C_BLACK) {
				$Tennants->update($o['tennantid'],array('colorid'=>$o['colorid']));
				
			}
			
		}
		// END COLOR CODE
		
	
		//GET all contracts still active
		$_resultant = $Contracts->getCurrent();

		$resultant = [];
		
		function cmp($a, $b) {
			return $a['billingtypeid'] - $b['billingtypeid'];
		}
		if (isset($_GET['contracts'])) {

			$obj = json_decode($_GET['contracts']);

			foreach ($_resultant as $_key => $_result) {
				
				foreach ($obj->contracts as $mkey => $_mvalue) {

					if ($_result['id'] == $_mvalue) {

						array_push($resultant , $_result);
					}
					
				}

			}

				
			}
			// else{

			// 	$resultant = $_resultant;

			// }	

			// var_dump($resultant);
			// die();

		foreach ($resultant as $r){
			//if billing is monthly 
			if ($r['billingtypeid']==B_ONEMONTH){
			//	restrict if invoice for main has already been generated. 
			$checkMonthly = $Invoices->getContractsWithin($r['id'],1);
			if (!$checkMonthly){
				//make invoice and main(rent) invoice detail
				$invData['tennantid'] =  $r['tennantid'];
				$invData['propdetid'] =  $r['propdetid'];
				$invData['contractid'] =  $r['id'];
				$invData['status'] =  'pending';  //paid,cancelled
				$invData['invoicedate'] = date('Y-m-'.$r['invoiceraise']); //invoiceraise date of this month
				$invData['createdby'] = $_SESSION['member']['id'];
				$Invoices->insert($invData);
				$invId = $Invoices->lastId();
				
				//invoice details
				$invDetData['invoiceid'] = $invId;			
				//main contract/rent
				$invDetData['chargeid'] = 0;
				$invDetData['amount'] = $r['charges'] * (1+($r['vat']/100));
				$invDetData['vat'] = $r['vat'];
				$invDetData['billingtypeid'] = 0; //rent
				$invDetData['currencyid'] = $r['currencyid'];
				
				$rateCur = $Rates->find(array('currencyid'=>$r['currencyid']));
				$invDetData['baserate'] = $rateCur[0]['rate'];
				$invDetData['basecharges'] = $invDetData['amount']/$invDetData['baserate'];
				
				$invDetData['chargedper'] = 'flat'; //this is different chargedper than the contract one. This will always be flat for main
			
				//if more than 0, enter details, else delete the main invoice
				
				if ($invDetData['amount'] >0) {

					$InvoiceDetails->insert($invDetData);

					//if ($r['withholding_tax_id'] == "2") {

						//$withholdingData = $Withholding_tax->find(array('id'=>$r['withholding_tax_id']));
						//invoice details
						//$invDetData['invoiceid'] = $invId;			
						//main contract/rent
						// $invDetData['chargeid'] = 0;
						// $invDetData['amount'] = ($r['charges'] * (1+($r['vat']/100))*(0.10));
						// $invDetData['vat'] = $r['vat'];
						// $invDetData['billingtypeid'] = 0; //rent
						// $invDetData['currencyid'] = $r['currencyid'];
						
						// $rateCur = $Rates->find(array('currencyid'=>$r['currencyid']));
						// $invDetData['baserate'] = $rateCur[0]['rate'];
						// $invDetData['basecharges'] = $invDetData['amount']/$invDetData['baserate'];
						
						// $invDetData['chargedper'] = 'flat';

						// $InvoiceDetails->insert($invDetData);

					//}



				}
				else{
					$Invoices->deleteWhere(array('id'=>$invId));
				}
			}
				//query contractdetails/expenses at the end for all contracts.
			}
			//use billtypeid and get month	
			else {
				
			
				$billData = $BillingTypes->get($r['billingtypeid']);
				
				//check if any invocies made within the 'month' period.
				$within = $billData['month'];
				$contractid = $r['id'];
				$check = $Invoices->getContractsWithin($contractid,$within);
					
				
				//if no invoices made
				if (!$check){
					//make invoice and main(rent) invoice detail
					$invData['tennantid'] =  $r['tennantid'];
					$invData['propdetid'] =  $r['propdetid'];
					$invData['contractid'] =  $r['id'];
					$invData['status'] =  'pending';  //paid,cancelled
					$invData['invoicedate'] = date('Y-m-'.$r['invoiceraise']); //first of this month
					$invData['createdby'] = $_SESSION['member']['id'];
					$Invoices->insert($invData);
					$invId = $Invoices->lastId();
					
					//invoice details
					$invDetData['invoiceid'] = $invId;
					//main contract /rent
					$invDetData['chargeid'] = 0;
					$invDetData['amount'] = $r['charges']*$billData['month']* (1+($r['vat']/100));
					$invDetData['vat'] = $r['vat'];
					$invDetData['billingtypeid'] = 0; //rent
					$invDetData['currencyid'] = $r['currencyid'];
					$invDetData['chargedper'] = 'flat'; //this is different chargedper than the contract one. This will always be flat for main
					
					
					$rateCur = $Rates->find(array('currencyid'=>$r['currencyid']));
					$invDetData['baserate'] = $rateCur[0]['rate'];
					$invDetData['basecharges'] = $invDetData['amount']/$invDetData['baserate'];
					
					if ($invDetData['amount'] > 0) {
						$InvoiceDetails->insert($invDetData);
						
					}
					else{
						$Invoices->deleteWhere(array('id'=>$invId));
					}
					
					
					//query contractdetails/expenses at the end for all contracts. if possible, update the invoice amount.
					
				}
				
				
			}	
			//CHECK CONTRACTDETAILS/expenses and make invoice/invoicedetails entry.
			
			$conResultant = $ContractDetails->getDetails($r['id']);
			usort($conResultant,"cmp");
			foreach ($conResultant as $cr){
				$bills = $BillingTypes->get($cr['billingtypeid']);
				
				//check if any invoices made within the 'month' period.
				$withinMonth = $bills['month'];
				if ($withinMonth<0) $withinMonth =0;
				//if billing is onetime, do nothing
				if ($cr['billingtypeid']!=B_ONCEONLY){
				
					
					$billcheck = $Invoices->getContractsDetWithin($r['id'],$withinMonth,$cr['chargeid']);
					
					
					if (!$billcheck){
					
						
						//make expenses invoicedetails. 
						
						//check if any invoices made today for this contractid (which are not invoice for rent)
						//if exists, use this invoice id else make new one for other charges
						
						$invoiceExist = $Invoices->getInvoiceToday($r['id']);
						
						

						

						// if ($invoiceExist){
						//July 19 2016, Variable charges with different billingtypes with those that are incomplete (units pending) shud be invoiced seperately
						//Get all invoices today and check if the billing type and currency matches the current one
						foreach ($invoiceExist as $e){
							if ($e['billingtypeid']	== $cr['billingtypeid'] && $e['currencyid']	== $cr['currencyid']) {
								$invoiceId = $e['id'];
								$invEx = 'true';	
							}
							else $invEx = 'false';
						}
						
						if ($invEx == 'true'){
							//do nothing
						}
						else{
							//make new invoice
							$invData['tennantid'] =  $r['tennantid'];
							$invData['propdetid'] =  $r['propdetid'];
							$invData['contractid'] =  $r['id'];
							$invData['status'] =  'pending';  //paid,cancelled
							$invData['invoicedate'] = date('Y-m-'.$r['invoiceraise']); //invoiceraise day of this month
							$invData['createdby'] = $_SESSION['member']['id'];
							$Invoices->insert($invData);
							$incomplete = '';
							
							$invoiceId = $Invoices->lastId();
						}
						
						$invoiceDetData['invoiceid'] = $invoiceId;
						$invoiceDetData['chargeid'] = $cr['chargeid'];
						$invoiceDetData['amount'] = $cr['amount'] * (1+($cr['vat']/100)) ;
						$invoiceDetData['vat'] = $cr['vat'] ;
						$invoiceDetData['billingtypeid'] = $cr['billingtypeid'];
						$invoiceDetData['currencyid'] = $cr['currencyid'];
						$invoiceDetData['chargedper'] = $cr['chargedper'];  // flat, unit. If flat do nothing. If unit, allow user to add units before final invoice
						if ($cr['chargedper']=='unit')	$incomplete = 'true';
				
				
						$rateCur = $Rates->find(array('currencyid'=>$cr['currencyid']));
						$invoiceDetData['baserate'] = $rateCur[0]['rate'];
						$invoiceDetData['basecharges'] = $invoiceDetData['amount']/$invoiceDetData['baserate'];
						
						$InvoiceDetails->insert($invoiceDetData);
						
						
					if ($incomplete=='true'){
						$Invoices->update($invoiceId,array('status'=>'incomplete'));
					}
				}
					
				}
				
			}	
			
		}
	
	//generation of invoices completed. Now Emails and SMS
	
	//this should run only once, immedatiely after above generate query which also runs once
	//get all invoices which are active and pending (not partial)
		
		$status = 'pending';
		$email = 'no';
		$sms = 'no';
		$invData = $Invoices->getAll('','','','','',$status);
		
		foreach ($invData as $i){
			
			if ($i['invoicedate'] <= TODAY){
			
				$invDetails = $InvoiceDetails->getAll($i['id']);
				$currs = $Currencies->getAllActive();
		
				
				if (CS_SMSSTAT == 'on' && $i['smsSent'] == 'no'){
					
					
					foreach ($invDetails as $iv){
						$cnt=0;
						foreach ($currs as $c){
							if ($c['id'] == $iv['currencyid']) {
								
								$currs[$cnt]['currTotal'] = $currs[$cnt]['currTotal'] +  $iv['chargeamt'];
							}
							$cnt=$cnt+1;
							
						}
					}
					
					$smCn = 0;
					foreach ($currs as $c){
					if ($c['currTotal']){
						if ($smCn) $comma = ', '; else $comma ='';
						$smCn++;
						$invTotal .= $comma. $c['symbol'] . $c['currTotal'];
					
						}
					}

					
					//send sms
					$to = CS_CCODE.$i['telephone'];
					$toname = $i['tennant'];
					$message = 'Dear ' . $toname . '. An invoice has been generated on '.fDate($i['invoicedate']).' for '.$i['subproperty'].', '. $i['property'];
					// $message .= '. Invoice total: '. $invTotal;
					$message .= ', to be paid in 7 days.';
					
					if (strlen($to) == 12) $smsSent = sendSms($message,$to);
					if ($smsSent) {
					
						$Invoices->update($i['id'],array('sms'=>'yes'));
							
						$smData['invoiceid'] = $i['id'];
						$smData['tennantid'] = $i['tennantid'];
						$smData['telephone'] = $i['telephone'];
						$smData['messageid'] = $smsSent;
						$SmsLogs->insert($smData);
					
					}
						
				}
				
				
				if (CS_EMAILSTAT == 'on' && $i['emailSent'] == 'no'){
					
					//send email
					$to = $i['email'];
					$toname = $i['tennant'];
					$subject = 'Invoice Due';
					$message = 'Dear ' . $toname . ',<br/>';
					$message .= 'An invoice has been generated on '.fDate($i['invoicedate']).' for '.$i['subproperty'].', '. $i['location'].' at ' .$i['property'] . ', '.$i['address'].'<br/>';
					
					

					$message .= '<table style="box-sizing: border-box; margin: 0 auto; overflow: hidden; padding: 20px; width: 100%;border-collapse: separate; border-spacing: 2px;font-size: 75%; table-layout: fixed; width: 100%;">
								<tr>
									<th style="text-align:left">Item</th>
									<th style="text-align:left;width:60%">Description</th>
									<th style="text-align:right">Price</th>
								</tr>';
					
					
					
					
					foreach ($invDetails as $iv){
						
						$price = $iv['currencysymbol'] .' ' .$iv['chargeamt'];
						if ($iv['name']) {
							$item = $iv['name']; 
							$desc = 'Charges';
							$rate = $iv['currencysymbol'] . ' ' . $iv['chargeamt'];
							$qty = '1';
							
						}else {
							$item = 'Rent';
							// $desc = $iv['subproperty'] . ', '. $iv['location']. ', '. $iv['property'] .', '. $iv['address'].'<br/> From '.fDate($iv['invoicedate']) . 'To '. fDate($iv['rentto']) .',  for a period of '.$iv['period'];
							$desc = $iv['subproperty'] . ', '. $iv['location'].'<br/> From '.fDate($iv['invoicedate']) . '<br/>To '. fDate($iv['rentto']) .'<br/>  For a period of '.$iv['period'];
							$rate = $iv['currencysymbol'] . ' ' . $iv['chargeamt']/$iv['month'];
							$qty = $iv['month'];
							
						}
					$message .= '<tr>
									<td>'.$item.'</td>
									<td>'.$desc.'</td>
									<td style="text-align:right">'.$price.'</td>
								</tr>';	
						
						
					}
					
					$message .= '</table><br/>';
					$message .= 'Kindly make payment at the earliest. You may quote invoice #'.$i['id'].'<br/> Warm regards,<br/>'.CS_COMPANY;
					
					
					
					$emailSent = tumaMail(CS_EMAILHOST, CS_EMAILPORT, CS_AUTHENTICATE, CS_EMAIL, CS_EMAILPASS, CS_COMPANY,$to,$toname,$subject,$message,$attachment);
					
					//once email sent, mark invoice as email contact done
					if ($emailSent == 'ok') {
						$Invoices->update($i['id'],array('email'=>'yes'));
						
						$emData['invoiceid'] = $i['id'];
						$emData['tennantid'] = $i['tennantid'];
						$emData['email'] = $i['email'];
						$EmailLogs->insert($emData);
						
					}
					
				}
				
			}
			
			
		}
		
		
	
		
	
	
		}


				if (isset($_GET['contracts'])) {

					$_obj = new \stdClass();


					if ($isRun) {
						
						$_obj->status = "failed";

						$_obj->message = "Today Invoice Has Already been Generated";
					
					}else{
						
						$_obj->status = "success";

						$_obj->message = "Invoice Successful Generated";

					}

					

					die(json_encode($_obj));


				}


	
?>