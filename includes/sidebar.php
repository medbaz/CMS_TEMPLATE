     <!-- Blog Sidebar Widgets Column -->
     <div class="col-md-4">

<!-- Blog Search Well -->
 

<div class="well">
    <form action="" method="post" >
    <h4>Blog Search</h4>
    <div class="input-group">
        <input type="text" name="SearchBar" class="form-control">
        <span class="input-group-btn">
            <button class="btn btn-default" name="submit" type="submit">
                <span class="glyphicon glyphicon-search"></span>
        </button>
        </span>
    </div>
    </form>
    <!-- /.input-group -->
</div>

<!-- Blog Login -->
 

<div class="well">
    <form action="includes/login.php" method="post" >
    <h4>Login</h4>
    <div class="input-group">
        <div class="form-group">
        <input type="text" name="user_name" class="form-control" placeholder="Enter Username">
      </div> 
      <div class="input-group">
            <input type="password" name="user_password" class="form-control" placeholder="Enter Password">
            <span class="input-group-btn">
                <button type="submit" class="btn btn-primary" name="login" >   Submit
            </button>
    
            </span>
       </div>
    </div>
    </form>
    <!-- /.input-group -->
</div>

<!-- Blog Categories Well -->


<div class="well">
    <h4>Blog Categories</h4>
    <div class="row">
        <div class="col-lg-6">
            <ul class="list-unstyled">
            <?php
                    $all_categories = mysqli_query($connection,'SELECT * FROM categories');
                    while ($row = mysqli_fetch_assoc($all_categories)) {
                        $category = $row['cat_title'];
                        $cat_id = $row['cat_id'];
                        echo "<li><a href='./category.php?cat_id=$cat_id'> $category </a></li>";
                    }

                    ?>
            </ul>
        </div>
        <!-- /.col-lg-6 -->
        <div class="col-lg-6">
            <ul class="list-unstyled">
              
            </ul>
        </div>
        <!-- /.col-lg-6 -->
    </div>
    <!-- /.row -->
</div>

<!-- Side Widget Well -->
<?php include "widgets.php"?>

</div>

        </div>
        <!-- /.row -->

        <hr>