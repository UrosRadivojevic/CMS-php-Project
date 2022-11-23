<?php
if(isset($_POST['create_user'])){
    $user_username = $_POST['username'];
    $user_password = $_POST['user_password'];
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];

    $user_image = $_FILES['user_image']['name'];
    $user_image_temp = $_FILES['user_image']['tmp_name'];

    $user_email = $_POST['user_email'];
    $user_role = $_POST['user_role'];

    move_uploaded_file($user_image_temp, "../images/$user_image");

    $query = "INSERT INTO users(user_username, user_password, user_firstname, user_lastname, user_email, user_image, user_role) VALUES";
    $query .= "('{$user_username}', '{$user_password}', '{$user_firstname}', '{$user_lastname}', '{$user_email}', '{$user_image}', '{$user_role}') ";

    $create_user_query = mysqli_query($connection, $query);
    confirmQuery($create_user_query);
    
}
?>


<form action="" method="post" enctype="multipart/form-data"> <!-- ovaj enctype="multipart/form-data" zbog slike -->


    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" name="username" class="form-control">
    </div>

    <div class="form-group">
        <label for="user_password">Password</label>
        <input type="password" name="user_password" class="form-control">
    </div>

    <div class="form-group">
        <label for="user_firstname">First Name</label>
        <input type="text" name="user_firstname" class="form-control">
    </div>

    <div class="form-group">
        <label for="user_lastname">Last name</label>
        <input type="text" name="user_lastname" class="form-control">
    </div>

    <div class="form-group">
        <label for="user_image">Image</label>
        <input type="file" name="user_image">
    </div>

    <div class="form-group">
        <label for="user_email">Email</label>
        <input type="email" name="user_email" class="form-control">
    </div>

    <div class="form-group">
    <label for="user_role">Role</label>
        <select name="user_role" id="">
            <option value="subscriber">Select Option</option>
            <option value="admin">Admin</option>
            <option value="subscriber">Subscriber</option>
        </select>
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-primary" value="Create user" name="create_user">
    </div>


</form>