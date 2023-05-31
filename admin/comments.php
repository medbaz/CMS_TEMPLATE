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
                        <?php 

                        if ( isset($_GET["source"]) ) {
                            $source = $_GET["source"];   } else{
                                $source = "view_all_comments" ;
                            }
                                switch ($source  ) {
                                     
                                    // case 'edite':
                                    //     include "includes/edit_post.php";
                                    //     break;
                                    case 'view_all_comments':
                                            include "includes/view_all_comments.php";
                                            break;
                                    default:
                                        include "includes/view_all_comments.php";
                                        break;
                            }
                           

                           
                     
                        ?>
                       

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
