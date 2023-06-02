

<?php session_start(); ?>
<?php
$connection = mysqli_connect('localhost','root','mysql','cms_template');

if (isset($_POST["login"])) {
    $username = $_POST["user_name"];
    $password = $_POST["user_password"];

    $safe_username = mysqli_real_escape_string($connection , $username);
    $safe_password = mysqli_real_escape_string($connection , $password);


    $query = "SELECT * FROM users WHERE user_name='$safe_username' AND user_password='$safe_password' ";
    $pull_query = mysqli_query($connection,$query);

    while ($row = mysqli_fetch_assoc($pull_query)) {
            $db_user_name = $row['user_name'];
            $db_user_firstname = $row['user_firstname'];
            $db_user_lastname = $row['user_lastname'];
            $db_user_email = $row['user_email'];
            $db_user_role = $row['user_role'];
   }


 


if ($safe_username == $db_user_name) {
  
    
   $_SESSION['firstname'] = $db_user_firstname ;
   $_SESSION['lastname'] = $db_user_lastname ;
   $_SESSION['username'] = $db_user_name ;
   $_SESSION['email'] = $db_user_email ;
   $_SESSION['role'] = $db_user_role ;
    
   header("Location:../admin/index.php");
}else {
     
    header("Location:../index.php");
 
}


}

?>