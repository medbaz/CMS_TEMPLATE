<?php include "includes/db.php" ;?>
<?php include "includes/header.php" ;?>



    <!-- Navigation -->
    <?php include "includes/navigation.php";?>
    

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <?php 
            
                    $all_posts = mysqli_query($connection,'SELECT * FROM posts');

                    if (isset($_POST['submit'])) {      $myrow = "num_rows" ;
                        $SearchQeury = $_POST["SearchBar"] ;
                        $SelectedQuery = mysqli_query($connection,"SELECT * FROM posts WHERE post_content LIKE '%$SearchQeury%'  ");
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

                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

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
                   }
                ?>
            </div>
           



       <?php include "includes/sidebar.php"?>

        <!-- Footer -->
       <?php include "includes/footer.php";?>

   