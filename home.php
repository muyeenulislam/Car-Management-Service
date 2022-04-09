<?php
    include 'config.php';

    $msg="";

    if (isset($_POST['msgsubmit'])) {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $textarea=  mysqli_real_escape_string($conn, $_POST['textarea']);
        $sql="INSERT INTO messages (email,message) VALUES('{$email}','{$textarea}') ";
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

    <link rel="stylesheet" href="css/style2.css" type="text/css" media="all" />

    <script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
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
                    <a href="#home" class="nav-link scroll-link">home</a>
                    <a href="#about" class="nav-link scroll-link">about</a>
                    <a href="#platforms" class="nav-link scroll-link">Buy</a>
                    <a href="#featured" class="nav-link scroll-link">Rent</a>
                    <a href='index.php' class="nav-link">Login</a>
                </div>
            </div>

        </nav>


        <!--hero component-->
        <div class="hero">
            <div class="hero-banner">
                
                <h1 class="hero-title">MMA Auto</h1>
                <p class="hero-text">Explore the Cars you Desire
                </p>
                <a href="#platforms" class="btn-white scroll-link">Explore</a>
            </div>
        </div>
    </header>
    <!--end of header-->

    <!--about section-->
    <section class="section about" id="about">
        <!--title-->
        <div class="title-wrapper">
            <h2 class="title"><span class="subtitle">about</span></h2>
        </div>
        <!--end of title-->
        <!--about center-->
        <div class="about-center section-center">
            <!--about image-->
            <article class="about-img">
                <img src="./art/about.png" class="about-photo" alt="paint">
            </article>
            <!--about info-->
            <article class="about-info">
                <h3>About Us</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro aliquam illum laborum nemo quisquam veniam inventore nesciunt quaerat amet placeat?
                </p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi, tempore.
                </p>
                
            </article>
        </div>
    </section>
    <!--end of about section-->


    <!-- sell -->
    <section class="section platforms" id="platforms">
        <!--title-->
        <div class="title-wrapper">
            <h2 class="title">Buy a<span class="subtitle"> Car</span></h2>
        </div>
        <!--end of title-->

        <section class="section-center featured-center">
            <!-- sort -->
            <form action="home.php #platforms" method="GET">
                        <div >
                            <select name="sort" class="form-control" >
                                <option value="none">--Select Option</option>
                                <option value="name_asc" <?php if(isset($_GET['sort']) && $_GET['sort']== "name_asc"){echo "selected";}?>>Name (a-z)</option>
                                <option value="name_desc" <?php if(isset($_GET['sort']) && $_GET['sort']== "name_desc"){echo "selected";}?>>Name (z-a)</option>
                                <option value="price_inc" <?php if(isset($_GET['sort']) && $_GET['sort']== "price_inc"){echo "selected";}?>>Price (Increasing)</option>
                                <option value="price_dec" <?php if(isset($_GET['sort']) && $_GET['sort']== "price_dec"){echo "selected";}?>>Price (Decreasing)</option>

                            </select>
                            <button type="submit" class="btn-primary">Sort</button>
                        </div>
            </form>
            <!-- end of sort -->
            <!-- featured center -->
            <div class="section-center featured-center">
                <?php
                $sort_option="";
	            if(isset($_GET['sort'])){
                    

                    if($_GET['sort']=="name_asc"){

                        $sort_option= "SELECT * FROM buy_car ORDER BY car_name ASC";
                        
                    }
        
                    elseif($_GET['sort']=="name_desc"){
                        $sort_option= "SELECT * FROM buy_car ORDER BY car_name DESC";
                    }
                    elseif($_GET['sort']=="price_inc"){
                        $sort_option= "SELECT * FROM buy_car ORDER BY price ASC";
                    }
                    elseif($_GET['sort']=="price_dec"){
                        $sort_option= "SELECT * FROM buy_car ORDER BY price DESC";
                    }
                }
                else{
                    $sort_option= "SELECT * FROM buy_car ";
                }
                
                
                $result= mysqli_query($conn, $sort_option);
                if(mysqli_num_rows($result)>0){
                    foreach($result as $rws){
                        ?>
                        <!-- single art -->
                        <article class="art-card">
                            <!-- img container -->
                            <a href="index.php"  target="_blank" class="art-img-container">
                                <img src="images/<?php echo $rws['car_img'];?>" class="art-img" alt="chr"> 
                                <p class="art-date"><?php echo 'BDT.'.$rws['price'];?></p>
                            </a>
                            
                            <!-- art footer -->
                            <div class="art-footer">
                                <h4 class="art-title"><?php echo $rws['car_name'];?></h4>
                                <!-- art info -->
                                <div class="art-info">
                                    <div class="art-details">
                                        <p><?php echo '<b>Car Model:</b> '.$rws['car_model'];?></p>
                                        <p><?php echo '<b>Car type:</b> '.$rws['car_type'];?></p>
                                        <p><?php echo '<b>Mileage:</b> '.$rws['mileage'];?></p>
                                        
                                    </div>
                                    <div class="art-link">
                                        <a href="index.php" target="_blank" class="btn-primary">Buy Now</a>
                                    </div>
                                </div>
                                
                            </div>
                        </article>
                        <!-- end of single art -->
                        <?php
                    }
                }
            
            ?>
            
            </div>
        </section>
        
    </section>
    <!-- end of sell-->




    <!-- rent -->
    <section class="section featured" id="featured">
        <!--title-->
        <div class="title-wrapper">
            <h2 class="title">Rent a<span class="subtitle"> Car</span></h2>
        </div>
        <!--end of title-->
        <!-- featured center -->
        <section class="section-center featured-center">

        <!-- sort -->
        <form action="home.php #featured"  method="GET">
                        <div  >
                            <select name="sort" class="form-control">
                                <option value="">--Select Option</option>
                                <option value="name_asc" <?php if(isset($_GET['sort']) && $_GET['sort']== "name_asc"){echo "selected";}?>>Name (a-z)</option>
                                <option value="name_desc" <?php if(isset($_GET['sort']) && $_GET['sort']== "name_desc"){echo "selected";}?>>Name (z-a)</option>
                                <option value="price_inc" <?php if(isset($_GET['sort']) && $_GET['sort']== "price_inc"){echo "selected";}?>>Price (Increasing)</option>
                                <option value="price_dec" <?php if(isset($_GET['sort']) && $_GET['sort']== "price_dec"){echo "selected";}?>>Price (Decreasing)</option>

                            </select>
                            <button type="submit" class="btn-primary">Sort</button>
                        </div>
            </form>
            <!-- end of sort -->
        <!-- featured center -->
        <div class="section-center featured-center">
        <?php
                $sort_option="";
	            if(isset($_GET['sort'])){

                    if($_GET['sort']=="name_asc"){

                        $sort_option= "SELECT * FROM rent_car ORDER BY car_name ASC";
                    }
        
                    elseif($_GET['sort']=="name_desc"){
                        $sort_option= "SELECT * FROM rent_car ORDER BY car_name DESC";
                    }
                    elseif($_GET['sort']=="price_inc"){
                        $sort_option= "SELECT * FROM rent_car ORDER BY price ASC";
                    }
                    elseif($_GET['sort']=="price_dec"){
                        $sort_option= "SELECT * FROM rent_car ORDER BY price DESC";
                    }
                }
                else{
                    $sort_option= "SELECT * FROM rent_car ";
                }
                $result= mysqli_query($conn, $sort_option);
                if(mysqli_num_rows($result)>0){
                    foreach($result as $rws){
                        ?>
                        <!-- single art -->
                        <article class="art-card">
                            <!-- img container -->
                            <a href="index.php"  target="_blank" class="art-img-container">
                                <img src="rentimg/<?php echo $rws['car_img'];?>" class="art-img" alt="chr"> 
                                <p class="art-date"><?php echo 'BDT.'.$rws['price'];?></p>
                            </a>
                            
                            <!-- art footer -->
                            <div class="art-footer">
                                <h4 class="art-title"><?php echo $rws['car_name'];?></h4>
                                <!-- art info -->
                                <div class="art-info">
                                    <div class="art-details">
                                        <p><?php echo '<b>Car Model:</b> '.$rws['car_model'];?></p>
                                        <p><?php echo '<b>Car type:</b> '.$rws['car_type'];?></p>
                                        <p><?php echo '<b>Mileage:</b> '.$rws['mileage'];?></p>
                                        
                                    </div>
                                    <div class="art-link">
                                        <a href="index.php" target="_blank" class="btn-primary">Rent Now</a>
                                    </div>
                                </div>
                                
                            </div>
                        </article>
                        <!-- end of single art -->
                        <?php
                    }
                }
    
            ?>
        </div>
        </section>
        <!-- end of art-center -->
        
    </section>
    <!-- end of rent -->



    <!-- contact -->
    <section class="section contact" id="contact">
        <!--title-->
        <div class="title-wrapper">
            <h2 class="title"><span class="subtitle">contact</span></h2>
        </div>
        <?php echo $msg; ?>
        <!--end of title-->
        <form action="home.php #contact" method="post">
            <div class="input-group">
                <input type="email" name="email" class="form-control" placeholder="your email">
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
            <a href="#home" class="footer-link scroll-link">Home</a>
            <a href="#about" class="footer-link scroll-link">About</a>
            <a href="#platforms" class="footer-link scroll-link">Buy</a>
            <a href="#featured" class="footer-link scroll-link">Rent</a>
            <!-- <a href="#gallery" class="footer-link scroll-link">gallery</a> -->
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