<?php require('inc/header.php'); ?>
<?php require('inc/navbar.php'); ?>

<div class="container-fluid pt-4">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="d-flex justify-content-between border-bottom mb-5">
                <div>
                    <h3>Add new user</h3>
                </div>
                <div>
                    <a href="index.php" class="text-decoration-none btn-info btn-lg px-3">Back</a>
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
            <form method="POST" action="store-user.php">
                    <div class="mb-3">
                        <label for="userName" class="form-label">Name</label>
                        <input type="text" class="form-control" id="userName" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="userEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="userEmail" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="Gender" class="form-label d-block">Gender</label>
                        <input type="radio"  id="gender" name= "gender" value="female" class=" mb-2"> Female <br>
                        <input type="radio"  id="gender" name= "gender" value="male"  > Male
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1" value="yes" name="mail_status">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            </form>
            
        </div>
    </div>
</div>

<?php require('inc/footer.php'); ?>