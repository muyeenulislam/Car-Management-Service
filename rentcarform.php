<?php
    
    session_start();
    if (!isset($_SESSION['adminlogin'])) {
    header("Location: adminlogin.php");
    die();
}

    include 'config.php';
    $msg="";

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


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

        if(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM rent_car WHERE crsku='{$crsku}' AND car_name='{$carname}' AND car_model='{$carmodel}'"))> 0){
            $msg="<div class='alert alert-danger'>Car Already Exists</div>";}
        else{
            $sql="INSERT INTO rent_car (crsku,car_name,car_model,car_type,engine_power,transmission,color,passenger_capacity,drive,price,car_img,mileage,quantity) VALUES('{$crsku}','{$carname}','{$carmodel}','{$cartype}','{$engine}','{$transmission}','{$color}','{$passcap}','{$drivewheels}','{$price}','{$img}','{$mileage}','{$quantity}') ";
            $result= mysqli_query($conn, $sql);
            if ($result) {
                $msg="<div class='alert alert-info'>Car Added</div>";
                header('Location: viewrentcars.php');
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }  
        }
    }    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add car for Rent</title>
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
                        <p>Insert car details for rent</p>
                        <?php echo $msg; ?>
                        <form action="rentcarform.php" method="post" enctype="multipart/form-data" > 
                            <input type="text" class="crsku" name="crsku" placeholder="crsku" value="<?php if (isset($_POST['submit'])) { echo $crsku; } ?>" required>
                            <input type="text" class="car_name" name="car_name" placeholder="Car Name" value="<?php if (isset($_POST['submit'])) { echo $carname; } ?>" required>
                            <input type="text" class="car_model" name="car_model" placeholder="Car Model" value="<?php if (isset($_POST['submit'])) { echo $carmodel; } ?>" required>
                            <input type="text" class="car_type" name="car_type" placeholder="Car Type" value="<?php if (isset($_POST['submit'])) { echo $cartype; } ?>" required>
                            <input type="text" class="engine_power" name="engine_power" placeholder="Engine" value="<?php if (isset($_POST['submit'])) { echo $engine; } ?>" required>
                            <input type="text" class="transmission" name="transmission" placeholder="Transmission" value="<?php if (isset($_POST['submit'])) { echo $transmission; } ?>" required>
                            <input type="text" class="color" name="color" placeholder="color" value="<?php if (isset($_POST['submit'])) { echo $color; } ?>" required>
                            <input type="text" class="passenger_capacity" name="passenger_capacity" placeholder="Passenger Capacity" value="<?php if (isset($_POST['submit'])) { echo $passcap; } ?>" required>
                            <input type="text" class="drive" name="drive" placeholder="Drive Wheels" value="<?php if (isset($_POST['submit'])) { echo $drivewheels; } ?>" required>
                            
                            <input type="text" class="price" name="price" placeholder="Price" value="<?php if (isset($_POST['submit'])) { echo $price; } ?>" required>
                            <input type="text" class="mileage" name="mileage" placeholder="Mileage" value="<?php if (isset($_POST['submit'])) { echo $mileage; } ?>" required>
                            <input type="file" class="car_img" name="car_img" placeholder="Image" value="<?php if (isset($_POST['submit'])) { echo $img; } ?>" >
                            <input type="text" class="quantity" name="quantity" placeholder="Quantity" value="<?php if (isset($_POST['submit'])) { echo $quantity; } ?>" required>
                            
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