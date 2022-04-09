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
  
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buy Status</title>

    <!--/Style-CSS -->
    <link rel="stylesheet" href="css/style3.css" type="text/css" media="all" />
    <link rel="stylesheet" href="css/styles.css" type="text/css" media="all" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!--//Style-CSS -->

    <script src="https://kit.fontawesome.com/af562a2a63.js" crossorigin="anonymous"></script>
</head>
<body>

<!--navbar-->

<!--about section-->
<section class="section about" id="about">
        <!--title-->
        <div class="title-wrapper">
            <h2 class="title"><span class="subtitle">View Buy Status</span></h2>
        </div>
        <!--end of title-->
    </section>
    <!--end of about section-->

<div class="container">
  <div class="row">
    <div class="col-12">
      <table class="table table-bordered">
        <thead>
          <tr>
          
            <th >Name</th>
            <th >Email</th>
            <th >Phone</th>
            <th >National ID</th>
            <th >Car Name</th>
            <th >Address</th>
            
            <th >Amount to be Paid</th>
            <th >Amount Paid</th>
            <th >Transaction ID</th>
            <th >Status</th>
            
            <th >Actions</th>
            
          </tr>
        </thead>
        <tbody>
            <?php
                $sql= "SELECT * FROM client_buy WHERE email='{$_SESSION['SESSION_EMAIL']}'";
                $query= mysqli_query($conn,$sql);
                
                
                while($result= mysqli_fetch_assoc($query)){
                  $sql1= "SELECT * FROM buy_car where csku='{$result['csku']}'";
                  $query1= mysqli_query($conn,$sql1);
                  while($result1= mysqli_fetch_assoc($query1)){  
            ?>
                        <tr>
                        
                            <td><?php echo $result['client_name']; ?></td>
                            <td><?php echo $result['email']; ?></td>
                            <td><?php echo $result['phone']; ?></td>
                            <td><?php echo $result['nationalid']; ?></td>
                            <td><?php echo $result1['car_name']; ?></td>
                            <td><?php echo $result['address']; ?></td>
                            <td><?php echo $result['paying_amount']; ?></td>
                            <td><?php echo $result['paid_amount']; ?></td>
                            <td><?php echo $result['transaction_id']; ?></td>
                            <td><?php echo $result['status']; ?></td>
                            <?php
                            if($result['status']==='Pending'){
                              ?>
                            <td>
                        
                            <a href="buypaynow2.php?client_id=<?php echo $result['client_id']; ?>" class="btn btn-danger" target="_blank">Proceed to Pay</a> <br>
                            </br>
                            <a href="buystatusdelete.php?client_id=<?php echo $result['client_id']; ?>" class="btn btn-danger" target="_blank">Delete</a>
                            </td>
                            <?php
                            }
                            else{
                              echo "";
                            }
                            
                            ?>
                        </tr>
                <?php
                }
              }
                ?>
          
        </tbody>
      </table>
    </div>
  </div>
</div>
</body>
</html>