<?php
    session_start();
    $con =mysqli_connect("localhost","root","","users_details");
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $query="DELETE FROM users where id =$id ;" ;
        $result=mysqli_query($con,$query);
        header("location:index.php");
    }

?>
