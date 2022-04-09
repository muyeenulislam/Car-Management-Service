<?php
session_start();
if (!isset($_SESSION['adminlogin'])) {
    header("Location: adminlogin.php");
    die();
    
}
include 'config.php';
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
                    <a href="#dashboard" class="nav-link scroll-link">Dashboard</a>
                    
                    
                    <!-- <a href="#gallery" class="nav-link scroll-link">gallery</a> -->
                    <a href='logout.php' class="nav-link">Logout</a>
                </div>
            </div>

        </nav>
        <!--hero component-->
        <div class="hero">
            <div class="hero-banner">
                <?php echo "Welcome to" ; ?>
                <h1 class="hero-title">MMA Auto</h1>
                
                <a href="#dashboard" class="btn-white scroll-link">Dashboard</a>
            </div>
        </div>
    </header>
        <!-- dashboard -->
        <!-- featured artworks -->
    <section class="section featured" id="dashboard">
        <!--title-->
        <div class="title-wrapper">
            <h2 class="title"><span class="subtitle">Dashboard</span></h2>
        </div>
        <!--end of title-->
        <!-- featured center -->
        <div class="section-center featured-center">
            <!-- single art -->
            <article class="art-card">
                
                <!-- art footer -->
                <div class="art-footer">
                    <h4 class="art-title">Add a Car for Sell</h4>
                    <!-- art info -->
                    <div class="art-info">
                    <div class="art-link">
                        <a href="carform.php" target="_blank" class="btn-primary">Add</a>
                    </div>
                    </div>
                </div>
            </article>
            <!-- end of single art -->

            <!-- single art -->
            <article class="art-card">
                
                <!-- art footer -->
                <div class="art-footer">
                    <h4 class="art-title">Add a Car for Rent</h4>
                    <!-- art info -->
                    <div class="art-info">
                    <div class="art-link">
                        <a href="rentcarform.php" target="_blank" class="btn-primary">Add</a>
                    </div>
                    </div>
                </div>
            </article>
            <!-- end of single art -->

            <!-- single art -->
            <article class="art-card">
                
                <!-- art footer -->
                <div class="art-footer">
                    <h4 class="art-title">View Deletion Requests</h4>
                    <!-- art info -->
                    <div class="art-info">
                    <div class="art-link">
                        <a href="deletionreq.php" class="btn-primary" target="_blank">View</a>
                    </div>
                    </div>
                </div>
            </article>
            <!-- end of single art -->

            <!-- single art -->
            <article class="art-card">
                
                <!-- art footer -->
                <div class="art-footer">
                    <h4 class="art-title">View Users</h4>
                    <!-- art info -->
                    <div class="art-info">
                    <div class="art-link">
                        <a href="viewusers.php" class="btn-primary" target="_blank">View</a>
                    </div>
                    </div>
                </div>
            </article>
            <!-- end of single art -->

            <!-- single art -->
            <article class="art-card">
                
                <!-- art footer -->
                <div class="art-footer">
                    <h4 class="art-title">View Cars for Sell</h4>
                    <!-- art info -->
                    <div class="art-info">
                    <div class="art-link">
                        <a href="viewbuycars.php" class="btn-primary" target="_blank">View</a>
                    </div>
                    </div>
                </div>
            </article>
            <!-- end of single art -->

            <!-- single art -->
            <article class="art-card">
                
                <!-- art footer -->
                <div class="art-footer">
                    <h4 class="art-title">View Cars for Rent</h4>
                    <!-- art info -->
                    <div class="art-info">
                    <div class="art-link">
                        <a href="viewrentcars.php" class="btn-primary" target="_blank">View</a>
                    </div>
                    </div>
                </div>
            </article>
            <!-- end of single art -->

            <!-- single art -->
            <article class="art-card">
                
                <!-- art footer -->
                <div class="art-footer">
                    <h4 class="art-title">View Buyers</h4>
                    <!-- art info -->
                    <div class="art-info">
                    <div class="art-link">
                        <a href="viewbuyers.php" class="btn-primary" target="_blank">View</a>
                    </div>
                    </div>
                </div>
            </article>
            <!-- end of single art -->

            <!-- single art -->
            <article class="art-card">
                
                <!-- art footer -->
                <div class="art-footer">
                    <h4 class="art-title">View Renters</h4>
                    <!-- art info -->
                    <div class="art-info">
                    <div class="art-link">
                        <a href="viewrenters.php" class="btn-primary" target="_blank">View</a>
                    </div>
                    </div>
                </div>
            </article>
            <!-- end of single art -->

            <!-- single art -->
            <article class="art-card">
                
                <!-- art footer -->
                <div class="art-footer">
                    <h4 class="art-title">View Messages</h4>
                    <!-- art info -->
                    <div class="art-info">
                    <div class="art-link">
                        <a href="viewmsg.php" class="btn-primary" target="_blank">View</a>
                    </div>
                    </div>
                </div>
            </article>
            <!-- end of single art -->

            <!-- single art -->
            <article class="art-card">
                
                <!-- art footer -->
                <div class="art-footer">
                    <h4 class="art-title">View Buy Transactions</h4>
                    <!-- art info -->
                    <div class="art-info">
                    <div class="art-link">
                        <a href="viewbuytransactions.php" class="btn-primary" target="_blank">View</a>
                    </div>
                    </div>
                </div>
            </article>
            <!-- end of single art -->

            <!-- single art -->
            <article class="art-card">
                
                <!-- art footer -->
                <div class="art-footer">
                    <h4 class="art-title">View Rent Transactions</h4>
                    <!-- art info -->
                    <div class="art-info">
                    <div class="art-link">
                        <a href="viewrenttransactions.php" class="btn-primary" target="_blank">View</a>
                    </div>
                    </div>
                </div>
            </article>
            <!-- end of single art -->
            
        </div>
        <!-- end of art-center -->
        
    </section>
    <!-- end of featured artworks -->
        <!-- end of dashboard -->

    <!-- footer -->
    <footer class="section footer">
        <!-- footer links -->
        <div class="footer-links">
            <a href="#home" class="footer-link scroll-link">Home</a>
            <a href="#dashboard" class="footer-link scroll-link">Dashboard</a>
        </div>
        
        <!-- copyright -->
        <p class="copyright">
            copyright &copy; MMA Auto<span id="date"></span>. all rights reserved
            
        </p>
    </footer>
    <!-- end of footer -->

    

    <!-- javascript -->
    <script src="./js/app.js"></script>


</body>
</html>