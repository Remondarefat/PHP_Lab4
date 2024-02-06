<?php require('inc/header.php'); ?>
<?php require('inc/navbar.php'); ?>
<?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        }else{
            $id=1;
    }
    $query ="SELECT * FROM users where id=$id " ;
    $result = mysqli_query($con, $query);
    if(mysqli_num_rows($result)==0){
        http_response_code(404);
    }else{
        $user=mysqli_fetch_assoc($result);
    }
?>
<div class="container-fluid pt-4">
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="d-flex justify-content-between border-bottom mb-5">
                <div>
                    <h3>View User</h3>
                </div>
                <div>
                    <a href="index.php" class="text-decoration-none btn btn-info btn-lg px-4 ">Back</a>
                </div>
            </div>
            <?php if(isset($user)){ ?>
                <div>
                    <h5>User Name:</h5>
                    <p><?=$user['name']?></p>
                    <h5>User Email:</h5>
                    <p><?=$user['email']?></p>
                    <h5>User Gender:</h5>
                    <p><?=$user['gender']?></p>
                    <p>
                        <?php
                        if($user['mail_status']=="yes"){
                            echo "YOU will recive e-mails from us " ;
                        }
                        else{
                            echo "You won't receive emails from us";
                        }
                        ?>
                    </p>
                </div>
            <?php }else{
                echo "No Account Found ";
            } ?>
        </div>
    </div>
</div>

<?php require('inc/footer.php'); ?>