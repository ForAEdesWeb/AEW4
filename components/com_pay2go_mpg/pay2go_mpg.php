<?php
JTable::addIncludePath( JPATH_ADMINISTRATOR.DS.'components'.DS.'com_j2store'.DS.'tables' );
$order = JTable::getInstance('Orders', 'Table');
paymentresult($order);
function paymentresult($order_sataus){
	$ncp=& JPluginHelper::getPlugin('j2store', 'payment_Pay2go_MPG');
	$para=json_decode($ncp->params);
	$MerchantID=$para->MerchantID;
	$hashkey=$para->hashkey;
    $hashiv=$para->hashiv;
    $ExpireDate= date("Ymd",strtotime('+'.(int)$para->ExpireDate.'day'));
	$result=$_POST;
    $MerchantOrderNo=$result['MerchantOrderNo'];
    $order_sataus->load($MerchantOrderNo);
	if($result['Status'] == 'SUCCESS'){// 1. 檢查交易狀態
		echo "success";
		if((int)$order_sataus->order_total == $result['Amt']){// 2. 檢查交易金額
              
			$check = array( //3. 檢查 checkCode
				"MerchantID" => $result['MerchantID'],
				"Amt" => $result['Amt'],
				"MerchantOrderNo" => $result['MerchantOrderNo'],
				"TradeNo" => $result['TradeNo']  
			);              
			ksort($check);
			$check_str = http_build_query($check);
			$checkCode = 'HashIV=' . $hashiv . '&' . $check_str . '&HashKey=' . $hashkey;
			echo "checkcode=".$checkCode;
			$checkCode = strtoupper(hash("sha256", $checkCode));    

			
			if($checkCode == $result['CheckCode']){// 如果驗證通過
				$order_sataus->order_state = 'Confirmed';
				$order_sataus->order_state_id = '1';				
					if ($result['PaymentType']=="CREDIT"):
						$order_sataus->transaction_details="授權時間:".$result['PayTime']."　付款方式:信用卡(卡號末4碼:".$result['Card4No']."授權碼:".$result['Auth'].")";
					endif;
					if ($result['PaymentType']=="WEBATM"):
						$order_sataus->transaction_details="付款時間:".$result['PayTime']."　付款方式:WEBATM(匯款銀行:".$result['PayBankCode']." 末五碼為:".$result['PayerAccount5Code'].")";
					endif;
					if ($result['PaymentType']=="VACC"):
						$order_sataus->transaction_details="付款時間:".$result['PayTime']."　付款方式:ATM轉帳(匯款銀行:".$result['PayBankCode']." 末五碼為:".$result['PayerAccount5Code'].")";
					endif;
					if ($result['PaymentType']=="CVS"):
						$order_sataus->transaction_details="付款時間:".$result['PayTime']."　付款方式:超商代碼繳費";
					endif;
					if ($result['PaymentType']=="BARCODE"):
						$order_sataus->transaction_details="付款時間:".$result['PayTime']."　付款方式:超商條碼繳費";
					endif;
			} 
			else{
				echo 'check error!';
				}
		}   
	}
	if($result['Status'] != 'SUCCESS' and $result['PaymentType']=="CREDIT"){
		$order_sataus->transaction_details="交易時間:".$result['PayTime']."　付款方式:信用卡"."---授權失敗---";						
		$order_sataus->order_state = 'Failed';
		$order_sataus->order_state_id = '3';	
	}
	$order_sataus->save();
	echo 'OK!!';	
}

?>
