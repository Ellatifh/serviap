<?php 
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';
    if(isset($_REQUEST['action'])){
        $action=$_REQUEST['action'];

        switch ($action) {
            case 'contact':
                if(isset($_POST['firstname'])){
                    $firstname=$_POST['firstname'];
                }
                if(isset($_POST['lastname'])){
                    $lastname=$_POST['lastname'];
                }
                if(isset($_POST['subject'])){
                    $subject=$_POST['subject'];
                }
                if(isset($_POST['email'])){
                    $from=$_POST['email'];
                }
                if(isset($_POST['telephone'])){
                    $telephone=$_POST['telephone'];
                }
                if(isset($_POST['message'])){
                    $message=$_POST['message'];
                }
                $mail = new PHPMailer(true);       
                $res=[];
                try {
                    $sender = "support@serviap.ma"; 
                    $passSender = "hamza@123";

                    $mail->IsSMTP(); // Use SMTP
                    $mail->Host        = "mail.serviap.ma"; // Sets SMTP server
                   //$mail->SMTPDebug   = 2; // 2 to enable SMTP debug information
                    $mail->SMTPAuth    = TRUE; // enable SMTP authentication
                    $mail->SMTPSecure  = "tls"; //Secure conection
                    $mail->Port        = 587; // set the SMTP port
                    $mail->SMTPOptions = array(
                        'ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                        )
                    );
                    $mail->Username    = $sender; // SMTP account username
                    $mail->Password    = $passSender;// SMTP account password
                    $mail->Priority    = 1; // Highest priority - Email priority (1 = High, 3 = Normal, 5 = low)
                    $mail->Encoding    = '8bit';
                    $mail->Subject     = $subject;
                    $mail->ContentType = 'text/html; charset=utf-8\r\n';
                    $mail->From        = $from;
                    $mail->Timeout = 50;
                    $mail->FromName    = $firstname." ".$lastname." (".$from.")";
                    $mail->addAddress("info@serviap.com","SERVIAP");
                    $mail->Body= "<p><b>Prénom : </b>".$firstname."</p><p><b>Nom : </b>".$lastname."</p><p><b>Email : </b>".$from."</p><p><b>Téléphone : </b>".$telephone."</p>";     
                    $mail->IsHTML(true);
                    $mail->WordWrap = 50; // set word wrap to 50 characters
                    $mail->send();
                    $res['status']="passed";
                    $res['mail']=$from;
                }catch (Exception $e) {
                    $res['status']="failed";
                    $res['error']=$mail->ErrorInfo;
                }
                echo json_encode($res);
                break;
            case 'devis':
                    if(isset($_POST['firstname'])){
                    $firstname=$_POST['firstname'];
                }
                if(isset($_POST['lastname'])){
                    $lastname=$_POST['lastname'];
                }
                if(isset($_POST['email'])){
                    $from=$_POST['email'];
                }
                if(isset($_POST['telephone'])){
                    $telephone=$_POST['telephone'];
                }
                if(isset($_POST['pack'])){
                    $pack=$_POST['$pack'];
                }
                if(isset($_POST['message'])){
                    $message=$_POST['message'];
                }
                $mail = new PHPMailer(true);       
                $res=[];
                try {
                    $sender = "support@serviap.ma"; 
                    $passSender = "hamza@123";

                    $mail->IsSMTP(); // Use SMTP
                    $mail->Host        = "mail.serviap.ma"; // Sets SMTP server
                   //$mail->SMTPDebug   = 2; // 2 to enable SMTP debug information
                    $mail->SMTPAuth    = TRUE; // enable SMTP authentication
                    $mail->SMTPSecure  = "tls"; //Secure conection
                    $mail->Port        = 587; // set the SMTP port
                    $mail->SMTPOptions = array(
                        'ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                        )
                    );
                    $mail->Username    = $sender; // SMTP account username
                    $mail->Password    = $passSender;// SMTP account password
                    $mail->Priority    = 1; // Highest priority - Email priority (1 = High, 3 = Normal, 5 = low)
                    $mail->Encoding    = '8bit';
                    $mail->Subject     = "Demande de devis";
                    $mail->ContentType = 'text/html; charset=utf-8\r\n';
                    $mail->From        = $from;
                    $mail->Timeout = 50;
                    $mail->FromName    = $firstname." ".$lastname." (".$from.")";
                    $mail->addAddress("info@serviap.com","SERVIAP");
                    $mail->Body= "<p><b>Prénom : </b>".$firstname."</p><p><b>Nom : </b>".$lastname."</p><p><b>Email : </b>".$from."</p><p><b>Téléphone</b>".$telephone."</p><p><b>Pack : </b>".$pack."</p><p><b>Message : </b>".$message."</p>";     
                    $mail->WordWrap = 50; // set word wrap to 50 characters
                    $mail->IsHTML(true);
                    $mail->send();
                    $res['status']="passed";
                    $res['mail']=$from;
                }catch (Exception $e) {
                    $res['status']="failed";
                    $res['error']=$mail->ErrorInfo;
                }
                echo json_encode($res);
                break;
            case 'recrutement':
                if(isset($_POST['firstname'])){
                    $firstname=$_POST['firstname'];
                }
                if(isset($_POST['lastname'])){
                    $lastname=$_POST['lastname'];
                }
                if(isset($_POST['email'])){
                    $from=$_POST['email'];
                }
                if(isset($_POST['telephone'])){
                    $telephone=$_POST['telephone'];
                }
                if(isset($_POST['message'])){
                    $message=$_POST['message'];
                }
                $msg='';
                $res=[];
                $res['status']="failed";
                if(isset($_FILES['file'])){
					$file = $_FILES['file'];

			        $fileName = $file['name'];
			        $fileTmpName = $file['tmp_name'];
			        $fileSize = $file['size'];
			        $fileError = $file['error'];
			        $fileType = $file['type'];

			        $fileExt = explode('.', $fileName);
			        $fileActualExt = strtolower(end($fileExt));

			        $allowed = array('pdf', 'doc', 'docs','pptx');
			        if (in_array($fileActualExt, $allowed)) {
			            $image = $_FILES['file']["name"];
                        $target="cvtheques/".basename($_FILES['file']['name']);
			            if(move_uploaded_file($_FILES['file']['tmp_name'],$target)){
			               $res['target']=$target;
                            $mail = new PHPMailer(true);       
                            try {
                                $sender = "support@serviap.ma"; 
                                $passSender = "hamza@123";
            
                                $mail->IsSMTP(); // Use SMTP
                                $mail->Host        = "mail.serviap.ma"; // Sets SMTP server
                               //$mail->SMTPDebug   = 2; // 2 to enable SMTP debug information
                                $mail->SMTPAuth    = TRUE; // enable SMTP authentication
                                $mail->SMTPSecure  = "tls"; //Secure conection
                                $mail->Port        = 587; // set the SMTP port
                                $mail->SMTPOptions = array(
                                    'ssl' => array(
                                    'verify_peer' => false,
                                    'verify_peer_name' => false,
                                    'allow_self_signed' => true
                                    )
                                );
                                $mail->Username    = $sender; // SMTP account username
                                $mail->Password    = $passSender;// SMTP account password
                                $mail->Priority    = 1; // Highest priority - Email priority (1 = High, 3 = Normal, 5 = low)
                                $mail->Encoding    = '8bit';
                                $mail->Subject     = "Demande d'emploi";
                                $mail->ContentType = 'text/html; charset=utf-8\r\n';
                                $mail->From        = $from;
                                $mail->Timeout = 50;
                                $mail->FromName    = $firstname." ".$lastname." (".$from.")";
                                $mail->addAddress("info@serviap.com","SERVIAP");
                                $mail->Body= "<p><b>Prénom : </b>".$firstname."</p><p><b>Nom : </b>".$lastname."</p><p><b>Email : </b>".$from."</p><p><b>Téléphone</b>".$telephone."</p><p><b>Message : </b>".$message."</p>";     
                                $mail->WordWrap = 50; // set word wrap to 50 characters
                                $mail->IsHTML(true);
                                $mail->AddAttachment($_SERVER['DOCUMENT_ROOT'].'/cvtheques/'.$_FILES['file']["name"]);
                                $mail->send();
                                $res['root']=$_SERVER['DOCUMENT_ROOT'];
                                $res['status']="passed";
                                $res['mail']=$from;
                            }catch (Exception $e) {
                                $res['status']="failed";
                                $res['error']=$mail->ErrorInfo;
                            }
                        }
                        else{
			               $msg="there was a problem uploading file";
			            }
			        }else {
			            $msg='Le type de fichier non supportee';
			        }
                }
                echo json_encode($res);
                break;
        }
    }    
?>