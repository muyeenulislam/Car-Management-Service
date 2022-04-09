<?php
    session_start();
    if (!isset($_SESSION['SESSION_EMAIL'])) {
        header("Location: index.php");
        die();
    }

    include 'config.php';
    $msg = "";
    $query = mysqli_query($conn, "SELECT * FROM user WHERE email='{$_SESSION['SESSION_EMAIL']}'");

    if (mysqli_num_rows($query) > 0) {
        $row = mysqli_fetch_assoc($query);

        
    }

    if (isset($_POST['msgsubmit'])) {
        
        $textarea=  mysqli_real_escape_string($conn, $_POST['textarea']);
        $sql="INSERT INTO messages (email,message) VALUES('{$_SESSION['SESSION_EMAIL']}','{$textarea}') ";
            $result= mysqli_query($conn, $sql);
            if ($result) {
                $msg = "<div class='alert alert-info'>Message sent to Admin</div>";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }  

        
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MMA Auto</title>
    <!--font awesome  -->
    <link rel="stylesheet" href="./fontawesome-free-5.15.2-web/fontawesome-free-5.15.2-web/css/all.min.css">
    <!--styles-->
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
    <link rel="stylesheet" href="css/style2.css" type="text/css" media="all" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    
    <script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
    <!--favicon-->
    <link rel="shortcut icon" href="./art/minilogo.jpg" type="image/x-icon">
</head>
<body>
    <!--header-->
    <header id="home">


        <!--navbar-->
        <nav class="navbar">
            <div class="nav-center">
                <!-- nav header -->
                <div class="nav-header">
                    <img src="./art/logo.png" class="nav-logo" alt="logo">
                    <button type="button" class="nav-toggle" id="nav-toggle" aria-label="nav toggler">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>
                <!-- end of nav header -->
                <!-- navbar links -->
                <div class="nav-links" id="nav-links">
                    <a href="welcome.php" class="nav-link">home</a>
                    <a href="userprofile.php" class="nav-link ">Profile</a>
                    <a href='logout.php' class="nav-link">Logout</a>  
                </div>

            </div>

        </nav>


    <!--about section-->
    <section class="section about" id="about">
        <!--title-->
        <div class="title-wrapper">
            <h2 class="title"><span class="subtitle">Thank you for choosing MMA auto</span></h2>
        </div>
        <!--end of title-->
        <!--about center-->
        <div class="title-wrapper">
            <h2 class="title">An Admin will check the details and get back to you soon</h2>
        </div>
        <div class="art-link">
                    <a href="welcome.php"  class="btn-primary">Continue Browsing</a> </t>
                    <a href="buystatus.php"  class="btn-primary">view Buying Status</a>
                </div>
    </section>
    <!--end of about section-->





    <!-- contact -->
    <section class="section contact" id="contact">
        <!--title-->
        <div class="title-wrapper">
            <h2 class="title"><span class="subtitle">For any Queries,Leave us a message</span></h2>
            
        </div>
        <!--end of title-->
        <?php echo $msg; ?>
        <form action="thankyou.php #contact" method="post">
            <div class="input-group">
                
                <textarea name="textarea" rows="3" class="form-control" placeholder="Leave a message"></textarea>
                <button type="submit" name="msgsubmit" class="btn-submit">Submit</button>
            </div>
        </form>
    </section>
    <!-- end of contact -->




    <!-- footer -->
    <footer class="section footer">
        <!-- footer links -->
        <div class="footer-links">
            <a href="welcome.php" class="footer-link">Home</a>
        </div>
        
        <!-- copyright -->
        <p class="copyright">
            copyright &copy; MMA Auto<span id="date"></span>. all rights reserved
            
        </p>
    </footer>
    <!-- end of footer -->
    <!-- javascript -->
    <script src="./js/app.js"></script>
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