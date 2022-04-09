<?php
    session_start();
    if (!isset($_SESSION['adminlogin'])) {
        header("Location: adminlogin.php");
        die();
    }

    include 'config.php';
    

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $msg="";
    $crsku=$_GET['crsku'];

    if(isset($_POST['submit'])){
        
        
            $img =  $_FILES["car_img"]["name"];
            $file_name = $_FILES["car_img"]["name"];
            $file_tmp = $_FILES["car_img"]["tmp_name"];
            if($file_name!=''){
                move_uploaded_file($file_tmp,"rentimg/".$file_name);
            }
            
    
            $crsku=mysqli_real_escape_string($conn,$_POST['crsku'] );
            $carname=mysqli_real_escape_string($conn,$_POST['car_name'] );
            $carmodel=mysqli_real_escape_string($conn,($_POST['car_model']) );
            $cartype=mysqli_real_escape_string($conn,($_POST['car_type']) );
            $engine=mysqli_real_escape_string($conn,($_POST['engine_power']));
            $transmission=mysqli_real_escape_string($conn,$_POST['transmission'] );
            $color=mysqli_real_escape_string($conn,$_POST['color'] );
            $passcap=mysqli_real_escape_string($conn,($_POST['passenger_capacity']) );
            $drivewheels=mysqli_real_escape_string($conn,($_POST['drive']) );
            $price=mysqli_real_escape_string($conn,$_POST['price'] );
            $mileage=mysqli_real_escape_string($conn,($_POST['mileage']) );
            $quantity=mysqli_real_escape_string($conn,($_POST['quantity']) );

        
            $sql="UPDATE rent_car SET crsku='$crsku',car_name='$carname',car_model='$carmodel',car_type='$cartype',engine_power='$engine',transmission='$transmission',color='$color',passenger_capacity='$passcap',drive='$drivewheels',price='$price',car_img='$img',mileage='$mileage',quantity='$quantity' WHERE crsku='{$crsku}' ";
            $result= mysqli_query($conn, $sql);
            if ($result) {
                $msg="<div class='alert alert-info'>Car Updated Successfully</div>";
                header('Location: viewrentcars.php');
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }  
        
    }    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Information</title>
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
                        <h2>Car Information</h2>
                        <p>Edit car details for Rent</p>
                        <?php echo $msg; ?>
                        <?php
                            

                            $sql = "SELECT * FROM rent_car WHERE crsku='{$crsku}'";

                            $result = mysqli_query($conn, $sql);
                            
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    
            ?>
                        
                        
                        <form action="" method="post" enctype="multipart/form-data" > 
                            <input type="text" class="crsku" name="crsku" placeholder="crsku" value="<?php echo $row['crsku']; ?>" required>
                            <input type="text" class="car_name" name="car_name" placeholder="Car Name" value="<?php echo $row['car_name']; ?>" required>
                            <input type="text" class="car_model" name="car_model" placeholder="Car Model" value="<?php echo $row['car_model']; ?>" required>
                            <input type="text" class="car_type" name="car_type" placeholder="Car Type" value="<?php echo $row['car_type']; ?>" required>
                            <input type="text" class="engine_power" name="engine_power" placeholder="Engine" value="<?php echo $row['engine_power']; ?>" required>
                            <input type="text" class="transmission" name="transmission" placeholder="Transmission" value="<?php echo $row['transmission']; ?>" required>
                            <input type="text" class="color" name="color" placeholder="color" value="<?php echo $row['color']; ?>" required>
                            <input type="text" class="passenger_capacity" name="passenger_capacity" placeholder="Passenger Capacity" value="<?php echo $row['passenger_capacity']; ?>" required>
                            <input type="text" class="drive" name="drive" placeholder="Drive Wheels" value="<?php echo $row['drive']; ?>" required>
                            
                            <input type="text" class="price" name="price" placeholder="Price" value="<?php echo $row['price']; ?>" required>
                            <input type="text" class="mileage" name="mileage" placeholder="Mileage" value="<?php echo $row['mileage']; ?>" required>
                            <input type="file" class="car_img" name="car_img" placeholder="Image" value="<?php echo $row['car_img']; ?>" >
                            <input type="text" class="quantity" name="quantity" placeholder="Quantity" value="<?php echo $row['quantity']; ?>" required>
                            
                            <?php
                }
            }
                ?>
                            <button name="submit" class="btn" type="submit">Submit</button>
                        </form>
                        
                    </div>
                </div>
            </div>
            <!-- //form -->
        </div>
    </section>
    <!-- //form section start -->


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