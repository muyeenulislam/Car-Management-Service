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

	
    

    if(isset($_GET['client_id'])){ 
        $client_id = $_GET['client_id'];
    }

    if(isset($_POST['submit2'])){   

        $keylength= 8;
        $str = "1234567890abcdefghijklmnopqrstuvwxyz";
        $randstr = substr(str_shuffle($str),0,$keylength);
        $amount=mysqli_real_escape_string($conn,($_POST['amount']));
        $nationalid=$_POST['nationalid'];
        $crsku = $_POST['crsku'] ;
        $paying_amount = $_POST['paying_amount'] ;
        $client_id = $_POST['client_id'] ;
        
        if($amount===$paying_amount){
            $sql="UPDATE client_rent SET  transaction_id='$randstr', paid_amount='$amount' ,status='Approved' WHERE crsku='{$crsku}' AND client_id='{$client_id}'";
            $result= mysqli_query($conn, $sql);
            if ($result) {
                
                $newsql="INSERT into rent_transactions (client_id,transaction_id,amount,email,crsku,nationalid) VALUES ('{$client_id}','{$randstr}','{$amount}','{$_SESSION['SESSION_EMAIL']}','{$crsku}','{$nationalid}')";
                $newquery=mysqli_query($conn,$newsql);
                if($newquery){
                    $msg = "<div class='alert alert-info'>Infromation Added Succesfully</div>";
                    $sql1="SELECT * from rent_car where crsku='{$crsku}'";
                    $result1=mysqli_query($conn, $sql1);
                    if($rws=mysqli_fetch_assoc($result1)){
                        $crsku=$rws['crsku'];
                        $quantity=$rws['quantity'];
                        $quantity1=$quantity-1;
                        $sql2="UPDATE rent_car SET quantity='{$quantity1}' where crsku='{$crsku}'";
                        $result2=mysqli_query($conn, $sql2);
                        header('Location: thankyou2.php');
                    }
                    else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
            } else {
                
                echo "Error: " . $sql1 . "<br>" . $conn->error;
            } 
                

                
            } else {
                
                echo "Error: " . $sql . "<br>" . $conn->error;
            }  
        
        } 
        else{
            
            $msg = "<div class='alert alert-danger'>Enter Correct Amount</div>";
        }
    }
    else{
        
    }
      
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Payment for Renting</title>
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
                    <div class="w3l_form align-self">
                        <div class="left_grid_info">
                            <h1>Payment</h1>
                        </div>
                    </div>
                    <div class="content-wthree">
                        <h2>Payment Information</h2>

                        <?php echo $msg; ?>
                        <?php 
                        
            
            $sql = "SELECT * FROM client_rent WHERE client_id='{$client_id}'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $nationalid= $row['nationalid'];
                    $crsku= $row['crsku'];
                    $paying_amount= $row['paying_amount'];
            ?>
                        <form action="rentpaynow2.php" method="post"  > 
                            <input type="hidden"  name="client_id" value="<?php echo $client_id ?>" >

                            <label><b>Client Name</b></label>
                            <input type="text" class="client_name" name="client_name" placeholder="Name" value="<?php echo $row['client_name']; ?>"disabled required>
                            
                            <label><b>National ID: <?php echo $nationalid; ?></b></label>
                            <input type="hidden"  name="nationalid" value="<?php echo $nationalid ?>" >

                            <input type="hidden"  name="paying_amount" value="<?php echo $paying_amount ?>" >
                            <br></br>

                            <label><b>Amount to be Paid:<?php echo $paying_amount; ?> BDT</b></label><br></br>

                            <label><b>Enter the Amount</b></label>
                            <input type="text" class="amount" name="amount" placeholder="amount" value="<?php if (isset($_POST['submit'])) { echo $amount; } ?>" required>

                            <input type="hidden"  name="crsku" value="<?php echo $crsku ?>" >

                            <?php
                }
            }
            ?>

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