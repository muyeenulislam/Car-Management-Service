<?php
session_start();
if (!isset($_SESSION['adminlogin'])) {
    header("Location: adminlogin.php");
    die();
}
include 'config.php';


$msg_id=$_GET['msg_id'];


        $newsql= "DELETE FROM messages where $msg_id=msg_id";
        $newquery= mysqli_query($conn,$newsql);
        if($newquery){
        
            header('location: viewmsg.php ');
        }
        else{
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

?>