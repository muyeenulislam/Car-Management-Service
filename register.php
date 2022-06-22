<?php 

    //Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    //Load Composer's autoloader
    require_once 'vendor/autoload.php';


    include 'config.php';
    $msg="";

    if(isset($_POST['submit'])){
        $userid= mysqli_real_escape_string($conn,rand(0,20) );
        $name=mysqli_real_escape_string($conn,$_POST['name'] );
        $email=mysqli_real_escape_string($conn,$_POST['email'] );
        $password=mysqli_real_escape_string($conn,md5($_POST['password']) );
        $confirm_password=mysqli_real_escape_string($conn,md5($_POST['confirm-password']) );
        $otp=mysqli_real_escape_string($conn,md5(rand()));
        // echo $name;
        if(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM user WHERE email='{$email}' "))> 0){
            $msg= "<div class='alert alert-danger'>{$email}-This email Already Exists</div>";
        }else{
            if($password === $confirm_password ){
                $sql="INSERT INTO user (userid,username,email,password,otp) VALUES('{$userid}','{$name}','{$email}','{$password}','{$otp}') ";
                $result= mysqli_query($conn, $sql);
                if($result){
                    echo "<div style='display: none;'>";
                    //Create an instance; passing `true` enables exceptions
                        $mail = new PHPMailer(true);

                        //Enable SMTP debugging.
                        $mail->SMTPDebug = SMTP::DEBUG_SERVER;
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

                        $mail->Subject = "Verification Email";
                        $mail->Body = 'Here is the verification link <b><a href="http://car-management-service.rf.gd/?verification='.$otp.'">http://car-management-service.rf.gd/?verification='.$otp.'</a></b>';
                        $mail->AltBody = 'Here is the verification link <b><a href="http://car-management-service.rf.gd/?verification='.$otp.'">http://car-management-service.rf.gd/?verification='.$otp.'</a></b>';

                        try {
                            $mail->send();
                            echo "Message has been sent successfully";
                        } catch (Exception $e) {
                            echo "Mailer Error: " . $mail->ErrorInfo;
                        }
                        

                        echo "</div>";

                                        $msg= "<div class='alert alert-info'>Please verify your registration by checking your mail</div>";
                                        }else{
                                            $msg= "<div class='alert alert-danger'>Something went wrong</div>";
                                        }

                                    }
                                    else{
                                        $msg="<div class='alert alert-danger'>Passwords does not match</div>";
                        
                                    }
                                }


                            }

                        ?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Login to MMA Auto</title>
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
                        <h2>Register Here</h2>
                        <p>Not a user? Register now!</p>
                        <?php echo $msg; ?>
                        <form action="" method="post">
                            <input type="text" class="name" name="name" placeholder="Enter Your Name" value="<?php if (isset($_POST['submit'])) { echo $name; } ?>" required>
                            <input type="email" class="email" name="email" placeholder="Enter Your Email" value="<?php if (isset($_POST['submit'])) { echo $email; } ?>" required>
                            <input type="password" class="password" name="password" placeholder="Enter Your Password" required>
                            <input type="password" class="confirm-password" name="confirm-password" placeholder="Enter Your Confirm Password" required>
                            <button name="submit" class="btn" type="submit">Register</button>
                        </form>
                        <div class="social-icons">
                            <p>Have an account! <a href="index.php"><b>Login</b></a>.</p>
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