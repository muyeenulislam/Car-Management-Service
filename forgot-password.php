
<?php

session_start();
if (isset($_SESSION['SESSION_EMAIL'])) {
    header("Location: welcome.php");
    die();
}

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

include 'config.php';
$msg = "";

if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $otp = mysqli_real_escape_string($conn, md5(rand()));

    if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM user WHERE email='{$email}'")) > 0) {
        $query = mysqli_query($conn, "UPDATE user SET otp='{$otp}' WHERE email='{$email}'");

        if ($query) {        
            echo "<div style='display: none;'>";
            //Create an instance; passing `true` enables exceptions
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
                        $mail->Password = "demodemo";                           
                        //If SMTP requires TLS encryption then set it
                        $mail->SMTPSecure = "tls";                           
                        //Set TCP port to connect to
                        $mail->Port = 587;                                   

                        $mail->From = "sweproject411@gmail.com";
                        $mail->FromName = "project swe";

                        $mail->addAddress("$email");

                        $mail->isHTML(true);

                        $mail->Subject = "Subject Text";
                        $mail->Body = 'Here is the verification link <b><a href="http://localhost/411/change-password.php?reset='.$otp.'">http://localhost/411/change-password.php?reset='.$otp.'</a></b>';
                        $mail->AltBody = 'Here is the verification link <b><a href="http://localhost/411/?verification='.$otp.'">http://localhost/411/?verification='.$otp.'</a></b>';

                        try {
                            $mail->send();
                            echo "Message has been sent successfully";
                        } catch (Exception $e) {
                            echo "Mailer Error: " . $mail->ErrorInfo;
                        }
            echo "</div>";        
            $msg= "<div class='alert alert-info'>Please check your mail</div>";
            
        }
    } else {
        $msg = "<div class='alert alert-danger'>$email - This email address do not found.</div>";
    }
}

?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Forgot Password</title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <meta name="keywords"
        content="Login Form" />
    <!-- //Meta tag Keywords -->

    <link href="//fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!--/Style-CSS -->
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
    <link rel="stylesheet" href="css/style2.css" type="text/css" media="all" />
    <!--//Style-CSS -->

    <script src="https://kit.fontawesome.com/af562a2a63.js" crossorigin="anonymous"></script>

</head>

<body>

    <!-- form section start -->
    <section class="w3l-mockup-form">
        <div class="container">
            <!-- /form -->
            <div class="workinghny-form-grid">
                <div class="main-mockup">
                    <!-- <div class="alert-close">
                        <span class="fa fa-close"></span>
                    </div> -->
                    <div class="w3l_form align-self">
                        <div class="left_grid_info">
                            <img src="art/steering.png" alt="">
                        </div>
                    </div>
                    <div class="content-wthree">
                        <h2>Forgot Password</h2>
                        <p>Enter the email address to reset the password</p>
                        <?php echo $msg; ?>
                        <form action="" method="post">
                            <input type="email" class="email" name="email" placeholder="Enter Your Email" required>
                            <button name="submit" class="btn" type="submit">Send Reset Link</button>
                        </form>
                        <div class="social-icons">
                            <p>Back to! <a href="index.php">Login</a>.</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- //form -->
        </div>
    </section>
    <!-- //form section start -->

    <script src="js/jquery.min.js"></script>
    <script>
        $(document).ready(function (c) {
            $('.alert-close').on('click', function (c) {
                $('.main-mockup').fadeOut('slow', function (c) {
                    $('.main-mockup').remove();
                });
            });
        });
    </script>

</body>

</html>