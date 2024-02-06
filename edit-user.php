<?php require('inc/header.php'); ?>
<?php require('inc/navbar.php'); ?>

<?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }else{
        header("location:index.php");
    }
    $query="SELECT * from users where id=$id";
    $result=mysqli_query($con,$query);
    if(mysqli_num_rows($result)==0){
        http_response_code(404);
    }else{
        $user=mysqli_fetch_assoc($result);
    }

?>
<!-- Function to Update Gender & checkbox -->
    <?php
    function checkFemaleGender($user){
        if($user['gender']=='female'){
            echo "checked";
        }}
    function checkMaleGender($user){
        if($user['gender']=='male'){
            echo "checked";
        }}
        function checkMaleStatus($user){
            if($user['mail_status']=='yes'){
                echo "checked";
            }}
    ?>
    <!-- =========== -->
<div class="container-fluid pt-4">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="d-flex justify-content-between border-bottom mb-5">
                <div>
                    <h3>Edit user Account</h3>
                </div>
                <div>
                    <a href="index.php" class="text-decoration-none">Back</a>
                </div>
            </div>
            <?php if(isset($_SESSION['errors'])) { ?>
                <div class="alert alert-danger">
                    <?php foreach($_SESSION['errors'] as $error ){ ?>
                        <p><?=  $error ?></p>;
                    <?php } 
                    unset($_SESSION['errors']);
                    ?>
                </div>
            <?php } ?>  
            <form method="POST" action="update-user.php">
                    <input type="hidden" name="id" value="<?= $id ;?>">
                    <div class="mb-3">
                        <label for="userName" class="form-label">Name</label>
                        <input type="text" class="form-control" id="userName" name="name" value="<?=  $user['name']?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="userEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="userEmail" name="email" value="<?=  $user['email']?>">
                    </div>
                    <div class="mb-3">
                        <label for="Gender" class="form-label d-block">Gender</label>
                        <input type="radio"  id="gender" name= "gender" value="female" class=" mb-2" <?php checkFemaleGender($user) ?>> Female <br>
                        <input type="radio"  id="gender" name= "gender" value="male" <?php checkMaleGender($user)  ?> > Male 
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1" value="yes" name=" mail_status" <?php checkMaleStatus($user) ?>>
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            </form>
        </div>
    </div>
</div>

<?php require('inc/footer.php'); ?>