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
    <title>Cars for Rent</title>

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
            <h2 class="title"><span class="subtitle">View Cars for Rent</span></h2>
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
          
            <th >crsku</th>
            <th >Car name</th>
            <th >Car Model</th>
            <th >Car type</th>
            <th >Engine</th>
            <th >Passenger Capacity</th>
            <th >color</th>
            <th >Transmission</th>
            <th >Image</th>
            <th >Drive</th>
            <th >Price</th>
            <th >Mileage</th>
            <th >Quantity</th>
          </tr>
        </thead>
        <tbody>
            <?php
                $sql= "SELECT * FROM rent_car";
                $query= mysqli_query($conn,$sql);
                
                
                while($result= mysqli_fetch_assoc($query)){

                
            ?>
                        <tr>
                        
                            <td><?php echo $result['crsku']; ?></td>
                            <td><?php echo $result['car_name']; ?></td>
                            <td><?php echo $result['car_model']; ?></td>
                            <td><?php echo $result['car_type']; ?></td>
                            <td><?php echo $result['engine_power']; ?></td>
                            <td><?php echo $result['passenger_capacity']; ?></td>
                            <td><?php echo $result['color']; ?></td>
                            <td><?php echo $result['transmission']; ?></td>
                            <td><?php echo $result['car_img']; ?></td>
                            <td><?php echo $result['drive']; ?></td>
                            <td><?php echo "BDT.".$result['price']."per hour"; ?></td>
                            <td><?php echo $result['mileage']; ?></td>
                            <td><?php echo $result['quantity']; ?></td>
                            
                            
                            <td>
                            
                            <a href="editrentcar.php?crsku=<?php echo $result['crsku']; ?>" class="btn btn-danger" target="_blank">Edit</a>
                            <br></br>
                            <a href="deleterentcar.php?id=<?php echo $result['id']; ?>" class="btn btn-danger" target="_blank">Delete</a>
                            </td>
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