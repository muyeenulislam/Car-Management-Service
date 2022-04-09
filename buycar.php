<?php
    session_start();
    if (!isset($_SESSION['SESSION_EMAIL'])) {
        header("Location: index.php");
        die();
    }

    include 'config.php';
    $msg="";

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
    <link rel="stylesheet" href="css/style2.css" type="text/css" media="all" />
    

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
                    <a href="welcome.php" class="nav-link ">home</a>
                    <a href='logout.php' class="nav-link">Logout</a>
                </div>
            </div>

        </nav>


    <!--about section-->
    <section class="section about" id="about">
        <!--title-->
        <div class="title-wrapper">
            <h2 class="title"><span class="subtitle">Buy Car</span></h2>
        </div>
        <!--end of title-->

        <?php
						include 'config.php';
						$sel = "SELECT * FROM buy_car WHERE csku = '$_GET[csku]'";
						$rs = $conn->query($sel);
						$rws = $rs->fetch_assoc();
			?>
        <!--about center-->
        <div class="about-center section-center">
            <!--about image-->
            <article class="about-img">
                <img src="images/<?php echo $rws['car_img'];?>" class="about-photo" alt="paint">
            </article>
            <!--about info-->
            <article class="about-info">
                <h3><?php echo $rws['car_name'] ?></h3>
                <h4>Details</h4>
                <p><?php echo '<b>Car Model:</b> '.$rws['car_model'];?></p>
                <p><?php echo '<b>Car type:</b> '.$rws['car_type'];?></p>
                <p><?php echo '<b>Engine:</b> '.$rws['engine_power'];?></p>
                <p><?php echo '<b>Transmission:</b> '.$rws['transmission'];?></p>
                <p><?php echo '<b>Color:</b> '.$rws['color'];?></p>
                <p><?php echo '<b>Passenger Capacity:</b> '.$rws['passenger_capacity'];?></p>
                <p><?php echo '<b>Drive:</b> '.$rws['drive'];?></p>
                <p><?php echo '<b>Fuel type:</b> '.$rws['fuel_type'];?></p>
                <p><?php echo '<b>Mileage:</b> '.$rws['mileage'];?></p>
                <p><?php echo '<b>Description:</b> '.$rws['Car_description'];?></p>
                <p><?php echo '<b>In Stock:</b> '.$rws['quantity'];?></p>
                <p><?php echo '<b>Price: BDT</b> '.$rws['price'];?></p>
                
            </article>
            </div>
            <?php 
            if($rws['quantity']<1){
                echo $msg = "<div class='alert alert-danger'>Out of stock</div>";
            }
            else{
                ?>
                        <div class="art-link">
                            <a href="buypaynow.php?csku=<?php echo $rws['csku'] ?>&price=<?php echo $rws['price'] ?> " target="_blank" class="btn-primary">Proceed</a> 
                            
                        </div>
                    <?php
            }
            
            ?>    
            </div>
                    
        
        
    </section>
    <!--end of about section-->





    <!-- footer -->
    <footer class="section footer">
        <!-- footer links -->
        <div class="footer-links">
            <a href="welcome.php" class="footer-link ">Home</a>
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