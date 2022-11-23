<table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Username</th>
                                    <th>Firstname</th>
                                    <th>Lastname</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Image</th>
                                
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php
                                    $query = "SELECT * FROM users";
                                    $select_all_users = mysqli_query($connection, $query);

                                    while($row = mysqli_fetch_assoc($select_all_users)){
                                        $user_id = $row['user_id'];
                                        $user_username = $row['user_username'];
                                        $user_firstname = $row['user_firstname'];
                                        $user_lastname = $row['user_lastname'];
                                        $user_email = $row['user_email'];
                                        $user_role = $row['user_role'];
                                        $user_image = $row['user_image'];
                                        
                                       

                                        echo "<tr>";
                                        echo "<td>$user_id</td>";
                                        echo "<td>$user_username</td>";
                                        echo "<td>$user_firstname</td>";
                                        echo "<td>$user_lastname</td>";
                                        echo "<td>$user_email</td>";
                                        echo "<td>$user_role</td>";
                                        echo "<td><img class='img-fluid img-thumbnail img-responsive' src='../images/$user_image' alt='image'></td>";

                                        
                                        echo "<td><a href='users.php?admin=$user_id'>Admin</a></td>";
                                        echo "<td><a href='users.php?sub=$user_id'>Subscriber</a></td>";
                                        echo "<td><a href='users.php?source=edit_user&u_id=$user_id'>Edit</a></td>";
                                        echo "<td><a href='users.php?delete=$user_id'>Delete</a></td>";
                                        echo "</tr>";
                                    }
                                    ?>
                                </tr>
                            </tbody>
                        </table>
                        

<?php
if(isset($_GET['admin'])){
    $user_id_admin = $_GET['admin'];

    $query = "UPDATE users SET user_role = 'admin' WHERE user_id = {$user_id_admin}";
    $admin_user_query = mysqli_query($connection, $query);
    header("Location: users.php");
    confirmQuery($admin_user_query);
}

if(isset($_GET['sub'])){
    $user_id_sub = $_GET['sub'];

    $query = "UPDATE users SET user_role = 'subscriber' WHERE user_id = {$user_id_sub}";
    $sub_user_query = mysqli_query($connection, $query);
    header("Location: users.php");
    confirmQuery($sub_user_query);
}




if(isset($_GET['delete'])){
    $user_id_delete = $_GET['delete'];

    $query = "DELETE FROM users WHERE user_id={$user_id_delete}";
    $delete_user_query = mysqli_query($connection, $query);
    header("Location: users.php");
    confirmQuery($delete_user_query);
}
?>