<?php require('inc/header.php'); ?>
<?php require('inc/navbar.php'); ?>
<?php
    $query ="SELECT * FROM users " ;
    $result =mysqli_query($con ,$query);
    $users  =mysqli_fetch_all($result,MYSQLI_ASSOC);
?>
<div class="container-fluid pt-4">
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="d-flex justify-content-between border-bottom mb-5">
                <div>
                    <h3>User Details</h3>
                </div>
                <div>
                    <a href="create-user.php" class="btn btn-md btn-success">Add new user</a>
                </div>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Mail Status</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($users as $user) { ?>
                        <tr>
                            <td><?=$user['id'] ?></td>
                            <td><?=$user['name'] ?></td>
                            <td><?=$user['email'] ?></td>
                            <td><?=$user['gender'] ?></td>
                            <td><?=$user['mail_status'] ?></td>
                            <td>
                                <a href="show-user.php?id=<?php echo $user['id']?>" class="btn btn-sm btn-primary">Show</a>
                                <a href="edit-user.php?id=<?php echo $user['id']?>" class="btn btn-sm btn-secondary">Edit</a>
                                <a href="delete-user.php?id=<?php echo $user['id']?>" class="btn btn-sm btn-danger" onclick="return confirm('do you really want to delete user?')">Delete</a>
                            </td>
                        </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php require('inc/footer.php'); ?>