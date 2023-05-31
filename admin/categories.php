<?php include "includes/admin_header.php";?>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include "includes/admin_navigation.php";?>


        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">

                        <h1 class="page-header">
                           Welcome to admin
                            <small>Author</small>
                        </h1>
                        <div class="col-xs-6" >
<?php?>



<?php 


if (isset($_GET["delete"])) {
    echo "success";
    echo $_GET["delete"] ;
    
      $category_title =  $_GET["delete"];
      mysqli_query($connection,"DELETE FROM categories WHERE cat_id = '$category_title'") ;
  
 


}



?>

                            <!-- add categories -->

                 
                            <?php  include "includes/adding_categories.php" ;?>


                            <!-- edit categories -->
<?php  include "includes/updating_categories.php" ;?>
                          
                             
                        </div>
                        <div class="col-xs-6" >
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Category Title</th>
                                    </tr>
                                </thead>
                                <tbody>
                                 <?php
                                 $all_categories = mysqli_query($connection,'SELECT * FROM categories');
                                 while ($row = mysqli_fetch_assoc($all_categories)) {
                                     $category_title = $row['cat_title'];
                                     $category_id = $row['cat_id'];
                                    echo "<tr><td> $category_id</td><td> $category_title</td><td> <a href='categories.php?delete={$category_id}'>delete</a></td> <td> <a href='categories.php?edit={$category_title}&&newcat_id={$category_id}'>edit</a></td> </tr>";
                                 }
                                 ?>
                                    
                                </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
