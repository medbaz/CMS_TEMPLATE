<?php
 if (isset($_POST["create_post"])) {
     $post_title = $_POST["title"] ;
     $post_author = $_POST["post_author"] ;
     $post_category_id = $_POST["post_category"] ;
     $post_status = $_POST["post_status"] ;
     $post_image = $_FILES['image']['name'];
     $post_image_temp = $_FILES['image']['tmp_name'];
     $post_tags = $_POST["post_tags"] ;
     $post_content = $_POST["post_content"] ;
     $post_date = date('d-m-y') ;
     
     move_uploaded_file($post_image_temp,"../images/$post_image");

     $posting_query = "INSERT INTO posts(post_title, post_author, post_date, post_image,post_content, post_tags,post_status,post_category_id) VALUES('$post_title','$post_author','$post_date','$post_image','$post_content','$post_tags','$post_status','$post_category_id')";
     
        mysqli_query($connection,$posting_query);

     
     
     
 }

?>

<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" class="form-control" name="title" id="">
    </div>
    <div class="form-group" >
<select name='post_category' id=''>
        <?php 

        $all_categories = mysqli_query($connection,'SELECT * FROM categories');
        while ($row = mysqli_fetch_assoc($all_categories)) {
            $category_title = $row['cat_title'];
            $category_id = $row['cat_id'];
            echo   " <option value='$category_id'>$category_title</option>";
                        
                    
         }

        
        ?>
        </select>
        </div>
    <div class="form-group" >
        <label for="post_author">Post Author</label>
        <input type="text" class="form-control" name="post_author" id="">
    </div>
    <div class="form-group" >
        <label for="post_status">Post Status</label>
        <input type="text" class="form-control" name="post_status" id="">
    </div>
    <div class="form-group" >
        <label for="post_image">Post Image</label>
        <input type="file" class="form-control" name="image" id="">
    </div>
    <div class="form-group" >
        <label for="post_tags">Post Tags</label>
        <input type="text" class="form-control" name="post_tags" id="">
    </div>
    <div class="form-group" >
        <label for="post_content">Post Content</label>
        <textarea class="form-control"   name="post_content" id="" cols="30" rows="10"></textarea>
    </div>
    <div class="form-group" >
        <input type="submit" class="btn btn-primary" name="create_post" >
    </div>
</form>