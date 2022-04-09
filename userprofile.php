<?php 
    session_start();
    if (!isset($_SESSION['SESSION_EMAIL'])) {
        header("Location: index.php");
        die();
    }

    include 'config.php';

    $query = mysqli_query($conn, "SELECT * FROM user WHERE email='{$_SESSION['SESSION_EMAIL']}'");

    if (mysqli_num_rows($query) > 0) {
        $row = mysqli_fetch_assoc($query); 
    }

    
    $msg="";

    if(isset($_POST['submit'])){
        $name=mysqli_real_escape_string($conn,$_POST['name'] );
        
        $password=mysqli_real_escape_string($conn,md5($_POST['password']) );
        $confirm_password=mysqli_real_escape_string($conn,md5($_POST['confirm-password']) );
        
        
            if($password === $confirm_password ){
                $sql = "UPDATE user SET username='$name', password='$password' WHERE email='{$_SESSION["SESSION_EMAIL"]}'";
                $result= mysqli_query($conn, $sql);
                if($result){
                    $msg = "<div class='alert alert-info'>Profile Updated</div>";
                }
                else{
                    $msg="<div class='alert alert-danger'>Passwords does not match</div>";
                }
            }
    }
    if(isset($_POST['delete'])){
                $userid=mysqli_real_escape_string($conn,$_POST['userid'] );
                $name=mysqli_real_escape_string($conn,$_POST['name'] );
                $email=mysqli_real_escape_string($conn,$_SESSION["SESSION_EMAIL"] );

                $check= "SELECT * FROM deleteid WHERE email='$email' ";
                $run= mysqli_query($conn, $check);

                if(mysqli_num_rows($run)> 0){
                    $msg = "<div class='alert alert-danger'>Request Already Added</div>";
                    
                }
                    
                elseif(mysqli_num_rows($run)< 1){
                    $query="INSERT INTO deleteid (userid,username,email) VALUES('{$userid}','{$name}','{$email}') ";
                    $result= mysqli_query($conn, $query);
                    $msg="<div class='alert alert-info'>Request Added</div>";
                    
                    }
                else{
                    $msg="<div class='alert alert-danger'>Request Already Added</div>";
                    
                }    
                
            
    }

?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>User Profile</title>
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
    <link rel="stylesheet" href="css/styles.css" type="text/css" media="all" />
    <!--//Style-CSS -->

    <script src="https://kit.fontawesome.com/af562a2a63.js" crossorigin="anonymous"></script>

</head>

<body>
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
                    <a href="welcome.php" class="nav-link ">home</a>
                    <a href="rentstatus.php" class="nav-link ">Rent Status</a>
                    <a href="buystatus.php" class="nav-link ">Buy Status</a>
                    <a href='logout.php' class="nav-link">Logout</a>  
                </div>

            </div>

        </nav>


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
                            <img src="art//profilepng.png" alt="">
                        </div>
                    </div>
                    <div class="content-wthree">
                        <h2>Hello <?php echo $row['username']; ?> </h2>
                        <p><b>Update Your Profile</b></p>
                        <?php echo $msg; ?>
                        <?php 
            
            $sql = "SELECT * FROM user WHERE email='{$_SESSION["SESSION_EMAIL"]}'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
                        <form action="" method="post">
                        
                            <input type="hidden" class="userid" name="userid" placeholder="userid" value="<?php echo $row['userid']; ?>" required>
                            <label>Name</label>
                            <input type="text" class="name" name="name" placeholder="Name" value="<?php echo $row['username']; ?>" required>
                            <label>Email</label>
                            <input type="email" class="email" name="email" placeholder="Email" value="<?php echo $row['email']; ?>"disabled required>
                            <label>Password</label>
                            <input type="password" class="password" name="password" placeholder="Password" value="<?php echo $row['password']; ?>" required>
                            <label>Confirm Password</label>
                            <input type="password" class="confirm-password" name="confirm-password" placeholder="Confirm Password" value="<?php echo $row['password']; ?>" required>
                            <?php
                }
            }
                ?>
                            <button name="submit" class="btn" type="submit">Update</button>
                            <br></br>
                            <button name="delete" class="btn" type="delete">Request to Delete ID</button>
                        </form>
                        
                        
                    </div>
                </div>
            </div>
            <!-- //form -->
        </div>
    </section>
    <!-- //form section start -->


    



    <!-- footer -->
    <footer class="section footer">
        <!-- footer links -->
        <div class="footer-links">
            <a href="welcome.php" class="footer-link ">Home</a>
            <a href="buystatus.php" class="footer-link ">Buy status</a>
            <a href="rentstatus.php" class="footer-link ">Rent status</a>
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


