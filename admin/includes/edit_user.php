
<?php
if (isset($_GET["theId"])) {
    $get_id = $_GET["theId"] ;
    $query = "SELECT user_name, user_password , user_lastname, user_firstname,user_email,user_role FROM users WHERE user_id='$get_id'" ;


    $user_data_row = mysqli_query($connection,$query);

    $row = mysqli_fetch_assoc($user_data_row) ;
    $user_name = $row['user_name'];
    $user_password = $row['user_password'];
    $user_lastname = $row['user_lastname'];
    $user_firstname = $row['user_firstname'];
    $user_email = $row['user_email'];
    $user_role = $row['user_role'];

    // print_r( mysqli_query($connection,$query));
}

?>




<?php
 if (isset($_POST["update_user"]) ) {
     $user_name = $_POST["user_name"] ;
     $user_password = $_POST["user_password"] ;
     $user_lastname = $_POST["user_lastname"] ;
     $user_firstname = $_POST["user_firstname"] ;
     $user_email = $_POST["user_email"] ;
     $user_role = $_POST["user_role"] ;

     $get_id = $_GET['theId'];

     $editing_user_query = "UPDATE users SET user_name='$user_name', user_password='$user_password', user_lastname='$user_lastname', user_firstname='$user_firstname',user_email='$user_email',user_role='$user_role' WHERE user_id='$get_id'";
     
        mysqli_query($connection,$editing_user_query);

     
     
     
 }else {
    echo "you must fil the fields";
 }

?>

<form action="" method="post" >

    <div class="form-group">
        <label for="user_firstname">Firstname</label>
        <input type="text" class="form-control" name="user_firstname" value=<?php echo $user_firstname ?> id="">
    </div>
    <div class="form-group">
        <label for="user_lastname">Lastname</label>
        <input type="text" class="form-control" name="user_lastname" value=<?php echo $user_lastname ?> id="">
    </div>
    

        <div class="form-group" >
            <select class="form-select" name='user_role' id=''>
                <option value="" hidden>Select a role</option>
                <option value="Admin" <?php if ($user_role=="Admin") {
                    echo "selected" ;
                } ?> >Admin</option>
                <option value="Subsciber" <?php if ($user_role=="Subsciber") {
                    echo "selected" ;
                } ?> >Subsciber</option>
            </select>
        </div>


    <div class="form-group" >
        <label for="user_name">Username</label>
        <input type="text" class="form-control" name="user_name" value=<?php echo $user_name ?> id="">
    </div>
    <div class="form-group" >
        <label for="user_email">Email</label>
        <input type="email" class="form-control" name="user_email" value=<?php echo $user_email ?> id="">
    </div>


    <div class="form-group" >
        <label for="user_password">Password</label>
        <input type="password" class="form-control" name="user_password" value=<?php echo $user_password ?> id="">
    </div>
   
    
    <div class="form-group" >
        <input type="submit" class="btn btn-primary" name="update_user" >
    </div>
</form>