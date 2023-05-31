
<?php if (isset($_POST["submit"])) {
    echo "submited successully <br>" ;
    $category_title = $_POST["cat_title"];
    if($_POST["cat_title"] == "" || empty($_POST["cat_title"]) ) {
   echo "not accepting empty values";
  }else {
    mysqli_query($connection,"INSERT INTO categories(cat_title) VALUES ('$category_title ')") ;
  }
 


} ?>

<form action="" method="post" class="">
                                <label for="">Add Category</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="cat_title">
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="submit" class="btn btn-primary" name="submit" value="Add Category">
                                </div>
                            </form>
