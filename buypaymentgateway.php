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

    // if(isset($_GET['csku'])){
	// $csku = $_GET['csku'];
    // $price = $_GET['price'];
    // }
    
    // if(isset($_POST['submit2'])){   
        
    //     $client_name=mysqli_real_escape_string($conn,$_POST['client_name'] );
    //     $phone=mysqli_real_escape_string($conn,($_POST['phone']) );
    //     $nationalid=mysqli_real_escape_string($conn,($_POST['nationalid']) );
    //     $address=mysqli_real_escape_string($conn,($_POST['address']));
    //     $amount=mysqli_real_escape_string($conn,($_POST['amount']));
    //     $transaction_id=mysqli_real_escape_string($conn,($_POST['transaction_id']));
    //     $csku = $_POST['csku'] ;
    //     $price = $_POST['price'] ;

    //     if($amount===$price){
    //         $sql="INSERT INTO client_buy (client_name,email,phone,nationalid,address,csku,paying_amount,paid_amount,transaction_id,status) VALUES('{$client_name}','{$_SESSION['SESSION_EMAIL']}','{$phone}','{$nationalid}','{$address}','{$csku}','{$price}','{$amount}','{$transaction_id}','Pending')";
    //         $result= mysqli_query($conn, $sql);
    //         header('Location: buypaymentgateway.php');
    //         if ($result) {
    //             $msg = "<div class='alert alert-info'>Infromation Added Succesfully</div>";
    //             $sql1="SELECT * from buy_car where csku='{$csku}'";
    //             $result1=mysqli_query($conn, $sql1);
    //             if($rws=mysqli_fetch_assoc($result1)){
    //                 $csku=$rws['csku'];
    //                 $quantity=$rws['quantity'];
    //                 $quantity1=$quantity-1;
    //                 $sql2="UPDATE buy_car SET quantity='{$quantity1}' where csku='{$csku}'";
    //                 $result2=mysqli_query($conn, $sql2);
    //                 header('Location: buypaymentgateway.php');
    //             }
    //         } else {
                
    //             echo "Error: " . $sql . "<br>" . $conn->error;
    //         }  
        
    //     } 
    //     else{
    //         $msg = "<div class='alert alert-danger'>Enter the Correct Amount</div>";
    //     }
    // }  
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
                            <h1>Provide payment information</h1>
                        </div>
                    </div>
                    <div class="content-wthree">
                        <h2>payment Information</h2>

                        <?php echo $msg; ?>
                        
                        <form action="buypaymentgateway.php" method="post"  > 

                            

                            <input type="text" class="nationalid" name="nationalid" placeholder="National ID" value="<?php if (isset($_POST['submit'])) { echo $nationalid; } ?>" required>

                            
                            <button name="submit2" class="btn" type="submit">Submit</button>
                        </form>
                        <?php
                            if(isset($_POST['submit2'])){
                                $nationalid=mysqli_real_escape_string($conn,($_POST['nationalid']) );

                                $sql = "SELECT * FROM client_buy where nationalid='{$nationalid}'";
                                $result=mysqli_query($conn,$sql);
                                if($rws=mysqli_fetch_assoc($result)>0){
                                    ?>
                                    <form action="buypaymentgateway.php" method="post"  > 

                            
                                    <input type="text" class="client_name" name="client_name" placeholder="Client Name" value="<?php if (isset($_POST['submit'])) { echo $client_name; } ?>" required>
                                    

                            
                                    <button name="submit3" class="btn" type="submit">Submit</button>
                        </form>
                        <?php
                                }
                        if(isset($_POST['submit2'])){
                            $client_name=mysqli_real_escape_string($conn,($_POST['client_name']) );

                            $sql1 = "SELECT * FROM client_buy where client_name='{$client_name}'";
                            $result1=mysqli_query($conn,$sql);
                            if($rws1=mysqli_fetch_assoc($result1)>0){
                                ?>
                                <form action="buypaymentgateway.php" method="post"  > 

                        
                                <input type="text" class="amount" name="amount" placeholder="amount" value="<?php if (isset($_POST['submit'])) { echo $amount; } ?>" required>
                                

                        
                                <button name="submit4" class="btn" type="submit">Submit</button>
                    </form>
                    <?php
                                }
                                
                            }
                        }
                        ?>
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