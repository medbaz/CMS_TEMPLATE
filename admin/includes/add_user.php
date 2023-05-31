<?php
 if (isset($_POST["add_user"]) && !empty($_POST["add_user"])) {
     $user_name = $_POST["user_name"] ;
     $user_password = $_POST["user_password"] ;
     $user_lastname = $_POST["user_lastname"] ;
     $user_firstname = $_POST["user_firstname"] ;
     $user_email = $_POST["user_email"] ;
     $user_role = $_POST["user_role"] ;
      
     //  $post_image = $_FILES['image']['name'];
     //  $post_image_temp = $_FILES['image']['tmp_name'];
    //  move_uploaded_file($post_image_temp,"../images/$post_image");

     $adding_user_query = "INSERT INTO users(user_name, user_password, user_lastname, user_firstname,user_email,user_role) VALUES('$user_name','$user_password','$user_lastname','$user_firstname','$user_email','$user_role')";
     
        mysqli_query($connection,$adding_user_query);

     
     
     
 }else {
    echo "you must fil the fields";
 }

?>

<form action="" method="post" >

    <div class="form-group">
        <label for="user_firstname">Firstname</label>
        <input type="text" class="form-control" name="user_firstname" id="">
    </div>
    <div class="form-group">
        <label for="user_lastname">Lastname</label>
        <input type="text" class="form-control" name="user_lastname" id="">
    </div>
    

        <div class="form-group" >
            <select class="form-select" name='user_role' id=''>
                <option value="" hidden>Select a role</option>
                <option value="Admin">Admin</option>
                <option value="Subsciber">Subsciber</option>
            </select>
        </div>


    <div class="form-group" >
        <label for="user_name">Username</label>
        <input type="text" class="form-control" name="user_name" id="">
    </div>
    <div class="form-group" >
        <label for="user_email">Email</label>
        <input type="email" class="form-control" name="user_email" id="">
    </div>


    <div class="form-group" >
        <label for="user_password">Password</label>
        <input type="password" class="form-control" name="user_password" id="">
    </div>
   
    
    <div class="form-group" >
        <input type="submit" class="btn btn-primary" name="add_user" >
    </div>
</form>