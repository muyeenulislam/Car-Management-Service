<?php
ob_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require_once 'vendor/autoload.php';

session_start();
if (!isset($_SESSION['adminlogin'])) {
    header("Location: adminlogin.php");
    die();
}

    

include 'config.php';


$userid=$_GET['userid'];
$sql= "SELECT * FROM user where $userid=userid";
$query= mysqli_query($conn,$sql);
while($row = mysqli_fetch_assoc($query)){

        $email= $row['email'];
        $mail = new PHPMailer(true);
    
        //Enable SMTP debugging.
        $mail->SMTPDebug = 3;                               
        //Set PHPMailer to use SMTP.
        $mail->isSMTP();            
        //Set SMTP host name                          
        $mail->Host = "smtp.gmail.com";
        //Set this to true if SMTP host requires authentication to send email
        $mail->SMTPAuth = true;                          
        //Provide username and password     
        $mail->Username = "sweproject411@gmail.com";                 
        $mail->Password = "yascqotpaukmeclr";                           
        //If SMTP requires TLS encryption then set it
        $mail->SMTPSecure = "tls";                           
        //Set TCP port to connect to
        $mail->Port = 587;                                   
    
        $mail->From = "sweproject411@gmail.com";
        $mail->FromName = "CMS";
    
        $mail->addAddress("$email");
    
        $mail->isHTML(true);
    
        $mail->Subject = "ID deletion";
        $mail->Body = 'Your MMA Auto ID has been deleted';
        $mail->AltBody = 'Your MMA Auto ID has been deleted';
    
        try {
            $mail->send();
                                
            echo "Message has been sent successfully";
            $newsql= "DELETE FROM user where $userid=userid";
            $newquery= mysqli_query($conn,$newsql);
            if($newquery){
                header('location: viewusers.php');
            }
            else{
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
                    
        } 
        catch (Exception $e) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        }
        
}

ob_end_flush();

?>