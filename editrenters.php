<?php
session_start();
if (!isset($_SESSION['adminlogin'])) {
    header("Location: adminlogin.php");
    die();
}
include 'config.php';


$client_id=$_GET['client_id'];


    $sql="SELECT * from client_rent where client_id='{$client_id}'";
    $query=mysqli_query($conn,$sql);
    if($row=mysqli_fetch_assoc($query)){
        $email=$row['email'];
        $crsku=$row['crsku'];
        $paying_amount=$row['paying_amount'];
        $nationalid=$row['nationalid'];
        $keylength= 8;
        $str = "1234567890abcdefghijklmnopqrstuvwxyz";
        $randstr = substr(str_shuffle($str),0,$keylength);


        $newsql= "UPDATE client_rent SET transaction_id='$randstr',status='Approved',paid_amount='{$paying_amount}' where client_id='{$client_id}'";
        $newquery= mysqli_query($conn,$newsql);
        if($newquery){
        
            $sql2="INSERT into rent_transactions (client_id,transaction_id,amount,email,crsku,nationalid) VALUES ('{$client_id}','{$randstr}','{$paying_amount}','{$email}','{$crsku}','{$nationalid}')";
                $query2=mysqli_query($conn,$sql2);
                if($query2){
                    $msg = "<div class='alert alert-info'>Infromation Added Succesfully</div>";
                    $sql3="SELECT * from rent_car where crsku='{$crsku}'";
                    $result3=mysqli_query($conn, $sql3);
                    if($rws=mysqli_fetch_assoc($result3)){
                        $crsku=$rws['crsku'];
                        $quantity=$rws['quantity'];
                        $quantity1=$quantity-1;
                        $sql4="UPDATE rent_car SET quantity='{$quantity1}' where crsku='{$crsku}'";
                        $result4=mysqli_query($conn, $sql4);
                        header('Location: viewrenters.php');
                    }
                    else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                }
                else{
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }

        }
        else{
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    else{
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
        
?>