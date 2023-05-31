
<?php 
if (isset($_POST["edit_submit"])) {
    echo "submited successully <br>" ;
    $newcategory_title = $_POST["newcat_title"];
    $newcategory_id = $_GET["newcat_id"];
     if($_POST["newcat_title"] == "" || empty($_POST["newcat_title"]) ) {
   echo "not accepting empty values";
  }else {
    mysqli_query($connection,"UPDATE categories SET cat_title='$newcategory_title' WHERE cat_id='$newcategory_id'  ") ;
 } 
}


 ?>


<form action="" method="post" class="">
                                <label for="">Edit Category</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="newcat_title" value="<?php if (isset($_GET["edit"])) {
                                   echo $_GET["edit"] ;   }?>">
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="edit_submit" class="btn btn-primary" name="edit_submit" value="Edit Category">
                                </div>
                            </form>