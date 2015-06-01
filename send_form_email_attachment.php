<?php
if($_POST)
{
	$to_email = "pamela.huamani@maxiefectivo.com, erika.alpaca@maxiefectivo.com";
	// $to_email = "alvimer_2708@hotmail.com";
    $bcc = "alvimer2708@gmail.com";
    $bcc .= ", jonathancq@gmail.com";
	$from_email = "noreply@maxiefectivo.com.pe";
	$subject = "Trabaja con nosotros";
	
    if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
        $output = json_encode(array(
            'type'=>'error',
            'text' => 'Sorry Request must be Ajax POST'
        ));
        die($output);
    }
   
    $user_name      = filter_var($_POST["user_name"], FILTER_SANITIZE_STRING);
    $user_dni   = filter_var($_POST["user_dni"], FILTER_SANITIZE_NUMBER_INT);
    $user_question   = $_POST["user_question"];
   
    if(strlen($user_name)<4){
        $output = json_encode(array('type'=>'error', 'text' => 'Name is too short or empty!'));
        die($output);
    }
    if(!filter_var($user_dni, FILTER_VALIDATE_INT)){
        $output = json_encode(array('type'=>'error', 'text' => 'Enter only digits in dni'));
        die($output);
    }
   
    $message_body = "\r\nNombre : ".$user_name."\r\nDNI : ".$user_dni."\r\nConsulta : ".$user_question ;

	$file_attached = false;
	if(isset($_FILES['file_attach']))
	{
		$file_tmp_name 	  = $_FILES['file_attach']['tmp_name'];
		$file_name 		  = $_FILES['file_attach']['name'];
		$file_size 		  = $_FILES['file_attach']['size'];
		$file_type 		  = $_FILES['file_attach']['type'];
		$file_error 	  = $_FILES['file_attach']['error'];

		if($file_error>0)
		{
			$mymsg = array( 
			1=>"The uploaded file exceeds the upload_max_filesize directive in php.ini", 
			2=>"The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form", 
			3=>"The uploaded file was only partially uploaded", 
			4=>"No file was uploaded", 
			6=>"Missing a temporary folder" ); 
			
			$output = json_encode(array('type'=>'error', 'text' => $mymsg[$file_error]));
			die($output); 
		}
		
		$handle = fopen($file_tmp_name, "r");
		$content = fread($handle, $file_size);
		fclose($handle);
		$encoded_content = chunk_split(base64_encode($content));
		$file_attached = true;
	}
	
	if($file_attached)
	{
		$headers = "MIME-Version: 1.0\r\n";
		$headers = "X-Mailer: PHP/" . phpversion()."\r\n";
		$headers .= "From: ".$from_email."\r\n";
		$headers .= "Subject: ".$subject."\r\n";
		$headers .= "Reply-To: ".$user_email."" . "\r\n";
		$headers .= "Bcc: ".$bcc."" . "\r\n";
		$headers .= "Content-Type: multipart/mixed; boundary=".md5('boundary1')."\r\n\r\n";
		
		$headers .= "--".md5('boundary1')."\r\n";
		$headers .= "Content-Type: multipart/alternative;  boundary=".md5('boundary2')."\r\n\r\n";
		
		$headers .= "--".md5('boundary2')."\r\n";
		$headers .= "Content-Type: text/plain; charset=utf-8\r\n\r\n";
		$headers .= $message_body."\r\n\r\n";
		
		$headers .= "--".md5('boundary2')."--\r\n";
		$headers .= "--".md5('boundary1')."\r\n";
		$headers .= "Content-Type:  ".$file_type."; ";
		$headers .= "name=\"".$file_name."\"\r\n";
		$headers .= "Content-Transfer-Encoding:base64\r\n";
		$headers .= "Content-Disposition:attachment; ";
		$headers .= "filename=\"".$file_name."\"\r\n";
		$headers .= "X-Attachment-Id:".rand(1000,9000)."\r\n\r\n";
		$headers .= $encoded_content."\r\n";
		$headers .= "--".md5('boundary1')."--";
	}else{
		$headers = 'From: '.$user_name.'' . "\r\n" .
		'Reply-To: '.$user_email.'' . "\r\n" .
		'X-Mailer: PHP/' . phpversion();
	}
   
    $send_mail = mail($to_email, $subject, $message_body, $headers);

    if(!$send_mail)
    {
        $output = json_encode(array('type'=>'error', 'text' => 'Lo sentimos, pero hay un problema con el envío. Inténtelo más tarde.'));
        die($output);
    }else{
        $output = json_encode(array('type'=>'message', 'text' => 'Gracias por su envío'));
        die($output);
    }
}
?>