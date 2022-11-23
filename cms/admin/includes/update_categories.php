
                    <div class="col-xs-6">
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="cat-title">Edit Category</label>

                                <?php

                                if(isset($_GET['edit'])){
                                $query = "SELECT * FROM categories WHERE cat_id = {$cat_id}";
                                $select_categories_id = mysqli_query($connection, $query);

                                while($row = mysqli_fetch_assoc($select_categories_id)){
                                    $cat_id = $row['cat_id'];
                                    $cat_title = $row['cat_title'];
                                ?>   
                                    <input value="<?php if(isset($cat_title)){echo $cat_title;}?>" class="form-control" type="text" name="cat_title">
                                <?php
                                }
                                }

                                ?>

                               
                               
                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="update" value="Update">
                            </div>
                             <!-- Update Query -->
                             <?php
                                if(isset($_POST['update'])){
                                    $cat_title_update = $_POST['cat_title'];
                                    $query = "UPDATE categories SET cat_title = '{$cat_title_update}' WHERE cat_id = {$cat_id}";
                                    $update_query = mysqli_query($connection, $query);
                                    header("Location: categories.php");
                                    if(!$update_query){
                                        die("QUERY FAILED " . mysqli_error($connection));
                                    }
                                }
                                ?>

                        </form>
                        </div>
