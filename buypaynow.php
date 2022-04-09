<?php
    session_start();
    if (!isset($_SESSION['SESSION_EMAIL'])) {
        header("Location: index.php");
        die();
    }

    include 'config.php';
    $msg = "";

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if(isset($_GET['csku'])){
	$csku = $_GET['csku'];
    $price = $_GET['price'];
    }
    
    if(isset($_POST['submit2'])){   
        
        $client_name=mysqli_real_escape_string($conn,$_POST['client_name'] );
        $phone=mysqli_real_escape_string($conn,($_POST['phone']) );
        $nationalid=mysqli_real_escape_string($conn,($_POST['nationalid']) );
        $address=mysqli_real_escape_string($conn,($_POST['address']));

        $csku = $_POST['csku'] ;
        $price = $_POST['price'] ;

        
            $sql="INSERT INTO client_buy (client_name,email,phone,nationalid,address,csku,paying_amount,status) VALUES('{$client_name}','{$_SESSION['SESSION_EMAIL']}','{$phone}','{$nationalid}','{$address}','{$csku}','{$price}','Pending')";
            $result= mysqli_query($conn, $sql);
            if($result){
                header('Location: buystatus.php');
            }
            else{
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

    } 
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Buying Information</title>
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

    <script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/main.js"></script>

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
                            <h1>Provide Information for Buying</h1>
                        </div>
                    </div>
                    <div class="content-wthree">
                        <h2>Client Information</h2>

                        <?php echo $msg; ?>
                        
                        <form action="buypaynow.php" method="post"  > 

                            <input type="text" class="client_name" name="client_name" placeholder="Name" value="<?php if (isset($_POST['submit'])) { echo $client_name; } ?>" required>
                            
                            <input type="text" class="phone" name="phone" placeholder="phone" value="<?php if (isset($_POST['submit'])) { echo $phone; } ?>" required>

                            <input type="text" class="nationalid" name="nationalid" placeholder="National ID" value="<?php if (isset($_POST['submit'])) { echo $nationalid; } ?>" required>

                            <input type="text" class="address" name="address" placeholder="address" value="<?php if (isset($_POST['submit'])) { echo $address; } ?>" required>

                            

                            <input type="hidden"  name="csku" value="<?php echo $csku ?>" >

                            <input type="hidden"  name="price" value="<?php echo $price ?>" >

                            <button name="submit2" class="btn" type="submit">Submit</button>
                        </form>
                        
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