<?php
$connection = mysqli_connect('localhost','root','mysql','cms_template');

if (isset($_POST["login"])) {
    $username = $_POST["user_name"];
    $password = $_POST["user_password"];

    $safe_username = mysqli_real_escape_string($connection , $username);
    $safe_password = mysqli_real_escape_string($connection , $password);


    $query = "SELECT * FROM users WHERE user_name='$safe_username' ";
    $pull_query = mysqli_query($connection,$query);
   while ($row = mysqli_fetch_assoc($pull_query)) {
    $db_user_name = $row['user_name'];
    $db_user_firstname = $row['user_firstname'];
    $db_user_lastname = $row['user_lastname'];
    $db_user_name = $row['user_name'];
    $db_user_email = $row['user_email'];
    $db_user_role = $row['user_role'];
   }

   

}

?>