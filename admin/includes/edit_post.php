
<?php
if (isset($_GET["post_id"])) {
$get_id = $_GET["post_id"] ;
    $query = "SELECT post_title , post_author ,post_category_id,post_status,post_image,post_tags,post_content,post_date,post_comment_count FROM posts WHERE post_id = $get_id";

    // $post_title = $_POST["title"] ;
    //  $post_author = $_POST["post_author"] ;
    //  $post_category_id = $_POST["post_category_id"] ;
    //  $post_status = $_POST["post_status"] ;
    //  $post_image = $_FILES['image']['name'];
    //  $post_image_temp = $_FILES['image']['tmp_name'];
    //  $post_tags = $_POST["post_tags"] ;
    //  $post_content = $_POST["post_content"] ;
    //  $post_date = date('d-m-y') ;
    //  $post_comment_count = 4 ;
    $post_data_row = mysqli_query($connection,$query);

    $row = mysqli_fetch_assoc($post_data_row) ;
    $post_title = $row['post_title'];
    $post_author = $row['post_author'];
    $post_category_id = $row['post_category_id'];
    $post_status = $row['post_status'];
    $post_image = $row['post_image'];
    $post_tags = $row['post_tags'];
    $post_content = $row['post_content'];
    $post_date = $row['post_date'];
    $post_comment_count = $row['post_comment_count'];

    // print_r( mysqli_query($connection,$query));
}

?>

<?php
 if (isset($_POST["create_post"])) {
     $post_title = $_POST["title"] ;
     $post_author = $_POST["post_author"] ;
     $post_category_id = $_POST["post_category_id"] ;
     $post_status = $_POST["post_status"] ;
     $post_image = $_FILES['image']['name'];
     $post_image_temp = $_FILES['image']['tmp_name'];
     $post_tags = $_POST["post_tags"] ;
     $post_content = $_POST["post_content"] ;
     $post_date = date('d-m-y') ;
     $post_comment_count = 4 ;
    
     move_uploaded_file($post_image_temp,"../images/$post_image");

     $posting_query = "UPDATE posts SET  post_title = '$post_title' , post_author = '$post_author', post_date, post_image,post_content, post_tags,post_comment_count,post_status,post_category_id) VALUES('$post_title','$post_author','$post_date','$post_image','$post_content','$post_tags','$post_comment_count','$post_status','$post_category_id')";
     
        mysqli_query($connection,$posting_query);

     
     
     
 }

?>


<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" class="form-control" name="title" value="<?php echo $post_title ?>" id="">
    </div>
    <div class="form-group" >
        <label for="post_category_id">Post Category Id</label>
        <input type="text" class="form-control" name="post_category_id" value="<?php echo $post_category_id ?>" id="">
    </div>
    <div class="form-group" >
        <label for="post_author">Post Author</label>
        <input type="text" class="form-control" name="post_author" value="<?php echo $post_author ?>" id="">
    </div>
    <div class="form-group" >
        <label for="post_status">Post Status</label>
        <input type="text" class="form-control" name="post_status" value="<?php echo $post_status ?>" id="">
    </div>
    <div class="form-group" >
        <label for="post_image">Post Image</label>
        <input type="file" class="form-control" name="image" value="<?php echo $post_image ?>" id="">
    </div>
    <div class="form-group" >
        <label for="post_tags">Post Tags</label>
        <input type="text" class="form-control" name="post_tags" value="<?php echo $post_tags ?>" id="">
    </div>
    <div class="form-group" >
        <label for="post_content">Post Content</label>
        <textarea class="form-control"   name="post_content" value="<?php echo $post_content ?>" id="" cols="30" rows="10"></textarea>
    </div>
    <div class="form-group" >
        <input type="submit" class="btn btn-primary"  name="create_post" >
    </div>
</form>