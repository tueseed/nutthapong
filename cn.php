<?php
//$access_token = 'tdzLYf9xfGIqTskPJrg1oK1BkchAQvgfuICDhheJJ65GvMxKIeL29rO5PLkYVbXLEiBFllEQC96ml4ZE69XM7TF40477TPfGBVmqmsGi67YNeaTv94J7kkPhlWl/rf1LO5ESck74M6zkhl057mCG0AdB04t89/1O/w1cDnyilFU=';
$access_token = '0RwNgVKTtKL8buW0dJpvxx5e5sRgKt1r9ntdO+YkiZHdlZb5f/F5PI2YQphJJo243Ji/Bh51fGVTuu1n/piK4+gDLxtf2mj+Xrq7okZBvsMgmr41tuMpa+vNP9QFet0wZgMYnfgxWOmkLbebV7VJXQdB04t89/1O/w1cDnyilFU=';
// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			// Get text sent
			$text = $event['message']['text'];
			$userid = $event['source']['userId'];
			// Get replyToken
			$replyToken = $event['replyToken'];
	     $csv = array_map('str_getcsv', file('sta.csv'));
            $findName = iconv("utf-8","tis-620",$text);
			//$findName = strtoupper($findName);
            foreach($csv as $values)
            {
		    
             if($values[1]==$findName or $values[2]==$findName) {  // index 0 contains the name
                 $Myd = iconv("tis-620","utf-8",$values[0]);  // index 1 contains the googlemap link  
		     $messages=[
				'type' => 'text',
				'text' => $Myd    //."  [".$KVA." KVA]"
						
			];
		     $findresult = "success";
	     }
			                                         }
			//สร้างข้อความภาคผนวก
			if($Myd=="99"){
				$messages = array(
					'type'=> 'template',
					'altText'=> 'กรุณาเลือกภาคผนวก',
				         'template'=>array(
						 'type'=>'buttons',
						 'text'=>'กรุณาเลือกภาคผนวก',
				                   'actions'=>array(
							   
							         array('type'=> 'message','label'=> 'ภาคผนวก ก','text'=> 'ภาคผนวก ก'),
							         array('type'=> 'message','label'=> 'ภาคผนวก ข','text'=> 'ภาคผนวก ข'),
								 array('type'=> 'message','label'=> 'ภาคผนวก ค','text'=> 'ภาคผนวก ค'),  
								 array('type'=> 'message','label'=> 'ภาคผนวก ง','text'=> 'ภาคผนวก ง')  
								   
								   )
					                   )
					
					
					);
					  
					  
					  
					  
					  
					  
			}
			//จบสร้างข้อความภาคผนวก
			
			
			
			
			if ($Myd=="") {
		                // Build message to reply back
				$findresult = "N/A";
			$messages = array(
					 'type'=> 'template',
                                          'altText'=> 'ระเบียบก่อสร้างปี 59 กรุณาเลือกหมวด',
                                           'template'=>array (
                                                             'type'=> 'carousel',
                                                         'columns'=> array(
							   
						                    array(
								    'title'=>'ระเบียบก่อสร้างปี59 กรุณาเลือกหมวด',    
								    'text'=> 'หมวดที่1 สำรวจออกแบบ ประมาณการ',
                                                                    'actions'=>array (
                                                                                      array(
                                                                                            'type'=> 'message',
                                                                                            'label'=> 'เลือก',
                                                                                            'text'=> 'คุณเลือกหมวดที่ 1'
                                                                                            )
                                                                                      )//action col1
								     ),
								     array(
							            'title'=>'ระเบียบก่อสร้างปี59 กรุณาเลือกหมวด', 
								    'text'=> 'หมวดที่2 การดำเนินการก่อสร้าง',
                                                                    'actions'=>array (
                                                                                      array(
                                                                                            'type'=> 'message',
                                                                                            'label'=> 'เลือก',
                                                                                            'text'=> 'คุณเลือกหมวดที่ 2'
                                                                                            )
                                                                                      )//action col2
							             ),
							              array(
							           'title'=>'ระเบียบก่อสร้างปี59 กรุณาเลือกหมวด', 
								    'text'=> 'หมวดที่3 อำนาจอนุมัติ',
                                                                    'actions'=>array (
                                                                                      array(
                                                                                            'type'=> 'message',
                                                                                            'label'=> 'เลือก',
                                                                                            'text'=> 'คุณเลือกหมวดที่ 3'
                                                                                            )
                                                                                      )//action col3
								     ),
								   array(
							           'title'=>'ระเบียบก่อสร้างปี59 กรุณาเลือกหมวด', 
								    'text'=> 'ภาคผนวก',
                                                                    'actions'=>array (
                                                                                      array(
                                                                                            'type'=> 'message',
                                                                                            'label'=> 'เลือก',
                                                                                            'text'=> 'ภาคผนวก'
                                                                                            )
									               
                                                                                      )//action col4
								     )
								 
								 
								 
								 
								     ) //array columns
                                                            )//array templete
				                    
                                            ); //array messages 
			
			 }//if
		
			//$messages[
			//	'type' => 'text',
			//	'text' => $Myd    //."  [".$KVA." KVA]"
						
			//];
			
			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
				'messages' => [$messages],
			];
			$post = json_encode($data);
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			$result = curl_exec($ch);
			curl_close($ch);

			echo $result . "\r\n";
		
			
		}
	}
	//// getdisplay
	$url = 'https://api.line.me/v2/bot/profile/'.$userid;

   $headers = array('Authorization: Bearer ' . $access_token);
   $ch = curl_init($url);
   curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
   //curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
   curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
   curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
   $result = curl_exec($ch);
   curl_close($ch);
   $displayname = $result;
	//end get
}
$Ti = date("H:i:s",mktime(date("H")+7, date("i")+0, date("s")+0));
$Da = date("d.m.y");
$strFileName = "cndis.csv";
$objFopen = fopen($strFileName, 'a');
//$findName1 = iconv("tis-620","utf-8",$findName);
$strText1 = "\n".$Da.",".$Ti.",".$findName.",".$findresult.",".$displayname;
fwrite($objFopen, $strText1);
fclose($objFopen);


echo "OK";
?>
