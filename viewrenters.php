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
    <title>Renter Information</title>

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
            <h2 class="title"><span class="subtitle">View Renter Information</span></h2>
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
          <th >Client ID</th>
            <th >Name</th>
            <th >Email</th>
            <th >Phone</th>
            <th >National ID</th>
            <th >Rent Date and Time</th>
            <th >Rent Hour</th>
            <th >Starting Address</th>
            <th >Destination Address</th>
            <th >crsku</th>
            <th >Amount to be Paid</th>
            <th >Amount Paid</th>
            <th >Status</th>
            <th >Transaction ID</th>
            <th >Actions</th>
          </tr>
        </thead>
        <tbody>
            <?php
                $sql= "SELECT * FROM client_rent";
                $query= mysqli_query($conn,$sql);
                
                
                while($result= mysqli_fetch_assoc($query)){

                
            ?>
                        <tr>
                        <td><?php echo $result['client_id']; ?></td>
                            <td><?php echo $result['client_name']; ?></td>
                            <td><?php echo $result['email']; ?></td>
                            <td><?php echo $result['phone']; ?></td>
                            <td><?php echo $result['nationalid']; ?></td>
                            <td><?php echo $result['rent_datetime']; ?></td>
                            <td><?php echo $result['rent_hour']; ?></td>
                            <td><?php echo $result['starting_address']; ?></td>
                            <td><?php echo $result['destination_address']; ?></td>
                            <td><?php echo $result['crsku']; ?></td>
                            <td><?php echo $result['paying_amount']; ?></td>
                            <td><?php echo $result['paid_amount']; ?></td>
                            <td><?php echo $result['status']; ?></td>
                            <td><?php echo $result['transaction_id']; ?></td>
                            <?php
                            if($result['status']==='Pending'){

                            ?>
                            <td>
                            
                            <a href="editrenters.php?client_id=<?php echo $result['client_id']; ?>" class="btn btn-danger">Approve</a>
                            <br></br>
                            <a href="deleterenter.php?client_id=<?php echo $result['client_id']; ?>" class="btn btn-danger">Delete</a>
                            </td>

                            <?php
                            }else{ ?>
                            <td>

                            <a href="deleterenter.php?client_id=<?php echo $result['client_id']; ?>" class="btn btn-danger">Delete</a>
                            </td>
                            
                            <?php
                            }
                            ?>
                        </tr>
                <?php
                }
                ?>
          
        </tbody>
      </table>
    </div>
  </div>
</div>
</body>
</html>