<?php

if(isset($_GET['u_id'])){
    $get_user_id = $_GET['u_id'];
}
$query = "SELECT * FROM users WHERE user_id= {$get_user_id}";
$select_posts_by_id = mysqli_query($connection, $query);

while($row = mysqli_fetch_assoc($select_posts_by_id)){
    $user_id = $row['user_id'];
    $user_password = $row['user_password'];
    $user_username = $row['user_username'];
    $user_firstname = $row['user_firstname'];
    $user_lastname = $row['user_lastname'];
    $user_email = $row['user_email'];
    $user_role = $row['user_role'];
    $user_image = $row['user_image'];
}

if(isset($_POST['update_user'])){
    $user_username = $_POST['username'];
    $user_password = $_POST['user_password'];
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];

    $user_image = $_FILES['user_image']['name'];
    $user_image_temp = $_FILES['user_image']['tmp_name'];

    $user_email = $_POST['user_email'];
    $user_role = $_POST['user_role'];

    move_uploaded_file($user_image_temp, "../images/$user_image");

    if(empty($user_image)){
        $query = "SELECT * FROM users WHERE user_id = {$get_user_id} ";
        $select_image = mysqli_query($connection, $query);
        while($row=mysqli_fetch_assoc($select_image)){
            $user_image = $row['user_image'];
        }
    }

    $query = "UPDATE users SET ";
    $query .= "user_username = '{$user_username}', ";
    $query .= "user_password = '{$user_password}', ";
    $query .= "user_firstname = '{$user_firstname}', ";
    $query .= "user_lastname = '{$user_lastname}', ";
    $query .= "user_image = '{$user_image}', ";
    $query .= "user_email = '{$user_email}', ";
    $query .= "user_role = '{$user_role}' ";
    $query .= "WHERE user_id = '{$get_user_id}'";

    $update_post_query = mysqli_query($connection, $query);
    confirmQuery($update_post_query);

}

?>




<form action="" method="post" enctype="multipart/form-data"> <!-- ovaj enctype="multipart/form-data" zbog slike -->


    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" name="username" class="form-control" value=<?php echo $user_username; ?>>
    </div>

    <div class="form-group">
        <label for="user_password">Password</label>
        <input type="password" name="user_password" class="form-control" value=<?php echo $user_password; ?> >
    </div>

    <div class="form-group">
        <label for="user_firstname">First Name</label>
        <input type="text" name="user_firstname" class="form-control" value=<?php echo $user_firstname; ?>>
    </div>

    <div class="form-group">
        <label for="user_lastname">Last name</label>
        <input type="text" name="user_lastname" class="form-control" value=<?php echo $user_lastname; ?>>
    </div>

    <div class="form-group">
        <label for="user_image">Image</label>
        <img src="../images/<?php echo $user_image; ?>" alt="">
        <input type="file" name="user_image">
    </div>

    <div class="form-group">
        <label for="user_email">Email</label>
        <input type="email" name="user_email" class="form-control" value = <?php echo $user_email; ?>>
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
        <input type="submit" class="btn btn-primary" value="Update user" name="update_user">
    </div>


</form>