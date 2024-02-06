<?php
    session_start();
    $con =mysqli_connect("localhost","root","","users_details");
    if(isset($_POST['submit'])){
        $name=trim(htmlspecialchars($_POST['name']));
        $email=trim(htmlspecialchars($_POST['email']));
        $gender=trim(htmlspecialchars($_POST['gender']));
        
        if(isset($_POST['mail_status'])){
            $mail_status=trim(htmlspecialchars($_POST['mail_status']));
        }else{
            $mail_status="No";
        }
        //!checking empty fields
        $errors=[];
        if(empty($name)){
            $errors[]="name is required";
        }elseif(! is_string($name)){
            $errors[]='Name must be a string';
        }

        if(empty($email)){
            $errors[]="Email is required.";
        }elseif(! is_string($email)){
            $errors[]='Email must be a string.';
        }

        if(empty($gender)){
            $errors[]="Gender is required.";
        }
    }else{
        header("location:index.php");
    }

    if(empty($errors)){
        $query="INSERT INTO users ( name  , email , gender ,mail_status) VALUES ('$name' ,'$email','$gender' ,'$mail_status')";
        $result= mysqli_query($con,$query);
        if($result){
            header("location:index.php");
        }
    }else{
        $_SESSION['errors']=$errors;
        header("location:create-user.php");
    }
    
?>