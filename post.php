<?php include "includes/db.php" ;?>
<?php include "includes/header.php" ;?>



    <!-- Navigation -->
    <?php include "includes/navigation.php";?>
    

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>
                
                <?php 

                     $received_post_id = $_GET['post_id'] ;
                    
                
                
                $all_posts = mysqli_query($connection,"SELECT * FROM posts WHERE post_id='$received_post_id'");

                    if (isset($_POST['submit'])) {      $myrow = "num_rows" ;
                        $SearchQeury = $_POST["SearchBar"] ;
                        $SelectedQuery = mysqli_query($connection,"SELECT * FROM posts WHERE post_id='$received_post_id' AND   post_content LIKE '%$SearchQeury%'  ");
                        if ($SelectedQuery->$myrow == 0) {
                            $thisone = $all_posts ;
                        }else {
                         $thisone = $SelectedQuery ;  
                        //    print_r(mysqli_fetch_assoc($thisone));
                        }
                    } else {
                        $thisone = $all_posts ;
                     }
                        // print_r (mysqli_fetch_assoc($SelectedQuery)) ;

                    while ($row =  mysqli_fetch_assoc($thisone) ) {
                        $post_title = $row['post_title'];
                        $post_author = $row['post_author'];
                        $post_date = $row['post_date'];
                        $post_content = $row['post_content']; 
                        $post_image = $row['post_image'];  
                
                
                    
                    ?>


                <!-- First Blog Post -->
                <h2>
                    <a href="#"> <?php echo $post_title?> </a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date?></p>
                <hr>
                <img class="img-responsive" src="images/<?php  echo $post_image ?>" alt="">
                <hr>
                <p><?php echo $post_content?> </p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>

                

                <?php 
                if (isset($_POST["sumbit_comment"])) {
                    $comment_post_id = $_GET['post_id'];
                    $comment_author =  $_POST["comment_author"] ;
                    $comment_email =  $_POST["comment_email"] ;
                    $comment_content =  $_POST["comment_content"] ;
                    $comment_date = date("d-m-y");
                    $comment_status = "Unapproved" ;
                    $add_comment_query = "INSERT INTO comments(comment_post_id,comment_email,comment_author,comment_content,comment_date,comment_status) VALUES ('$comment_post_id','$comment_email','$comment_author','$comment_content','$comment_date','$comment_status')" ;
                mysqli_query($connection,$add_comment_query);
                }
                ?>



 <!-- Posted Comments -->
    <div class="col-lg-8">
              <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form action="" method="post" role="form">
                    <div class="form-group">
                            <input  type="text" class="form-control" name="comment_author" rows="3">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" name="comment_email" rows="3">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="comment_content" rows="3"></textarea>
                        </div>
                        <button type="submit" name="sumbit_comment" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Comment -->



                <?php 
                $comment_post_id = $_GET['post_id'];
                $related_comments = mysqli_query($connection,"SELECT * FROM comments WHERE comment_post_id='$comment_post_id' AND comment_status='Approved'");
                while ($row = mysqli_fetch_assoc($related_comments)) {
                    $comment_date = $row['comment_date'];
                    $comment_content = $row['comment_content'];
                    $comment_author = $row['comment_author'];
                ?>
                <div class="media">
                    <a class="pull-left" href="#">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo"$comment_author" ?>
                            <small> <?php echo"$comment_date" ?></small>
                        </h4>
                       <?php echo"$comment_content" ?> 
                    </div>
                </div>
                <?php } ?>




                <!-- Comment -->
                 

            </div>





                <?php
                   }
                ?>



             </div>
           



       <?php include "includes/sidebar.php"?>

        <!-- Footer -->
       <?php include "includes/footer.php";?>

   


