<?php
if(isset($_POST['create_post'])){
    $post_title = $_POST['post_title'];
    $post_author = $_POST['post_author'];
    $post_category_id = $_POST['post_category'];
    $post_status = $_POST['post_status'];

    $post_image = $_FILES['post_image']['name'];
    $post_image_temp = $_FILES['post_image']['tmp_name'];

    $post_tags = $_POST['post_tags'];
    $post_content = $_POST['post_content'];
    $post_date = date('d-m-y');

    move_uploaded_file($post_image_temp, "../images/$post_image");

    $query = "INSERT INTO posts(post_category_id, post_title, post_autor, post_date, post_image, post_content, post_tags, post_status) VALUES";
    $query .= "({$post_category_id}, '{$post_title}', '{$post_author}', now(), '{$post_image}', '{$post_content}', '{$post_tags}', '{$post_status}') ";

    $create_post_query = mysqli_query($connection, $query);
    confirmQuery($create_post_query);
    
}
?>


<form action="" method="post" enctype="multipart/form-data"> <!-- ovaj enctype="multipart/form-data" zbog slike -->

    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" name="post_title" class="form-control">
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
        <input type="text" name="post_author" class="form-control">
    </div>

    <div class="form-group">
        <label for="post_status">Post Status</label>
        <input type="text" name="post_status" class="form-control">
    </div>

    <div class="form-group">
        <label for="post_date">Post Date</label>
        <input type="text" name="post_date" class="form-control">
    </div>

    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea type="text" name="post_content" class="form-control" id="" cols="30" rows="10">
    </textarea>
    </div>

    <div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="file" name="post_image">
    </div>

    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input type="text" name="post_tags" class="form-control">
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-primary" value="Publish Post" name="create_post">
    </div>


</form>