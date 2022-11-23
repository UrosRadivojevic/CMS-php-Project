<?php

if(isset($_GET['p_id'])){
    $get_post_id = $_GET['p_id'];
}
$query = "SELECT * FROM posts WHERE post_id= {$get_post_id}";
$select_posts_by_id = mysqli_query($connection, $query);

while($row = mysqli_fetch_assoc($select_posts_by_id)){
    $post_id = $row['post_id'];
    $post_author = $row['post_autor'];
    $post_title = $row['post_title'];
    $post_category_id = $row['post_category_id'];
    $post_status = $row['post_status'];
    $post_image = $row['post_image'];
    $post_tags = $row['post_tags'];
    $post_content = $row['post_content'];
    $post_date = $row['post_date'];
}

if(isset($_POST['update_post'])){
    $post_title = $_POST['post_title'];
    $post_author = $_POST['post_author'];
    $post_category_id = $_POST['post_category'];
    $post_status = $_POST['post_status'];

    $post_image = $_FILES['post_image']['name'];
    $post_image_temp = $_FILES['post_image']['tmp_name'];

    $post_tags = $_POST['post_tags'];
    $post_content = $_POST['post_content'];
    $post_date = date('d-m-y');
    $post_comment_count = 4;

    move_uploaded_file($post_image_temp, "../images/$post_image");

    if(empty($post_image)){
        $query = "SELECT * FROM posts WHERE post_id = {$get_post_id} ";
        $select_image = mysqli_query($connection, $query);
        while($row=mysqli_fetch_assoc($select_image)){
            $post_image = $row['post_image'];
        }
    }

    $query = "UPDATE posts SET ";
    $query .= "post_title = '{$post_title}', ";
    $query .= "post_autor = '{$post_author}', ";
    $query .= "post_category_id = '{$post_category_id}', ";
    $query .= "post_status = '{$post_status}', ";
    $query .= "post_tags = '{$post_tags}', ";
    $query .= "post_content = '{$post_content}', ";
    $query .= "post_image = '{$post_image}', ";
    $query .= "post_date = now() ";
    $query .= "WHERE post_id = '{$get_post_id}'";

    $update_post_query = mysqli_query($connection, $query);
    confirmQuery($update_post_query);

}

?>




<form action="" method="post" enctype="multipart/form-data"> <!-- ovaj enctype="multipart/form-data" zbog slike -->

    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" value="<?php echo $post_title; ?>" name="post_title" class="form-control">
    </div>

    <div class="form-group">
        <label for="post_category">Post Category</label>
        <select name="post_category" id="">
            <?php
                $query = "SELECT * FROM categories";
                $select_categories = mysqli_query($connection, $query);
                confirmQuery($select_categories);
                while($row = mysqli_fetch_assoc($select_categories)){
                    $cat_id = $row['cat_id'];
                    $cat_title = $row['cat_title'];

                    echo "<option value='{$cat_id}'>{$cat_title}</option>";
                }
                
            ?>
        </select>
    </div>

    <div class="form-group">
        <label for="post_author">Post Author</label>
        <input type="text" value="<?php echo $post_author; ?>" name="post_author" class="form-control">
    </div>

    <div class="form-group">
        <label for="post_status">Post Status</label>
        <input type="text" value="<?php echo $post_status; ?>" name="post_status" class="form-control">
    </div>

    <div class="form-group">
        <label for="post_date">Post Date</label>
        <input type="text" value="<?php echo $post_date; ?>" name="post_date" class="form-control">
    </div>

    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea type="text"  name="post_content" class="form-control" id="" cols="30" rows="10"><?php echo $post_content; ?>
    </textarea>
    </div>

    <div class="form-group">
        <label for="post_image">Post Image</label>
        <img src="../images/<?php echo $post_image; ?>" widht=100>
        <input type="file" name="post_image">
    </div>

    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input type="text" value="<?php echo $post_tags; ?>" name="post_tags" class="form-control">
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-primary" value="Update Post" name="update_post">
    </div>


</form>